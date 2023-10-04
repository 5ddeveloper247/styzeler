<?php

namespace App\Http\Controllers\FrontEnd;

use Countable;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Bookings;
use App\Models\Rent_let;
use App\Models\Job_request;
use App\Models\Job_apply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\JobValidationRequest;
use App\Http\Requests\JobApplyValidationRequest;

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
		$job->date = date('Y-m-d');
		
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
	
	public function changeJobReqStatusActive(Request $request, $id='')
	{
		if($id != ''){
			$job = Job_request::find($id);
			$job->status = 'active';
			$job->update();
			session()->flash('success', 'Record Activated Successfully!');
			return redirect()->back();
		}else{
			return abort(404);
		}
	}
	public function changeJobReqStatusInActive(Request $request, $id='')
	{
		if($id != ''){
			$job = Job_request::find($id);
			$job->status = 'inactive';
			$job->update();
			session()->flash('success', 'Record Deactivated Successfully!!');
			return redirect()->back();
		}else{
			return abort(404);
		}
	}
	
	public function saveJobApplyDetails(JobApplyValidationRequest $request)
	{
	
		$images = [];
		$userData = [];
		// Define the files you want to process and their corresponding paths
		$fileInputs = [
				// for wedding & hairStylist
				'applicant_cl' => '/images/jobApply',
				'applicant_cv' => '/images/jobApply',
		];
		
		foreach ($fileInputs as $reg_image => $path) {
			if ($request->hasFile($reg_image)) {
		
				$uploadedFiles = $request->file($reg_image);
		
				// single files were uploaded for this input
				$savedImage = saveSingleImage($uploadedFiles, $path);
				$images[$reg_image] = $savedImage;
		
			}
		}
		
		$job_apply = new Job_apply();
		$job_apply->user_id = isset(Auth::user()->id) ? Auth::user()->id : null;
		$job_apply->job_id = $request->jobId;
		$job_apply->applicant_name = $request->applicant_name;
		$job_apply->applicant_email = $request->applicant_email;
		$job_apply->applicant_phone = $request->applicant_phone;
		$job_apply->applicant_cover_letter = isset($images['applicant_cl']) ? $images['applicant_cl'] : '';
		$job_apply->applicant_resume = isset($images['applicant_cv']) ? $images['applicant_cv'] : '';
		$job_apply->date = date('Y-m-d');
		$job_apply->status = 'inactive';
	
		$job_apply->save();
	
		return response()->json(['status' => 200, 'message' => 'Job details submitted succsessfully!', 'data' => '']);
	}
}
