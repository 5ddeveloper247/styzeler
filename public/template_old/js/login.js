// let STID = 'loginstid';
// let REGISTRATIONMODE = 'loginmode';

//redirect to his profile
function redirect() {
    window.location.href = "./login.html";
}

// function forgetPassword() {
    
//      //Ajax call - Forget password
//       $.ajax({
//           type: 'post',
//           url: webUrl + '',
//           data: {
//             // "_EmailId": email,
//             // "_Password": password
//          },
//           success: function(response) {
//             console.log(response);
            
//             if( response["_ReturnMessage"] === "Success" ) {
//                 // localStorage.setItem(STID, response["_StId"]);
//                 // localStorage.setItem(REGISTRATIONMODE, response["registrationModes"][0]["_ModeName"]);
                
//                 $('.password-change-success').modal('show');
           
            
//             } else {
                
//                 $('.password-change-error').modal('show');
                
//             }
            
//             if ( response["_ReturnMessage"] === "Invalid Email Id. User not found!") {
                
//                 $('.invalid-email-modal').modal('show');
//                 // location.reload();

//             }
            
//             if ( response["_ReturnMessage"] === "Invalid Password.") {
                
//                 $('.invalid-password-modal').modal('show');
//                 // location.reload();

//             }

            

            
//           }
        
//       });
//       //End of Ajax call
    
// }

$(function(){

    $('#login-form').submit(function(e){

      e.preventDefault();

      let email = $("#user-email").val();
      let password = $("#user-password").val();


      //Ajax call - Login
      $.ajax({
          type: 'post',
          url: webUrl + 'login',
          data: {
            "_EmailId": email,
            "_Password": password
         },
          success: function(response) {
            console.log(response);
            
            if( response["_ReturnMessage"] === "Success" ) {
                localStorage.setItem(STID, response["_StId"]);
                localStorage.setItem(REGISTRATIONMODE, response["registrationModes"][0]["_ModeName"]);
                localStorage.setItem(REGISTRATIONEMAIL, response["_EmailId"]);
                // localStorage.setItem(ISACTIVE, response["_IsActive"]);
            
           
            
                //Flow based on mode
                let regMode = response.registrationModes[0]['_ModeName'];

                if( regMode === "Wedding Stylist" || regMode === "Hairstylist" || regMode === "Barber" || regMode === "Beautician") {
          
                    window.location.href = "./profile.html?e=success";


                } else {
                    window.location.href = "./owner-profile.html?e=success";

                }
            }
            
            if ( response["_ReturnMessage"] === "Invalid Email Id. User not found!") {
                
                $('.invalid-email-modal').modal('show');
                // location.reload();

            }
            
            if ( response["_ReturnMessage"] === "Invalid Password.") {
                
                $('.invalid-password-modal').modal('show');
                // location.reload();

            }

            

            
          }
        
      });
      //End of Ajax call

    });
  
});