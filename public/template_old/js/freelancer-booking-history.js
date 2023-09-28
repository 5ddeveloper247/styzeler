let logInId = localStorage.getItem("loginstid");

var selected;

let today;
today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
//console.log(logInId);

function redirect() {
    window.location.href = "./freelancer-booking.html?e=success";
}

window.onload = function () {
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];;
    var date = new Date();

    // $(".month-of-year").text(months[date.getMonth()]); 
    // $(".year").text(date.getFullYear());
};



$(function () {

    //Ajax call - getappointments
    $.ajax({
        type: 'post',
        url: '/freelancerBookingHistory',
        data: {},
        success: function (response) {
            var freelancer_name = '';
            var freelancer_email = '';
            var freelancer_mobile = '';
            var freelancer_status = '';

            var client_name = '';
            if (response && response.message && response.message.length === 0) {
                $(".appointment-row").append('<div class="col-12 text-center">You have no bookings!</div>');
            } else {

                $.each(response.appointments, function (i) {


                    let id = response.appointments[i]["id"];

                    if (response.appointments[i]["appointment_s"] != null || response.appointments[i]["status"] === "cancel" ||
                        response.appointments[i]["status"] === "CANCELLED" ||
                        response.appointments[i]["status"] === "CANCELLED by Salon Owner" ||
                        response.appointments[i]["status"] === "cancel by Freelancer" ||
                        response.appointments[i]["status"] === "CANCELLED due to Expired Time") {
                        if (response.appointments[i]["appointment_s"] != null) {
                            if (response.appointments[i]["appointment_s"]['user_appointment'] != null) {
                                freelancer_name = response.appointments[i]["appointment_s"]['user_appointment']['name'];
                                freelancer_email = response.appointments[i]["appointment_s"]['user_appointment']['email'];
                                freelancer_mobile = response.appointments[i]["appointment_s"]['user_appointment']['phone'];
                                freelancer_status = response.appointments[i]["status"];

                                client_name = response.appointments[i]["user"]['name'];
                                client_email = response.appointments[i]["user"]['email'];
                                client_phone = response.appointments[i]["user"]['phone'];
                            }

                        }
                        $(".appointment-row")
                            .append('<div class="col-4">' +
                                '<div class="date_' + i + '">' + '<a data-toggle="collapse" data-parent="#accordion" href="#collapse_' + i + '">' + '<p><strong>Date: </strong> ' +
                                response.appointments[i]["date"] + '&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i></p>' +
                                '</div>' + '</div>' + '</a>' +
                                '<div class="col-8 " id="details' + id + '">' +
                                '<div class="name_' + i + '">' + '<p><strong>Freelancer Name: </strong> ' +
                                freelancer_name + '</p>' +
                                '</div>' + '<div class="collapse" id="collapse_' + i + '">' +
                                '<div class="name_' + i + '" style="overflow-wrap: break-word;">' + '<p><strong>Freelancer Email: </strong> ' +
                                freelancer_email + '</p>' +
                                '</div>' +
                                '<div class="name_' + i + '">' + '<p><strong>Freelancer Mobile: </strong> ' +
                                freelancer_mobile + '</p>' +
                                '</div>' +
                                '<div class="name_' + i + '" style="overflow-wrap: break-word;">' + '<p><strong>Customer Name: </strong> ' +
                                client_name + '</p>' +
                                '</div>' +
                                '<div class="email_' + i + '" style="overflow-wrap: break-word;">' + '<p><strong>Customer Email: </strong> ' +
                                client_email + '</p>' +
                                '</div>' +
                                '<div class="mobile_' + i + '">' + '<p><strong>Customer Mobile: </strong> ' +
                                client_phone + '</p>' +
                                '</div>' +
                                '<div class="status_' + i + '">' + '<p><strong>Booking Status: </strong> ' +
                                response.appointments[i]["status"] + '</p>' +
                                '</div>' +
                                '</div>' + '</div>' + '</div>');

                    }




                });

            }


        }

    });
    //End of Ajax call



});