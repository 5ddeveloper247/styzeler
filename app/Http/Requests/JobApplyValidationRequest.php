<?php

namespace App\Http\Requests;

// use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Rules\StartDateGreaterThanCurrentDate;

class JobApplyValidationRequest extends FormRequest
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
        		'applicant_name' => 'required',
	            'applicant_email' => 'required|email',
        		'applicant_phone' => 'required|max:15',
	            'applicant_cl' => 'required|mimes:pdf',
	        	'applicant_cv' => 'required|mimes:pdf',
	        	
	        ];
    }

    public function messages()
    {
        return [
            	//for wedding
            	'applicant_name.required' => 'Applicant Name is required!',
            	'applicant_email.required' => 'Applicant Email is required!',
            	'applicant_phone.required_if' => 'Applicant Phone is required!',
        		'applicant_phone.max' => 'Applicant Phone must be less then 15 characters!',
            	'applicant_cl.required' => 'Applicant Cover Letter is required!',
        		'applicant_cl.mime' => 'Applicant Cover Letter must be "PDF" format!',
            	'applicant_cv.required' => 'Applicant Resume is required!',
        		'applicant_cl.mime' => 'Applicant Resume must be "PDF" format!',
        		
 	 		];
    }
}