<?php

namespace App\Http\Requests;

// use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Rules\StartDateGreaterThanCurrentDate;

class BlogValidationRequest extends FormRequest
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
        		'blog_title' => 'required',
	            'description' => 'required',
        		'image-gallery' => 'required|mimes:jpg,jpeg,png,JPG,JPEG,PNG',
	        ];
    }

    public function messages()
    {
        return [
            	//for wedding
            	'blog_title.required' => 'Blog Title is required!',
            	'description.required' => 'Blog Description is required!',
            	'image-gallery.required' => 'Blog Picture is required!',
        		'image-gallery.mimes' => 'Blog Picture must be ".jpg, .jpeg, .png" format!',
            ];
    }
}