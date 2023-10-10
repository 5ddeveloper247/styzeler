<?php

namespace App\Http\Controllers\Auth;

use Countable;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\RegisterValidationRequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    public function register(RegisterValidationRequest $request)
    {
        $images = [];
        $userData = [];
        // Define the files you want to process and their corresponding paths
        $fileInputs = [
            // for wedding & hairStylist
            'stylist_picture' => '/images/wedding',
            'owner_picture' => '/images/hairSalon',
            'cv' => '/pdf/wedding',
            'image_gallery' => '/images/wedding',
            'public_liability_insurance' => '/images/wedding',

            //for hairdressing salon owner & beauty salon owner
            'owner_picture' => '/images/hairdressing',
        ];

        $commonFields = [
            'stylist_name',
            'stylist_surname',
            'type',
            'stylist_email',
            'stylist_mobile',
            'stylist_password',
            'stylist_picture',
            'cv',
            'image_gallery',
            'public_liability_insurance',
            'owner_name',
            'owner_surname',
            'owner_postcode',
            'owner_email',
            'owner_telephone',
            'owner_address',
            'owner_password',
            'owner_picture',
            'otherRate',
            'stylist_surname',
            'stylist_age',
            'stylist_type',
            'qualification',
            'stylist_language',
            'stylist_rate',
            'zone',
            'stylist_resume',
            'image-gallery',
            'stylist_picture',
            'agree',
            'utr_number'

            // Add other common fields here...
        ];

        foreach ($fileInputs as $reg_image => $path) {
            if ($request->hasFile($reg_image)) {

                $uploadedFiles = $request->file($reg_image);

                // Check if $uploadedFiles is an array or implements Countable
                if (is_array($uploadedFiles) || $uploadedFiles instanceof Countable) {

                    $fileCount = count($uploadedFiles);

                    if ($fileCount >= 1) {

                        // Multiple files were uploaded for this input
                        $savedImages = saveMultipleImages($uploadedFiles, $path);
                        $images[$reg_image] = $savedImages;
                    }
                } else {

                    // single files were uploaded for this input
                    $savedImage = saveSingleImage($uploadedFiles, $path);
                    $images[$reg_image] = $savedImage;
                }
            }
        }
        //         dd($images);
        $rate = '';
        if ($request->stylist_rate == '') {
            $rate = $request->otherRate;
        } else {
            $rate = $request->stylist_rate;
        }

        $userData = match ($request->type) {
            'wedding', 'hairStylist', 'beautician', 'barber' => [
                'name' => $request->stylist_name,
                'surname' => $request->stylist_surname,
                'email' => $request->stylist_email,
                'age' => $request->stylist_age,
                'cv' => $request->cv,
                'profile_type' => $request->stylist_type,
                'qualification' => $request->qualification,
                'gallery' => $images['image_gallery'] ?? '',
                'utr_number' => $request->utr_number,
                'hero_image' => $images['stylist_picture'],
                'cv' => isset($images['cv']) ? $images['cv'] : '',
                'public_liability_insurance' => $images['public_liability_insurance'] ?? '',
                'languages' => $request->stylist_language,
                'rate' => $rate,
                'zone' => $request->zone,
                'resume' => $request->stylist_resume,
                'phone' => $request->stylist_mobile,
                'password' => $request->stylist_password,
                'type' => $request->type,
                'data' => $request->except($commonFields),
            ],
            'hairdressingSalon', 'beautySalon', 'client' => [
                'name' => $request->owner_name,
                'surname' => $request->owner_surname,
                'email' => $request->owner_email,
                'phone' => $request->owner_telephone,
                'post_code' => $request->owner_postcode,
                'hero_image' => $images['owner_picture'],
                'cv' => isset($images['cv']) ? $images['cv'] : '',
                'utr_number' => $request->utr_number,
                'address' => $request->owner_address,
                'password' => $request->owner_password,
                'type' => $request->type,
                'data' => array_merge(
                    $request->except($commonFields)
                ),
            ],

                // Add cases for other types here...
            default => [],
        };

        // dd($userData);

        User::create($userData);

        $sending_email_to = [$userData['email'], 'admin@styzeler.co.uk'];

        foreach ($sending_email_to as $email) {
            if ($email == 'admin@styzeler.co.uk') {
                $body = "<h4>A New User Has Been Successfully Registered !</h4><br>
                            <p>User Creadentials are:</p>";
                $user_type = " <td>Type:</td>
                    <td>" . formatUserType($userData['type']) . "</td>";
                $email_send_to = 'admin@styzeler.co.uk';
                $user_profile_type = $userData['profile_type'] ?? '';
                $email_for = "New User Registration";
                $email_subject = "New User Registration Email";
            } else {
                $body = "<h4>Your Registration Successfully Completed !</h4><br>
                            <p>Your Creadentials are:</p>";
                $user_type = " <td>Password:</td>
                    <td>" . $userData['password'] . "</td>";
                $email_send_to = $userData['email'];
                $user_profile_type = $userData['profile_type'] ?? '';
                $email_for = "New Registration";
                $email_subject = "Registration Email";
            }

            $body .= "<table>
                <tr>
                    <td>Name:</td>
                    <td>" . $userData['name'] . "</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>" . $userData['email'] . "</td>
                </tr>
                <tr>$user_type</tr>
                ";
            if (!empty($user_profile_type)) {
                $body .= "
                <tr>
                    <td>Profle Type:</td>
                    <td>$user_profile_type</td>
                </tr>";
            }
            $body .= "</table>";

            sendMail($userData['name'], $email_send_to, $email_for, $email_subject, $body);
        }
        return response()->json(['status' => 200, 'message' => 'Registration Succsessfull!', 'data' => '']);
    }
}
