const webUrl = "https://api.styzeler.co.uk/styzeler-api/index.php/app/";

let JOBID = "jobid";
let APPLICANTEMAILID = "applicantemailid";
if(localStorage.getItem('ISADMACTIVE') != "Yes") {
    window.location.href = "../index.html";
}

function redirect() {
    window.location.href = "./wedding-stylist.html";
}

function getApplicant(email,jobid) {

    localStorage.setItem(JOBID, jobid);
    localStorage.setItem(APPLICANTEMAILID, email);
    window.location.href = "./applicant.html";
    //console.log( mode+" "+stid);
  }


var applicantEmail;


//Ajax call to get getavailablesalonspace
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

                        applicantEmail = response.jobs[i].applicants[j]["applicant_email"];
    
                        $(".user-details").append(
                       
                            '<div class="col-4 pt-2" style="border-top: 1px solid grey;">' +
                                '<p>' + response.jobs[i]['_JobTitle'] + '</p>' +
                                
                            '</div>' + 
                            '<div class="col-4 pt-2" style="border-top: 1px solid grey;">' +
                                '<p id="freelancer_' + i +'" >'+response.jobs[i].applicants[j]["applicant_name"]+'</p>' +
                            '</div>'+
                            '<div class="col-4 pt-2" style="border-top: 1px solid grey;">' +
                               '<p onclick="getApplicant(\''+applicantEmail+'\', '+response.jobs[i]['_JobId']+')">Click to see details</p>' +
                            '</div>' +
                            '<hr/>');
    
                    });

                }

                  
                    // if(  response.freelancers[i]['_IsActive'] === "0" ) {
                    //     $("#freelancer_" + i ).append('<a onclick="activePeople(' + response.freelancers[i]['_StId'] + ');" style="color:red;">Active Now</a>');
                    // } else {
                    //     $("#freelancer_" + i ).append('<a style="color: green;">Activated</a>');

                    // }
            
        

                

            });
        }
    });
});