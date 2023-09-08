let logInId = localStorage.getItem("loginstid");
console.log("salon-owner-booking.js");

let today;
today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());

window.onload = function () {
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];;
    var date = new Date();

    // $(".month-of-year").text(months[date.getMonth()]);
    // $(".year").text(date.getFullYear());
};

function redirect() {
    window.location.href = "./salon-owner-booking.html?e=success";
}

//send mail
function sendEmail(emailId, msg) {
    
    console.log(emailId);
    
    let ownerMessage = msg;
    var settings = {
    "url": "./email.php",
    "method": "POST",
    "timeout": 0,
    "headers": {
        "Content-Type": "application/json"
    },
    "data": JSON.stringify({
        "_Email": emailId,
        "_Subject": "Styzeler Booking: Booking Status Updated ",
        "_Message": ownerMessage
    }),
    };

    $.ajax(settings).done(function (response) {
    console.log(response);
    });
    
    return true;
}

// cancel on hold appointment if 48hrs over
function checkTimeStatus(appDate,id) {
    
    console.log(appDate,id);
    
    let currentdate = new Date();
    currentdate.setDate(currentdate.getDate() + 2);
    let lastDate = currentdate.toJSON().slice(0,10);
    
    console.log("checkTimeStatus: " + lastDate);
    
    selectedDate = new Date(appDate);
    selectedDate.setDate(selectedDate.getDate());
    appDate = selectedDate.toJSON().slice(0,10);
    
    console.log(appDate, lastDate, lastDate >= appDate)
    
    if(lastDate >= appDate) {
        
        $.ajax({
            type: 'post',
            url: webUrl + 'updateappointment',
            data: {
                "_AppointmentId": id,
                "_Status": "CANCELLED by Salon Owner"
            },
            success: function (updateResponse) {
                //window.location.href = "./salon-owner-booking.html?e=success";
                $(".cancel-modal").modal('show');
                console.log(updateResponse);
            }
        });
    
  }
    
}

// hide cancel btn if thime exceeds

function hideCancelBtn(appDate,id) {
    
    console.log(appDate,id);
    
    let currentdate = new Date();
    currentdate.setDate(currentdate.getDate() + 1);
    let lastDate = currentdate.toJSON().slice(0,10);
    
    console.log("hideCancelBtn: " + lastDate);
    
    selectedDate = new Date(appDate);
    selectedDate.setDate(selectedDate.getDate());
    appDate = selectedDate.toJSON().slice(0,10);
    
    // console.log("currentdate-getTime: "+currentdate.getDate()());
    
    console.log(appDate, lastDate, lastDate >= appDate);
    
    if(lastDate >= appDate) {
        
        $("#cancelBtn"+id).hide();
    
  }
    
}


// function avaliableAppointment(id) {
//     console.log(id);
//     console.log(selected);

//     $.ajax({
//         type: 'post',
//         url: webUrl + 'updateappointment',
//         data: {
//             "_AppointmentId" : id,
//             "availableDays" : selected
//         },
//         success: function(updateResponse) {
//             $(".avaliable-modal").modal('show');
//             console.log(updateResponse);
//         } 
//     });

// }

//Ajax call - updateappointment- confirm
function confirmAppointment(emailId,id, confirmedDate) {
    
    console.log(emailId);
    console.log(id);
    console.log(confirmedDate);

    let newselectedDate = new Date(confirmedDate);
    newselectedDate.setDate(newselectedDate.getDate());
    confirmedDate = newselectedDate.toJSON().slice(0,10);

    console.log("Date cancel 2 :"+confirmedDate);
    var AppntDate = moment(newselectedDate).format('DD-MMM-YYYY');
    console.log("Date :"+AppntDate);    

    // let ownerMessage = "ON HOLD BOOKING HAS BEEN CONFIRMED FOR "+ confirmedDate;
    let ownerMessage = "SALON OWNER HAS CONFIRMED THE ON HOLD BOOKING FOR "+ AppntDate; //Updated by Rumki
    // _AppointmentDate
    // let avaliableDate = $('input[name="avaliable_date"]:checked').val();
    
    // if (typeof (avaliableDate) !== "undefined") {
    
        $.ajax({
        type: 'post',
        url: webUrl + 'updateappointment',
        data: {
            "_AppointmentId": id,
            // "_AppointmentDate": confirmedDate,
            "_Status": "CONFIRMED by Salon Owner"
        },
        success: function (updateResponse) {
            //window.location.href = "./salon-owner-booking.html?e=success";
            
            // console.log(updateResponse);
            // let emailIds= emailId + ",wearestyzeler@gmail.com";
            let adminEmail="styzelercharlie7@gmail.com";  //Updated by Rumki - wearestyzeler@gmail.com
            let resp1 =  sendEmail(adminEmail,ownerMessage);
            let resp =  sendEmail(emailId,ownerMessage);            
            if(resp) {
                $(".confirm-modal").modal('show');
            }
        }
    });

    
//   }
//   else {
      
//       $(".date-modal").modal('show');
//   }

    
}

