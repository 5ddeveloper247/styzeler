let CHAIRID = "chairid";
// let STID = "loginstid";


function rentChair(id) {
    // localStorage.setItem(CHAIRID, id);
    // window.location.href = "./rent-chair.html?e=success";

    var loggedStatus = localStorage.getItem(STID);


  if (typeof loggedStatus !== 'undefined' && loggedStatus !== null) {

    let today = new Date();
    let date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

    $.ajax({
        type: 'post',
        url: webUrl + 'rentsalonchair',
        data: {
            "_SalonChairId" : id,
            "_ApplicantStId": localStorage.getItem(STID),
            "_BookDate": date,
            "_BookTime": time,
            "_Status":"booked"
        },
        success: function(response) {

            console.log(response);

            if(response['_ReturnCode'] != 999) {
                $('.success-modal').modal('show');
            } else {
                $('.fail-modal').modal('show');
            }

        }
    });

  }

  else {
    $('.not-loggedin-modal').modal('show');
  }


};


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
            
                if(response.salonSpaces[i]['_IsActive'] === "1") {
                    
                    if(response.salonSpaces[i]['_DailyRate'] > 0 ) {
                        
                        $(".chair-row")
                        //$(".col-6")
                        //   .append('<div class="col-lg-6 mt-5"> '+ '<a id="' + response.salonSpaces[i]["_SalonChairId"] + '" onclick="rentChair(' + response.salonSpaces[i]["_SalonChairId"] +')">' +
                          .append('<div class="col-lg-6 mt-5"> '+ '<div id="' + response.salonSpaces[i]["_SalonChairId"] + '" >' +
                          '<div class="row">  <div class="col-md-6 therapist-content p-3 px-4">'+'<h4>' + response.salonSpaces[i]["_Category"]+ '</h4>'+
                          '<p><strong>'+'Rent as you go'+'</strong></p>'+
                          '<p><strong>'+'Daily rent £'+response.salonSpaces[i]['_DailyRate']+'</strong></p>'+
                        //   '<p>'+'Or Hourly rent depends what the salon owner feels more confortble with'+'</p>'+
                          '<p><strong>Name: </strong>' + response.salonSpaces[i]["_SalonName"] + '</p>' +
                          '<p><strong>Address: </strong>' + response.salonSpaces[i]["_SalonAddress"] + '</p>' +
                          '<p><strong>Country: </strong>' + response.salonSpaces[i]["_SalonCountry"] + '</p>' +
                          '<p><strong>County: </strong>' + response.salonSpaces[i]["_SalonCounty"] + '</p>' +
                          '<p><strong>Email: </strong><a href="mailto:' + response.salonSpaces[i]["_SalonEmailId"] + '">' + response.salonSpaces[i]["_SalonEmailId"] + '</a><span class="customTooltip"> <span class="exclamation"> <i class="fa fa-exclamation" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i> </span> <span class="tooltiptext">Use the email to contact salon owner for more info!</span> </span> </p>' + 
                          '<p><strong>Mobile: </strong>' + response.salonSpaces[i]["_SalonMobileNumber"] + ' </p>' + 
                          '<p><strong>Postal Code: </strong>' + response.salonSpaces[i]["_SalonPostalCode"] + '</p>' + 
                          '<p><strong>Space Description: </strong>' + response.salonSpaces[i]["_SpaceDescription"] + '</p>'+
                           '</div>' + 
                           '<div class="col-md-6"> <div class="therapist-content-frame p-2" id="salon-space">' +
                            '<div id="carouselExampleControls_'+ i +'" class="carousel slide" data-ride="carousel">' +
                            '<div class="carousel-inner">' +
                                '<div class="carousel-item active">' +
                                '<img id="salon-image-id-1' + i + '" alt="" width="100%" height="400px">'+
    
                                //    '<img class="d-block w-100" src="..." alt="First slide">' +
                                '</div>' +
                                '<div class="carousel-item">' +
                                '<img id="salon-image-id-2' + i + '" alt="" width="100%" height="400px">'+
    
                                //    '<img class="d-block w-100" src="..." alt="Second slide">'
                                '</div>' +
                                '<div class="carousel-item">' +
                                '<img id="salon-image-id-3' + i + '" alt="" width="100%" height="400px">'+
    
                                //    '<img class="d-block w-100" src="..." alt="Third slide">'
                                '</div>' +
                            '</div>' +
                       
                        '</div>' +
    
                        
                        '</div>'+ 
                        '<div class="mt-4">' +
                            '<a class="carousel-control-prev-1" href="#carouselExampleControls_'+ i +'" role="button" data-slide="prev">' +
                                '<span class="carousel-control-prev-icon" aria-hidden="true"></span>' +
                                '<span class="sr-only">Previous</span>' +
                            '</a>' +
                            '<a class="carousel-control-next-1" style="float:right" href="#carouselExampleControls_'+ i +'" role="button" data-slide="next">' +
                                '<span class="carousel-control-next-icon" aria-hidden="true"></span>' +
                                '<span class="sr-only">Next</span>' +
                            '</a>' +  
                      '</div>' +          
                      '</div>' +
                           '</div>'+ '</div>' +
                           '</div>'  );
                           
                    }
                    else if(response.salonSpaces[i]['_HourlyRate'] > 0 ) { 
                        
                        $(".chair-row")
                        //$(".col-6")
                        //   .append('<div class="col-lg-6 mt-5"> '+ '<a id="' + response.salonSpaces[i]["_SalonChairId"] + '" onclick="rentChair(' + response.salonSpaces[i]["_SalonChairId"] +')">' +
                          .append('<div class="col-lg-6 mt-5"> '+ '<div id="' + response.salonSpaces[i]["_SalonChairId"] + '" >' +
                          '<div class="row">  <div class="col-md-6 therapist-content p-3 px-4">'+'<h4>' + response.salonSpaces[i]["_Category"]+ '</h4>'+
                          '<p><strong>'+'Rent as you go'+'</strong></p>'+
                          '<p><strong>'+'Hourly rent £'+response.salonSpaces[i]['_HourlyRate']+'</strong></p>'+
                        //   '<p>'+'Or Daily rent depends what the salon owner feels more confortble with'+'</p>'+
                          '<p><strong>Name: </strong>' + response.salonSpaces[i]["_SalonName"] + '</p>' +
                          '<p><strong>Address: </strong>' + response.salonSpaces[i]["_SalonAddress"] + '</p>' +
                          '<p><strong>Country: </strong>' + response.salonSpaces[i]["_SalonCountry"] + '</p>' +
                          '<p><strong>County: </strong>' + response.salonSpaces[i]["_SalonCounty"] + '</p>' +
                          '<p><strong>Email: </strong><a href="mailto:' + response.salonSpaces[i]["_SalonEmailId"] + '">' + response.salonSpaces[i]["_SalonEmailId"] + '</a><span class="customTooltip"> <span class="exclamation"> <i class="fa fa-exclamation" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i> </span> <span class="tooltiptext">Use the email to contact salon owner for more info!</span> </span> </p>' + 
                          '<p><strong>Mobile: </strong>' + response.salonSpaces[i]["_SalonMobileNumber"] + ' </p>' + 
                          '<p><strong>Postal Code: </strong>' + response.salonSpaces[i]["_SalonPostalCode"] + '</p>' + 
                          '<p><strong>Space Description: </strong>' + response.salonSpaces[i]["_SpaceDescription"] + '</p>'+
                           '</div>' + 
                           '<div class="col-md-6"> <div class="therapist-content-frame p-2" id="salon-space">' +
                        '<div id="carouselExampleControls_'+ i +'" class="carousel slide" data-ride="carousel">' +
                        '<div class="carousel-inner">' +
                            '<div class="carousel-item active">' +
                            '<img id="salon-image-id-1' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="First slide">' +
                            '</div>' +
                            '<div class="carousel-item">' +
                            '<img id="salon-image-id-2' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="Second slide">'
                            '</div>' +
                            '<div class="carousel-item">' +
                            '<img id="salon-image-id-3' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="Third slide">'
                            '</div>' +
                        '</div>' +
                   
                    '</div>' +

                    
                    '</div>'+ 
                    '<div class="mt-4">' +
                        '<a class="carousel-control-prev-1" href="#carouselExampleControls_'+ i +'" role="button" data-slide="prev">' +
                            '<span class="carousel-control-prev-icon" aria-hidden="true"></span>' +
                            '<span class="sr-only">Previous</span>' +
                        '</a>' +
                        '<a class="carousel-control-next-1" style="float:right" href="#carouselExampleControls_'+ i +'" role="button" data-slide="next">' +
                            '<span class="carousel-control-next-icon" aria-hidden="true"></span>' +
                            '<span class="sr-only">Next</span>' +
                        '</a>' +  
                  '</div>' +          
                  '</div>' +
                           '</div>'+ '</div>' +
                           '</div>'  );
                           
                    }
                    else if(response.salonSpaces[i]['_MonthlyRate'] > 0 ) {
                        
                        $(".chair-row")
                        //$(".col-6")
                        //   .append('<div class="col-lg-6 mt-5"> '+ '<a id="' + response.salonSpaces[i]["_SalonChairId"] + '" onclick="rentChair(' + response.salonSpaces[i]["_SalonChairId"] +')">' +
                          .append('<div class="col-lg-6 mt-5"> '+ '<div id="' + response.salonSpaces[i]["_SalonChairId"] + '" >' +
                          '<div class="row">  <div class="col-md-6 therapist-content p-3 px-4">'+'<h4>' + response.salonSpaces[i]["_Category"]+ '</h4>'+
                          '<p><strong>'+'Rent&let'+'</strong></p>'+
                          '<p><strong>'+'Monthly rent £'+response.salonSpaces[i]['_MonthlyRate']+'</strong></p>'+
                        //   '<p>'+'Or Weekly rent depends what the salon owner feels more confortble with'+'</p>'+
                          '<p><strong>Name: </strong>' + response.salonSpaces[i]["_SalonName"] + '</p>' +
                          '<p><strong>Address: </strong>' + response.salonSpaces[i]["_SalonAddress"] + '</p>' +
                          '<p><strong>Country: </strong>' + response.salonSpaces[i]["_SalonCountry"] + '</p>' +
                          '<p><strong>County: </strong>' + response.salonSpaces[i]["_SalonCounty"] + '</p>' +
                          '<p><strong>Email: </strong><a href="mailto:' + response.salonSpaces[i]["_SalonEmailId"] + '">' + response.salonSpaces[i]["_SalonEmailId"] + '</a><span class="customTooltip"> <span class="exclamation"> <i class="fa fa-exclamation" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i> </span> <span class="tooltiptext">Use the email to contact salon owner for more info!</span> </span> </p>' + 
                          '<p><strong>Mobile: </strong>' + response.salonSpaces[i]["_SalonMobileNumber"] + ' </p>' + 
                          '<p><strong>Postal Code: </strong>' + response.salonSpaces[i]["_SalonPostalCode"] + '</p>' + 
                          '<p><strong>Space Description: </strong>' + response.salonSpaces[i]["_SpaceDescription"] + '</p>'+
                           '</div>' + 
                           '<div class="col-md-6"> <div class="therapist-content-frame p-2" id="salon-space">' +
                        '<div id="carouselExampleControls_'+ i +'" class="carousel slide" data-ride="carousel">' +
                        '<div class="carousel-inner">' +
                            '<div class="carousel-item active">' +
                            '<img id="salon-image-id-1' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="First slide">' +
                            '</div>' +
                            '<div class="carousel-item">' +
                            '<img id="salon-image-id-2' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="Second slide">'
                            '</div>' +
                            '<div class="carousel-item">' +
                            '<img id="salon-image-id-3' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="Third slide">'
                            '</div>' +
                        '</div>' +
                   
                    '</div>' +

                    
                    '</div>'+ 
                    '<div class="mt-4">' +
                        '<a class="carousel-control-prev-1" href="#carouselExampleControls_'+ i +'" role="button" data-slide="prev">' +
                            '<span class="carousel-control-prev-icon" aria-hidden="true"></span>' +
                            '<span class="sr-only">Previous</span>' +
                        '</a>' +
                        '<a class="carousel-control-next-1" style="float:right" href="#carouselExampleControls_'+ i +'" role="button" data-slide="next">' +
                            '<span class="carousel-control-next-icon" aria-hidden="true"></span>' +
                            '<span class="sr-only">Next</span>' +
                        '</a>' +  
                  '</div>' +          
                  '</div>' +
                           '</div>'+ '</div>' +
                           '</div>'  );
                           
                    }
                    else if(response.salonSpaces[i]['_WeeklyRate'] > 0 ) {
                        
                        $(".chair-row")
                        //$(".col-6")
                        //   .append('<div class="col-lg-6 mt-5"> '+ '<a id="' + response.salonSpaces[i]["_SalonChairId"] + '" onclick="rentChair(' + response.salonSpaces[i]["_SalonChairId"] +')">' +
                          .append('<div class="col-lg-6 mt-5"> '+ '<div id="' + response.salonSpaces[i]["_SalonChairId"] + '" >' +
                          '<div class="row">  <div class="col-md-6 therapist-content p-3 px-4">'+'<h4>' + response.salonSpaces[i]["_Category"]+ '</h4>'+
                          '<p><strong>'+'Rent&let'+'</strong></p>'+
                          '<p><strong>'+'Weekly rent £'+response.salonSpaces[i]['_WeeklyRate']+'</strong></p>'+
                        //   '<p>'+'Or Monthly rent depends what the salon owner feels more confortble with'+'</p>'+
                          '<p><strong>Name: </strong>' + response.salonSpaces[i]["_SalonName"] + '</p>' +
                        //   '<p><strong>Name: </strong>' + response.salonSpaces[i]["_SalonName"] + '</p>' +
                          '<p><strong>Address: </strong>' + response.salonSpaces[i]["_SalonAddress"] + '</p>' +
                          '<p><strong>Country: </strong>' + response.salonSpaces[i]["_SalonCountry"] + '</p>' +
                          '<p><strong>County: </strong>' + response.salonSpaces[i]["_SalonCounty"] + '</p>' +
                          '<p><strong>Email: </strong><a href="mailto:' + response.salonSpaces[i]["_SalonEmailId"] + '">' + response.salonSpaces[i]["_SalonEmailId"] + '</a><span class="customTooltip"> <span class="exclamation"> <i class="fa fa-exclamation" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i> </span> <span class="tooltiptext">Use the email to contact salon owner for more info!</span> </span> </p>' + 
                          '<p><strong>Mobile: </strong>' + response.salonSpaces[i]["_SalonMobileNumber"] + ' </p>' + 
                          '<p><strong>Postal Code: </strong>' + response.salonSpaces[i]["_SalonPostalCode"] + '</p>' + 
                          '<p><strong>Space Description: </strong>' + response.salonSpaces[i]["_SpaceDescription"] + '</p>'+
                           '</div>' + 
                           '<div class="col-md-6"> <div class="therapist-content-frame p-2" id="salon-space">' +
                        '<div id="carouselExampleControls_'+ i +'" class="carousel slide" data-ride="carousel">' +
                        '<div class="carousel-inner">' +
                            '<div class="carousel-item active">' +
                            '<img id="salon-image-id-1' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="First slide">' +
                            '</div>' +
                            '<div class="carousel-item">' +
                            '<img id="salon-image-id-2' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="Second slide">'
                            '</div>' +
                            '<div class="carousel-item">' +
                            '<img id="salon-image-id-3' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="Third slide">'
                            '</div>' +
                        '</div>' +
                   
                    '</div>' +

                    
                    '</div>'+ 
                    '<div class="mt-4">' +
                        '<a class="carousel-control-prev-1" href="#carouselExampleControls_'+ i +'" role="button" data-slide="prev">' +
                            '<span class="carousel-control-prev-icon" aria-hidden="true"></span>' +
                            '<span class="sr-only">Previous</span>' +
                        '</a>' +
                        '<a class="carousel-control-next-1" style="float:right" href="#carouselExampleControls_'+ i +'" role="button" data-slide="next">' +
                            '<span class="carousel-control-next-icon" aria-hidden="true"></span>' +
                            '<span class="sr-only">Next</span>' +
                        '</a>' +  
                  '</div>' +          
                  '</div>' +
                           '</div>'+ '</div>' +
                           '</div>'  );
                           
                    }
                    else {
                        
                        $(".chair-row")
                        //$(".col-6")
                        //   .append('<div class="col-lg-6 mt-5"> '+ '<a id="' + response.salonSpaces[i]["_SalonChairId"] + '" onclick="rentChair(' + response.salonSpaces[i]["_SalonChairId"] +')">' +
                          .append('<div class="col-lg-6 mt-5"> '+ '<div id="' + response.salonSpaces[i]["_SalonChairId"] + '" >' +
                          '<div class="row">  <div class="col-md-6 therapist-content p-3 px-4">'+'<p><strong>' + response.salonSpaces[i]["_Category"]+ '</strong></p>'+
                          '<p><strong>Name: </strong>' + response.salonSpaces[i]["_SalonName"] + '</p>' +
                          '<p><strong>Address: </strong>' + response.salonSpaces[i]["_SalonAddress"] + '</p>' +
                          '<p><strong>Country: </strong>' + response.salonSpaces[i]["_SalonCountry"] + '</p>' +
                          '<p><strong>County: </strong>' + response.salonSpaces[i]["_SalonCounty"] + '</p>' +
                          '<p><strong>Email: </strong><a href="mailto:' + response.salonSpaces[i]["_SalonEmailId"] + '">' + response.salonSpaces[i]["_SalonEmailId"] + '</a><span class="customTooltip"> <span class="exclamation"> <i class="fa fa-exclamation" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i> </span> <span class="tooltiptext">Use the email to contact salon owner for more info!</span> </span> </p>' + 
                          '<p><strong>Mobile: </strong>' + response.salonSpaces[i]["_SalonMobileNumber"] + ' </p>' + 
                          '<p><strong>Postal Code: </strong>' + response.salonSpaces[i]["_SalonPostalCode"] + '</p>' + 
                          '<p><strong>Space Description: </strong>' + response.salonSpaces[i]["_SpaceDescription"] + '</p>'+
                           '</div>' + 
                           '<div class="col-md-6"> <div class="therapist-content-frame p-2" id="salon-space">' +
                        '<div id="carouselExampleControls_'+ i +'" class="carousel slide" data-ride="carousel">' +
                        '<div class="carousel-inner">' +
                            '<div class="carousel-item active">' +
                            '<img id="salon-image-id-1' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="First slide">' +
                            '</div>' +
                            '<div class="carousel-item">' +
                            '<img id="salon-image-id-2' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="Second slide">'
                            '</div>' +
                            '<div class="carousel-item">' +
                            '<img id="salon-image-id-3' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="Third slide">'
                            '</div>' +
                        '</div>' +
                   
                    '</div>' +

                    
                    '</div>'+ 
                    '<div class="mt-4">' +
                        '<a class="carousel-control-prev-1" href="#carouselExampleControls_'+ i +'" role="button" data-slide="prev">' +
                            '<span class="carousel-control-prev-icon" aria-hidden="true"></span>' +
                            '<span class="sr-only">Previous</span>' +
                        '</a>' +
                        '<a class="carousel-control-next-1" style="float:right" href="#carouselExampleControls_'+ i +'" role="button" data-slide="next">' +
                            '<span class="carousel-control-next-icon" aria-hidden="true"></span>' +
                            '<span class="sr-only">Next</span>' +
                        '</a>' +  
                  '</div>' +          
                  '</div>' +
                           '</div>'+ '</div>' +
                           '</div>'  );
                   
                    }
                

                   //for salon image 
                   $.ajax({
                    type: 'post',
                    url:  webUrl + 'getimage',
                    data: ({
                        // "_ImageId": "73"
                        "_ImageId": response.salonSpaces[i]["_SpaceImgId1"]
                    }),
                    success: function (salonImageResponse) {

                        //console.log(galleryResponse["_ImageContent"]);

                        $("#salon-image-id-1" + i).attr("src", "data:image;base64," + salonImageResponse["_ImageContent"]);

                    }
                    });
                      $.ajax({
                    type: 'post',
                    url:  webUrl + 'getimage',
                    data: ({
                        // "_ImageId": "73"
                        "_ImageId": response.salonSpaces[i]["_SpaceImgId2"]
                    }),
                    success: function (salonImageResponse) {

                        //console.log(galleryResponse["_ImageContent"]);

                        $("#salon-image-id-2" + i).attr("src", "data:image;base64," + salonImageResponse["_ImageContent"]);

                    }
                });
                $.ajax({
                    type: 'post',
                    url:  webUrl + 'getimage',
                    data: ({
                        // "_ImageId": "73"
                        "_ImageId": response.salonSpaces[i]["_SpaceImgId3"]
                    }),
                    success: function (salonImageResponse) {

                        //console.log(galleryResponse["_ImageContent"]);

                        $("#salon-image-id-3" + i).attr("src", "data:image;base64," + salonImageResponse["_ImageContent"]);

                    }
                });
                }

                });
                
                
                
        }
    });
    
    
    
    // for hairdressing chair
    
    category = "Hairdressing Chair";
    
    
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
            
                if(response.salonSpaces[i]['_IsActive'] === "1") {
                    
                    if(response.salonSpaces[i]['_DailyRate'] > 0 ) {
                        
                        $(".chair-row")
                        //$(".col-6")
                        //   .append('<div class="col-lg-6 mt-5"> '+ '<a id="' + response.salonSpaces[i]["_SalonChairId"] + '" onclick="rentChair(' + response.salonSpaces[i]["_SalonChairId"] +')">' +
                          .append('<div class="col-lg-6 mt-5"> '+ '<div id="' + response.salonSpaces[i]["_SalonChairId"] + '" >' +
                          '<div class="row">  <div class="col-md-6 therapist-content p-3 px-4">'+'<h4>' + response.salonSpaces[i]["_Category"]+ '</h4>'+
                          '<p><strong>'+'Rent as you go'+'</strong></p>'+
                          '<p><strong>'+'Daily rent £'+response.salonSpaces[i]['_DailyRate']+'</strong></p>'+
                        //   '<p>'+'Or Hourly rent depends what the salon owner feels more confortble with'+'</p>'+
                          '<p><strong>Name: </strong>' + response.salonSpaces[i]["_SalonName"] + '</p>' +
                          '<p><strong>Address: </strong>' + response.salonSpaces[i]["_SalonAddress"] + '</p>' +
                          '<p><strong>Country: </strong>' + response.salonSpaces[i]["_SalonCountry"] + '</p>' +
                          '<p><strong>County: </strong>' + response.salonSpaces[i]["_SalonCounty"] + '</p>' +
                          '<p><strong>Email: </strong><a href="mailto:' + response.salonSpaces[i]["_SalonEmailId"] + '">' + response.salonSpaces[i]["_SalonEmailId"] + '</a><span class="customTooltip"> <span class="exclamation"> <i class="fa fa-exclamation" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i> </span> <span class="tooltiptext">Use the email to contact salon owner for more info!</span> </span> </p>' + 
                          '<p><strong>Mobile: </strong>' + response.salonSpaces[i]["_SalonMobileNumber"] + ' </p>' + 
                          '<p><strong>Postal Code: </strong>' + response.salonSpaces[i]["_SalonPostalCode"] + '</p>' + 
                          '<p><strong>Space Description: </strong>' + response.salonSpaces[i]["_SpaceDescription"] + '</p>'+
                           '</div>' + 
                                  '<div class="col-md-6"> <div class="therapist-content-frame p-2" id="salon-space">' +
                        '<div id="carouselExampleControls_'+ i +'" class="carousel slide" data-ride="carousel">' +
                        '<div class="carousel-inner">' +
                            '<div class="carousel-item active">' +
                            '<img id="salon-image-id-1' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="First slide">' +
                            '</div>' +
                            '<div class="carousel-item">' +
                            '<img id="salon-image-id-2' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="Second slide">'
                            '</div>' +
                            '<div class="carousel-item">' +
                            '<img id="salon-image-id-3' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="Third slide">'
                            '</div>' +
                        '</div>' +
                   
                    '</div>' +

                    
                    '</div>'+ 
                    '<div class="mt-4">' +
                        '<a class="carousel-control-prev-1" href="#carouselExampleControls_'+ i +'" role="button" data-slide="prev">' +
                            '<span class="carousel-control-prev-icon" aria-hidden="true"></span>' +
                            '<span class="sr-only">Previous</span>' +
                        '</a>' +
                        '<a class="carousel-control-next-1" style="float:right" href="#carouselExampleControls_'+ i +'" role="button" data-slide="next">' +
                            '<span class="carousel-control-next-icon" aria-hidden="true"></span>' +
                            '<span class="sr-only">Next</span>' +
                        '</a>' +  
                  '</div>' +          
                  '</div>' +
                           '</div>'+ '</div>' +
                           '</div>'  );
                           
                    }
                    else if(response.salonSpaces[i]['_HourlyRate'] > 0 ) { 
                        
                        $(".chair-row")
                        //$(".col-6")
                        //   .append('<div class="col-lg-6 mt-5"> '+ '<a id="' + response.salonSpaces[i]["_SalonChairId"] + '" onclick="rentChair(' + response.salonSpaces[i]["_SalonChairId"] +')">' +
                          .append('<div class="col-lg-6 mt-5"> '+ '<div id="' + response.salonSpaces[i]["_SalonChairId"] + '" >' +
                          '<div class="row">  <div class="col-md-6 therapist-content p-3 px-4">'+'<h4>' + response.salonSpaces[i]["_Category"]+ '</h4>'+
                          '<p><strong>'+'Rent as you go'+'</strong></p>'+
                          '<p><strong>'+'Hourly rent £'+response.salonSpaces[i]['_HourlyRate']+'</strong></p>'+
                        //   '<p>'+'Or Daily rent depends what the salon owner feels more confortble with'+'</p>'+
                          '<p><strong>Name: </strong>' + response.salonSpaces[i]["_SalonName"] + '</p>' +
                          '<p><strong>Address: </strong>' + response.salonSpaces[i]["_SalonAddress"] + '</p>' +
                          '<p><strong>Country: </strong>' + response.salonSpaces[i]["_SalonCountry"] + '</p>' +
                          '<p><strong>County: </strong>' + response.salonSpaces[i]["_SalonCounty"] + '</p>' +
                          '<p><strong>Email: </strong><a href="mailto:' + response.salonSpaces[i]["_SalonEmailId"] + '">' + response.salonSpaces[i]["_SalonEmailId"] + '</a><span class="customTooltip"> <span class="exclamation"> <i class="fa fa-exclamation" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i> </span> <span class="tooltiptext">Use the email to contact salon owner for more info!</span> </span> </p>' + 
                          '<p><strong>Mobile: </strong>' + response.salonSpaces[i]["_SalonMobileNumber"] + ' </p>' + 
                          '<p><strong>Postal Code: </strong>' + response.salonSpaces[i]["_SalonPostalCode"] + '</p>' + 
                          '<p><strong>Space Description: </strong>' + response.salonSpaces[i]["_SpaceDescription"] + '</p>'+
                           '</div>' + 
                                  '<div class="col-md-6"> <div class="therapist-content-frame p-2" id="salon-space">' +
                        '<div id="carouselExampleControls_'+ i +'" class="carousel slide" data-ride="carousel">' +
                        '<div class="carousel-inner">' +
                            '<div class="carousel-item active">' +
                            '<img id="salon-image-id-1' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="First slide">' +
                            '</div>' +
                            '<div class="carousel-item">' +
                            '<img id="salon-image-id-2' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="Second slide">'
                            '</div>' +
                            '<div class="carousel-item">' +
                            '<img id="salon-image-id-3' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="Third slide">'
                            '</div>' +
                        '</div>' +
                   
                    '</div>' +

                    
                    '</div>'+ 
                    '<div class="mt-4">' +
                        '<a class="carousel-control-prev-1" href="#carouselExampleControls_'+ i +'" role="button" data-slide="prev">' +
                            '<span class="carousel-control-prev-icon" aria-hidden="true"></span>' +
                            '<span class="sr-only">Previous</span>' +
                        '</a>' +
                        '<a class="carousel-control-next-1" style="float:right" href="#carouselExampleControls_'+ i +'" role="button" data-slide="next">' +
                            '<span class="carousel-control-next-icon" aria-hidden="true"></span>' +
                            '<span class="sr-only">Next</span>' +
                        '</a>' +  
                  '</div>' +          
                  '</div>' +
                           '</div>'+ '</div>' +
                           '</div>'  );
                           
                    }
                    else if(response.salonSpaces[i]['_MonthlyRate'] > 0 ) {
                        
                        $(".chair-row")
                        //$(".col-6")
                        //   .append('<div class="col-lg-6 mt-5"> '+ '<a id="' + response.salonSpaces[i]["_SalonChairId"] + '" onclick="rentChair(' + response.salonSpaces[i]["_SalonChairId"] +')">' +
                          .append('<div class="col-lg-6 mt-5"> '+ '<div id="' + response.salonSpaces[i]["_SalonChairId"] + '" >' +
                          '<div class="row">  <div class="col-md-6 therapist-content p-3 px-4">'+'<h4>' + response.salonSpaces[i]["_Category"]+ '</h4>'+
                          '<p><strong>'+'Rent&let'+'</strong></p>'+
                          '<p><strong>'+'Monthly rent £'+response.salonSpaces[i]['_MonthlyRate']+'</strong></p>'+
                        //   '<p>'+'Or Weekly rent depends what the salon owner feels more confortble with'+'</p>'+
                          '<p><strong>Name: </strong>' + response.salonSpaces[i]["_SalonName"] + '</p>' +
                          '<p><strong>Address: </strong>' + response.salonSpaces[i]["_SalonAddress"] + '</p>' +
                          '<p><strong>Country: </strong>' + response.salonSpaces[i]["_SalonCountry"] + '</p>' +
                          '<p><strong>County: </strong>' + response.salonSpaces[i]["_SalonCounty"] + '</p>' +
                          '<p><strong>Email: </strong><a href="mailto:' + response.salonSpaces[i]["_SalonEmailId"] + '">' + response.salonSpaces[i]["_SalonEmailId"] + '</a><span class="customTooltip"> <span class="exclamation"> <i class="fa fa-exclamation" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i> </span> <span class="tooltiptext">Use the email to contact salon owner for more info!</span> </span> </p>' + 
                          '<p><strong>Mobile: </strong>' + response.salonSpaces[i]["_SalonMobileNumber"] + ' </p>' + 
                          '<p><strong>Postal Code: </strong>' + response.salonSpaces[i]["_SalonPostalCode"] + '</p>' + 
                          '<p><strong>Space Description: </strong>' + response.salonSpaces[i]["_SpaceDescription"] + '</p>'+
                           '</div>' + 
                                  '<div class="col-md-6"> <div class="therapist-content-frame p-2" id="salon-space">' +
                        '<div id="carouselExampleControls_'+ i +'" class="carousel slide" data-ride="carousel">' +
                        '<div class="carousel-inner">' +
                            '<div class="carousel-item active">' +
                            '<img id="salon-image-id-1' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="First slide">' +
                            '</div>' +
                            '<div class="carousel-item">' +
                            '<img id="salon-image-id-2' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="Second slide">'
                            '</div>' +
                            '<div class="carousel-item">' +
                            '<img id="salon-image-id-3' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="Third slide">'
                            '</div>' +
                        '</div>' +
                   
                    '</div>' +

                    
                    '</div>'+ 
                    '<div class="mt-4">' +
                        '<a class="carousel-control-prev-1" href="#carouselExampleControls_'+ i +'" role="button" data-slide="prev">' +
                            '<span class="carousel-control-prev-icon" aria-hidden="true"></span>' +
                            '<span class="sr-only">Previous</span>' +
                        '</a>' +
                        '<a class="carousel-control-next-1" style="float:right" href="#carouselExampleControls_'+ i +'" role="button" data-slide="next">' +
                            '<span class="carousel-control-next-icon" aria-hidden="true"></span>' +
                            '<span class="sr-only">Next</span>' +
                        '</a>' +  
                  '</div>' +          
                  '</div>' +
                           '</div>'+ '</div>' +
                           '</div>'  );
                           
                    }
                    else if(response.salonSpaces[i]['_WeeklyRate'] > 0 ) {
                        
                        $(".chair-row")
                        //$(".col-6")
                        //   .append('<div class="col-lg-6 mt-5"> '+ '<a id="' + response.salonSpaces[i]["_SalonChairId"] + '" onclick="rentChair(' + response.salonSpaces[i]["_SalonChairId"] +')">' +
                          .append('<div class="col-lg-6 mt-5"> '+ '<div id="' + response.salonSpaces[i]["_SalonChairId"] + '" >' +
                          '<div class="row">  <div class="col-md-6 therapist-content p-3 px-4">'+'<h4>' + response.salonSpaces[i]["_Category"]+ '</h4>'+
                          '<p><strong>'+'Rent&let'+'</strong></p>'+
                          '<p><strong>'+'Weekly rent £'+response.salonSpaces[i]['_WeeklyRate']+'</strong></p>'+
                        //   '<p>'+'Or Monthly rent depends what the salon owner feels more confortble with'+'</p>'+
                          '<p><strong>Name: </strong>' + response.salonSpaces[i]["_SalonName"] + '</p>' +
                        //   '<p><strong>Name: </strong>' + response.salonSpaces[i]["_SalonName"] + '</p>' +
                          '<p><strong>Address: </strong>' + response.salonSpaces[i]["_SalonAddress"] + '</p>' +
                          '<p><strong>Country: </strong>' + response.salonSpaces[i]["_SalonCountry"] + '</p>' +
                          '<p><strong>County: </strong>' + response.salonSpaces[i]["_SalonCounty"] + '</p>' +
                          '<p><strong>Email: </strong><a href="mailto:' + response.salonSpaces[i]["_SalonEmailId"] + '">' + response.salonSpaces[i]["_SalonEmailId"] + '</a><span class="customTooltip"> <span class="exclamation"> <i class="fa fa-exclamation" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i> </span> <span class="tooltiptext">Use the email to contact salon owner for more info!</span> </span> </p>' + 
                          '<p><strong>Mobile: </strong>' + response.salonSpaces[i]["_SalonMobileNumber"] + ' </p>' + 
                          '<p><strong>Postal Code: </strong>' + response.salonSpaces[i]["_SalonPostalCode"] + '</p>' + 
                          '<p><strong>Space Description: </strong>' + response.salonSpaces[i]["_SpaceDescription"] + '</p>'+
                           '</div>' + 
                                  '<div class="col-md-6"> <div class="therapist-content-frame p-2" id="salon-space">' +
                        '<div id="carouselExampleControls_'+ i +'" class="carousel slide" data-ride="carousel">' +
                        '<div class="carousel-inner">' +
                            '<div class="carousel-item active">' +
                            '<img id="salon-image-id-1' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="First slide">' +
                            '</div>' +
                            '<div class="carousel-item">' +
                            '<img id="salon-image-id-2' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="Second slide">'
                            '</div>' +
                            '<div class="carousel-item">' +
                            '<img id="salon-image-id-3' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="Third slide">'
                            '</div>' +
                        '</div>' +
                   
                    '</div>' +

                    
                    '</div>'+ 
                    '<div class="mt-4">' +
                        '<a class="carousel-control-prev-1" href="#carouselExampleControls_'+ i +'" role="button" data-slide="prev">' +
                            '<span class="carousel-control-prev-icon" aria-hidden="true"></span>' +
                            '<span class="sr-only">Previous</span>' +
                        '</a>' +
                        '<a class="carousel-control-next-1" style="float:right" href="#carouselExampleControls_'+ i +'" role="button" data-slide="next">' +
                            '<span class="carousel-control-next-icon" aria-hidden="true"></span>' +
                            '<span class="sr-only">Next</span>' +
                        '</a>' +  
                  '</div>' +          
                  '</div>' +
                           '</div>'+ '</div>' +
                           '</div>'  );
                           
                    }
                    else {
                        
                        $(".chair-row")
                        //$(".col-6")
                        //   .append('<div class="col-lg-6 mt-5"> '+ '<a id="' + response.salonSpaces[i]["_SalonChairId"] + '" onclick="rentChair(' + response.salonSpaces[i]["_SalonChairId"] +')">' +
                          .append('<div class="col-lg-6 mt-5"> '+ '<div id="' + response.salonSpaces[i]["_SalonChairId"] + '" >' +
                          '<div class="row">  <div class="col-md-6 therapist-content p-3 px-4">'+'<p><strong>' + response.salonSpaces[i]["_Category"]+ '</strong></p>'+
                          '<p><strong>Name: </strong>' + response.salonSpaces[i]["_SalonName"] + '</p>' +
                          '<p><strong>Address: </strong>' + response.salonSpaces[i]["_SalonAddress"] + '</p>' +
                          '<p><strong>Country: </strong>' + response.salonSpaces[i]["_SalonCountry"] + '</p>' +
                          '<p><strong>County: </strong>' + response.salonSpaces[i]["_SalonCounty"] + '</p>' +
                          '<p><strong>Email: </strong><a href="mailto:' + response.salonSpaces[i]["_SalonEmailId"] + '">' + response.salonSpaces[i]["_SalonEmailId"] + '</a><span class="customTooltip"> <span class="exclamation"> <i class="fa fa-exclamation" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-eye" aria-hidden="true"></i> </span> <span class="tooltiptext">Use the email to contact salon owner for more info!</span> </span> </p>' + 
                          '<p><strong>Mobile: </strong>' + response.salonSpaces[i]["_SalonMobileNumber"] + ' </p>' + 
                          '<p><strong>Postal Code: </strong>' + response.salonSpaces[i]["_SalonPostalCode"] + '</p>' + 
                          '<p><strong>Space Description: </strong>' + response.salonSpaces[i]["_SpaceDescription"] + '</p>'+
                           '</div>' + 
                                  '<div class="col-md-6"> <div class="therapist-content-frame p-2" id="salon-space">' +
                        '<div id="carouselExampleControls_'+ i +'" class="carousel slide" data-ride="carousel">' +
                        '<div class="carousel-inner">' +
                            '<div class="carousel-item active">' +
                            '<img id="salon-image-id-1' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="First slide">' +
                            '</div>' +
                            '<div class="carousel-item">' +
                            '<img id="salon-image-id-2' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="Second slide">'
                            '</div>' +
                            '<div class="carousel-item">' +
                            '<img id="salon-image-id-3' + i + '" alt="" width="100%" height="400px">'+

                            //    '<img class="d-block w-100" src="..." alt="Third slide">'
                            '</div>' +
                        '</div>' +
                   
                    '</div>' +

                    
                    '</div>'+ 
                    '<div class="mt-4">' +
                        '<a class="carousel-control-prev-1" href="#carouselExampleControls_'+ i +'" role="button" data-slide="prev">' +
                            '<span class="carousel-control-prev-icon" aria-hidden="true"></span>' +
                            '<span class="sr-only">Previous</span>' +
                        '</a>' +
                        '<a class="carousel-control-next-1" style="float:right" href="#carouselExampleControls_'+ i +'" role="button" data-slide="next">' +
                            '<span class="carousel-control-next-icon" aria-hidden="true"></span>' +
                            '<span class="sr-only">Next</span>' +
                        '</a>' +  
                  '</div>' +          
                  '</div>' +
                           '</div>'+ '</div>' +
                           '</div>'  );
                   
                    }
                

                   //for salon image 
                   $.ajax({
                    type: 'post',
                    url:  webUrl + 'getimage',
                    data: ({
                        // "_ImageId": "73"
                        "_ImageId": response.salonSpaces[i]["_SpaceImgId1"]
                    }),
                    success: function (salonImageResponse) {

                        //console.log(galleryResponse["_ImageContent"]);

                        $("#salon-image-id-1" + i).attr("src", "data:image;base64," + salonImageResponse["_ImageContent"]);

                    }
                    });
                      $.ajax({
                    type: 'post',
                    url:  webUrl + 'getimage',
                    data: ({
                        // "_ImageId": "73"
                        "_ImageId": response.salonSpaces[i]["_SpaceImgId2"]
                    }),
                    success: function (salonImageResponse) {

                        //console.log(galleryResponse["_ImageContent"]);

                        $("#salon-image-id-2" + i).attr("src", "data:image;base64," + salonImageResponse["_ImageContent"]);

                    }
                });
                $.ajax({
                    type: 'post',
                    url:  webUrl + 'getimage',
                    data: ({
                        // "_ImageId": "73"
                        "_ImageId": response.salonSpaces[i]["_SpaceImgId3"]
                    }),
                    success: function (salonImageResponse) {

                        //console.log(galleryResponse["_ImageContent"]);

                        $("#salon-image-id-3" + i).attr("src", "data:image;base64," + salonImageResponse["_ImageContent"]);

                    }
                });
                }

                });
                
                
                
        }
    });
    
    
});