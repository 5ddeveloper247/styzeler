<?php

namespace App\Http\Controllers\FrontEnd;

use Countable;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Bookings;
use App\Models\Rent_let;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RentLetValidationRequest;

class RentLetController extends Controller
{
	public function saveRentAndLetDetails(RentLetValidationRequest $request)
	{
		$images = [];
		$userData = [];
		// Define the files you want to process and their corresponding paths
		$fileInputs = [
				// for wedding & hairStylist
				'chairPicture1' => '/images/rentLet',
				'chairPicture2' => '/images/rentLet',
				'chairPicture3' => '/images/rentLet',
		];
	
		foreach ($fileInputs as $reg_image => $path) {
			if ($request->hasFile($reg_image)) {
	
				$uploadedFiles = $request->file($reg_image);
	
				// single files were uploaded for this input
				$savedImage = saveSingleImage($uploadedFiles, $path);
				$images[$reg_image] = $savedImage;
				
			}
		}
		
	
		$rent_let = new Rent_let();
		$rent_let->salon_name = $request->salonName;
		$rent_let->salon_address = $request->salonAddress;
		$rent_let->country = $request->salonCountry;
		$rent_let->county = $request->salonCounty;
		$rent_let->post_code = $request->salonCountryCode;
		$rent_let->phone = $request->salonMobile;
		$rent_let->space_description = $request->spaceDescription;
		$rent_let->category = $request->rentalCategory;
		$rent_let->rent_let_category = $request->rentLetCategory;
		
		if($request->rentLetCategory == 'Rent and Let'){
		
			$rent_let->rent_let_type = $request->rentAndLet;
		
		}else if($request->rentLetCategory == 'Rent and Let go'){
			
			$rent_let->rent_let_type = $request->rentAndLetGo;
		
		}else{
			$rent_let->rent_let_type = null;
		}
		
		$rent_let->hourly_rent = $request->hourlyRent != '' ? $request->hourlyRent : '0';
		$rent_let->daily_rent = $request->dailyRent != '' ? $request->dailyRent : '0';
		$rent_let->weekly_rent = $request->weeklyRent != '' ? $request->weeklyRent : '0';
		$rent_let->monthly_rent = $request->monthlyRent != '' ? $request->monthlyRent : '0';
		
		$rent_let->image1 = isset($images['chairPicture1']) ? $images['chairPicture1'] : '';
		$rent_let->image2 = isset($images['chairPicture2']) ? $images['chairPicture2'] : '';
		$rent_let->image3 = isset($images['chairPicture3']) ? $images['chairPicture3'] : '';
		$rent_let->status = 'inactive';
		$rent_let->user_id = Auth::user()->id;
		$rent_let->save();
	
		return response()->json(['status' => 200, 'message' => 'Rent & Let details submitted succsessfully!', 'data' => '']);
	}
	
	public function changeRentLetStatusActive(Request $request, $id='')
	{
		if($id != ''){
			$rent_let = Rent_let::find($id);
			$rent_let->status = 'active';
			$rent_let->update();
			session()->flash('success', 'Record Activated Successfully!');
			return redirect()->back();
		}else{
			return abort(404);
		}
	}
	public function changeRentLetStatusInActive(Request $request, $id='')
	{
		if($id != ''){
			$rent_let = Rent_let::find($id);
			$rent_let->status = 'inactive';
			$rent_let->update();
			session()->flash('success', 'Record Deactivated Successfully!!');
			return redirect()->back();
		}else{
			return abort(404);
		}
	}
	
}