//Ajax call - updateappointment- on hold
function holdAppointment(id) {
    console.log(id);

    $.ajax({
        type: 'post',
        url: webUrl + 'updateappointment',
        data: {
            "_AppointmentId": id,
            "_Status": "ON HOLD by Salon Owner"
        },
        success: function (updateResponse) {
            //window.location.href = "./salon-owner-booking.html?e=success";
            $(".onHold-modal").modal('show');
            console.log(updateResponse);
        }
    });

}

//Ajax call - updateappointment- cancel
function cancelAppointment(emailId,id,confirmedDate) {

    console.log(id);
    console.log(emailId);
    console.log("Date cancel :"+confirmedDate);

    let newselectedDate = new Date(confirmedDate);
    newselectedDate.setDate(newselectedDate.getDate());
    confirmedDate = newselectedDate.toJSON().slice(0,10);

    console.log("Date cancel 2 :"+confirmedDate);

    // let ownerMessage = "ON HOLD BOOKING HAS BEEN CANCELLED FOR "+confirmedDate;
    var AppntDate = moment(newselectedDate).format('DD-MMM-YYYY');
    console.log("Date :"+AppntDate);   
    let ownerMessage = "THE BOOKING HAS BEEN CANCELLED FOR "+AppntDate; //Updated by Rumki

    $.ajax({
        type: 'post',
        url: webUrl + 'updateappointment',
        data: {
            "_AppointmentId": id,
            "_Status": "CANCELLED by Salon Owner"
        },
        success: function (updateResponse) {
            //window.location.href = "./salon-owner-booking.html?e=success";
            
            // console.log(updateResponse);
            // let emailIds= emailId + ",wearestyzeler@gmail.com";
            let adminEmail="styzelercharlie7@gmail.com";  //Updated by Rumki - wearestyzeler@gmail.com
            let resp1 =  sendEmail(adminEmail,ownerMessage);
            let resp =  sendEmail(emailId,ownerMessage);              
            if(resp) {
                $(".cancel-modal").modal('show');
            }
        }
    });

}


