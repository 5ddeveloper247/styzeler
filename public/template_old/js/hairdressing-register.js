let IMAGEID = "imageid";

//redirect to his profile
function redirect() {
     window.location.href = "./login.html";
}

function redirectToPage() {
    window.location.href = "./hairdressing-profile-buildup.html";
}


function sendEmail() {
    
    let ownerMessage = "A new Candiate registered as Hairdressing Owner on Styzeler Website. Please go through the details on Adminpanel.";
    var settings = {
    "url": "./email.php",
    "method": "POST",
    "timeout": 0,
    "headers": {
        "Content-Type": "application/json"
    },
    "data": JSON.stringify({
        "_Email": "styzelercharlie7@gmail.com",  //Updated by Rumki - wearestyzeler@gmail.com
        "_Subject": "Styzeler Agency: New Registration ",
        "_Message": ownerMessage
    }),
    };

    $.ajax(settings).done(function (response) {
    console.log(response);
    $('.success-modal').modal('show');
    });

}

//For profile Picture
function readURL(input) {
    //changing
    document.getElementById("loader").style.display="block";


  var file = input.files[0];
  var reader = new FileReader();
  reader.onloadend = function(e) {
      $('#blah').attr('src', e.target.result);
      // console.log(e.target.result);
      let base64 = reader.result.split(';base64').join(',').split('data:image/').join(',').split(',');
      // console.log( base64[1] + base64[3]);

      $.ajax({
      type: 'post',
      url: webUrl + 'uploadimage',
      data: {
          "_ImageContent": base64[3],
          "_ImageType": base64[1]
      },
      success: function(response) {
          
          document.getElementById("content").style.display="block";
          document.getElementById("loader").style.display="none";

          console.log(response);

          localStorage.setItem(IMAGEID, response["_ImageId"]);

      }
      
  });


  }
  reader.readAsDataURL(file);

}


 $('.error-modal').on('hidden.bs.modal', function () {
        // remove the bs.modal data attribute from it
        $(this).removeData('bs.modal');
        // and empty the modal-content element
        $('.error-modal .error-message').empty();
    });
    
    

