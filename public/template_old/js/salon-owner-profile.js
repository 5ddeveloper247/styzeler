$(document).ready(function () {
    
     $("#showProducts").hide();
     $("#showService").hide();
     $("#profile").removeClass("customBtn").addClass("customBtnSelected");

     $("#profile").click(function() {
        $("#showProfile").show();
        $("#showProducts").hide();
        $("#showService").hide();

        $("#service").removeClass("customBtnSelected").addClass("customBtn");
        $("#products").removeClass("customBtnSelected").addClass("customBtn");

        $("#profile").removeClass("customBtn").addClass("customBtnSelected");

     });

     $("#products").click(function() {
        $("#showProducts").show();
        $("#showProfile").hide();
        $("#showService").hide();
        
        $("#service").removeClass("customBtnSelected").addClass("customBtn");
        $("#profile").removeClass("customBtnSelected").addClass("customBtn");

        $("#products").removeClass("customBtn").addClass("customBtnSelected");

     });

     $("#service").click(function() {
        $("#showService").show();
        $("#showProducts").hide();
        $("#showProfile").hide();
         
        $("#products").removeClass("customBtnSelected").addClass("customBtn");
        $("#profile").removeClass("customBtnSelected").addClass("customBtn");

        $("#service").removeClass("customBtn").addClass("customBtnSelected");
     });

           
});

let OWNERID = "stid";
let FREELANCERREGISTRATIONMODE = "freelancermode";

let ownerStId = localStorage.getItem(OWNERID);
let registrationMode = localStorage.getItem(FREELANCERREGISTRATIONMODE);
//localStorage.clear();

console.log()

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

            if(response.freelancers[i]["_StId"] == ownerStId) {

                $("#owner-name").text(response.freelancers[i]["_FirstName"]+" "+response.freelancers[i]["_LastName"]);
                $("#owner-address").text(response.freelancers[i]["_Address"]);
                $("#owner-postcode").text(response.freelancers[i]["_PostCode"]);
                $("#owner-phone").text(response.freelancers[i]["_MobileNumber"]);
                $("#owner-email").text(response.freelancers[i]["_EmailId"]);


                //for services
                $.each(response.freelancers[i].services, function(service){

                    if(response.freelancers[i].services[service]["service_header"] === "Services") {
                            
                            $("#ownerService").append('<div class="text-left"><strong>'+
                            response.freelancers[i].services[service]["service_sub_header"]+ '</strong>'+
                            '<div>' +
                            '<p><strong>'+response.freelancers[i].services[service]["service_header"]+
                            ':  </strong>' + response.freelancers[i].services[service]["service_name"].substring(0, response.freelancers[i].services[service]["service_name"].length-2 ) + '.'  + '</p>' +
                            '</div></div>');
                        }
                        else {
                            
                            $("#ownerProducts").append('<div class="text-left"><strong>'+
                            response.freelancers[i].services[service]["service_sub_header"]+ '</strong>'+
                            '<div>' +
                            '<p><strong>'+response.freelancers[i].services[service]["service_header"]+
                            ':  </strong>' + response.freelancers[i].services[service]["service_name"] .substring(0, response.freelancers[i].services[service]["service_name"].length-2 ) + '.'  + '</p>' +
                            '</div></div>');
                            
                        }
                    
                });

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
                 })
                
            }

        });
     }
    });

});