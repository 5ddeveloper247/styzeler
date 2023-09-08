let SELECTEDDATE = "selecteddate";

let stId = localStorage.getItem(STID);
let registrationMode = localStorage.getItem(REGISTRATIONMODE);
let registrationEmail = localStorage.getItem(REGISTRATIONEMAIL);
let IMAGEID = "imageid";
let GALLERYID = "galleryid";
let PUBLICINSURANCEID = "publicinsuranceid";
let onCall;

function redirectToPage() {
  // location.reload();
  window.location.href = "./profile.html";

}


function avaliableAppointmentDate() {

    var availableDate = localStorage.getItem(SELECTEDSTATUSDATE);

      $.ajax({
          type: 'post',
          url: webUrl + 'updateappointmentdates',
          data: {
              "_StId": stId,
              "_Status": "Available",
              "_IsActive": "1",
              "availableDays" : availableDate
              },
          success: function(updateResponse) {
            if(updateResponse["_ReturnMessage"] === "Fatal Error") {
                $(".error-modal").modal('show');
            }
            else {
              $("#status").text("Available");
              $(".appointment-status").show();
              $("#calendar").fullCalendar('refetchEvents');
              $(".cancel").removeClass("customBtnNotSelected");
              $(".available").addClass("customBtnNotSelected");    
              $(".off").addClass("customBtnNotSelected");
              $(".on-call").addClass("customBtnNotSelected");
              $(".avaliable-modal").modal('show');
            }
             
              console.log(updateResponse);
              
          } 
      });


}


function offAppointmentDate() {
  
  var offDate = localStorage.getItem(SELECTEDSTATUSDATE);
  
      $.ajax({
          type: 'post',
          url: webUrl + 'updateappointmentdates',
          data: {
              "_StId": stId,
              "_Status": "Off",
              "_IsActive": "0",
              "availableDays" : offDate
              },
          success: function(updateResponse) {
            if(updateResponse["_ReturnMessage"] === "Fatal Error") {
              $(".error-modal").modal('show');
          }
          else {

            $("#status").text("Off");
            $(".cancel").removeClass("customBtnNotSelected");
            $(".available").addClass("customBtnNotSelected");
            $(".off").addClass("customBtnNotSelected");
            $(".on-call").addClass("customBtnNotSelected");
            $(".avaliable-modal").modal('show');
          }
              console.log(updateResponse);
          } 
      });

}

function onCallAppointmentDate() {

  var onCallDate = localStorage.getItem(SELECTEDSTATUSDATE);

  $.ajax({
    type: 'post',
    url: webUrl + 'updateappointmentdates',
    data: {
        "_StId": stId,
        "_Status": "On Call",
        "_IsActive": "1",
        "availableDays" : onCallDate
        },
    success: function(updateResponse) {
      if(updateResponse["_ReturnMessage"] === "Fatal Error") {
        $(".error-modal").modal('show');
    }
    else {
      $("#status").text("On Call");
      $(".appointment-status").show();
      $(".cancel").removeClass("customBtnNotSelected");
      $(".available").addClass("customBtnNotSelected");
      $(".off").addClass("customBtnNotSelected");
      $(".on-call").addClass("customBtnNotSelected");
      $(".avaliable-modal").modal('show');
    }
        console.log(updateResponse);
    } 
});

}


function cancelAppointmentDate() {

  var deleteDate = localStorage.getItem(SELECTEDSTATUSDATE);

  $.ajax({
    type: 'post',
    url: webUrl + 'updateappointmentdates',
    data: {
        "_StId": stId,
        "_Status": "Cancel",
        "_IsActive": "1",
        "availableDays" : deleteDate
        },
    success: function(updateResponse) {
      if(updateResponse["_ReturnMessage"] === "Fatal Error") {
        $(".error-modal").modal('show');
    }
    else {
      $("#calendar").fullCalendar('refetchEvents');
      $(".appointment-status").hide();
      $(".cancel").addClass("customBtnNotSelected");
      $(".available").removeClass("customBtnNotSelected");
      $(".off").removeClass("customBtnNotSelected");
      
      if(deleteDate === onCall) {
          if(currentHour > 18) {
              $(".on-call").removeClass("customBtnNotSelected");
          }
        
      }
      $(".avaliable-modal").modal('show');
    }
        console.log(updateResponse);
    } 
});

}




