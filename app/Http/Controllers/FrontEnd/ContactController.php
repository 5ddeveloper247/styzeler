<?php

namespace App\Http\Controllers\FrontEnd;

use Countable;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Blog;
use App\Models\Email_enquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContactEnquiryValidationRequest;

class ContactController extends Controller
{
	public function saveContactUsEnquiry(ContactEnquiryValidationRequest $request)
	{
		$email_enquiry = new Email_enquiry();
		$email_enquiry->name = $request->name;
		$email_enquiry->email = $request->email;
		$email_enquiry->phone = $request->phone;
		$email_enquiry->message = $request->message;
		
		$email_enquiry->save();
		
		return response()->json(['status' => 200, 'message' => 'Email Enquiry submitted succsessfully!', 'data' => '']);
	}
	
}
