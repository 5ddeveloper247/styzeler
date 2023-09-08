let LETIMAGEID = "letimageid";
let VERIFY = "verify";
var letImages= [];
let count = 0;
let registrationEmail = localStorage.getItem(REGISTRATIONEMAIL);
console.log(registrationEmail);


$('.weeklyRent').hide();
$('.monthlyRent').hide();
$('.dailyRent').hide();
$('.hourlyRent').hide();
$('.rent-and-let').hide();
$('.rent-and-let-go').hide();

function checkLogin() {
    
    var loggedStatus = localStorage.getItem(STID);
    
    if (typeof loggedStatus !== 'undefined' && loggedStatus !== null) {
        
        var loggedMode = localStorage.getItem(REGISTRATIONMODE);
        if (loggedMode === "Hairdressing Owner" || loggedMode === "Beauty Owner") {
            

        } else {
            
            $('.not-salon-owner-modal').modal('show');

        }
        
    } else {
        
        $('.not-loggedin-modal').modal('show');

        
    }

    
}

checkLogin();

var verified;

function captchaVerify() {
    
    setTimeout(function(){
        
         if(localStorage.getItem(VERIFY) === "true") {
                verified = true;
                console.log(verified);
                $('.verified-modal').modal('show');
            }
            else {
                
                verified = false;
                console.log(verified);
                $('.not-verified-modal').modal('show');
            }
            
    }, 1000); 
    
   
            
}

function redirect() {
    window.location.href="rent-let.html";
}

function readURL(input) {

    var file = input.files[0];
    var reader = new FileReader();
    reader.onloadend = function(e) {
        //$('#blah').attr('src', e.target.result);
        //console.log(e.target.result);
        let base64 = reader.result.split(';base64').join(',').split('data:image/').join(',').split(',');
        // console.log( base64[1] + base64[3]);

        $.ajax({
        type: 'post',
        url: webUrl+ 'uploadimage',
        data: {
            "_ImageContent": base64[3],
            "_ImageType": base64[1]
        },
        success: function(response) {

            console.log(response);

            letImages.push(response["_ImageId"]);

            localStorage.setItem(LETIMAGEID, letImages);

        }
        
    });


    }
    reader.readAsDataURL(file);

}


function rentLet(that) {
    if (that.value == "rent let") {
        $('.rent-and-let').show();
        $('.rent-and-let-go').hide();

    }
    else if (that.value == "rent let go") {
        $('.rent-and-let-go').show();
        $('.rent-and-let').hide();

    }
     else {
        count = 1;
    }
}



function longRent(that) {
    if (that.value == "weekly rent") {
        $('.weeklyRent').show();
        $('.monthlyRent').hide();

    }
    else if (that.value == "monthly rent") {
        $('.weeklyRent').hide();
        $('.monthlyRent').show();

    }
     else {
        count = 1;
    }
}


function shortRent(that) {
    if (that.value == "daily rent") {
        $('.dailyRent').show();
        $('.hourlyRent').hide();
        
    }
    else if (that.value == "hourly rent") {
        $('.dailyRent').hide();
        $('.hourlyRent').show();

    }
     else {
        count = 1;
    }
}

 $('.error-modal').on('hidden.bs.modal', function () {
        // remove the bs.modal data attribute from it
        $(this).removeData('bs.modal');
        // and empty the modal-content element
        $('.error-modal .error-message').empty();
    });

