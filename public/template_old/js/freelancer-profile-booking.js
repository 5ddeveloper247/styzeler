// For Profile Contents
let SELECTEDDATE = "selecteddate";

//Profile Id
let profileStId = localStorage.getItem("stid");

//Logged In stid
let logInStId = localStorage.getItem("loginstid");

let activeStatus = localStorage.getItem(ISACTIVE);
console.log(activeStatus);

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
        "_FreelancerStId": profileStId,
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
        "_FreelancerStId": profileStId,
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

  })
});


function redirectToPage() {
  // location.reload();
  window.location.href = "./freelancer-profile.html";

}

var loggedEmail;

let freelancerEmail ;

let message;    

function sendEmail() {
    
    console.log(loggedEmail);
    console.log(freelancerEmail); 
    console.log(message);    
    let date = localStorage.getItem(SELECTEDSTATUSDATE);
    console.log("localStorage Date: "+date);
    let newselectedDate = new Date(date);
    newselectedDate.setDate(newselectedDate.getDate());
    var AppntDate = moment(newselectedDate).format('DD-MMM-YYYY');
    console.log("New Appouintment Date :"+AppntDate);    
    let ownerMessage = "A new appointment have been scheduled between "+ loggedEmail +" and "+ freelancerEmail + " for "+AppntDate;
    var settings = {
    "url": "./email.php",
    "method": "POST",
    "timeout": 0,
    "headers": {
        "Content-Type": "application/json"
    },
    "data": JSON.stringify({
        "_Email": "styzelercharlie7@gmail.com",  //Updated by Rumki - wearestyzeler@gmail.com
        "_Subject": "Styzeler Agency: New Booking ",
        "_Message": ownerMessage
    }),
    };

    $.ajax(settings).done(function (response) {
    console.log(response);
    });
 
    
    settings = {
    "url": "./email.php",
    "method": "POST",
    "timeout": 0,
    "headers": {
        "Content-Type": "application/json"
    },
    "data": JSON.stringify({
        "_Email": loggedEmail,
        "_Subject": "Styzeler Agency: You've Booked a Freelancer",
        "_Message": message
    }),
    };

    $.ajax(settings).done(function (response) {
    console.log(response);
    });
    
    
    settings = {
    "url": "./email.php",
    "method": "POST",
    "timeout": 0,
    "headers": {
        "Content-Type": "application/json"
    },
    "data": JSON.stringify({
        "_Email": freelancerEmail,
        "_Subject": "Styzeler Agency: You've got a New Booking",
        "_Message": message
    }),
    };

    $.ajax(settings).done(function (response) {
    console.log(response);
    $(".all-modal").modal('show');
    });
}



//For current time
let dt = new Date();
let time = dt.getHours() + ":" + dt.getMinutes();

//console.log(time);

// for review
function submitReview() {

  let loggedStatus = localStorage.getItem(STID);
  let loggedMode = localStorage.getItem(REGISTRATIONMODE);
  let review = $("#owner-review").val();
  // let reviewLetters = /^[A-Za-z .,]+$/;
  if (typeof loggedStatus !== 'undefined' && loggedStatus !== null) {

    if (loggedMode === "Hairdressing Owner" || loggedMode === "Beauty Owner") {
        
        if (activeStatus == "1") {
            
            if (review != "") {
                // if (review.match(reviewLetters)) {}
                $.ajax({
                  type: 'post',
                  url: webUrl + 'givereviewlike',
                  data: {
                    "_SalonOwnerStId": logInStId,
                    "_FreelancerStId": profileStId,
                    "_IsLiked":"0",
                    "_Review": review
                  },
                  success: function(response) {
                    console.log(response);
                    if(response["_ReturnCode"] == 0) {    
                      $(".feedback-modal").modal('show');
                    }
                  }
                });
              } 
              else {
                $(".review-error-modal").modal('show');
              }
        }
        else {
                    $('.not-activate-salon-owner-modal').modal('show');
                  }
      
    } else {
      $('.not-salon-owner-modal').modal('show');
      }
  } else {
    $('.not-loggedin-modal').modal('show');
    }
  
}

// for only like
function submitLike() {

  let loggedStatus = localStorage.getItem(STID);
  let loggedMode = localStorage.getItem(REGISTRATIONMODE);

  if (typeof loggedStatus !== 'undefined' && loggedStatus !== null) {

    if (loggedMode === "Hairdressing Owner" || loggedMode === "Beauty Owner") {
        
        if (activeStatus == "1") {
            $.ajax({
                type: 'post',
                url: webUrl + 'givereviewlike',
                data: {
                  "_SalonOwnerStId": logInStId,
                  "_FreelancerStId": profileStId,
                  "_IsLiked":"1",
                  "_Review": ""
                },
                success: function(response) {
                  console.log(response);
                  if(response["_ReturnCode"] == 0) {    
                    $(".feedback-modal").modal('show');
                  }
                }
              });
        }
        else {
                    $('.not-activate-salon-owner-modal').modal('show');
                  }
      
    } else {
      $('.not-salon-owner-modal').modal('show');
      }
  } else {
    $('.not-loggedin-modal').modal('show');
    }
  
}




