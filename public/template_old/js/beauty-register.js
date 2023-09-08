let IMAGEID = "imageid";

//redirect to his profile
function redirect() {
     window.location.href = "./login.html";
}

function redirectToPage() {
     window.location.href = "./beauty-owner-profile-buildup.html";
}


function sendEmail() {
    
    let ownerMessage = "A new Candiate registered as Beauty Owner on Styzeler Website. Please go through the details on Adminpanel.";
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
          //changing
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

   //Message ----------------------------------------------------------------------------------------------------
   let message = [];
   let messageProducts = [];
   let refinedMessage = "";
   let refinedMessageProducts = "";

   //Services
   message.push($("#swedish-massage").is(':checked') ? "Swedish Massage" : 0);
   message.push($("#hot-stone-massage").is(':checked') ? "Hot Stone Massage" : 0);
   message.push($("#deep-tissue-massage").is(':checked') ? "Deep Tissue Massage" : 0);
   message.push($("#armatherapy").is(':checked') ? "Armatherapy Message" : 0);
   message.push($("#shiatsu-massage").is(':checked') ? "Shiatsu Massage" : 0);
   message.push($("#pregnancy-massage").is(':checked') ? "Pregnancy Massage" : 0);
   message.push($("#thai-massage").is(':checked') ? "Thai Massage" : 0);
   message.push($("#lymphatic-massage").is(':checked') ? "lymphatic Massage" : 0);
   message.push($("#reflexology").is(':checked') ? "Reflexology" : 0);

   // accepting if checked
   $.each(message, function(i) {

       console.log(message[i]);

       if(message[i] != 0 ) {

         refinedMessage = refinedMessage + message[i] + ", ";
       }
       
   });

   //String
   console.log(refinedMessage);
   
   //merging serviceName + serviceHeader +serviceSubheader
   let messageService = {"_ServiceName" : refinedMessage , "_ServiceHeader" : "Message" , "_ServiceSubHeader" : "Services"};
   //console.log(headMessage);

   //Products
   messageProducts.push($("#kaeso").is(':checked') ? "Kaeso" : 0);
   messageProducts.push($("#purple-flame").is(':checked') ? "Purple Flame" : 0);
   messageProducts.push($("#strictly-professional").is(':checked') ? "Strictly Professional" : 0);
   messageProducts.push($("#lotus").is(':checked') ? "Lotus" : 0);
   messageProducts.push($("#elemis").is(':checked') ? "Elemis" : 0);
   messageProducts.push($("#dermalogica").is(':checked') ? "Dermalogica" : 0);

   // accepting if checked
   $.each(messageProducts, function(i) {

    console.log(messageProducts[i]);

    if(messageProducts[i] != 0 ) {

      refinedMessageProducts = refinedMessageProducts + messageProducts[i] + ", ";
    }
    
});

//String
console.log(refinedMessageProducts);

//merging serviceName + serviceHeader +serviceSubheader
let messageProduct = {"_ServiceName" : refinedMessageProducts , "_ServiceHeader" : "Message" , "_ServiceSubHeader" : "Products"};

//console.log(headMessage);


   //Hair Removal Permanent----------------------------------------------------------------------------------------------------
   let hairRemovalPermanent = [];
   let refinedHairRemoval = "";

   //Services
   hairRemovalPermanent.push($("#laser").is(':checked') ? "Laser" : 0);
   hairRemovalPermanent.push($("#ipl").is(':checked') ? "Ipl" : 0);
   hairRemovalPermanent.push($("#electrolysis").is(':checked') ? "Electrolysis" : 0);

   // console.log(hairCutting);


   // accepting if checked
   $.each(hairRemovalPermanent, function(i) {

       console.log(hairRemovalPermanent[i]);

       if(hairRemovalPermanent[i] != 0 ) {

         refinedHairRemoval = refinedHairRemoval + hairRemovalPermanent[i] + ", ";
       }
       
   });

   //String
   console.log(refinedHairRemoval);

   //merging serviceName + serviceHeader +serviceSubheader
   let hairRemovalService = {"_ServiceName" : refinedHairRemoval , "_ServiceHeader" : "Hair Removal Permanent" , "_ServiceSubHeader" : "Services"};
   //console.log(headService);


   //Body Wax Permanent----------------------------------------------------------------------------------------------------
   let bodyWax = [];
   let bodyWaxProducts = [];
   let refinedBodyWax = "";
   let refinedBodyWaxProducts = "";

   //Services
   bodyWax.push($("#eye-brows").is(':checked') ? "Eye Brows" : 0);
   bodyWax.push($("#lip").is(':checked') ? "Lip" : 0);
   bodyWax.push($("#chin").is(':checked') ? "Chin" : 0);
   bodyWax.push($("#neck").is(':checked') ? "Neck" : 0);
   bodyWax.push($("#full-arms").is(':checked') ? "Full Arms" : 0);
   bodyWax.push($("#underarms").is(':checked') ? "Underarms" : 0);
   bodyWax.push($("#forearms").is(':checked') ? "Forearms" : 0);
   bodyWax.push($("#upper-legs").is(':checked') ? "Upper Legs" : 0);
   bodyWax.push($("#full-legs").is(':checked') ? "Full Legs" : 0);
   bodyWax.push($("#lower-legs").is(':checked') ? "Lower-legs" : 0);
   bodyWax.push($("#bikini").is(':checked') ? "Bikini" : 0);
   bodyWax.push($("#french-bikini").is(':checked') ? "French Bikini" : 0);
   bodyWax.push($("#brazilian-bikini").is(':checked') ? "Brazilian Bikini" : 0);
   bodyWax.push($("#hollywood").is(':checked') ? "Hollywood" : 0);

   // console.log(hairCutting);


   // accepting if checked
   $.each(bodyWax, function(i) {

       console.log(bodyWax[i]);

       if(bodyWax[i] != 0 ) {

         refinedBodyWax = refinedBodyWax + bodyWax[i] + ", ";
       }
       
   });

   //String
   console.log(refinedBodyWax);

    //merging serviceName + serviceHeader +serviceSubheader
    let bodyWaxService = {"_ServiceName" : refinedBodyWax , "_ServiceHeader" : "Body Waxing" , "_ServiceSubHeader" : "Services"};
    //console.log(bodyWax);

    //Products
   bodyWaxProducts.push($("#gigi-honee").is(':checked') ? "Gigi Honee" : 0);
   bodyWaxProducts.push($("#hive-wax").is(':checked') ? "Hive Wax" : 0);
   bodyWaxProducts.push($("#lotus-essentials").is(':checked') ? "Lotus Essentials" : 0);
   bodyWaxProducts.push($("#berodinsatin").is(':checked') ? "Berodin Satin" : 0);
   bodyWaxProducts.push($("#cirepil").is(':checked') ? "Cirepil" : 0);
   bodyWaxProducts.push($("#Smooth Honey Waz").is(':checked') ? "Smooth Honey Wax" : 0);
   bodyWaxProducts.push($("#shobha-sugar-wax").is(':checked') ? "Shobha Sugar Wax" : 0);

   // accepting if checked
   $.each(bodyWaxProducts, function(i) {

    console.log(bodyWaxProducts[i]);

    if(bodyWaxProducts[i] != 0 ) {

      refinedBodyWaxProducts = refinedBodyWaxProducts + bodyWaxProducts[i] + ", ";
    }
    
});

//String
console.log(refinedBodyWaxProducts);

 //merging serviceName + serviceHeader +serviceSubheader
 let bodyWaxProduct = {"_ServiceName" : refinedBodyWaxProducts , "_ServiceHeader" : "Body Wax" , "_ServiceSubHeader" : "Products"};
 //console.log(bodyWax);

   //Manicure Pedicure Permanent----------------------------------------------------------------------------------------------------
   let maniPedi = [];
   let maniPediProducts = [];
   let refinedmaniPedi = "";
   let refinedmaniPediProducts = "";

   //Services
   maniPedi.push($("#traditional-mani-pedi").is(':checked') ? "Traditional Mani Pedi" : 0);
   maniPedi.push($("#spa-mani-pedi").is(':checked') ? "Spa Mani Pedi" : 0);
   maniPedi.push($("#get-mani-pedi").is(':checked') ? "Get Mani Pedi" : 0);
   maniPedi.push($("#mani-pedi").is(':checked') ? "Mani Pedi" : 0);
   maniPedi.push($("#french-mani-pedi").is(':checked') ? "French Mani Pedi" : 0);
   maniPedi.push($("#acrylic-nail-extension").is(':checked') ? "Acrylic Nail Extension" : 0);
   maniPedi.push($("#get-nail-extension").is(':checked') ? "Get Nail Extension" : 0);
   maniPedi.push($("#nail-designs").is(':checked') ? "Nail Designs" : 0);

   // console.log(hairCutting);

   // accepting if checked
   $.each(maniPedi, function(i) {

       console.log(maniPedi[i]);

       if(maniPedi[i] != 0 ) {

         refinedmaniPedi = refinedmaniPedi + maniPedi[i] + ", ";
       }
       
   });

   //String
   console.log(refinedmaniPedi);

    //merging serviceName + serviceHeader +serviceSubheader
    let maniPediService = {"_ServiceName" : refinedmaniPedi , "_ServiceHeader" : "Manicure Pedicure" , "_ServiceSubHeader" : "Services"};
    //console.log(headService);

    //Products
   maniPediProducts.push($("#nails-inc").is(':checked') ? "Nails Inc" : 0);
   maniPediProducts.push($("#siegel").is(':checked') ? "siegel" : 0);
   maniPediProducts.push($("#opi").is(':checked') ? "Opi" : 0);
   maniPediProducts.push($("#cnd").is(':checked') ? "Cnd" : 0);
   maniPediProducts.push($("#gelish").is(':checked') ? "Gelish" : 0);
   maniPediProducts.push($("#zoya").is(':checked') ? "Zoya" : 0);
   maniPediProducts.push($("#sally-hansen").is(':checked') ? "Sally Hansen" : 0);
   maniPediProducts.push($("#kaeso").is(':checked') ? "Kaeso" : 0);
   maniPediProducts.push($("#ibd-flex").is(':checked') ? "IBD flex polymer powder" : 0);
   maniPediProducts.push($("#ibd-grip-monomer-liquid").is(':checked') ? "IBD grip monomer liquid" : 0);
   maniPediProducts.push($("#nail-harmony").is(':checked') ? "Nail harmony" : 0);
   maniPediProducts.push($("#nsi").is(':checked') ? "NSI" : 0);

   // accepting if checked
   $.each(maniPediProducts, function(i) {

    console.log(maniPediProducts[i]);

    if(maniPediProducts[i] != 0 ) {

      refinedmaniPediProducts = refinedmaniPediProducts + maniPediProducts[i] + ", ";
    }
    
});

//String
console.log(refinedmaniPediProducts);

 //merging serviceName + serviceHeader +serviceSubheader
 let maniPediProduct = {"_ServiceName" : refinedmaniPediProducts , "_ServiceHeader" : "Manicure Pedicure" , "_ServiceSubHeader" : "Products"};
 //console.log(headService);

   //Facials ----------------------------------------------------------------------------------------------------------------------------------
   let facials = [];
   let facialsProducts = [];
   let refinedFacials = "";
   let refinedFacialsProducts = "";

   //Services
   facials.push($("#fire-iced-red").is(':checked') ? "Fire & Iced Red Carpet Facial" : 0);
   facials.push($("#microdermabrasion-with-crystals").is(':checked') ? "Microdermabrasion with Crystals" : 0);
   facials.push($("#biophora-deep-cleansing").is(':checked') ? "Biophora deep cleansing" : 0);
   facials.push($("#microdermabrasion-with-hyaluronic").is(':checked') ? "Microdermabrasion with Hyaluronic" : 0);
   facials.push($("#acid-infusion").is(':checked') ? "Acid Infusion" : 0);
   facials.push($("#oxygen-infused-facial").is(':checked') ? "oxygen Infused Facial" : 0);
   facials.push($("#hydra-facial-md").is(':checked') ? "Hydra Facial Md" : 0);
   facials.push($("#micro-facial").is(':checked') ? "Micro Facial" : 0);
   facials.push($("#standard-facials").is(':checked') ? "Standard Facials" : 0);
   facials.push($("#dermaplaning").is(':checked') ? "Dermaplaning" : 0);

   // console.log(hairCutting);

   // accepting if checked
   $.each(facials, function(i) {

       console.log(facials[i]);

       if(facials[i] != 0 ) {

         refinedFacials = refinedFacials + facials[i] + ", ";
       }
       
   });

   //String
   console.log(refinedFacials);

    //merging serviceName + serviceHeader +serviceSubheader
    let facialsService = {"_ServiceName" : refinedFacials , "_ServiceHeader" : "Facials" , "_ServiceSubHeader" : "Services"};
    //console.log(facialsService);

    //Products
   facialsProducts.push($("#eve-taylor").is(':checked') ? "Eve Taylor" : 0);
   facialsProducts.push($("#environ").is(':checked') ? "Environ" : 0);
   facialsProducts.push($("#sans-souis").is(':checked') ? "Sans Souis" : 0);
   facialsProducts.push($("#elemis").is(':checked') ? "Elemis" : 0);
   facialsProducts.push($("#glo-therapeutics").is(':checked') ? "Glo Therapeutics" : 0);
   facialsProducts.push($("#mario-badescu").is(':checked') ? "Mario Badescu" : 0);
   facialsProducts.push($("#dermalogica").is(':checked') ? "Dermalogica" : 0);
   facialsProducts.push($("#md-formulation").is(':checked') ? "Md Formulation" : 0);

   // accepting if checked
   $.each(facialsProducts, function(i) {

    console.log(facialsProducts[i]);

    if(facialsProducts[i] != 0 ) {

      refinedFacialsProducts = refinedFacialsProducts + facialsProducts[i] + ", ";
    }
    
});

//String
console.log(refinedFacialsProducts);

 //merging serviceName + serviceHeader +serviceSubheader
 let facialsProduct = {"_ServiceName" : refinedFacialsProducts , "_ServiceHeader" : "Facials" , "_ServiceSubHeader" : "Products"};
 //console.log(facialsService);

   //Bodytreatment ----------------------------------------------------------------------------------------------------
   let bodyTreatment = [];
   let refinedBodyTreatment = "";

   //Services
   bodyTreatment.push($("#body-polish").is(':checked') ? "Body Polish" : 0);
   bodyTreatment.push($("#body-scrub").is(':checked') ? "Body Scrub" : 0);
   bodyTreatment.push($("#body-wrap").is(':checked') ? "Body Wrap" : 0);

   // console.log(hairCutting);


   // accepting if checked
   $.each(bodyTreatment, function(i) {

       console.log(bodyTreatment[i]);

       if(bodyTreatment[i] != 0 ) {

         refinedBodyTreatment = refinedBodyTreatment + bodyTreatment[i] + ", ";
       }
       
   });

   //String
   console.log(refinedBodyTreatment);

   //merging serviceName + serviceHeader +serviceSubheader
   let bodyTreatmentService = {"_ServiceName" : refinedBodyTreatment , "_ServiceHeader" : "Body Treatment" , "_ServiceSubHeader" : "Services"};
   //console.log(bodyTreatmentService);


   //Eyebrows ----------------------------------------------------------------------------------------------------
   let eyebrows = [];
   let eyebrowsProducts = [];
   let refinedEyebrows = "";
   let refinedEyebrowsProducts = "";

   //Services
   eyebrows.push($("#eyelash-extensions").is(':checked') ? "Eyelash Extensions" : 0);
   eyebrows.push($("#eyebrow-tint").is(':checked') ? "Eyebrow Tint" : 0);
   eyebrows.push($("#lash-lifting").is(':checked') ? "Lash Lifting" : 0);
   eyebrows.push($("#eyebrow-threading").is(':checked') ? "Eyebrow Threading" : 0);


   // console.log(hairCutting);

   // accepting if checked
   $.each(eyebrows, function(i) {

       console.log(eyebrows[i]);

       if(refinedEyebrows[i] != 0 ) {

         refinedEyebrows = refinedEyebrows + eyebrows[i] + ", ";
       }
       
   });

   //String
   console.log(refinedEyebrows);

   //merging serviceName + serviceHeader +serviceSubheader
   let eyebrowsService = {"_ServiceName" : refinedEyebrows , "_ServiceHeader" : "Eyebrows" , "_ServiceSubHeader" : "Services"};
   //console.log(eyebrowsService);

   //Products
   eyebrowsProducts.push($("#london-lash").is(':checked') ? "London Lash" : 0);
   eyebrowsProducts.push($("#eyelure-lashes").is(':checked') ? "Eyelure Lashes" : 0);
   eyebrowsProducts.push($("#lash-art").is(':checked') ? "Lash Art" : 0);
   eyebrowsProducts.push($("#lash-heaven").is(':checked') ? "Lash Heaven" : 0);       
   eyebrowsProducts.push($("#smart-brow").is(':checked') ? "Smart Brow" : 0);
   eyebrowsProducts.push($("#lrefectiocil").is(':checked') ? "Lrefectiocil" : 0);

   // accepting if checked
   $.each(eyebrowsProducts, function(i) {

    console.log(eyebrowsProducts[i]);

    if(eyebrowsProducts[i] != 0 ) {

      refinedEyebrowsProducts = refinedEyebrowsProducts + eyebrowsProducts[i] + ", ";
    }
    
});

//String
console.log(refinedEyebrowsProducts);

//merging serviceName + serviceHeader +serviceSubheader
let eyebrowsProduct = {"_ServiceName" : refinedEyebrowsProducts , "_ServiceHeader" : "Eyebrows" , "_ServiceSubHeader" : "Products"};
//console.log(eyebrowsService);

//---------------------------------------------------------------------------------------------------------------------------------------------------//

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
//  let numberLetters = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[6789]\d{9}$/;
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
    //  if (!address.match(addressLetters)) {
    //      $('.error-modal').modal('show');
    //      $('.terms-conditions-modal').modal('hide');
    //      $('.error-message').append('Please provide proper address!<br>');
    //      count = 1;

    //  }
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

 //Post code validation
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
      //Ajax call - Images

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
            "_RegistrationMode":"Beauty Owner",
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
            "services": [ messageService, hairRemovalService, bodyWaxService, maniPediService, facialsService, bodyTreatmentService, eyebrowsService,
                messageProduct, bodyWaxProduct, maniPediProduct, facialsProduct, eyebrowsProduct],
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
                $('.error-message').append('Please enter a valid email id.');
                $('.error-modal').modal('show');
                $('.terms-conditions-modal').modal('hide');

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