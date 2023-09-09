const webUrl = "https://api.styzeler.co.uk/styzeler-api/index.php/app/";

let JOBID = "jobid";
let APPLICANTEMAILID = "applicantemailid";
let PDFID = "pdfid";
let CLID = "clid";

jobid = localStorage.getItem(JOBID);
applicantemail = localStorage.getItem(APPLICANTEMAILID);
if(localStorage.getItem('ISADMACTIVE') != "Yes") {
    window.location.href = "../index.html";
}

$(function() {

    //get avaliable salon space
    $.ajax({
        type: 'post',
        url: webUrl + 'getjobs',
        data: {
            "_IsAdmin": "true"
        },
        success: function(response) {

            console.log(response);

            
            $.each( response.jobs, function(i){


                if((response.jobs[i].applicants).length > 0) {

                    $.each(response.jobs[i].applicants, function(j) {

                        if(jobid == response.jobs[i]['_JobId'] && applicantemail == response.jobs[i].applicants[j]["applicant_email"] ) {

                            localStorage.setItem(PDFID, response.jobs[i].applicants[j]["applicant_resume"]);
                            localStorage.setItem(CLID, response.jobs[i].applicants[j]["applicant_cover_letter"]);
                            $("#ownerName").text(response.jobs[i].applicants[j]["applicant_name"]);
                            $("#ownerEmail").text(response.jobs[i].applicants[j]["applicant_email"]);
                            $("#ownerMobile").text(response.jobs[i].applicants[j]["applicant_phone"]);
    
                        }
    
    
                    });

                   
                    

                }

            });
        }
    });
});