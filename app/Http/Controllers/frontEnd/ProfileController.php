<?php

namespace App\Http\Controllers\frontEnd;

use Countable;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Bookings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfileBasicInfoValidationRequest;

class ProfileController extends Controller
{
    public function getProfileData()
    {
        $data = User::where('id', Auth::user()->id)->first();

        return response()->json(
            [
                'data' => $data,
                'status' => 200
            ]
        );
    }

    public function updateProfileImage(Request $request)
    {

        $previous_image = User::where('id', Auth::user()->id)->value('hero_image');

        $req_file = 'stylist_picture';
        $path = '/images/profile';

        if ($request->hasFile($req_file)) {
            deleteImage($previous_image);
            $uploadedFile = $request->file($req_file);

            $savedImage = saveSingleImage($uploadedFile, $path);
            $images[$req_file] = $savedImage;

            Auth::user()->update(
                ['hero_image' => $savedImage]
            );

            return response()->json(
                [
                    'status' => 200,
                    'message' => 'Profile Updated Succesfully!',
                    'data' => ''
                ]
            );
        }
        return response()->json(
            [
                'status' => 422,
                'message' => 'Please Upload Image!',
                'data' => ''
            ]
        );
    }

    public function updateGalleryImages(Request $request)
    {

        $req_file = 'image_gallery';
        $path = '/images/gallery';

        if ($request->hasFile($req_file)) {

            $uploadedFiles = $request->file($req_file);

            $currentGallery = Auth::user()->gallery;

            $newImages = saveMultipleImages($uploadedFiles, $path);
            $combinedImages = array_merge($currentGallery, $newImages);

            Auth::user()->update(['gallery' => $combinedImages]);

            return response()->json(
                [
                    'status' => 200,
                    'message' => 'Gallery Images Added Successfully!',
                    'data' => ''
                ]
            );
        }
        return response()->json(
            [
                'status' => 422,
                'message' => 'Please Upload Image!',
                'data' => ''
            ]
        );
    }

    public function deleteGalleryImage()
    {
        $request = json_decode(file_get_contents('php://input'), true);

        $galleryImage = $request['path'];

        $currentGallery = Auth::user()->gallery;
        $galleryImage = $galleryImage;

        $keyToDelete = array_search($galleryImage, $currentGallery);

        if ($keyToDelete !== false) {

            unset($currentGallery[$keyToDelete]);
            $currentGallery = array_values($currentGallery);

            Auth::user()->update(['gallery' => $currentGallery]);
        }

        deleteImage($galleryImage);

        return response()->json(
            [
                'status' => 200,
                'message' => 'Gallery Image Delete Successfully!',
                'data' => ''
            ]
        );
    }

    public function updateBasicInfoProfile(UpdateProfileBasicInfoValidationRequest $request)
    {

        $fileInputs = [
            // for wedding & hairStylist
            'public_liability_insurance' => '/images/wedding',

        ];
        foreach ($fileInputs as $reg_image => $path) {
            if ($request->hasFile($reg_image)) {

                $uploadedFiles = $request->file($reg_image);

                // Check if $uploadedFiles is an array or implements Countable
                if (is_array($uploadedFiles) || $uploadedFiles instanceof Countable) {

                    $fileCount = count($uploadedFiles);

                    if ($fileCount >= 1) {

                        // Multiple files were uploaded for this input
                        $savedImages = saveMultipleImages($uploadedFiles, $path);
                        $images[$reg_image] = $savedImages;
                    }
                } else {

                    // single files were uploaded for this input
                    $savedImage = saveSingleImage($uploadedFiles, $path);
                    $images[$reg_image] = $savedImage;
                }
            }
        }

        $rate = '';

        if ($request->stylist_rate == '') {
            $rate = $request->otherRate;
        } else {
            $rate = $request->stylist_rate;
        }

        $userData = match ($request->type) {
            'wedding', 'hairStylist', 'beautician', 'barber' => [
                'name' => $request->stylist_name,
                'surname' => $request->stylist_surname,
                'age' => $request->stylist_age,
                'profile_type' => $request->profile_type,
                'qualification' => $request->qualification,
                'utr_number' => $request->utr_number,
                'status' => $request->stylist_status,
                'public_liability_insurance' => $images['public_liability_insurance'] ?? '',
                'languages' => $request->stylist_language,
                'rate' => $rate,
                'zone' => $request->zone,
                'trade_video' => $request->video,
                'resume' => $request->stylist_resume,
                'phone' => $request->stylist_mobile,

            ],
            'hairdressingSalon', 'beautySalon', 'client' => [
                'name' => $request->owner_name,
                'surname' => $request->owner_surname,
                'phone' => $request->owner_telephone,
                'post_code' => $request->owner_postcode,
                'status' => $request->owner_status,
                'utr_number' => $request->utr_number,
                'address' => $request->owner_address,
                'password' => $request->owner_password,

            ],

            default => [],
        };

        Auth::user()->update($userData);

        return response()->json(
            [
                'status' => 200,
                'message' => 'Profile Updated Successfully!',
                'data' => ''
            ]
        );
    }

    public function updateProductAndServices(Request $request)
    {
        Auth::user()->update([
            'data' => $request->all(),
        ]);

        return response()->json(
            [
                'status' => 200,
                'message' => 'Product or Services Updated Successfully!',
                'data' => ''
            ]
        );
    }

    public function saveAvaibleDate(Request $request)
    {

        $request = json_decode(file_get_contents('php://input'), true);
        $availableDays = $request['availableDays'];
        $status = $request['Status'];

        $booking = Bookings::where('date', $availableDays)->first();

        if ($status == 'Cancel' && $booking) {
            $booking->delete();
            $message = 'Booking Deleted Successfully on ' . $availableDays;
        } else {
            $data = [
                'date' => $availableDays,
                'status' => $status,
                'user_id' => Auth::user()->id,
            ];

            if ($booking) {
                $booking->update($data);
                $message = 'Status Updated Successfully on ' . $availableDays;
            } else {
                Bookings::create($data);
                $message = 'Booking Date Added Successfully on ' . $availableDays;
            }
        }

        $responseData = [
            'status' => 200,
            'message' => $message,
            'data' => $status
        ];

        return response()->json($responseData);
    }

    public function showAppointmentDates()
    {
        $bookings = Bookings::User()->IsNotCancelled()->get();

        return response()->json(
            [
                'status' => 200,
                'message' => 'Date Created Successfully!',
                'data' => $bookings
            ]
        );
    }
}
