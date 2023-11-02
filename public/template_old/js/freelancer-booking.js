let logInId = localStorage.getItem("loginstid");

var selected;
var on_hold_show = "";
var cancel_btn = "";

var confirm_by_owner = "confirm_by_owner";
var cancel_by_owner = "cancel_by_owner";
var confirm_booking = "confirm_booking";
var cancel_booking = "cancel_booking";
let today;
today = new Date(
    new Date().getFullYear(),
    new Date().getMonth(),
    new Date().getDate()
);
//console.log(logInId);

function redirect() {
    window.location.href = "./freelancer-booking.html?e=success";
}
function convertTo12HourFormat(time24) {
    console.log(time24);
    // Split the time string into hours and minutes
    const [hours, minutes] = time24.split(":");

    // Determine if it's AM or PM
    const period = hours >= 12 ? "PM" : "AM";

    // Convert hours to 12-hour format
    const hours12 = hours % 12 || 12;

    // Create the 12-hour time string
    const time12 = `${hours12}:${minutes} ${period}`;

    return time12;
}

window.onload = function () {
    var months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];
    var date = new Date();

    // $(".month-of-year").text(months[date.getMonth()]);
    // $(".year").text(date.getFullYear());
};

// function sendEmail(emailId, msg) {

//     console.log(emailId);
//     console.log(msg);
//     let ownerMessage = msg;
//     var settings = {
//     "url": "./email.php",
//     "method": "POST",
//     "timeout": 0,
//     "headers": {
//         "Content-Type": "application/json"
//     },
//     "data": JSON.stringify({
//         "_Email": emailId,
//         "_Subject": "Styzeler Booking: Booking Status Updated ",
//         "_Message": ownerMessage
//     }),
//     };

//     $.ajax(settings).done(function (response) {
//     console.log(response);
//     });

//     return true;
// }

// function avaliableAppointment(emailId, id, confirmedDate) {
//     console.log(emailId);
//     console.log(id);
//     console.log(selected);
//     let newselectedDate = new Date(confirmedDate);
//     newselectedDate.setDate(newselectedDate.getDate());
//     confirmedDate = newselectedDate.toJSON().slice(0,10);

//     var AppntDate = moment(newselectedDate).format('DD-MMM-YYYY');
//     console.log("Date :"+AppntDate);
//     let ownerMessage = "THE FREELANCER HAS CONFIRMED THE BOOKING FOR " + AppntDate;

//     $.ajax({
//         type: 'post',
//         url: webUrl + 'updateappointment',
//         data: {
//             "_AppointmentId" : id,
//             "_Status" : "CONFIRMED"
//         },
//         success: function(updateResponse) {

//             console.log(updateResponse);
//             // let emailIds= emailId + ",wearestyzeler@gmail.com";
//             //console.log(emailIds);
//            let adminEmail="styzelercharlie7@gmail.com";  //Updated by Rumki - wearestyzeler@gmail.com
//            let resp1 =  sendEmail(adminEmail,ownerMessage);
//            let resp =  sendEmail(emailId,ownerMessage);
//            if(resp){
//                $(".avaliable-modal").modal('show');
//            }
//         }
//     });

// }

// //Ajax call - updateappointment- cancel
// function cancelAppointment(id) {
//     console.log(id);

//     var status = "Cancelled by ";
//     var app_id;
//     var data = new FormData();

//     if (profile_type == "Freelancer") {
//         status = status + profile_type;
//     }
//     data.append("app_id", id);
//     data.append("status", status);
//     $.ajax({
//         type: "POST",
//         url: "/cancelOnHoldBooking",
//         data: data,
//         processData: false,
//         contentType: false,
//         success: function (response) {
//             let adminEmail = "styzelercharlie7@gmail.com"; //Updated by Rumki - wearestyzeler@gmail.com
//             let resp1 = sendEmail(adminEmail, ownerMessage);
//             let resp = sendEmail(emailId, ownerMessage);
//             if (resp) {
//                 $(".onCall-modal").modal("show");
//             }
//         },
//     });
// }

