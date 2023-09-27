<?php

namespace App\Http\Requests;

// use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Rules\StartDateGreaterThanCurrentDate;

class ChatQuestionValidationRequest extends FormRequest
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
        		'chat_question' => 'required',
	            'chat_answer' => 'required',
        	];
    }

    public function messages()
    {
        return [
            	//for wedding
            	'chat_question.required' => 'Question is required!',
            	'chat_answer.required' => 'Answer is required!',
            	
            ];
    }
}