let JOBID = "jobid";


let STARTDATE = 'jobstartdate';

let ENDDATE = 'jobenddate';

let today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
var st_id = localStorage.getItem(STID);

function getJobId(jobId) {
  localStorage.setItem(JOBID,jobId);
  window.location.href = "./apply-job.html?e=success";
} 

function postNewJob(){
	$("div[class*=post-job-modal]").modal("show");
}

function submitJob(){
	console.log("SUBMIT JOB");
	 let jobTitle = $("#job-title").val();
     let jobDescription = CKEDITOR.instances.description.getData();
     let startDate = localStorage.getItem(STARTDATE);
     let endDate = localStorage.getItem(ENDDATE);
     let companyname = $("#company_name").val();
     let salary = $("#salary").val();
     let location = $("#location").val();
     let email = $("#email").val();
     
    $.ajax({
        type: 'post',
        url: webUrl + 'uploadjob',
        data: {
            "_JobTitle": jobTitle,
            "_JobDescription": jobDescription,
            "_JobUploadDate":  dateUploadDay, 
            "_JobStartDate": startDate,
            "_JobEndDate": endDate,
            "_is_active": 0,
            "_company": companyname,
            "_salary": salary,
            "_location": location,
            "_email": email,
            "_added_by": st_id
        },
        success: function(response) {
            console.log(response);
            if( response["_ReturnMessage"] === "Job uploaded successfully" ) {
            	alert("Job Posted Successfully, Admin will approve it.");
            	$("div[class*=post-job-modal]").modal("hide");
            	setTimeout(function(){
            		window.location.href='./jobs.html';
            	},2000);
            }else{
            	alert("There is some problem");
            }
        }
    });
}

//Job Start Date

$("#job-start-date").datepicker({ 

    dateFormat: "yy-mm-dd", 

    minDate: today,

    onSelect: function(){

        var selected = $(this).val();

        // alert(selected);

        localStorage.setItem(STARTDATE, selected);

    }

});


//Job End Date

$("#job-end-date").datepicker({ 

    dateFormat: "yy-mm-dd", 

    minDate: today,

    onSelect: function(){

        var selected = $(this).val();

        // alert(selected);

        localStorage.setItem(ENDDATE, selected);

    }

});






//Today

let uploadDay = new Date();

let dateUploadDay = uploadDay.getFullYear()+'-'+(uploadDay.getMonth()+1)+'-'+uploadDay.getDate();



$(function(){
	CKEDITOR.editorConfig = function (config) {
	    config.language = 'es';
	    config.uiColor = '#F7B42C';
	    config.height = 300;
	    config.toolbarCanCollapse = true;

	};
	CKEDITOR.replace('description');
	
	let userRegistrationMode = localStorage.getItem(REGISTRATIONMODE);
	console.log(userRegistrationMode);
	if( userRegistrationMode === "Wedding Stylist" || userRegistrationMode === "Hairstylist" || userRegistrationMode === "Barber" || userRegistrationMode === "Beautician") {
		console.log("STYLIST");
	} else {
		
		if(userRegistrationMode != null && userRegistrationMode != undefined){
			$("a#postjob").show();
		}
	}
	
	  $.ajax({
          type: 'post',
          url: webUrl + 'getjobs',
          data: {
            "_IsAdmin" : "false"
          },
          success: function(response) {
            console.log(response);

            $.each( response.jobs , function(i){
                $(".all-jobs").append('<div class="col-12 mt-4">' +
                '<div class="card card-body color-1">' +
                    '<h4>' + response.jobs[i]["_JobTitle"] + '</h4>' +
                    '<p>' + response.jobs[i]['_JobDescription'] + '</p>' +
                    '<a id="' + response.jobs[i]['_JobId'] +'" onclick="getJobId(' + response.jobs[i]['_JobId'] +')"  class="btn customBtn">Apply</a>' +
                '</div>' +
                '</div>');


            })

           
        }
        
      });
      //End of Ajax call

    
  
});