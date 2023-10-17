var verifyCaptcha = 'false';
$(document).ready(function () {

	$('#valid').on('click',function() {
		verifyCaptcha = captcha.valid($('input[name="code"]').val());
		
		if(verifyCaptcha == true){
			$(".verified-modal").modal('show');
		}else{
			$(".not-verified-modal").modal('show');
		}
	});
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



$(document).on('click', '#saveRentAndLet', function (e) {

	if(verifyCaptcha == 'false'){
		toastr.error('First verify captcha.', '', {
            timeOut: 3000
        });
	}else{
		e.preventDefault();
	    let type = 'POST';
	    let url = '/saveRentAndLetDetails';
	    let message = '';
	    let form = $('#chair_rental');
	    let data = new FormData(form[0]);
	    // if ($(this).text() == 'Submit') {
	    //     url = url;
	    // }
	    

	    // PASSING DATA TO FUNCTION
	    $('[name]').removeClass('is-invalid');
	    SendAjaxRequestToServer(type, url, data, '', addRentLetResponse, 'spinner_button', 'submit_button');
	}
	
	
    
});

function addRentLetResponse(response) {

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

$('.weeklyRent').hide();
$('.monthlyRent').hide();
$('.dailyRent').hide();
$('.hourlyRent').hide();
$('.rent-and-let').hide();
$('.rent-and-let-go').hide();

function rentLet(that) {
    if (that.value == "Rent and Let") {
        $('.rent-and-let').show();
        $('.rent-and-let-go').hide();
    }
    else if (that.value == "Rent and Let go") {
        $('.rent-and-let-go').show();
        $('.rent-and-let').hide();
    }
    else {
    	 $('.rent-and-let-go').hide();
         $('.rent-and-let').hide();
    }
    
    $('#rent-let,#rent-let-go').val('');
    $('#rent-let-charge-go-daily,#rent-let-charge-go-hourly').val('');
    $('#rent-let-charge-weekly,#rent-let-charge-monthly').val('');
}

function longRent(that) {
    if (that.value == "Weekly rent") {
        $('.weeklyRent').show();
        $('.monthlyRent').hide();
    }
    else if (that.value == "Monthly rent") {
        $('.weeklyRent').hide();
        $('.monthlyRent').show();
    }
    else {
    	 $('.weeklyRent').hide();
         $('.monthlyRent').hide();
    }
    $('#rent-let-charge-go-daily,#rent-let-charge-go-hourly').val('');
    $('#rent-let-charge-weekly,#rent-let-charge-monthly').val('');
}

function shortRent(that) {
    
	if (that.value == "Daily rent") {
    	$('.dailyRent').show();
        $('.hourlyRent').hide();
    } 
	else if (that.value == "Hourly rent") {
        $('.dailyRent').hide();
        $('.hourlyRent').show();
    } 
    else {
    	 $('.dailyRent').hide();
         $('.hourlyRent').hide();
    }
	$('#rent-let-charge-go-daily,#rent-let-charge-go-hourly').val('');
    $('#rent-let-charge-weekly,#rent-let-charge-monthly').val('');
}