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
use App\Models\Cart;
use App\Models\Cart_line;
use App\Models\Used_tokens;

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
            ],
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

                        'bookings_id' => $book_id->id,
                        'start_time' => '07:00',
                        'end_time' => '19:00'

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

        $bookings = Bookings::where('user_id', $req->id)
            ->IsNotCancelled()
            ->with(['bookingTimeSlots' => function ($query) {
                $query->whereDoesntHave('appointments');
            }])
            ->get();

        $userprofile = User::where('id', $req->id)->first();
        return response()->json([
            'status' => 200,
            'message' => 'Date Created Successfully!',
            'data' => $bookings,
            'userprofile' => $userprofile
        ]);
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

        if (isset($request->book_type) && $request->book_type == 'cart_book') {  // of cart booking then this code execution
            $userDetails = User::where('id', Auth::user()->id)->first();
            
            $tokens = $userDetails->tokens != null ? $userDetails->tokens : 0;

            $cartExist = Cart::where('user_id', Auth::user()->id)->where('slot_date', $request->book_date)->count();
            
            if ($tokens == 0 && $cartExist == 0) {
                return response()->json([
                    'status' => 422,
                    'message' => 'No enough tokens, first buy package.',
                ]);
            }

            $active_cart = Cart::where('user_id', Auth::user()->id)->where('status', 'active')->first();

            if (isset($active_cart->id)) {

                $cart = Cart::find($active_cart->id);
                $cart->client_id = $request->user_id;
                $cart->slot_id = $request->slot_book_id;
                $cart->slot_date = $request->book_date;
                $cart->status = 'checkout';
                $cart->update();

//                 Appointments::create([
//                     'booking_slots_id' => $request->slot_book_id,
//                     'booking_user_id' => Auth::id(),
//                 ]);

                if ($cartExist == 0) {
                    $user = User::find(Auth::user()->id);
                    $user->tokens = $tokens - 1;
                    $user->update();
                }
                
                $bookedUserDetails = User::where('id', $request->user_id)->first();
                $slotDetails = BookingSlots::where('id', $request->slot_book_id)->first();
                
                $slotStartTime = date('h:i A', strtotime($slotDetails->start_time));
                $slotEndTime = date('h:i A', strtotime($slotDetails->end_time));
                
                $body = "<table>
			                <tr>
			                    <td>Username:</td>
			                    <td>" . $userDetails['name'] . "</td>
			                </tr>
			              	<tr>
			                    <td>Booked Username:</td>
			                    <td>" . $bookedUserDetails['name'] . "</td>
			                </tr>
			                <tr>
			                    <td>Email:</td>
			                    <td>" . $userDetails['email'] . "</td>
			                </tr>
			                <tr>
			                    <td>Book Date:</td>
			                    <td>" . date('d-M-Y', strtotime($request->book_date)) . "</td>
			                </tr>
			              	<tr>
			                    <td>Slot Time:</td>
			                    <td>" . $slotStartTime . "-" . $slotEndTime ."</td>
			                </tr>
			           	</table>";
                $userEmailsSend[] = $userDetails['email'];
                $userEmailsSend[] = $bookedUserDetails['email'];
                $userEmailsSend[] = 'admin@styzeler.co.uk';
                
                sendMail($userDetails['name'], $userEmailsSend, 'Booking', 'Booking Email', $body);

                return response()->json([
                    'status' => 200,
                    'message' => 'Slot booked successfully.',
                ]);
            } else {
                return response()->json([
                    'status' => 422,
                    'message' => 'First add service in cart then proceed.',
                ]);
            }
        } else {
            // Check if the user is not allowed to book a slot
            $allowedUserTypes = ['hairdressingSalon', 'beautySalon']; //'client', 
            if (!in_array(Auth::user()->type, $allowedUserTypes)) {
                return response()->json([
                    'status' => 422,
                    'message' => 'Only salon owners can book slots.',
                ]);
            }

            // Check if the slot is already booked
            $checkSlot = Appointments::where('booking_slots_id', $request->slot_book_id)->first();
            if ($checkSlot) {
                return response()->json([
                    'status' => 422,
                    'message' => 'Slot is already booked.',
                ]);
            }

            //             // check user tokens
            //             $userDetails = User::where('id', Auth::user()->id)->first();

            //             $tokens = $userDetails->tokens != null ? $userDetails->tokens : 0;

            //             if ($tokens == 0) {
            //             	return response()->json([
            //             			'status' => 422,
            //             			'message' => 'No enough tokens, first buy package.',
            //             	]);
            //             }

            // Create a new appointment
            Appointments::create([
                'booking_slots_id' => $request->slot_book_id,
                'booking_user_id' => Auth::id(),
            ]);
            
            $bookedUserDetails = User::where('id', $request->user_id)->first();
            $slotDetails = BookingSlots::where('id', $request->slot_book_id)->first();
            
            $slotStartTime = date('h:i A', strtotime($slotDetails->start_time));
            $slotEndTime = date('h:i A', strtotime($slotDetails->end_time));
            
            $body = "<table>
			                <tr>
			                    <td>Username:</td>
			                    <td>" . $userDetails['name'] . "</td>
			                </tr>
			              	<tr>
			                    <td>Booked Username:</td>
			                    <td>" . $bookedUserDetails['name'] . "</td>
			                </tr>
			                <tr>
			                    <td>Email:</td>
			                    <td>" . $userDetails['email'] . "</td>
			                </tr>
			                <tr>
			                    <td>Book Date:</td>
			                    <td>" . date('d-M-Y', strtotime($request->book_date)) . "</td>
			                </tr>
			              	<tr>
			                    <td>Slot Time:</td>
			                    <td>" . $slotStartTime . "-" . $slotEndTime ."</td>
			                </tr>
			           	</table>";
            $userEmailsSend[] = $userDetails['email'];
            $userEmailsSend[] = $bookedUserDetails['email'];
            $userEmailsSend[] = 'admin@styzeler.co.uk';
            
            sendMail($userDetails['name'], $userEmailsSend, 'Booking', 'Booking Email', $body);

            return response()->json([
                'status' => 200,
                'message' => 'Slot booked successfully!',
            ]);
        }
    }
    public function saveAvaibleSlots(Request $request)
    {

        $validator =  Validator::make($request->all(), [
            'start_time' => 'required',
            'end_time' => 'required',
            // 'slot_id' => 'required|exists:booking_slots,id'

        ]);

        if ($validator->fails()) {
            // Return a JSON response with validation errors
            $firstError = $validator->errors()->first();
            return response()->json([
                'status' => 422,
                'message' => $firstError,
            ]);
        }

        // $availableDays = $request->availableDate;
        // $startTime  = $request->start_time;
        // $endTime  = $request->end_time;
        // $status = 'Available';

        // $startDateTime = Carbon::createFromFormat('Y-m-d H:i', $availableDays . ' ' . $startTime);
        // $endDateTime = Carbon::createFromFormat('Y-m-d H:i', $availableDays . ' ' . $endTime);

        // //Check if 'start time' is less then 'end time'
        // if ($startDateTime > $endDateTime) {

        //     $message = 'End Time must be greater than Start Time';
        //     return response()->json([
        //         'status' => 422,
        //         'message' => $message,
        //     ]);
        // }

        // // getting booking date from request
        // $booking = Bookings::where(['date' => $availableDays, 'user_id' => Auth::id()])->first();

        // $existingBooking = [];

        // if ($booking) {
        //     $existingBooking = BookingSlots::where('bookings_id', $booking->id)
        //         // ->whereNotIn('id', [$request->slot_id])
        //         ->where(function ($query) use ($startDateTime, $endDateTime) {
        //             $query->where(function ($query) use ($startDateTime, $endDateTime) {
        //                 $query->whereBetween('start_time', [$startDateTime, $endDateTime])
        //                     ->orWhereBetween('end_time', [$startDateTime, $endDateTime]);
        //             });
        //         })
        //         ->get();
        //     dd($existingBooking, $startDateTime, $endDateTime, $booking);
        // }

        // // check booking is already created with in given time frame
        // if ($existingBooking) {
        //     // Time range overlap found, return an error response
        //     $message = 'Time range already booked on the specified date';
        //     return response()->json([
        //         'status' => 422,
        //         'message' => $message,
        //     ]);
        // }
        $slotId = $request->slot_id;
        $startTime = $request->start_time;
        $endTime = $request->end_time;
        $availableDays = $request->availableDate;
        $status = 'Available';
        // Create Carbon instances for the new slot's start and end times
        $newStartTime = Carbon::parse($startTime)->format('H:i');
        $newEndTime = Carbon::parse($endTime)->format('H:i');

        // Check if 'start time' is less than 'end time'
        if ($newStartTime >= $newEndTime) {
            $message = 'End Time must be greater than Start Time';
            return response()->json([
                'status' => 422,
                'message' => $message,
            ]);
        }
        $booking = Bookings::where(['date' => $availableDays, 'user_id' => Auth::id()])->first();
        if ($booking) {
            $overlappingSlots = BookingSlots::where('bookings_id', $booking->id)
                ->where('id', '!=', $request->slot_id) // Exclude the slot_id in the request
                ->where(function ($query) use ($newStartTime, $newEndTime) {
                    $query->whereBetween('start_time', [$newStartTime, $newEndTime])
                        ->orWhereBetween('end_time', [$newStartTime, $newEndTime]);
                })
                ->first();

            // If overlapping slots are found, prevent the creation of the new slot
            if ($overlappingSlots) {
                $message = 'Time range already booked on the specified date';
                return response()->json([
                    'status' => 422,
                    'message' => $message,
                ]);
            }
        }
        $data = [
            'date' => $availableDays,
            'status' => $status,
            'user_id' => Auth::user()->id,
        ];
        $booking = Bookings::where(['date' => $availableDays, 'user_id' => Auth::id()])->first();
        //check if booking is there while creating booking slot
        if (!$booking) {
            $newBooking = Bookings::create($data);
        } else {
            $newBooking = $booking;
        }
        // if booking is there then 
        $newBookingId = $newBooking->id;

        $data = [
            'bookings_id' => $newBookingId,
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

    public function getfreelancerBooking()
    {
        $currentDate = now()->toDateString();
        if (Auth::user()->type == 'client') {
//             $getProfileData = Appointments::where(
//                 [
//                     ['booking_user_id', Auth::id()],
//                     // ['created_at', '>=', $currentDate]
//                 ]

//             )->with([
//                 'clientUser',
//                 'userBookingSlots',
//                 'userBookingSlots.bookings',
//                 'userBookingSlots.bookings.FreelancerUser'
//             ])->get();

        	$getProfileData = Cart::where('user_id', Auth::user()->id)->where('status', 'checkout')
						    	->with([
						    			'user',
						    			'booked_user',
						    			'userBookingSlots',
						    		])->get();
        } else {

            $getProfileData = Bookings::where(
                [
                    ['user_id', '=', Auth::id()],
                    ['date', '>=', $currentDate]
                ]

            )->with([
                'user',
                'bookingTimeSlots',
                'appointment_s',
                'appointment_s.userAppointment'
            ])->get();
        }
        return response()->json([
            'status' => 200,
            'appointments' => $getProfileData,
        ]);
    }
    public function getfreelancerBookingHistory()
    {
        $currentDate = now()->toDateString();

        $getProfileData = Bookings::where(
            [
                ['user_id', '=', Auth::id()],
                ['date', '<', $currentDate]
            ]

        )->with([
            'user',
            'bookingTimeSlots',
            'appointment_s',
            'appointment_s.userAppointment'
        ])->get();

        return response()->json([
            'status' => 200,
            'appointments' => $getProfileData,
        ]);
    }

    public function getClientTokens(Request $request)
    {

        if (!isset(Auth::user()->id)) {
            return response()->json(['status' => 500, 'message' => 'Login with client user first!', 'data' => '']);
        }

        $userDetails = User::where('id', Auth::user()->id)->first();

        return response()->json(['status' => 200, 'message' => '', 'data' => $userDetails]);
    }
    
    public function useOwnerTokens(Request $request)
    {
    
    	if (!isset(Auth::user()->id)) {
    		return response()->json(['status' => 500, 'message' => 'Login with client user first!', 'data' => '']);
    	}
    
    	$count = Used_tokens::where('user_id', Auth::user()->id)->where('date', date('Y-m-d'))->count();
    	
    	if($count <= 0){
    		User::where('id', Auth::user()->id)->first();
    	}
    	
    
    	return response()->json(['status' => 200, 'message' => '', 'data' => $userDetails]);
    }
}