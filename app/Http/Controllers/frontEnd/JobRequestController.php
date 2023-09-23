<?php

namespace App\Http\Controllers\frontEnd;

use Countable;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Bookings;
use App\Models\Rent_let;
use App\Models\Job_request;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\JobValidationRequest;

class JobRequestController extends Controller
{
	public function saveJobRequestDetails(JobValidationRequest $request)
	{
		
		$job = new Job_request();
		$job->user_id = Auth::user()->id;
		$job->type = $request->type;
		$job->company_name = $request->company_name;
		$job->job_title = $request->job_title;
		$job->description = $request->description;
		$job->salary = $request->salary;
		$job->location = $request->location;
		$job->email = $request->email;
		$job->start_date = $request->job_start_date;
		$job->end_date = $request->job_end_date;
		if($request->type == 'owner'){
			$job->status = 'inactive';
		}else{
			$job->status = 'active';
		}
		
		$job->save();
	
		if($request->type == 'owner'){
			return response()->json(['status' => 200, 'message' => 'Job details submitted succsessfully, now waiting for admin approval!', 'data' => '']);
		}else{
			return response()->json(['status' => 200, 'message' => 'Job details submitted succsessfully!', 'data' => '']);
		}
	}
	
	public function getJobRequestDetail(Request $request){
	
		if(isset($request->id)){
			$data = Job_request::where('id', $request->id)->first();
			return response()->json(
					[
							'data' => $data,
							'status' => 200
					]
					);
		}else{
			return abort(404);
		}
		
	}
}
