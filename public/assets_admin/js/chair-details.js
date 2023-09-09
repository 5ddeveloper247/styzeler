const webUrl = "https://api.styzeler.co.uk/styzeler-api/index.php/app/";


let CHAIRID = "chairid";
let CHAIRMODE = "chairmode";

let chairId = localStorage.getItem(CHAIRID);
let chairMode = localStorage.getItem(CHAIRMODE);
if(localStorage.getItem('ISADMACTIVE') != "Yes") {
    window.location.href = "../index.html";
}
//localStorage.clear();
// console.log(stId);
$("#chairHeading").text(chairMode);
$("#chairType").text(chairMode);
$("#chairSubHeading").text(chairMode);

$(function() {

 //Get freelancers
  $.ajax({
    type: 'post',
    url: webUrl + 'getavailablesalonspace',
    data: {
        "_Category": chairMode
    },
    success: function(response) {
        console.log(response);

        $.each ( response.salonSpaces, function(i) {

            if(response.salonSpaces[i]["_SalonChairId"] === chairId) {

                $("#ownerName").text(response.salonSpaces[i]["_SalonName"]);
                $("#ownerAdress").text(response.salonSpaces[i]["_SalonAddress"]);
                $("#ownerCountry").text(response.salonSpaces[i]["_SalonCountry"]);
                $("#ownerCounty").text(response.salonSpaces[i]["_SalonCounty"]);
                $("#ownerPostcode").text(response.salonSpaces[i]["_SalonPostalCode"]);
                $("#ownerHour").text(response.salonSpaces[i]["_HourlyRate"] + "£"); 
                $("#ownerDaily").text(response.salonSpaces[i]["_DailyRate"]+ "£");
                $("#ownerWeek").text(response.salonSpaces[i]["_WeeklyRate"]+ "£");
                $("#ownerMonth").text(response.salonSpaces[i]["_MonthlyRate"]+ "£");
                $("#ownerPhone").text(response.salonSpaces[i]["_SalonMobileNumber"]);
                $("#ownerEmail").text(response.salonSpaces[i]["_SalonEmailId"]); 
                $("#chairDescription").text(response.salonSpaces[i]["_SpaceDescription"]); 
                if(response.salonSpaces[i]["_HourlyRate"] > 0 || response.salonSpaces[i]["_DailyRate"] > 0) {
                    $("#ownerCategory").text("Rent & Let as you go");
                } else {
                    $("#ownerCategory").text("Rent & Let");
                }
                
                 //for chair image 1
                 $.ajax({
                    type: 'post',
                    url:  webUrl + 'getimage',
                    data: ({
                        "_ImageId": response.salonSpaces[i]["_SpaceImgId1"]
                        // "_ImageId": "39"
                    }),
                    success: function (newResponse) {
                        // console.log(newResponse["_ImageContent"]);

                        if(newResponse["_ImageContent"] !== "") {
                            $("#chair-image-id-1").attr("src", "data:image;base64," + newResponse["_ImageContent"]); 
                        }
    
                    }
                 });

                 //for chair image 1
                 $.ajax({
                    type: 'post',
                    url:  webUrl + 'getimage',
                    data: ({
                        "_ImageId": response.salonSpaces[i]["_SpaceImgId2"]
                        // "_ImageId": "39"
                    }),
                    success: function (newResponse) {
                        // console.log(newResponse["_ImageContent"]);

                        if(newResponse["_ImageContent"] !== "") {
                            $("#chair-image-id-2").attr("src", "data:image;base64," + newResponse["_ImageContent"]); 
                        }
    
                    }
                 });

                 //for chair image 1
                 $.ajax({
                    type: 'post',
                    url:  webUrl + 'getimage',
                    data: ({
                        "_ImageId": response.salonSpaces[i]["_SpaceImgId3"]
                        // "_ImageId": "39"
                    }),
                    success: function (newResponse) {
                        // console.log(newResponse["_ImageContent"]);

                        if(newResponse["_ImageContent"] !== "") {
                            $("#chair-image-id-3").attr("src", "data:image;base64," + newResponse["_ImageContent"]); 
                        }
    
                    }
                 });

                 //for services
                //  $.each(response.freelancers[i].services, function(service){

                    
                //     if(response.freelancers[i].services[service]["service_name"] != "") {
                        
                //        if(response.freelancers[i].services[service]["service_header"] === "Services") {
                            
                //             $("#ownerService").append('<br><div class="text-left"><p>'+
                //             response.freelancers[i].services[service]["service_sub_header"]+ '</p>'+
                //             '<div>' +
                //             '<p><strong>'+response.freelancers[i].services[service]["service_header"]+
                //             ':  </strong>' + response.freelancers[i].services[service]["service_name"].substring(0, response.freelancers[i].services[service]["service_name"].length-2 ) + '.'  + '</p>' +
                //             '</div></div>');
                //         }
                        
                //         else {
                            
                //             $("#ownerProduct").append('<br><div class="text-left"><p>'+
                //             response.freelancers[i].services[service]["service_sub_header"]+ '</p>'+
                //             '<div>' +
                //             '<p><strong>'+response.freelancers[i].services[service]["service_header"]+
                //             ':  </strong>' + response.freelancers[i].services[service]["service_name"] .substring(0, response.freelancers[i].services[service]["service_name"].length-2 ) + '.'  + '</p>' +
                //             '</div></div>');
                            
                //         }
                //     }
                    
                // });

                // for gallery content images
                // $.each (response.freelancers[i].images, function(j){

                //     $("#gallery-content").append('<div class="col-lg-4 p-4">' +
                //     '<img id="gallery-image-id-' + j + '" alt="" width="100%" height="100%">' + '</div>');

                //     //for gallery image content
                //     //console.log(response.freelancers[i].images[j]["gallery_image_id"]);

                //     $.ajax({
                //         type: 'post',
                //         url:  webUrl + 'getimage',
                //         data: ({
                //             //"_ImageId": "61"
                //             "_ImageId": response.freelancers[i].images[j]["gallery_image_id"]
                //         }),
                //         success: function (galleryResponse) {

                //             //console.log(galleryResponse["_ImageContent"]);

                //             $("#gallery-image-id-" + j).attr("src", "data:image;base64," + galleryResponse["_ImageContent"]);

                //         }
                // }); 

                // });
                
            }
            

        });
    }
});

});