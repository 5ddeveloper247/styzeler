<?php

namespace App\Http\Controllers\FrontEnd;

use Countable;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Cart;
use App\Models\Cart_line;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BlogValidationRequest;

class CartController extends Controller
{
    public function saveAddToCartDetails(Request $request)
    {
        if (!isset(Auth::user()->id)) {
            return response()->json(['status' => 500, 'message' => 'Kindly login first!', 'data' => '']);
        }

        $userCart = Cart::with('cart_lines')->where('user_id', Auth::user()->id)->where('status', 'active')->first();
        $cartServiceTimeMin = $userCart  != null ? $userCart->cart_lines->sum('item_time_min') : 0;
        $totalServiceTime = $cartServiceTimeMin + $request->item_time;

        if ($cartServiceTimeMin > 720) {
            return response()->json([
                'status' => 500,
                'message' => 'Unable to add service in cart. Your services time is exceeding the limit. (i.e 720 minutes)',
            ]);
        }
        if ($totalServiceTime > 720) {
            return response()->json([
                'status' => 500,
                'message' => 'Unable to add service in cart. Your services time is exceeding the limit. (i.e 720 minutes)',
            ]);
        }

        // 		$userDetail = User::where('id', Auth::user()->id)->first();

        // 		$tokens = (isset($userDetail->tokens) && $userDetail->tokens != null) ? $userDetail->tokens : 0;

        // 		if($tokens <= 0){
        // 			return response()->json(['status' => 500, 'message' => 'Insufficient tokens, first buy package!', 'data' => '']);
        // 		}

        $active_cart = Cart::where('user_id', Auth::user()->id)->where('status', 'active')->first();
        $exists = Cart::where(
            [
                'user_id' => Auth::user()->id,
                'status' => 'active'
            ]
        )
            ->with(
                [
                    'cart_lines'
                    => function ($q) use ($request) {
                        $q->where('item_service', $request->item_service);
                    }
                ]
            )
            ->first();

        $cartLines = !empty($exists) && !empty($exists->cart_lines) ? $exists->cart_lines : null;
        // dd(count($cartLines) == 0, is_null($cartLines));
        if (count($cartLines) == 0 || is_null($cartLines)) {
            if (isset($active_cart->id)) {

                // logic in case when user add make -> bridal make up service in cart then exixting cart will be empty and proceed with only bridal makeup entry
                if ($request->item_type == 'Make-up' && $request->item_service == 'Bridal Make-up') {
                    Cart_line::where('cart_id', $active_cart->id)->delete();
                }

                $cart_line = new Cart_line();
                $cart_line->cart_id = $active_cart->id;
                $cart_line->item_text = $request->item_text;
                $cart_line->item_time_min = $request->item_time;
                $cart_line->item_price = $request->item_price;
                $cart_line->item_type = $request->item_type;
                $cart_line->item_sub_type = $request->item_subtype;
                $cart_line->item_service = $request->item_service;
                $cart_line->date = date('Y-m-d');

                $cart_line->save();
            } else {

                $cart = new Cart();
                $cart->user_id = Auth::user()->id;
                $cart->status = 'active'; // status "active" when not check out,,, if user checkout process complete then status will be "checkout"

                $cart->save();

                $cart_line = new Cart_line();
                $cart_line->cart_id = $cart->id;
                $cart_line->item_text = $request->item_text;
                $cart_line->item_time_min = $request->item_time;
                $cart_line->item_price = $request->item_price;
                $cart_line->item_type = $request->item_type;
                $cart_line->item_sub_type = $request->item_subtype;
                $cart_line->item_service = $request->item_service;
                $cart_line->date = date('Y-m-d');

                $cart_line->save();
            }
            return response()->json(['status' => 200, 'message' => 'Service Successfully Added into Cart !', 'data' => '']);
        } else {
            return response()->json(['status' => 403, 'message' => 'Service Already Added into Cart !', 'data' => '']);
        }
    }
}