// $(document).ready(function() {
$(function(){
    
    
    $('#submitData').on('click', function(e) {
    // $('.chair-rental-1').submit(function(e) {    	
    			count = 0;    			
          //captchaVerify();
    			// if(localStorage.getItem(VERIFY) === "true") {
       //          	verified = true;
       //          	count = 1;
       //          }else
       //          {
       //          	verified = false;
       //          	count = 1;
       //          }
       //  		console.log("Captcha - " + verified);
        		

                e.preventDefault();
                if(!localStorage.getItem(LETIMAGEID))
                {
                    $('.error-modal').modal('show');
                    $('.terms-conditions-modal').modal('hide');
                    $('.error-message').append('Please upload the Images!!');
                    count = 1;
                }

                let imageIds = localStorage.getItem(LETIMAGEID);
                let imageId=(imageIds.split(","));
                //console.log(typeof(imageId[0]));
                let rentLet = $("#rent-let").val();
                let rentLetGo = $("#rent-let-go").val();
                let rentLetChargeWeek ;
                let rentLetChargeMonth ;
                let rentLetGoChargeDaily ;
                let rentLetGoChargeHourly ;
                let category = $("#rental-category").val();
                let spaceDescription = $("#space-description").val();
                let chairPicture1 = imageId[0];
                let chairPicture2 = imageId[1];
                let chairPicture3 = imageId[2];
                // let isChecked = $("#recaptcha-robot").is(":checked");
                let salonName = $("#salon-name").val();
                let salonAddress = $("#salon-address").val();
                let salonCountry =  $("#salon-country").val();
                let salonCounty =  $("#salon-county").val();
                let salonCountryCode = $("#salon-country-code").val();
                let salonMobile = $("#salon-mobile").val();
                // let salonEmail = $("#salon-email").val();
                //alert(salon_email);
                console.log(chairPicture1);
        
                // rent-let long term and short term merged
                if(rentLet == "weekly rent") {
        
                    rentLetChargeWeek = $("#rent-let-charge-weekly").val();
                    if(rentLetChargeWeek === "") {
                        $('.error-modal').modal('show');
                        $('.terms-conditions-modal').modal('hide');
                        $('.error-message').append('Please provide weekly rent!<br>');
                        count = 1;
                    }
                    rentLetChargeMonth = "";
                    rentLetGoChargeHourly = "";
                    rentLetGoChargeDaily = "";
                    
                }
                else if(rentLet == "monthly rent") {
                    rentLetChargeMonth = $("#rent-let-charge-monthly").val();
                    if(rentLetChargeMonth === "") {
                        $('.error-modal').modal('show');
                        $('.terms-conditions-modal').modal('hide');
                        $('.error-message').append('Please provide monthly rent!<br>');
                        count = 1;
                    }
                    rentLetChargeWeek = "";
                    
                    rentLetGoChargeHourly = "";
                    rentLetGoChargeDaily = "";
                    rentLetChargeWeek = "";
                }
                else if(rentLetGo == "daily rent") {
                    rentLetGoChargeDaily = $("#rent-let-charge-go-daily").val();
                    if(rentLetGoChargeDaily === "") {
                        $('.error-modal').modal('show');
                        $('.terms-conditions-modal').modal('hide');
                        $('.error-message').append('Please provide daily rent!<br>');
                        count = 1;
                    }
                    rentLetGoChargeHourly = "";
                    rentLetChargeMonth = "";
                    rentLetGoChargeHourly = "";
                    
                    rentLetChargeWeek = "";
                }
                else if(rentLetGo == "hourly rent") {
                    rentLetGoChargeHourly = $("#rent-let-charge-go-hourly").val();
                    if(rentLetGoChargeHourly === "") {
                        $('.error-modal').modal('show');
                        $('.terms-conditions-modal').modal('hide');
                        $('.error-message').append('Please provide hourly rent!<br>');
                        count = 1;
                    }
                    rentLetGoChargeDaily = "";
                    rentLetChargeMonth = "";
                    
                    rentLetGoChargeDaily = "";
                    rentLetChargeWeek = "";
                }
                else {
                    $('.error-modal').modal('show');
                    $('.terms-conditions-modal').modal('hide');
                    $('.error-message').append('Please Fill Rent & Let Category!<br>');
                    count = 1;
                }
        
                //rent let ro short term
                // if(rentLetGo == "daily rent") {
                //     rentLetGoChargeDaily = $("#rent-let-charge-go-daily").val();
                //     if(rentLetGoChargeDaily === "") {
                //         $('.error-modal').modal('show');
                //         $('.terms-conditions-modal').modal('hide');
                //         $('.error-message').append('Please provide daily rent!<br>');
                //         count = 1;
                //     }
                //     rentLetGoChargeHourly = "";
                // }
                // else if(rentLetGo == "hourly rent") {
                //     rentLetGoChargeHourly = $("#rent-let-charge-go-hourly").val();
                //     if(rentLetGoChargeHourly === "") {
                //         $('.error-modal').modal('show');
                //         $('.terms-conditions-modal').modal('hide');
                //         $('.error-message').append('Please provide hourly rent!<br>');
                //         count = 1;
                //     }
                //     rentLetGoChargeDaily = "";
                // }
                // else {
                //     $('.error-modal').modal('show');
                //     $('.terms-conditions-modal').modal('hide');
                //     $('.error-message').append('Please provide Rent & Let as you go!<br>');
                //     count = 1;
                // }
        
                console.log(rentLetChargeWeek);
                console.log(rentLetChargeMonth);
                console.log(rentLetGoChargeDaily);
                console.log(rentLetGoChargeHourly);
        
        
                //*****************************************************Form Validation Start************************************************************************ */
        
              
              //FirstName Validation
              let letters = /^[A-Za-z0-9 ':-_+.,A-Za-z0-9 '-_:+.,]+$/;
        
              if (salonName != "") {
                  if (!salonName.match(letters)) {
                      $('.error-modal').modal('show');
                      $('.terms-conditions-modal').modal('hide');
                      $('.error-message').append('Saloon name must contain only letters!<br>');
                      count = 1;
        
                  }
              } else {
                  $('.error-modal').modal('show');
                  $('.terms-conditions-modal').modal('hide');
                  $('.error-message').append('Saloon name is required!<br>');
                  count = 1;
              }
        
        
            let numberLetters = /^[0-9 -]+$/;
              if (salonMobile != "") {
                  if (!salonMobile.match(numberLetters)) {
                      $('.error-modal').modal('show');
                      $('.terms-conditions-modal').modal('hide');
                      $('.error-message').append('Mobile number is not valid!<br>Please enter your 10 digit mobile  number.');
                      count = 1;
                  }
              } else {
                  $('.error-modal').modal('show');
                  $('.terms-conditions-modal').modal('hide');
                  $('.error-message').append('Mobile number is required!<br>');
                  count = 1;
              }
        
        
        
              //Address validation
              let addressLetters = /^[A-Za-z0-9 ':-_+.,A-Za-z0-9 '-_:+.,]||[0-9A-Za-z ':-_+.,A-Za-z0-9 '-_:+.,]+$/;
        
              if (salonAddress != "") {
                  if (!salonAddress.match(addressLetters)) {
                      $('.error-modal').modal('show');
                      $('.terms-conditions-modal').modal('hide');
                      $('.error-message').append('Please provide proper address!<br>');
                      count = 1;
        
                  }
              } else {
                  $('.error-modal').modal('show');
                  $('.terms-conditions-modal').modal('hide');
                  $('.error-message').append('Address is required!<br>');
                  count = 1;
              }
        
        
              //Country code validation
              let postCodeLetters = /^[A-Za-z0-9 ':-_+.,A-Za-z0-9 '-_:+.,]+$/;
        
              if (salonCountryCode != "") {
                  if (!salonCountryCode.match(postCodeLetters)) {
                      $('.error-modal').modal('show');
                      $('.terms-conditions-modal').modal('hide');
                      $('.error-message').append('Post code must contain only numbers!<br>');
                      count = 1;
        
                  }
              } else {
                  $('.error-modal').modal('show');
                  $('.terms-conditions-modal').modal('hide');
                  $('.error-message').append('Post code is required!<br>');
                  count = 1;
              }
        
              //Country validation
              let countryLetters = /^[A-Za-z ]+$/;
        
              if (salonCountry != "") {
                  if (!salonCountry.match(countryLetters)) {
                      $('.error-modal').modal('show');
                      $('.terms-conditions-modal').modal('hide');
                      $('.error-message').append('Country name must contain only letters!<br>');
                      count = 1;
        
                  }
              } else {
                  $('.error-modal').modal('show');
                  $('.terms-conditions-modal').modal('hide');
                  $('.error-message').append('Country name is required!<br>');
                  count = 1;
              }
              
              // County Validation
              if (salonCounty != "") {
                  if (!salonCounty.match(countryLetters)) {
                      $('.error-modal').modal('show');
                      $('.terms-conditions-modal').modal('hide');
                      $('.error-message').append('County name must contain only letters!<br>');
                      count = 1;
        
                  }
              } else {
                  $('.error-modal').modal('show');
                  $('.terms-conditions-modal').modal('hide');
                  $('.error-message').append('County name is required!<br>');
                  count = 1;
              }
        
              //Space description validation
              let resumeLetters = /^[A-Za-z0-9 ':-_+.,A-Za-z0-9 '-_:+.,]+$/;
        
              if(spaceDescription != "") {
        
                  if (spaceDescription.length < 10) {
                      $('.error-modal').modal('show');
                      $('.terms-conditions-modal').modal('hide');
                      $('.error-message').append('Please tell us a bit more about Space Description! min - 10 letters<br>');
                      count = 1;
                      
                      if (!spaceDescription.match(resumeLetters)) {
                          $('.error-modal').modal('show');
                          $('.terms-conditions-modal').modal('hide');
                          $('.error-message').append('Please use proper letters in space description!<br>');
                          count = 1;
          
                      }
              }
              } else {
                  $('.error-modal').modal('show');
                  $('.terms-conditions-modal').modal('hide');
                  $('.error-message').append('Space Description is required!<br>');
                  count = 1;
              }
        
              //Picture validation
              if(typeof(chairPicture1) === "undefined" && typeof(chairPicture2) === "undefined" && typeof(chairPicture3) === "undefined"){
                $('.error-modal').modal('show');
                $('.terms-conditions-modal').modal('hide');
                $('.error-message').append('Please provide Three image files!<br>');
                count = 1;
            }
             
              console.log(count);
              console.log(category);
        
        
              //*****************************************************Form Validation End*****************************************************************************/
        
              if(count === 0) {
                //if box checked
                if(localStorage.getItem(VERIFY) === "true") {
                // if(isChecked) {
                
        
                    console.log("Working");
                    
        
                    //Ajax call letsalonspace
                    $.ajax({
                        type: 'post',
                        url: webUrl + 'letsalonspace',
                        data: {
                            "_Category": category,
                            "_SpaceDescription": spaceDescription,//
                            "_SpaceImgId1": chairPicture1,
                            "_SpaceImgId2": chairPicture2,
                            "_SpaceImgId3": chairPicture3,
                            "_SalonName": salonName,//
                            "_SalonAddress": salonAddress,//
                            "_SalonCountry": salonCountry,//
                            "_SalonCounty": salonCounty,
                            "_SalonPostalCode": salonCountryCode,//
        
                            "_SalonWeeklyRate": rentLetChargeWeek,
                            "_SalonMonthlyRate": rentLetChargeMonth,
                            "_SalondailyRate": rentLetGoChargeDaily,
                            "_SalonHourlyRate": rentLetGoChargeHourly,
        
                            "_SalonMobileNumber": salonMobile,//
                            "_SalonEmailId": registrationEmail//
                        },
                        success: function(response) {
                            console.log(response);
                            localStorage.removeItem(LETIMAGEID);
        
                            if(response["_ReturnMessage"] === "Success") {
                                 $('.success-modal').modal('show');
                                 
                            } 
                            
                             else {
                                 
                                 $('.error-modal').modal('show');
                                 
                            } 
                           
                        }
        
                    }); //end of ajax call
                }
                
        
            }
            else
            {
            	console.log("Rumki");
            	console.log(count);
            }
            if(!verified) {
                $('.error-modal').modal('show');
                $('.terms-conditions-modal').modal('hide');
                $('.error-message').append('Please verify the captcha!<br>');
            }
            
    });
});

