<?php

namespace App\Http\Controllers\Auth;

use Countable;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
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

        $rate = '';
        if ($request->otherRate == 0 || $request->otherRate == '0') {
            $rate = $request->stylist_rate;
        } else {
            $rate = $request->otherRate;
        }

        $userData = match ($request->type) {
            'wedding', 'hairStylist', 'beautician', 'barber' => [
                'name' => $request->stylist_name,
                'surname' => $request->stylist_surname,
                'email' => $request->stylist_email,
                'age' => $request->stylist_age,
                'profile_type' => $request->stylist_type,
                'qualification' => $request->qualification,
                'gallery' => $images['image_gallery'] ?? '',
                'utr_number' => $request->utr_number,
                'hero_image' => $images['stylist_picture'],
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
                'utr_number' => $request->utr_number,
                'address' => $request->owner_address,
                'password' => $request->owner_password,
                'type' => $request->type,
                'data' => array_merge(
                    $request->except($commonFields),
                    ['images' => $images]
                ),
            ],

                // Add cases for other types here...
            default => [],
        };
        // dd($userData);
        User::create($userData);

        return response()->json(['status' => 200, 'message' => 'Registration Succsessfull!', 'data' => '']);
    }

    public function deleteHeroImage($imagePath)
    {
        try {
            // Check if the file exists before attempting to delete it
            if (File::exists($imagePath)) {
                // Delete the file
                File::delete($imagePath);
                return 'Image deleted successfully';
            } else {
                return 'Image not found';
            }
        } catch (\Exception $e) {
            return 'Error deleting image: ' . $e->getMessage();
        }
    }
}
