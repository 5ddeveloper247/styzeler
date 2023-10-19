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
var slots_times = [];
// var timeSlots = [];
var today = today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
var endCalender = new Date(new Date().getFullYear(), (new Date().getMonth()) + 6, new Date().getDate());


jQuery(document).ready(function () {
  jQuery('.datetimepicker').datepicker({
    timepicker: true,
    language: 'en',
    range: true,
    dateFormat: 'dd-mm-yy'
  });

});

function convertTo12HourFormat(time24) {
  // console.log(time24);
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
function removeDuplicates(data) {
  return data.filter((value, index) => data.indexOf(value) === index);
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
            var slot_time_html = ``;

            $(".timeSlots").empty();
            $(".total_time_slots").empty();
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
                  $(".addTimeSlots, .addTimeSlotstxt").addClass('d-none');

                } else {
                  $(".available").addClass("customBtnNotSelected");
                  $(".off").removeClass("customBtnNotSelected");
                  $(".addTimeSlots, .addTimeSlotstxt").removeClass('d-none');

                }
                if (profileStatus == 'Freelancer') {
                  $(".addTimeSlots, .addTimeSlotstxt").addClass('d-none');
                }
                if (showResponse.data[i]["booking_time_slots"]) {
                  $.each(showResponse.data[i]["booking_time_slots"], function (j) {
                    var starttimeAMPM = convertTo12HourFormat(showResponse.data[i]["booking_time_slots"][j]['start_time']);

                    if (showResponse.data[i]["booking_time_slots"][j]['end_time'] != null) {
                      var endtimeAMPM = convertTo12HourFormat(showResponse.data[i]["booking_time_slots"][j]['end_time']);
                    } else {
                      var endtimeAMPM = '';
                    }

                    var slots_time = showResponse.data[i]["booking_time_slots"][j]['slots_time'];
                    var status = showResponse.data[i]["booking_time_slots"][j]['status'];

                    if (status == 'booked') {
                      html += `<div title="" class="` + changeSlot + ` option col-md-2 mr-2 ${status}" ><del>` + starttimeAMPM + ` - ` + endtimeAMPM + `</del></div >`;
                      slots_times.push(showResponse.data[i]["booking_time_slots"][j]['slots_time']);
                      $("#after_nine_slot").attr("disabled", true);

                    } else {

                      $("#after_nine_slot").attr("disabled", false);

                      if (slots_time == 'After_Nine') {
                        html += `<div title="" class="` + changeSlot + ` option col-md-2 mr-2 ${status}")>After 9</div>`;//` + starttimeAMPM + ` - 
                        slots_times.push(showResponse.data[i]["booking_time_slots"][j]['slots_time']);
                        $("#after_nine_slot").attr("disabled", false);


                      } else {
                        $("#after_nine_slot").attr("disabled", false);

                        html += `<div title="" class="` + changeSlot + ` option col-md-2 mr-2 ${status}">` + starttimeAMPM + ` - ` + endtimeAMPM + `</div>`;
                        slots_times.push(showResponse.data[i]["booking_time_slots"][j]['slots_time']);
                      }
                    }

                  });
                }

                changeSlot = '';
              }
              $(".appointment-status").show();

              $("#p_status").text(showResponse.data[i]["status"]);
              $("[data-date=" + showResponse.data[i]["date"] + "]").css("color", "#ffdb59");
            });

            var filtered_times = removeDuplicates(slots_times);
            if (slots_times != '') {
              $.each(filtered_times, function (k) {

                if (filtered_times[k] != "After_Nine") {

                  if (filtered_times[k] != "After_Nine") {

                    let time_after_nine_1 = filtered_times[k].slice(-2);
                    let time_after_nine_2 = filtered_times[k].slice(-2);

                    var time_after_nine1 = filtered_times[k].split(" - ")[0];
                    var time_after_nine2 = filtered_times[k].split(" - ")[1];

                    if (time_after_nine_2 === 'AM' || time_after_nine_2 === 'PM') {
                      time_after_nine_1 = time_after_nine1;
                      time_after_nine_2 = time_after_nine2;
                    } else {
                      time_after_nine_1 = convertTo12HourFormat(time_after_nine1);
                      time_after_nine_2 = convertTo12HourFormat(time_after_nine2);
                    }

                    slot_time_html += `<div title = "Edit Slot" class="option col-md-3 mr-2" onclick="changeSlotTime('` + filtered_times[k] + `')"> ` + time_after_nine_1 + ` - ` + time_after_nine_2 + `</div>`;
                  }
                } else {
                  $("#after_nine_slot").prop('checked', true);

                  slot_time_html += `<div class="option col-md-3 mr-2")>After_Nine</div>`;

                }


              });
            }
            slots_times = [];

            if (profileStatus != "Freelancer") {
              $(".total_time_slots").append(slot_time_html);
            }

            $(".timeSlots").html(html);
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
        // console.log(d);
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
        var slot_time_html = ``;
        //Check the status
        let found = false;
        var changeSlot = '';
        $(".appointment-status").hide();
        $(".timeSlots").empty();
        $(".total_time_slots").empty();
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
                // console.log(status);

                if (status == 'Off') {

                  changeSlot = 'customBtnNotSelected';
                  $(".addTimeSlots, .addTimeSlotstxt").addClass('d-none');

                }
                if (showResponse.data[i]["booking_time_slots"] != '') {


                  $.each(showResponse.data[i]["booking_time_slots"], function (j) {
                    var starttimeAMPM = convertTo12HourFormat(showResponse.data[i]["booking_time_slots"][j]['start_time']);
                    if (showResponse.data[i]["booking_time_slots"][j]['end_time'] != null) {
                      var endtimeAMPM = convertTo12HourFormat(showResponse.data[i]["booking_time_slots"][j]['end_time']);
                    } else {
                      var endtimeAMPM = '';
                    }

                    var slots_time = showResponse.data[i]["booking_time_slots"][j]['slots_time'];
                    var status = showResponse.data[i]["booking_time_slots"][j]['status'];

                    if (status == 'booked') {
                      html += `<div title="" class="` + changeSlot + ` option col-md-2 mr-2 ${status}" disabled><del>` + starttimeAMPM + ` - ` + endtimeAMPM + `</del></div >`;
                      slots_times.push(showResponse.data[i]["booking_time_slots"][j]['slots_time']);
                      $('#after_nine_slot').prop('checked', true);
                      $("#after_nine_slot").attr("disabled", true);

                    } else {

                      // alert('123')
                      $('#after_nine_slot').prop('checked', false);
                      $("#after_nine_slot").attr("disabled", false);

                      if (slots_time == 'After_Nine') {
                        if (status == 'booked') {
                          $("#after_nine_slot").attr("disabled", true);

                        }
                        $('#after_nine_slot').prop('checked', true);

                        html += `<div title="" class="` + changeSlot + ` option col-md-2 mr-2 ${status}")>After 9</div>`;//` + starttimeAMPM + ` - 
                        slots_times.push(showResponse.data[i]["booking_time_slots"][j]['slots_time']);

                      } else {

                        $("#after_nine_slot").attr("disabled", false);
                        $('#after_nine_slot').prop('checked', false);

                        html += `<div title="" class="` + changeSlot + ` option col-md-2 mr-2 ${status}">` + starttimeAMPM + ` - ` + endtimeAMPM + `</div>`;
                        slots_times.push(showResponse.data[i]["booking_time_slots"][j]['slots_time']);
                      }
                    }

                    //                    html += `<div title="" class="` + changeSlot + ` option col-md-3 mr-2">` + starttimeAMPM + ` - ` + endtimeAMPM + `</div >`;
                    //                    slots_times.push(showResponse.data[i]["booking_time_slots"][j]['slots_time'])

                  });
                  changeSlot = '';
                } else {
                  $("#after_nine_slot").attr("disabled", false);
                  $('#after_nine_slot').prop('checked', false);
                }
                var filtered_times = removeDuplicates(slots_times);
                // console.log(filtered_times);
                if (slots_times != '') {
                  $.each(filtered_times, function (k) {
                    if (filtered_times[k] != "After_Nine") {

                      let time_after_nine_1 = filtered_times[k].slice(-2);
                      let time_after_nine_2 = filtered_times[k].slice(-2);

                      var time_after_nine1 = filtered_times[k].split(" - ")[0];
                      var time_after_nine2 = filtered_times[k].split(" - ")[1];

                      if (time_after_nine_2 === 'AM' || time_after_nine_2 === 'PM') {
                        time_after_nine_1 = time_after_nine1;
                        time_after_nine_2 = time_after_nine2;
                      } else {
                        time_after_nine_1 = convertTo12HourFormat(time_after_nine1);
                        time_after_nine_2 = convertTo12HourFormat(time_after_nine2);
                      }

                      slot_time_html += `<div title = "Edit Slot" class="option col-md-3 mr-2" onclick="changeSlotTime('` + filtered_times[k] + `')"> ` + time_after_nine_1 + ` - ` + time_after_nine_2 + `</div>`;
                    } else {
                      // $("#after_nine_slot").prop('checked', true);

                      slot_time_html += `<div class="option col-md-3 mr-2")>After_Nine</div>`;

                    }

                  });
                }
                slots_times = [];
                if (profileStatus != "Freelancer") {
                  $(".total_time_slots").append(slot_time_html);
                }
                $(".timeSlots").html(html);
                $("#p_status").text(showResponse.data[i]["status"]);
                $(".appointment-status").show();
                found = true;
                if (showResponse.data[i]["status"] === "Available"
                  // ||
                  // showResponse.data[i]["status"] === "On Call" ||
                  // showResponse.data[i]["status"] === "Off"
                ) {
                  if (profileStatus == 'Freelancer') {
                    $(".addTimeSlots, .addTimeSlotstxt").addClass('d-none');
                  } else {
                    $(".addTimeSlots, .addTimeSlotstxt").removeClass('d-none');

                  }

                  $(".available").addClass("customBtnNotSelected");
                  // $(".on-call").addClass("customBtnNotSelected");
                  $(".off").removeClass("customBtnNotSelected");
                  // $(".addTimeSlots, .addTimeSlotstxt").removeClass('d-none');
                  // $(".cancel").removeClass("customBtnNotSelected");
                } else {
                  $(".available").removeClass("customBtnNotSelected");
                  $(".off").addClass("customBtnNotSelected");
                  // $(".addTimeSlots, .addTimeSlotstxt").addClass('d-none');

                }

              }
              // else {
              //   $(".appointment-status").hide();
              // }

            });
            if (!found) {

              if (profileStatus == 'Freelancer') {
                $(".addTimeSlots, .addTimeSlotstxt").addClass('d-none');
              } else {
                $(".addTimeSlots, .addTimeSlotstxt").removeClass('d-none');

              }
              $("#p_status").text("-");
              $('#after_nine_slot').prop('checked', false);
              $("#after_nine_slot").attr("disabled", false);

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