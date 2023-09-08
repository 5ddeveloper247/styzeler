<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/old', function () {
    return view('index_old');
});

// Auth::routes();

Route::group(['namespace' => 'FrontEnd'], function () {

    //Auth
    Route::middleware(['guest'])->group(function () {
        Route::get('/registration', 'FrontEndController@register')->name('register');
        Route::get('/login', 'FrontEndController@login')->name('login');

        // Registration processes on different users
        Route::get('/weddingRegistration', 'FrontEndController@weddingRegistration')->name('weddingRegistration');
        Route::get('/hairdressingSalonRegistration', 'FrontEndController@hairdressingSalonRegistration')->name('hairdressingSalonRegistration');
        Route::get('/beautySalonRegistration', 'FrontEndController@beautySalonRegistration')->name('beautySalonRegistration');
        Route::get('/hairStylistRegistration', 'FrontEndController@hairStylistRegistration')->name('hairStylistRegistration');
        Route::get('/beauticianRegistration', 'FrontEndController@beauticianRegistration')->name('beauticianRegistration');
        Route::get('/barberRegistration', 'FrontEndController@barberRegistration')->name('barberRegistration');
        Route::get('/clientRegistration', 'FrontEndController@clientRegistration')->name('clientRegistration');
    });

    Route::get('/forgetPassword', 'FrontEndController@forgetPassword')->name('forgetPassword');


    // About
    Route::get('/aboutUs', 'FrontEndController@aboutUs')->name('aboutUs');
    Route::get('/contactUs', 'FrontEndController@contactUs')->name('contactUs');

    // businessOwner
    Route::get('/businessOwner', 'FrontEndController@businessOwner')->name('businessOwner');

    // candidate
    Route::get('/candidate', 'FrontEndController@candidate')->name('candidate');

    //news
    Route::get('/news', 'FrontEndController@news')->name('news');

    // wedding
    Route::get('/wedding', 'FrontEndController@wedding')->name('wedding');

    //Rent&Let
    Route::get('/rentAndLet', 'FrontEndController@rentAndLet')->name('rentAndLet');

    //Footer
    Route::get('/privacyPolicy', 'FrontEndController@privacyPolicy')->name('privacyPolicy');
    Route::get('/termAndConditions', 'FrontEndController@termAndConditions')->name('termAndConditions');
    Route::get('/webTermAndConditions', 'FrontEndController@webTermAndConditions')->name('webTermAndConditions');



    Route::group(['middleware' => 'auth'], function () {

        //Profile
        Route::get('/Profile', 'FrontEndController@Profile')->name('Profile');
        // Route::get('/ownerProfile', 'FrontEndController@ownerProfile')->name('ownerProfile');
        Route::get('/getProfileData', 'ProfileController@getProfileData')->name('getProfileData');
        Route::post('/ProfileImageUpdate', 'ProfileController@ProfileImageUpdate')->name('ProfileImageUpdate');
    });
});

Route::middleware(['guest'])->group(function () {
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    // Other routes that should only be accessible to guests
});

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/registration', 'App\Http\Controllers\Auth\RegisterController@register')->name('registration');
