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
    	if(!Auth::user()){
    		$data['page'] = 'login';
    		return view('admin.login')->with($data);
    	}else{
    		return redirect(route('admin.dashboard'));
    	}
    }

    public function forgetPassword()
    {
    	if(!Auth::user()){
	    	$data['page'] = 'login';
	        return view('admin.resetPassword')->with($data);
        }else{
        	return redirect(route('admin.dashboard'));
        }
    }
    
    public function dashboard()
    {
    	$data['page'] = 'dashboard';
    	return view('admin.dashboard')->with($data);
    }
    
	public function weddingStylist()
    {
    	
    	$data['users'] = User::where('type','wedding')->get();
    	$data['page'] = 'wedding-stylist';
    	return view('admin.weddingStylist')->with($data);
    }
    
	public function seeDetails(Request $request, $id='')
    {
		if($id != ''){
			$data['userDetails'] = User::find($id);
			$data['page'] = 'see-details';
			return view('admin.seeDetails')->with($data);
		}else{
			return abort(404);
		}
    }
    
    
	public function cv(Request $request, $id='')
    {
    	if($id != ''){
    		$data['userDetails'] = User::find($id);
	    	$data['page'] = 'cv';
	    	return view('admin.cv')->with($data);
    	}else{
    		return abort(404);
    	}
    }
    
    public function hairstylist()
    {
    	$data['users'] = User::where('type','hairStylist')->get();
    	$data['page'] = 'hairStylist';
    	return view('admin.hairStylist')->with($data);
    }
    
    public function beautician()
    {
    	$data['users'] = User::where('type','beautician')->get();
    	$data['page'] = 'beautician';
    	return view('admin.beautician')->with($data);
    }
    
    public function barber()
    {
    	$data['users'] = User::where('type','barber')->get();
    	$data['page'] = 'barber';
    	return view('admin.barber')->with($data);
    }
    
    public function hairdressingOwner()
    {
    	$data['users'] = User::where('type','hairdressingSalon')->get();
    	$data['page'] = 'hairdressingOwner';
    	return view('admin.hairdressingOwner')->with($data);
    }
    
    public function beautySalonOwner()
    {
    	$data['users'] = User::where('type','beautySalon')->get();
    	$data['page'] = 'beautySalonOwner';
    	return view('admin.beautySalonOwner')->with($data);
    }
    
    public function client()
    {
    	$data['users'] = User::where('type','client')->get();
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
    
    
    
    public function changeUserStatusActive(Request $request, $id='')
    {
    	if($id != ''){
    		$user = User::find($id);
    		$user->status = 'Active';
    		$user->update();
    		session()->flash('success', 'User Activated Successfully!');
    		return redirect()->back();
    	}else{
    		return abort(404);
    	}
    }
    public function changeUserStatusInActive(Request $request, $id='')
    {
    	if($id != ''){
    		$user = User::find($id);
    		$user->status = 'Disabled';
    		$user->update();
    		session()->flash('success', 'User Deactivated Successfully!!');
    		return redirect()->back();
    	}else{
    		return abort(404);
    	}
    	
    }
    
    
    
   
}