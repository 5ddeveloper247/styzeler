<?php

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

    Route::group(['middleware' => 'auth'], function () {

        //Profile
        Route::get('/Profile', 'FrontEndController@Profile')->name('Profile');
        Route::get('/freelancerBooking', 'FrontEndController@freelancerBooking')->name('freelancerBooking');
        Route::get('/clientBooking', 'FrontEndController@freelancerBooking')->name('clientBooking');
        Route::get('/freelancerBookingHistory', 'FrontEndController@freelancerBookingHistory')->name('freelancerBookingHistory');
        // Route::get('/ownerProfile', 'FrontEndController@ownerProfile')->name('ownerProfile');
        Route::get('/getProfileData', 'ProfileController@getProfileData')->name('getProfileData');
        Route::post('/ProfileImageUpdate', 'ProfileController@ProfileImageUpdate')->name('ProfileImageUpdate');
        Route::post('/updateProfileImage', 'ProfileController@updateProfileImage')->name('updateProfileImage');
        Route::post('/updateGalleryImages', 'ProfileController@updateGalleryImages')->name('updateGalleryImages');
        Route::post('/deleteGalleryImage', 'ProfileController@deleteGalleryImage')->name('deleteGalleryImage');
        Route::post('/updateBasicInfoProfile', 'ProfileController@updateBasicInfoProfile')->name('updateBasicInfoProfile');
        Route::post('/updateProductAndServices', 'ProfileController@updateProductAndServices')->name('updateProductAndServices');
        Route::post('/saveAvaibleDate', 'ProfileController@saveAvaibleDate')->name('saveAvaibleDate');
        Route::post('/showAppointmentDates', 'ProfileController@showAppointmentDates')->name('showAppointmentDates');
        Route::post('/saveAvaibleSlots', 'ProfileController@saveAvaibleSlots')->name('saveAvaibleSlots');
        Route::post('/getfreelancerBooking', 'ProfileController@getfreelancerBooking')->name('getfreelancerBooking');
        Route::post('/getfreelancerBookingHistory', 'ProfileController@getfreelancerBookingHistory')->name('getfreelancerBookingHistory');
        Route::post('/saveRentAndLetDetails', 'RentLetController@saveRentAndLetDetails')->name('saveRentAndLetDetails');
        Route::post('/saveJobRequestDetails', 'JobRequestController@saveJobRequestDetails')->name('saveJobRequestDetails');

        Route::post('/addToCart', 'CartController@saveAddToCartDetails')->name('addToCart');
        Route::get('/book-freelancer', 'FrontEndController@bookFreelancer')->name('bookFreelancer');
    });
    Route::post('/charge', 'PaymentController@charge')->name('stripe.charge');
    Route::get('/forgetPassword', 'FrontEndController@forgetPassword')->name('forgetPassword');

    Route::post('/showAppointmentDatesFreelancer', 'ProfileController@showAppointmentDatesFreelancer')->name('showAppointmentDatesFreelancer');
    Route::post('/bookSlots', 'ProfileController@bookSlots')->name('bookSlots');
    Route::get('/useOwnerTokens', 'ProfileController@useOwnerTokens')->name('useOwnerTokens');

    // About
    Route::get('/aboutUs', 'FrontEndController@aboutUs')->name('aboutUs');
    Route::get('/contactUs', 'FrontEndController@contactUs')->name('contactUs');

    // home services
    Route::get('/homeServices', 'FrontEndController@homeServices')->name('home_service');

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
    Route::get('/freelancerTermAndConditions', 'FrontEndController@freelancerTermAndConditions')->name('freelancerTermAndConditions');
    Route::get('/faqs', 'FrontEndController@faqs')->name('faqs');


    Route::get('/barber', 'FrontEndController@barber')->name('barber');
    Route::get('/hairstylist', 'FrontEndController@hairstylist')->name('hairstylist');
    Route::get('/beautician', 'FrontEndController@beautician')->name('beautician');
    Route::get('/packages-description', 'FrontEndController@packagesDescription')->name('packagesDescription');
    Route::get('/wedding-stylist', 'FrontEndController@weddingStylist')->name('weddingStylist');
    Route::get('/salon-owner', 'FrontEndController@salonOwner')->name('salonOwner');
    Route::get('/chair-rental', 'FrontEndController@chairRental')->name('chairRental');
    Route::get('/rent-let-hairstylist', 'FrontEndController@rentLetHairstylist')->name('rentLetHairstylist');
    Route::get('/rent-let-beauty-therapist', 'FrontEndController@rentLetBeautyTherapist')->name('rentLetBeautyTherapist');
    Route::get('/jobs', 'FrontEndController@jobs')->name('jobs');

    Route::get('/blogs', 'FrontEndController@blogs')->name('blogs');

    // all routes for services pages
    // routes beauty services
    Route::get('/services-body-waxing', 'FrontEndController@servicesBodywaxing')->name('servicesBodywaxing');
    Route::get('/services-eye-brows', 'FrontEndController@servicesEyebrows')->name('servicesEyebrows');
    Route::get('/services-mani-pedi', 'FrontEndController@servicesManiPedi')->name('servicesManiPedi');
    Route::get('/services-facial', 'FrontEndController@servicesFacial')->name('servicesFacial');
    // routes massage services
    Route::get('/services-massage', 'FrontEndController@servicesMassage')->name('servicesMassage');
    // routes hair&makeup services
    Route::get('/services-ladies', 'FrontEndController@servicesLadies')->name('servicesLadies');
    Route::get('/services-makeup', 'FrontEndController@servicesMakeup')->name('servicesMakeup');
    Route::get('/services-gents', 'FrontEndController@servicesGents')->name('servicesGents');



    // routes for profile view non editable for guest users
    Route::get('/salon-owner-profile', 'FrontEndController@salonOwnerProfile')->name('salonOwnerProfile');
    Route::get('/freelancer-profile', 'FrontEndController@salonOwnerProfile')->name('freelancerProfile');
    Route::get('/getProfileDataView', 'ProfileController@getProfileDataView')->name('getProfileDataView');

    Route::post('/apply-job', 'FrontEndController@jobApply')->name('jobApply');
    Route::get('/apply-job', function () {
        return abort(404);
    });
    Route::post('/saveJobApplyDetails', 'JobRequestController@saveJobApplyDetails')->name('saveJobApplyDetails');
    Route::post('/saveGuestUserDetails', 'ChatController@saveGuestUserDetails')->name('saveGuestUserDetails');
    Route::post('/sendMessage', 'ChatController@sendMessage')->name('sendMessage');
    Route::get('/getAnswer', 'ChatController@getAnswer')->name('getAnswer');

    Route::post('/saveContactUsEnquiry', 'ContactController@saveContactUsEnquiry')->name('saveContactUsEnquiry');
    Route::get('/getClientTokens', 'ProfileController@getClientTokens')->name('getClientTokens');
});


