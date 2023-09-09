const webUrl = "https://api.styzeler.co.uk/styzeler-api/index.php/app/";
if(localStorage.getItem('ISADMACTIVE') != "Yes") {
    window.location.href = "../index.html";
}

//Ajax call to get emails
$(function() {

    //get avaliable salon space
    $.ajax({
        type: 'post',
        url: webUrl + 'getenquiries',
        data: {
            
        },
        success: function(response) {

            console.log(response);
            
            $.each( response.enquiries, function(i){

                //for salonspaces content

                $(".email-details").append('<div class="col-3" style="border-top: 1px solid grey;">'  + 
                    '<p>' + response.enquiries[i]['_SenderName'] + '</p>' +
                    '</div>' +
                    '<div class="col-2" style="border-top: 1px solid grey;">'  +
                        '<p>' + response.enquiries[i]['_SenderEmail'] + '</p>' +
                    '</div>' +
                    '<div class="col-2" style="border-top: 1px solid grey;">'  +
                        '<p>' + response.enquiries[i]['_SenderTelephone'] + '</p>' +
                    '</div>' +
                    '<div class="col-3" style="border-top: 1px solid grey;">'  +
                        '<p>' + response.enquiries[i]['_SenderMessage'] + '</p>' +
                    '</div>' +
                    '<div class="col-2" style="border-top: 1px solid grey;">' +
                        // '<p>' + response.enquiries[i]['_SenderNDate'] + '</p>' +
                '</div><hr/>');

                

            });
        }
    });
});