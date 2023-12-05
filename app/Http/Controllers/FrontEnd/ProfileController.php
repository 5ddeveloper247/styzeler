<?php

namespace App\Http\Controllers\FrontEnd;

use Log;
use Illuminate\Support\Facades\File;
use Countable;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Bookings;
use App\Models\Cart_line;
use App\Models\Used_tokens;
use App\Models\Appointments;
use App\Models\BookingSlots;
use Illuminate\Http\Request;
use App\Models\User_review_like;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateProfileBasicInfoValidationRequest;

class ProfileController extends Controller
{
    public function getProfileData(Request $request)
    {
        if (isset($request->id) && $request->id != '') {
            $data = User::where('id', $request->id)
                ->first();
        } else {
            $data = User::where('id', Auth::user()->id)
                ->first();
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
            $data = User::where('id', $request->id)
                ->first();
        } else {
            $data = User::where('id', Auth::user()->id)
                ->first();
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

        $previous_image = User::where('id', Auth::user()->id)
            ->value('hero_image');

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
                // 'phone' => $request->stylist_mobile,

            ],
            'hairdressingSalon', 'beautySalon', 'client' => [
                'name' => $request->owner_name,
                'surname' => $request->owner_surname,
                // 'phone' => $request->owner_telephone,
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
                        'end_time' => '21:00',
                        'status' => $status

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

        $bookings = Bookings::where('user_id', Auth::id())
            ->IsNotCancelled()
            ->with('bookingTimeSlots')
            ->get();

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

        //         $bookings = Bookings::where('user_id', $req->id)
        //             ->IsNotCancelled()
        //             ->with(['bookingTimeSlots' => function ($query) {
        //                 $query->whereDoesntHave('appointments');
        //             }])
        //             ->get();
        $bookings = Bookings::where('user_id', $req->id)
            ->IsNotCancelled()
            ->with(
                ['bookingTimeSlots']
            )
            ->get();

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
            return response()->json(
                [
                    'status' => 422,
                    'message' => 'Please Log in to Book a Slot!',
                ]
            );
        }

        $userDetails = User::where('id', Auth::user()->id)->first();

        $tokens = $userDetails->tokens != null ? $userDetails->tokens : 0;

        if (isset($request->book_type) && $request->book_type == 'cart_book') {  // of cart booking then this code execution

            // $cartExist = Cart::where('user_id', Auth::user()->id)->where('slot_date', $request->book_date)->count();
            $appoExist = Appointments::where('booking_user_id', Auth::user()->id)
                ->where('booking_date', $request->book_date)
                ->count();

            $appoExistBooked = Appointments::where(
                [
                    'booking_user_id' => Auth::id(),
                    'booking_date' => $request->book_date,
                    'status' => 'Booked',
                ]
            )
                ->count();
            if ($tokens == 0 && $appoExist == 0) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Not Enough Tokens, First Buy Package!',
                ]);
            }

            $active_cart = Cart::where('user_id', Auth::user()->id)
                ->where('status', 'active')
                ->first();

            if (isset($active_cart->id)) {

                $userCart = Cart::with('cart_lines')
                    ->where('user_id', Auth::user()->id)
                    ->where('status', 'active')
                    ->first();

                $bookedUserDetails = User::where('id', $request->user_id)->first();
                $slotDetails = BookingSlots::where('id', $request->slot_book_id)->first();
                $bookingDetails = Bookings::where('id', $slotDetails->bookings_id)
                    ->with(['bookingTimeSlots'])
                    ->first();

                $cartServiceTimeMin = $userCart != null ? $userCart->cart_lines->sum('item_time_min') : 0;

                if ($slotDetails->slots_time != 'After_Nine') {
                    $totalServiceTime = $cartServiceTimeMin + 60;
                } else {
                    $totalServiceTime = $cartServiceTimeMin;
                }

                $serviceStartTime = Carbon::createFromFormat('H:i', $slotDetails->start_time);
                $serviceEndTime = $serviceStartTime->addMinutes($totalServiceTime)->format('H:i');

                if ($slotDetails->status == 'booked') {
                    return response()->json(
                        [
                            'status' => 422,
                            'message' => 'This Slot is Already Booked, Kindly Choose Different Time!',
                        ]
                    );
                }

                if ($slotDetails->slots_time != 'After_Nine') {

                    $slots = BookingSlots::where('bookings_id', $slotDetails->bookings_id)
                        ->whereBetween(
                            'start_time',
                            [
                                $slotDetails->start_time,
                                date('H:i', strtotime('-1 minutes', strtotime($serviceEndTime)))
                            ]
                        )
                        ->orderBy('start_time', 'asc')
                        ->get();

                    $total_slots_time = count($slots) * 30;

                    if (count($slots) > 0) {

                        // $firstindexSlots = isset($slots[0]) ? $slots[0] : '';
                        // $lastindexSlots = isset($slots[count($slots) - 1]) ? $slots[count($slots) - 1] : '';
                        if ($total_slots_time < $totalServiceTime) { //|| ($total_slots_time == $totalServiceTime) != true
                            return response()->json(
                                [
                                    'status' => 422,
                                    'message' => 'There is a Break Between the Slots, Kindly Choose Different Time!',
                                ]
                            );
                        }

                        $hasBookedSlot = $slots->contains(function ($slot) {
                            return $slot->status !== 'Available';
                        });

                        if ($hasBookedSlot) {
                            return response()->json(
                                [
                                    'status' => 422,
                                    'message' => 'There is a Booking Between the Slots, Kindly Choose Different Time!',
                                ]
                            );
                        }
                    } else {
                        return response()->json(
                            [
                                'status' => 422,
                                'message' => 'There is a Break Between the Slots, Kindly Choose Different Time!',
                            ]
                        );
                    }
                    $commaSeparatedSlotIds = $slots->pluck('id')->implode(',');

                    $slotIdsArray = explode(',', $commaSeparatedSlotIds);
                    $bookingDetails->status = 'Booked';
                    $bookingDetails->save();
                    BookingSlots::whereIn('id', $slotIdsArray)
                        ->update(
                            [
                                'status' => 'Booked'
                            ]
                        );

                    Appointments::create(
                        [
                            'booking_slots_id' => $commaSeparatedSlotIds,
                            'booking_date' => $bookingDetails->date,
                            'booking_time' => $slotDetails->start_time . ' - ' . $serviceEndTime,
                            'freelancer_user_id' => $request->user_id,
                            'booking_user_id' => Auth::id(),
                            'status' => 'Booked',
                        ]
                    );
                } else {
                    if ($totalServiceTime > 540) { // if user will chekout after 9 then restrict user to add services less then nxt morning 6 O'clock
                        return response()->json(
                            [
                                'status' => 422,
                                'message' => 'Unable to Book. Your Services are Exceeding the Time Limit. (i.e 540 minutes)',
                            ]
                        );
                    }

                    BookingSlots::where('id', $slotDetails->id)->update(
                        [
                            'end_time' => $serviceEndTime,
                            'slots_time' => $slotDetails->start_time . ' - ' . $serviceEndTime,
                            'status' => $request->on_hold ?? 'Booked',

                        ]
                    );

                    Appointments::create(
                        [
                            'booking_slots_id' => $slotDetails->id,
                            'booking_date' => $bookingDetails->date,
                            'booking_time' => $slotDetails->start_time . ' - ' . $serviceEndTime,
                            'freelancer_user_id' => $request->user_id,
                            'booking_user_id' => Auth::id(),
                            'status' => 'Booked',

                        ]
                    );
                }

                $cart = Cart::find($active_cart->id);
                $cart->client_id = $request->user_id;
                $cart->slot_id = $request->slot_book_id;
                $cart->slot_date = $request->book_date;
                $cart->status = 'checkout';
                $cart->update();


                if ($appoExistBooked == 0) {
                    $user = User::find(Auth::user()->id);
                    $user->tokens = $tokens - 1;
                    $user->update();
                }

                // $slotStartTime = date('h:i A', strtotime($slotDetails->start_time));
                // $slotEndTime = date('h:i A', strtotime($slotDetails->end_time));

                $body = "<table>
			                <tr>
			                    <td>Username:</td>
                                <td>" . $bookedUserDetails['name'] . "</td>
			                </tr>
			              	<tr>
			                    <td>Booked Username:</td>
			                    <td>" . $userDetails['name'] . "</td>
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
			                    <td>" . $slotDetails->start_time . "-" . $serviceEndTime . "</td>
			                </tr>
			           	</table>";
                $userEmailsSend[] = $userDetails['email'];
                $userEmailsSend[] = $bookedUserDetails['email'];
                $userEmailsSend[] = 'admin@styzeler.co.uk';

               // sendMail($userDetails['name'], $userEmailsSend, 'Booking', 'Booking Email', $body);

                $bookingDetails = Bookings::where('id', $slotDetails->bookings_id)
                    ->with(
                        [
                            'bookingTimeSlots'
                        ]
                    )
                    ->first();

                if (is_null($request->on_hold)) {
                    $message = "Booked";
                } else {
                    $message = "On Hold";
                }
                return response()->json(
                    [
                        'status' => 200,
                        'message' => "Slot $message Successfully!",
                        'data' => $bookingDetails,
                    ]
                );
            } else {
                return response()->json(
                    [
                        'status' => 422,
                        'message' => 'First Add Service in Cart then Proceed!',
                    ]
                );
            }
        } else {
            // Check if the user is not allowed to book a slot
            $allowedUserTypes = ['hairdressingSalon', 'beautySalon']; //'client',
            if (!in_array(Auth::user()->type, $allowedUserTypes)) {
                return response()->json(
                    [
                        'status' => 422,
                        'message' => 'Only Salon Owners Can Book Slots!',
                    ]
                );
            }

            // Check if the slot is already booked
            // $checkSlot = Appointments::query();
            // if (!empty($request->on_hold)) {
            //     $checkSlot = $checkSlot->with(['userBookingSlots' => function ($q) {
            //         $q->where('status', 'cancelled by');
            //     }]);
            // }
            // $checkSlot = $checkSlot->where('booking_slots_id', $request->slot_book_id)->first();
            $checkSlot = Appointments::query();

            if (!empty($request->on_hold)) {
                $checkSlot = $checkSlot->with(
                    [
                        'userBookingSlots' => function ($q) {
                            $q->where('status', 'LIKE', '%Cancelled by%');
                        }
                    ]
                );
            }

            $checkSlot = $checkSlot->where('booking_slots_id', $request->slot_book_id)->first();

            if ($checkSlot && !str_contains(strtolower($checkSlot->status), 'cancelled')) {
                return response()->json([
                    'status' => 422,
                    'message' => 'Slot is Already Booked.',
                ]);
            }

            //             // check user tokens


            $bookExist = Appointments::whereHas('userBookingSlots.bookings', function ($query) use ($request) {
                $query->where('date', $request->book_date);
            })
                ->where('booking_user_id', Auth::user()->id)
                ->with(
                    [
                        'userBookingSlots.bookings',
                        'userBookingSlots.bookings.FreelancerUser'
                    ]
                )
                ->count();

            if ($tokens == 0 && $bookExist == 0) {
                return response()->json(
                    [
                        'status' => 404,
                        'message' => 'Not Enough Tokens, First Buy Package!',
                    ]
                );
            }

            $message = "";
            $heading1 = '';
            $heading2 = '';
            $date_data = '';
            $email_user_name = '';
            $email_user_book_user = '';
            if (!empty($request->on_hold)) {
                $message = "On Hold";
                $heading1 = 'Booking On Hold';
                $heading2 = 'Booking Email On Hold';
                $date_data = 'On Hold';
                $email_user_name = 'Business Owner Name';
                $email_user_book_user = 'On Hold Freelancer Name';

                $userSelectedDate = Carbon::parse($request->book_date . ' ' . Carbon::now()->format('H:i'));

                $currentDateTime = Carbon::now();
                $modifiedDateTime = $currentDateTime->copy()->addHours(48); // Add 48 hours to a copy of the current date and time

                if ($userSelectedDate->lt($modifiedDateTime->format('Y-m-d'))) {
                    return response()->json(
                        [
                            'status' => 403,
                            'message' => 'Date Cannot be Choosed within 48 Hours',
                        ]
                    );
                }
            } else {
                $message = "Booked";
                $heading1 = 'Booking';
                $heading2 = 'Booking Email';
                $date_data = 'Book';
                $email_user_name = 'Username';
                $email_user_book_user = 'Booked Username';

                $modifiedDateTime = $request->book_date;
            }
            // Create a new appointment

            $get_last_time = Appointments::create(
                [
                    'booking_slots_id' => $request->slot_book_id,
                    'freelancer_user_id' => $request->user_id,
                    // 'booking_date' => empty($request->on_hold) ? $modifiedDateTime : $modifiedDateTime->format('Y-m-d'),
                    'booking_date' => $request->book_date,
                    'booking_time' => '07:00' . ' - ' . '21:00',
                    'booking_user_id' => Auth::id(),
                ]
            );

            BookingSlots::where('id', $request->slot_book_id)->update(
                [
                    'slots_time' => '07:00 AM - 09:00 PM',
                    'status' => $request->on_hold ?? 'Pending',
                ]
            );

            // if ($bookExist == 0 && empty($request->on_hold)) {
            //     $user = User::find(Auth::user()->id);
            //     $user->tokens = $tokens - 1;
            //     $user->update();
            // }

            $bookedUserDetails = User::where('id', $request->user_id)->first();
            $slotDetails = BookingSlots::where('id', $request->slot_book_id)->first();
            $bookingDetails = Bookings::where('id', $slotDetails->bookings_id)
                ->with(
                    [
                        'bookingTimeSlots'
                    ]
                )
                ->first();

            if (!empty($request->on_hold)) {
                $bookingDetails->status = 'On Hold';
                $bookingDetails->save();
            } else {
                $bookingDetails->status = 'Pending';
                $bookingDetails->save();
            }
            $slotStartTime = date('h:i A', strtotime($slotDetails->start_time));
            $slotEndTime = date('h:i A', strtotime($slotDetails->end_time));

            $body = "<table>
			                <tr>
			                    <td>" . $email_user_name . ":</td>
			                    <td>" . $bookedUserDetails['name'] . "</td>
			                </tr>
			              	<tr>
			                    <td>" . $email_user_book_user . ":</td>
			                    <td>" . $userDetails['name'] . "</td>
			                </tr>
			                <tr>
			                    <td>Email:</td>
			                    <td>" . $userDetails['email'] . "</td>
			                </tr>
			                <tr>
			                    <td>" . $date_data . " Date:</td>
			                    <td>" . date('d-M-Y', strtotime($request->book_date)) . "</td>
			                </tr>
			              	<tr>
			                    <td>Slot Time:</td>
			                    <td>" . $get_last_time->booking_time . "</td>
			                </tr>
                            <tr>
			                    <td>Status:</td>
			                    <td>" . $slotDetails->status . "</td>
			                </tr>
			           	</table>";
            $userEmailsSend[] = $bookedUserDetails['email'];
            $userEmailsSend[] = $bookedUserDetails['email'];
            $userEmailsSend[] = 'admin@styzeler.co.uk';

           // sendMail($bookedUserDetails['name'], $userEmailsSend, $heading1, $heading2, $body);

            return response()->json(
                [
                    'status' => 200,
                    'message' => "Request to Slot $message Successfully Send!",
                    'data' => $bookingDetails,
                ]
            );
        }
    }
    public function saveAvaibleSlots(Request $request)
    {

        $startTime = $request->start_time;
        $endTime = $request->end_time;

        $validator = Validator::make($request->all(), [
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

        if (($startTime < $endTime) == false || ($startTime == $endTime) == true) {

            $message = 'End Time Must be Greater than Start Time!';
            return response()->json(
                [
                    'status' => 422,
                    'message' => $message,
                ]
            );
        }

        $startDateTime = Carbon::parse($request->availableDate . ' ' . $startTime);
        $endDateTime = Carbon::parse($request->availableDate . ' ' . $endTime);
        $interval = 30; // 30 minutes

        $bookingSlots = [];

        while ($startDateTime < $endDateTime) {
            $slot = $startDateTime->format('H:i');
            $bookingSlots[] = $slot;
            $startDateTime->addMinutes($interval);
        }

        $availableDays = $request->availableDate;
        $status = 'Available';

        // Create Carbon instances for the new slot's start and end times
        $newStartTime = Carbon::parse($startTime)->format('H:i');
        $newEndTime = Carbon::parse($endTime)->format('H:i');

        $newStartTime = date('H:i', strtotime('+1 minutes', strtotime($newStartTime)));
        $newEndTime = date('H:i', strtotime('-1 minutes', strtotime($newEndTime)));

        // Check if 'start time' is less than 'end time'
        if ($newStartTime >= $newEndTime) {

            $message = 'End Time Must be Greater than Start Time!';
            return response()->json(
                [
                    'status' => 422,
                    'message' => $message,
                ]
            );
        }

        $booking = Bookings::where(['date' => $availableDays, 'user_id' => Auth::id()])->first();

        if ($booking) {

            if ($request->has('slots_time')) {
                $slots = BookingSlots::where(
                    [
                        'slots_time' => $request->slots_time,
                        'bookings_id' => $booking->id
                    ]
                )
                    ->get();

                $hasBookedSlot = $slots->contains(function ($slot) {
                    return $slot->status !== 'Available';
                });

                if ($hasBookedSlot) {
                    return response()->json(
                        [
                            'status' => 422,
                            'message' => 'Unable to Edit Slots. There is a Booking Exist in these Slots!',
                        ]
                    );
                }

                BookingSlots::where(['slots_time' => $request->slots_time, 'bookings_id' => $booking->id])->delete();
            }

            $overlappingSlots = BookingSlots::where('bookings_id', $booking->id)
                // ->where('id', '!=', $slotId) // Exclude the slot_id in the request
                ->where(function ($query) use ($newStartTime, $newEndTime) {
                    $query->whereBetween(
                        'start_time',
                        [$newStartTime, $newEndTime]
                    )
                        ->orWhereBetween(
                            'end_time',
                            [$newStartTime, $newEndTime]
                        );
                })
                ->first();

            // If overlapping slots are found, prevent the creation of the new slot
            if ($overlappingSlots) {
                $message = 'Time Range Already Booked on the Specified Date!';
                return response()->json(
                    [
                        'status' => 422,
                        'message' => $message,
                    ]
                );
            }
        }

        $data = [
            'date' => $availableDays,
            'status' => $status,
            'user_id' => Auth::user()->id,
        ];

        $booking = Bookings::where(
            [
                'date' => $availableDays,
                'user_id' => Auth::id()
            ]
        )
            ->first();

        //check if booking is there while creating booking slot
        if (!$booking) {
            $newBooking = Bookings::create($data);
        } else {
            $newBooking = $booking;
        }

        // if booking is there then
        $newBookingId = $newBooking->id;

        $start_slot_time = Carbon::parse($request->start_time)->format('h:i A');
        $end_slot_time = Carbon::parse($request->end_time)->format('h:i A');

        foreach ($bookingSlots as $bookingSlot) {
            $data = [
                'bookings_id' => $newBookingId,
                'start_time' => $bookingSlot,
                'end_time' => date('H:i', strtotime('+30 minutes', strtotime($bookingSlot))),
                'slots_time' => $start_slot_time . " - " . $end_slot_time,
                'status' => 'Available',
            ];
            $bookingSlot = BookingSlots::create($data);
        }



        if ($bookingSlot->wasRecentlyCreated) {
            $message = 'Time Slot Created Successfully! Against ' . $availableDays;
        } else {
            $message = 'Time Slot Updated Successfully! Against ' . $availableDays;
        }

        return response()->json(
            [
                'status' => 200,
                'message' => $message,
            ]
        );
    }

    public function getfreelancerBooking()
    {
        $currentDate = now()->toDateString();
        $allowedTypes = ['client', 'beautySalon', 'hairdressingSalon'];
        if (in_array(Auth::user()->type, $allowedTypes)) {

            $getProfileData = Appointments::where(
                [
                    ['booking_user_id', Auth::id()],
                    ['created_at', '>=', $currentDate],
                ]
            )->where(function ($query) {
                $query->where('status', 'not like', '%Cancelled%')
                    ->orWhereNull('status')
                    ->orWhere('status', '');
            })
                ->has('userBookingSlots')
                ->with(
                    [
                        'userBookingSlots',
                        'clientUser',
                        'freelancerAppUser',
                    ]
                )
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $getProfileData = Appointments::where(
                [
                    ['freelancer_user_id', Auth::id()],
                    ['created_at', '>=', $currentDate],
                ]
            )->where(function ($query) {
                $query->where('status', 'not like', '%Cancelled%')
                    ->orWhereNull('status')
                    ->orWhere('status', '');
            })
                ->has('userBookingSlots')
                ->with(
                    [
                        'userBookingSlots',
                        'clientAppUser',
                        'freelancerUser',
                    ]
                )
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return response()->json(
            [
                'status' => 200,
                'appointments' => $getProfileData,
            ]
        );
    }
    public function getfreelancerBookingHistory()
    {
        $currentDate = now()->toDateString();
        $allowedTypes = [
            'client',
            'beautySalon',
            'hairdressingSalon'
        ];

        if (in_array(Auth::user()->type, $allowedTypes)) {

            // $getProfileData = Appointments::where(
            //     [
            //         ['booking_user_id', Auth::id()],
            //         ['created_at', '<=', $currentDate]
            //     ]

            // )
            //     ->with(
            //         [
            //             'clientUser',
            //             'freelancerAppUser',
            //             'userBookingSlots',
            //         ]
            //     )
            //     ->orderBy('created_at', 'desc')
            //     ->get();

            $getProfileData = Appointments::where(function ($query) use ($currentDate) {
                $query->where([
                    ['booking_user_id', Auth::id()],
                    ['created_at', '<=', $currentDate],
                ])->orWhere([
                            ['booking_user_id', Auth::id()],
                            ['status', 'like', '%Cancelled%'],
                        ]);
            })
                ->whereNotNull('status')
                ->with([
                    'clientUser',
                    'freelancerAppUser',
                    'userBookingSlots',
                ])
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $getProfileData = Appointments::where(function ($query) use ($currentDate) {
                $query->where([
                    ['freelancer_user_id', Auth::id()],
                    ['created_at', '<=', $currentDate],
                ])->orWhere([
                            ['freelancer_user_id', Auth::id()],
                            ['status', 'like', '%Cancelled%'],
                        ]);
            })
                ->whereNotNull('status')
                ->with([
                    'clientAppUser',
                    'freelancerUser',
                    'userBookingSlots',
                ])
                ->orderBy('created_at', 'desc')
                ->get();
        }

        // $getProfileData = Bookings::where(
        //     [
        //         ['user_id', '=', Auth::id()],
        //         ['date', '<', $currentDate]
        //     ]

        // )->with([
        //     'user',
        //     'bookingTimeSlots',
        //     'appointment_s',
        //     'appointment_s.userAppointment'
        // ])->get();

        return response()
            ->json(
                [
                    'status' => 200,
                    'appointments' => $getProfileData,
                ]
            );
    }

    public function getClientTokens(Request $request)
    {

        if (!isset(Auth::user()->id)) {
            return response()
                ->json(
                    [
                        'status' => 500,
                        'message' => 'Login with client user first!',
                        'data' => ''
                    ]
                );
        }

        $userDetails = User::where('id', Auth::user()->id)->first();

        return response()
            ->json(
                [
                    'status' => 200,
                    'message' => '',
                    'data' => $userDetails
                ]
            );
    }

    public function useOwnerTokens(Request $request)
    {

        if (!isset(Auth::user()->id)) {
            return response()
                ->json(
                    [
                        'status' => 500,
                        'message' => 'Kindly Login First!',
                        'data' => ''
                    ]
                );
        }

        $userDetails = User::where('id', Auth::user()->id)->first();
        $weddingUserDetails = User::where('id', $request->freelancerId)->first();
        $remainingTokens = (isset($userDetails->tokens) && $userDetails->tokens != null) ? $userDetails->tokens : 0;
        $count = Used_tokens::where('user_id', Auth::user()->id)
            ->where('freelancer_id', $request->freelancerId)
            ->where('date', date('Y-m-d'))
            ->count();

        if ($count <= 0) {

            $tokens = (isset($userDetails->tokens) && $userDetails->tokens != null) ? $userDetails->tokens : 0;

            if ($tokens == 0) {
                return response()
                    ->json(
                        [
                            'status' => 400,
                            'message' => 'Insufficient Tokens, You Need To Buy Package First!',
                            'data' => ''
                        ]
                    );
            }


            $used_tokens = new Used_tokens();
            $used_tokens->user_id = Auth::user()->id;
            $used_tokens->freelancer_id = $request->freelancerId;
            $used_tokens->date = date('Y-m-d');
            $used_tokens->save();

            $user = User::find(Auth::user()->id);
            $user->tokens = $tokens - 1;
            $user->update();

            $body = "<table>
			                <tr>
			                    <td>Username:</td>
                                <td>" . $userDetails->name . " " . $userDetails->surname . "</td>
			                </tr>
			              	<tr>
			                    <td>Email:</td>
			                    <td>" . $userDetails->email . "</td>
			                </tr>
			                <tr>
			                    <td colspan='2'>This client want to contact you for booking. Please contact with this person for future bookings. Thanks</td>
			                </tr>
			            </table>";
            $userEmailsSend[] = $weddingUserDetails->email;

            //sendMail($userDetails->name, $userEmailsSend, 'Booking', 'Booking Contact Email', $body);

            $body1 = "<table>
			                <tr>
			                    <td>Username:</td>
                                <td>" . $weddingUserDetails->name . " " . $weddingUserDetails->surname . "</td>
			                </tr>
			              	<tr>
			                    <td>Email:</td>
			                    <td>" . $weddingUserDetails->email . "</td>
			                </tr>
			                <tr>
			                    <td colspan='2'>Your contact request is sent to concerned person, he will contact you soon for booking. Thanks</td>
			                </tr>

			           	</table>";
            $userEmailsSend1[] = $userDetails->email;

           // sendMail($userDetails->name, $userEmailsSend1, 'Contact', 'Contact Email', $body1);
        }

        return response()
            ->json(
                [
                    'status' => 200,
                    'message' => 'Your Request is Successfully Sent, Concerned Person will Contact You Soon!',
                    'data' => $userDetails
                ]
            );
    }

    public function updateAfterNineSlot(Request $request)
    {

        $booking = Bookings::firstOrNew([
            'date' => $request->availableDate,
            'user_id' => Auth::id()
        ]);

        if (!$booking->exists) {
            $booking->status = 'Available';
            $booking->save();
        }

        $afterNineExist = BookingSlots::where(
            [
                'bookings_id' => $booking->id,
                'slots_time' => 'After_Nine'
            ]
        )
            ->first();

        if (!$afterNineExist && $request->check_slot == 'on') {
            BookingSlots::create(
                [
                    'bookings_id' => $booking->id,
                    'start_time' => '21:00',
                    'slots_time' => "After_Nine",
                    'status' => 'Available',
                ]
            );

            return response()
                ->json(
                    [
                        'status' => 200,
                        'message' => 'Slot Added Successfully!',
                        'data' => ''
                    ]
                );
        } elseif ($afterNineExist) {
            if ($afterNineExist->status == 'booked') {
                return response()
                    ->json(
                        [
                            'status' => 403,
                            'message' => 'Slot Already Booked!',
                            'data' => ''
                        ]
                    );
            }
            if ($request->check_slot == 'off') {
                $afterNineExist->delete();
                return response()
                    ->json(
                        [
                            'status' => 200,
                            'message' => 'Slot Deleted Successfully!',
                            'data' => ''
                        ]
                    );
            }
        }
    }

    public function cancelAppointment(Request $request)
    {
        $appId = $request->app_id;
        $cancel_time = $request->cancel_time;
        $cancel_by = formatUserType($request->cancel_by);

        $getAppointmentData = Appointments::where('id', $appId)
            ->has('userBookingSlots')
            ->with(
                [
                    'userBookingSlots.bookings'
                    => function ($q) {
                        $q->update(
                            [
                                'status' => 'Available'
                            ]
                        );
                    }
                ]
            )
            ->first();

        $getAppointmentCreatedTime = $getAppointmentData->created_at;
        $getAppointmentBookingDate = $getAppointmentData->booking_date;
        $getAppointmentBookingTime = $getAppointmentData->booking_time;
        $getAppointmentBookingUserId = $getAppointmentData->booking_user_id;

        // $token_not_remove = BookingSlots::where('id', $getAppointmentData->booking_slots_id)->value('status');
        $timeNow = now();
        $hoursDifference = $timeNow->diffInHours($getAppointmentCreatedTime);

        if ($hoursDifference > 24) {
            return response()
                ->json(
                    [
                        'status' => 403,
                        'message' => 'You Cannot Cancel This Booking!',
                        'data' => ''
                    ]
                );
        }

        $getAppointmentDataArray = explode(',', $getAppointmentData->booking_slots_id);
        $bookinkSlots = BookingSlots::whereIn('id', $getAppointmentDataArray);
        if ($cancel_time == '21') {
            $bookinkSlots = $bookinkSlots->update(
                [
                    "status" => "Available",
                    'slots_time' => 'After_Nine',
                    'end_time' => null
                ]
            );
        } else {
            if ($cancel_by != 'Client' || $cancel_by != 'client') {
                $bookinkSlots = $bookinkSlots->update(
                    [
                        "status" => "Available",
                    ]
                );
            } else {
                $bookinkSlots = $bookinkSlots->update(
                    [
                        "status" => "Available",
                        'slots_time' => null
                    ]
                );
            }
        }

        $clientUser = User::where('id', $getAppointmentData->booking_user_id)->first();
        $freelancerUser = User::where('id', $getAppointmentData->freelancer_user_id)->first();
        // $appoExist = Appointments::where(
        //     [
        //         'id' => $appId,
        //         'booking_user_id' => $getAppointmentBookingUserId,
        //         'booking_date' => $getAppointmentBookingDate
        //     ]
        // )
        //     ->count();
        $appoExistBooked = Appointments::where(
            [
                'booking_user_id' => $getAppointmentBookingUserId,
                'booking_date' => $getAppointmentBookingDate,
                'status' => 'Booked',
            ]
        )
            ->count();
        if ($appoExistBooked == 1 && ($getAppointmentData->status == 'Booked' || $clientUser->type == 'client')) {
            User::where('id', $clientUser->id)->update(
                [
                    'tokens' => $clientUser->tokens + 1
                ]
            );
        }

        $getAppointmentData->status = 'Cancelled by ' . $cancel_by;
        $getAppointmentData->confirmed_by = null;
        $getAppointmentData->save();
        // $getAppointmentData->delete();

        $body = "<table>
                    <tr>
                        <td>Username: Booking cancel with " . $freelancerUser->name . " " . $freelancerUser->surname . "</td>
                    </tr>
                    <tr>
                        <td>Email: " . $freelancerUser->email . "</td>
                    </tr>
                    <tr>
                        <td>Booking Date: " . $getAppointmentBookingDate . "</td>
                    </tr>
                    <tr>
                        <td>Booking time: " . $getAppointmentBookingTime . "</td>
                    </tr>
                    <tr>
                        <td>Cancelled By: " . Auth::user()->name . " " . Auth::user()->surname . "</td>
                    </tr>
                </table>";

        $userEmailsSend = $clientUser->email;

      //  sendMail($clientUser->name, $userEmailsSend, 'Cancel Booking', 'Cancel Booking Email', $body);

        $body1 = "<table>
                    <tr>
                        <td>Username: Booking cancel with " . $clientUser->name . " " . $clientUser->surname . "</td>
                    </tr>
                    <tr>
                        <td>Email: " . $clientUser->email . "</td>
                    </tr>
                    <tr>
                        <td>Booking Date: " . $getAppointmentBookingDate . "</td>
                    </tr>
                    <tr>
                        <td>Booking time: " . $getAppointmentBookingTime . "</td>
                    </tr>
                    <tr>
                        <td>Cancelled By: " . Auth::user()->name . " " . Auth::user()->surname . "</td>
                    </tr>
                </table>";

        $userEmailsSend1 = $freelancerUser->email;

       // sendMail($clientUser->name, $userEmailsSend1, 'Cancel Booking', 'Cancel Booking Email', $body1);

        $body1 = "<table>
                    <tr>
                        <td>Client Name: " . $clientUser->name . " " . $clientUser->surname . "</td>
                    </tr>
                    <tr>
                        <td>Freelancer Name: " . $freelancerUser->name . " " . $freelancerUser->surname . "</td>
                    </tr>
                    <tr>
                        <td>Client Email: " . $clientUser->email . "</td>
                    </tr>
                    <tr>
                        <td>Freelancer Email: " . $freelancerUser->email . "</td>
                    </tr>
                    <tr>
                        <td>Booking Date: " . $getAppointmentBookingDate . "</td>
                    </tr>
                    <tr>
                        <td>Booking time: " . $getAppointmentBookingTime . "</td>
                    </tr>
                    <tr>
                        <td>Cancelled By: " . Auth::user()->name . " " . Auth::user()->surname . "</td>
                    </tr>
                </table>";

        $userEmailsSend2 = 'admin@styzeler.co.uk';

      //  sendMail($clientUser->name, $userEmailsSend2, 'Cancel Booking', 'Cancel Booking Email', $body1);

        return response()->json([
            'status' => 200,
            'message' => 'Booking Cancel Successfully!',
            'data' => ''
        ]);
    }

    public function submitFeedbackOwner(Request $request)
    {

        if (!isset(Auth::user()->id)) {
            return response()->json(
                [
                    'status' => 500,
                    'message' => 'Login with Owner or Client User First!',
                    'data' => ''
                ]
            );
        }

        if (in_array(Auth::user()->type, ['wedding', 'hairStylist', 'beautician', 'barber'])) {
            return response()->json(
                [
                    'status' => 500,
                    'message' => 'Login with Owner or Client User First!',
                    'data' => ''
                ]
            );
        }

        if ($request->ownerRemarks == null || $request->ownerRemarks == '') {
            return response()->json(
                [
                    'status' => 500,
                    'message' => 'Unable to Send Empty Feedback!',
                    'data' => ''
                ]
            );
        }

        $feedback = new User_review_like();

        $feedback->user_id = Auth::user()->id;
        $feedback->freelancer_id = $request->feedbackFreelancerId;
        $feedback->feedback_type = $request->feedbackType;
        $feedback->remarks = $request->ownerRemarks;
        $feedback->date = date('Y-m-d');
        $feedback->save();

        $feedback = User_review_like::where('freelancer_id', $request->feedbackFreelancerId)
            ->with('user', 'freelancer')
            ->get();

        return response()->json(
            [
                'status' => 200,
                'message' => 'Feedback Send Successfully!',
                'data' => $feedback
            ]
        );
    }

    public function loadFeedbackFreelancer(Request $request)
    {
        if (isset($request->freelancerId) && $request->freelancerId != '') {

            $feedback = User_review_like::where('freelancer_id', $request->freelancerId)
                ->with('user', 'freelancer')
                ->get();

            return response()
                ->json(
                    [
                        'status' => 200,
                        'message' => '',
                        'data' => $feedback
                    ]
                );
        } else {
            return response()
                ->json(
                    [
                        'status' => 500,
                        'message' => 'Something Went Wrong!',
                        'data' => ''
                    ]
                );
        }
    }


    public function onHoldBooking(Request $request)
    {
        $appointment = Appointments::where('id', $request->app_id)
            ->with(
                [
                    'userAppointment',
                    'bookedFreelancer',
                    'userBookingSlots'
                    => function ($q) use ($request) {
                        $q->update(
                            [
                                'status' => $request->status
                            ]
                        );
                    }
                ]
            )
            ->first();

        $message = '';
        $on_hold = "On Hold";
        if (str_contains(strtolower($request->status), 'confirmed by')) {
            $message = 'On Hold Confirmed Successfully!';
        } elseif (str_contains(strtolower($request->status), 'cancelled by')) {
            $appointment->status = $request->status;
            $appointment->confirmed_by = null;
            $appointment->save();
            BookingSlots::where('id', $appointment->booking_slots_id)
                ->with(
                    [
                        'bookings' => function ($q) {
                            $q->update(
                                [
                                    'status' => 'Available'
                                ]
                            );
                        }
                    ]
                )->first();

            $message = 'On Hold Cancelled Successfully!';
        } elseif (str_contains(strtolower($request->status), 'booked')) {
            $appointment->status = 'Booked';
            $appointment->confirmed_by = Auth::id();
            $appointment->save();
            BookingSlots::where('id', $appointment->booking_slots_id)
                ->with(
                    [
                        'bookings' => function ($q) {
                            $q->update(
                                [
                                    'status' => 'Booked'
                                ]
                            );
                        }
                    ]
                )
                ->first();

            $user = User::where('id', Auth::id())->first();
            $user->tokens = $user->tokens - 1;
            $user->update();

            $message = 'On Hold Booked Successfully!';
        }
        ;

        if ($appointment) {

            $body1 = "<table>
                    <tr>
                        <td>Business Owner Name: " . $appointment->userAppointment->name . " " . $appointment->userAppointment->surname . "</td>
                    </tr>
                    <tr>
                        <td>Freelancer Name: " . $appointment->bookedFreelancer->name . " " . $appointment->bookedFreelancer->surname . "</td>
                    </tr>
                    <tr>
                        <td>Business Owner Email: " . $appointment->userAppointment->email . "</td>
                    </tr>
                    <tr>
                        <td>Freelancer Email: " . $appointment->bookedFreelancer->email . "</td>
                    </tr>
                    <tr>
                        <td>$on_hold Date: " . $appointment->booking_date . "</td>
                    </tr>
                    <tr>
                        <td>Slot time: " . $appointment->booking_time . "</td>
                    </tr>
                    <tr>
                        <td>Status: " . $appointment->userBookingSlots->status . "</td>
                    </tr>
                </table>";

            $sendEmailTo = ['admin', 'owner', 'freelancer'];

            foreach ($sendEmailTo as $user_type) {
                if ($user_type == 'admin') {
                    $admin = User::where('type', $user_type)->first();
                  //  sendMail($admin->name, $admin->email, "Booking $on_hold", "Booking $on_hold Email", $body1);
                } else if ($user_type == 'freelancer') {
                    $freelancer = User::findOrFail($appointment->freelancer_user_id);
                   // sendMail($freelancer->name, $freelancer->email, "Booking $on_hold", "Booking $on_hold Email", $body1);
                } else if ($user_type == 'owner') {
                    $freelancer = User::findOrFail($appointment->booking_user_id);
                  //  sendMail($freelancer->name, $freelancer->email, "Booking $on_hold", "Booking $on_hold Email", $body1);
                }
            }

            return response()
                ->json(
                    [
                        'status' => 200,
                        'message' => $message,
                        'data' =>
                            [
                                'app_id' => $request->app_id,
                                'status' => $request->status
                            ]
                    ]
                );
        } else {
            return response()
                ->json(
                    [
                        'status' => 500,
                        'message' => 'Something went wrong!',
                        'data' => ''
                    ]
                );
        }
    }




    
    public function confirmBooking(Request $request)
    {
        $appointment = Appointments::where('id', $request->app_id)
            ->with(
                [
                    'userAppointment',
                    'bookedFreelancer',
                    'userBookingSlots'
                    => function ($q) use ($request) {
                        $q->update(
                            [
                                'status' => $request->status
                            ]
                        );
                    }
                ]
            )
            ->first();

        $message = '';

        if (str_contains(strtolower($request->status), 'booked')) {

            BookingSlots::where('id', $appointment->booking_slots_id)
                ->with(
                    [
                        'bookings' => function ($q) {
                            $q->update(
                                [
                                    'status' => 'Booked'
                                ]
                            );
                        }
                    ]
                )
                ->first();
            $appointment->status = $request->status;
            $appointment->save();
            $user = User::where('id', $appointment->booking_user_id)->first();
            $user->tokens = $user->tokens - 1;
            $user->update();
            $message = 'Booking Confirmed Successfully!';
        }
        ;

        if ($appointment) {

            $body1 = "<table>
                    <tr>
                        <td>Business Owner Name: " . $appointment->userAppointment->name . " " . $appointment->userAppointment->surname . "</td>
                    </tr>
                    <tr>
                        <td>Freelancer Name: " . $appointment->bookedFreelancer->name . " " . $appointment->bookedFreelancer->surname . "</td>
                    </tr>
                    <tr>
                        <td>Business Owner Email: " . $appointment->userAppointment->email . "</td>
                    </tr>
                    <tr>
                        <td>Freelancer Email: " . $appointment->bookedFreelancer->email . "</td>
                    </tr>
                    <tr>
                        <td>Booking Date: " . $appointment->booking_date . "</td>
                    </tr>
                    <tr>
                        <td>Slot time: " . $appointment->booking_time . "</td>
                    </tr>
                    <tr>
                        <td>Status: " . $appointment->userBookingSlots->status . "</td>
                    </tr>
                </table>";

            $sendEmailTo = [
                'admin',
                'owner',
                'freelancer'
            ];

            foreach ($sendEmailTo as $user_type) {
                if ($user_type == 'admin') {
                    $admin = User::where('type', $user_type)->first();
                  //  sendMail($admin->name, $admin->email, "Booking Confirm", "Booking Confirm Email", $body1);
                } else if ($user_type == 'freelancer') {
                    $freelancer = User::findOrFail($appointment->freelancer_user_id);
                  //  sendMail($freelancer->name, $freelancer->email, "Booking Confirm", "Booking Confirm Email", $body1);
                } else if ($user_type == 'owner') {
                    $freelancer = User::findOrFail($appointment->booking_user_id);
                   // sendMail($freelancer->name, $freelancer->email, "Booking Confirm", "Booking Confirm Email", $body1);
                }
            }

            return response()
                ->json(
                    [
                        'status' => 200,
                        'message' => $message,
                        'data' =>
                            [
                                'app_id' => $request->app_id,
                                'status' => $request->status
                            ]
                    ]
                );
        } else {
            return response()
                ->json(
                    [
                        'status' => 500,
                        'message' => 'Something Went Wrong!',
                        'data' => ''
                    ]
                );
        }
    }










    public function checkOnHold()
{

    $logFilePath = storage_path('logs/custom.log');
    Log::channel('custom')->info('1');
    Log::channel('custom')->info('checkOnHold Cron started.');
    Log::channel('custom')->info('Cron Start date and time: ' . now('Asia/Karachi'));

    $check_appointment = Appointments::whereHas('userBookingSlots', function ($q) {
        // $q->where('status', 'Confirmed by Freelancer');
         $q->where('status', 'Cancelled by Freelancer');
    })->with(['userBookingSlots.bookings'])->get();
     // dd($check_appointment);
    // if (true) {
 
    if ($check_appointment->isNotEmpty()) {
        foreach ($check_appointment as $appointment) {
            $freelancer_user = User::find($appointment->freelancer_user_id); 
            $booking_user = User::find($appointment->booking_user_id);
            $appointment_date = Carbon::parse($appointment->created_at)->addHours(36);
            $diff_in_time = now()->diffInHours($appointment_date);

            if ( true) {
                $bookingSlot = $appointment->userBookingSlots;
                $bookings = $bookingSlot->bookings;
                // dd($bookings);

                if (!is_null($bookingSlot) && !is_null($bookings)) {
                    $bookingSlot->update(['status' => 'Available', 'slots_time' => null]);
                    $bookings->update(['status' => 'Available']);
                    $appointment->update(['status' => 'Cancelled Due to Expiry of Time']);

                    Log::channel('custom')->info("Booking cancelled successfully. Appointment details: " . json_encode($appointment));

                    $body1 = "<table>
                        <tr><td>Business Owner Name: $booking_user->name </td></tr>
                        <tr><td>Freelancer Name: $freelancer_user->name</td></tr>
                        <tr><td>Business Owner Email: $booking_user->email</td></tr>
                        <tr><td>Freelancer Email: $freelancer_user->email</td></tr>
                        <tr><td>Booking Date: $appointment->booking_date</td></tr>
                        <tr><td>Status: Cancelled Due to Time Expire</td></tr>
                    </table>";

                    $sendEmailTo = ['admin', 'owner', 'freelancer'];

                    foreach ($sendEmailTo as $user_type) {
                        if ($user_type == 'admin') {
                            $admin = User::where('type', $user_type)->first();
                          //  sendMail($admin->name, $admin->email, "Booking Cancelled", "Booking Cancelled Email", $body1);
                            Log::channel('custom')->info("Email Sent to Admin");
                        } else if ($user_type == 'freelancer') {
                         //   sendMail($freelancer_user->name, $freelancer_user->email, "Booking Cancelled", "Booking Cancelled Email", $body1);
                            Log::channel('custom')->info("Email Sent to freelancer");
                        } else if ($user_type == 'owner') {
                        //    sendMail($booking_user->name, $booking_user->email, "Booking Cancelled", "Booking Cancelled Email", $body1);
                            Log::channel('custom')->info("Email Sent to Owner");
                        }
                    }   
                } 
                else{
                    Log::channel('custom')->info("Booking not cancelled. Booking slots and booking information is missing: " .   Log::channel('custom')->info("Booking not cancelled. due to difference in time Appointment details: " . "Difference in time" . $diff_in_time . " Appointment Detail" . json_encode($appointment)));
                } 
            }
            // else {
            //     Log::channel('custom')->info("Booking not cancelled. due to difference in time Appointment details: " . "Difference in time" . $diff_in_time . " Appointment Detail" . json_encode($appointment));
            // }
        }
    } 

    else {
        Log::channel('custom')->info("No Appointments found, No data found for cancellation");
    }

    Log::channel('custom')->info('Cron end date and time: ' . now('Asia/Karachi'));
    Log::channel('custom')->info('checkOnHold Cron finished.');
}

















public function checkOnPending()
{
    //dd(now());
    Log::channel('custom')->info('2');
    Log::channel('custom')->info('checkOnPendidng Cron started.');
    Log::channel('custom')->info('Cron Start date and time: ' . now('Asia/Karachi'));
    $appointments = Appointments::where('status', null)
        ->whereHas('userBookingSlots', function ($query) {
            $query->whereHas('bookings', function ($query) {
                $query->where('status', 'pending');
            });
        })
        ->with(['userBookingSlots.bookings', 'userBookingSlots'])
        ->get();
       // dd($appointments);


    if ($appointments->isNotEmpty()) {
        
      
        foreach ($appointments as $appointment) {
         //   dd($appointment->created_at);
            $freelancer_user = User::find($appointment->freelancer_user_id);
            $booking_user = User::find($appointment->booking_user_id);
            $appointment_date = Carbon::parse($appointment->created_at)->addHours(3);
        //  dd($appointment_date->lessThan(now()) && $appointment->userBookingSlots->bookings->status == 'Pending');
               
            if ($appointment_date->lessThan(now()) && $appointment->userBookingSlots->bookings->status == 'Pending') {
              
                $bookingSlot = $appointment->userBookingSlots;
                $bookings = $bookingSlot->bookings;
           // dd( $bookings->status);

                if (!is_null($bookingSlot) && !is_null($bookings)) {
                    $bookingSlot->status = 'Available';
                    $bookingSlot->save();

                    $bookings->status='Available';
                    $bookings->save(); 

                    $appointment->update(['status' => ' cancelled Due to Expiry of Time']);
                 
                    Log::channel('custom')->info("Booking cancelled successfully. Appointment details: " . json_encode($appointment));

                    $body1 = "<table>
                        <tr><td>Business Owner Name: $booking_user->name </td></tr>
                        <tr><td>Freelancer Name: $freelancer_user->name</td></tr>
                        <tr><td>Business Owner Email: $booking_user->email</td></tr>
                        <tr><td>Freelancer Email: $freelancer_user->email</td></tr>
                        <tr><td>Booking Date: $appointment->booking_date</td></tr>
                        <tr><td>Status: Cancelled Due to Expiry of Time</td></tr>
                    </table>";

                    $sendEmailTo = ['admin', 'owner', 'freelancer'];
                    foreach ($sendEmailTo as $user_type) {
                        if ($user_type == 'admin') {
                            $admin = User::where('type', $user_type)->first();
                           // sendMail($admin->name, $admin->email, "Booking Cancelled", "Booking Cancelled Email", $body1);
                            Log::channel('custom')->info("Email Sent to Admin");
                        } elseif ($user_type == 'freelancer') {
                          //  sendMail($freelancer_user->name, $freelancer_user->email, "Booking Cancelled", "Booking Cancelled Email", $body1);
                            Log::channel('custom')->info("Email Sent to Freelancer");
                        } elseif ($user_type == 'owner') {
                          //  sendMail($booking_user->name, $booking_user->email, "Booking Cancelled", "Booking Cancelled Email", $body1);
                            Log::channel('custom')->info("Email Sent to Owner");
                        }
                    }
                } 

                else {
                    Log::channel('custom')->info("Booking not cancelled. Booking slots and booking information is missing: " . "Difference in time Appointment details");
                }
            } 
        }
    }
     else {
        Log::channel('custom')->info("Booking not cancelled. empty record found for cancellation: ");
    }
    Log::channel('custom')->info('Cron end date and time: ' . now('Asia/Karachi'));
    Log::channel('custom')->info('checkOnPending Cron finished.');
}






//             if ( $diff_in_time < 12) {
//                 $bookingSlot = $appointment->userBookingSlots->first();
//                 $bookings = $bookingSlot->bookings;

//                 if (!is_null($bookingSlot) && !is_null($bookings)) {
//                     $bookingSlot->update(['status' => 'Available', 'slots_time' => null]);
//                     $bookings->update(['status' => 'Available']);
//                     $appointment->update(['status' => 'Cancelled Due to Expiry of Time']);

//                     Log::channel('custom')->info("Booking cancelled successfully. Appointment details: " . json_encode($appointment));

//                     $body1 = "<table>
//                         <tr><td>Business Owner Name: $booking_user->name </td></tr>
//                         <tr><td>Freelancer Name: $freelancer_user->name</td></tr>
//                         <tr><td>Business Owner Email: $booking_user->email</td></tr>
//                         <tr><td>Freelancer Email: $freelancer_user->email</td></tr>
//                         <tr><td>Booking Date: $appointment->booking_date</td></tr>
//                         <tr><td>Status: Cancelled Due to Time Expire</td></tr>
//                     </table>";

//                     $sendEmailTo = ['admin', 'owner', 'freelancer'];

//                     foreach ($sendEmailTo as $user_type) {
//                         if ($user_type == 'admin') {
//                             $admin = User::where('type', $user_type)->first();
//                             sendMail($admin->name, $admin->email, "Booking Cancelled", "Booking Cancelled Email", $body1);
//                             Log::channel('custom')->info("Email Sent to Admin");
//                         } else if ($user_type == 'freelancer') {
//                             sendMail($freelancer_user->name, $freelancer_user->email, "Booking Cancelled", "Booking Cancelled Email", $body1);
//                             Log::channel('custom')->info("Email Sent to freelancer");
//                         } else if ($user_type == 'owner') {
//                             sendMail($booking_user->name, $booking_user->email, "Booking Cancelled", "Booking Cancelled Email", $body1);
//                             Log::channel('custom')->info("Email Sent to Owner");
//                         }
//                     }   
//                 } 
//                 else{
//                     Log::channel('custom')->info("Booking not cancelled. Booking slots and booking information is missing: " .   Log::channel('custom')->info("Booking not cancelled. due to difference in time Appointment details: " . "Difference in time" . $diff_in_time . " Appointment Detail" . json_encode($appointment)));
//                 } 
//             }
//             else {
//                 Log::channel('custom')->info("Booking not cancelled. due to difference in time Appointment details: " . "Difference in time" . $diff_in_time . " Appointment Detail" . json_encode($appointment));
//             }
//         }
//     } 

//     else {
//         Log::channel('custom')->info("No Appointments found, No data found for cancellation");
//     }

//     Log::channel('custom')->info('Cron end date and time: ' . now('Asia/Karachi'));
//     Log::channel('custom')->info('checkOnHold Cron finished.');
// }

















    // public function checkOnHold()
    // {
    //     $check_appointment = Appointments::whereHas('userBookingSlots', function ($q) {
    //         $q->where('status', 'Cancelled by Freelancer');
    //     })
    //         ->with(['userBookingSlots.bookings'])
    //         ->get();

    //  dd($check_appointment);
    //     foreach ($check_appointment as $appointment) {

    //         $freelancer_user = User::where('id', $appointment->freelancer_user_id)->first();
    //         $booking_user = User::where('id', $appointment->booking_user_id)->first();

    //         $appointment_date = date('Y-m-d', strtotime($appointment->created_at . " +36 hours"));
    //         //dd( $appointment_date);
    //         $time_now = Carbon::now()->format('Y-m-d H:i');
    //         $time_next = $appointment_date . " 12:00";

    //         $diff_in_time = Carbon::parse($time_now)->diffInHours($time_next);
    //         // echo( $diff_in_time);
    //         // echo("jdsldjs");

    //         //dd(  $diff_in_time,   $appointment_date);
    //         if ($diff_in_time < 12) {
    //             // echo("in if");
    //             $bookingSlot = $appointment->userBookingSlots ?? null;
    //             $bookings = $appointment->userBookingSlots->bookings ?? null;

    //             if (!is_null($bookingSlot) && !is_null($bookings)) {
    //                 $bookingSlot->status = 'Available';
    //                 $bookingSlot->slots_time = null;
    //                 $bookingSlot->save();

    //                 $bookings->status = 'Available';
    //                 $bookings->save();

    //                 $appointment->status = 'Cancelled Due to Time Expire';
    //                 $appointment->save();

    //                 $body1 = "<table>
    //                 <tr>
    //                     <td>Business Owner Name: $booking_user->name </td>
    //                 </tr>
    //                 <tr>
    //                     <td>Freelancer Name: $freelancer_user->name</td>
    //                 </tr>
    //                 <tr>
    //                     <td>Business Owner Email: $booking_user->email</td>
    //                 </tr>
    //                 <tr>
    //                     <td>Freelancer Email: $freelancer_user->email</td>
    //                 </tr>
    //                 <tr>
    //                     <td>Booking Date: $appointment->booking_date</td>
    //                 </tr>
    //                 <tr>
    //                     <td>Status: Cancelled Due to Time Expire</td>
    //                 </tr>
    //             </table>";

    //                 $sendEmailTo = [
    //                     'admin',
    //                     'owner',
    //                     'freelancer'
    //                 ];

    //                 foreach ($sendEmailTo as $user_type) {
    //                     if ($user_type == 'admin') {
    //                         $admin = User::where('type', $user_type)->first();
    //                         sendMail($admin->name, $admin->email, "Booking Cancelled", "Booking Cancelled Email", $body1);
    //                     } else if ($user_type == 'freelancer') {
    //                         sendMail($freelancer_user->name, $freelancer_user->email, "Booking Cancelled", "Booking Cancelled Email", $body1);
    //                     } else if ($user_type == 'owner') {
    //                         sendMail($booking_user->name, $booking_user->email, "Booking Cancelled", "Booking Cancelled Email", $body1);
    //                     }
    //                 }

    //             }
    //         } else {
    //             echo ("out if");
    //         }
    //     }
    // }




    //     public function checkOnHold()
//     {

    //         $check_appointment = Appointments::has('userBookingSlots')
//             ->with(
//                 [
//                     'userBookingSlots' => function ($q) {
//                         $q->where(
//                             [
//                                 'slots_time' => '07:00 AM - 09:00 PM',
//                                 'status' => 'Confirmed by Freelancer'
//                             ]
//                         );
//                     },
//                     'userBookingSlots.bookings'
//                 ]
//             )
//             ->get();
//            // dd($check_appointment);

    //         foreach ($check_appointment as $appointment) {
//             $freelancer_user = User::where('id', $appointment->freelancer_user_id)->first();
//             $booking_user = User::where('id', $appointment->booking_user_id)->first();

    //             $appointment_date = date('Y-m-d', strtotime($appointment->created_at . " +36 hours"));
// //dd( $appointment_date);
//             $time_now = Carbon::now()->format('Y-m-d H:i');
//             $time_next = $appointment_date . " 12:00";

    //             $diff_in_time = Carbon::parse($time_now)->diffInHours($time_next);

    // //dd(  $diff_in_time,   $appointment_date);
//             if ($diff_in_time < 12) {
//                 $bookingSlot = $appointment->userBookingSlots ?? null;
//                 $bookings = $appointment->userBookingSlots->bookings ?? null;

    //                 if (!is_null($bookingSlot) && !is_null($bookings)) {
//                     $bookingSlot->status = 'Available';
//                     $bookingSlot->slots_time = null;
//                     $bookingSlot->save();

    //                     $bookings->status = 'Available';
//                     $bookings->save();

    //                     $appointment->status = 'Cancelled Due to Time Expire';
//                     $appointment->save();

    //                     $body1 = "<table>
//                     <tr>
//                         <td>Business Owner Name: $booking_user->name </td>
//                     </tr>
//                     <tr>
//                         <td>Freelancer Name: $freelancer_user->name</td>
//                     </tr>
//                     <tr>
//                         <td>Business Owner Email: $booking_user->email</td>
//                     </tr>
//                     <tr>
//                         <td>Freelancer Email: $freelancer_user->email</td>
//                     </tr>
//                     <tr>
//                         <td>Booking Date: $appointment->booking_date</td>
//                     </tr>
//                     <tr>
//                         <td>Status: Cancelled Due to Time Expire</td>
//                     </tr>
//                 </table>";

    //                     $sendEmailTo = [
//                         'admin',
//                         'owner',
//                         'freelancer'
//                     ];

    //                     foreach ($sendEmailTo as $user_type) {
//                         if ($user_type == 'admin') {
//                             $admin = User::where('type', $user_type)->first();
//                             sendMail($admin->name, $admin->email, "Booking Cancelled", "Booking Cancelled Email", $body1);
//                         } else if ($user_type == 'freelancer') {
//                             sendMail($freelancer_user->name, $freelancer_user->email, "Booking Cancelled", "Booking Cancelled Email", $body1);
//                         } else if ($user_type == 'owner') {
//                             sendMail($booking_user->name, $booking_user->email, "Booking Cancelled", "Booking Cancelled Email", $body1);
//                         }
//                     }
//                 }
//             }
//         }
//     }



    public function cronLog(Request $request)
    {
        $logFilePath = storage_path('logs/custom.log');
        $logContent = File::get($logFilePath);
        dd($logContent);

        return view('log', ['logContent' => $logContent]);

    } 







    


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
