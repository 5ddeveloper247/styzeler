const webUrl = "https://api.styzeler.co.uk/styzeler-api/index.php/app/";


let FREELANCERID = "stid";
let FREELANCERREGISTRATIONMODE = "freelancermode";
let PDFID = "pdfid";

let stId = localStorage.getItem(FREELANCERID);
let registrationMode = localStorage.getItem(FREELANCERREGISTRATIONMODE);
//localStorage.clear();
console.log(stId);
if(localStorage.getItem('ISADMACTIVE') != "Yes") {
    window.location.href = "../index.html";
}

$(function() {

 //Get freelancers
  $.ajax({
    type: 'post',
    url: webUrl + 'getfreelancers',
    data: {
        "_RegistrationMode": registrationMode
    },
    success: function(response) {
        console.log(response);

        $.each ( response.freelancers, function(i) {

            if(response.freelancers[i]["_StId"] === stId) {

                localStorage.setItem(PDFID, response.freelancers[i]["_CvId"]);
                $("#reg_mode").text(response.freelancers[i]["_RegistrationMode"]);
                $("#reg_mode_heading").text(response.freelancers[i]["_RegistrationMode"]);
                $("#reg_sub_heading").text(response.freelancers[i]["_RegistrationMode"]);

                if(response.freelancers[i]["_RegistrationMode"] === "Hairdressing Owner" || response.freelancers[i]["_RegistrationMode"] === "Beauty Owner") {
                    $(".age").hide();
                    $(".qualification").hide();
                    $(".languages").hide();
                    $(".resume").hide();
                    $(".cv").hide();
                    $(".rate").hide();
                    $(".work").hide();
                    $(".gallery").hide();
                    $(".video").hide();
                    $(".utr").hide();
                }
                else {
                    $(".address").hide();
                    $(".postcode").hide();
                }

                $("#ownerName").text(response.freelancers[i]["_FirstName"]+" "+response.freelancers[i]["_LastName"]);
                $("#ownerAge").text(response.freelancers[i]["_Age"]+" years");
                $("#ownerAddress").text(response.freelancers[i]["_Address"]);
                $("#ownerPostcode").text(response.freelancers[i]["_PostCode"]);
                $("#ownerRate").text("$"+response.freelancers[i]["_Rate"]);
                $("#ownerWork").text(response.freelancers[i]["_Work"]); 
                $("#ownerResume").text(response.freelancers[i]["_Resume"]);
                $("#ownerUtr").text(response.freelancers[i]["_UTR"]);
                $("#ownerVideo").append('<a href="'+response.freelancers[i]["_TradeTestVideoUrl"]+'" target="_blank">Open Video</a>');
                $("#ownerLanguage").text(response.freelancers[i]["_Languages"]); 
                $("#ownerEmail").text(response.freelancers[i]["_EmailId"]); 
                $("#ownerMobile").text(response.freelancers[i]["_MobileNumber"]); 
                
                let qualification;
                if(response.freelancers[i]["_NVQ_2"] != 0) { 
                    qualification = "NVQ2";
                 }
                 else if(response.freelancers[i]["_NVQ_3"] != 0) { 
                    qualification = "NVQ3";
                 }
                 else  { 
                    qualification = "Trainee";
                 }
                 $("#ownerQualification").text(qualification);
                
                 //for profile image
                 $.ajax({
                    type: 'post',
                    url:  webUrl + 'getimage',
                    data: ({
                        "_ImageId": response.freelancers[i]["_ProfileImageId"]
                        // "_ImageId": "39"
                    }),
                    success: function (newResponse) {
                        // console.log(newResponse["_ImageContent"]);

                        if(newResponse["_ImageContent"] !== "") {
                            $("#profile-image-id").attr("src", "data:image;base64," + newResponse["_ImageContent"]); 
                        }
    
                    }
                 });

                 //for services
                 $.each(response.freelancers[i].services, function(service){

                    
                    if(response.freelancers[i].services[service]["service_name"] != "") {
                        
                       if(response.freelancers[i].services[service]["service_header"] === "Services") {
                            
                            $("#ownerService").append('<br><div class="text-left"><p>'+
                            response.freelancers[i].services[service]["service_sub_header"]+ '</p>'+
                            '<div>' +
                            '<p><strong>'+response.freelancers[i].services[service]["service_header"]+
                            ':  </strong>' + response.freelancers[i].services[service]["service_name"].substring(0, response.freelancers[i].services[service]["service_name"].length-2 ) + '.'  + '</p>' +
                            '</div></div>');
                        }
                        
                        else {
                            
                            $("#ownerProduct").append('<br><div class="text-left"><p>'+
                            response.freelancers[i].services[service]["service_sub_header"]+ '</p>'+
                            '<div>' +
                            '<p><strong>'+response.freelancers[i].services[service]["service_header"]+
                            ':  </strong>' + response.freelancers[i].services[service]["service_name"] .substring(0, response.freelancers[i].services[service]["service_name"].length-2 ) + '.'  + '</p>' +
                            '</div></div>');
                            
                        }
                    }
                    
                });

                // for gallery content images
                $.each (response.freelancers[i].images, function(j){

                    $("#gallery-content").append('<div class="col-lg-4 p-4">' +
                    '<img id="gallery-image-id-' + j + '" alt="" width="100%" height="100%">' + '</div>');

                    //for gallery image content
                    //console.log(response.freelancers[i].images[j]["gallery_image_id"]);

                    $.ajax({
                        type: 'post',
                        url:  webUrl + 'getimage',
                        data: ({
                            //"_ImageId": "61"
                            "_ImageId": response.freelancers[i].images[j]["gallery_image_id"]
                        }),
                        success: function (galleryResponse) {

                            //console.log(galleryResponse["_ImageContent"]);

                            $("#gallery-image-id-" + j).attr("src", "data:image;base64," + galleryResponse["_ImageContent"]);

                        }
                }); 

            });
                
            }
            

        });
    }
});

});