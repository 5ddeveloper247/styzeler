<?php

namespace App\Http\Requests;

// use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class RegisterValidationRequest extends FormRequest
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
            //for wedding
            'stylist_picture' => 'required_if:type,wedding,hairStylist,beautician,barber|mimes:jpg,png,jpeg',
            'stylist_name' => 'required_if:type,wedding,hairStylist,beautician,barber',
            'stylist_surname' => 'required_if:type,wedding,hairStylist,beautician,barber',
            'stylist_resume' => 'required_if:type,wedding,hairStylist,beautician,barber',
            'stylist_email' => 'required_if:type,wedding,hairStylist,beautician,barber|unique:users,email',
            'cv' => 'required_if:type,wedding,hairStylist,beautician,barber|mimes:pdf',
            'stylist_mobile' => 'required_if:type,wedding,hairStylist,beautician,barber',
            'stylist_password' => [
                'required_if:type,wedding,hairStylist,beautician,barber',
                function ($attribute, $value, $fail) {
                    if (in_array($this->input('type'), ['wedding', 'hairStylist', 'beautician', 'barber'])) {
                        $this->addCustomPasswordRules($attribute, $value);
                    }
                },
            ],
            'stylist_age' => 'required_if:type,wedding,hairStylist,beautician,barber',
            'qualification' => 'required_if:type,wedding,hairStylist,beautician,barber',
            'utr_number' => 'required_if:type,wedding,hairStylist,beautician,barber',
            'zone' => 'required_if:type,wedding,hairStylist,beautician,barber',
            'stylist_language' => 'required_if:type,wedding,hairStylist,beautician,barber',

            //for hairdressing salon owner, beauty owner, client
            'owner_picture' => [
                'required_if:type,hairdressingSalon,beautySalon,client',
                'mimes:jpg,png,jpeg',
            ],
            'owner_name' => 'required_if:type,hairdressingSalon,beautySalon,client',
            'owner_surname' => 'required_if:type,hairdressingSalon,beautySalon,client',
            'owner_address' => 'required_if:type,hairdressingSalon,beautySalon,client',
            'owner_postcode' => 'required_if:type,hairdressingSalon,beautySalon,client',
            'owner_telephone' => 'required_if:type,hairdressingSalon,beautySalon,client',
            'owner_email' => [
                'required_if:type,hairdressingSalon,beautySalon,client',
                'unique:users,email',
            ],
            'owner_password' => [
                'required_if:type,hairdressingSalon,beautySalon,client',
                function ($attribute, $value, $fail) {
                    if (in_array($this->input('type'), ['hairdressingSalon', 'beautySalon', 'client'])) {
                        $this->addCustomPasswordRules($attribute, $value);
                    }
                },
            ],
        ];
    }

    protected function addCustomPasswordRules($attribute, $value)
    {
        Validator::make([$attribute => $value], [
            $attribute => 'min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
        ], [
            'min' => 'The password must be at least 8 characters long.',
            'regex' => 'The password must include at least one lowercase letter, one uppercase letter, one number, and one special character.',
        ])->validate();
    }

    public function messages()
    {
        return [
            //for wedding
            'stylist_name.required_if' => 'Name is required!',
            'stylist_surname.required_if' => 'Surname is required!',
            'stylist_resume.required_if' => 'Tell us a bit about you and your brief working history in RESUME!',
            'stylist_email.required_if' => 'Email is required!',
            'stylist_email.unique' => 'Email is already taken!',
            'stylist_mobile.required_if' => 'Mobile Number is required!',
            'stylist_age.required_if' => 'Please select your age group!',
            'utr_number.required_if' => 'Please enter your utr number!',
            'qualification.required_if' => 'Please Select Qualification',
            'stylist_language.required_if' => 'Languages is required!',
            'zone.required_if' => 'Zone of London open to work is required!',
            'cv.required_if' => 'Please upload your CV!',
            'cv.mimes' => 'CV must be .pdf format.',
            'stylist_picture.required_if' => 'Profile picture is required!',
            'stylist_picture.mimes' => 'Profile picture must be in .jpg, .png, .jpeg format.',
            'stylist_password.required_if' => 'Please enter a password and it`s length must be 8 or greater and must contain atleast one number, one capital letter and one special charecter!!',

            //for hairdressing salon owner ,beauty salon ,client
            'owner_picture.required_if' => 'Profile picture is required!',
            'owner_picture.mimes' => 'Profile picture must be in .jpg, .png or .jpeg format.',
            'owner_name.required_if' => 'Name is required!',
            'owner_surname.required_if' => 'Surname is required!',
            'owner_address.required_if' => 'Address is required!',
            'owner_postcode.required_if' => 'PostCode is required!',
            'owner_telephone.required_if' => 'Mobile Number is required!',
            'owner_email.required_if' => 'Email is required!',
            'owner_email.unique' => 'Email is already taken!',
            'owner_password.required_if' => 'The password field is required!',

        ];
    }
}