// //Ajax call - updateappointment- on hold
// function onHoldAppointment(id) {
//     var status = "Confirmed by ";
//     var data = new FormData();

//     if (profile_type == "Freelancer") {
//         status = status + profile_type;
//     }
//     data.append("app_id", id);
//     data.append("status", status);
//     $.ajax({
//         type: "POST",
//         url: "/confirmOnHoldBooking",
//         data: data,
//         processData: false,
//         contentType: false,
//         success: function (response) {
//             toastr.success(response.message, "", {
//                 timeOut: 3000,
//             });
//         },
//     });
// }
function cancelonHoldAppointment(id, btn, option = "") {
    var status;
    if (btn == "confirm_booking") {
        status = "Confirmed by ";
    } else if (btn == "cancel_booking") {
        status = "Cancelled by ";
    } else if (btn == "confirm_by_owner") {
        status = "On Hold Confirmed";
    }
    var data = new FormData();

    if (profile_type == "Freelancer") {
        status = status + profile_type;
    } else if (option != "") {
        status = status + "Business Owner";
    }
    data.append("app_id", id);
    data.append("status", status);
    $.ajax({
        type: "POST",
        url: "/onHoldBooking",
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response.data);
            $(".confirm-modal").modal("hide");
            $("#confirm_form").find("#booking_id").val("");
            $(".btn_" + response.data).addClass("d-none");
            $("#cancelAppBtn").removeClass("d-none");
            toastr.success(response.message, "", {
                timeOut: 3000,
            });
        },
    });
}
function openConfirmModal(id, btn, option = "") {
    $(".confirm-modal").modal("show");
    var form = $("#confirm_form");
    form.find("#booking_id").val(id);
    console.log(btn, option);
    if (
        (btn == "confirm_booking" && option == "") ||
        (btn == "confirm_by_owner" && option == "")
    ) {
        form.find("#confirm_or_cancel").text("Confirm");
        form.find("#confirm_cancel_btn").text("Yes, Confirm");
        form.find("#confirm_cancel_btn").attr(
            "onclick",
            "cancelonHoldAppointment(" + id + "," + btn + ")"
        );
    } else if (btn == "cancel_booking") {
        form.find("#confirm_or_cancel").text("Cancel");
        form.find("#confirm_cancel_btn").text("Yes, Cancel");
        if (option == "cancel_by_owner") {
            form.find("#confirm_cancel_btn").attr(
                "onclick",
                "cancelonHoldAppointment(" + id + "," + btn + "," + option + ")"
            );
        } else {
            form.find("#confirm_cancel_btn").attr(
                "onclick",
                "cancelonHoldAppointment(" + id + "," + btn + ")"
            );
        }
    }
}

// //Ajax call - updateappointment- on hold
// function onCallAppointment(id) {
//     console.log(id);

//     $.ajax({
//         type: 'post',
//         url: webUrl + 'updateappointment',
//         data: {
//             "_AppointmentId" : id,
//             "_Status" : "ON Call by Freelancer"
//         },
//         success: function(updateResponse) {

//             $(".onCall-modal").modal('show');
//             console.log(updateResponse);
//         }
//     });

// }

// onCallAppointment
// function onCallAppointment(id) {
//     console.log(id);

//     // $.ajax({
//     //     type: 'post',
//     //     url: webUrl + 'updateappointment',
//     //     data: {
//     //         "_AppointmentId" : id,
//     //         "_Status" : "on hold"
//     //     },
//     //     success: function(updateResponse) {

//     //         $(".onHold-modal").modal('show');
//     //         console.log(updateResponse);
//     //     }
//     // });

//     $(".onCall-modal").modal('show');
//             // console.log(updateResponse);

// }

