<?php

namespace App\Http\Controllers\frontEnd;

use Countable;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Guest_user;
use App\Models\Chat_questions;
use App\Models\Chat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\GuestUserValidationRequest;

class ChatController extends Controller
{
	public function saveGuestUserDetails(GuestUserValidationRequest $request)
	{
		
		$existing = Guest_user::where('email', $request->email)->first();
		
		if(!isset($existing->id)){
			
			$guest_user = new Guest_user();
			$guest_user->name = $request->username;
			$guest_user->email = $request->email;
			$guest_user->phone = $request->phone;
			
			$guest_user->save();
			
			$id = $guest_user->id;
			
		}else{
			$id = $existing->id;
		}
		
		return response()->json(['status' => 200, 'message' => 'Details submitted succsessfully!', 'data' => $id]);
	}
	
	public function sendMessage(Request $request)
	{
	
		$msgType = isset($request->msg_type) ? $request->msg_type : '';
		$guestUserId = $request->guest_userid;
		$message = $request->message;
		
		if($msgType == 'other'){
			
			$chat = new Chat();
			
			$chat->guest_user_id = $guestUserId;
			$chat->question = $message;
			$chat->type = 'other';
			$chat->save();
			
			return response()->json(
					[
						'data' => 'Your question sent to admin, we will get back to you...',
						'type' => $msgType,
						'status' => 200
					]
				);
			
		}else{
			
		$questions = Chat_questions::all();	
			
		return response()->json(
            [
            	'data' => $questions,
                'type' => $msgType,
                'status' => 200
            ]
        );
			
		}
	}
	public function getAnswer(Request $request)
	{
	
		if(isset($request->id)){
			
			$specificQuestion = Chat_questions::where('id', $request->id)->first();
			
			return response()->json(
					[
							'data' => $specificQuestion,
							'status' => 200
					]
				);
		}else{
			return response()->json(['data' => '','status' => 500]);
		}
		
	
		
	}
	
	
}
