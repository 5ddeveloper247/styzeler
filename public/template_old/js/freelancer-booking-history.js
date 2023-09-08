let logInId = localStorage.getItem("loginstid");

var selected;

let today;
today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
//console.log(logInId);

function redirect() {
    window.location.href = "./freelancer-booking.html?e=success";
}

window.onload = function() {
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];;
    var date = new Date();

    // $(".month-of-year").text(months[date.getMonth()]); 
    // $(".year").text(date.getFullYear());
};



$(function () {

    //Ajax call - getappointments
    $.ajax({
        type: 'post',
        url: webUrl + 'getappointments',
        data: {

             "_FreelancerStId": logInId
         
        },
        success: function (response) {
            console.log(response);
            
            if ( response.appointments.length === 0 ) {
                $(".appointment-row").append('<div class="col-12 text-center" >You have no bookings!</div>');
            } else {
                
                $.each(response.appointments, function (i) {

                let id = response.appointments[i]["_AppointmentId"];
                
                if (response.appointments[i]["_Status"] === "cancel" || response.appointments[i]["_Status"] === "CANCELLED" || response.appointments[i]["_Status"] === "CANCELLED by Salon Owner" || response.appointments[i]["_Status"] === "cancel by Freelancer" || response.appointments[i]["_Status"] === "CANCELLED due to Expired Time") {
                    
                    $(".appointment-row")
                    .append('<div class="col-4">' +
                        '<div class="date_' + i + '">' + '<a data-toggle="collapse" data-parent="#accordion" href="#collapse_' + i + '">' + '<p><strong>Date: </strong> ' +
                        response.appointments[i]["_AppointmentDateDisplay"] + '&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i></p>' +
                        '</div>' + '</div>' + '</a>' + 
                        '<div class="col-8 " id="details'+id+'">' +
                        '<div class="name_' + i + '">' + '<p><strong>Freelancer Name: </strong> ' +
                        response.appointments[i]["_FreelancerName"] + '</p>' +
                        '</div>' + '<div class="collapse" id="collapse_' + i + '">' + 
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
                        '</div>' +
                        '</div>' + '</div>' + '</div>');
                    
                }

                
                        
                
            });
                
            }

            
        }

    });
    //End of Ajax call



});