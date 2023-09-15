<?php

namespace App\Http\Controllers\frontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
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
        return view('web.businessOwner');
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

    public function termAndConditions()
    {
        return view('web.termAndConditions');
    }

    public function privacyPolicy()
    {
        return view('web.privacyPolicy');
    }

	public function homeServices()
    {
        return view('web.homeServices');
    }
    
    public function Profile()
    {
        $data = User::findOrFail(Auth::user()->id);

        return customView(
            'web.freelancerProfile',
            'web.ownerProfile',
            'web.clientProfile',
            $data->type,
            get_defined_vars()
        );
    }
}
