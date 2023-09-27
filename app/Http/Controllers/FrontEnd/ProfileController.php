<?php

namespace App\Http\Controllers\FrontEnd;

use Countable;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Bookings;
use App\Models\BookingSlots;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateProfileBasicInfoValidationRequest;
use App\Models\Appointments;

class ProfileController extends Controller
{
    public function getProfileData(Request $request)
    {
        if (isset($request->id) && $request->id != '') {
            $data = User::where('id', $request->id)->first();
        } else {
            $data = User::where('id', Auth::user()->id)->first();
        }

        return response()->json(
            [
                'data' => $data,
                'status' => 200
            ]
        );
    }
    public function getProfileDataView(Request $request)
    {
        if (isset($request->id) && $request->id != '') {
            $data = User::where('id', $request->id)->first();
        } else {
            $data = User::where('id', Auth::user()->id)->first();
        }

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

        $booking = Bookings::where(['date' => $availableDays, 'user_id' => Auth::id()])->first();

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

                $book_id = Bookings::create($data);
                if (Auth::user()->profile_type == 'Freelancer') {
                    BookingSlots::create([

                        'booking_id' => $book_id->id,
                        'start_time' => '00:01',
                        'end_time' => '23:59'

                    ]);
                }
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

    public function showAppointmentDates(Request $req)
    {

        $bookings = Bookings::where('user_id', Auth::id())->IsNotCancelled()->with('bookingTimeSlots')->get();
        $userprofile = User::where('id', Auth::id())->first();

        return response()->json(
            [
                'status' => 200,
                'message' => 'Date Created Successfully!',
                'data' => $bookings,
                'userprofile' => $userprofile
            ]
        );
    }
    public function showAppointmentDatesFreelancer(Request $req)
    {

        $bookings = Bookings::FreelancerUser($req->id)->IsNotCancelled()->with('bookingTimeSlots')->withCount('bookingTimeSlots')->get();
        $userprofile = User::where('id', $req->id)->first();
        return response()->json(
            [
                'status' => 200,
                'message' => 'Date Created Successfully!',
                'data' => $bookings,
                'userprofile' => $userprofile
            ]
        );
    }
    public function bookSlots(Request $request)
    {
        // Check if the user is not logged in
        if (!Auth::check()) {
            return response()->json([
                'status' => 422,
                'message' => 'Please log in to book a slot.',
            ]);
        }

        // Check if the user is not allowed to book a slot
        $allowedUserTypes = ['client', 'hairdressingSalon', 'beautySalon'];
        if (!in_array(Auth::user()->type, $allowedUserTypes)) {
            return response()->json([
                'status' => 422,
                'message' => 'Only salon owners or clients can book slots.',
            ]);
        }

        // Check if the slot is already booked
        $checkSlot = Appointments::where('booking_slot_id', $request->slot_book_id)->first();
        if ($checkSlot) {
            return response()->json([
                'status' => 422,
                'message' => 'Slot is already booked.',
            ]);
        }

        // Create a new appointment
        Appointments::create([
            'booking_slot_id' => $request->slot_book_id,
            'booking_user_id' => Auth::id(),
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Slot booked successfully!',
        ]);
    }
    public function saveAvaibleSlots(Request $request)
    {

        $validator =  Validator::make($request->all(), [
            'start_time' => 'required',
            'end_time' => 'required',

        ]);

        if ($validator->fails()) {
            // Return a JSON response with validation errors
            $firstError = $validator->errors()->first();
            return response()->json([
                'status' => 422,
                'message' => $firstError,
            ]);
        }

        $availableDays = $request->availableDate;
        $startTime  = $request->start_time;
        $endTime  = $request->end_time;
        $status = 'Available';

        $startDateTime = Carbon::createFromFormat('Y-m-d H:i', $availableDays . ' ' . $startTime);
        $endDateTime = Carbon::createFromFormat('Y-m-d H:i', $availableDays . ' ' . $endTime);

        //Check if 'start time' is less then 'end time'
        if ($startDateTime > $endDateTime) {

            $message = 'End Time must be greater than Start Time';
            return response()->json([
                'status' => 422,
                'message' => $message,
            ]);
        }

        // getting booking date from request
        $booking = Bookings::where('date', $availableDays)->first();
        $existingBooking = [];

        if ($booking) {
            $existingBooking = BookingSlots::where('booking_id', $booking->id)
                ->whereNotIn('id', [$request->slot_id])
                ->where(function ($query) use ($startDateTime, $endDateTime) {
                    $query->where(function ($query) use ($startDateTime, $endDateTime) {
                        $query->whereBetween('start_time', [$startDateTime, $endDateTime])
                            ->orWhereBetween('end_time', [$startDateTime, $endDateTime]);
                    });
                })->first();
        }

        // check booking is already created with in given time frame
        if ($existingBooking) {
            // Time range overlap found, return an error response
            $message = 'Time range already booked on the specified date';
            return response()->json([
                'status' => 422,
                'message' => $message,
            ]);
        }

        $data = [
            'date' => $availableDays,
            'status' => $status,
            'user_id' => Auth::user()->id,
        ];

        //check if booking is there while creating booking slot
        if (!$booking) {
            $newBooking = Bookings::create($data);
        } else {
            $newBooking = $booking;
        }
        // if booking is there then 
        $newBookingId = $newBooking->id;

        $data = [
            'booking_id' => $newBookingId,
            'start_time' => $startTime,
            'end_time' => $endTime
        ];


        $bookingSlot = BookingSlots::updateOrCreate(['id' => $request->slot_id], $data);

        if ($bookingSlot->wasRecentlyCreated) {
            $message = 'Time Slot Created Successfully! Against ' . $availableDays;
        } else {
            $message = 'Time Slot Updated Successfully! Against ' . $availableDays;
        }

        return response()->json([
            'status' => 200,
            'message' => $message,
        ]);
    }
}