const webUrl = "https://api.styzeler.co.uk/styzeler-api/index.php/app/";

function redirect() {
    window.location.href = "./job_uploads.html";
}


//Active a chair

function activePeople(stId) {

    //Ajax call - Login

    $.ajax({

        type: 'post',

        url: webUrl + 'activatefreelancers',

        data: {

          "_StId": stId,

       },

        success: function(response) {

          

          console.log(response);



          $('.activated-modal').modal('show');



        }

      

    });

    //End of Ajax call

    

}

function activeJob(jobId) {

    //Ajax call - Login

    $.ajax({

        type: 'post',

        url: webUrl + 'activatejob',

        data: {

          "job_id": jobId,

       },

        success: function(response) {

          

          console.log(response);



          $('.activated-modal').modal('show');



        }

      

    });

    //End of Ajax call
}

function getJobdetails(element) {
	var jobId = $(element).attr("id");
    $.ajax({
        type: 'post',
        url: webUrl + 'fetchjobDetails',
        data: {
          "job_id": jobId,
       },

        success: function(response) {
          console.log(response.job);
          var job = response.job[0];
          $("#company_name").val(job.company_name);
          $("#job-title").val(job.job_title);
          $("#description").val(job.job_description);
          $("#salary").val(job.salary);
          $("#location").val(job.location);
          $("#email").val(job.email);
          $("#job-start-date").val(job.job_start_date);
          $("#job-end-date").val(job.job_end_date);

          $('div.post-job-modal').modal('show');
        }
    });
    //End of Ajax call
}


//Ajax call to get getwaitingjobs

$(function() {



    //get avaliable salon space

    $.ajax({

        type: 'post',
        data: {

            "_RegistrationMode": "Wedding Stylist"

        },
        url: webUrl + 'getwaitingjobs',

        success: function(response) {
            console.log(response);
            $.each( response.jobs, function(i){
                $(".user-details").append(
                        '<div class="col-3 pt-2" style="border-top: 1px solid grey;">' +
                            '<p>' + response.jobs[i]['_JobTitle'] + '</p>' +
                        '</div>' + 
                        
                        '<div class="col-3 pt-2" style="border-top: 1px solid grey;">' +
                        '<p>' + response.jobs[i]['name'] + '</p>' +
                        '</div>' + 

                        '<div class="col-3 pt-2" style="border-top: 1px solid grey;">' +
                           '<p style="cursor:pointer;" id="'+ response.jobs[i]["_JobId"] +'" onclick="getJobdetails(this)">Click to see details</p>' +
                        '</div>' +
                        
                        '<div class="col-3 pt-2" style="border-top: 1px solid grey;">' +
                            '<p id="freelancer_' + i +'" style="cursor:pointer;"></p>' +
                    '</div><hr/>');

                	if(  response.jobs[i]['status'] === "Waiting For Approval" ) {
                        $("#freelancer_" + i ).append('<a onclick="activeJob(' + response.jobs[i]['_JobId'] + ');" style="color:red;">Active Now</a>');
                    } else {
                        $("#freelancer_" + i ).append('<a style="color: green;">Activated</a>');
                    }

            

        



                



            });

        }

    });

});