$(function () {
    function getfreelancerBooking() {
        //Ajax call - getappointments
        $.ajax({
            type: "post",
            url: "/getfreelancerBooking",
            data: {},
            success: function (response) {
                if (response.appointments == "") {
                    $(".appointment-row").append(
                        '<div class="col-12 text-center">You have no bookings!</div>'
                    );
                } else {
                    console.log(response.appointments);
                    $.each(response.appointments, function (i) {
                        if (
                            response.appointments[i] != ""
                            //     && response.appointments[i]['user_booking_slots']['bookings']['status'] !== "cancel"
                            //     && response.appointments[i]['user_booking_slots']['bookings']['status'] !== "CANCELLED"
                            //     && response.appointments[i]['user_booking_slots']['bookings']['status'] !== "CANCELLED by Salon Owner"
                            //     && response.appointments[i]['user_booking_slots']['bookings']['status'] !== "cancel by Freelancer"
                            //     && response.appointments[i]['user_booking_slots']['bookings']['status'] !== "CANCELLED due to Expired Time"
                        ) {
                            let id = response.appointments[i]["id"];
                            var status;
                            if (
                                response.appointments[i].user_booking_slots !=
                                null
                            ) {
                                status =
                                    response.appointments[i].user_booking_slots
                                        .status;
                            } else {
                                status = "Booked";
                            }

                            // console.log(status);
                            let emailId =
                                response.appointments[i]["_SalonEmail"];

                            let appDate =
                                response.appointments[i]["_AppointmentDate"];
                            let app_created_date =
                                response.appointments[i]["created_at"];
                            let booking_date =
                                response.appointments[i]["booking_date"];
                            let booking_time =
                                response.appointments[i]["booking_time"];

                            if (
                                response.appointments[i].freelancer_user ==
                                undefined
                            ) {
                                freelancer_name =
                                    response.appointments[i].freelancer_app_user
                                        .name +
                                    " " +
                                    response.appointments[i].freelancer_app_user
                                        .surname;
                                freelancer_category =
                                    response.appointments[i].freelancer_app_user
                                        .type;
                                freelancer_email =
                                    response.appointments[i].freelancer_app_user
                                        .email;
                                freelancer_phone =
                                    response.appointments[i].freelancer_app_user
                                        .phone;
                            } else {
                                freelancer_name =
                                    response.appointments[i].freelancer_user
                                        .name +
                                    " " +
                                    response.appointments[i].freelancer_user
                                        .surname;
                                freelancer_category =
                                    response.appointments[i].freelancer_user
                                        .type;
                                freelancer_email =
                                    response.appointments[i].freelancer_user
                                        .email;
                                freelancer_phone =
                                    response.appointments[i].freelancer_user
                                        .phone;
                            }

                            //  let bookStime = response.appointments[i]["bookingTimeSlots"]['start_time'];
                            //  let bookEtime = response.appointments[i]["bookingTimeSlots"]['end_time'];
                            if (
                                response.appointments[i]["client_app_user"] !=
                                undefined
                            ) {
                                owner_name =
                                    response.appointments[i]["client_app_user"][
                                        "name"
                                    ];
                                owner_email =
                                    response.appointments[i]["client_app_user"][
                                        "email"
                                    ];
                                owner_mobile =
                                    response.appointments[i]["client_app_user"][
                                        "phone"
                                    ];
                                owner_category =
                                    response.appointments[i]["client_app_user"][
                                        "type"
                                    ];
                            } else {
                                owner_name =
                                    response.appointments[i]["client_user"][
                                        "name"
                                    ];
                                owner_email =
                                    response.appointments[i]["client_user"][
                                        "email"
                                    ];
                                owner_mobile =
                                    response.appointments[i]["client_user"][
                                        "phone"
                                    ];
                                owner_category =
                                    response.appointments[i]["client_user"][
                                        "type"
                                    ];
                            }

                            owner_status = status;
                            var check_status = owner_status.toLowerCase();
                            slot_time =
                                response.appointments[i]["booking_time"];
                            // slot_end_time = convertTo12HourFormat(response.appointments[i].user_booking_slots.end_time);
                            let app_created_date_dateOnly =
                                app_created_date.split("T")[0];
                            let app_created_date_booking_date =
                                booking_date.split("T")[0];
                            let cancel_time = booking_time.split(":")[0];

                            // refinedAvaliableDate(response.appointments[i]["availableDays"]);

                            // if (response.appointments[i] != '') {

                            //     $.each(response.appointments[i]["client"], function (j) {
                            //         //     if (response.appointments[i]["appointment_s"][j]['user_appointment'] != '') {
                            //         //

                            //         //     }

                            //     })

                            // }
                            // var on_hold_show;
                            // if (
                            //     user_type == "hairdressingSalon" ||
                            //     user_type == "beautySalon"
                            // ) {
                            //     on_hold_show =
                            //         '<div class="text-center customBtn mb-2" onClick="onHoldAppointment(' +
                            //         id +
                            //         ')"><a>On Hold</a></div>';
                            // } else
                            if (
                                profile_type == "Freelancer" &&
                                check_status.includes("on hold by")
                            ) {
                                on_hold_show =
                                    '<div class="text-center customBtn mb-2 btn_' +
                                    id +
                                    '" onClick="openConfirmModal(' +
                                    id +
                                    "," +
                                    confirm_booking +
                                    ')"><a>Confirm On Hold</a></div><div div class="text-center customBtn mb-2 btn_' +
                                    id +
                                    '" onClick="openConfirmModal(' +
                                    id +
                                    "," +
                                    cancel_booking +
                                    ')"><a>Cancel</a></div>';
                                cancel_btn = "d-none";
                            } else if (
                                (profile_type == "Freelancer" &&
                                    check_status.includes("confirmed by")) ||
                                check_status.includes("cancelled by") ||
                                check_status.includes("on hold confirmed")
                            ) {
                                on_hold_show = "";
                            } else if (
                                (user_type == "hairdressingSalon" ||
                                    user_type == "beautySalon") &&
                                check_status.includes("on hold by")
                            ) {
                                on_hold_show =
                                    '<div div class="text-center customBtn mb-2 btn_' +
                                    id +
                                    '" onClick="openConfirmModal(' +
                                    id +
                                    "," +
                                    cancel_booking +
                                    "," +
                                    cancel_by_owner +
                                    ')"><a>Cancel On Hold</a></div>';
                                cancel_btn = "d-none";
                            } else if (
                                (user_type == "hairdressingSalon" ||
                                    user_type == "hairdressingSalon") &&
                                check_status.includes("confirmed by")
                            ) {
                                on_hold_show =
                                    '<div class="text-center customBtn mb-2 btn_' +
                                    id +
                                    '" onClick="openConfirmModal(' +
                                    id +
                                    "," +
                                    confirm_by_owner +
                                    ')"><a>Confirm</a></div><div div class="text-center customBtn mb-2 btn_' +
                                    id +
                                    '" onClick="openConfirmModal(' +
                                    id +
                                    "," +
                                    cancel_booking +
                                    ')"><a>Cancel</a></div>';
                                cancel_btn = "d-none";
                            }

                            $(".appointment-row").append(
                                '<div class="col-4">' +
                                    '<span class="date_' +
                                    i +
                                    '">' +
                                    '<a data-toggle="collapse" data-parent="#accordion" href="#collapse_' +
                                    i +
                                    '">' +
                                    "<p><strong>Date: </strong> " +
                                    app_created_date_dateOnly +
                                    '&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i></p>' +
                                    "<p><strong>Book Date: </strong> " +
                                    app_created_date_booking_date +
                                    "&nbsp;&nbsp;</p>" +
                                    "<p><strong>Book Time: </strong> " +
                                    slot_time +
                                    "</p>" +
                                    "</span>" +
                                    "</div>" +
                                    "</a>" +
                                    '<div class="col-8 " id="details' +
                                    id +
                                    '">' +
                                    '<span class="name_' +
                                    i +
                                    '" style="overflow-wrap: break-word;">' +
                                    "<p><strong>Business Owner Name: </strong>" +
                                    owner_name +
                                    "</p>" +
                                    '<span class="name_' +
                                    i +
                                    '" style="overflow-wrap: break-word;">' +
                                    "<p><strong>Freelancer Name: </strong>" +
                                    freelancer_name +
                                    "</p>" +
                                    '<span class="name_' +
                                    i +
                                    '" style="overflow-wrap: break-word;">' +
                                    "<p><strong>Freelancer Category: </strong>" +
                                    freelancer_category +
                                    "</p>" +
                                    "</span>" +
                                    '<div class="collapse" id="collapse_' +
                                    i +
                                    '">' +
                                    '<span class="name_' +
                                    i +
                                    '" style="overflow-wrap: break-word;">' +
                                    "<p><strong>Freelancer Email: </strong>" +
                                    freelancer_email +
                                    "</p>" +
                                    '<span class="name_' +
                                    i +
                                    '" style="overflow-wrap: break-word;">' +
                                    "<p><strong>Freelancer Mobile: </strong>" +
                                    freelancer_phone +
                                    "</p>" +
                                    '<span class="email_' +
                                    i +
                                    '" style="overflow-wrap: break-word;">' +
                                    "<p><strong>Business Owner Email: </strong>" +
                                    owner_email +
                                    "</p>" +
                                    "</span>" +
                                    '<span class="mobile_' +
                                    i +
                                    '">' +
                                    "<p><strong>Business Owner Mobile: </strong>" +
                                    owner_mobile +
                                    "</p>" +
                                    "</span>" +
                                    '<span class="status_' +
                                    i +
                                    '">' +
                                    "<p><strong>Status: </strong>" +
                                    owner_status +
                                    "</p>" +
                                    "</span>" +
                                    '<div id="show' +
                                    i +
                                    '">' +
                                    // '<p id="show-dates'+i+'"><strong>Avaliable Dates: </strong>' +
                                    //  '</p>' +
                                    // '</span>' +
                                    // '<p id="date-div'+i+'">Date: <input type="text" id="datepicker'+i+'" class="col-12 mt-2"></p>' +
                                    // '<div class="text-center customBtn confirm_btn' + i + '" onClick="avaliableAppointment(\'' + emailId + '\' , ' + id + ',\'' + appDate + '\')">' + '<a>Confirm</a>' +
                                    // '</div>' +
                                    on_hold_show +
                                    // '<div class=" text-center customBtn onHold_btn' + i + '" onClick="onHoldAppointment(\'' + emailId + '\' , ' + id + ',\'' + appDate + '\')">' + '<a>Confirm On Hold</a>' +
                                    // '</div>' +
                                    // '</div>' + '</div>' +
                                    '<div class="text-center customBtn ' +
                                    cancel_btn +
                                    '" id="cancelAppBtn" onClick="cancelAppointment(' +
                                    id +
                                    "," +
                                    cancel_time +
                                    ')">' +
                                    "<a>Cancel</a>" +
                                    "</div>" +
                                    "</div>"
                            );

                            if (
                                response.appointments[i]["status"] ===
                                    "Cancel" ||
                                response.appointments[i]["status"] ===
                                    "CANCELLED" ||
                                response.appointments[i]["status"] ===
                                    "CANCELLED by Salon Owner" ||
                                response.appointments[i]["status"] ===
                                    "cancel by Freelancer"
                            ) {
                                $("#show" + i).hide();
                                $("#details" + id).css(
                                    "background-color",
                                    "#2222"
                                );
                            }

                            if (
                                response.appointments[i]["status"] ===
                                    "CONFIRMED by Salon Owner" ||
                                response.appointments[i]["status"] ===
                                    "CONFIRMED" ||
                                response.appointments[i]["status"] ===
                                    "Confirmed" ||
                                response.appointments[i]["status"] ===
                                    "confirmed" ||
                                response.appointments[i]["status"] ===
                                    "on hold" ||
                                response.appointments[i]["status"] ===
                                    "on hold confirmed by freelancer"
                            ) {
                                $(".confirm_btn" + i).hide();
                                $(".onHold_btn" + i).hide();
                                // $("#datepicker"+i).hide();
                                $("#date-div" + i).hide();
                                $("#show-dates" + i).hide();
                                // $("#show" + i).append('<div class="text-center customBtn" onClick="cancelAppointment(' + id + ')">' + '<a>Cancel</a>' +
                                //     '</div>');
                            }

                            if (
                                response.appointments[i]["status"] === "Booked"
                            ) {
                                $(".onHold_btn" + i).hide();
                            }

                            if (
                                response.appointments[i]["status"] === "on hold"
                            ) {
                                $(".onHold_btn" + i).show();
                            }

                            if (
                                response.appointments[i]["status"] ===
                                "CONFIRMED by Salon Owner"
                            ) {
                                $(".confirm_btn" + i).show();
                            }

                            // $.each(response.appointments[i]["availableDays"], function(d) {

                            //     $("#show-dates"+i).append("<br>"+response.appointments[i]["availableDays"][d]["freelancer_available_date"]+" ");

                            // });

                            //attempt 1
                            $("#datepicker" + i).datepicker({
                                dateFormat: "yy-mm-dd",
                                minDate: today,
                                onSelect: function () {
                                    selected = $(this).val();
                                    //refinedAvaliableDate(selected);
                                },
                            });
                        }
                    });
                }
            },
        });
        //End of Ajax call
    }

    getfreelancerBooking();
});

