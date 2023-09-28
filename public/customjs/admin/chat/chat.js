
$(document).ready(function () {

});
$(document).on('click', '#addNewQuestion', function (e) {
	
    $("#question_id").val('');
    $("#chat_question").val('');
    $("#chat_answer").val('');
    $('.chat-question-modal').modal('show');
});

$(document).on('click', '#submit-button', function (e) {

	e.preventDefault();
	let type = 'POST';
	let url = '/admin/saveChatQuestionDetails';
	let message = '';
	let form = $('#question-form');
	let data = new FormData(form[0]);
	// if ($(this).text() == 'Submit') {
	//     url = url;
	// }
	    

	// PASSING DATA TO FUNCTION
	$('[name]').removeClass('is-invalid');
	SendAjaxRequestToServer(type, url, data, '', addChatQuestionResponse, 'spinner_button', 'submit_button');
});

function addChatQuestionResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
      
        toastr.success(response.message, '', {
            timeOut: 3000
        });

        $(".chat-question-modal").modal('hide');
        $(".upload-success").modal('show');

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




function getQuestiondetails(id) {

    // e.preventDefault();

    let type = 'GET';
    let url = 'getQuestiondetail';
    let message = '';
    let form = '';
    let data = 'id='+id;
    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', getQuestiondetailResponse, 'spinner_button', 'submit_button');

}
    
function getQuestiondetailResponse(response) {

    if (response.status == 200 || response.status == '200') {
    	
    	var data = response.data;
            
        if (data != null || data != '') {
        	$("#question_id").val(data.id);
        	$("#chat_question").val(data.question);
        	$("#chat_answer").val(data.answer);
        }
        $('.chat-question-modal').modal('show');

    }
}



// chat reply code start here


$(document).on('click', '#chat-reply-button', function (e) {

	if($("#chat_id").val() == ''){
		toastr.error('Something went wrong.', '', {
            timeOut: 3000
        });
		return;
	}
	if($("#chat_reply").val() == ''){
		toastr.error('Unable to send empty reply.', '', {
            timeOut: 3000
        });
		return;
	}
	e.preventDefault();
	let type = 'POST';
	let url = '/admin/saveChatReplyDetails';
	let message = '';
	let form = $('#chat-reply-form');
	let data = new FormData(form[0]);
	// if ($(this).text() == 'Submit') {
	//     url = url;
	// }
	    

	// PASSING DATA TO FUNCTION
	$('[name]').removeClass('is-invalid');
	SendAjaxRequestToServer(type, url, data, '', addChatReplyResponse, 'spinner_button', 'submit_button');
});

function addChatReplyResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
      
        toastr.success(response.message, '', {
            timeOut: 3000
        });
        
        var replytxt = $("#chat_reply").val();
        
        var repliesHtml = `<div class="col-12">
							<p><span><b>Reply:</b></span>&nbsp;&nbsp;${replytxt}</p>
						</div>`;
						
		$("#chatReply_container").append(repliesHtml);
		$(".noreply-div").remove();
		$("#chat_reply").val('');
						
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

function getFaqQuestiondetail(id) {

    // e.preventDefault();

    let type = 'GET';
    let url = 'getFaqQuestiondetail';
    let message = '';
    let form = '';
    let data = 'id='+id;
    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', getFaqQuestiondetailResponse, 'spinner_button', 'submit_button');

}
    
function getFaqQuestiondetailResponse(response) {

    if (response.status == 200 || response.status == '200') {
    	
    	var chat = response.chat;
    	var replies = response.replies;
        var repliesHtml = '';    
    	
        if (chat != null || chat != '') {
        	$("#chat_id").val(chat.id);
        	$("#chat_question").val(chat.question);
        	
        	if(replies.length > 0){
        		$.each(replies, function(key, value) {
					
        			repliesHtml += `<div class="col-12">
										<p><span><b>Reply:</b></span>&nbsp;&nbsp;${value.reply}</p>
									</div>`;
		        });
        	}else{
        		repliesHtml = '<div class="col-12 noreply-div"><p>No Reply...</p></div>';
        	}
        	$("#chatReply_container").html(repliesHtml);
        }
        $('.chat-question-modal').modal('show');
    }
}
    

