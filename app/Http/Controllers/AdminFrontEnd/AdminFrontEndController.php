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
    
    public function uploadBlogs()
    {
    	$data['page'] = 'uploadBlogs';
    	return view('admin.uploadBlogs')->with($data);
    }
    
    public function hairStylistChair()
    {
    	$data['page'] = 'hairStylistChair';
    	return view('admin.hairStylistChair')->with($data);
    }
    
    public function chairDetails()
    {
    	$data['page'] = 'chairDetails';
    	return view('admin.chairDetails')->with($data);
    }
    
    public function barberChair()
    {
    	$data['page'] = 'barberChair';
    	return view('admin.barberChair')->with($data);
    }
    
    public function beautyChair()
    {
    	$data['page'] = 'beautyChair';
    	return view('admin.beautyChair')->with($data);
    }
    
	public function jobApplicants()
    {
    	$data['page'] = 'jobApplicants';
    	return view('admin.jobApplicants')->with($data);
    }
    
    public function applicant()
    {
    	$data['page'] = 'applicant';
    	return view('admin.applicant')->with($data);
    }
    
    public function coverLetter()
    {
    	$data['page'] = 'coverLetter';
    	return view('admin.coverLetter')->with($data);
    }
    
    public function emailEnquiry()
    {
    	$data['page'] = 'emailEnquiry';
    	return view('admin.emailEnquiry')->with($data);
    }
    
    
    
   
}
