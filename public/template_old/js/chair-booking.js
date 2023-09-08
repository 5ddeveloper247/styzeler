let logInId = localStorage.getItem(STID);
let emailId = localStorage.getItem(REGISTRATIONEMAIL);
let regMode = localStorage.getItem(REGISTRATIONMODE);

console.log(regMode);

let today;
today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());

window.onload = function () {
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];;
    var date = new Date();

    $(".month-of-year").text(months[date.getMonth()]);
    $(".year").text(date.getFullYear());
};

function redirect() {
    window.location.href = "./chair-booking.html?e=success";
}


//Ajax call - updateappointment- confirm
function confirmAppointment(id) {
    console.log(id);

    $.ajax({
        type: 'post',
        //url: webUrl + 'updateappointment',
        data: {
            "_AppointmentId": id,
            "_Status": "CONFIRMED"
        },
        success: function (updateResponse) {
            //window.location.href = "./salon-owner-booking.html?e=success";
            $(".confirm-modal").modal('show');
            console.log(updateResponse);
        }
    });

}

//Ajax call - updateappointment- on hold
function holdAppointment(id) {
    console.log(id);

    $.ajax({
        type: 'post',
        //url: webUrl + 'updateappointment',
        data: {
            "_AppointmentId": id,
            "_Status": "ON HOLD"
        },
        success: function (updateResponse) {
            //window.location.href = "./salon-owner-booking.html?e=success";
            $(".onHold-modal").modal('show');
            console.log(updateResponse);
        }
    });

}

//Ajax call - updateappointment- cancel
function cancelAppointment(id) {
    console.log(id);

    $.ajax({
        type: 'post',
        //url: webUrl + 'updateappointment',
        data: {
            "_AppointmentId": id,
            "_Status": "CANCELLED"
        },
        success: function (updateResponse) {
            //window.location.href = "./salon-owner-booking.html?e=success";
            $(".cancel-modal").modal('show');
            console.log(updateResponse);
        }
    });

}

$(function () {

    if( regMode === "Wedding Stylist" || regMode === "Hairstylist" || regMode === "Barber" || regMode === "Beautician") {
          
        //Ajax call - getappointments
        $.ajax({
            type: 'post',
            url: webUrl + 'getsalonchairbookingsv2',
            data: {
    
                "_FreelancerEmailId": emailId 
                //"_FreelancerEmailId": "testjhondoebeautician@gmail.com"
    
            },
            success: function (response) {
                console.log(response);
                //console.log("salon-owner-booking.js" + logInId);
    
                $.each(response.bookings, function (i) {
    
                    let id = response.bookings[i]["_SalonChairId"];
    
                    $(".chair_booking_row")
                        .append('<div class="col-4">' +
                            '<span class="date_' + i + '">' + '<p><strong>Date: </strong>' +
                            response.bookings[i]["_BookDate"] + '</p>' +
                            '</span>' + '</div>' +
                            '<div class="col-8 " id="details'+id+'">' +
                            '<span class="name_' + i + '">' + '<p><strong>Salon Name: </strong>' +
                            response.bookings[i]["_SalonName"] + '</p>' +
                            '</span>' +
                            '<span class="name_' + i + '">' + '<p><strong>Salon Phone: </strong>' +
                            response.bookings[i]["_SalonPhone"] + '</p>' +
                            '</span>' +
                            '<span class="name_' + i + '">' + '<p><strong>Applicant Name: </strong>' +
                            response.bookings[i]["_ApplicantName"] + '</p>' +
                            '</span>' +
                            '<span class="name_' + i + '">' + '<p><strong>Applicant Phone: </strong>' +
                            response.bookings[i]["_ApplicantPhone"] + '</p>' +
                            '</span>' +
                            '<span class="email_' + i + '">' + '<p><strong>Applicant Email: </strong>' +
                            response.bookings[i]["_ApplicantEmail"] + '</p>' +
                            '</span>' +
                            '<span class="mobile_' + i + '">' + '<p><strong>Booking Time: </strong>' +
                            response.bookings[i]["_BookTime"] + '</p>' +
                            '</span>' +
                            '<span class="status_' + i + '">' + '<p><strong>Booking Status: </strong>' +
                            response.bookings[i]["_Status"] + '</p>' +
                            '</span>' + '</div>');
    
                    if (response.bookings[i]["_Status"] === "cancel" || response.bookings[i]["_Status"] === "CANCELLED") {
    
                        $("#show" + i).hide();
                        $("#details"+id).css("background-color", "#2222");
    
                    }
    
    
                });
            }
    
        });
        //End of Ajax call
    
    
    } else {
        //Ajax call - getappointments
        $.ajax({
            type: 'post',
            url: webUrl + 'getsalonchairbookingsv2',
            data: {
    
                "_SalonEmailId": emailId
    
            },
            success: function (response) {
                console.log(response);

                $.each(response.bookings, function (i) {
    
                    let id = response.bookings[i]["_SalonChairId"];
    
                    $(".chair_booking_row")
                        .append('<div class="col-4">' +
                            '<span class="date_' + i + '">' + '<p><strong>Date: </strong>' +
                            response.bookings[i]["_BookDate"] + '</p>' +
                            '</span>' + '</div>' +
                            '<div class="col-8 " id="details'+id+'">' +
                            '<span class="name_' + i + '">' + '<p><strong>Salon Name: </strong>' +
                            response.bookings[i]["_SalonName"] + '</p>' +
                            '</span>' +
                            '<span class="name_' + i + '">' + '<p><strong>Salon Phone: </strong>' +
                            response.bookings[i]["_SalonPhone"] + '</p>' +
                            '</span>' +
                            '<span class="name_' + i + '">' + '<p><strong>Applicant Name: </strong>' +
                            response.bookings[i]["_ApplicantName"] + '</p>' +
                            '</span>' +
                            '<span class="name_' + i + '">' + '<p><strong>Applicant Phone: </strong>' +
                            response.bookings[i]["_ApplicantPhone"] + '</p>' +
                            '</span>' +
                            '<span class="email_' + i + '">' + '<p><strong>Applicant Email: </strong>' +
                            response.bookings[i]["_ApplicantEmail"] + '</p>' +
                            '</span>' +
                            '<span class="mobile_' + i + '">' + '<p><strong>Booking Time: </strong>' +
                            response.bookings[i]["_BookTime"] + '</p>' +
                            '</span>' +
                            '<span class="status_' + i + '">' + '<p><strong>Booking Status: </strong>' +
                            response.bookings[i]["_Status"] + '</p>' +
                            '</span>' + '<div id="show' + i + '">' +
                            '<div class="text-center customBtn" onClick="confirmAppointment(' + id + ')">' + '<a>Confirm</a>' +
                            '</div>' +
                            '<div class="text-center customBtn" onClick="holdAppointment(' + id + ')">' + '<a>On Hold</a>' +
                            '</div>' +
                            '<div class="text-center customBtn" onClick="cancelAppointment(' + id + ')">' + '<a>Cancel</a>' +
                            '</div>' +
                            '</div>' + '</div>');
    
                    if (response.bookings[i]["_Status"] === "cancel" || response.bookings[i]["_Status"] === "CANCELLED") {
    
                        $("#show" + i).hide();
                        $("#details"+id).css("background-color", "#2222");
    
                    }
    
    
                });
                
            }
    
        });
        //End of Ajax call
    
    }

});