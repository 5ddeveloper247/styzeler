
let IMAGEID = "imageid";
let GALLERYID = "galleryid";
let PUBLICINSURANCEID = "publicinsuranceid";
let PDFID = "pdfid";

// let STID = 'loginstid';
// let REGISTRATIONMODE = 'loginmode';

//redirect to his profile
// function redirect() {
//     window.location.href = "./profile.html?e=success";
// }

function redirect() {
    window.location.href = "./login.html";
}

function redirectToPage() {
    // location.reload();
    window.location.href = "./wedding-stylist-buildup.html";


}

function sendEmail() {

    let ownerMessage = "A new Candiate registered as Wedding Stylist on Styzeler Website. Please go through the details on Adminpanel.";
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
    document.getElementById("loader").style.display="block";
    var file = input.files[0];
    var reader = new FileReader();
    reader.onloadend = function (e) {
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
            success: function (response) {
                
                document.getElementById("content").style.display="block";
                document.getElementById("loader").style.display="none";

                console.log(response);

                localStorage.setItem(IMAGEID, response["_ImageId"]);

            }

        });


    }
    reader.readAsDataURL(file);

}

//For gallery
let gallery = document.getElementById('image-gallery');

var urlArr = [];
// detect whether the browser supports FileReader  
if (typeof (FileReader) === 'undefined') {
    result.innerHTML = "Sorry, your browser does not support FileReader, please use modern browsers operation!";
    // gallery.setAttribute('disabled', 'disabled');
} else {
    gallery.addEventListener("change", handleFiles, false);
}

var galleryArr = [];

function handleFiles() {
    const fileList = this.files;

    //Whole process will be in loop, render will be called everytime whenever it gets a file
    
   
    for (let i = 0; i < fileList.length; i++) {
        
        var reader = new FileReader();
        reader.readAsDataURL(fileList[i]);
        reader.onloadend = function (e) {
            let base64Gallery = this.result.split(';base64').join(',').split('data:image/').join(',').split(',');
            // console.log( base64Gallery[1] + base64Gallery[3]);
            // console.log('RESULT', this.result);
            document.getElementById("loader").style.display="block";
            $.ajax({
                type: 'post',
                url: webUrl + 'uploadimage',
                data: {
                    "_ImageContent": base64Gallery[3],
                    "_ImageType": base64Gallery[1]
                },
                success: function (response) {
                    
                                    
                document.getElementById("content").style.display="block";
                document.getElementById("loader").style.display="none";

                    console.log(response);
                    galleryArr.push(response["_ImageId"]);
                    // console.log(galleryArr);

                    localStorage.setItem(GALLERYID, galleryArr);

                }

            });

        }

    }

}



//Public Liability Insurance
function readPublicInsurance(input) {

    var file = input.files[0];
    var reader = new FileReader();
    reader.onloadend = function (e) {
        // $('#blah').attr('src', e.target.result);
        // console.log(e.target.result);
        let base64 = reader.result.split(';base64').join(',').split('data:image/').join(',').split(',');
        // console.log( base64);
        document.getElementById("loader").style.display="block";
        $.ajax({
            type: 'post',
            url: webUrl + 'uploadimage',
            data: {
                "_ImageContent": base64[3],
                "_ImageType": base64[1]
            },
            success: function (response) {
                document.getElementById("content").style.display="block";
                document.getElementById("loader").style.display="none";

                console.log(response);

                localStorage.setItem(PUBLICINSURANCEID, response["_ImageId"]);

            }

        });


    }
    reader.readAsDataURL(file);

}


