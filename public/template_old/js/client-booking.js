let logInId = localStorage.getItem("loginstid");

var selected;
if (user_type == "client") {
    cancel_by = "Client";
}

let today;
today = new Date(
    new Date().getFullYear(),
    new Date().getMonth(),
    new Date().getDate()
);

function redirect() {
    window.location.href = "./freelancer-booking.html?e=success";
}
function convertTo12HourFormat(time24) {
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
//     });

//     return true;
// }

// function avaliableAppointment(emailId, id, confirmedDate) {

//     let newselectedDate = new Date(confirmedDate);
//     newselectedDate.setDate(newselectedDate.getDate());
//     confirmedDate = newselectedDate.toJSON().slice(0,10);

//     var AppntDate = moment(newselectedDate).format('DD-MMM-YYYY');
//     let ownerMessage = "THE FREELANCER HAS CONFIRMED THE BOOKING FOR " + AppntDate;

//     $.ajax({
//         type: 'post',
//         url: webUrl + 'updateappointment',
//         data: {
//             "_AppointmentId" : id,
//             "_Status" : "CONFIRMED"
//         },
//         success: function(updateResponse) {

//             // let emailIds= emailId + ",wearestyzeler@gmail.com";
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
// function cancelAppointment(emailId, id, confirmedDate) {

//     let newselectedDate = new Date(confirmedDate);
//     newselectedDate.setDate(newselectedDate.getDate());
//     confirmedDate = newselectedDate.toJSON().slice(0,10);
//     var AppntDate = moment(newselectedDate).format('DD-MMM-YYYY');

//     let ownerMessage = "THE FREELANCER HAS CANCELLED THE BOOKING FOR " + AppntDate;

//     $.ajax({
//         type: 'post',
//         url: webUrl + 'updateappointment',
//         data: {
//             "_AppointmentId" : id,
//             "_Status" : "cancel by Freelancer"
//         },
//         success: function(updateResponse) {

//             // let emailIds= emailId + ",wearestyzeler@gmail.com";
//             let adminEmail="styzelercharlie7@gmail.com";  //Updated by Rumki - wearestyzeler@gmail.com
//             let resp1 =  sendEmail(adminEmail,ownerMessage);
//             let resp =  sendEmail(emailId,ownerMessage);
//            if(resp){
//                $(".cancel-modal").modal('show');
//            }
//         }
//     });

// }

// //Ajax call - updateappointment- on hold
// function onHoldAppointment(emailId, id, confirmedDate) {

//     let newselectedDate = new Date(confirmedDate);
//     newselectedDate.setDate(newselectedDate.getDate());
//     confirmedDate = newselectedDate.toJSON().slice(0,10);

//     var AppntDate = moment(newselectedDate).format('DD-MMM-YYYY');
//     let ownerMessage = "THE FREELANCER HAS ACCEPTED THE ON HOLD BOOKING FOR " + AppntDate;

//     $.ajax({
//         type: 'post',
//         url: webUrl + 'updateappointment',
//         data: {
//             "_AppointmentId" : id,
//             "_Status" : "on hold confirmed by freelancer"
//         },
//         success: function(updateResponse) {

//             // let emailIds= emailId + ",wearestyzeler@gmail.com";
//             let adminEmail="styzelercharlie7@gmail.com";  //Updated by Rumki - wearestyzeler@gmail.com
//             let resp1 =  sendEmail(adminEmail,ownerMessage);
//             let resp =  sendEmail(emailId,ownerMessage);
//            if(resp){
//                $(".onCall-modal").modal('show');
//            }
//         }
//     });

// }

// //Ajax call - updateappointment- on hold
// function onCallAppointment(id) {

//     $.ajax({
//         type: 'post',
//         url: webUrl + 'updateappointment',
//         data: {
//             "_AppointmentId" : id,
//             "_Status" : "ON Call by Freelancer"
//         },
//         success: function(updateResponse) {

//             $(".onCall-modal").modal('show');
//         }
//     });

// }

// onCallAppointment
// function onCallAppointment(id) {

//     // $.ajax({
//     //     type: 'post',
//     //     url: webUrl + 'updateappointment',
//     //     data: {
//     //         "_AppointmentId" : id,
//     //         "_Status" : "on hold"
//     //     },
//     //     success: function(updateResponse) {

//     //         $(".onHold-modal").modal('show');
//     //     }
//     // });

//     $(".onCall-modal").modal('show');

// }

$(function () {
    getfreelancerBookings();
});
var cancel_btn = "";
function getfreelancerBookings() {
    console.log("first function");

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
                    if (response.appointments[i] != "") {
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

                        let freelancer_name =
                            response.appointments[i].freelancer_app_user.name +
                            " " +
                            response.appointments[i].freelancer_app_user
                                .surname;
                        let freelancer_category =
                            response.appointments[i].freelancer_app_user.type;
                        let freelancer_email =
                            response.appointments[i].freelancer_app_user.email;
                        let freelancer_phone =
                            response.appointments[i].freelancer_app_user.phone;
                        //  let bookStime = response.appointments[i]["bookingTimeSlots"]['start_time'];
                        //  let bookEtime = response.appointments[i]["bookingTimeSlots"]['end_time'];

                        owner_name =
                            response.appointments[i]["client_user"]["name"];
                        owner_email =
                            response.appointments[i]["client_user"]["email"];
                        owner_mobile =
                            response.appointments[i]["client_user"]["phone"];
                        owner_category =
                            response.appointments[i]["client_user"]["type"];

                        owner_status = response.appointments[i]["status"];

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
                                booking_time +
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
                                "<p><strong>Client Name: </strong>" +
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
                                "<p><strong>Client Email: </strong>" +
                                owner_email +
                                "</p>" +
                                "</span>" +
                                '<span class="mobile_' +
                                i +
                                '">' +
                                "<p><strong>Client Mobile: </strong>" +
                                owner_mobile +
                                "</p>" +
                                "</span>" +
                                '<span class="status_' +
                                i +
                                '">' +
                                "<p><strong>Booking Status: </strong>" +
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
                                '<div class="text-center customBtn ' +
                                cancel_btn +
                                '" id="cancelAppBtn_' +
                                id +
                                '" onClick="cancelAppointment(' +
                                id +
                                "," +
                                cancel_time +
                                ",'" +
                                cancel_by +
                                "')\">" +
                                "<a>Cancel</a>" +
                                "</div>" +
                                // '</div>' + '</div>' +
                                "</div>"
                        );
                        if (owner_status.includes("Cancelled by")) {
                            console.log("first", owner_status, cancel_btn);
                            // cancel_btn = "d-none";
                            $("#cancelAppBtn_" + id).addClass("d-none");
                        } else {
                            console.log("second", owner_status, cancel_btn);

                            // cancel_btn = "d-block";
                            $("#cancelAppBtn_" + id).addClass("d-block");
                        }
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
// function getfreelancerBookings() {
//     console.log("second function");

//     //Ajax call - getappointments
//     var cancel_btn = "";
//     $.ajax({
//         type: "post",
//         url: "/getfreelancerBooking",
//         data: {},
//         success: function (response) {
//             $(".appointment-row").empty();
//             if (response.appointments == "") {
//                 $(".appointment-row").append(
//                     '<div class="col-12 text-center">You have no bookings!</div>'
//                 );
//             } else {
//                 $.each(response.appointments, function (i) {
//                     if (response.appointments[i] != "") {
//                         let id = response.appointments[i]["id"];
//                         let emailId = response.appointments[i]["_SalonEmail"];

//                         let appDate =
//                             response.appointments[i]["_AppointmentDate"];
//                         let app_created_date =
//                             response.appointments[i]["created_at"];
//                         let booking_date =
//                             response.appointments[i]["booking_date"];
//                         let booking_time =
//                             response.appointments[i]["booking_time"];

//                         let freelancer_name =
//                             response.appointments[i].freelancer_app_user.name +
//                             " " +
//                             response.appointments[i].freelancer_app_user
//                                 .surname;
//                         let freelancer_category =
//                             response.appointments[i].freelancer_app_user.type;
//                         let freelancer_email =
//                             response.appointments[i].freelancer_app_user.email;
//                         let freelancer_phone =
//                             response.appointments[i].freelancer_app_user.phone;
//                         //  let bookStime = response.appointments[i]["bookingTimeSlots"]['start_time'];
//                         //  let bookEtime = response.appointments[i]["bookingTimeSlots"]['end_time'];

//                         owner_name =
//                             response.appointments[i]["client_user"]["name"];
//                         owner_email =
//                             response.appointments[i]["client_user"]["email"];
//                         owner_mobile =
//                             response.appointments[i]["client_user"]["phone"];
//                         owner_category =
//                             response.appointments[i]["client_user"]["type"];

//                         let app_created_date_dateOnly =
//                             app_created_date.split("T")[0];
//                         let app_created_date_booking_date =
//                             booking_date.split("T")[0];

//                         // refinedAvaliableDate(response.appointments[i]["availableDays"]);

//                         // if (response.appointments[i] != '') {

//                         //     $.each(response.appointments[i]["client"], function (j) {
//                         //         //     if (response.appointments[i]["appointment_s"][j]['user_appointment'] != '') {
//                         //         //

//                         //         //     }

//                         //     })

//                         // }

//                         $(".appointment-row").append(
//                             '<div class="col-4">' +
//                                 '<span class="date_' +
//                                 i +
//                                 '">' +
//                                 '<a data-toggle="collapse" data-parent="#accordion" href="#collapse_' +
//                                 i +
//                                 '">' +
//                                 "<p><strong>Date: </strong> " +
//                                 app_created_date_dateOnly +
//                                 '&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i></p>' +
//                                 "<p><strong>Book Date: </strong> " +
//                                 app_created_date_booking_date +
//                                 "&nbsp;&nbsp;</p>" +
//                                 "<p><strong>Book Time: </strong> " +
//                                 booking_time +
//                                 "</p>" +
//                                 "</span>" +
//                                 "</div>" +
//                                 "</a>" +
//                                 '<div class="col-8 " id="details' +
//                                 id +
//                                 '">' +
//                                 '<span class="name_' +
//                                 i +
//                                 '" style="overflow-wrap: break-word;">' +
//                                 "<p><strong>Client Name: </strong>" +
//                                 owner_name +
//                                 "</p>" +
//                                 '<span class="name_' +
//                                 i +
//                                 '" style="overflow-wrap: break-word;">' +
//                                 "<p><strong>Freelancer Name: </strong>" +
//                                 freelancer_name +
//                                 "</p>" +
//                                 '<span class="name_' +
//                                 i +
//                                 '" style="overflow-wrap: break-word;">' +
//                                 "<p><strong>Freelancer Category: </strong>" +
//                                 freelancer_category +
//                                 "</p>" +
//                                 "</span>" +
//                                 '<div class="collapse" id="collapse_' +
//                                 i +
//                                 '">' +
//                                 '<span class="name_' +
//                                 i +
//                                 '" style="overflow-wrap: break-word;">' +
//                                 "<p><strong>Freelancer Email: </strong>" +
//                                 freelancer_email +
//                                 "</p>" +
//                                 '<span class="name_' +
//                                 i +
//                                 '" style="overflow-wrap: break-word;">' +
//                                 "<p><strong>Freelancer Mobile: </strong>" +
//                                 freelancer_phone +
//                                 "</p>" +
//                                 '<span class="email_' +
//                                 i +
//                                 '" style="overflow-wrap: break-word;">' +
//                                 "<p><strong>Client Email: </strong>" +
//                                 owner_email +
//                                 "</p>" +
//                                 "</span>" +
//                                 '<span class="mobile_' +
//                                 i +
//                                 '">' +
//                                 "<p><strong>Client Mobile: </strong>" +
//                                 owner_mobile +
//                                 "</p>" +
//                                 "</span>" +
//                                 '<span class="status_' +
//                                 i +
//                                 '">' +
//                                 "<p><strong>Booking Status: </strong>" +
//                                 owner_status +
//                                 "</p>" +
//                                 "</span>" +
//                                 '<div id="show' +
//                                 i +
//                                 '">' +
//                                 // '<p id="show-dates'+i+'"><strong>Avaliable Dates: </strong>' +
//                                 //  '</p>' +
//                                 // '</span>' +
//                                 // '<p id="date-div'+i+'">Date: <input type="text" id="datepicker'+i+'" class="col-12 mt-2"></p>' +
//                                 // '<div class="text-center customBtn confirm_btn' + i + '" onClick="avaliableAppointment(\'' + emailId + '\' , ' + id + ',\'' + appDate + '\')">' + '<a>Confirm</a>' +
//                                 // '</div>' +
//                                 // '<div class=" text-center customBtn" onClick="onHoldAppointment('+id+')">' + '<a>On Hold</a>' +
//                                 // '</div>' +
//                                 // '<div class=" text-center customBtn onHold_btn' + i + '" onClick="onHoldAppointment(\'' + emailId + '\' , ' + id + ',\'' + appDate + '\')">' + '<a>Confirm On Hold</a>' +
//                                 // '</div>' +
//                                 '<div class="text-center customBtn ' +
//                                 cancel_btn +
//                                 '" id="cancelAppBtn_' +
//                                 id +
//                                 '" onClick="cancelAppointment(' +
//                                 id +
//                                 "," +
//                                 cancel_time +
//                                 ",'" +
//                                 cancel_by +
//                                 "')\">" +
//                                 "<a>Cancel</a>" +
//                                 "</div>" +
//                                 // '</div>' + '</div>' +
//                                 "</div>"
//                         );
//                         if (owner_status.includes("Cancelled by")) {
//                             console.log("first", owner_status, cancel_btn);
//                             // cancel_btn = "d-none";
//                             $("#cancelAppBtn_" + id).addClass("d-none");
//                         } else {
//                             console.log("second", owner_status, cancel_btn);

//                             // cancel_btn = "d-block";
//                             $("#cancelAppBtn_" + id).addClass("d-block");
//                         }
//                         if (
//                             response.appointments[i]["status"] === "Cancel" ||
//                             response.appointments[i]["status"] ===
//                                 "CANCELLED" ||
//                             response.appointments[i]["status"] ===
//                                 "CANCELLED by Salon Owner" ||
//                             response.appointments[i]["status"] ===
//                                 "cancel by Freelancer"
//                         ) {
//                             $("#show" + i).hide();
//                             $("#details" + id).css("background-color", "#2222");
//                         }

//                         if (
//                             response.appointments[i]["status"] ===
//                                 "CONFIRMED by Salon Owner" ||
//                             response.appointments[i]["status"] ===
//                                 "CONFIRMED" ||
//                             response.appointments[i]["status"] ===
//                                 "Confirmed" ||
//                             response.appointments[i]["status"] ===
//                                 "confirmed" ||
//                             response.appointments[i]["status"] === "on hold" ||
//                             response.appointments[i]["status"] ===
//                                 "on hold confirmed by freelancer"
//                         ) {
//                             $(".confirm_btn" + i).hide();
//                             $(".onHold_btn" + i).hide();
//                             // $("#datepicker"+i).hide();
//                             $("#date-div" + i).hide();
//                             $("#show-dates" + i).hide();
//                             // $("#show" + i).append('<div class="text-center customBtn" onClick="cancelAppointment(' + id + ')">' + '<a>Cancel</a>' +
//                             //     '</div>');
//                         }

//                         if (response.appointments[i]["status"] === "Booked") {
//                             $(".onHold_btn" + i).hide();
//                         }

//                         if (response.appointments[i]["status"] === "on hold") {
//                             $(".onHold_btn" + i).show();
//                         }

//                         if (
//                             response.appointments[i]["status"] ===
//                             "CONFIRMED by Salon Owner"
//                         ) {
//                             $(".confirm_btn" + i).show();
//                         }

//                         // $.each(response.appointments[i]["availableDays"], function(d) {

//                         //     $("#show-dates"+i).append("<br>"+response.appointments[i]["availableDays"][d]["freelancer_available_date"]+" ");

//                         // });

//                         //attempt 1
//                         $("#datepicker" + i).datepicker({
//                             dateFormat: "yy-mm-dd",
//                             minDate: today,
//                             onSelect: function () {
//                                 selected = $(this).val();
//                                 //refinedAvaliableDate(selected);
//                             },
//                         });
//                     }
//                 });
//             }
//         },
//     });
//     //End of Ajax call
// }
