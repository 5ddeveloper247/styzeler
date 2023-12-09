// const webUrl = "https://api.styzeler.co.uk/styzeler-api/index.php/app/";

//Login 
// let STID = 'loginstid';
// let REGISTRATIONMODE = 'loginmode';
// let REGISTRATIONEMAIL = 'loginemail';
// let ISACTIVE = "isactive";

AOS.init({
  duration: 900,
});





//Check if logged in or not
// var loggedStatus = localStorage.getItem(STID);

// if (typeof loggedStatus !== 'undefined' && loggedStatus !== null) {

//Sign out if logged in
// $('.signinGroup').append('<a onclick="signOut()" class="btn customBtn signInBtn" >Sign Out</a>' +
//   '<a class="dropdown-toggle btn customBtn" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>' +
//   '<div class="dropdown-menu " aria-labelledby="navbarDropdown" >' +
//   '<div class="user-profile"></div>' +
//   '<a class="dropdown-item" href="booking-history.html">Your Booking History</a>' +
//   '<a class="dropdown-item" href="freelancer-profile.html">Profile</a>' +
//   '<a class="dropdown-item" href="freelancer-booking.html">Your Booking</a>' +
//     '<a class="dropdown-item" href="terms-conditions.html" >Terms & Conditions</a>' +
//     '<a class="dropdown-item" href="privacy-notice.html">Privacy Policy</a>' +
//     '<a class="dropdown-item" href="webstite-terms-condition.html" >Website Terms & Conditions</a>' +
//     '<a class="dropdown-item" href="freelancer-terms-conditions.html">Freelancer Terms & Conditions</a>' +
//     '<a class="dropdown-item" href="faq.html">FAQ</a>' +
//     '</div>'
//   );
//   $(".cookie").hide();

// } else {

//Sign in
//   $('.signinGroup').append('<a href="login.html" class="btn customBtn signInBtn" >Sign In</a>' +
//     '<a href="register.html" class="btn customBtn registerBtn">Register</a>');

// }

// $(".cookieCancel").click(function () {
//   $(".cookie").hide();
// });

//Sign out
// function signOut() {
//   localStorage.removeItem(STID);
//   localStorage.removeItem(REGISTRATIONMODE);
//   localStorage.clear();
//   window.location.href = './index.html';

// }

//Flow - mode
// let userRegistrationMode = localStorage.getItem(REGISTRATIONMODE);

// if (userRegistrationMode === "Wedding Stylist" || userRegistrationMode === "Hairstylist" || userRegistrationMode === "Barber" || userRegistrationMode === "Beautician") {

//   $(".user-profile").append('<a class="dropdown-item" href="profile.html">Profile</a>' +
//     '<a class="dropdown-item" href="freelancer-booking.html">Your Booking</a>' +
//     '<a class="dropdown-item" href="freelancer-booking-history.html">Booking History</a>'

//   );


// } else {

//   $(".user-profile").append('<a class="dropdown-item" href="owner-profile.html">Profile</a>' +
//     '<a class="dropdown-item" href="salon-owner-booking.html">Your Booking</a>' +
//     '<a class="dropdown-item" href="salonowner-booking-history.html">Booking History</a>' +
//     '<a class="dropdown-item" href="chair-listing.html">Your Chair listing</a>'

//   );

// }

$(function () {
  $('[data-toggle="tooltip"]').tooltip();

  //Check if signed in or not



  //For disabling the register submit button 
  $('#terms-and-conditions').click(function () {
    //If the checkbox is checked.
    if ($(this).is(':checked')) {
      //Enable the submit button.
      $('#submit_button').attr("disabled", false);
    } else {
      //If it is not checked, disable the button.
      $('#submit_button').attr("disabled", true);
    }
  });
  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }



});


function countLoadClient() {
      // e.preventDefault();

      let type = 'GET';
      let url = 'getUserCounter';
      let message = '';
      let form = '';
      let data = '';

  
      // PASSING DATA TO FUNCTION
      SendAjaxRequestToServer(type, url, data, '', profileResponse, 'spinner_button', 'submit_button');
}
countLoadClient();

function profileResponse(response) {

  // SHOWING MESSAGE ACCORDING TO RESPONSE
  if (response.status == 200) {
      //saving response data in data var
      $('.cart_count').text(response.data);

  }

}