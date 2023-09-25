var verifyCaptcha = 'false';
$(document).ready(function () {

//	$('#valid').on('click',function() {
//		verifyCaptcha = captcha.valid($('input[name="code"]').val());
//		
//		if(verifyCaptcha == true){
//			$(".verified-modal").modal('show');
//		}else{
//			$(".not-verified-modal").modal('show');
//		}
//	});
});


//function getProfileData() {
//
//    // e.preventDefault();
//
//    let type = 'GET';
//    let url = 'getProfileData';
//    let message = '';
//    let form = '';
//    let data = '';
//    // if ($(this).text() == 'Submit') {
//    //     url = url;
//    // }
//
//    // PASSING DATA TO FUNCTION
//    SendAjaxRequestToServer(type, url, data, '', profileResponse, 'spinner_button', 'submit_button');
//
//}
//getProfileData()



$(document).on('click', '#postJob', function (e) {

	if($("#type").val() == 'admin'){
		var editor = CKEDITOR.instances.description;
		editor.updateElement();
	}
	
	e.preventDefault();
	let type = 'POST';
	let url = '/saveJobRequestDetails';
	let message = '';
	let form = $('#post_job');
	let data = new FormData(form[0]);
	// if ($(this).text() == 'Submit') {
	//     url = url;
	// }
	    

	// PASSING DATA TO FUNCTION
	$('[name]').removeClass('is-invalid');
	SendAjaxRequestToServer(type, url, data, '', addJobRequestResponse, 'spinner_button', 'submit_button');
});

function addJobRequestResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
      
        toastr.success(response.message, '', {
            timeOut: 3000
        });

        $('.success-modal').modal('show');

    } else {

    	
    	error = response.responseJSON.message;
        var is_invalid = response.responseJSON.errors;

        // Loop through the error object
        $.each(is_invalid, function(key) {

            // Assuming 'key' corresponds to the form field name
            var inputField = $('[name="' + key + '"]');
            // Add the 'is-invalid' class to the input field's parent or any desired container
            inputField.closest('.form-control').addClass('is-invalid');
        });
        // error_msg = error.split('(');

        toastr.error(error, '', {
            timeOut: 3000
        });
        
    }
}
    
function getJobdetails(id) {

    // e.preventDefault();

    let type = 'GET';
    let url = 'getJobRequestDetail';
    let message = '';
    let form = '';
    let data = 'id='+id;
    // if ($(this).text() == 'Submit') {
    //     url = url;
    // }

    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', jobReqDetailResponse, 'spinner_button', 'submit_button');

}
    
function jobReqDetailResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
      
    	
    	var data = response.data;
            
        if (data != null || data != '') {
        	$("#company_name").val(data.company_name);
        	$("#job-title").val(data.job_title);
        	$("#description").val(data.description);
        	$("#salary").val(data.salary);
        	$("#location").val(data.location);
        	$("#email").val(data.email);
        	$("#job-start-date").val(data.start_date);
        	$("#job-end-date").val(data.end_date);
        }
        $('.post-job-modal').modal('show');

    }
}

