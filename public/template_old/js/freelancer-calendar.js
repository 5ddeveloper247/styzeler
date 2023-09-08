let SELECTEDSTATUSDATE = "selectedstatusdate";

var currentdate = new Date();
currentdate.setDate(currentdate.getDate() + 1);
var tomorrow = currentdate.toJSON().slice(0,10);
var calHeight = 600;
var currentHour = currentdate.getHours();
        


// check eligibility for on call 
function optionBtns(selectedDate) {
    
    console.log(tomorrow);
    if(selectedDate === tomorrow) {
        $(".on-call").removeClass("customBtnNotSelected");
      }
    else {
      $(".on-call").addClass("customBtnNotSelected");
    }
}

//
var evezz = [];
var today = today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
var endCalender = new Date(new Date().getFullYear(), (new Date().getMonth()) + 3, new Date().getDate());


jQuery(document).ready(function(){
    jQuery('.datetimepicker').datepicker({
        timepicker: true,
        language: 'en',
        range: true,
        dateFormat: 'dd-mm-yy'      
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

      // page is ready
      jQuery("#calendar").fullCalendar({
        themeSystem: "bootstrap4",
        // emphasizes business hours
        //   businessHours: false,
        defaultView: "month",
        height:calHeight,
        contentHeight:calHeight,
        
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
        events: function(start, end, timezone, callback) {
       
          $.ajax({
            type: "post",
            url: webUrl + 'showappointmentdates',
            data: {
              _StId: stId,
            },
            success: function (showResponse) {
              var events = [];
              console.log(showResponse);
              $.each(showResponse.avaliableDays, function (i) {
                if(showResponse.avaliableDays[i]["status"] === "Available") {
                  events.push({
                    title: 'Available',
                    color: "#000",
                    // textColor: "#b1bcc5",
                    textColor: "red",
                    className: 'customClass',
                    start: showResponse.avaliableDays[i]["freelancer_status_date"],
                    end: showResponse.avaliableDays[i]["freelancer_status_date"],
                    allDay: true,
                  });

                  $("[data-date="+showResponse.avaliableDays[i]["freelancer_status_date"]+"]").css("color", "#ffdb59");
                }
              }); 
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

          // console.log(today);
          localStorage.setItem(SELECTEDSTATUSDATE, convert(dateText));

          // $("#options").show();
          optionBtns(convert(dateText));
          let d = convert(dateText);

          evezz.push({
            //   title: 'B',
            // color: "#0decfc",
            // textColor: "#0decfc",
            id : '123',
            start: d,
            end: d,
            className: 'customClass',
            icon: "circle",
            allDay: true,
          });
          
          $("#calendar").fullCalendar('removeEvents', [123] );

          $("#calendar").fullCalendar("addEventSource", evezz);
          evezz = [];
          
          //Check the status
          let found = false;
          $(".appointment-status").hide();

          $.ajax({
            type: "post",
            url: webUrl + 'showappointmentdates',
            data: {
              _StId: stId,
            },
            success: function (showResponse) {
              console.log(showResponse);
              $.each(showResponse.avaliableDays, function (i) {
                if (
                  showResponse.avaliableDays[i]["freelancer_status_date"] === convert(dateText)) {
                  $("#status").text(showResponse.avaliableDays[i]["status"]);
                  $(".appointment-status").show();
                  found = true;
                  if(showResponse.avaliableDays[i]["status"] === "Available" ||
                    showResponse.avaliableDays[i]["status"] === "On Call" ||
                    showResponse.avaliableDays[i]["status"] === "Off")
                  {
                    
                    $(".available").addClass("customBtnNotSelected");
                    $(".on-call").addClass("customBtnNotSelected");
                    $(".off").addClass("customBtnNotSelected");
                    $(".cancel").removeClass("customBtnNotSelected");
                  }
                }
                // else {
                //   $(".appointment-status").hide();
                // }
              });
              if (!found) {
                $("#status").text("-");
                $(".cancel").addClass("customBtnNotSelected");
                $(".available").removeClass("customBtnNotSelected");    
                $(".off").removeClass("customBtnNotSelected");
                if(d === tomorrow) {
                    if(currentHour > 18) {
                        $(".on-call").removeClass("customBtnNotSelected");
                    }
                   
                }
              }
            },
          });

          // end of ajax call
        },    

        eventRender: function(event, element) {
            if(event.icon){          
               element.find(".fc-title").prepend("<i class='fa fa-"+event.icon+"'></i>");
            }
         }  

      });
    });
  })(jQuery);