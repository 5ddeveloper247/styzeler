<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Rent_let;
use App\Models\Job_request;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\Cart_line;
use App\Models\Membership;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

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

    public function candidate()
    {
        return view('web.candidate');
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
        return view('web.rentAndLet');
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
        return view('web.homeServices');
    }

    public function barber()
    {
        $data['users'] = User::where('status', 'Active')->whereIn('type', ['barber'])->get();
        return view('web.barber')->with($data);
    }

    public function hairstylist()
    {
        $data['users'] = User::where('status', 'Active')->whereIn('type', ['hairStylist'])->get();
        return view('web.hairstylist')->with($data);
    }

    public function beautician()
    {
        $data['users'] = User::where('status', 'Active')->whereIn('type', ['beautician'])->get();
        return view('web.beautician')->with($data);
    }

    public function packagesDescription()
    {
        return view('web.packagesDescription');
    }

    public function weddingStylist()
    {
        $data['users'] = User::where('status', 'Active')->whereIn('type', ['wedding'])->get();
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

    public function rentLetHairstylist()
    {
        $data['rentLetList'] = Rent_let::whereIn('category', ['Hairdressing Chair', 'Barber Chair'])->get();
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
        $data['jobs'] =    DB::table('job_request')->where('start_date', '<=', $currentDate)->where('end_date', '>=', $currentDate)->get();

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
        $user = User::where('id', Auth::user()->id)->first();
        $data['tokens'] = (isset($user->tokens) && $user->tokens != null) ? $user->tokens : 0;
        return view('web.servicesBodywaxing')->with($data);
    }
    public function servicesEyebrows()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data['tokens'] = (isset($user->tokens) && $user->tokens != null) ? $user->tokens : 0;
        return view('web.servicesEyebrows')->with($data);
    }

    public function servicesManiPedi()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data['tokens'] = (isset($user->tokens) && $user->tokens != null) ? $user->tokens : 0;
        return view('web.servicesManiPedi')->with($data);
    }

    public function servicesFacial()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data['tokens'] = (isset($user->tokens) && $user->tokens != null) ? $user->tokens : 0;
        return view('web.servicesFacial')->with($data);
    }

    public function servicesMassage()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data['tokens'] = (isset($user->tokens) && $user->tokens != null) ? $user->tokens : 0;
        return view('web.servicesMassage')->with($data);
    }

    public function servicesLadies()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data['tokens'] = (isset($user->tokens) && $user->tokens != null) ? $user->tokens : 0;
        return view('web.servicesLadies')->with($data);
    }

    public function servicesMakeup()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data['tokens'] = (isset($user->tokens) && $user->tokens != null) ? $user->tokens : 0;
        return view('web.servicesMakeup')->with($data);
    }

    public function servicesGents()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $data['tokens'] = (isset($user->tokens) && $user->tokens != null) ? $user->tokens : 0;
        return view('web.servicesGents')->with($data);
    }

    public function bookFreelancer()
    {
        if (!isset(Auth::user()->id)) {
            return redirect()->back();;
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

        $users = User::where('type', '!=', 'admin')->where('status', 'Active')->get();

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
        if(isset(Auth::user()->id)){
//         	$membership = Membership::where('user_id', Auth::user()->id)->count();
        	$user = User::where('id', Auth::user()->id)->first();
        	$membership = (isset($user->tokens) && $user->tokens != null) ? $user->tokens : 0;
        }else{
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
        if(isset(Auth::user()->id)){
//         	$membership = Membership::where('user_id', Auth::user()->id)->count();
        	$user = User::where('id', Auth::user()->id)->first();
        	$membership = (isset($user->tokens) && $user->tokens != null) ? $user->tokens : 0;
        }else{
        	$membership = 0;
        }
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
}
