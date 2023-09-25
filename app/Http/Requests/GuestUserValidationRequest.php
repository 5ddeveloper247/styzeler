<?php

namespace App\Http\Requests;

// use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Rules\StartDateGreaterThanCurrentDate;

class GuestUserValidationRequest extends FormRequest
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
        		'username' => 'required',
	            'email' => 'required|email',
        		'phone' => 'required|max:15',
	        ];
    }

    public function messages()
    {
        return [
            	//for wedding
            	'username.required' => 'Name is required!',
            	'email.required' => 'Email is required!',
            	'phone.required' => 'Phone is required!',
        		'phone.max' => 'Phone Number must be less then 15 characters!',
            ];
    }
}