function getfreelancerBookings() {
    //Ajax call - getappointments
    $.ajax({
        type: "post",
        url: "/getfreelancerBooking",
        data: {},
        success: function (response) {
            $(".appointment-row").empty();
            if (response.appointments == "") {
                $(".appointment-row").append(
                    '<div class="col-12 text-center">You have no bookings!</div>'
                );
            } else {
                $.each(response.appointments, function (i) {
                    if (
                        response.appointments[i] != ""
                        //     && response.appointments[i]['user_booking_slots']['bookings']['status'] !== "cancel"
                        //     && response.appointments[i]['user_booking_slots']['bookings']['status'] !== "CANCELLED"
                        //     && response.appointments[i]['user_booking_slots']['bookings']['status'] !== "CANCELLED by Salon Owner"
                        //     && response.appointments[i]['user_booking_slots']['bookings']['status'] !== "cancel by Freelancer"
                        //     && response.appointments[i]['user_booking_slots']['bookings']['status'] !== "CANCELLED due to Expired Time"
                    ) {
                        let id = response.appointments[i]["id"];
                        let emailId = response.appointments[i]["_SalonEmail"];

                        let appDate =
                            response.appointments[i]["_AppointmentDate"];
                        let app_created_date =
                            response.appointments[i]["created_at"];
                        let booking_date =
                            response.appointments[i]["booking_date"];
                        let booking_time =
                            response.appointments[i]["booking_time"];

                        if (
                            response.appointments[i].freelancer_user ==
                            undefined
                        ) {
                            freelancer_name =
                                response.appointments[i].freelancer_app_user
                                    .name +
                                " " +
                                response.appointments[i].freelancer_app_user
                                    .surname;
                            freelancer_category =
                                response.appointments[i].freelancer_app_user
                                    .type;
                            freelancer_email =
                                response.appointments[i].freelancer_app_user
                                    .email;
                            freelancer_phone =
                                response.appointments[i].freelancer_app_user
                                    .phone;
                        } else {
                            freelancer_name =
                                response.appointments[i].freelancer_user.name +
                                " " +
                                response.appointments[i].freelancer_user
                                    .surname;
                            freelancer_category =
                                response.appointments[i].freelancer_user.type;
                            freelancer_email =
                                response.appointments[i].freelancer_user.email;
                            freelancer_phone =
                                response.appointments[i].freelancer_user.phone;
                        }

                        //  let bookStime = response.appointments[i]["bookingTimeSlots"]['start_time'];
                        //  let bookEtime = response.appointments[i]["bookingTimeSlots"]['end_time'];
                        if (
                            response.appointments[i]["client_app_user"] !=
                            undefined
                        ) {
                            owner_name =
                                response.appointments[i]["client_app_user"][
                                    "name"
                                ];
                            owner_email =
                                response.appointments[i]["client_app_user"][
                                    "email"
                                ];
                            owner_mobile =
                                response.appointments[i]["client_app_user"][
                                    "phone"
                                ];
                            owner_category =
                                response.appointments[i]["client_app_user"][
                                    "type"
                                ];
                        } else {
                            owner_name =
                                response.appointments[i]["client_user"]["name"];
                            owner_email =
                                response.appointments[i]["client_user"][
                                    "email"
                                ];
                            owner_mobile =
                                response.appointments[i]["client_user"][
                                    "phone"
                                ];
                            owner_category =
                                response.appointments[i]["client_user"]["type"];
                        }

                        owner_status = "Booked";

                        slot_time = response.appointments[i]["booking_time"];
                        // slot_end_time = convertTo12HourFormat(response.appointments[i].user_booking_slots.end_time);
                        let app_created_date_dateOnly =
                            app_created_date.split("T")[0];
                        let app_created_date_booking_date =
                            booking_date.split("T")[0];

                        // refinedAvaliableDate(response.appointments[i]["availableDays"]);

                        // if (response.appointments[i] != '') {

                        //     $.each(response.appointments[i]["client"], function (j) {
                        //         //     if (response.appointments[i]["appointment_s"][j]['user_appointment'] != '') {
                        //         //

                        //         //     }

                        //     })

                        // }

                        $(".appointment-row").append(
                            '<div class="col-4">' +
                                '<span class="date_' +
                                i +
                                '">' +
                                '<a data-toggle="collapse" data-parent="#accordion" href="#collapse_' +
                                i +
                                '">' +
                                "<p><strong>Date: </strong> " +
                                app_created_date_dateOnly +
                                '&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i></p>' +
                                "<p><strong>Book Date: </strong> " +
                                app_created_date_booking_date +
                                "&nbsp;&nbsp;</p>" +
                                "<p><strong>Book Time: </strong> " +
                                slot_time +
                                "</p>" +
                                "</span>" +
                                "</div>" +
                                "</a>" +
                                '<div class="col-8 " id="details' +
                                id +
                                '">' +
                                '<span class="name_' +
                                i +
                                '" style="overflow-wrap: break-word;">' +
                                "<p><strong>Business Owner Name: </strong>" +
                                owner_name +
                                "</p>" +
                                '<span class="name_' +
                                i +
                                '" style="overflow-wrap: break-word;">' +
                                "<p><strong>Freelancer Name: </strong>" +
                                freelancer_name +
                                "</p>" +
                                '<span class="name_' +
                                i +
                                '" style="overflow-wrap: break-word;">' +
                                "<p><strong>Freelancer Category: </strong>" +
                                freelancer_category +
                                "</p>" +
                                "</span>" +
                                '<div class="collapse" id="collapse_' +
                                i +
                                '">' +
                                '<span class="name_' +
                                i +
                                '" style="overflow-wrap: break-word;">' +
                                "<p><strong>Freelancer Email: </strong>" +
                                freelancer_email +
                                "</p>" +
                                '<span class="name_' +
                                i +
                                '" style="overflow-wrap: break-word;">' +
                                "<p><strong>Freelancer Mobile: </strong>" +
                                freelancer_phone +
                                "</p>" +
                                '<span class="email_' +
                                i +
                                '" style="overflow-wrap: break-word;">' +
                                "<p><strong>Business Owner Email: </strong>" +
                                owner_email +
                                "</p>" +
                                "</span>" +
                                '<span class="mobile_' +
                                i +
                                '">' +
                                "<p><strong>Business Owner Mobile: </strong>" +
                                owner_mobile +
                                "</p>" +
                                "</span>" +
                                '<span class="status_' +
                                i +
                                '">' +
                                "<p><strong>Status: </strong>" +
                                owner_status +
                                "</p>" +
                                "</span>" +
                                '<div id="show' +
                                i +
                                '">' +
                                // '<p id="show-dates'+i+'"><strong>Avaliable Dates: </strong>' +
                                //  '</p>' +
                                // '</span>' +
                                // '<p id="date-div'+i+'">Date: <input type="text" id="datepicker'+i+'" class="col-12 mt-2"></p>' +
                                // '<div class="text-center customBtn confirm_btn' + i + '" onClick="avaliableAppointment(\'' + emailId + '\' , ' + id + ',\'' + appDate + '\')">' + '<a>Confirm</a>' +
                                // '</div>' +
                                // '<div class=" text-center customBtn" onClick="onHoldAppointment('+id+')">' + '<a>On Hold</a>' +
                                // '</div>' +
                                // '<div class=" text-center customBtn onHold_btn' + i + '" onClick="onHoldAppointment(\'' + emailId + '\' , ' + id + ',\'' + appDate + '\')">' + '<a>Confirm On Hold</a>' +
                                // '</div>' +
                                '<div class=" text-center customBtn" onClick="cancelAppointment(' +
                                id +
                                ')">' +
                                "<a>Cancel</a>" +
                                "</div>" +
                                // '</div>' + '</div>' +
                                "</div>"
                        );

                        if (
                            response.appointments[i]["status"] === "Cancel" ||
                            response.appointments[i]["status"] ===
                                "CANCELLED" ||
                            response.appointments[i]["status"] ===
                                "CANCELLED by Salon Owner" ||
                            response.appointments[i]["status"] ===
                                "cancel by Freelancer"
                        ) {
                            $("#show" + i).hide();
                            $("#details" + id).css("background-color", "#2222");
                        }

                        if (
                            response.appointments[i]["status"] ===
                                "CONFIRMED by Salon Owner" ||
                            response.appointments[i]["status"] ===
                                "CONFIRMED" ||
                            response.appointments[i]["status"] ===
                                "Confirmed" ||
                            response.appointments[i]["status"] ===
                                "confirmed" ||
                            response.appointments[i]["status"] === "on hold" ||
                            response.appointments[i]["status"] ===
                                "on hold confirmed by freelancer"
                        ) {
                            $(".confirm_btn" + i).hide();
                            $(".onHold_btn" + i).hide();
                            // $("#datepicker"+i).hide();
                            $("#date-div" + i).hide();
                            $("#show-dates" + i).hide();
                            // $("#show" + i).append('<div class="text-center customBtn" onClick="cancelAppointment(' + id + ')">' + '<a>Cancel</a>' +
                            //     '</div>');
                        }

                        if (response.appointments[i]["status"] === "Booked") {
                            $(".onHold_btn" + i).hide();
                        }

                        if (response.appointments[i]["status"] === "on hold") {
                            $(".onHold_btn" + i).show();
                        }

                        if (
                            response.appointments[i]["status"] ===
                            "CONFIRMED by Salon Owner"
                        ) {
                            $(".confirm_btn" + i).show();
                        }

                        // $.each(response.appointments[i]["availableDays"], function(d) {

                        //     $("#show-dates"+i).append("<br>"+response.appointments[i]["availableDays"][d]["freelancer_available_date"]+" ");

                        // });

                        //attempt 1
                        $("#datepicker" + i).datepicker({
                            dateFormat: "yy-mm-dd",
                            minDate: today,
                            onSelect: function () {
                                selected = $(this).val();
                                //refinedAvaliableDate(selected);
                            },
                        });
                    }
                });
            }
        },
    });
    //End of Ajax call
}
