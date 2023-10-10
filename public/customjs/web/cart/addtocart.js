$(document).ready(function () {
	
	
	
	
	$(document).on('click', '.closeCartConfirm', function (e) {
		$("#item_text").val('');
		$("#item_time").val('');
		$("#item_price").val('');
		$("#item_type").val('');
		$("#item_subtype").val('');
		$("#item_service").val('');
		$("#cartConfirm_modal").modal('hide');
	});
	
	$(document).on('click', '.close-modal', function (e) {
		$("#fail-modal").modal('hide');
	});
	$(document).on('click', '.error-booking', function (e) {
		$("#fail-modal").modal('show');
	});

});

$(document).on('click', '.add_to_cart', function (e) {

	if($("#userId").val() == ''){
		toastr.error('Kindly login first...', '', {timeOut: 3000});
		return;
	}
	if($("#userType").val() != 'client'){
		toastr.error('Kindly login with client user then proceed...', '', {timeOut: 3000});
		return;
	}
	
	$("#item_text").val($(this).text());
	$("#item_time").val($(this).attr('data-time'));
	$("#item_price").val($(this).attr('data-price'));
	$("#item_type").val(addtocartType);
	$("#item_subtype").val($(this).attr('data-subtype'));
	$("#item_service").val($(this).attr('data-service'));
	
	$("#cartConfirm_modal").modal('show');
});

function addToCartConfirm(){
	
	$("#cartConfirm_modal").modal('hide');
	
//	e.preventDefault();
	let type = 'POST';
	let url = '/addToCart';
	let message = '';
	let form = $('#addtocart_form');
	let data = new FormData(form[0]);
	    
	// PASSING DATA TO FUNCTION
//	$('[name]').removeClass('is-invalid');
	SendAjaxRequestToServer(type, url, data, '', addToCartResponse, 'spinner_button', 'submit_button');
	
}

function addToCartResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
      
        toastr.success(response.message, '', {
            timeOut: 3000
        });
        
        if($("#item_type").val() == 'Make-up' && $("#item_service").val() == 'Bridal Make-up'){
        	
        	window.location.href = weddingRoute;
        }
        
    } else {

    	error = response.message;
        var is_invalid = response.errors;

        // Loop through the error object
        $.each(is_invalid, function(key) {

            // Assuming 'key' corresponds to the form field name
//            var inputField = $('[name="' + key + '"]');
            // Add the 'is-invalid' class to the input field's parent or any desired container
            inputField.closest('.form-control').addClass('is-invalid');
        });
        // error_msg = error.split('(');

        toastr.error(error, '', {
            timeOut: 3000
        });
        
    }
}
