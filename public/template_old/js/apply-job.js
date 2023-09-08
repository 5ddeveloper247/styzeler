let JOBID = "jobid";
let PDFID = "pdfid";
let CLPDFID = "clpdfid";

function getJobId(jobId) {
  window.location.href = "./apply-job.html?e=success";
} 

function redirect() {
  window.location.href = "./jobs.html?e=success";
}


//Candidate CV
function readCV(input) {

    var file = input.files[0];
    var reader = new FileReader();
    reader.onloadend = function (e) {
        // $('#blah').attr('src', e.target.result);
        // console.log(e.target.result);
        let base64 = reader.result.split(';base64').join(',').split('data:application/').join(',').split(',');
        // console.log( base64);
        
        $.ajax({
            type: 'post',
            url: webUrl + 'uploadpdf',
            data: {
                "_PdfContent": base64[3]
               
            },
            success: function (response) {
            	$("input[name=hdnresume]").val(base64[3]);
            	
                console.log(response);

                localStorage.setItem(PDFID, response["_PdfId"]);

            }

        });


    }
    reader.readAsDataURL(file);

}

//Candidate Cover Letter
function readCoverLetter(input) {

    var file = input.files[0];
    var reader = new FileReader();
    reader.onloadend = function (e) {
        // $('#blah').attr('src', e.target.result);
        // console.log(e.target.result);
        let base64 = reader.result.split(';base64').join(',').split('data:application/').join(',').split(',');
        // console.log( base64);

        $.ajax({
            type: 'post',
            url: webUrl + 'uploadpdf',
            data: {
                "_PdfContent": base64[3]
               
            },
            success: function (response) {
            	$("input[name=hdncvrletter]").val(base64[3]);
            	
                console.log(response);

                localStorage.setItem(CLPDFID, response["_PdfId"]);

            }

        });


    }
    reader.readAsDataURL(file);

}

function sendJobApplyEmail(titlejobagain, approveremail, jobId){
	
    let coverLetter = $("input[name=hdncvrletter]").val();
    let resume = $("input[name=hdnresume]").val();;
    
    var settings = {
    "url": "./job_apply_email.php",
    "method": "POST",
    "timeout": 0,
    "headers": {
        "Content-Type": "application/json"
    },
    "data": JSON.stringify({
        "_Email": approveremail,
        "_resume": resume,
        "_coverletter": coverLetter,
        "_Subject": "Styzeler Job Applied Against: "+titlejobagain,
        "_Message": "\n\nSomeone has just applied to the job you posted on Styzeler Jobs. Please find bellow attached files for more details. \n\n"
    }),
    };

    $.ajax(settings).done(function (response) {
    console.log(response);
    });
    
    return true;
}

$(function(){
	
	 $.ajax({
         type: 'post',
         url: webUrl + 'findEmailofJob',
         data: {
         "_JobId" : localStorage.getItem(JOBID),
         },
         success: function(response) {
        	 if(response.email != null && response.email.length){
        		 $("#job-form").find("input[name=hdnjobemail]").val(response.email[0].email);
        		 $("#job-form").find("input[name=hdnjobtitle]").val(response.email[0].job_title);
        	 }
         }
     });

    $('#job-form').submit(function(e){

        e.preventDefault();

        let name = $("#applicant-name").val();
        let email = $("#applicant-email").val();
        let phone = $("#applicant-phone").val();
        let coverLetter = localStorage.getItem(CLPDFID);
        let resume = localStorage.getItem(PDFID);

        // alert(name);

        //Ajax call - Jobs
        $.ajax({
            type: 'post',
            url: webUrl + 'applytojob',
            data: {
            "_JobId" : localStorage.getItem(JOBID),
            "_ApplicantName": name ,
            "_ApplicantEmail": email,
            "_ApplicantPhone": phone,
            "_ApplicantCoverLetter": coverLetter,
            "_ApplicantResume": resume
            },
            success: function(response) {
            	var approveremail = $("#job-form").find("input[name=hdnjobemail]").val();
            	var titlejob = $("#job-form").find("input[name=hdnjobtitle]").val();
            	sendJobApplyEmail(titlejob, approveremail, localStorage.getItem(JOBID), coverLetter, resume);
            	
                console.log(response);
                localStorage.removeItem(JOBID);
                localStorage.removeItem(PDFID);
                localStorage.removeItem(CLPDFID);

                $('.modal').modal('show');


            }
        
        });
        //End of Ajax call

    });
  
});