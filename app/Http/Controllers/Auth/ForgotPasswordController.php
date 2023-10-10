<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    function forgetPasswordReset(Request $request)
    {
        if ($request->has('password_otp')) {

            $validator =  Validator::make($request->all(), [
                'token' => 'required',
            ]);

            if ($validator->fails()) {
                $firstError = $validator->errors()->first();
                return response()->json([
                    'status' => 422,
                    'message' => $firstError,
                ]);
            }

            $user_update = User::find($request->user_id);

            if ($user_update->remember_token != $request->token) {
                return response()->json([
                    'status' => 422,
                    'message' => 'Enter Valid Token',
                ]);
            }

            $user_update->update(['password' => $request->password_otp, 'remember_token' => null]);

            return response()->json([
                'status' => 200,
                'message' => 'Password Changed Successfully!',
                'flag' => 'otp'
            ]);
        }

        $validator =  Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            // Return a JSON response with validation errors
            $firstError = $validator->errors()->first();
            return response()->json([
                'status' => 422,
                'message' => $firstError,
            ]);
        }

        $check_email = User::where('email', $request->email)->first();

        if (is_null($check_email)) {
            return response()->json([
                'status' => 422,
                'message' => 'Enter valid email',
            ]);
        }

        $user_id = $check_email->id;
        $otp_random_number = rand(100000, 999999);

        User::where('email', $request->email)->update(['remember_token' => $otp_random_number]);
        $body = "<h4>Your OTP For Forget Password !</h4><br>
        <h5>Dear $check_email->name !</h5><br>
        <p>We Have Received Your Request for Forget Password, Please <span style='font-weight: bold; color: red;'>Do Not</span> Share it with anyone.<br>Find Your OTP Below:</p>";
        $body .= "<table>
        				<tr>
        					<td>Your OTP is " . $otp_random_number . "</td>
        				</tr>
        			</table>";
        $sendEmail = [$request->email];

        sendMail($check_email->name, $sendEmail, 'Forget Password', 'Forget Password Email', $body);

        return response()->json([
            'status' => 200,
            'message' => 'Please Check your Email for OTP',
            'otp_password' => $request->password,
            'user_id' =>  $user_id
        ]);
    }
}
