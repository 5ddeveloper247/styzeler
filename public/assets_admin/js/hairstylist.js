const webUrl = "https://api.styzeler.co.uk/styzeler-api/index.php/app/";

let FREELANCERID = "stid";
let FREELANCERREGISTRATIONMODE = "freelancermode";
if(localStorage.getItem('ISADMACTIVE') != "Yes") {
    window.location.href = "../index.html";
}
function getFreelancer(mode,stid) {
  localStorage.setItem(FREELANCERID, stid);
  localStorage.setItem(FREELANCERREGISTRATIONMODE, mode);
  window.location.href = "./see-details.html";
  //console.log( mode+" "+stid);
}

function redirect() {
    window.location.href = "./hairstylist.html";
}


//Active a chair
function activePeople(stId) {
    //Ajax call - Login
    $.ajax({
        type: 'post',
        url: webUrl + 'activatefreelancers',
        data: {
          "_StId": stId,
       },
        success: function(response) {
          
          console.log(response);

          $('.activated-modal').modal('show');


        }
      
    });
    //End of Ajax call
}


//Ajax call to get getavailablesalonspace
$(function() {

    //get avaliable salon space
    $.ajax({
        type: 'post',
        url: webUrl + 'getfreelancers',
        data: {
            "_RegistrationMode": "Hairstylist"
        },
        success: function(response) {

            console.log(response);
            
            $.each( response.freelancers, function(i){

                //for salonspaces content
                console.log(response.freelancers[i]);

                let NVQ_2 = (response.freelancers[i]['_NVQ_2'] === 1 ) ? "Yes" : "No";
                let NVQ_3 = (response.freelancers[i]['_NVQ_3'] === 1 ) ? "Yes" : "No";
                let NVQ_ASSESOR = (response.freelancers[i]['_NVQ_ASSESOR'] === 1 ) ? "Yes" : "No";

                let mode= (response.freelancers[i]["_RegistrationMode"]);


                $(".user-details").append(
                    //  '<div class="col-3 pt-2" style="border-top: 1px solid grey;">' +
                    //   '<p>' + response.freelancers[i]['_RegistrationMode'] + '</p>' +
                    //   '<p><img id="profile_image_id_"' + i +'"/>' + '</p>' +
                    //    '</div>' +
                        '<div class="col-4 pt-2" style="border-top: 1px solid grey;">' +
                            '<p>' + response.freelancers[i]['_FirstName'] + " " + response.freelancers[i]['_LastName'] + '</p>' +
                            // '<p><strong>Mobile Number: </strong>' + response.freelancers[i]['_MobileNumber'] + '</p>' +
                            // '<p><strong>Email: </strong>' + response.freelancers[i]['_EmailId'] + '</p>' +
                            // '<p><strong>Age: </strong>' + response.freelancers[i]['_Age'] +'</p>' +
                            // '<p><strong>Resume: </strong>' + response.freelancers[i]['_Resume'] + '</p>' +
    
                            // '<p><strong>NVQ 2: </strong>' + NVQ_2 + '</p>' +
                            // '<p><strong>NVQ 3: </strong>' + NVQ_3 + '</p>' +
                            // '<p><strong>NVQ Assesor: </strong>' + NVQ_ASSESOR + '</p>' +
                            // '<p><strong>UTR: </strong>' + response.freelancers[i]['_UTR'] + '</p>' +
                            // '<p><strong>Rate: </strong>' + response.freelancers[i]['_Rate'] + '</p>' +
                            // '<p><strong>Languages: </strong>' + response.freelancers[i]['_Languages'] + '</p>' +
                        '</div>' + 
                        '<div class="col-4 pt-2" style="border-top: 1px solid grey;">' +
                           '<p id="'+ response.freelancers[i]["_StId"] +'" onclick="getFreelancer(\''+mode+'\', '+response.freelancers[i]["_StId"]+')">Click to see details</p>' +
                        '</div>' +
                        '<div class="col-4 pt-2" style="border-top: 1px solid grey;">' +
                            '<p id="freelancer_' + i +'" ></p>' +
                    '</div><hr/>');

                    if(  response.freelancers[i]['_IsActive'] === "0" ) {
                        $("#freelancer_" + i ).append('<a onclick="activePeople(' + response.freelancers[i]['_StId'] + ');" style="color:red;">Active Now</a>');
                    } else {
                        $("#freelancer_" + i ).append('<a style="color: green;">Activated</a>');

                    }

                //For profile image
                // $.ajax({
                //     type: 'post',
                //     url:  webUrl + 'getimage',
                //     data:  ({
                //         "_ImageId": response.freelancers[i]["_ProfileImageId"]
                //     }),
                //     success: function (newResponse) {
                //         $("#profile-image-id-" + i).attr("src", "data:image;base64," + newResponse["_ImageContent"]); 
        
                //     }
        
                // });

                // for gallery content images
                // $.each (response.freelancers[i].images, function(j){

                //     $("#scrollmenu_" + i ).append('<div class="col-12">' +
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
                //     }); 

                // });
                

            });
        }
    });
});