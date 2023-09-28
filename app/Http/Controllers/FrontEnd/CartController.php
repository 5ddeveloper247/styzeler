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
		
		if(!isset(Auth::user()->id)){
			return response()->json(['status' => 500, 'message' => 'Kindly login first!', 'data' => '']);
		}
		
		$active_cart = Cart::where('user_id', Auth::user()->id)->where('status', 'active')->first();
		
		if(isset($active_cart->id)){
			
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
			
		}else{
			
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
		
		return response()->json(['status' => 200, 'message' => 'Service added to cart successfully!', 'data' => '']);
	}
	
}
