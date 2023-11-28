<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Blog;
use App\Models\Cart;
use App\Models\User;
use App\Models\Rent_let;
use App\Models\Cart_line;
use App\Models\Job_request;
use App\Models\Used_tokens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function forgetPassword()
    {
        return view('auth.forgetPassword');
    }

    public function weddingRegistration()
    {
        return view('auth.register.weddingRegistration');
    }

    public function hairdressingSalonRegistration()
    {
        return view('auth.register.hairdressingSalonRegistration');
    }

    public function beautySalonRegistration()
    {
        return view('auth.register.beautySalonRegistration');
    }

    public function hairStylistRegistration()
    {
        return view('auth.register.hairStylistRegistration');
    }

    public function beauticianRegistration()
    {
        return view('auth.register.beauticianRegistration');
    }

    public function barberRegistration()
    {
        return view('auth.register.barberRegistration');
    }

    public function clientRegistration()
    {
        return view('auth.register.clientRegistration');
    }

    public function aboutUs()
    {
        return view('web.aboutUs');
    }

    public function contactUs()
    {
        return view('web.contactUs');
    }

    public function businessOwner()
    {
        $data['users'] = User::where('status', 'Active')->whereIn('type', ['hairdressingSalon', 'beautySalon'])->get();
        return view('web.businessOwner')->with($data);
    }

    public function candidate(Request $request)
    {
        $data['type'] = isset($request->type) ? $request->type : '';
        return view('web.candidate')->with($data);
    }

    public function news()
    {
        return view('web.news');
    }

    public function wedding()
    {
        return view('web.wedding');
    }

    public function rentAndLet()
    {
        if (isset(Auth::user()->id)) {
            $data['userDetails'] = User::where('id', Auth::user()->id)->first();
        } else {
            $data['userDetails'] = '';
        }
        return view('web.rentAndLet')->with($data);
    }

    public function webTermAndConditions()
    {
        return view('web.webTermAndConditions');
    }
    public function freelancerTermAndConditions()
    {
        return view('web.freelancerTermAndConditions');
    }

    public function termAndConditions()
    {
        return view('web.termAndConditions');
    }

    public function privacyPolicy()
    {
        return view('web.privacyPolicy');
    }
    public function faqs()
    {
        return view('web.faqs');
    }

    public function homeServices()
    {
        // if (isset(Auth::user()->id)) {

        //     $active_cart = Cart::where('user_id', Auth::user()->id)->where('status', 'active')->first();
        //     if (isset($active_cart->id)) {
        //         Cart_line::where('cart_id', $active_cart->id)->delete();
        //     }
        // }

        return view('web.homeServices');
    }

    public function barber(Request $request)
    {
        if (isset($request->type)) {
            $type = $request->type;
        } else {
            $type = '';
        }
        if (isset(Auth::user()->type) && in_array(Auth::user()->type, ['hairdressingSalon', 'beautySalon', 'wedding', 'hairStylist', 'beautician', 'barber'])) {

            if ($type != '') {
                $users = User::where('status', 'Active')->whereIn('type', ['barber'])->where('profile_type', '!=', 'Home Service')->where('profile_type', $type)->get();
            } else {
                $users = User::where('status', 'Active')->whereIn('type', ['barber'])->where('profile_type', '!=', 'Home Service')->get();
            }
        } else if (isset(Auth::user()->type) && in_array(Auth::user()->type, ['client'])) {

            $users = User::where('status', 'Active')->whereIn('type', ['barber'])->where('profile_type', 'Home Service')->get();
        } else {

            $users = User::where('status', 'Active')->whereIn('type', ['barber'])->get();
        }

        $data['users'] = $users;
        return view('web.barber')->with($data);
    }

    public function hairstylist(Request $request)
    {
        if (isset($request->type)) {
            $type = $request->type;
        } else {
            $type = '';
        }
        if (isset(Auth::user()->type) && in_array(Auth::user()->type, ['hairdressingSalon', 'beautySalon', 'wedding', 'hairStylist', 'beautician', 'barber'])) {

            if ($type != '') {
                $users = User::where('status', 'Active')->whereIn('type', ['hairStylist'])->where('profile_type', '!=', 'Home Service')->where('profile_type', $type)->get();
            } else {
                $users = User::where('status', 'Active')->whereIn('type', ['hairStylist'])->where('profile_type', '!=', 'Home Service')->get();
            }
        } else if (isset(Auth::user()->type) && in_array(Auth::user()->type, ['client'])) {

            $users = User::where('status', 'Active')->whereIn('type', ['hairStylist'])->where('profile_type', 'Home Service')->get();
        } else {

            $users = User::where('status', 'Active')->whereIn('type', ['hairStylist'])->get();
        }

        $data['users'] = $users;
        return view('web.hairstylist')->with($data);
    }

    public function beautician(Request $request)
    {
        if (isset($request->type)) {
            $type = $request->type;
        } else {
            $type = '';
        }
        if (isset(Auth::user()->type) && in_array(Auth::user()->type, ['hairdressingSalon', 'beautySalon', 'wedding', 'hairStylist', 'beautician', 'barber'])) {

            if ($type != '') {
                $users = User::where('status', 'Active')->whereIn('type', ['beautician'])->where('profile_type', '!=', 'Home Service')->where('profile_type', $type)->get();
            } else {
                $users = User::where('status', 'Active')->whereIn('type', ['beautician'])->where('profile_type', '!=', 'Home Service')->get();
            }
        } else if (isset(Auth::user()->type) && in_array(Auth::user()->type, ['client'])) {

            $users = User::where('status', 'Active')->whereIn('type', ['beautician'])->where('profile_type', 'Home Service')->get();
        } else {

            $users = User::where('status', 'Active')->whereIn('type', ['beautician'])->get();
        }

        $data['users'] = $users;
        return view('web.beautician')->with($data);
    }

    public function packagesDescription()
    {
        return view('web.packagesDescription');
    }

    public function weddingStylist()
    {

        $users = User::where('status', 'Active')->whereIn('type', ['wedding'])->get();

        $data['users'] = $users;
        return view('web.weddingStylist')->with($data);
    }

    public function salonOwner()
    {
        $data['users'] = User::where('status', 'Active')->whereIn('type', ['hairdressingSalon', 'beautySalon'])->get();
        return view('web.salonOwner')->with($data);
    }

    public function chairRental()
    {
        return view('web.chairRental');
    }


    public function chairListing()
    {
        return view('web.chairListing');
    }

    public function chairListingData()
    {
        $all_chairs = Rent_let::where('user_id', Auth::id())
            ->with('user')
            ->get();
        return response()->json(
            [
                'status' => 200,
                'chairs' => $all_chairs
            ]
        );
    }

    public function changeChairStatus()
    {
        $request = json_decode(file_get_contents('php://input'), true);
        $chair_status = Rent_let::findOrFail($request['id']);
        if ($request['status'] == 'active') {
            $status = 'inactive';
        } else {
            $status = 'active';
        }

        $is_changed = $chair_status->update(['status' => $status]);

        if ($is_changed == true) {
            return response()
                ->json(
                    [
                        'status' => 200,
                        'message' => "Status $status Successfully!",
                        'data' => $chair_status
                    ]
                );
        } else {
            return response()
                ->json(
                    [
                        'status' => 401,
                        'message' => 'Something Went Wrong, Try Again!'
                    ]
                );
        }
    }

    public function rentLetHairstylist()
    {
        $data['rentLetList'] = Rent_let::whereIn('category', ['Hairdressing Chair', 'Barber Chair'])
            ->where('status', 'active')
            ->get();
        // dd($data);
        $data['page'] = 'hairstylist';
        return view('web.rentLetList')->with($data);
    }
    public function rentLetBeautyTherapist()
    {
        $data['rentLetList'] = Rent_let::whereIn('category', ['Beauty Chair'])->get();
        $data['page'] = 'beauty-therapist';
        return view('web.rentLetList')->with($data);
    }

    public function jobs()
    {
        $currentDate = now()->toDateString();
        $data['jobs'] = DB::table('job_request')->where('status', 'active')->where('start_date', '<=', $currentDate)->where('end_date', '>=', $currentDate)->get();
        if (isset(Auth::user()->id)) {
            $data['userDetails'] = User::where('id', Auth::user()->id)->first();
        } else {
            $data['userDetails'] = '';
        }

        return view('web.jobs')->with($data);
    }

    public function jobApply(Request $request)
    {
        if (isset($request->jobId)) {
            $data['jobDetail'] = Job_request::where('id', $request->jobId)->first();
            return view('web.jobApply')->with($data);
        } else {
            return abort(404);
        }
    }

    public function blogs()
    {
        $data['blogs'] = Blog::where('status', 'active')->get();
        return view('web.blogs')->with($data);
    } 

    public function servicesBodywaxing()
    {
        $serviceArray = ['Body Waxing', 'Eyes & Brows', 'Mani / Pedi', 'Facial'];
        $this->removeNonServiceCartLines($serviceArray);

        // !empty($exists) && count($exists->cart_lines) ? $exists->cart_lines->each->delete() : '';

        $user = User::where('id', Auth::user()->id)->first();
        $data['tokens'] = (isset($user->total_tokens) && $user->total_tokens != null) ? $user->total_tokens : 0;
        return view('web.servicesBodywaxing')->with($data);
    }
    public function servicesEyebrows()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data['tokens'] = (isset($user->total_tokens) && $user->total_tokens != null) ? $user->total_tokens : 0;
        return view('web.servicesEyebrows')->with($data);
    }

    public function servicesManiPedi()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data['tokens'] = (isset($user->total_tokens) && $user->total_tokens != null) ? $user->total_tokens : 0;
        return view('web.servicesManiPedi')->with($data);
    }

    public function servicesFacial()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data['tokens'] = (isset($user->total_tokens) && $user->total_tokens != null) ? $user->total_tokens : 0;
        return view('web.servicesFacial')->with($data);
    }

    public function servicesMassage(Request $request)
    {
           //dd("jalkdjfklsajf");
           // $request->dd();
            $serviceArray = ['Message'];
            $this->removeNonServiceCartLines($serviceArray);
            $user = User::where('id', Auth::user()->id)->first();
            $data['tokens'] = (isset($user->total_tokens) && $user->total_tokens != null) ? $user->total_tokens : 0;
            return view('web.servicesMassage')->with($data);
        
        //  $urlCheck=url('/cart');
        //  $url = request()->url();
        //  $previousUrl = url()->previous();
       
        // if($previousUrl== $urlCheck){
        //  $user = User::where('id', Auth::user()->id)->first();
        // $data['tokens'] = (isset($user->total_tokens) && $user->total_tokens != null) ? $user->total_tokens : 0;
        // return view('web.servicesMassage')->with($data);
        // }
        // else{
        //     $serviceArray = ['Massage'];
        //     $this->removeNonServiceCartLines($serviceArray);
        //     $user = User::where('id', Auth::user()->id)->first();
        //     $data['tokens'] = (isset($user->total_tokens) && $user->total_tokens != null) ? $user->total_tokens : 0;
        //     return view('web.servicesMassage')->with($data);
        // }
       

       
    }

    public function servicesLadies()
    {
        $serviceArray = ['Ladies Services', 'Make-Up', 'Gents Services'];
        $this->removeNonServiceCartLines($serviceArray);

        $user = User::where('id', Auth::user()->id)->first();
        $data['tokens'] = (isset($user->total_tokens) && $user->total_tokens != null) ? $user->total_tokens : 0;
        return view('web.servicesLadies')->with($data);
    }

    public function servicesMakeup()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data['tokens'] = (isset($user->total_tokens) && $user->total_tokens != null) ? $user->total_tokens : 0;
        return view('web.servicesMakeup')->with($data);
    }

    public function servicesGents()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data['tokens'] = (isset($user->total_tokens) && $user->total_tokens != null) ? $user->total_tokens : 0;
        return view('web.servicesGents')->with($data);
    }

    public function bookFreelancer()
    {
        if (!isset(Auth::user()->id)) {
            return redirect()->back();
        }

        $cart = Cart::with('cart_lines')->where('user_id', Auth::user()->id)->where('status', 'active')->first();

        $cartLines = isset($cart->cart_lines) ? $cart->cart_lines : '';


        $types = array();
        $filterUser = array();

        if (!empty($cartLines) && $cartLines != '') {
            foreach ($cartLines as $row) {
                $types[] = $row->item_service;
            }
        }

        $users1 = User::whereIn('type', ['hairStylist', 'beautician', 'barber'])
            ->where('profile_type', 'Home Service')
            ->where('status', 'Active')->get();
        $users2 = User::whereIn('type', ['wedding'])->where('status', 'Active')->get();

        $users = $users1; //$users1->concat($users2);

        if (!empty($users)) {
            foreach ($users as $user) {

                $userdata = $user->data;

                if (!empty($userdata)) {

                    foreach ($userdata as $row) {

                        if (count($types) > 0) {

                            foreach ($types as $type) {

                                if (in_array($type, $row)) {
                                    if (!in_array($user->id, $filterUser)) {
                                        $filterUser[] = $user->id;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $data['users'] = User::whereIn('id', $filterUser)->get();
        $data['cart_exist'] = isset($cart->cart_lines) ? 'true' : 'false';

        return view('web.bookFreelancer')->with($data);
    }



    public function Profile()
    {
        $data = User::findOrFail(Auth::user()->id);
        if (isset(Auth::user()->id)) {
            //         	$membership = Membership::where('user_id', Auth::user()->id)->count();
            $user = User::where('id', Auth::user()->id)->first();
            $membership = (isset($user->tokens) && $user->tokens != null) ? $user->tokens : 0;
        } else {
            $membership = 0;
        }
        return customView(
            'web.freelancerProfile',
            'web.ownerProfile',
            'web.clientProfile',
            $data->type,
            get_defined_vars()
        );
    }
    public function salonOwnerProfile(Request $request)
    {

        $data = User::findOrFail($request->id);
        if (isset(Auth::user()->id)) {
            //         	$membership = Membership::where('user_id', Auth::user()->id)->count();
            $user = User::where('id', Auth::user()->id)->first();
            $userCart = Cart::with('cart_lines')->where('user_id', Auth::user()->id)->where('status', 'active')->first();

            $membership = (isset($user->tokens) && $user->tokens != null) ? $user->tokens : 0;
            $todayUseToken = Used_tokens::where('user_id', Auth::user()->id)->where('freelancer_id', $request->id)->where('date', date('Y-m-d'))->count();
            $cartServicesTimeMin = $userCart != null ? $userCart->cart_lines->sum('item_time_min') : 0;
        } else {
            $membership = 0;
            $todayUseToken = 0;
            $cartServicesTimeMin = 0;
        }
        // dd(get_defined_vars());
        return customView(
            'web.freelancerProfileView',
            'web.salonOwnerProfileView',
            'web.clientProfile',
            $data->type,
            get_defined_vars()
        );
    }
    public function freelancerBooking()
    {
        return view('web.freelancerBooking');
    }
    public function freelancerBookingHistory()
    {
        return view('web.freelancerBookingHistory');
    }

    public function cart()

    { 
        //dd("kajdflkajs");
        $user = User::where('id', Auth::user()->id)->first();
        $data['tokens'] = (isset($user->total_tokens) && $user->total_tokens != null) ? $user->total_tokens : 0;
        return view('web.cart')->with($data);
    }

    public function cartData()
    {
        $cart = Cart::where(
            [
                'user_id' => Auth::id(),
                'status' => 'active'
            ]
        )
            ->with('cart_lines')
            ->get();
        // dd($cart, Auth::id());
        // return view('web.cart',);
        return response()->json(
            [
                'status' => 200,
                'message' => '',
                'cart' => $cart
            ]
        );
    }

    public function cartLineDelete($id)
    {
        $cart_line = Cart_line::where('id', $id)->delete();
        return response()->json(
            [
                'status' => 200,
                'message' => 'Successfully Deleted!',
                'data' => $id
            ]
        );
    }
    public function removeNonServiceCartLines($serviceArray)
    {
        $exists = Cart::where([
            'user_id' => Auth::user()->id,
            'status' => 'active'
        ])->with('cart_lines')->first();
       //dd($exists);
        if (!empty($exists) && count($exists->cart_lines)) {
            foreach ($exists->cart_lines as $cart_line) {
                if (!in_array($cart_line->item_type, $serviceArray)) {
                    $cart_line->delete();
                }
            }
        }
    }
}
