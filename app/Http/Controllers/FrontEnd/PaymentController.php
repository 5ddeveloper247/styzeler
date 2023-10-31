<?php

namespace App\Http\Controllers\FrontEnd;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\User;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PaymentController extends Controller
{
    public function charge(Request $request)
    {
        if (!Auth::check()) {
            return back()->with('error', 'Please Login First');
        } 
        if($request->payment_type == 'homeServices'){
        	if (Auth::user()->type != 'client') {
        		return back()->with('error', 'Please Login As a Client');
        	}
        }
        if($request->payment_type == 'businessOwner'){
        	if (!in_array(Auth::user()->type, ['hairdressingSalon','beautySalon'])) {
        		return back()->with('error', 'Please Login As a Business Owner');
        	}
        }
        // Set your secret Stripe API key
        Stripe::setApiKey(config('keys.STRIPE_SECRET_KEY'));

        try {

            Charge::create([
                'amount' => $request->input('payment_amount') * 100,
                'currency' => 'GBP',
                'source' => $request->input('stripeToken'),
                'description' => Auth::user()->name . 'has Purchased Tokens Of Amount ' . $request->input('payment_amount'),
            ]);

            Membership::create([
                'name' => Auth::user()->name,
                'amount' => $request->input('payment_amount'),
                'user_id' => Auth::user()->id,
                'tokens' => $request->input('payment_tokens'),
                'description' => Auth::user()->name . 'has Purchased Tokens Of Amount ' . $request->input('payment_amount'),
            ]);

            $get_login_user = Auth::user();
            $tokens = $get_login_user->tokens;
            $total_tokens = $get_login_user->total_tokens;

            $get_login_user->update(
                [
                    'tokens' => $request->input('payment_tokens') + $tokens,
                    'total_tokens' => $request->input('payment_tokens') + $total_tokens,
                ]
            );
            if($request->has('redirectRoute')){
                return redirect('/'.$request->redirectRoute)->with('success', 'Payment Succesfull!');;
            }
            return back()->with('success', 'Payment Succesfull!');

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
