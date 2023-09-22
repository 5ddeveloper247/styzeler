<?php

namespace App\Http\Requests;

// use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class RentLetValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
        		'salonName' => 'required',
	            'salonAddress' => 'required',
	            'salonCountry' => 'required',
	        	'salonCounty' => 'required',
	        	'salonCountryCode' => 'required',
	        	'salonMobile' => 'required|max:15',
	        	'spaceDescription' => 'required',
	        	
	        	'rentalCategory' => 'required',
	        	'rentLetCategory' => 'required',
	        		
	        	'rentAndLet' => 'required_if:rentLetCategory,Rent and Let',
	        	'rentAndLetGo' => 'required_if:rentLetCategory,Rent and Let go',
	        	
        		'weeklyRent' => 'required_if:rentAndLet,weekly rent',
        		'monthlyRent' => 'required_if:rentAndLet,monthly rent',
        		
        		'dailyRent' => 'required_if:rentAndLetGo,daily rent',
        		'hourlyRent' => 'required_if:rentAndLetGo,hourly rent',
        		
	        	'chairPicture1' => 'required|mimes:jpg,png,jpeg',
	        	'chairPicture2' => 'required|mimes:jpg,png,jpeg',
	        	'chairPicture3' => 'required|mimes:jpg,png,jpeg',
	        ];
    }

    public function messages()
    {
        return [
            	//for wedding
            	'salonName.required' => 'Salon Name is required!',
            	'salonAddress.required' => 'Salon Address is required!',
            
        		'salonCountry.required' => 'Salon Country is required!',
            	'salonCounty.required' => 'Salon County is required!',
            	'salonCountryCode.required' => 'Post Code is required!',
        		'salonMobile.required' => 'Phone Number is required!',
        		'salonMobile.max:15' => 'Phone Number must be less then 15 characters!',
        		'spaceDescription.required' => 'Space Description is required!',
        		
        		'rentalCategory.required' => 'Category is required!',
        		'rentLetCategory.required' => 'Rent & Let Category is required!',
        		'chairPicture1.required' => 'Choose all images first!',
        		'chairPicture1.mimes:jpg,png,jpeg' => "Image must be 'JPG,JPEG,PNG' format!",
        		'chairPicture2.required' => 'Choose all images first!',
        		'chairPicture2.mimes:jpg,png,jpeg' => "Image must be 'JPG,JPEG,PNG' format!",
        		'chairPicture3.required' => 'Choose all images first!',
        		'chairPicture3.mimes:jpg,png,jpeg' => "Image must be 'JPG,JPEG,PNG' format!",
 	 		];
    }
}