$(function () {

  $(".book-appointment").click(function (e) {
    e.preventDefault();
    
    var loggedStatus = localStorage.getItem(STID);
    
    var loggedMode = localStorage.getItem(REGISTRATIONMODE);
    
    loggedEmail = localStorage.getItem(REGISTRATIONEMAIL);
    // console.log(loggedEmail);

    let avaliableDate = localStorage.getItem(SELECTEDSTATUSDATE);
    
    freelancerEmail = localStorage.getItem(FREELANCEREMAIL);
    

    if (typeof loggedStatus !== 'undefined' && loggedStatus !== null) {
        
        if (loggedMode === "Hairdressing Owner" || loggedMode === "Beauty Owner") {
            
            if (activeStatus == "1") {
                
                        if (typeof (avaliableDate) !== "undefined") {
                      
                      message = "You have got a new booking from Styzeler agency on "+avaliableDate+". Please login to your account to check the details.";
                      
                    
                    $.ajax({
                      type: 'post',
                      url: webUrl + 'makeappointment',
                      data: {
                        "_SalonOwnerStId": logInStId,
                        "_FreelancerStId": profileStId,
                        "_Status": "Booked",
                        "_AppointmentDate": avaliableDate,
                        "_AppointmentTime": time,
                        "_AppointmentNote": "I need you urgently"
                    
                      },
                    
                      success: function (response) {
                        console.log(response);
                        //jquerry function for modal
                        console.log(response["_ReturnCode"]);
                                     
                        
                        if(response["_ReturnCode"] == 100) {
                            
                            $(".already-booked-modal").modal('show');
                        }
                        else {
                            
                            sendEmail();
                            // $(".all-modal").modal('show');
                        }
                        
                        
                      }
                    
                    });
               
                  }
                  
                        else {
                           $('.select-date-modal').modal('show');
                        }
            }
            
            //else part
            else {
                    $('.not-activate-salon-owner-modal').modal('show');
                  }
                
            }

            
         else {
            $('.not-salon-owner-modal').modal('show');
        }
        
        
    } else {

        $('.not-loggedin-modal').modal('show');
    }

    
  });


  $(".on-Hold").click(function (e) {
    e.preventDefault();
    
    var loggedStatus = localStorage.getItem(STID);
    
    var loggedMode = localStorage.getItem(REGISTRATIONMODE);

    let onHoldDate = localStorage.getItem(SELECTEDSTATUSDATE);
    //changin
    console.log(onHoldDate);
    
    loggedEmail = localStorage.getItem(REGISTRATIONEMAIL);
    
    freelancerEmail = localStorage.getItem(FREELANCEREMAIL);

    if (typeof loggedStatus !== 'undefined' && loggedStatus !== null) {

        if (loggedMode === "Hairdressing Owner" || loggedMode === "Beauty Owner") {
            
            if (activeStatus == "1") {
                
                if (typeof (onHoldDate) !== "undefined") {

                    message = "You have got a new On Hold booking from Styzeler agency on "+onHoldDate+". Please login to your account to check the details.";
                    //changing
                    console.log("onHold date"+onHoldDate);

                    $.ajax({
            
                      type: 'post',
                      url: webUrl + 'makeappointment',
                      data: {
                        "_SalonOwnerStId": logInStId,
                        "_FreelancerStId": profileStId,
                        "_Status": "on hold",
                        "_AppointmentDate": onHoldDate,
                        "_AppointmentTime": time,
                        "_AppointmentNote": "I need you urgently"
                
                      },
                
                      success: function (response) {
                        console.log(response);
                        
                        if(response["_ReturnCode"] == 100) {
                                
                                $(".already-booked-modal").modal('show');
                            }
                            else {
                                
                              sendEmail();
                              // $(".all-modal").modal('show');
                            }
                
                      }
            
                    });
        
                  }
        
                  else {
                    $('.select-date-modal').modal('show');
        
                  }
            }
            
            else {
                    $('.not-activate-salon-owner-modal').modal('show');
                  }

          
            
        } else {
            $('.not-salon-owner-modal').modal('show');
        }
    } else {

        $('.not-loggedin-modal').modal('show');
    }


 });

 $(".confirm-appointment").click(function (e) {
  e.preventDefault();
  
  var loggedStatus = localStorage.getItem(STID);
 
  var loggedMode = localStorage.getItem(REGISTRATIONMODE);

  if (typeof loggedStatus !== 'undefined' && loggedStatus !== null) {

    if (loggedMode === "Hairdressing Owner" || loggedMode === "Beauty Owner") {

        $.ajax({
    
        type: 'post',
        url: webUrl + 'makeappointment',
        data: {
          "_SalonOwnerStId": logInStId,
          "_FreelancerStId": profileStId,
          "_Status": "confirm",
          "_AppointmentDate": localStorage.getItem(SELECTEDDATE),
          "_AppointmentTime": time,
          "_AppointmentNote": "I need you urgently"
    
        },
    
        success: function (response) {
          console.log(response);
          if(response["_ReturnCode"] == 100) {
                    
                    $(".already-booked-modal").modal('show');
                }
                else {
                    
                    $(".all-modal").modal('show');
                }
    
        }
    
      });
      
    } else {
        $('.not-salon-owner-modal').modal('show');
    }
  } else {

        $('.not-loggedin-modal').modal('show');
    }


});



});