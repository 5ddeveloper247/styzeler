function redirect() {
    window.location.href = "./contact-us.html";
}

$(function(){

    $('#enquiry-form').submit(function(e){
        
        e.preventDefault();
        
        let name = $("#name").val();
        let email = $("#email").val();
        let telephone = $("#telephone").val();
        let message = $("#message").val();
        // alert(name);
        
        //Ajax call - Jobs
        $.ajax({
            type: 'post',
            url: webUrl + 'submitenquiryform',
            data: {
                "_SenderName" : name,
                "_SenderEmail" : email,
                "_SenderTelephone" : telephone,
                "_SenderMessage" : message
            },
            success: function(response) {
                console.log(response);
                
                if ( response["_ReturnMessage"] === "Success") {
                
                    $('.success-modal').modal('show');

                }
                
                //Name Validation
                if ( response["_ReturnMessage"] === "Please enter your name.") {
                    $('.error-modal').modal('show');
                    $('.error-message').append('Please enter your name.');

                }
                
                //Email Validation
                if ( response["_ReturnMessage"] === "Please enter your email") {
                    $('.error-modal').modal('show');
                    $('.error-message').append('Please enter your email id.');

                }
                
                //Email Validation
                if ( response["_ReturnMessage"] === "Please enter your telephone") {
                    $('.error-modal').modal('show');
                    $('.error-message').append('Please enter your telephone.');

                }
                
                //Email Validation
                if ( response["_ReturnMessage"] === "Please enter your message") {
                    $('.error-modal').modal('show');
                    $('.error-message').append('Please enter your message.');

                }
            
            }
        
        });
        //End of Ajax call



    })



  

});