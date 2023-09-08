let USEREMAIL = 'useremail';
let FORGOTPASSWORD = 'forgotpassword';

//redirect to his profile
function redirect() {
    window.location.href = "./login.html";
    localStorage.removeItem(USEREMAIL);
    localStorage.removeItem(FORGOTPASSWORD);
}


$(function(){

    $('#forgot-password-form').submit(function(e){

      e.preventDefault();

      let email = $("#user-email").val();
      let password = $("#user-password").val();
      
      localStorage.setItem(USEREMAIL,email);
      localStorage.setItem(FORGOTPASSWORD,password);


      //Ajax call - Forget password
      $.ajax({
          type: 'post',
          url: webUrl + 'forgotpassword',
          data: {
            "_EmailId": email,
            "_Password": password
         },
          success: function(response) {
            console.log(response);
            
            if( response["_ReturnMessage"] === "Success" ) {
            //     // localStorage.setItem(STID, response["_StId"]);
            //     // localStorage.setItem(REGISTRATIONMODE, response["registrationModes"][0]["_ModeName"]);
                
                $('.password-change-success').modal('show');
           
            
            } else {
                
                 $('.password-change-error').modal('show');
                
             }
            
            // if ( response["_ReturnMessage"] === "Invalid Email Id. User not found!") {
                
            //     $('.invalid-email-modal').modal('show');
            //     // location.reload();

            // }
            
            // if ( response["_ReturnMessage"] === "Invalid Password.") {
                
            //     $('.invalid-password-modal').modal('show');
            //     // location.reload();

            // }

            

            
          }
        
      });
      //End of Ajax call

    });
    
    $('#otp-form').submit(function(e){

      e.preventDefault();

      let otp = $("#user-otp").val();

      let useremail = localStorage.getItem(USEREMAIL);
      let userpassword = localStorage.getItem(FORGOTPASSWORD);


      //Ajax call - Forget password
      $.ajax({
          type: 'post',
          url: webUrl + 'verifyandchangepassword',
          data: {
            "_OTP" : otp,
            "_EmailId": useremail,
            "_Password": userpassword
         },
          success: function(response) {
            console.log(response);
            
            if( response["_ReturnMessage"] === "Success" ) {
            //     // localStorage.setItem(STID, response["_StId"]);
            //     // localStorage.setItem(REGISTRATIONMODE, response["registrationModes"][0]["_ModeName"]);
                
                $('.success').modal('show');
                $('.password-change-success').modal('hide');
                // window.location.href="./login.html";

           
            
            } else {
                
                 $('.password-change-error').modal('show');
                 $('.password-change-success').modal('hide');

                
             }
            
            // if ( response["_ReturnMessage"] === "Invalid Email Id. User not found!") {
                
            //     $('.invalid-email-modal').modal('show');
            //     // location.reload();

            // }
            
            // if ( response["_ReturnMessage"] === "Invalid Password.") {
                
            //     $('.invalid-password-modal').modal('show');
            //     // location.reload();

            // }

            

            
          }
        
      });
      //End of Ajax call

    });
  
});