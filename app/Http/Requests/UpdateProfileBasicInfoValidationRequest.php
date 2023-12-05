<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileBasicInfoValidationRequest extends FormRequest
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
            'stylist_name' => 'required_if:type,wedding,hairStylist,beautician,barber',
            'video' => 'sometimes|nullable|url',
            'stylist_surname' => 'required_if:type,wedding,hairStylist,beautician,barber',
            'stylist_resume' => 'required_if:type,wedding,hairStylist,beautician,barber',
            'stylist_mobile' => 'required_if:type,wedding,hairStylist,beautician,barber',
            'stylist_age' => 'required_if:type,wedding,hairStylist,beautician,barber',
            'qualification' => 'required_if:type,wedding,hairStylist,beautician,barber',
            'utr_number' => 'required_if:type,wedding,hairStylist,beautician,barber',
            'zone' => 'required_if:type,wedding,hairStylist,beautician,barber',
            'stylist_language' => 'required_if:type,wedding,hairStylist,beautician,barber',

            'owner_name' => 'required_if:type,hairdressingSalon,beautySalon,client',
            'owner_surname' => 'required_if:type,hairdressingSalon,beautySalon,client',
            'owner_address' => 'required_if:type,hairdressingSalon,beautySalon,client',
            'owner_postcode' => 'required_if:type,hairdressingSalon,beautySalon,client',
            'owner_telephone' => 'required_if:type,hairdressingSalon,beautySalon,client',

        ];
    }
    public function messages()
    {
        return [
            //for wedding
            'stylist_name.required_if' => 'Name is required!',
            'stylist_surname.required_if' => 'Surname is required!',
            'stylist_resume.required_if' => 'Tell us a bit about you and your brief working history in RESUME!',

            'stylist_mobile.required_if' => 'Mobile Number is required!',
            'stylist_age.required_if' => 'Please select your age group!',
            'utr_number.required_if' => 'Please enter your utr number!',
            'qualification.required_if' => 'Please Select Qualification',
            'stylist_language.required_if' => 'Languages is required!',
            'zone.required_if' => 'Zone of London open to work is required!',
            'video.url' => 'The video must be a valid URL.',

            'owner_name.required_if' => 'Name is required!',
            'owner_surname.required_if' => 'Surname is required!',
            'owner_address.required_if' => 'Address is required!',
            'owner_postcode.required_if' => 'PostCode is required!',
            'owner_telephone.required_if' => 'Mobile Number is required!',
        ];
    }
}