Route::middleware(['guest'])->group(function () {
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::post('/forgetPasswordReset', 'Auth\ForgotPasswordController@forgetPasswordReset')->name('forgetPasswordReset');
    Route::post('/admin/adminLogin', 'Auth\LoginController@adminLogin')->name('admin.adminLogin');
    // Other routes that should only be accessible to guests
});

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/registration', 'App\Http\Controllers\Auth\RegisterController@register')->name('registration');







Route::group(['prefix' => 'admin'], function () {

    Route::group(['namespace' => 'AdminFrontEnd'], function () {

        Route::get('/', 'AdminFrontEndController@login')->name('/');
        Route::get('/login', 'AdminFrontEndController@login')->name('admin.login');
        Route::get('/reset-password', 'AdminFrontEndController@forgetPassword')->name('admin.resetPassword');

        Route::group(['middleware' => ['AdminAuth']], function () {
            Route::get('/dashboard', 'AdminFrontEndController@dashboard')->name('admin.dashboard');
            Route::get('/wedding-stylist', 'AdminFrontEndController@weddingStylist')->name('admin.weddingStylist');
            Route::get('/see-details/{id?}', 'AdminFrontEndController@seeDetails')->name('admin.seeDetails');
            Route::get('/cv/{id?}', 'AdminFrontEndController@cv')->name('admin.cv');
            Route::get('/hair-stylist', 'AdminFrontEndController@hairstylist')->name('admin.hairstylist');
            Route::get('/beautician', 'AdminFrontEndController@beautician')->name('admin.beautician');
            Route::get('/barber', 'AdminFrontEndController@barber')->name('admin.barber');
            Route::get('/hairdressing-owner', 'AdminFrontEndController@hairdressingOwner')->name('admin.hairdressingOwner');
            Route::get('/beauty-salon-owner', 'AdminFrontEndController@beautySalonOwner')->name('admin.beautySalonOwner');
            Route::get('/client', 'AdminFrontEndController@client')->name('admin.client');
            Route::get('/guest-users', 'AdminFrontEndController@guestUsers')->name('admin.guestUsers');
            Route::get('/ownerBookings', 'AdminFrontEndController@bookings')->name('admin.bookings');
            Route::get('/clientBookings', 'AdminFrontEndController@clientBookings')->name('admin.clientBookings');
            Route::get('/job-requests', 'AdminFrontEndController@jobRequests')->name('admin.jobRequests');
            Route::get('/upload-jobs', 'AdminFrontEndController@uploadJobs')->name('admin.uploadJobs');
            Route::get('/upload-blogs', 'AdminFrontEndController@uploadBlogs')->name('admin.uploadBlogs');

            Route::get('/hairstylist-chair', 'AdminFrontEndController@hairStylistChair')->name('admin.hairStylistChair');
            Route::get('/barber-chair', 'AdminFrontEndController@barberChair')->name('admin.barberChair');
            Route::get('/beauty-chair', 'AdminFrontEndController@beautyChair')->name('admin.beautyChair');
            Route::get('/chair-details/{id?}', 'AdminFrontEndController@chairDetails')->name('admin.chairDetails');

            Route::get('/job-applicants', 'AdminFrontEndController@jobApplicants')->name('admin.jobApplicants');
            Route::get('/applicant/{id?}', 'AdminFrontEndController@applicant')->name('admin.applicant');
            Route::get('/applicant-cover-letter/{id?}', 'AdminFrontEndController@applicantCoverLetter')->name('admin.applicantCl');
            Route::get('/applicant-resume/{id?}', 'AdminFrontEndController@applicantResume')->name('admin.applicantCv');
            Route::get('/email-enquiry', 'AdminFrontEndController@emailEnquiry')->name('admin.emailEnquiry');

            Route::get('/chat-questions', 'AdminFrontEndController@chatQuestions')->name('admin.chatQuestions');
            Route::get('/chat-faq', 'AdminFrontEndController@chatFaqs')->name('admin.chatFaqs');


            Route::get('/changeUserStatusActive/{id?}', 'AdminFrontEndController@changeUserStatusActive')->name('admin.changeUserStatusActive');
            Route::get('/changeUserStatusInActive/{id?}', 'AdminFrontEndController@changeUserStatusInActive')->name('admin.changeUserStatusInActive');
        });
    });
    Route::group(['namespace' => 'FrontEnd'], function () {
        Route::group(['middleware' => ['AdminAuth']], function () {

            Route::get('/changeRentLetStatusActive/{id?}', 'RentLetController@changeRentLetStatusActive')->name('admin.changeRentLetStatusActive');
            Route::get('/changeRentLetStatusInActive/{id?}', 'RentLetController@changeRentLetStatusInActive')->name('admin.changeRentLetStatusInActive');

            Route::get('/changeJobReqStatusActive/{id?}', 'JobRequestController@changeJobReqStatusActive')->name('admin.changeJobReqStatusActive');
            Route::get('/changeJobReqStatusInActive/{id?}', 'JobRequestController@changeJobReqStatusInActive')->name('admin.changeJobReqStatusInActive');

            Route::get('/getJobRequestDetail', 'JobRequestController@getJobRequestDetail')->name('getJobRequestDetail');


            Route::post('/saveBlogDetails', 'BlogController@saveBlogDetails')->name('saveBlogDetails');

            Route::post('/saveChatQuestionDetails', 'ChatController@saveChatQuestionDetails')->name('saveChatQuestionDetails');
            Route::get('/getQuestiondetail', 'ChatController@getChatQuestiondetail')->name('getQuestiondetail');
            Route::get('/changeQuestionStatusActive/{id?}', 'ChatController@changeQuestionStatusActive')->name('admin.changeQuestionStatusActive');
            Route::get('/changeQuestionStatusInActive/{id?}', 'ChatController@changeQuestionStatusInActive')->name('admin.changeQuestionStatusInActive');

            Route::get('/getFaqQuestiondetail', 'ChatController@getFaqQuestiondetail')->name('getFaqQuestiondetail');
            Route::post('/saveChatReplyDetails', 'ChatController@saveChatReplyDetails')->name('saveChatReplyDetails');
        });
    });
});


Route::get('mail/send', 'App\Http\Controllers\MailController@sendEmail');
// Route::post('/registration', 'App\Http\Controllers\Auth\RegisterController@register')->name('registration');