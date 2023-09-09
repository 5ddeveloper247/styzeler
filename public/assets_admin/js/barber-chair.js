const webUrl = "https://api.styzeler.co.uk/styzeler-api/index.php/app/";
if(localStorage.getItem('ISADMACTIVE') != "Yes") {
    window.location.href = "../index.html";
}
function redirectToPage() {
    // location.reload();
    window.location.href = "barber-chair.html";

}

//Active a chair
function activeChair(chairId) {
    //Ajax call - Login
    $.ajax({
        type: 'post',
        url: webUrl + 'activatesalonspace',
        data: {
          "_SalonChairId": chairId,
       },
        success: function(response) {
          console.log(response);
          if(response["_ReturnMessage"] == "Success") {
            redirectToPage();
          }  

        }
      
    });
    //End of Ajax call
}

let CHAIRID = "chairid";
let CHAIRMODE = "chairmode";
function getChair(mode,chairid) {
  localStorage.setItem(CHAIRID, chairid);
  localStorage.setItem(CHAIRMODE, mode);
  window.location.href = "./chair-details.html";
  //console.log( mode+" "+stid);
}


//Ajax call to get getavailablesalonspace
$(function() {

    let category = "Barber Chair";
    //need to get both barber chair and hairdressing chair

    //get avaliable salon space
    $.ajax({
        type: 'post',
        url: webUrl + 'getavailablesalonspace',
        data: {
            "_Category": category
        },
        success: function(response) {

            console.log(response);
            
            $.each( response.salonSpaces, function(i){

                //for salonspaces content
                console.log(response.salonSpaces[i]);


                $(".chair-details").append('<div class="col-3 pt-2" style="border-top: 1px solid grey;">' +
                  '<p>' + response.salonSpaces[i]['_Category'] + '</p>' +
                   '</div>' +
                    '<div class="col-3 pt-2" style="border-top: 1px solid grey;">' +
                        '<p>' + response.salonSpaces[i]['_SalonName'] +'</p>' +
                    '</div>' + 
                    '<div class="col-3 pt-2" style="border-top: 1px solid grey;">' +
                        '<p id="'+ response.salonSpaces[i]['_SalonChairId']  +'" onclick="getChair(\''+ response.salonSpaces[i]['_Category'] +'\', '+response.salonSpaces[i]['_SalonChairId']+')">Click to see details</p>' +
                    '</div>' +
                    '<div class="col-3 pt-2" style="border-top: 1px solid grey;">' +
                        // '<p id="' + response.salonSpaces[i]['_SalonChairId'] +'" onclick="activeChair(' + response.salonSpaces[i]['_SalonChairId'] + ');">Active</p>' +
                        '<p id="chair_' + i +'" ></p>' +

                '</div><hr/>');


                if(  response.salonSpaces[i]['_IsActive'] === "0" ) {
                    $("#chair_" + i ).append('<a onclick="activeChair(' + response.salonSpaces[i]['_SalonChairId'] + ');" style="color:red;">Active Now</a>');
                } else {
                    $("#chair_" + i ).append('<a style="color: green;">Activated</a>');

                }

                // $(".chair-row")
                // //$(".col-6")
                //   .append('<div class="col-lg-6 mt-5"> '+ '<a id="' + response.salonSpaces[i]["_SalonChairId"] + '" onclick="rentChair(' + response.salonSpaces[i]["_SalonChairId"] +')">' +
                //   '<div class="row">  <div class="col-6 therapist-content p-3 px-4">'+'<p>' + response.salonSpaces[i]["_Category"]+ '</p>'+
                //   '<p><strong>Name: </strong>' + response.salonSpaces[i]["_SalonName"] + '</p>' +
                //   '<p><strong>Address: </strong>' + response.salonSpaces[i]["_SalonAddress"] + '</p>' +
                //   '<p><strong>Country: </strong>' + response.salonSpaces[i]["_SalonCountry"] + '</p>' +
                //   '<p><strong>Email: </strong>' + response.salonSpaces[i]["_SalonEmailId"] + '</p>' + 
                //   '<p><strong>Mobile: </strong>' + response.salonSpaces[i]["_SalonMobileNumber"] + '</p>' + 
                //   '<p><strong>Postal Code: </strong>' + response.salonSpaces[i]["_SalonPostalCode"] + '</p>' + 
                //   '<p><strong>Space Description: </strong>' + response.salonSpaces[i]["_SpaceDescription"] + '</p>'+
                //    '</div>' + 
                //    '<div class="col-6"> <div class="therapist-content-frame p-2 h-100" id="salon-space">' +
                //         '<img id="salon-image-id-' + i + '" alt="" width="100%" height="100%">'+
                //    '</div>'+                          
                //   '</div>' +
                //    '</div>'+ '</a>' +
                //    '</div>'  );

                //    //for salon image 
                //    $.ajax({
                //     type: 'post',
                //     url:  webUrl + 'getimage',
                //     data: ({
                //         // "_ImageId": "73"
                //         "_ImageId": response.salonSpaces[i]["_SpaceImgId1"]
                //     }),
                //     success: function (salonImageResponse) {

                //         //console.log(galleryResponse["_ImageContent"]);

                //         $("#salon-image-id-" + i).attr("src", "data:image;base64," + salonImageResponse["_ImageContent"]);

                //     }
                // });

            });
        }
    });
});