<?php

namespace App\Http\Requests;

// use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Rules\StartDateGreaterThanCurrentDate;

class JobValidationRequest extends FormRequest
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
        		'company_name' => 'required_if:type,owner',
	            'job_title' => 'required_if:type,owner,admin',
	            'description' => 'required_if:type,owner,admin',
	        	'salary' => 'required_if:type,owner',
	        	'location' => 'required_if:type,owner',
	        	'email' => 'required_if:type,owner|email',
// 	        	'job_start_date' => 'required_if:type,owner,admin',
        		'job_start_date' => [
						        		'required_if:type,owner,admin',
						        		'date',
// 						        		new StartDateGreaterThanCurrentDate,
						        	],
	        	'job_end_date' => 'required_if:type,owner,admin|date|after:job_start_date',
	        	
	        ];
    }

    public function messages()
    {
        return [
            	//for wedding
            	'company_name.required_if' => 'Company Name is required!',
            	'job_title.required_if' => 'Job Title is required!',
            	'description.required_if' => 'Description is required!',
            	'salary.required_if' => 'Salary is required!',
            	'location.required_if' => 'Location is required!',
        		'email.required_if' => 'Email is required!',
        		'job_start_date.required_if' => 'Ad Start Date is required!',
        		'job_end_date.required_if' => 'Ad End Date is required!',
        		'job_end_date.after' => 'Ad End Date must be greater then start date!',
        		
 	 		];
    }
}