$(function () {

    //Ajax call - getappointments
    $.ajax({
        type: 'post',
        url: webUrl + 'getappointments',
        data: {

            "_SalonOwnerStId": logInId

        },
        success: function (response) {
            console.log(response);
            console.log("salon-owner-booking.js" + logInId);
            
            if ( response.appointments.length === 0 ) {
                $(".appointment-row").append('<div class="col-12 text-center" >You have no bookings!</div>');
            } else {
                
                 $.each(response.appointments, function (i) {

                    if (response.appointments[i]["_Status"] !== "cancel" && response.appointments[i]["_Status"] !== "CANCELLED" && response.appointments[i]["_Status"] !== "CANCELLED by Salon Owner" && response.appointments[i]["_Status"] !== "cancel by Freelancer" && response.appointments[i]["_Status"] !== "CANCELLED due to Expired Time") 
                    {
                        let id = response.appointments[i]["_AppointmentId"];
                        let appDate = response.appointments[i]["_AppointmentDate"];
                        let emailId = response.appointments[i]["_FreelancerEmail"];
                        // console.log(appDate);
                            
                        $(".appointment-row")
                            .append('<div class="col-4">' +
                                '<div class="date_' + i + '">' + '<a data-toggle="collapse" data-parent="#accordion" href="#collapse_' + i + '">' + '<p><strong>Date: </strong> ' +
                                response.appointments[i]["_AppointmentDateDisplay"] + '&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i></p>' +
                                '</div>' + '</div>' + '</a>' +
                                '<div class="col-8 " id="details'+id+'">' +
                                '<div class="name_' + i + '">' + '<p><strong>Freelancer Name: </strong> ' +
                                response.appointments[i]["_FreelancerName"] + '</p>' +
                                '</div>'  + '<div class="collapse" id="collapse_' + i + '">' + 
                                '<div class="name_' + i + '" style="overflow-wrap: break-word;">' + '<p><strong>Freelancer Email: </strong> ' +
                                response.appointments[i]["_FreelancerEmail"] + '</p>' +
                                '</div>' +
                                '<div class="name_' + i + '">' + '<p><strong>Freelancer Mobile: </strong> ' +
                                response.appointments[i]["_FreelancerMobile"] + '</p>' +
                                '</div>' +
                                '<div class="name_' + i + '" style="overflow-wrap: break-word;">' + '<p><strong>Customer Name: </strong> ' +
                                response.appointments[i]["_SalonOwnerBusinessName"] + '</p>' +
                                '</div>' +
                                '<div class="email_' + i + '" style="overflow-wrap: break-word;">' + '<p><strong>Customer Email: </strong> ' +
                                response.appointments[i]["_SalonEmail"] + '</p>' +
                                '</div>' +
                                '<div class="mobile_' + i + '">' + '<p><strong>Customer Mobile: </strong> ' +
                                response.appointments[i]["_SalonMobile"] + '</p>' +
                                '</div>' +
                                '<div class="status_' + i + '">' + '<p><strong>Booking Status: </strong> ' +
                                response.appointments[i]["_Status"] + '</p>' +
                                '</div>' + '<div id="show' + i + '">' + '<p id="show-dates'+i+'"><strong>Avaliable Dates: </strong> ' +
                                '</p>' +
                                // '<div class="text-center customBtn confirm_btn" onClick="confirmAppointment(' + id + ')">' + '<a>Confirm</a>' +
                                // '</div>' +
                                // '<div class="text-center customBtn" onClick="holdAppointment(' + id + ')">' + '<a>On Hold</a>' +
                                // '</div>' +
                                '<div class="text-center customBtn " id="cancelBtn'+id+'" onClick="cancelAppointment(\''+emailId +'\' , ' + id + ',\''+ appDate +'\')">' + '<a>Cancel</a>' +
                                '</div>' +
                                '</div>' + '</div>');
                            
                                $("#show-dates"+i).hide();
                            
                                if (response.appointments[i]["_Status"] === "on hold confirmed by freelancer" || response.appointments[i]["_Status"] === "On Hold" ) {
                                
                                    $("#show"+i).append('<div class="text-center customBtn confirm_btn'+i+'" >' + '<a onclick="confirmAppointment(\''+emailId +'\' , ' + id + ',\''+ appDate +'\')">Confirm</a>' +
                                        '</div> </div>');
                                    // $("#show-dates"+i).hide();
                                    // $("#show" + i).append('<div class="text-center customBtn" onClick="cancelAppointment(' + id + ')">' + '<a>Cancel</a>' +
                                    //     '</div>');
                                    
                                    // check if time is over or not
                                    checkTimeStatus(appDate,id);
                                
                                }
                                
                        if(response.appointments[i]["availableDays"].length > 0) {
                            $("#show"+i).append('<div class="text-center customBtn confirm_btn'+i+'" onClick="confirmAppointment(' + id + ')">' + '<a>Confirm</a>' +
                                '</div> </div>');
                                
                                 if (response.appointments[i]["_Status"] === "CONFIRMED by Salon Owner" || response.appointments[i]["_Status"] === "CONFIRMED" || response.appointments[i]["_Status"] === "Confirmed" || response.appointments[i]["_Status"] === "confirmed") {
                                
                                    $(".confirm_btn"+i).hide();
                                    // $("#show-dates"+i).hide();
                                    // $("#show" + i).append('<div class="text-center customBtn" onClick="cancelAppointment(' + id + ')">' + '<a>Cancel</a>' +
                                    //     '</div>');
                                    // check if time is over or not
                                    hideCancelBtn(appDate,id);
                                
                                }
                        }   
                        
                        if (response.appointments[i]["_Status"] === "CONFIRMED" || response.appointments[i]["_Status"] === "Confirmed" || response.appointments[i]["_Status"] === "confirmed"  || response.appointments[i]["_Status"] === "Booked"  || response.appointments[i]["_Status"] === "booked") {
                                
                                    
                                    hideCancelBtn(appDate,id);
                                
                                }
                    
                        if (response.appointments[i]["_Status"] === "cancel" || response.appointments[i]["_Status"] === "CANCELLED" || response.appointments[i]["_Status"] === "CANCELLED by Salon Owner" || response.appointments[i]["_Status"] === "cancel by Freelancer") {
                        
                            $("#show" + i).hide();
                            $("#details"+id).css("background-color", "#2222");
                        
                        }
                        
                    
                    
                        $.each(response.appointments[i]["availableDays"], function (d) {
                        
                            $("#show-dates" + i).append("<br>" + '<div class="form-check form-check-inline"> '+
                                '<input class="form-check-input" type="radio" name="avaliable_date" value= "'+response.appointments[i]["availableDays"][d]["freelancer_available_date"]+'" > '+
                                '<label class="form-check-label" for="hairstylist">'+
                                  response.appointments[i]["availableDays"][d]["freelancer_available_date"]+
                                '</label>'+
                            '</div>');
                            
                            
                            // let age = $('input[name="stylist_age"]:checked').val();
                        
                        });
                    
                        $("#datepicker" + i).datepicker({
                            dateFormat: "yy-mm-dd",
                            minDate: today,
                            onSelect: function () {
                                selected = $(this).val();
                                //refinedAvaliableDate(selected);
                            }
                        });
                        
                    }
                    else {
                        console.log(response.appointments[i]);
                    }
                
            });
                
            }

           
        }

    });
    //End of Ajax call



});