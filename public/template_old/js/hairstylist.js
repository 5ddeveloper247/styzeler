//Ajax Call to get All Barbar

let FREELANCERID = "stid";
let FREELANCERREGISTRATIONMODE = "freelancermode";
function getFreelancer(mode,stid) {
  localStorage.setItem(FREELANCERID, stid);
  localStorage.setItem(FREELANCERREGISTRATIONMODE, mode);
  window.location.href = "./freelancer-profile.html?e=success";
  //console.log( mode+" "+stid);
}

$(function(){

  //Get freelancers
  $.ajax({
      type: 'post',
      url: webUrl + 'getfreelancers',
      data: {
          "_RegistrationMode": "Hairstylist"
      },
      success: function(response) {

        console.log(response);

        $.each( response.freelancers , function(i){

          let mode= (response.freelancers[i]["_RegistrationMode"]);
          console.log(mode);

            //For content
          if(response.freelancers[i]["_IsActive"] === "1") {

            console.log(response.freelancers[i]);
            $(".content-category-people").append('<div class="col-sm-6 col-lg-4">' +
            '<a id="'+ response.freelancers[i]["_StId"] +'" onclick="getFreelancer(\''+mode+'\', '+response.freelancers[i]["_StId"]+')">' + //Need to send _StId of each and every hairstylist
              '<h4 class="color-1">' + response.freelancers[i]["_FirstName"] + ' ' + response.freelancers[i]["_LastName"] +'</h4>' +
                '<div class="category-people py-3">' +
                  '<div class="picture">' +
                    // '<img src="' + response.freelancers[i]['_ProfileImageId'] + '" alt="" width="100%">' +
                    '<img id="profile-image-id-' + i + '" alt="" width="100%" height="100%">' +
                    
                  '</div>' +
                '</div>' +
              '</a>' +
            '</div>');

            //For profile image
            $.ajax({
                type: 'post',
                url:  webUrl + 'getimage',
                data:  ({
                    "_ImageId": response.freelancers[i]["_ProfileImageId"]
                }),
                success: function (newResponse) {
                  $("#profile-image-id-" + i).attr("src", "data:image/png;base64," + newResponse["_ImageContent"]); 

                }

            });
            
          }

        });  
      }
    
  });
});


