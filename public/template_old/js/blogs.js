$(function(){


    //Ajax call - Jobs
    $.ajax({
        type: 'post',
        url: webUrl + 'getblogs',
        data: {
        },
        success: function(response) {
          console.log(response);
          
          

          $.each( response.blogs , function(i){
              
            $(".all-blogs").append('<div class="col-10 mt-4">' +
              '<div id="' + response.blogs[i]["_BlogId"] +'" class="card card-body color-1">' +
                  '<h4 class="text-uppercase">' + response.blogs[i]["_BlogTitle"] + '</h4>' +
                  '<h6 class="mt-4">' + response.blogs[i]["_BlogUploadDate"] + '</h6>' +
                  '<div class="show-image-'+i+'"><img class="blog-image" id="blog-image-id-' + i + '" alt="" width="100%"></div>' +
                  '<p class="mt-2">' + response.blogs[i]["_BlogDescription"] + '</p>' +
                    '</div>' +
                '</div>');


            $.each ( response.blogs[i].images , function(j) {
                if(response.blogs[i].images[j]["image_id"] != 0) {
                    //For blog image
                    $.ajax({
                        type: 'post',
                        url:  webUrl + 'getimage',
                        data:  ({
                            "_ImageId": response.blogs[i].images[j]["image_id"]
                        }),
                        success: function (newResponse) {
                            $("#blog-image-id-" + i).attr("src", "data:image/png;base64," + newResponse["_ImageContent"]); 

                        }

                    });
                }
                else {
                    $(".show-image-"+i).hide();
                }
                

                
            })
            
            

          });

          

         
      }
      
    });
    //End of Ajax call

  

});