const webUrl = "https://api.styzeler.co.uk/styzeler-api/index.php/app/";
if(localStorage.getItem('ISADMACTIVE') != "Yes") {
    window.location.href = "../index.html";
}
function showToggle(id) {
    $("#toggle"+id).toggle();

}

$(function () {
  //get avaliable salon space
  $.ajax({
    type: "post",
    url: webUrl + "getallappointments",
    data: {
      _IsAdmin: "true",
    },
    success: function (response) {
      console.log(response);
      $.each( response.appointments, function(i) {
        //   console.log(response.appointments[i]["Appointment"]);
          $.each(response.appointments[i]["Appointment"], function(j){
              let vname = response.appointments[i]["Appointment"];
              console.log(vname[j]["_Status"]);
              if(vname[j]["_Status"] === "book" 
              || vname[j]["_Status"] === "Booked"
              || vname[j]["_Status"] === "CONFIRMED by Salon Owner") {

                $(".pending-appointment")
                .append('<div class="col-4">' + '<span>'+ 
                '<div>' +  '<a onclick="showToggle('+i+');">'+
                '<p style="cursor: pointer;"><strong>Date: </strong> ' +
                vname[j]["_AppointmentDateDisplay"] + '&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i></p>' + '</a>'+
                '</div>' + '</span>'+ '</div>' +
                '<div class="col-8 ">' + 
                '<div>' + '<span style="overflow-wrap: break-word;">'+ '<p><strong>Salon Owner: </strong>' +
                vname[j]["_SalonOwnerBusinessName"]+ '</p>' +
                '<div>' + '<p><strong>Freelancer Name: </strong> ' +
                vname[j]["_FreelancerName"] + '</p>' + '</div>' + 
                '</span>' + '<div id="toggle'+i+'">'+
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Freelancer Category: </strong> ' +
                vname[j]["_FreelancerMode"] + '</p> </div>' +
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Freelancer Email: </strong> ' +
                vname[j]["_FreelancerEmail"] + '</p> </div>' +
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Freelancer Mobile: </strong> ' +
                vname[j]["_FreelancerMobile"] + '</p> </div>'+
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Salon Category: </strong> ' +
                vname[j]["_SalonMode"] + '</p> </div>' +
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Salon Email: </strong> ' +
                vname[j]["_SalonEmail"] + '</p> </div>' +
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Salon Mobile: </strong> ' +
                vname[j]["_SalonMobile"] + '</p> </div>' + 
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Booking Status: </strong> ' +
                vname[j]["_Status"] + '</p> </div>' + '</div>');

              }

              if(vname[j]["_Status"] === "CONFIRMED"
              || vname[j]["_Status"] === "Confirmed" 
              || vname[j]["_Status"] === "confirmed") {

                $(".confirm-appointment")
                .append('<div class="col-4">' + '<span>'+ 
                '<div>' +  '<a onclick="showToggle('+i+');">'+
                '<p style="cursor: pointer;"><strong>Date: </strong> ' +
                vname[j]["_AppointmentDateDisplay"] + '&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i></p>' +  '</a>'+
                '</div>' + '</span>'+ '</div>' +
                '<div class="col-8 ">' + 
                '<div>' + '<span style="overflow-wrap: break-word;">'+ '<p><strong>Salon Owner: </strong>' +
                vname[j]["_SalonOwnerBusinessName"]+ '</p>' +
                '<div>' + '<p><strong>Freelancer Name: </strong> ' +
                vname[j]["_FreelancerName"] + '</p>' + '</div>' + 
                '</span>' + '<div id="toggle'+i+'">'+
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Freelancer Category: </strong> ' +
                vname[j]["_FreelancerMode"] + '</p> </div>' +
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Freelancer Email: </strong> ' +
                vname[j]["_FreelancerEmail"] + '</p> </div>' +
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Freelancer Mobile: </strong> ' +
                vname[j]["_FreelancerMobile"] + '</p> </div>'+
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Salon Category: </strong> ' +
                vname[j]["_SalonMode"] + '</p> </div>' +
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Salon Email: </strong> ' +
                vname[j]["_SalonEmail"] + '</p> </div>' +
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Salon Mobile: </strong> ' +
                vname[j]["_SalonMobile"] + '</p> </div>' + 
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Booking Status: </strong> ' +
                vname[j]["_Status"] + '</p> </div>' + '</div>');


              }

              if(vname[j]["_Status"] === "ON HOLD by Salon Owner" 
              || vname[j]["_Status"] === "on hold"
              || vname[j]["_Status"] === "ON HOLD"
              || vname[j]["_Status"] === "on hold confirmed by freelancer") {

                $(".onHold-appointment")
                .append('<div class="col-4">' + '<span>'+ 
                '<div>' +  '<a onclick="showToggle('+i+');">'+
                '<p style="cursor: pointer;"><strong>Date: </strong> ' +
                vname[j]["_AppointmentDateDisplay"] + '&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i></p>' +  '</a>'+
                '</div>' + '</span>'+ '</div>' +
                '<div class="col-8 ">' + 
                '<div>' + '<span style="overflow-wrap: break-word;">'+ '<p><strong>Salon Owner: </strong>' +
                vname[j]["_SalonOwnerBusinessName"]+ '</p>' +
                '<div>' + '<p><strong>Freelancer Name: </strong> ' +
                vname[j]["_FreelancerName"] + '</p>' + '</div>' + 
                '</span>' + '<div id="toggle'+i+'">'+
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Freelancer Category: </strong> ' +
                vname[j]["_FreelancerMode"] + '</p> </div>' +
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Freelancer Email: </strong> ' +
                vname[j]["_FreelancerEmail"] + '</p> </div>' +
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Freelancer Mobile: </strong> ' +
                vname[j]["_FreelancerMobile"] + '</p> </div>'+
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Salon Category: </strong> ' +
                vname[j]["_SalonMode"] + '</p> </div>' +
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Salon Email: </strong> ' +
                vname[j]["_SalonEmail"] + '</p> </div>' +
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Salon Mobile: </strong> ' +
                vname[j]["_SalonMobile"] + '</p> </div>' + 
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Booking Status: </strong> ' +
                vname[j]["_Status"] + '</p> </div>' + '</div>');

              }

              if(vname[j]["_Status"] === "cancel" 
              || vname[j]["_Status"] === "CANCELLED"
              || vname[j]["_Status"] === "CANCELLED by Salon Owner"
              || vname[j]["_Status"] === "cancel by Freelancer"
              || vname[j]["_Status"] === "CANCELLED due to Expired Time") {

                $(".cancel-appointment")
                .append('<div class="col-4">' + '<span>'+ 
                '<div>' +  '<a onclick="showToggle('+i+');">'+
                '<p style="cursor: pointer;"><strong>Date: </strong> ' +
                vname[j]["_AppointmentDateDisplay"] + '&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i></p>' +  '</a>'+
                '</div>' + '</span>'+ '</div>' +
                '<div class="col-8 ">' + 
                '<div>' + '<span style="overflow-wrap: break-word;">'+ '<p><strong>Salon Owner: </strong>' +
                vname[j]["_SalonOwnerBusinessName"]+ '</p>' +
                '<div>' + '<p><strong>Freelancer Name: </strong> ' +
                vname[j]["_FreelancerName"] + '</p>' + '</div>' + 
                '</span>' + '<div id="toggle'+i+'">'+
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Freelancer Category: </strong> ' +
                vname[j]["_FreelancerMode"] + '</p> </div>' +
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Freelancer Email: </strong> ' +
                vname[j]["_FreelancerEmail"] + '</p> </div>' +
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Freelancer Mobile: </strong> ' +
                vname[j]["_FreelancerMobile"] + '</p> </div>'+
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Salon Category: </strong> ' +
                vname[j]["_SalonMode"] + '</p> </div>' +
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Salon Email: </strong> ' +
                vname[j]["_SalonEmail"] + '</p> </div>' +
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Salon Mobile: </strong> ' +
                vname[j]["_SalonMobile"] + '</p> </div>' + 
                '<div>' + '<p style="overflow-wrap: break-word;"><strong>Booking Status: </strong> ' +
                vname[j]["_Status"] + '</p> </div>' + '</div>');

              }
          });
          $("#toggle"+i).hide();

      });
    },
  });
});
