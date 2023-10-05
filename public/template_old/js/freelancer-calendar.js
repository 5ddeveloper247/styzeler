let SELECTEDSTATUSDATE = "selectedstatusdate";

var currentdate = new Date();
currentdate.setDate(currentdate.getDate() + 1);
var tomorrow = currentdate.toJSON().slice(0, 10);
var calHeight = 600;
var currentHour = currentdate.getHours();
var availableSelectDate = localStorage.getItem(SELECTEDSTATUSDATE);

// check eligibility for on call 
function optionBtns(selectedDate) {


  if (selectedDate === tomorrow) {
    $(".on-call").removeClass("customBtnNotSelected");
  }
  else {
    $(".on-call").addClass("customBtnNotSelected");
  }
}

//
var evezz = [];
// var timeSlots = [];
var today = today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
var endCalender = new Date(new Date().getFullYear(), (new Date().getMonth()) + 3, new Date().getDate());


jQuery(document).ready(function () {
  jQuery('.datetimepicker').datepicker({
    timepicker: true,
    language: 'en',
    range: true,
    dateFormat: 'dd-mm-yy'
  });

});

function convertTo12HourFormat(time24) {
  console.log(time24);
  // Split the time string into hours and minutes
  const [hours, minutes] = time24.split(':');

  // Determine if it's AM or PM
  const period = hours >= 12 ? 'PM' : 'AM';

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



(function () {
  "use strict";
  // ------------------------------------------------------- //
  // Calendar
  // ------------------------------------------------------ //

  // $("#options").hide();
  // $("#status").text("-");
  $(".appointment-status").hide();
  jQuery(function () {

    // page is ready
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
        // center: "month",
        right: "prev,next",
      },
      events: function (start, end, timezone, callback) {

        $.ajax({
          type: "post",
          url: '/showAppointmentDates',
          data: {},
          success: function (showResponse) {

            var events = [];
            var changeSlot = '';
            var html = '';
            $(".timeSlots").empty();
            var profileStatus = showResponse.userprofile['profile_type'];
            $.each(showResponse.data, function (i) {
              var status = showResponse.data[i]["status"];

              // Define a mapping of status values to titles
              var statusToTitle = {
                "Available": "Available",
                "Off": "Off",
                "On Call": "On Call"
                // Add more mappings as needed
              };

              var title = statusToTitle[status] || status; // Use the mapping or the status as the title
              events.push({
                title: title,
                color: "#000",
                textColor: "red",
                className: 'customClass',
                start: showResponse.data[i]["date"],
                end: showResponse.data[i]["date"],
                allDay: true,
              });

              var availableSelectDate = localStorage.getItem(SELECTEDSTATUSDATE);
              if (showResponse.data[i]["date"] === convert(availableSelectDate)) {

                $('.fc-title').html('');
                evezz.push({
                  //   title: 'B',
                  // color: "#0decfc",
                  // textColor: "#0decfc",
                  id: '123',
                  start: availableSelectDate,
                  end: availableSelectDate,
                  className: 'customClass',
                  icon: "circle",
                  allDay: true,
                });
                $("#calendar").fullCalendar('removeEvents', [123]);

                $("#calendar").fullCalendar("addEventSource", evezz);
                evezz = [];
                var status = showResponse.data[i]["status"];
                if (status == 'Off') {

                  changeSlot = 'customBtnNotSelected';
                  $(".available").removeClass("customBtnNotSelected");
                  $(".off").addClass("customBtnNotSelected");
                  $(".addTimeSlots").addClass('d-none');

                } else {
                  $(".available").addClass("customBtnNotSelected");
                  $(".off").removeClass("customBtnNotSelected");
                  $(".addTimeSlots").removeClass('d-none');

                }
                if (profileStatus == 'Freelancer') {
                  $(".addTimeSlots").addClass('d-none');
                }
                if (showResponse.data[i]["booking_time_slots"]) {
                  $.each(showResponse.data[i]["booking_time_slots"], function (j) {
                    var starttimeAMPM = convertTo12HourFormat(showResponse.data[i]["booking_time_slots"][j]['start_time']);
                    var endtimeAMPM = convertTo12HourFormat(showResponse.data[i]["booking_time_slots"][j]['end_time']);

                    html += `<div title="Edit Slot" class="` + changeSlot + ` option col-md-3 mr-2" onclick = changeSlotDate(` + showResponse.data[i]["booking_time_slots"][j]['id'] + `,'` + showResponse.data[i]["booking_time_slots"][j]['start_time'] + `','` + showResponse.data[i]["booking_time_slots"][j]['end_time'] + `')>` + starttimeAMPM + ` - ` + endtimeAMPM + `</div>`;

                  });
                }

                changeSlot = '';
              }

              $("#p_status").text(showResponse.data[i]["status"]);
              $("[data-date=" + showResponse.data[i]["date"] + "]").css("color", "#ffdb59");
            });
            $(".timeSlots").append(html);
            callback(events);
          }

        });

      },

      // eventColor: '#FF0000',

      validRange: {
        start: today,
        end: endCalender
      },

      dayClick: function (dateText) {

        function convert(dateText) {
          var date = new Date(dateText),
            mnth = ("0" + (date.getMonth() + 1)).slice(-2),
            day = ("0" + date.getDate()).slice(-2);
          return [date.getFullYear(), mnth, day].join("-");
        };
        //   alert(convert(dateText));

        localStorage.setItem(SELECTEDSTATUSDATE, convert(dateText));

        // $("#options").show();
        optionBtns(convert(dateText));
        let d = convert(dateText);
        console.log(d);
        evezz.push({
          //   title: 'B',
          // color: "#0decfc",
          // textColor: "#0decfc",
          id: '123',
          start: d,
          end: d,
          className: 'customClass',
          icon: "circle",
          allDay: true,
        });

        $("#calendar").fullCalendar('removeEvents', [123]);

        $("#calendar").fullCalendar("addEventSource", evezz);
        evezz = [];
        // var count = 0
        var html = '';
        //Check the status
        let found = false;
        var changeSlot = '';
        $(".appointment-status").hide();
        $(".timeSlots").empty();

        $.ajax({
          type: "post",
          url: '/showAppointmentDates',
          data: JSON.stringify({}),
          success: function (showResponse) {
            // console.log(showResponse)
            var profileStatus = showResponse.userprofile['profile_type'];
            $.each(showResponse.data, function (i) {
              if (showResponse.data[i]["date"] === convert(dateText)) {
                var status = showResponse.data[i]["status"];
                console.log(status);

                if (status == 'Off') {

                  changeSlot = 'customBtnNotSelected';
                  $(".addTimeSlots").addClass('d-none');

                }
                if (showResponse.data[i]["booking_time_slots"] != '') {


                  $.each(showResponse.data[i]["booking_time_slots"], function (j) {
                    var starttimeAMPM = convertTo12HourFormat(showResponse.data[i]["booking_time_slots"][j]['start_time']);
                    var endtimeAMPM = convertTo12HourFormat(showResponse.data[i]["booking_time_slots"][j]['end_time']);

                    html += `<div title="Edit Slot" class="` + changeSlot + ` option col-md-3 mr-2" onclick = changeSlotDate(` + showResponse.data[i]["booking_time_slots"][j]['id'] + `,'` + showResponse.data[i]["booking_time_slots"][j]['start_time'] + `','` + showResponse.data[i]["booking_time_slots"][j]['end_time'] + `')>` + starttimeAMPM + ` - ` + endtimeAMPM + `</div>`;
                    // count++
                  });
                  changeSlot = '';
                }

                $(".timeSlots").append(html);
                $("#p_status").text(showResponse.data[i]["status"]);
                $(".appointment-status").show();
                found = true;
                if (showResponse.data[i]["status"] === "Available"
                  // ||
                  // showResponse.data[i]["status"] === "On Call" ||
                  // showResponse.data[i]["status"] === "Off"
                ) {
                  if (profileStatus == 'Freelancer') {
                    $(".addTimeSlots").addClass('d-none');
                  } else {
                    $(".addTimeSlots").removeClass('d-none');

                  }

                  $(".available").addClass("customBtnNotSelected");
                  // $(".on-call").addClass("customBtnNotSelected");
                  $(".off").removeClass("customBtnNotSelected");
                  // $(".addTimeSlots").removeClass('d-none');
                  // $(".cancel").removeClass("customBtnNotSelected");
                } else {
                  $(".available").removeClass("customBtnNotSelected");
                  $(".off").addClass("customBtnNotSelected");
                  // $(".addTimeSlots").addClass('d-none');

                }

              }
              // else {
              //   $(".appointment-status").hide();
              // }

            });
            if (!found) {
              if (profileStatus == 'Freelancer') {
                $(".addTimeSlots").addClass('d-none');
              } else {
                $(".addTimeSlots").removeClass('d-none');

              }
              $("#p_status").text("-");
              // $(".cancel").addClass("customBtnNotSelected");
              $(".available").removeClass("customBtnNotSelected");
              $(".off").removeClass("customBtnNotSelected");
              if (d === tomorrow) {
                if (currentHour > 18) {
                  $(".on-call").removeClass("customBtnNotSelected");
                }

              }
            }

          },
        });

        // end of ajax call
      },
      eventRender: function (event, element) {
        if (event.icon) {
          element.find(".fc-title").prepend("<i class='fa fa-" + event.icon + "'></i>");
        }
      }

    });
  });
})(jQuery);