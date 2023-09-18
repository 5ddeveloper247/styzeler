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
    
	public function barber()
    {
    	$data['users'] = User::whereIn('type',['barber'])->get();
        return view('web.barber')->with($data);
    }
    
    public function hairstylist()
    {
    	$data['users'] = User::whereIn('type',['hairStylist'])->get();
    	return view('web.hairstylist')->with($data);
    }
    
    public function beautician()
    {
    	$data['users'] = User::whereIn('type',['beautician'])->get();
    	return view('web.beautician')->with($data);
    }
    
    public function packagesDescription()
    {
    	return view('web.packagesDescription');
    }
    
    public function weddingStylist()
    {
    	$data['users'] = User::whereIn('type',['wedding'])->get();
    	return view('web.weddingStylist')->with($data);
    }
    
    public function salonOwner()
    {
    	$data['users'] = User::whereIn('type',['hairdressingSalon','beautySalon'])->get();
    	return view('web.salonOwner')->with($data);
    }
    
	public function rentLet()
    {
    	return view('web.rentLet');
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