//For profile Picture
function readURL(input) {

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

          $.ajax({
              type: 'post',
              url: webUrl + 'uploadimage',
              data: {
                  "_ImageContent": base64Gallery[3],
                  "_ImageType": base64Gallery[1]
              },
              success: function (response) {

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
      // console.log( base64[1] + base64[3]);

      $.ajax({
          type: 'post',
          url: webUrl + 'uploadimage',
          data: {
              "_ImageContent": base64[3],
              "_ImageType": base64[1]
          },
          success: function (response) {

              console.log(response);

              localStorage.setItem(PUBLICINSURANCEID, response["_ImageId"]);

          }

      });


  }
  reader.readAsDataURL(file);

}


let firstName, lastName, mobile, age, profileImageId, resume,  work, nvq2, nvq3, nvqAssesor,
 tradeTestVideo, utr, publicLiabilityImage, rate, language, address, postcode, imageId,saveService;

$(document).ready(function () {

    $("#showReviews").hide();
    $("#showLikes").hide();
    $("#showBook").hide();
    $("#profile").removeClass("customBtn").addClass("customBtnSelected");
  
  
    $("#profile").click(function () {
      $("#showProfile").show();
     
      $("#showReviews").hide();
      $("#showLikes").hide();
      $("#showBook").hide();
  
      $("#reviews").removeClass("customBtnSelected").addClass("customBtn");
      $("#likes").removeClass("customBtnSelected").addClass("customBtn");
      $("#book").removeClass("customBtnSelected").addClass("customBtn");
  
      $("#profile").removeClass("customBtn").addClass("customBtnSelected");
      
  
    });
  
    $("#reviews").click(function () {
      $("#showReviews").show();
      $("#showProfile").hide();
      $("#showLikes").hide();
      $("#showBook").hide();
  
      $("#profile").removeClass("customBtnSelected").addClass("customBtn");
      $("#likes").removeClass("customBtnSelected").addClass("customBtn");
      $("#book").removeClass("customBtnSelected").addClass("customBtn");
  
      $("#reviews").removeClass("customBtn").addClass("customBtnSelected");
      
      $("#showReviewLike").empty();
    $.ajax({
      type: 'post',
      url: webUrl + 'viewreviewlike',
      data: {
        "_FreelancerStId": stId,
      },
      success: function(response) {
        console.log(response);
        if((response['FreelancerReview']).length > 0  ) {
          // console.log(response);
          $.each(response['FreelancerReview'], function(i) {
            if(response['FreelancerReview'][i]['_Review'] != "") {
              $("#showReviewLike").append('<div>' +
              '<h5 class="color-1">' + response['FreelancerReview'][i]['_SalonOwnerBusinessName'] + '</h5>' + 
              '<p class="mt-2">'+response['FreelancerReview'][i]['_Review']+'</p>'+
              '</div>' );
            }
          });
        }
        else {
          $("#showReviewLike").append('<div>No Reviews Yet!</div>');
        }
        
      }
    });
    
      
  
    });
  
    $("#likes").click(function () {
      $("#showLikes").show();
      $("#showReviews").hide();
      $("#showProfile").hide();
      $("#showBook").hide();
  
      $("#profile").removeClass("customBtnSelected").addClass("customBtn");
      $("#reviews").removeClass("customBtnSelected").addClass("customBtn");
      $("#book").removeClass("customBtnSelected").addClass("customBtn");
  
      $("#likes").removeClass("customBtn").addClass("customBtnSelected");
      
      $("#showLikes").empty();

    let counter = 0;
    $.ajax({
      type: 'post',
      url: webUrl + 'viewreviewlike',
      data: {
        "_FreelancerStId": stId,
      },
      success: function(response) {
        console.log(response);
        if((response['FreelancerReview']).length > 0  ) {
          // console.log(response);
          $.each(response['FreelancerReview'], function(i) {
            
            if(response['FreelancerReview'][i]['_IsLiked'] == 1) {
              counter ++;
            }
          });
          if(counter > 0) {
            $("#showLikes").append('<h1 class="color-1">'+ counter + '<h1><h4 class="color-1">Likes</h4>');
          }
          else {
            $("#showLikes").append('<div>No Likes Yet!</div>');
          }
        }
        else {
          $("#showLikes").append('<div>No Likes Yet!</div>');
        }
        
      }
    });
  
    });
  
    $("#book").click(function () {
      $("#showBook").show();
      $("#showProfile").hide();
      $("#showReviews").hide();
      $("#showLikes").hide();
  
  
      $("#profile").removeClass("customBtnSelected").addClass("customBtn");
      $("#reviews").removeClass("customBtnSelected").addClass("customBtn");
      $("#likes").removeClass("customBtnSelected").addClass("customBtn");
  
      $("#book").removeClass("customBtn").addClass("customBtnSelected");

      console.log(tomorrow);
      onCall = tomorrow;
  
    })
  });
        
        



$(function() {
  //Get freelancers
  $.ajax({
    type: 'post',
    url: webUrl + 'getfreelancers',
    data: {
        "_RegistrationMode": registrationMode,
        "__CallType": 1,
    },
    success: function(response) {
        console.log(response);

        $.each ( response.freelancers, function(i) {

            if(response.freelancers[i]["_StId"] === stId) {

              //storing values
              firstName = response.freelancers[i]["_FirstName"];
              lastName = response.freelancers[i]["_LastName"];
              mobile = response.freelancers[i]["_MobileNumber"];
              age = response.freelancers[i]["_Age"];
              profileImageId = response.freelancers[i]["_ProfileImageId"];
              resume = response.freelancers[i]["_Resume"];
              nvq2 = response.freelancers[i]["_NVQ_2"];
              nvq3 = response.freelancers[i]["_NVQ_3"];
              nvqAssesor = response.freelancers[i]["_NVQ_ASSESOR"];
              work = response.freelancers[i]["_Work"];
              tradeTestVideo = response.freelancers[i]["_TradeTestVideoUrl"];
              utr = response.freelancers[i]["_UTR"]; 
              publicLiabilityImage = response.freelancers[i]["_PublicLiabilityImageId"]; 
              rate = response.freelancers[i]["_Rate"];
              status = response.freelancers[i]["_Status"];
              type = response.freelancers[i]["_Ptype"];
              language = response.freelancers[i]["_Languages"]; 
              address = response.freelancers[i]["_Address"]; 
              postcode = response.freelancers[i]["_PostCode"];
              saveService = response.freelancers[i]["services"];
              console.log(saveService);

              // console.log(stId, registrationMode, registrationEmail, firstName, lastName, mobile, age, profileImageId, resume, nvq2, nvq3, nvqAssesor, tradeTestVideo, utr, publicLiabilityImage, rate, language, address, postcode, imageId);
              //✎

                $("#ownerName").text(response.freelancers[i]["_FirstName"]+" "+response.freelancers[i]["_LastName"]+" ");
                $("#ownerName").append('<a class="text-center btn" onclick="editName()" title="Edit">' + '✎' + '</a>');
                $("#ownerAge").text(response.freelancers[i]["_Age"]+" years"+" ");
                $("#ownerAge").append('<a class="text-center btn"  onclick="editAge()" title="Edit">' + '✎' + '</a>');
                $("#ownerResume").text(response.freelancers[i]["_Resume"]+" ");
                $("#ownerResume").append('<a class="text-center btn"  onclick="editResume()" title="Edit">' + '✎' + '</a>');
                $("#ownerRate").text(response.freelancers[i]["_Rate"]+" ");
                $("#ownerRate").append('<a class="text-center btn"  onclick="editRate()" title="Edit">' + '✎' + '</a>');
                $("#ownerWork").text(response.freelancers[i]["_Work"]+" "); 
                $("#ownerWork").append('<a class="text-center btn"  onclick="editWork()" title="Edit">' + '✎' + '</a>');
                $("#ownerLanguage").text(response.freelancers[i]["_Languages"]+" "); 
                $("#ownerLanguage").append('<a class="text-center btn"  onclick="editLanguage()" title="Edit">' + '✎' + '</a>');
                $("#ownerEmail").text(response.freelancers[i]["_EmailId"]);
                $("#status").text(response.freelancers[i]["_Status"]);
                $("#status").append('<a class="text-center btn"  onclick="editStatus();" title="Edit">' + '✎' + '</a>');
                $("#profiletype").text(response.freelancers[i]["_Ptype"]);
                $("#profiletype").append('<a class="text-center btn"  onclick="editType();" title="Edit">' + '✎' + '</a>');
                

                let qualification;
                if(response.freelancers[i]["_NVQ_3"] != 0) { 
                    qualification = "NVQ3";
                 }
                 else if(response.freelancers[i]["_NVQ_2"] != 0) { 
                    qualification = "NVQ2";
                 }
                 else  { 
                    qualification = "NVQ Assesor, Training Assesor";
                 }
                 $("#ownerQualification").text(qualification+" ");
                 $("#ownerQualification").append('<a class="text-center btn"  onclick="editQualification()" title="Edit">' + '✎' + '</a>');
                
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
                        $(".profile-pic").append('<p><a class="text-center btn edit_pro_pic"  onclick="editProfilePic()" title="Edit">' + '+' + '</a></p>');
    
                    }
                 }),
                 
                 //for services
                 $.each(response.freelancers[i].services, function(service){

                    //console.log(response.freelancers[i].services[service]["service_sub_header"]);
                    if(response.freelancers[i].services[service]["service_name"] != "") {
                        
                       if(response.freelancers[i].services[service]["service_header"] === "Services") {
                            
                            $("#ownerService").append('<div class="text-left"><p> <strong>'+ 
                            response.freelancers[i].services[service]["service_sub_header"]+ '</strong></p>'+
                            // '<div>' +
                            '<p><strong>'+response.freelancers[i].services[service]["service_header"]+
                            ':  </strong>' + response.freelancers[i].services[service]["service_name"].substring(0, response.freelancers[i].services[service]["service_name"].length-2 ) + '.'  + '</p>' +
                            '</div></div><div>');
                        }
                        else {
                            
                            $("#ownerProduct").append('<div class="text-left"><p> <strong>'+
                            response.freelancers[i].services[service]["service_sub_header"]+ '</strong></p>'+
                            // '<div>' +
                            '<p><strong>'+response.freelancers[i].services[service]["service_header"]+
                            ':  </strong>' + response.freelancers[i].services[service]["service_name"] .substring(0, response.freelancers[i].services[service]["service_name"].length-2 ) + '.'  + '</p>' +
                            '</div></div>');
                            
                        }
                        
                    }
                    
                 });

                 $.each (response.freelancers[i].images, function(j){

                    $("#gallery-content").append('<div class="col-lg-4 p-4">' +
                    '<img id="gallery-image-id-' + j + '" alt="" width="100%" height="100%">' + 
                    '<p><a class="text-center btn"  onclick="deletePicture('+response.freelancers[i].images[j]["gallery_image_id"]+')" title="Edit">' +
                     '<u> remove </u>' + '</a></p>'+ '</div>');
                    $("#gallery-content").append();

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



function editName() {
  $(".name-mobile-modal").modal('show');
  $("#stylist-name").attr("placeholder", firstName).blur();
  $("#stylist-surname").attr("placeholder", lastName).blur();
  $("#stylist-mobile").attr("placeholder", mobile).blur();
  // console.log(firstName);
}


function editAge() {
  $(".age-modal").modal('show');
}

function editResume() {
  $(".resume-modal").modal('show');
  $("#stylist-resume").attr("placeholder", resume).blur();
}

function editRate() {
  $(".rate-modal").modal('show');
}

function editWork() {
  $(".work-modal").modal('show');
}

function editLanguage() {
  $(".language-modal").modal('show');
  $("#stylist-language").attr("placeholder", language).blur();
}

function editStatus() {
	  $(".status-modal").modal('show');
}

function editType() {
	$(".type-modal").modal('show');
}

function editQualification() {
  $(".qualification-modal").modal('show');
  $("#utr-number").attr("placeholder", utr).blur();
}

function editProfilePic() {
  $(".profile-pic-modal").modal('show');
}

function updateGallery() {
  $(".gallery-modal").modal('show');
}

function editServiceAndProduct() {
  if(registrationMode === "Wedding Stylist" || registrationMode === "Hairstylist") {
    $(".wedding-service-product-modal").modal('show');
  }
  if(registrationMode === "Beautician" ) {
    $(".beautician-service-product-modal").modal('show');
  }
  if(registrationMode === "Barber" ) {
    $(".wedding-service-product-modal").modal('show');
  }
}

function deletePicture(deletePicture) {

  $.ajax({
    type: 'post',
    url: webUrl + 'deleteimage',
    data: {
        "_StId": stId,
        "_RegistrationMode": registrationMode,
        "_ImageId": deletePicture
    },
    success: function (response) {

        console.log(response);
        if (response["_ReturnMessage"] === "Success") {

          $('.success-modal').modal('show');
    }

  }

});

}



function updateProfile() {

  let newfirstName = $("#stylist-name").val();
  let newlastName = $("#stylist-surname").val();
  let newmobile = $("#stylist-mobile").val(); 
  let newage = $('input[name="stylist_age"]:checked').val();
  let newnvqLevel2 = $("#nvq-level2").is(':checked') ? 1 : 0;
  let newnvqLevel3 = $("#nvq-level3").is(':checked') ? 1 : 0;
  let newnvqAssesor = $("#nvq-assesor").is(':checked') ? 1 : 0;

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

  let newvideo = $("#video").val();
  let newutr = $("#utr-number").val();
  let newstylistRate = $('input[name="stylist_rate"]:checked').val();
  if(newstylistRate == 'other'){
	  if($('input[name="otherRate"]').val() == 0 || $('input[name="otherRate"]').val() == ""){
		  alert("Please Enter Rate");
		  editRate();
		  return;
	  }
	  
	  newstylistRate = $('input[name="otherRate"]').val();
  }
  
  let newstatus = $("#stylist_status").val();
  let newptype = $("#profile_type").val();
  
  let newresume = $("#stylist-resume").val();
  let newlanguages = $("#stylist-language").val();

  let newpicture = localStorage.getItem(IMAGEID);
  let newpublicInsuranceId = localStorage.getItem(PUBLICINSURANCEID);
  let newimages = localStorage.getItem(GALLERYID);

  console.log(newpicture + "newpicture");

  let letters = /^[A-Za-z][A-Za-z ]+$/;
  if (newfirstName != "") {
      if (newfirstName.match(letters)) {
        firstName = newfirstName;
      }
  }

  if (newlastName != "") {
    if (newlastName.match(letters)) {
      lastName = newlastName;
    }
  }

  let numberLetters = /^[0-9]+$/;
  if (newmobile != "") {
      if (newmobile.match(numberLetters)) {
        mobile = newmobile;
      }
  }

  if (newnvqLevel2 != false || newnvqLevel3 != false || newnvqAssesor != false) {
    nvq2 = newnvqLevel2;
    nvq3 = newnvqLevel3
    nvqAssesor = newnvqAssesor;
  }

  if (selectedZones != "") {
    work = selectedZones;
  }

  if (typeof (newage) !== "undefined") {
    age = newage;
  }


  if (newvideo != "") {
    tradeTestVideo = newvideo;
  }
  
  if (newutr != "") {
    utr = newutr;
  }

  if (typeof (newstylistRate) !== "undefined") {
    rate = newstylistRate;
  }
  
  
  if (typeof (status) !== "undefined") {
	  status = newstatus;
  }
  
  if (typeof (newptype) !== "undefined") {
	  ptype = newptype;
  }

  let resumeLetters = /^[A-Za-z0-9 ':-_+.,A-Za-z0-9 '-_:+.,]+$/;
  if (newresume != "") {

    if (newresume.length > 3) {
        if (newresume.match(resumeLetters)) {
            resume = newresume;
        }
    }
  }

  let languageLetters = /^[A-Za-z .,]+$/;
  if (newlanguages != "") {
    if (newlanguages.match(languageLetters)) {
        language = newlanguages;
    }
  }

  if (newpicture != null ) {
    profileImageId = newpicture;
  }

  if (newpublicInsuranceId != null ) {
    publicLiabilityImage = newpublicInsuranceId;
  }
  
  if (newimages != null ) {
    imageId = newimages;
  }

  if(registrationMode === "Wedding Stylist" || registrationMode === "Hairstylist") {
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

    $.each(saveService, function(service){
      if(saveService[service]["service_sub_header"] === "Hair Cutting" && saveService[service]["service_header"] === "Services" ) {
        if(refinedHairCutting != "") {
          saveService[service]["service_name"] = refinedHairCutting;
        }
      }
      if(saveService[service]["service_sub_header"] === "Wedding Styles" && saveService[service]["service_header"] === "Services" ) {
        if(refinedWeddingStyles != "") {
          saveService[service]["service_name"] = refinedWeddingStyles;
        }
      }
      if(saveService[service]["service_sub_header"] === "Barber Male Grooming" && saveService[service]["service_header"] === "Services" ) {
        if(refinedBarberMaleGrooming != "") {
          saveService[service]["service_name"] = refinedBarberMaleGrooming;
        }
      }
      if(saveService[service]["service_sub_header"] === "Barber Male Grooming" && saveService[service]["service_header"] === "Styling Products" ) {
        if(refinedbarberMaleGroomingProducts != "") {
          saveService[service]["service_name"] = refinedbarberMaleGroomingProducts;
        }
      }
      if(saveService[service]["service_sub_header"] === "Hair Color" && saveService[service]["service_header"] === "Services" ) {
        if(refinedHairColor != "") {
          saveService[service]["service_name"] = refinedHairColor;
        }
      }
      if(saveService[service]["service_sub_header"] === "Hair Color" && saveService[service]["service_header"] === "Brands" ) {
        if(refinedHairColorBrands != "") {
          saveService[service]["service_name"] = refinedHairColorBrands;
        }
      }
      if(saveService[service]["service_sub_header"] === "Chemical Treatments" && saveService[service]["service_header"] === "Services" ) {
        if(refinedChemicalTreatments != "") {
          saveService[service]["service_name"] = refinedChemicalTreatments;
        }
      }
      if(saveService[service]["service_sub_header"] === "Chemical Treatments" && saveService[service]["service_header"] === "Products" ) {
        if(refinedChemicalTreatmentsProducts != "") {
          saveService[service]["service_name"] = refinedChemicalTreatmentsProducts;
        }
      }
    });

  }

  if(registrationMode === "Beautician" ) {
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

    //Products
    messageProducts.push($("#kaeso").is(':checked') ? "Kaeso" : 0);
    messageProducts.push($("#purple-flame").is(':checked') ? "Purple Flame" : 0);
    messageProducts.push($("#strictly-professional").is(':checked') ? "Strictly Professional" : 0);
    messageProducts.push($("#lotus").is(':checked') ? "Lotus" : 0);
    messageProducts.push($("#elemis").is(':checked') ? "Elemis" : 0);
    messageProducts.push($("#dermalogica").is(':checked') ? "Dermalogica" : 0);

    // console.log(hairCutting);


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

    // accepting if checked
    $.each(messageProducts, function(i) {

     console.log(messageProducts[i]);

     if(messageProducts[i] != 0 ) {

         refinedMessageProducts = refinedMessageProducts + messageProducts[i] + ", ";
     }
     
 });

 let messageProduct = {"_ServiceName" : refinedMessageProducts , "_ServiceHeader" : "Message" , "_ServiceSubHeader" : "Products"};

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
    let refinedBodyWaxProductes = "";

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


    //Products
    bodyWaxProducts.push($("#gigi-honee").is(':checked') ? "Gigi Honee" : 0);
    bodyWaxProducts.push($("#hive-wax").is(':checked') ? "Hive Wax" : 0);
    bodyWaxProducts.push($("#lotus-essentials").is(':checked') ? "Lotus Essentials" : 0);
    bodyWaxProducts.push($("#berodinsatin").is(':checked') ? "Berodin Satin" : 0);
    bodyWaxProducts.push($("#cirepil").is(':checked') ? "Cirepil" : 0);
    bodyWaxProducts.push($("#Smooth Honey Waz").is(':checked') ? "Smooth Honey Wax" : 0);
    bodyWaxProducts.push($("#shobha-sugar-wax").is(':checked') ? "Shobha Sugar Wax" : 0);


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
     let bodyWaxService = {"_ServiceName" : refinedBodyWax , "_ServiceHeader" : "Body Wax" , "_ServiceSubHeader" : "Services"};
     //console.log(bodyWax);

     // accepting if checked
    $.each(bodyWaxProducts, function(i) {

     console.log(bodyWaxProducts[i]);

     if(bodyWaxProducts[i] != 0 ) {

         refinedBodyWaxProductes = refinedBodyWaxProductes + bodyWaxProducts[i] + ", ";
     }
     
 });

 //String
 console.log(refinedBodyWaxProductes);

  //merging serviceName + serviceHeader +serviceSubheader
  let bodyWaxProduct = {"_ServiceName" : refinedBodyWaxProductes , "_ServiceHeader" : "Body Wax" , "_ServiceSubHeader" : "Products"};

    //Manicure Pedicure Permanent----------------------------------------------------------------------------------------------------
    let maniPedi = [];
    let maniPediProducts = [];
    let refinedmaniPedi = "";
    let refinedmaniPediProducts = "";

    //Services
    maniPedi.push($("#traditional-mani-pedi").is(':checked') ? "Traditional Mani Pedi" : 0);
    maniPedi.push($("#spa-mani-pedi").is(':checked') ? "Spa Mani Pedi" : 0);
    maniPedi.push($("#get-mani-pedi").is(':checked') ? "Gel Mani Pedi" : 0);
    maniPedi.push($("#mani-pedi").is(':checked') ? "Mani Pedi" : 0);
    maniPedi.push($("#french-mani-pedi").is(':checked') ? "French Mani Pedi" : 0);
    maniPedi.push($("#russian-mani-pedi").is(':checked') ? "Russian Manicure/Pedicure" : 0);
    maniPedi.push($("#acrylic-nail-extension").is(':checked') ? "Acrylic Nail Extension" : 0);
    maniPedi.push($("#get-nail-extension").is(':checked') ? "Get Nail Extension" : 0);
    maniPedi.push($("#hard-gel").is(':checked') ? "Hard Gel" : 0);
    maniPedi.push($("#nail-designs").is(':checked') ? "Nail Designs" : 0);
    maniPedi.push($("#nail-art").is(':checked') ? "Nail Art" : 0);

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
     let maniPediService = {"_ServiceName" : refinedmaniPedi , "_ServiceHeader" : "Mani Pedi" , "_ServiceSubHeader" : "Services"};
     //console.log(headService);

     // accepting if checked
    $.each(maniPediProducts, function(i) {

     console.log(maniPediProducts[i]);

     if(maniPediProducts[i] != 0 ) {

         refinedmaniPediProducts = refinedmaniPediProducts + maniPediProducts[i] + ", ";
     }
     
 });

 //String
 console.log(refinedmaniPedi);

  //merging serviceName + serviceHeader +serviceSubheader
  let maniPediProduct = {"_ServiceName" : refinedmaniPediProducts , "_ServiceHeader" : "Mani Pedi" , "_ServiceSubHeader" : "Products"};

    //Facials ----------------------------------------------------------------------------------------------------
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

    //Products
    facialsProducts.push($("#eve-taylor").is(':checked') ? "Eve Taylor" : 0);
    facialsProducts.push($("#environ").is(':checked') ? "Environ" : 0);
    facialsProducts.push($("#sans-souis").is(':checked') ? "Sans Souis" : 0);
    facialsProducts.push($("#elemis").is(':checked') ? "Elemis" : 0);
    facialsProducts.push($("#glo-therapeutics").is(':checked') ? "Glo Therapeutics" : 0);
    facialsProducts.push($("#mario-badescu").is(':checked') ? "Mario Badescu" : 0);
    facialsProducts.push($("#dermalogica").is(':checked') ? "Dermalogica" : 0);
    facialsProducts.push($("#md-formulation").is(':checked') ? "Md Formulation" : 0);



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

     // accepting if checked
    $.each(facialsProducts, function(i) {

     console.log(facialsProducts[i]);

     if(facialsProducts[i] != 0 ) {

         refinedFacialsProducts = refinedFacialsProducts + facialsProducts[i] + ", ";
     }
     
 });

 //String
 console.log(refinedFacials);

  //merging serviceName + serviceHeader +serviceSubheader
  let facialsProduct = {"_ServiceName" : refinedFacialsProducts , "_ServiceHeader" : "Facials" , "_ServiceSubHeader" : "Products"};

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

    //Products
    eyebrowsProducts.push($("#london-lash").is(':checked') ? "London Lash" : 0);
    eyebrowsProducts.push($("#eyelure-lashes").is(':checked') ? "Eyelure Lashes" : 0);
    eyebrowsProducts.push($("#lash-art").is(':checked') ? "Lash Art" : 0);
    eyebrowsProducts.push($("#lash-heaven").is(':checked') ? "Lash Heaven" : 0);       eyebrows.push($("#eyelash-extensions").is(':checked') ? "Eyelash Extensions" : 0);
    eyebrowsProducts.push($("#smart-brow").is(':checked') ? "Smart Brow" : 0);
    eyebrowsProducts.push($("#lrefectiocil").is(':checked') ? "Lrefectiocil" : 0);

    

    // console.log(hairCutting);


    // accepting if checked
    $.each(eyebrows, function(i) {

        console.log(eyebrows[i]);

        if(eyebrows[i] != 0 ) {

          refinedEyebrows = refinedEyebrows + eyebrows[i] + ", ";
        }
        
    });

    //String
    console.log(refinedEyebrows);

    //merging serviceName + serviceHeader +serviceSubheader
    let eyebrowsService = {"_ServiceName" : refinedEyebrows , "_ServiceHeader" : "Eyebrows" , "_ServiceSubHeader" : "Services"};
    //console.log(eyebrowsService);

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

 $.each(saveService, function(service){
  if(saveService[service]["service_sub_header"] === "Message" && saveService[service]["service_header"] === "Services" ) {
    if(refinedMessage != "") {
      saveService[service]["service_name"] = refinedMessage;
    }
  }
  if(saveService[service]["service_sub_header"] === "Message" && saveService[service]["service_header"] === "Products" ) {
    if(refinedMessageProducts != "") {
      saveService[service]["service_name"] = refinedMessageProducts;
    }
  }
  if(saveService[service]["service_sub_header"] === "Hair Removal Permanent" && saveService[service]["service_header"] === "Services" ) {
    if(refinedHairRemoval != "") {
      saveService[service]["service_name"] = refinedHairRemoval;
    }
  }
  if(saveService[service]["service_sub_header"] === "Body Wax" && saveService[service]["service_header"] === "Services" ) {
    if(refinedBodyWax != "") {
      saveService[service]["service_name"] = refinedBodyWax;
    }
  }
  if(saveService[service]["service_sub_header"] === "Body Wax" && saveService[service]["service_header"] === "Products" ) {
    if(refinedBodyWaxProductes != "") {
      saveService[service]["service_name"] = refinedBodyWaxProductes;
    }
  }
  if(saveService[service]["service_sub_header"] === "Mani Pedi" && saveService[service]["service_header"] === "Services" ) {
    if(refinedmaniPedi != "") {
      saveService[service]["service_name"] = refinedmaniPedi;
    }
  }
  if(saveService[service]["service_sub_header"] === "Mani Pedi" && saveService[service]["service_header"] === "Products" ) {
    if(refinedmaniPediProducts != "") {
      saveService[service]["service_name"] = refinedmaniPediProducts;
    }
  }
  if(saveService[service]["service_sub_header"] === "Facials" && saveService[service]["service_header"] === "Services" ) {
    if(refinedFacials != "") {
      saveService[service]["service_name"] = refinedFacials;
    }
  }
  if(saveService[service]["service_sub_header"] === "Facials" && saveService[service]["service_header"] === "Products" ) {
    if(refinedFacialsProducts != "") {
      saveService[service]["service_name"] = refinedFacialsProducts;
    }
  }
  if(saveService[service]["service_sub_header"] === "Body Treatment" && saveService[service]["service_header"] === "Services" ) {
    if(refinedBodyTreatment != "") {
      saveService[service]["service_name"] = refinedBodyTreatment;
    }
  }
  if(saveService[service]["service_sub_header"] === "Eyebrows" && saveService[service]["service_header"] === "Services" ) {
    if(refinedEyebrows != "") {
      saveService[service]["service_name"] = refinedEyebrows;
    }
  }
  if(saveService[service]["service_sub_header"] === "Eyebrows" && saveService[service]["service_header"] === "Products" ) {
    if(refinedEyebrowsProducts != "") {
      saveService[service]["service_name"] = refinedEyebrowsProducts;
    }
  }

});


  }

  if(registrationMode === "Barber" ) {
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

    $.each(saveService, function(service){
      if(saveService[service]["service_sub_header"] === "Hair Cutting" && saveService[service]["service_header"] === "Services" ) {
        if(refinedHairCutting != "") {
          saveService[service]["service_name"] = refinedHairCutting;
        }
      }
      if(saveService[service]["service_sub_header"] === "Wedding Styles" && saveService[service]["service_header"] === "Services" ) {
        if(refinedWeddingStyles != "") {
          saveService[service]["service_name"] = refinedWeddingStyles;
        }
      }
      if(saveService[service]["service_sub_header"] === "Barber Male Grooming" && saveService[service]["service_header"] === "Services" ) {
        if(refinedBarberMaleGrooming != "") {
          saveService[service]["service_name"] = refinedBarberMaleGrooming;
        }
      }
      if(saveService[service]["service_sub_header"] === "Barber Male Grooming" && saveService[service]["service_header"] === "Styling Products" ) {
        if(refinedbarberMaleGroomingProducts != "") {
          saveService[service]["service_name"] = refinedbarberMaleGroomingProducts;
        }
      }
      if(saveService[service]["service_sub_header"] === "Hair Color" && saveService[service]["service_header"] === "Services" ) {
        if(refinedHairColor != "") {
          saveService[service]["service_name"] = refinedHairColor;
        }
      }
      if(saveService[service]["service_sub_header"] === "Hair Color" && saveService[service]["service_header"] === "Brands" ) {
        if(refinedHairColorBrands != "") {
          saveService[service]["service_name"] = refinedHairColorBrands;
        }
      }
      if(saveService[service]["service_sub_header"] === "Chemical Treatments" && saveService[service]["service_header"] === "Services" ) {
        if(refinedChemicalTreatments != "") {
          saveService[service]["service_name"] = refinedChemicalTreatments;
        }
      }
      if(saveService[service]["service_sub_header"] === "Chemical Treatments" && saveService[service]["service_header"] === "Products" ) {
        if(refinedChemicalTreatmentsProducts != "") {
          saveService[service]["service_name"] = refinedChemicalTreatmentsProducts;
        }
      }
    });

  }

  
  console.log(stId, registrationMode, registrationEmail, firstName, lastName, mobile, age, profileImageId, resume, work, nvq2, nvq3, nvqAssesor,
    tradeTestVideo, utr, publicLiabilityImage, rate, language, address, postcode, imageId, saveService);

    $.ajax({

      type: 'post',
      url: webUrl + 'editfreelancer',
      data: {

        "_StId": stId,
        "_RegistrationMode": registrationMode,
        "_EmailId": registrationEmail,
        "_FirstName": firstName,
        "_LastName": lastName,
        "_MobileNumber" : mobile,
        "_Age": age,
        "_ProfileImageId": profileImageId,
        "_Resume": resume,
        "_NVQ_2": nvq2,
        "_NVQ_3": nvq3,
        "_NVQ_ASSESOR": nvqAssesor,
        "_Work": work,
        "_TradeTestVideoUrl": tradeTestVideo,
        "_UTR": utr,
        "_PublicLiabilityImageId": publicLiabilityImage,
        "_Rate": rate,
        "_Status": status,
        "_ptype": ptype,
        "_Languages": language,
        "_Address": address,
        "_PostCode": postcode,
        "_images": imageId,
        "services": saveService

      },
      success: function(response) {

        console.log(response);

        localStorage.removeItem(IMAGEID);
        localStorage.removeItem(PUBLICINSURANCEID);
        localStorage.removeItem(GALLERYID);

        if (response["_ReturnMessage"] === "Success") {

          $('.success-modal').modal('show');

      }

      }

    });

}