$(function(){


    $('#register-form').submit(function(e){

      e.preventDefault();

      // Personal Information - 1st part
      let picture = localStorage.getItem(IMAGEID);
      let firstName = $("#owner-name").val();
      let lastName = $("#owner-surname").val();
      let address = $("#owner-address").val();
      let postcode = $("#owner-postcode").val();
      let email = $("#owner-email").val();
      let mobile = $("#owner-telephone").val();
      let password = $("#owner-password").val();


      //Hair Cutting // idiot just make an array out of it----------------------------------------------------------------------------------------------------
      let hairCutting = [];
      let refinedHairCutting = "";
  
      hairCutting.push($("#stylist-customer-ladies").is(':checked') ? "Ladies" : 0);
      hairCutting.push($("#stylist-customer-gents").is(':checked') ? "Gents" : 0);
      hairCutting.push($("#stylist-customer-kids").is(':checked') ? "Kids" : 0);
      hairCutting.push($("#stylist-customer-afro").is(':checked') ? "Afro Caribbean" : 0);
      // console.log(hairCutting);


      // accepting if checked
      $.each(hairCutting, function(i) {

          console.log(hairCutting[i]);

          if(hairCutting[i] != "0" ) {

              refinedHairCutting = refinedHairCutting + hairCutting[i] + ", ";
          }
          
      });

      //merging serviceName + serviceHeader +serviceSubheader
      let hairCuttingService = {"_ServiceName" : refinedHairCutting , "_ServiceHeader" : "Hair Cutting" , "_ServiceSubHeader" : "Services"};
      //console.log(headService);

      //Barber Male Grooming------------------------------------------------------------------------------------------------------------------------------------
      let barberMaleGrooming = [];
      let barberMaleGroomingProducts = [];
      let refinedBarberMaleGrooming = "";
      let refinedbarberMaleGroomingProducts = "";

      barberMaleGrooming.push($("#scissors-cut").is(':checked') ? "Scissors Cut" : 0);
      barberMaleGrooming.push($("#clipper-cut").is(':checked') ? "Clipper Cut" : 0);
      barberMaleGrooming.push($("#beard-shaped").is(':checked') ? "Beard Shaped" : 0);
      barberMaleGrooming.push($("#skin-fade").is(':checked') ? "Skin Fade" : 0);
      barberMaleGrooming.push($("#wet-shave").is(':checked') ? "Wet Shave" : 0);
      barberMaleGrooming.push($("#hot-towel").is(':checked') ? "Hot Towel" : 0);
      barberMaleGrooming.push($("#chemical-relaxer").is(':checked') ? "Chemical Relaxer" : 0);
      barberMaleGrooming.push($("#gray-blending").is(':checked') ? "Gray Blending" : 0);
      // console.log(barberMaleGrooming);

      // accepting if checked
      $.each(barberMaleGrooming, function(i) {

          if(barberMaleGrooming[i] != 0 ) {

              refinedBarberMaleGrooming = refinedBarberMaleGrooming + barberMaleGrooming[i] + ", ";
          }
          
      });

      console.log(refinedBarberMaleGrooming);

      //merging serviceName + serviceHeader +serviceSubheader
      let barberMaleGroomingService = {"_ServiceName" : refinedBarberMaleGrooming , "_ServiceHeader" : "Barber Male Grooming" , "_ServiceSubHeader" : "Services"};

      //products
      barberMaleGroomingProducts.push($("#kerastase").is(':checked') ? "Kerastase" : 0);
      barberMaleGroomingProducts.push($("#loreal-tecni-art").is(':checked') ? "L'oreal Tecni Art" : 0);
      barberMaleGroomingProducts.push($("#schwarzkopf-bc-bonacure").is(':checked') ? "Schwarzkopf Bc Bonacure" : 0);
      barberMaleGroomingProducts.push($("#keracare").is(':checked') ? "KeraCare" : 0);
      barberMaleGroomingProducts.push($("#redken").is(':checked') ? "Redken" : 0);
      barberMaleGroomingProducts.push($("#anita-grant").is(':checked') ? "Anita Grant" : 0);
      barberMaleGroomingProducts.push($("#fudge").is(':checked') ? "Fudge" : 0);
      barberMaleGroomingProducts.push($("#moroccan-oil").is(':checked') ? "Moroccan Oil" : 0);
      barberMaleGroomingProducts.push($("#kevin-murphy").is(':checked') ? "Kevin Murphy" : 0);
      barberMaleGroomingProducts.push($("#proraso").is(':checked') ? "Proraso" : 0);
      barberMaleGroomingProducts.push($("#wella-eimi").is(':checked') ? "Wella EIMI" : 0);
      barberMaleGroomingProducts.push($("#shu-uemura").is(':checked') ? "Shu Uemura" : 0);
      barberMaleGroomingProducts.push($("#aveda").is(':checked') ? "Aveda" : 0);

      // accepting if checked
      $.each(barberMaleGroomingProducts, function(i) {

          if(barberMaleGroomingProducts[i] != 0 ) {

              refinedbarberMaleGroomingProducts = refinedbarberMaleGroomingProducts + barberMaleGroomingProducts[i] + ", ";
          }
          
      });

      console.log(refinedbarberMaleGroomingProducts);

      //merging productName + serviceHeader +serviceSubheader
      let barberMaleGroomingProduct = {"_ServiceName" : refinedbarberMaleGroomingProducts , "_ServiceHeader" : "Barber Male Grooming" , "_ServiceSubHeader" : "Styling Products"};


       //Hair Color-------------------------------------------------------------------------------------------------------------------------------------------------
       let hairColor = [];
       let hairColorBrands = [];
       let refinedHairColor = "";
       let refinedHairColorBrands = "";

       //Services
       hairColor.push($("#fashion-color").is(':checked') ? "Fashion Color" : 0);
       hairColor.push($("#highlights").is(':checked') ? "Highlights" : 0);
       hairColor.push($("#balayage").is(':checked') ? "Balayage" : 0);
       hairColor.push($("#colour-correction").is(':checked') ? "Colour Correction" : 0);
       hairColor.push($("#full-head-bleach").is(':checked') ? "Full Head Bleach" : 0);
       // console.log(hairColor);

       // accepting if checked
       $.each(hairColor, function(i) {

           if(hairColor[i] != 0 ) {

               refinedHairColor = refinedHairColor + hairColor[i] + ", ";
           }
           
       });

       console.log(refinedHairColor);

       //merging serviceName + serviceHeader +serviceSubheader
       let hairColorService = {"_ServiceName" : refinedHairColor , "_ServiceHeader" : "Hair Color" , "_ServiceSubHeader" : "Services"};

       //Product
       hairColorBrands.push($("#loreal").is(':checked') ? "Loreal" : 0);
       hairColorBrands.push($("#wella").is(':checked') ? "Wella" : 0);
       hairColorBrands.push($("#schwarzkopf").is(':checked') ? "Schwarzkopf" : 0);
       hairColorBrands.push($("#redken").is(':checked') ? "Redken" : 0);
       hairColorBrands.push($("#matrix").is(':checked') ? "Matrix" : 0);
       hairColorBrands.push($("#goldwell").is(':checked') ? "Goldwell" : 0);
       hairColorBrands.push($("#aveda").is(':checked') ? "Aveda" : 0);

       // accepting if checked
      $.each(hairColorBrands, function(i) {

        if(hairColorBrands[i] != 0 ) {

            refinedHairColorBrands = refinedHairColorBrands + hairColorBrands[i] + ", ";
        }
        
    });

    console.log(refinedHairColorBrands);

    //merging serviceName + serviceHeader +serviceSubheader
    let hairColorBrand = {"_ServiceName" : refinedHairColorBrands , "_ServiceHeader" : "Hair Color" , "_ServiceSubHeader" : "Brands"};

       //Chemical Treatments---------------------------------------------------------------------------------------------------------------------------------------------
       let chemicalTreatments = [];
       let chemicalTreatmentsProducts = [];
       let refinedChemicalTreatments = "";
       let refinedChemicalTreatmentsProducts = "";

       //Services
       chemicalTreatments.push($("#perm").is(':checked') ? "Perm" : 0);
       chemicalTreatments.push($("#brazilian-blow-dry").is(':checked') ? "Brazilian Blow-Dry" : 0);
       chemicalTreatments.push($("#keratin-treatment").is(':checked') ? "Keratin Treatment" : 0);
       chemicalTreatments.push($("#chemical-relaxer").is(':checked') ? "Chemical Relaxer" : 0);

       // console.log(chemicalTreatments);

       // accepting if checked
       $.each(chemicalTreatments, function(i) {

           if(chemicalTreatments[i] != 0 ) {

               refinedChemicalTreatments = refinedChemicalTreatments + chemicalTreatments[i] + ", ";
           }
           
       });

       console.log(refinedChemicalTreatments);


       //merging serviceName + serviceHeader +serviceSubheader
       let chemicalTreatmentService = {"_ServiceName" : refinedChemicalTreatments , "_ServiceHeader" : "Chemical Treatment" , "_ServiceSubHeader" : "Services"};

       //Products
       chemicalTreatmentsProducts.push($("#kerastraight").is(':checked') ? "Kerastraight" : 0);
       chemicalTreatmentsProducts.push($("#global-keratin").is(':checked') ? "Global Keratin" : 0);
       chemicalTreatmentsProducts.push($("#cocochoco-brazilian-keratin").is(':checked') ? "Cocochoco Brazilian Keratin" : 0);
       chemicalTreatmentsProducts.push($("#goldwell-kerasilk").is(':checked') ? "Goldwell Kerasilk" : 0);
       chemicalTreatmentsProducts.push($("#schwarzkopf-professional").is(':checked') ? "Schwarzkopf Professional" : 0);
       chemicalTreatmentsProducts.push($("#wella-professionals").is(':checked') ? "Wella Professionals" : 0);
       chemicalTreatmentsProducts.push($("#sibel").is(':checked') ? "Sibel" : 0);
       chemicalTreatmentsProducts.push($("#loreal-professionnel").is(':checked') ? "Loreal Professionnel" : 0);

       // accepting if checked
      $.each(chemicalTreatmentsProducts, function(i) {

        if(chemicalTreatmentsProducts[i] != 0 ) {

            refinedChemicalTreatmentsProducts = refinedChemicalTreatmentsProducts + chemicalTreatmentsProducts[i] + ", ";
        }
        
    });

    console.log(refinedChemicalTreatmentsProducts);

    //merging productsName + serviceHeader +serviceSubheader
    let chemicalTreatmentsProduct = {"_ServiceName" : refinedChemicalTreatmentsProducts , "_ServiceHeader" : "Chemical Treatments" , "_ServiceSubHeader" : "Products"};
    //console.log(chemicalTreatmentsService);


      //*****************************************************Form Validation Start************************************************************************ */

      let count = 0;
      //FirstName Validation
      let letters = /^[A-Za-z ]+$/;

      if (firstName != "") {
          if (!firstName.match(letters)) {
              $('.error-modal').modal('show');
              $('.terms-conditions-modal').modal('hide');
              $('.error-message').append('Name must contain only letters!<br>');
              count = 1;

          }
      } else {
          $('.error-modal').modal('show');
          $('.terms-conditions-modal').modal('hide');
          $('.error-message').append('Name is required!<br>');
          count = 1;
      }

      //Lastname validation
      if (lastName != "") {
          if (!lastName.match(letters)) {
              $('.error-modal').modal('show');
              $('.terms-conditions-modal').modal('hide');
              $('.error-message').append('Surname must contain only letters!<br>');
              count = 1;

          }
      } else {
          $('.error-modal').modal('show');
          $('.terms-conditions-modal').modal('hide');
          $('.error-message').append('Surname is required!<br>');
          count = 1;
      }

      //Email Validation
      let emailLetters = /^([\.a-zA-Z0-9_\-])+@([a-zA-Z0-9_\-])+(([a-zA-Z0-9_\-])*\.([a-zA-Z0-9_\-])+)+$/;
      if (email != "") {
          if (!email.match(emailLetters)) {
              $('.error-modal').modal('show');
              $('.terms-conditions-modal').modal('hide');
              $('.error-message').append('Email Address not valid!<br>');
              count = 1;
          }
      } else {
          $('.error-modal').modal('show');
          $('.terms-conditions-modal').modal('hide');
          $('.error-message').append('Email is required!<br>');
          count = 1;
      }

      //Password Validation
        let pwLetters = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!"#$%&'()*+,-.\/:;<=>?\\@[\]^_`{|}~]).{6,16}$/;
        if (password != "") {
            if(!password.match(pwLetters)) {
                $('.error-modal').modal('show');
                $('.terms-conditions-modal').modal('hide');
                $('.error-message').append('Password length must be 8-16 and password must contain atleast one number, one capital letter and one special charecter!<br>');
                count = 1;
            }
            
        }
        else {
            $('.error-modal').modal('show');
            $('.terms-conditions-modal').modal('hide');
            $('.error-message').append('Please enter a password and it\'s length must be 8-16 and must contain atleast one number, one capital letter and one special charecter! !<br>');
            count = 1;
        }

      //Number Validation
    //   let numberLetters = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[6789]\d{9}$/;
    let numberLetters = /^[0-9]+$/;
      if (mobile != "") {
          if (!mobile.match(numberLetters)) {
              $('.error-modal').modal('show');
              $('.terms-conditions-modal').modal('hide');
              $('.error-message').append('Mobile number is not valid!<br>');
              count = 1;
          }
      } else {
          $('.error-modal').modal('show');
          $('.terms-conditions-modal').modal('hide');
          $('.error-message').append('Mobile number is required!<br>');
          count = 1;
      }



      //Address validation
      let addressLetters = /^[A-Za-z0-9 ':-_+.,A-Za-z0-9 '-_:+.,]+$/;

      if (address != "") {
          // if (!address.match(addressLetters)) {
          //     $('.error-modal').modal('show');
          //     $('.terms-conditions-modal').modal('hide');
          //     $('.error-message').append('Please provide proper address!<br>');
          //     count = 1;

          // }
      } else {
          $('.error-modal').modal('show');
          $('.terms-conditions-modal').modal('hide');
          $('.error-message').append('Address is required!<br>');
          count = 1;
      }

      //Picture validation
      if (picture == null) {
          $('.error-modal').modal('show');
          $('.terms-conditions-modal').modal('hide');
          $('.error-message').append('Profile picture is required!<br>');
          count = 1;
      }

      //Post code validation // vhange here
      let postCodeLetters = /^[A-Za-z0-9 ':-_+.,A-Za-z0-9 '-_:+.,]+$/;

      if (postcode != "") {
          if (!postcode.match(postCodeLetters)) {
              $('.error-modal').modal('show');
              $('.terms-conditions-modal').modal('hide');
              $('.error-message').append('Postcode must contain only numbers!<br>');
              count = 1;

          }
      } else {
          $('.error-modal').modal('show');
          $('.terms-conditions-modal').modal('hide');
          $('.error-message').append('Postal code is required!<br>');
          count = 1;
      }

      console.log(count);


      //*****************************************************Form Validation End*****************************************************************************/

      if(count === 0) {
      //Ajax call - Register
      $.ajax({
          type: 'post',
          url: webUrl + 'register',
          data: {           
            "_EmailId": email,
            "_Password": password,
            "_MobileNumber": mobile,
            "_FirstName": firstName,
            "_LastName": lastName,
            "_Age": null,
            "_ProfileImageId": picture,
            "_RegistrationMode":"Hairdressing Owner",
            "_Resume": null,
            "_CvId": null,
            "_Work": null,
            "_NVQ_2": null,
            "_NVQ_3": null,
            "_NVQ_ASSESOR": null,
            "_TradeTestVideoUrl": null,
            "_UTR": null,
            "_PublicLiabilityImageId": null,
            "_Rate": null,
            "_Languages": null,
            "_Address": address,
            "_PostCode": postcode,
            "images":[],
            "services": [hairCuttingService, barberMaleGroomingService, hairColorService, chemicalTreatmentService,
                barberMaleGroomingProduct, hairColorBrand, chemicalTreatmentsProduct],
            "_IsAcceptTerms" : "1"
         },
          success: function(response) {

            console.log(response);

             
            if ( response["_ReturnMessage"] === "Success") {

                localStorage.removeItem(IMAGEID);

                
                $('.terms-conditions-modal').modal('hide');
                
                sendEmail();
                
                // $('.success-modal').modal('show');


            }
                
            //Image profile id validation
            if ( response["_ReturnMessage"] === "Please enter your profile image id") {
                $('.error-modal').modal('show');
                $('.terms-conditions-modal').modal('hide');
                $('.error-message').append('Please enter your profile image id.');

            }
            
            //Email Validation
            if ( response["_ReturnMessage"] === "Please enter a valid email id") {
                $('.error-modal').modal('show');
                $('.terms-conditions-modal').modal('hide');
                $('.error-message').append('Please enter a valid email id.');

            }
            
            //Email Already exist
            if ( response["_ReturnMessage"] === "Email id already present.") {
                $('.error-modal').modal('show');
                $('.terms-conditions-modal').modal('hide');
                $('.error-message').append('User already exist!');

            }
            
            //Password Validation
            if ( response["_ReturnMessage"] === "Please enter your password") {
                $('.error-modal').modal('show');
                $('.terms-conditions-modal').modal('hide');
                $('.error-message').append('Please enter your password.');

            }
            
            //Mobile Validation
            if ( response["_ReturnMessage"] === "Please enter your mobile number") {
                $('.error-modal').modal('show');
                $('.terms-conditions-modal').modal('hide');
                $('.error-message').append('Please enter your mobile number.');

            }
            
            //First Name Validation
            if ( response["_ReturnMessage"] === "Please enter your first name") {
                $('.error-modal').modal('show');
                $('.terms-conditions-modal').modal('hide');
                $('.error-message').append('Please enter your first name.');

            }
            
            //Last Name Validation
            if ( response["_ReturnMessage"] === "Please enter your last name") {
                $('.error-modal').modal('show');
                $('.terms-conditions-modal').modal('hide');
                $('.error-message').append('Please enter your last name.');

            }
            
            //Age validation
            if ( response["_ReturnMessage"] === "Please enter your age") {
                $('.error-modal').modal('show');
                $('.terms-conditions-modal').modal('hide');
                $('.error-message').append('Please enter your age.');

            }
            
            
            //Resume validation
            if ( response["_ReturnMessage"] === "Please enter your resume") {
                $('.error-modal').modal('show');
                $('.terms-conditions-modal').modal('hide');
                $('.error-message').append('Please enter your resume.');

            }
            
            // if ( response["_ReturnMessage"] === "PPlease enter your trade test video url") {
            //     $('.error-modal').modal('show');
            //     $('.terms-conditions-modal').modal('hide');
            //     $('.error-message').append('Please enter your trade test video url.');

            // }
            
            //UTR Validation
            if ( response["_ReturnMessage"] === "Please enter your utr") {
                $('.error-modal').modal('show');
                $('.terms-conditions-modal').modal('hide');
                $('.error-message').append('Please enter your utr number.');

            }
            
            //Language Validation
            if ( response["_ReturnMessage"] === "Please enter languages") {
                $('.error-modal').modal('show');
                $('.terms-conditions-modal').modal('hide');
                $('.error-message').append('Please enter languages.');

            }

            
          }
        
      });
      //End of Ajax call

    }

    });
    
  
});