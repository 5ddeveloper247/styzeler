$(document).ready(function () {

	

	

});

const chatbotToggler = document.querySelector(".chatbot-toggler");
const closeBtn = document.querySelector(".close-btn");
const chatbox = document.querySelector(".chatbox");
const chatInput = document.querySelector(".chat-input textarea");
const sendChatBtn = document.querySelector(".chat-input span");
const msgtype = '';
let userMessage = null; // Variable to store user's message



$(document).on('click', '#guest_form_submit', function (e) {

	e.preventDefault();
	let type = 'POST';
	let url = '/saveGuestUserDetails';
	let message = '';
	let form = $('#guest_form');
	let data = new FormData(form[0]);
	// if ($(this).text() == 'Submit') {
	//     url = url;
	// }
	    
	// PASSING DATA TO FUNCTION
	$('[name]').removeClass('is-invalid');
	SendAjaxRequestToServer(type, url, data, '', addGuestUserResponse, 'spinner_button', 'submit_button');
	
});

function addGuestUserResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
      
        toastr.success(response.message, '', {
            timeOut: 3000
        });
        var data = response.data;
        var questions = data['questions'];
        
        $("#guestUserId").val(data['id']);
        $('#guest_form').hide();
        $('#chat_continer').show();

        setTimeout(function(){
        	var html = '';
    		var i=0;
    		
    		if(questions.length > 0){
    			$.each(questions, function(key, value) {
    				
    				html += '<li class="chat incoming mt-2">';
    				if(i==0){
//    					html += `<span class="material-symbols-outlined">smart_toy</span>`;
    				}	
    				html += `<p class="m-2 pointer" onclick="getAnswer(${value.id})" style="border-radius:30px;padding: 6px 16px;background: #353534;color:#fdd431;">${value.question}</p>`;
    				html += `</li>`;
    				i++;
    	        });
    			html += `<li class="chat incoming"><p class="m-2 pointer" onclick="getAnswer('other')" style="border-radius:30px;padding: 6px 16px;background: #353534;color:#fdd431;">Other</p></li>`;
    		}else{
    			html += `<li class="chat incoming"><p class="m-2 pointer" onclick="getAnswer('other')" style="border-radius:30px;padding: 6px 16px;background: #353534;color:#fdd431;">Other</p></li>`;
    		}
    		
    		$(".chatbox").append(html);
    		
//    		toastr.success('Choose a question to get an answer...', '', {
//                timeOut: 6000
//            });
        }, 3000);
		
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


function generateResponse(chatElement){
	
	let type = 'POST';
	let url = '/sendMessage';
	let message = '';
	let form = $('#msg_form');
	let data = new FormData(form[0]);
	
	chatInput.value = "";
	// PASSING DATA TO FUNCTION
	SendAjaxRequestToServer(type, url, data, '', sendMessageResponse, 'spinner_button', 'submit_button');
	chatElement.remove();
}

function sendMessageResponse(response){
	
	if (response.status == 200 || response.status == '200') {
	    
		var data = response.data;
		var msgType = response.type;
		
		if(msgType == 'other'){
			
			$("#msgType").val('');
			setTimeout(function(){
		    	chatbox.appendChild(createChatLi(data, "incoming"));
			    chatbox.scrollTo(0, chatbox.scrollHeight);
		    }, 2000);
			setTimeout(function(){
				chatbox.appendChild(createChatLi('Thanks', "incoming"));
			    chatbox.scrollTo(0, chatbox.scrollHeight);
		    }, 3000);
			
		}else{
			
			var html = '';
			var i=0;
			
			html += `<li class="chat incoming"><span class="material-symbols-outlined">smart_toy</span><p class="m-2 pointer">For further assistance please choose the following...</p></li>`;
			
			if(data.length > 0){
				$.each(data, function(key, value) {
					
					html += '<li class="chat incoming mt-2">';
					if(i==0){
//						html += `<span class="material-symbols-outlined">smart_toy</span>`;
					}	
					html += `<p class="m-2 pointer" onclick="getAnswer(${value.id})" style="border-radius:30px;padding: 6px 16px;background: #353534;color:#fdd431;">${value.question}</p>`;
					html += `</li>`;
					i++;
		        });
				html += `<li class="chat incoming"><p class="m-2 pointer" onclick="getAnswer('other')" style="border-radius:30px;padding: 6px 16px;background: #353534;color:#fdd431;">Other</p></li>`;
			}else{
				html += `<li class="chat incoming"><p class="m-2 pointer" onclick="getAnswer('other')" style="border-radius:30px;padding: 6px 16px;background: #353534;color:#fdd431;">Other</p></li>`;
			}
			
			$(".chatbox").append(html);
			
			toastr.success('Choose a question to get an answer...', '', {
	            timeOut: 5000
	        });
			
		}
    }
}

function getAnswer(value){
	
	if(value == 'other'){
		$("#msgType").val('other');
		
		$("#message_area").prop('disabled', false);
		
		chatbox.appendChild(createChatLi('Other', "outgoing"));
	    chatbox.scrollTo(0, chatbox.scrollHeight);
	    
	    setTimeout(function(){
	    	chatbox.appendChild(createChatLi('Type your question in message box and send...', "incoming"));
		    chatbox.scrollTo(0, chatbox.scrollHeight);
	    }, 2000);
	    
		return;
	}else{
		$("#msgType").val('');
	}
	
	let type = 'GET';
	let url = '/getAnswer';
	let message = '';
	let form = $('#msg_form');
	let data = 'id='+value;
	// if ($(this).text() == 'Submit') {
	//     url = url;
	// }
	    
	// PASSING DATA TO FUNCTION
	SendAjaxRequestToServer(type, url, data, '', getAnswerResponse, 'spinner_button', 'submit_button');
}


function getAnswerResponse(response){
	
	if (response.status == 200 || response.status == '200') {
		var data = response.data;
		
		chatbox.appendChild(createChatLi(data.question, "outgoing"));
	    chatbox.scrollTo(0, chatbox.scrollHeight);
	    
	    setTimeout(function(){
	    	chatbox.appendChild(createChatLi(data.answer, "incoming"));
		    chatbox.scrollTo(0, chatbox.scrollHeight);
	    }, 2000);
	    
	}
	
}






const createChatLi = (message, className) => {
    // Create a chat <li> element with passed message and className
    const chatLi = document.createElement("li");
    chatLi.classList.add("chat", "mt-2", `${className}`);
    let chatContent = className === "outgoing" ? `<p></p>` : `<span class="material-symbols-outlined">smart_toy</span><p></p>`;
    chatLi.innerHTML = chatContent;
    chatLi.querySelector("p").textContent = message;
    return chatLi; // return chat <li> element
}



const handleChat = () => {
    userMessage = chatInput.value.trim(); 
    if(!userMessage) return;
    if($("#guestUserId").val() == ''){
    	toastr.error('Something went wrong...', '', {
            timeOut: 3000
        });
    	return;
    }
    
    

    chatbox.appendChild(createChatLi(userMessage, "outgoing"));
    chatbox.scrollTo(0, chatbox.scrollHeight);
    
    setTimeout(() => {
        const incomingChatLi = createChatLi("Thinking...", "incoming");
        chatbox.appendChild(incomingChatLi);
        chatbox.scrollTo(0, chatbox.scrollHeight);
        generateResponse(incomingChatLi);
    }, 600);
}

chatInput.addEventListener("keydown", (e) => {
    if(e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
        e.preventDefault();
        handleChat();
    }
});

sendChatBtn.addEventListener("click", handleChat);
closeBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"));
chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));