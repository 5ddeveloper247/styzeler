const webUrl = "https://api.styzeler.co.uk/styzeler-api/index.php/app/";


function redirect() {
    window.location.href = "./index.html";
    
}
 
$(function(){

    $('#login-form').submit(function(e){

      e.preventDefault();

      let username = $("#user-name").val();
      let password = $("#user-password").val();


      //Ajax call - Login
      $.ajax({
          type: 'post',
          url: webUrl + 'authentication',
          data: {
            "_UserName": username,
            "_Password": password
         },
          success: function(response) {
            console.log(response);
            
            if( response["_ReturnMessage"] === "Success" ) {
                // localStorage.setItem(STID, response["_StId"]);
                // localStorage.setItem(REGISTRATIONMODE, response["registrationModes"][0]["_ModeName"]);
                // localStorage.setItem(REGISTRATIONEMAIL, response["_EmailId"]);
                localStorage.setItem('ISADMACTIVE', "Yes");                
                window.location.href = "./dashboard.html";            
                
                
            }
            
            if ( response["_ReturnCode"] === "100") {
                
                $('.activated-modal').modal('show');
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