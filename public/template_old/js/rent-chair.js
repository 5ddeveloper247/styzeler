let CHAIRID = "chairid";

// function rentChair(id) {
//     localStorage.setItem(CHAIRID, id);
//     window.location.href = "./rent-chair.html?e=success";

// };


//Ajax call to get getavailablesalonspace
$(function() {

    $('rent-chair-form').submit(function(e){

        let chairId = localStorage.getItem(CHAIRID);
        let name = $("#applicant-name").val();
        let address = $("#applicant-address").val();
        let country = $("#applicant-country").val();
        let phone = $("#applicant-mobile").val();
        let email = $("applicant-email").val();

    });

    //get avaliable salon space
    // $.ajax({
    //     type: 'post',
    //     url: webUrl + '',
    //     data: {
            
    //     },
    //     success: function(response) {

    //         console.log(response);
            
    //         $.each( response.salonSpaces, function(i){

    //             //for salonspaces content
    //             console.log(response.salonSpaces[i]);
                

    //         });
    //     }
    // });
});