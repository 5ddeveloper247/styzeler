
// console.log("working");
// function logSubmit(event) {
//     // log.textContent = `Form Submitted! Time stamp: ${event.timeStamp}`;
//     event.preventDefault();
//     alert("Working");
//   }
  
//   const form = document.getElementById('job-form');
//   form.addEventListener('submit', logSubmit);

const webUrl = "https://api.styzeler.co.uk/styzeler-api/index.php/app/";

let STARTDATE = 'jobstartdate';
let ENDDATE = 'jobenddate';
let today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());

if(localStorage.getItem('ISADMACTIVE') != "Yes") {
    window.location.href = "../index.html";
}
function redirect() {
    window.location.href = "./upload-jobs.html";
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

let startDate = localStorage.getItem(STARTDATE);

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

let endDate = localStorage.getItem(ENDDATE);

//Today
let uploadDay = new Date();
let dateUploadDay = uploadDay.getFullYear()+'-'+(uploadDay.getMonth()+1)+'-'+uploadDay.getDate();
// console.log(dateUploadDay);

$(function(){

	CKEDITOR.editorConfig = function (config) {	    config.language = 'es';	    config.uiColor = '#F7B42C';	    config.height = 300;	    config.toolbarCanCollapse = true;	};	CKEDITOR.replace('description');	
     $("#job-form").on("submit", function(e){

         e.preventDefault();

         let jobTitle = $("#job-title").val();
         let jobDescription = CKEDITOR.instances.description.getData();
         
         
         
        //  alert(jobTitle);
        console.log(today + "   " + startDate + "  " + endDate);

    
        //Ajax call - Login
        $.ajax({
            type: 'post',
            url: webUrl + 'uploadjob',
            data: {
                "_JobTitle": jobTitle,
                "_JobDescription": jobDescription,
                "_JobUploadDate":  dateUploadDay, 
                "_JobStartDate": startDate,
                "_JobEndDate": endDate
               
            },
            success: function(response) {
                console.log(response);


                if( response["_ReturnMessage"] === "Job uploaded successfully" ) {
                    $('.upload-success').modal('show');
                }

            }
        
        });
      //End of Ajax call

    });
  
});