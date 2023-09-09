const webUrl = "https://api.styzeler.co.uk/styzeler-api/index.php/app/";

let GALLERYID = "galleryid";
if(localStorage.getItem('ISADMACTIVE') != "Yes") {
    window.location.href = "../index.html";
}

function redirect() {
    window.location.href = "./upload-blogs.html";
}

//Today
let uploadDay = new Date();
let dateUploadDay = uploadDay.getFullYear()+'-'+(uploadDay.getMonth()+1)+'-'+uploadDay.getDate();
// console.log(dateUploadDay);


//For gallery
let gallery = document.getElementById('image-gallery');

var urlArr = [];
// detect whether the browser supports FileReader  
if (typeof (FileReader) === 'undefined') {
    result.innerHTML = "Sorry, your browser does not support FileReader, please use modern browsers operation!";
    // gallery.setAttribute('disabled', 'disabled');
} else {
    gallery.addEventListener("change", handleFiles, false);
}

var galleryArr = [];

function handleFiles() {
    const fileList = this.files;

    //Whole process will be in loop, render will be called everytime whenever it gets a file
    for (let i = 0; i < fileList.length; i++) {

        var reader = new FileReader();
        reader.readAsDataURL(fileList[i]);
        reader.onloadend = function (e) {
            let base64Gallery = this.result.split(';base64').join(',').split('data:image/').join(',').split(',');
            // console.log( base64Gallery[1] + base64Gallery[3]);
            // console.log('RESULT', this.result);

            $.ajax({
                type: 'post',
                url: webUrl + 'uploadimage',
                data: {
                    "_ImageContent": base64Gallery[3],
                    "_ImageType": base64Gallery[1]
                },
                success: function (response) {

                    console.log(response);
                    galleryArr.push(response["_ImageId"]);
                    // console.log(galleryArr);

                    localStorage.setItem(GALLERYID, galleryArr);

                }

            });

        }

    }

}


$(function(){
	CKEDITOR.editorConfig = function (config) {	    config.language = 'es';	    config.uiColor = '#F7B42C';	    config.height = 300;	    config.toolbarCanCollapse = true;	};	CKEDITOR.replace('description');

     $("#blog-form").on("submit", function(e){         e.preventDefault();         let blogTitle = $("#blog-title").val();         let blogDescription = CKEDITOR.instances.description.getData();         $.ajax({            type: 'post',            url: webUrl + 'uploadblog',            data: {
                "_BlogTitle": blogTitle,
                "_BlogDescription": blogDescription,
                "_BlogUploadDate":  dateUploadDay, 
                "images": localStorage.getItem(GALLERYID),
               
            },
            success: function(response) {
                console.log(response);


                if( response["_Return_ReturnMessage"] === "Success" ) {
                    $('.upload-success').modal('show');
                }

            }
        
        });
      //End of Ajax call

    });
  
});