//Candidate CV
function readCV(input) {

    var file = input.files[0];
    var reader = new FileReader();
    reader.onloadend = function (e) {
        
        
        document.getElementById("loader").style.display="block";
        // $('#blah').attr('src', e.target.result);
        // console.log(e.target.result);
        let base64 = reader.result.split(';base64').join(',').split('data:application/').join(',').split(',');
        // console.log( base64);

        $.ajax({
            type: 'post',
            url: webUrl + 'uploadpdf',
            data: {
                "_PdfContent": base64[3]
               
            },
            success: function (response) {
                document.getElementById("content").style.display="block";
                document.getElementById("loader").style.display="none";

                console.log(response);

                localStorage.setItem(PDFID, response["_PdfId"]);

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


$(function () {

    $('#register-form').submit(function (e) {

        e.preventDefault();

        // Personal Information - 1st part
        let picture = localStorage.getItem(IMAGEID);

        //Picture validation
        // if(picture === '' ) {
        //     $('.error-modal').modal('show');
        //     $('.terms-conditions-modal').modal('hide');
        //     $('.error-message').append('<p>Please add your picture.</p>');        

        // }

        let firstName = $("#stylist-name").val();

        //First Name Validation
        // if(firstName === '' ) {
        //     $('.error-modal').modal('show');
        //     $('.terms-conditions-modal').modal('hide');
        //     $('.error-message').append('<p>Please enter your name.</p>');        

        // }
        let lastName = $("#stylist-surname").val();

        //Last Name Validation
        // if(lastName === '' ) {
        //     $('.error-modal').modal('show');
        //     $('.terms-conditions-modal').modal('hide');
        //     $('.error-message').append('<p>Please enter your last name.</p>');        

        // }

        let resume = $("#stylist-resume").val();

        //Resume Validation
        // if(resume === '' ) {
        //     $('.error-modal').modal('show');
        //     $('.terms-conditions-modal').modal('hide');
        //     $('.error-message').append('<p>Please enter your resume.</p>');        

        // }
        
        let cv = localStorage.getItem(PDFID);
        // console.log(cv);

        let email = $("#stylist-email").val();

        //Email Validation
        // if(email === '' ) {
        //     $('.error-modal').modal('show');
        //     $('.terms-conditions-modal').modal('hide');
        //     $('.error-message').append('<p>Please enter your email id.</p>');        

        // }

        let mobile = $("#stylist-mobile").val();

        //Mobile Validation
        // if(mobile === '' ) {
        //     $('.error-modal').modal('show');
        //     $('.terms-conditions-modal').modal('hide');
        //     $('.error-message').append('<p>Please enter your mobile number.</p>');        

        // }

        let password = $("#stylist-password").val();

        //Password Validation
        // if(password === '' ) {
        //     $('.error-modal').modal('show');
        //     $('.terms-conditions-modal').modal('hide');
        //     $('.error-message').append('<p>Please enter your password.</p>');        

        // }

        // Personal Information - 2nd part
        let age = $('input[name="stylist_age"]:checked').val();

        //Age Validation
        // if(age === '' ) {
        //     $('.error-modal').modal('show');
        //     $('.terms-conditions-modal').modal('hide');
        //     $('.error-message').append('<p>Please select your age.</p>');        

        // }

        let nvqLevel2 = $("#nvq-level2").is(':checked') ? 1 : 0;
        let nvqLevel3 = $("#nvq-level3").is(':checked') ? 1 : 0;
        let nvqAssesor = $("#nvq-assesor").is(':checked') ? 1 : 0;

        // london Zones
        let zones = [];
        let selectedZones = "";

        zones.push($("#work-1-2").is(':checked') ? "1/2" : 0);
        zones.push($("#work-2-3").is(':checked') ? "2/3" : 0);
        zones.push($("#work-3-4").is(':checked') ? "3/4" : 0);
        zones.push($("#work-1-4").is(':checked') ? "1/4" : 0);
        zones.push($("#work-open").is(':checked') ? "Open To Travel" : 0);

        // accepting if checked
        $.each(zones, function (i) {

            if (zones[i] != 0) {

                selectedZones = selectedZones + zones[i] + ", ";
            }

        });

        console.log(selectedZones);

        //Video
        let video = ""; //$("#video").val();
        console.log(video);
        // UTR
        let utr = $("#utr-number").val();

        //UTR Validation
        // if(utr === '' ) {
        //     $('.error-modal').modal('show');
        //     $('.terms-conditions-modal').modal('hide');
        //     $('.error-message').append('<p>Please enter your utr number.</p>');        

        // }

        // //Public liability insurance
        let publicInsuranceId = localStorage.getItem(PUBLICINSURANCEID);

        //Public Insurance Validation
        // if(publicInsuranceId === '' ) {
        //     $('.error-modal').modal('show');
        //     $('.terms-conditions-modal').modal('hide');
        //     $('.error-message').append('<p>Please enter your public insurance id.</p>');        

        // }

        //let stylistRate = $('input[name="stylist_rate"]:checked').val();

        //Stylist Rate Validation
        // if(stylistRate === '' ) {
        //     $('.error-modal').modal('show');
        //     $('.terms-conditions-modal').modal('hide');
        //     $('.error-message').append('<p>Please select your stylist rate.</p>');        

        // }

        let languages = $("#stylist-language").val();

        //Languages Validation
        // if(languages === '' ) {
        //     $('.error-modal').modal('show');
        //     $('.terms-conditions-modal').modal('hide');
        //     $('.error-message').append('<p>Please enter your languages.</p>');        

        // }


        // alert(picture);

        //Hair Cutting // idiot just make an array out of it----------------------------------------------------------------------------------------------------
        let hairCutting = [];
        let refinedHairCutting = "";

        hairCutting.push($("#stylist-customer-ladies").is(':checked') ? "Ladies" : 0);
        hairCutting.push($("#stylist-customer-gents").is(':checked') ? "Gents" : 0);
        hairCutting.push($("#stylist-customer-kids").is(':checked') ? "Kids" : 0);
        hairCutting.push($("#stylist-customer-afro").is(':checked') ? "Afro Caribbean" : 0);
        console.log(hairCutting);

        // accepting if checked
        $.each(hairCutting, function (i) {

            if (hairCutting[i] != 0) {

                refinedHairCutting = refinedHairCutting + hairCutting[i] + ", ";
            }

        });

        console.log(refinedHairCutting);

        //merging serviceName + serviceHeader +serviceSubheader
        let headService = { "_ServiceName": refinedHairCutting, "_ServiceHeader": "Hair Cutting", "_ServiceSubHeader": "Services" };
        //console.log(headService);

        //Wedding Styles-----------------------------------------------------------------------------------------------------------------------------------
        let weddingStyles = [];
        let refinedWeddingStyles = "";

        weddingStyles.push($("#classic-low-chignon").is(':checked') ? "Classic Low Chignon" : 0);
        weddingStyles.push($("#french-chignon").is(':checked') ? "French Chignon" : 0);
        weddingStyles.push($("#updo-flowers").is(':checked') ? "Updo With Flowers" : 0);
        weddingStyles.push($("#smooth-curls").is(':checked') ? "Long, Smooth Curls" : 0);
        weddingStyles.push($("#pinned-curls").is(':checked') ? "Pinned Curls" : 0);
        weddingStyles.push($("#long-ponytail").is(':checked') ? "Glam Long Ponytail" : 0);
        weddingStyles.push($("#braided-barrette").is(':checked') ? "Braided Barrette" : 0);
        weddingStyles.push($("#hidden-hair-piece").is(':checked') ? "Hidden Hair Piece" : 0);
        weddingStyles.push($("#fishtail-braid").is(':checked') ? "Fishtail Braid" : 0);
        weddingStyles.push($("#finger-weaves").is(':checked') ? "Classic Finger Weaves" : 0);
        weddingStyles.push($("#makeup").is(':checked') ? "Makeup" : 0);
        console.log(weddingStyles);

        // accepting if checked
        $.each(weddingStyles, function (i) {

            if (weddingStyles[i] != 0) {

                refinedWeddingStyles = refinedWeddingStyles + weddingStyles[i] + ", ";
            }

        });

        console.log(refinedWeddingStyles);

        //merging serviceName + serviceHeader +serviceSubheader
        let weddingStylesService = { "_ServiceName": refinedWeddingStyles, "_ServiceHeader": "Wedding Styles", "_ServiceSubHeader": "Services" };

        //Barber Male Grooming------------------------------------------------------------------------------------------------------------------------------------
        let barberMaleGrooming = [];
        let barberMaleGroomingProducts = [];
        let refinedBarberMaleGrooming = "";
        let refinedbarberMaleGroomingProducts = "";

        //for Barber Male Grooming Services
        barberMaleGrooming.push($("#scissors-cut").is(':checked') ? "Scissors Cut" : 0);
        barberMaleGrooming.push($("#clipper-cut").is(':checked') ? "Clipper Cut" : 0);
        barberMaleGrooming.push($("#beard-shaped").is(':checked') ? "Beard Shaped" : 0);
        barberMaleGrooming.push($("#skin-fade").is(':checked') ? "Skin Fade" : 0);
        barberMaleGrooming.push($("#wet-shave").is(':checked') ? "Wet Shave" : 0);
        barberMaleGrooming.push($("#hot-towel").is(':checked') ? "Hot Towel" : 0);
        barberMaleGrooming.push($("#chemical-relaxer").is(':checked') ? "Chemical Relaxer" : 0);
        barberMaleGrooming.push($("#gray-blending").is(':checked') ? "Gray Blending" : 0);
        console.log(barberMaleGrooming);

        // accepting if checked
        $.each(barberMaleGrooming, function (i) {

            if (barberMaleGrooming[i] != 0) {

                refinedBarberMaleGrooming = refinedBarberMaleGrooming + barberMaleGrooming[i] + ", ";
            }

        });

        console.log(refinedBarberMaleGrooming);

        //merging serviceName + serviceHeader +serviceSubheader
        let barberMaleGroomingService = { "_ServiceName": refinedBarberMaleGrooming, "_ServiceHeader": "Barber Male Grooming", "_ServiceSubHeader": "Services" };

        //for Barber Male Grooming Products
        barberMaleGroomingProducts.push($("#kerastase").is(':checked') ? "Kerastase" : 0);
        barberMaleGroomingProducts.push($("#loreal-tecni-art").is(':checked') ? "L'oreal Tecni Art" : 0);
        barberMaleGroomingProducts.push($("#schwarzkopf-bc-bonacure").is(':checked') ? "Schwarzkopf Bc Bonacure" : 0);
        barberMaleGroomingProducts.push($("#keracare").is(':checked') ? "KeraCare" : 0);
        barberMaleGroomingProducts.push($("#baxter").is(':checked') ? "Baxter" : 0);
        barberMaleGroomingProducts.push($("#american-crew").is(':checked') ? "American Crew" : 0);
        barberMaleGroomingProducts.push($("#hanz-de-fuko-hybridized").is(':checked') ? "Hanz De Fuko Hybridized" : 0);
        barberMaleGroomingProducts.push($("#redken").is(':checked') ? "Redken" : 0);
        barberMaleGroomingProducts.push($("#fudge").is(':checked') ? "Fudge" : 0);
        barberMaleGroomingProducts.push($("#moroccan-oil").is(':checked') ? "Moroccan Oil" : 0);
        barberMaleGroomingProducts.push($("#kevin-murphy").is(':checked') ? "Kevin Murphy" : 0);
        barberMaleGroomingProducts.push($("#proraso").is(':checked') ? "Proraso" : 0);
        barberMaleGroomingProducts.push($("#jack-dean").is(':checked') ? "Jack Dean" : 0);
        barberMaleGroomingProducts.push($("#vines-vintage").is(':checked') ? "Vines Vintage" : 0);
        barberMaleGroomingProducts.push($("#baxter-of-california-shave-tonic").is(':checked') ? "Baxter Of California Shave Tonic" : 0);
        barberMaleGroomingProducts.push($("#anita-grant").is(':checked') ? "Anita Grant" : 0);
        barberMaleGroomingProducts.push($("#wella-eimi").is(':checked') ? "Wella EIMI" : 0);
        barberMaleGroomingProducts.push($("#shu-uemura").is(':checked') ? "Shu Uemura" : 0);
        barberMaleGroomingProducts.push($("#aveda").is(':checked') ? "Aveda" : 0);

        // accepting if checked
        $.each(barberMaleGroomingProducts, function (i) {

            if (barberMaleGroomingProducts[i] != 0) {

                refinedbarberMaleGroomingProducts = refinedbarberMaleGroomingProducts + barberMaleGroomingProducts[i] + ", ";
            }

        });

        console.log(refinedbarberMaleGroomingProducts);

        //merging productName + serviceHeader +serviceSubheader
        let barberMaleGroomingProduct = { "_ServiceName": refinedbarberMaleGroomingProducts, "_ServiceHeader": "Barber Male Grooming", "_ServiceSubHeader": "Styling Products" };


        //Hair Color-------------------------------------------------------------------------------------------------------------------------------------------------
        let hairColor = [];
        let hairColorBrands = [];
        let refinedHairColor = "";
        let refinedHairColorBrands = "";

        hairColor.push($("#fashion-color").is(':checked') ? "Fashion Color" : 0);
        hairColor.push($("#highlights").is(':checked') ? "Highlights" : 0);
        hairColor.push($("#balayage").is(':checked') ? "Balayage" : 0);
        hairColor.push($("#colour-correction").is(':checked') ? "Colour Correction" : 0);
        hairColor.push($("#full-head-bleach").is(':checked') ? "Full Head Bleach" : 0);
        console.log(hairColor);

        // accepting if checked
        $.each(hairColor, function (i) {

            if (hairColor[i] != 0) {

                refinedHairColor = refinedHairColor + hairColor[i] + ", ";
            }

        });

        console.log(refinedHairColor);

        //merging serviceName + serviceHeader +serviceSubheader
        let hairColorService = { "_ServiceName": refinedHairColor, "_ServiceHeader": "Hair Color", "_ServiceSubHeader": "Services" };

        //For hair color brands
        hairColorBrands.push($("#loreal").is(':checked') ? "L’Oréal" : 0);
        hairColorBrands.push($("#wella").is(':checked') ? "Wella" : 0);
        hairColorBrands.push($("#schwarzkopf").is(':checked') ? "Schwarzkopf" : 0);
        hairColorBrands.push($("#redkenn").is(':checked') ? "Redken" : 0);//
        hairColorBrands.push($("#matrix").is(':checked') ? "Matrix" : 0);
        hairColorBrands.push($("#goldwell").is(':checked') ? "Goldwell" : 0);
        hairColorBrands.push($("#avedaa").is(':checked') ? "Aveda" : 0);//

        // accepting if checked
        $.each(hairColorBrands, function (i) {

            if (hairColorBrands[i] != 0) {

                refinedHairColorBrands = refinedHairColorBrands + hairColorBrands[i] + ", ";
            }

        });

        console.log(refinedHairColorBrands);

        //merging serviceName + serviceHeader +serviceSubheader
        let hairColorBrand = { "_ServiceName": refinedHairColorBrands, "_ServiceHeader": "Hair Color", "_ServiceSubHeader": "Brands" };

        //Chemical Treatments---------------------------------------------------------------------------------------------------------------------------------------------
        let chemicalTreatments = [];
        let chemicalTreatmentsProducts = [];
        let refinedChemicalTreatments = "";
        let refinedChemicalTreatmentsProducts = "";

        chemicalTreatments.push($("#perm").is(':checked') ? "Perm" : 0);
        chemicalTreatments.push($("#brazilian-blow-dry").is(':checked') ? "Brazilian Blow-Dry" : 0);
        chemicalTreatments.push($("#keratin-treatment").is(':checked') ? "Keratin Treatment" : 0);
        chemicalTreatments.push($("#chemical-relaxer").is(':checked') ? "Chemical Relaxer" : 0);
        console.log(chemicalTreatments);

        // accepting if checked
        $.each(chemicalTreatments, function (i) {

            if (chemicalTreatments[i] != 0) {

                refinedChemicalTreatments = refinedChemicalTreatments + chemicalTreatments[i] + ", ";
            }

        });

        console.log(refinedChemicalTreatments);

        //merging serviceName + serviceHeader +serviceSubheader
        let chemicalTreatmentsService = { "_ServiceName": refinedChemicalTreatments, "_ServiceHeader": "Chemical Treatments", "_ServiceSubHeader": "Services" };

        chemicalTreatmentsProducts.push($("#kerastraight").is(':checked') ? "Kerastraight" : 0);
        chemicalTreatmentsProducts.push($("#global-keratin").is(':checked') ? "Global Keratin" : 0);
        chemicalTreatmentsProducts.push($("#cocochoco-brazilian-keratin").is(':checked') ? "Cocochoco Brazilian Keratin" : 0);
        chemicalTreatmentsProducts.push($("#goldwell-kerasilk").is(':checked') ? "Goldwell KeraSilk" : 0);
        chemicalTreatmentsProducts.push($("#schwarzkopf-professional").is(':checked') ? "Schwarzkopf Professional" : 0);
        chemicalTreatmentsProducts.push($("#wella-professionals").is(':checked') ? "Wella Professionals" : 0);
        chemicalTreatmentsProducts.push($("#sibel").is(':checked') ? "Sibel" : 0);
        chemicalTreatmentsProducts.push($("#loreal-professionnel").is(':checked') ? "L'Oréal Professionnel" : 0);

        // accepting if checked
        $.each(chemicalTreatmentsProducts, function (i) {

            if (chemicalTreatmentsProducts[i] != 0) {

                refinedChemicalTreatmentsProducts = refinedChemicalTreatmentsProducts + chemicalTreatmentsProducts[i] + ", ";
            }

        });

        console.log(refinedChemicalTreatmentsProducts);

        //merging productsName + serviceHeader +serviceSubheader
        let chemicalTreatmentsProduct = { "_ServiceName": refinedChemicalTreatmentsProducts, "_ServiceHeader": "Chemical Treatments", "_ServiceSubHeader": "Products" };

        //-----------------------------------------------------------------------------------------------------------------------------------------------------------


        // if (picture != '' && firstName != '' && lastName != '' && resume != '' && email != '' && mobile != '' && password != '' && age != '' && utr != '' && publicInsuranceId != '' && stylistRate != '' && languages != '')
        // {
        //Ajax call - Register
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
        // let numberLetters = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[6789]\d{9}$/;
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

        //Resume validation
        let resumeLetters = /^[A-Za-z0-9 ':-_+.,A-Za-z0-9 '-_:+.,]+$/;

        if (resume != "") {

            if (resume.length < 20) {
                if (!resume.match(resumeLetters)) {
                    $('.error-modal').modal('show');
                    $('.terms-conditions-modal').modal('hide');
                    $('.error-message').append('Please tell us a bit more in Resume! min - 20 letters<br>');
                    count = 1;

                }
            }
        } else {
            $('.error-modal').modal('show');
            $('.terms-conditions-modal').modal('hide');
            $('.error-message').append('Tell us a bit about you and your brief working history in RESUME!<br>');
            count = 1;
        }

        //language validation
        let languageLetters = /^[A-Za-z .,]+$/;

        if (languages != "") {
            if (!languages.match(languageLetters)) {
                $('.error-modal').modal('show');
                $('.terms-conditions-modal').modal('hide');
                $('.error-message').append('Languages must contain only letters!<br>');
                count = 1;

            }
        } else {
            $('.error-modal').modal('show');
            $('.terms-conditions-modal').modal('hide');
            $('.error-message').append('Languages is required!<br>');
            count = 1;
        }

        //Picture validation
        if (picture == null) {
            $('.error-modal').modal('show');
            $('.terms-conditions-modal').modal('hide');
            $('.error-message').append('Profile picture is required!<br>');
            count = 1;
        }

        //Cv validation
        if (cv == null) {
            $('.error-modal').modal('show');
            $('.terms-conditions-modal').modal('hide');
            $('.error-message').append('Please upload your CV!<br>');
            count = 1;
        }

        //Qualification validation
        if (nvqLevel2 == false && nvqLevel3 == false && nvqAssesor == false) {
            $('.error-modal').modal('show');
            $('.terms-conditions-modal').modal('hide');
            $('.error-message').append('Qualification is required!<br>');
            count = 1;
        }

        // Work Validation
        if (selectedZones == "") {
            $('.error-modal').modal('show');
            $('.terms-conditions-modal').modal('hide');
            $('.error-message').append('Zone of London open to work is required!<br>');
            count = 1;
        }

        //Age validation
        if (typeof (age) === "undefined") {
            $('.error-modal').modal('show');
            $('.terms-conditions-modal').modal('hide');
            $('.error-message').append('Please select your age group!<br>');
            count = 1;
        }

        //UTR validation
        if (utr == "") {
            $('.error-modal').modal('show');
            $('.terms-conditions-modal').modal('hide');
            $('.error-message').append('Please enter your utr number!<br>');
            count = 1;
        }
        //Rate validation
        // if (typeof (stylistRate) === "undefined") {
        //     $('.error-modal').modal('show');
        //     $('.terms-conditions-modal').modal('hide');
        //     $('.error-message').append('Please select your rate!<br>');
        //     count = 1;
        // }

        console.log(count);


        //*****************************************************Form Validation End*****************************************************************************/

        if (count === 0) {

            $.ajax({
                type: 'post',
                url: webUrl + 'register',
                data: {
                    "_EmailId": email,
                    "_Password": password,
                    "_MobileNumber": mobile,
                    "_FirstName": firstName,
                    "_LastName": lastName,
                    "_Age": age,
                    "_ProfileImageId": picture,
                    "_RegistrationMode": "Wedding Stylist",
                    "_Resume": resume,
                    "_CvId": cv,
                    "_Work": selectedZones,
                    "_NVQ_2": nvqLevel2,
                    "_NVQ_3": nvqLevel3,
                    "_NVQ_ASSESOR": nvqAssesor,
                    "_TradeTestVideoUrl": video,
                    "_UTR": utr,
                    "_PublicLiabilityImageId": publicInsuranceId,
                    "_Rate": "£ To be quoted",
                    "_Languages": languages,
                    "_Address": null,
                    "_PostCode": null,
                    "images": localStorage.getItem(GALLERYID),
                    "services": [headService, weddingStylesService, barberMaleGroomingService, hairColorService, chemicalTreatmentsService,
                        barberMaleGroomingProduct, hairColorBrand, chemicalTreatmentsProduct],
                    "_IsAcceptTerms": "1"
                },

                success: function (response) {

                    console.log(response);

                


                    if (response["_ReturnMessage"] === "Success") {

                        localStorage.removeItem(IMAGEID);
                        localStorage.removeItem(PUBLICINSURANCEID);
                        localStorage.removeItem(GALLERYID);
                        localStorage.removeItem(PDFID);
                        
                        $('.terms-conditions-modal').modal('hide');

                        sendEmail();

                    }

                    //Image profile id validation
                    if (response["_ReturnMessage"] === "Please enter your profile image id") {
                        $('.error-modal').modal('show');
                        $('.terms-conditions-modal').modal('hide');
                        $('.error-message').append('Please enter your profile image id.');

                    }

                    //Email Validation
                    if (response["_ReturnMessage"] === "Please enter a valid email id") {
                        $('.error-modal').modal('show');
                        $('.terms-conditions-modal').modal('hide');
                        $('.error-message').append('Please enter a valid email id.');

                    }

                    //Email Already exist
                    if (response["_ReturnMessage"] === "Email id already present.") {
                        $('.error-modal').modal('show');
                        $('.terms-conditions-modal').modal('hide');
                        $('.error-message').append('User already exist!');

                    }

                    //Password Validation
                    if (response["_ReturnMessage"] === "Please enter your password") {
                        $('.error-modal').modal('show');
                        $('.terms-conditions-modal').modal('hide');
                        $('.error-message').append('Please enter your password.');

                    }

                    //Mobile Validation
                    if (response["_ReturnMessage"] === "Please enter your mobile number") {
                        $('.error-modal').modal('show');
                        $('.terms-conditions-modal').modal('hide');
                        $('.error-message').append('Please enter your mobile number.');

                    }

                    //First Name Validation
                    if (response["_ReturnMessage"] === "Please enter your first name") {
                        $('.error-modal').modal('show');
                        $('.terms-conditions-modal').modal('hide');
                        $('.error-message').append('Please enter your first name.');

                    }

                    //Last Name Validation
                    if (response["_ReturnMessage"] === "Please enter your last name") {
                        $('.error-modal').modal('show');
                        $('.terms-conditions-modal').modal('hide');
                        $('.error-message').append('Please enter your last name.');

                    }

                    //Age validation
                    if (response["_ReturnMessage"] === "Please enter your age") {
                        $('.error-modal').modal('show');
                        $('.terms-conditions-modal').modal('hide');
                        $('.error-message').append('Please enter your age.');

                    }


                    //Resume validation
                    if (response["_ReturnMessage"] === "Please enter your resume") {
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
                    if (response["_ReturnMessage"] === "Please enter your utr") {
                        $('.error-modal').modal('show');
                        $('.terms-conditions-modal').modal('hide');
                        $('.error-message').append('Please enter your utr number.');

                    }

                    //Language Validation
                    if (response["_ReturnMessage"] === "Please enter languages") {
                        $('.error-modal').modal('show');
                        $('.terms-conditions-modal').modal('hide');
                        $('.error-message').append('Please enter languages.');

                    }


                    // it was commented before
                    // $.ajax({
                    //     type: 'post',
                    //     url: webUrl + 'login',
                    //     data: {
                    //       "_EmailId": email,
                    //       "_Password": password
                    //    },
                    //     success: function(response) {
                    //       console.log(response);

                    //       localStorage.setItem(STID, response["_StId"]);
                    //       localStorage.setItem(REGISTRATIONMODE, response["registrationModes"][0]["_ModeName"]);

                    //       $('.modal').modal('show');

                    //       // window.location.href = "./freelancer-profile.html?e=success";


                    //     }

                    // });

                    //Modal
                    //Redirect


                }

            });
            //End of Ajax call
            //}

        }// if condition ends

    });


});