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
// function cancelAppointment(emailId, id, confirmedDate) {
//     console.log(emailId);
//     console.log(id);
//     console.log(selected);
//     let newselectedDate = new Date(confirmedDate);
//     newselectedDate.setDate(newselectedDate.getDate());
//     confirmedDate = newselectedDate.toJSON().slice(0,10);
//     var AppntDate = moment(newselectedDate).format('DD-MMM-YYYY');
//     console.log("Date :"+AppntDate);    

//     let ownerMessage = "THE FREELANCER HAS CANCELLED THE BOOKING FOR " + AppntDate;

//     $.ajax({
//         type: 'post',
//         url: webUrl + 'updateappointment',
//         data: {
//             "_AppointmentId" : id,
//             "_Status" : "cancel by Freelancer"
//         },
//         success: function(updateResponse) {

//             // console.log(updateResponse);
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
//     console.log(emailId);
//     console.log(id);
//     console.log(selected);
//     let newselectedDate = new Date(confirmedDate);
//     newselectedDate.setDate(newselectedDate.getDate());
//     confirmedDate = newselectedDate.toJSON().slice(0,10);

//     var AppntDate = moment(newselectedDate).format('DD-MMM-YYYY');
//     console.log("Date :"+AppntDate);    
//     let ownerMessage = "THE FREELANCER HAS ACCEPTED THE ON HOLD BOOKING FOR " + AppntDate;

//     $.ajax({
//         type: 'post',
//         url: webUrl + 'updateappointment',
//         data: {
//             "_AppointmentId" : id,
//             "_Status" : "on hold confirmed by freelancer"
//         },
//         success: function(updateResponse) {

//             // console.log(updateResponse);
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

    //Ajax call - getappointments
    $.ajax({
        type: 'post',
        url: '/getfreelancerBooking',
        data: {},
        success: function (response) {
            console.log(typeof (response));
            var client_name = '';
            var client_email = '';
            var client_mobile = '';
            var client_status = '';
            if (response && response.message && response.message.length === 0) {
                $(".appointment-row").append('<div class="col-12 text-center">You have no bookings!</div>');
            }
            else {

                $.each(response.appointments, function (i) {

                    if (response.appointments[i]["appointment_s"] != '' && response.appointments[i]["status"] !== "cancel"
                        && response.appointments[i]["status"] !== "CANCELLED"
                        && response.appointments[i]["status"] !== "CANCELLED by Salon Owner"
                        && response.appointments[i]["status"] !== "cancel by Freelancer"
                        && response.appointments[i]["status"] !== "CANCELLED due to Expired Time") {

                        let id = response.appointments[i]["id"];
                        let emailId = response.appointments[i]["_SalonEmail"];
                        let appDate = response.appointments[i]["_AppointmentDate"];
                        // refinedAvaliableDate(response.appointments[i]["availableDays"]);

                        if (response.appointments[i]["appointment_s"] != '') {
                            console.log(response.appointments[i]["appointment_s"])
                            $.each(response.appointments[i]["appointment_s"], function (j) {
                                if (response.appointments[i]["appointment_s"][j]['user_appointment'] != '') {
                                    freelancer_name = response.appointments[i]["appointment_s"][j]['user_appointment']['name'];
                                    freelancer_email = response.appointments[i]["appointment_s"][j]['user_appointment']['email'];
                                    freelancer_mobile = response.appointments[i]["appointment_s"][j]['user_appointment']['phone'];
                                    freelancer_status = response.appointments[i]['status'];
                                }
                            })


                        }

                        $(".appointment-row")
                            .append('<div class="col-4">' +
                                '<span class="date_' + i + '">' + '<a data-toggle="collapse" data-parent="#accordion" href="#collapse_' + i + '">' + '<p><strong>Date: </strong> ' +
                                response.appointments[i]["date"] + '&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i></p>' +
                                '</span>' + '</div>' + '</a>' +
                                '<div class="col-8 " id="details' + id + '">' +
                                '<span class="name_' + i + '" style="overflow-wrap: break-word;">' + '<p><strong>Salon Owner/Client: </strong>' +
                                freelancer_name + '</p>' +
                                '</span>' + '<div class="collapse" id="collapse_' + i + '">' +
                                '<span class="email_' + i + '" style="overflow-wrap: break-word;">' + '<p><strong>Email: </strong>' +
                                freelancer_email + '</p>' +
                                '</span>' +
                                '<span class="mobile_' + i + '">' + '<p><strong>Mobile: </strong>' +
                                freelancer_mobile + '</p>' +
                                '</span>' +
                                '<span class="status_' + i + '">' + '<p><strong>Status: </strong>' +
                                freelancer_status + '</p>' +
                                '</span>' + '<div id="show' + i + '">' +
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
                                '<div class=" text-center customBtn" onClick="cancelAppointment(\'' + emailId + '\' , ' + id + ',\'' + appDate + '\')">' + '<a>Cancel</a>' +
                                '</div>' + '</div>' + '</div>' +
                                '</div>');

                        if (response.appointments[i]["status"] === "Cancel" || response.appointments[i]["status"] === "CANCELLED" || response.appointments[i]["status"] === "CANCELLED by Salon Owner" || response.appointments[i]["status"] === "cancel by Freelancer") {

                            $("#show" + i).hide();
                            $("#details" + id).css("background-color", "#2222");

                        }

                        if (response.appointments[i]["status"] === "CONFIRMED by Salon Owner" || response.appointments[i]["status"] === "CONFIRMED" || response.appointments[i]["status"] === "Confirmed" || response.appointments[i]["status"] === "confirmed"
                            || response.appointments[i]["status"] === "on hold" || response.appointments[i]["status"] === "on hold confirmed by freelancer") {

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

                        if (response.appointments[i]["status"] === "CONFIRMED by Salon Owner") {

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
                            }
                        });

                    }


                });
            }


        }

    });
    //End of Ajax call



});