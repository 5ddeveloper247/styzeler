<?php

namespace App\Http\Requests;

// use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Rules\StartDateGreaterThanCurrentDate;

class ContactEnquiryValidationRequest extends FormRequest
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
        		'name' => 'required',
	            'email' => 'required|email',
        		'phone' => 'required|max:15',
        		'message' => 'required',
	        ];
    }

    public function messages()
    {
        return [
            	//for wedding
            	'name.required' => 'Name is required!',
            	'email.required' => 'Email is required!',
            	'email.email' => 'Email must be in email format!',
        		'message.required' => 'Message is required!',
            ];
    }
}