$(document).ready(function () {


});





$(document).on('click', '#submit-button', function (e) {

	e.preventDefault();
	let type = 'POST';
	let url = '/saveJobApplyDetails';
	let message = '';
	let form = $('#job-form');
	let data = new FormData(form[0]);
	// if ($(this).text() == 'Submit') {
	//     url = url;
	// }
	    

	// PASSING DATA TO FUNCTION
	$('[name]').removeClass('is-invalid');
	SendAjaxRequestToServer(type, url, data, '', addJobApplyResponse, 'spinner_button', 'submit_button');
});

function addJobApplyResponse(response) {

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
    
