// let logInId = localStorage.getItem("loginstid");

//Active a chair
function activeChair(chairId) {
    //Ajax call - Login
    $.ajax({
        type: 'post',
        url: webUrl + 'activatesalonspace',
        data: {
          "_SalonChairId": chairId,
       },
        success: function(response) {
          
          console.log(response);
          location.reload();

        }
      
    });
    //End of Ajax call
}

function inactiveChair(chairId) {
    //Ajax call - Login
    $.ajax({
        type: 'post',
        url: webUrl + 'inactivatesalonspace',
        data: {
          "_SalonChairId": chairId,
       },
        success: function(response) {
          
          console.log(response);
          location.reload();


        }
      
    });
    //End of Ajax call
}

$(function () {

    //Ajax call - getappointments
    $.ajax({
        type: 'post',
        url: webUrl + 'getsalonownerchairlisting',
        data: {

            "_SalonOwnerEmail": localStorage.getItem("loginemail")
            

        },
        success: function (response) {
            console.log(response);
            // console.log("booking-history.js" + logInId);
            
            if ( response.salonspaces.length === 0 ) {
                $(".chair_booking_row").append('<div class="col-12 text-center" >You have no bookings!</div>');
            } else {
                
                $.each(response.salonspaces, function (i) {

                let id = response.salonspaces[i]["_SalonChairId"];
                
                let status = response.salonspaces[i]["_IsActive"] === "0" ? "Inactive" : "Active";
                

                    $(".chair_booking_row")
                    .append('<div class="col-8">' +
                        '<div class="chair_listing_' + i + '">' + '<p><strong>Category: </strong> ' +
                        response.salonspaces[i]["_Category"] + '</p>' +
                        '</div>' + '</div>' +
                        '<div class="col-4 text-center " id="chair_'+i+'">' +
                            
                        '</div>'+
                        '</div>');
                        
                        if(  response.salonspaces[i]['_IsActive'] === "0" ) {
                            $("#chair_" + i ).append('<a onclick="activeChair(' + response.salonspaces[i]['_SalonChairId'] + ');" >Inactive</a>');
                        } else {
                            $("#chair_" + i ).append('<a onclick="inactiveChair(' + response.salonspaces[i]['_SalonChairId'] + ')">Active</a>');
        
                        }
                    
            
                        
                
            });
                
            }

           
        }

    });
    //End of Ajax call



});

