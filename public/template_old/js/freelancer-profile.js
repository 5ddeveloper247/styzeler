let FREELANCERID = "stid";
let FREELANCERREGISTRATIONMODE = "freelancermode";
let FREELANCEREMAIL = "freelanceremail";


let stId = localStorage.getItem(FREELANCERID);
let registrationMode = localStorage.getItem(FREELANCERREGISTRATIONMODE);

let userStId = localStorage.getItem(STID);
let userMode = localStorage.getItem(REGISTRATIONMODE);



// $('.on-Hold').prop('disabled', true);
// $('.enableOnInput').prop('disabled', false);

//localStorage.clear();

$(function() {
	//** Check if logged IN
	var loggedStatus = localStorage.getItem(STID);
	if (typeof loggedStatus !== 'undefined' && loggedStatus !== null){
		//console.log("IFF");
	}else{
		//console.log("ELSE");
		$("div[class*=email]").remove();
	}
	
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
                
                localStorage.setItem(FREELANCEREMAIL, response.freelancers[i]["_EmailId"]);

                $("#ownerName").text(response.freelancers[i]["_FirstName"]+" "+response.freelancers[i]["_LastName"]);
                $("#ownerAge").text(response.freelancers[i]["_Age"]+" years");
                if(response.freelancers[i]["_RegistrationMode"] == "Wedding Stylist") {
                    $("#ownerRate").text("£ To Be Quoted");
                } else {
                    $("#ownerRate").text("£"+response.freelancers[i]["_Rate"]);
                }
                $("#ownerResume").text(response.freelancers[i]["_Resume"]);
                $("#ownerLanguage").text(response.freelancers[i]["_Languages"]); 
                $("#ownerWork").text(response.freelancers[i]["_Work"]); 
                $("#ownerEmail").text(response.freelancers[i]["_EmailId"]); 
                $("#profiletype").text(response.freelancers[i]["_Ptype"]); 
                
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
                        //console.log(newResponse["_ImageContent"]);
                        $("#profile-image-id").attr("src", "data:iamge;base64," + newResponse["_ImageContent"]); 
    
                    }
                 }),

                //for services
                $.each(response.freelancers[i].services, function(service){

                    
                    if(response.freelancers[i].services[service]["service_name"] != "") {
                        
                       if(response.freelancers[i].services[service]["service_header"] === "Services") {
                            
                            $("#ownerService").append('<div class="text-left"><strong>'+
                            response.freelancers[i].services[service]["service_sub_header"]+ '</strong>'+
                            '<div>' +
                            '<p><strong>'+response.freelancers[i].services[service]["service_header"]+
                            ':  </strong>' + response.freelancers[i].services[service]["service_name"].substring(0, response.freelancers[i].services[service]["service_name"].length-2 ) + '.'  + '</p>' +
                            '</div></div>');
                        }
                        
                        else {
                            
                            $("#ownerProduct").append('<div class="text-left"><strong>'+
                            response.freelancers[i].services[service]["service_sub_header"]+ '</strong>'+
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
            
                //check if the freelancers itself visiting the page or not
                 if( stId === userStId) {
                    //  alert("Freelancer himself");
                     $('.book-section').hide();
                 }
                 
                //  if ( userMode === "Wedding Stylist" || userMode === "Hairstylist" || userMode === "Barber" || userMode === "Beautician")
                //  {
                //     $('.book-section').css("display", "none");

                //  }
                
            }
            

        });
    }
});

});