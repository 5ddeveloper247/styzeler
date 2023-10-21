
let OWNERID = "stid";
let FREELANCERREGISTRATIONMODE = "freelancermode";

function getFreelancer(mode,stid) {
  localStorage.setItem(OWNERID, stid);
  localStorage.setItem(FREELANCERREGISTRATIONMODE, mode);
  window.location.href = "./salon-owner-profile.html?e=success";
  //console.log( mode+" "+stid);
}

//To show Hairdressing Owner
function showHairdressingOwner() {

  //To show Hairdressing Owner is selected    
  $("#hairdressing").removeClass("customBtn").addClass("salonCustomBtnSelected");
  $("#hairdressing").prop('disabled', true);
  
   //To show Beauty Owner is not selected    
  $("#beauty").removeClass("salonCustomBtnSelected").addClass("customBtn");
  $("#beauty").prop('disabled', false);

  $(".content-category-people").empty();

  //Get freelancers
  $.ajax({
      type: 'post',
      url: webUrl + 'getfreelancers',
      data: {
          "_RegistrationMode": "Hairdressing Owner",
      },
      success: function(response) {

        console.log(response);

        $.each( response.freelancers , function(i){
 
          let mode= (response.freelancers[i]["_RegistrationMode"]);
          console.log(mode);
            //For content
          if(response.freelancers[i]["_IsActive"] === "1") {

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
                    $("#profile-image-id-" + i).attr("src", "data:image;base64," + newResponse["_ImageContent"]); 

                }

            });
            
          }

        });  
      }
    
  });
    
    
}

//To show business Owner
function showBeautyOwner() {
    
   //To show Beauty Owner is selected    
  $("#beauty").removeClass("customBtn").addClass("salonCustomBtnSelected");
  $("#beauty").prop('disabled', true);
     
   //To show Hairdressing Owner is not selected    
  $("#hairdressing").removeClass("salonCustomBtnSelected").addClass("customBtn");
  $("#hairdressing").prop('disabled', false);

  $(".content-category-people").empty();

  //Get freelancers
  $.ajax({
      type: 'post',
      url: webUrl + 'getfreelancers',
      data: {
          "_RegistrationMode": "Beauty Owner",
      },
      success: function(response) {

        console.log(response);

        $.each( response.freelancers , function(i){
 
          let mode= (response.freelancers[i]["_RegistrationMode"]);
          console.log(mode);
          
          if(response.freelancers[i]["_IsActive"] === "1") {

            //For content
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
                    $("#profile-image-id-" + i).attr("src", "data:image;base64," + newResponse["_ImageContent"]); 

                }

            });
          }

        });  
      }
    
  });
    
    
}

$(function(){
    

  $("#hairdressing").removeClass("customBtn").addClass("salonCustomBtnSelected");

  //Get freelancers - Onloadinf the page, Hairdressing Owner will be shown 
  $.ajax({
      type: 'post',
      url: webUrl + 'getfreelancers',
      data: {
          "_RegistrationMode": "Hairdressing Owner",
          //Not sure which mode we should show here
      },
      success: function(response) {

        console.log(response);

        $.each( response.freelancers , function(i){
 
          let mode= (response.freelancers[i]["_RegistrationMode"]);
          console.log(mode);
          
          if(response.freelancers[i]["_IsActive"] === "1") {

            //For content
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
                    $("#profile-image-id-" + i).attr("src", "data:image;base64," + newResponse["_ImageContent"]); 

                }

            });

          }
          
        });  
      }
    
  });
    
    
});