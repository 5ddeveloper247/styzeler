let SELECTEDSTATUSDATE = "selectedstatusdate";
var status_for_hold = "";

var currentdate = new Date();
currentdate.setDate(currentdate.getDate() + 1);
var tomorrow = currentdate.toJSON().slice(0, 10);
var calHeight = 600;
var currentHour = currentdate.getHours();
var availableSelectDate = localStorage.getItem(SELECTEDSTATUSDATE);
localStorage.removeItem("selectedstatusdate");
var evezz = [];
var today = (today = new Date(
    new Date().getFullYear(),
    new Date().getMonth(),
    new Date().getDate()
));
var endCalender = new Date(
    new Date().getFullYear(),
    new Date().getMonth() + 6,
    new Date().getDate()
);

function optionBtns(selectedDate) {
    // if (selectedDate >= tomorrow) {
    //     $(".on-Hold").addClass("defaultStatus");
    // } else {
    //     $(".on-Hold").removeClass("defaultStatus");
    // }
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
function convert(dateText) {
    var date = new Date(dateText),
        mnth = ("0" + (date.getMonth() + 1)).slice(-2),
        day = ("0" + date.getDate()).slice(-2);
    return [date.getFullYear(), mnth, day].join("-");
}
jQuery(document).ready(function () {
    jQuery(".datetimepicker").datepicker({
        timepicker: true,
        language: "en",
        range: true,
        dateFormat: "dd-mm-yy",
    });
});

(function () {
    "use strict";
    // ------------------------------------------------------- //
    // Calendar
    // ------------------------------------------------------ //

    // $("#options").hide();
    // $("#status").text("-");
    $(".appointment-status").hide();
    jQuery(function () {
        // page is read
        jQuery("#calendar").fullCalendar({
            themeSystem: "bootstrap4",
            // emphasizes business hours
            //   businessHours: false,
            defaultView: "month",
            height: calHeight,
            contentHeight: calHeight,

            showNonCurrentDates: false,
            // event dragging & resizing
            //   editable: true,
            // header
            header: {
                left: "title",
                //   center: "month,agendaWeek,agendaDay",
                //   center: "month",
                right: "prev,next",
            },
            events: function (start, end, timezone, callback) {
                $.ajax({
                    type: "post",
                    url: "/showAppointmentDatesFreelancer",
                    data: {
                        id: userId,
                    },
                    success: function (showResponse) {
                        var events = [];
                        var changeSlot = "";
                        var html = "";
                        $(".timeSlots").empty();
                        var profileStatus =
                            showResponse.userprofile["profile_type"];
                        $.each(showResponse.data, function (i) {
                            var status = showResponse.data[i]["status"];

                            // Define a mapping of status values to titles
                            var statusToTitle = {
                                Available: "Available",
                                Off: "Off",
                                "On Call": "On Call",
                                // Add more mappings as needed
                            };

                            var title = statusToTitle[status] || status; // Use the mapping or the status as the title
                            events.push({
                                title: title,
                                color: "#000",
                                textColor: "red",
                                className: "customClass",
                                start: showResponse.data[i]["date"],
                                end: showResponse.data[i]["date"],
                                allDay: true,
                            });

                            if (
                                showResponse.data[i]["date"] ===
                                convert(availableSelectDate)
                            ) {
                                $(".fc-title").html("");
                                evezz.push({
                                    //   title: 'B',
                                    // color: "#0decfc",
                                    // textColor: "#0decfc",
                                    id: "123",
                                    start: availableSelectDate,
                                    end: availableSelectDate,
                                    className: "customClass",
                                    icon: "circle",
                                    allDay: true,
                                });
                                $("#calendar").fullCalendar("removeEvents", [
                                    123,
                                ]);

                                $("#calendar").fullCalendar(
                                    "addEventSource",
                                    evezz
                                );
                                evezz = [];
                                var status = showResponse.data[i]["status"];

                                if (status == "Off") {
                                    changeSlot = "customBtnNotSelected";
                                    $(".book-appointment").removeClass(
                                        "defaultStatus"
                                    );
                                    $(".on-Hold").removeClass("defaultStatus");
                                    $(".off").addClass("defaultStatus");
                                } else {
                                    $(".book-appointment").addClass(
                                        "defaultStatus"
                                    );
                                    $(".on-Hold").addClass("defaultStatus");
                                    $(".off").removeClass("defaultStatus");
                                }
                                if (profileStatus == "Freelancer") {
                                    $(".addTimeSlots").addClass("d-none");
                                }
                                if (
                                    showResponse.data[i][
                                        "booking_time_slots"
                                    ] &&
                                    profileStatus != "Freelancer"
                                ) {
                                    $.each(
                                        showResponse.data[i][
                                            "booking_time_slots"
                                        ],
                                        function (j) {
                                            console.log(showResponse.data);
                                            var starttimeAMPM =
                                                convertTo12HourFormat(
                                                    showResponse.data[i][
                                                        "booking_time_slots"
                                                    ][j]["start_time"]
                                                );

                                            if (
                                                showResponse.data[i][
                                                    "booking_time_slots"
                                                ][j]["end_time"] != ""
                                            ) {
                                                var endtimeAMPM =
                                                    convertTo12HourFormat(
                                                        showResponse.data[i][
                                                            "booking_time_slots"
                                                        ][j]["end_time"]
                                                    );
                                            } else {
                                                var endtimeAMPM = "";
                                            }

                                            var slots_time =
                                                showResponse.data[i][
                                                    "booking_time_slots"
                                                ][j]["slots_time"];
                                            var status1 =
                                                showResponse.data[i][
                                                    "booking_time_slots"
                                                ][j]["status"];

                                            if (status1 != null) {
                                                status_for_hold =
                                                    status1.toLowerCase();
                                            }

                                            if (
                                                status1 != "Available" ||
                                                !status_for_hold.includes(
                                                    "cancelled by"
                                                )
                                            ) {
                                                html +=
                                                    `<div title="" class="` +
                                                    changeSlot +
                                                    `  option col-md-2 mr-2 ${status1}" onclick = '' disabled><del>` +
                                                    starttimeAMPM +
                                                    ` - ` +
                                                    endtimeAMPM +
                                                    `</del></div>`;
                                            } else {
                                                if (
                                                    slots_time == "After_Nine"
                                                ) {
                                                    html +=
                                                        `<div title="Edit Slot" class="` +
                                                        changeSlot +
                                                        ` select_option option col-md-2 mr-2 ${status1}" onclick = selectSlot(` +
                                                        showResponse.data[i][
                                                            "booking_time_slots"
                                                        ][j]["id"] +
                                                        `,'` +
                                                        showResponse.data[i][
                                                            "booking_time_slots"
                                                        ][j]["start_time"] +
                                                        `','` +
                                                        showResponse.data[i][
                                                            "booking_time_slots"
                                                        ][j]["end_time"] +
                                                        `','` +
                                                        showResponse.data[i][
                                                            "date"
                                                        ] +
                                                        `')>After 9</div>`; //` + starttimeAMPM + ` -
                                                } else {
                                                    html +=
                                                        `<div title="Edit Slot" class="` +
                                                        changeSlot +
                                                        ` select_option option col-md-2 mr-2 ${status1}" onclick = selectSlot(` +
                                                        showResponse.data[i][
                                                            "booking_time_slots"
                                                        ][j]["id"] +
                                                        `,'` +
                                                        showResponse.data[i][
                                                            "booking_time_slots"
                                                        ][j]["start_time"] +
                                                        `','` +
                                                        showResponse.data[i][
                                                            "booking_time_slots"
                                                        ][j]["end_time"] +
                                                        `','` +
                                                        showResponse.data[i][
                                                            "date"
                                                        ] +
                                                        `')>` +
                                                        starttimeAMPM +
                                                        ` - ` +
                                                        endtimeAMPM +
                                                        `</div>`;
                                                }
                                            }

                                            //                    html += `<div title="Edit Slot" class="` + changeSlot + ` select_option option col-md-2 mr-2" onclick = changeSlotDate(` + showResponse.data[i]["booking_time_slots"][j]['id'] + `,'` + showResponse.data[i]["booking_time_slots"][j]['start_time'] + `','` + showResponse.data[i]["booking_time_slots"][j]['end_time'] + `')>` + starttimeAMPM + ` - ` + endtimeAMPM + `</div>`;
                                            // count++
                                        }
                                    );
                                    changeSlot = "";
                                }
                            }
                            if (status != "Off") {
                                $(".timeSlots").html(html);
                            } else {
                                $(".timeSlots").empty();
                            }
                            $("#p_status").text(showResponse.data[i]["status"]);
                            $(
                                "[data-date=" +
                                    showResponse.data[i]["date"] +
                                    "]"
                            ).css("color", "#ffdb59");
                        });

                        callback(events);
                    },
                });
            },

            // eventColor: '#FF0000',

            validRange: {
                start: today,
                end: endCalender,
            },

            dayClick: function (dateText) {
                function convert(dateText) {
                    var date = new Date(dateText),
                        mnth = ("0" + (date.getMonth() + 1)).slice(-2),
                        day = ("0" + date.getDate()).slice(-2);
                    return [date.getFullYear(), mnth, day].join("-");
                }

                // localStorage.setItem(SELECTEDSTATUSDATE, convert(dateText));
                optionBtns(convert(dateText));

                // $("#options").show();
                let d = convert(dateText);

                evezz.push({
                    //   title: 'B',
                    // color: "#0decfc",
                    // textColor: "#0decfc",
                    id: "123",
                    start: d,
                    end: d,
                    className: "customClass",
                    icon: "circle",
                    allDay: true,
                });

                $("#calendar").fullCalendar("removeEvents", [123]);

                $("#calendar").fullCalendar("addEventSource", evezz);
                evezz = [];
                var html = "";
                //Check the status
                let found = false;
                var changeSlot = "";
                $(".timeSlots").empty();
                $(".appointment-status").hide();

                $.ajax({
                    type: "post",
                    url: "/showAppointmentDatesFreelancer",
                    data: {
                        id: userId,
                    },
                    success: function (showResponse) {
                        var profileStatus =
                            showResponse.userprofile["profile_type"];
                        $.each(showResponse.data, function (i) {
                            if (
                                showResponse.data[i]["date"] ===
                                convert(dateText)
                            ) {
                                var status = showResponse.data[i]["status"];

                                if (status == "Off") {
                                    changeSlot = "defaultStatus";
                                    $(".addTimeSlots").addClass("d-none");
                                }

                                if (
                                    showResponse.data[i][
                                        "booking_time_slots"
                                    ] != ""
                                ) {
                                    $.each(
                                        showResponse.data[i][
                                            "booking_time_slots"
                                        ],
                                        function (j) {
                                            var starttimeAMPM =
                                                convertTo12HourFormat(
                                                    showResponse.data[i][
                                                        "booking_time_slots"
                                                    ][j]["start_time"]
                                                );
                                            if (
                                                showResponse.data[i][
                                                    "booking_time_slots"
                                                ][j]["end_time"] != null
                                            ) {
                                                var endtimeAMPM =
                                                    convertTo12HourFormat(
                                                        showResponse.data[i][
                                                            "booking_time_slots"
                                                        ][j]["end_time"]
                                                    );
                                            } else {
                                                var endtimeAMPM = "";
                                            }
                                            var slots_time =
                                                showResponse.data[i][
                                                    "booking_time_slots"
                                                ][j]["slots_time"];
                                            var status1 =
                                                showResponse.data[i][
                                                    "booking_time_slots"
                                                ][j]["status"];
                                            console.log(status1);
                                            if (status1 != null) {
                                                status_for_hold =
                                                    status1.toLowerCase();
                                            }
                                            // console.log(
                                            //     status1,
                                            //     status_for_hold
                                            // );
                                            if (
                                                status1 != "Available" &&
                                                !status_for_hold.includes(
                                                    "cancelled by"
                                                )
                                            ) {
                                                console.log(status_for_hold);
                                                html +=
                                                    `<div title="" class="` +
                                                    changeSlot +
                                                    ` option col-md-2 mr-2 ${status1}" onclick = '' disabled><del>` +
                                                    starttimeAMPM +
                                                    ` - ` +
                                                    endtimeAMPM +
                                                    `</del></div>`;
                                            } else {
                                                if (
                                                    slots_time == "After_Nine"
                                                ) {
                                                    html +=
                                                        `<div title="Edit Slot" class="` +
                                                        changeSlot +
                                                        ` select_option option col-md-2 mr-2 ${status1}" onclick = selectSlot(` +
                                                        showResponse.data[i][
                                                            "booking_time_slots"
                                                        ][j]["id"] +
                                                        `,'` +
                                                        showResponse.data[i][
                                                            "booking_time_slots"
                                                        ][j]["start_time"] +
                                                        `','` +
                                                        showResponse.data[i][
                                                            "booking_time_slots"
                                                        ][j]["end_time"] +
                                                        `','` +
                                                        showResponse.data[i][
                                                            "date"
                                                        ] +
                                                        `')>After 9</div>`; //` + starttimeAMPM + ` -
                                                } else {
                                                    html +=
                                                        `<div title="Edit Slot" class="` +
                                                        changeSlot +
                                                        ` select_option option col-md-2 mr-2 ${status1}" onclick = selectSlot(` +
                                                        showResponse.data[i][
                                                            "booking_time_slots"
                                                        ][j]["id"] +
                                                        `,'` +
                                                        showResponse.data[i][
                                                            "booking_time_slots"
                                                        ][j]["start_time"] +
                                                        `','` +
                                                        showResponse.data[i][
                                                            "booking_time_slots"
                                                        ][j]["end_time"] +
                                                        `','` +
                                                        showResponse.data[i][
                                                            "date"
                                                        ] +
                                                        `')>` +
                                                        starttimeAMPM +
                                                        ` - ` +
                                                        endtimeAMPM +
                                                        `</div>`;
                                                }
                                            }

                                            // count++
                                        }
                                    );
                                    changeSlot = "";
                                }
                                //  else {

                                //   $(".book-appointment").removeClass("defaultStatus");
                                // }

                                if (status != "Off") {
                                    $(".timeSlots").html(html);
                                } else {
                                    $(".timeSlots").empty();
                                }

                                $("#p_status").text(
                                    showResponse.data[i]["status"]
                                );
                                $(".appointment-status").show();
                                found = true;
                                $(".book-appointment").addClass(
                                    "defaultStatus"
                                );
                                $(".on-Hold").addClass("defaultStatus");
                            }
                            // else {
                            //   $(".appointment-status").hide();
                            // }
                        });
                        if (!found) {
                            $(".addTimeSlots").addClass("d-none");
                            $(".book-appointment").addClass("defaultStatus");
                            $(".on-Hold").addClass("defaultStatus");

                            $("#p_status").text("-");
                            $(".timeSlots").empty();

                            // $(".cancel").addClass("customBtnNotSelected");
                            $(".availbook-appointmentable").removeClass(
                                "defaultStatus"
                            );
                            // $(".off").removeClass("defaultStatus");
                            // if (d === tomorrow) {
                            //   if (currentHour > 18) {
                            //     $(".on-call").removeClass("defaultStatus");
                            //   }

                            // }
                        }
                    },
                });

                // end of ajax call
            },
            //end of dayClick

            eventRender: function (event, element) {
                if (event.icon) {
                    element
                        .find(".fc-title")
                        .prepend("<i class='fa fa-" + event.icon + "'></i>");
                }
            },
        });
    });
})(jQuery);
