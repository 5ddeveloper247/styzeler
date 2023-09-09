<?php

namespace App\Http\Controllers\adminFrontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminFrontEndController extends Controller
{
  
    public function login()
    {	
    	$data['page'] = 'login';
        return view('admin.login')->with($data);
    }

    public function forgetPassword()
    {
    	$data['page'] = 'login';
        return view('admin.resetPassword')->with($data);
    }
    
    public function dashboard()
    {
    	$data['page'] = 'dashboard';
    	return view('admin.dashboard')->with($data);
    }
    
	public function weddingStylist()
    {
    	$data['page'] = 'wedding-stylist';
    	return view('admin.weddingStylist')->with($data);
    }
    
	public function seeDetails()
    {
    	$data['page'] = 'see-details';
    	return view('admin.seeDetails')->with($data);
    }
    
    
	public function cv()
    {
    	$data['page'] = 'cv';
    	return view('admin.cv')->with($data);
    }
    
    public function hairstylist()
    {
    	$data['page'] = 'hairStylist';
    	return view('admin.hairStylist')->with($data);
    }
    
    public function beautician()
    {
    	$data['page'] = 'beautician';
    	return view('admin.beautician')->with($data);
    }
    
    public function barber()
    {
    	$data['page'] = 'barber';
    	return view('admin.barber')->with($data);
    }
    
    public function hairdressingOwner()
    {
    	$data['page'] = 'hairdressingOwner';
    	return view('admin.hairdressingOwner')->with($data);
    }
    
    public function beautySalonOwner()
    {
    	$data['page'] = 'beautySalonOwner';
    	return view('admin.beautySalonOwner')->with($data);
    }
    
    public function client()
    {
    	$data['page'] = 'client';
    	return view('admin.client')->with($data);
    }
    
    public function bookings()
    {
    	$data['page'] = 'bookings';
    	return view('admin.bookings')->with($data);
    }
    
    public function jobRequests()
    {
    	$data['page'] = 'jobRequests';
    	return view('admin.jobRequests')->with($data);
    }
    
    public function uploadJobs()
    {
    	$data['page'] = 'uploadJobs';
    	return view('admin.uploadJobs')->with($data);
    }
    
    
    
   
}
