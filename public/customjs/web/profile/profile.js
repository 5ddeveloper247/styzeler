var tomorrow = currentdate.toJSON().slice(0, 10);
var currentHour = currentdate.getHours();
let onCall;

$(document).ready(function () {

    $("#showReviews").hide();
    $("#showLikes").hide();
    $("#showBook").hide();
    $("#profile").removeClass("customBtn").addClass("customBtnSelected");

    $("#profile").click(function () {

        $("#showProfile").show();

        $("#showReviews").hide();
        $("#showLikes").hide();
        $("#showBook").hide();

        $("#reviews").removeClass("customBtnSelected").addClass("customBtn");
        $("#likes").removeClass("customBtnSelected").addClass("customBtn");
        $("#book").removeClass("customBtnSelected").addClass("customBtn");

        $("#profile").removeClass("customBtn").addClass("customBtnSelected");

    });

    $("#reviews").click(function () {
        $("#showReviews").show();
        $("#showProfile").hide();
        $("#showLikes").hide();
        $("#showBook").hide();

        $("#profile").removeClass("customBtnSelected").addClass("customBtn");
        $("#likes").removeClass("customBtnSelected").addClass("customBtn");
        $("#book").removeClass("customBtnSelected").addClass("customBtn");

        $("#reviews").removeClass("customBtn").addClass("customBtnSelected");

        loadFeedback();
//        $("#showReviewLike").empty();
    });

    $("#likes").click(function () {
        $("#showLikes").show();
        $("#showReviews").hide();
        $("#showProfile").hide();
        $("#showBook").hide();

        $("#profile").removeClass("customBtnSelected").addClass("customBtn");
        $("#reviews").removeClass("customBtnSelected").addClass("customBtn");
        $("#book").removeClass("customBtnSelected").addClass("customBtn");

        $("#likes").removeClass("customBtn").addClass("customBtnSelected");

        loadFeedback();
//        $("#showLikes").empty();
    });

    $("#book").click(function () {
        $("#showBook").show();
        $("#showProfile").hide();
        $("#showReviews").hide();
        $("#showLikes").hide();

        $("#profile").removeClass("customBtnSelected").addClass("customBtn");
        $("#reviews").removeClass("customBtnSelected").addClass("customBtn");
        $("#likes").removeClass("customBtnSelected").addClass("customBtn");

        $("#book").removeClass("customBtn").addClass("customBtnSelected");
        onCall = tomorrow;
        // localStorage.removeItem(SELECTEDSTATUSDATE);
        // $("#calendar").fullCalendar('refetchEvents');

    });

});

function editName() {
    $(".name-mobile-modal").modal('show');

}
function addTimeSlots() {
    $('#slot_id').val('');
    $('#start_time').val('');
    $('#end_time').val('');
    $('#add-slots').html('Add');
    $(".slots-modal").modal('show');

}

function editAge() {
    $(".age-modal").modal('show');
}

function editResume() {
    $(".resume-modal").modal('show');
}

function editRate() {
    $(".rate-modal").modal('show');
}

function editWork() {
    $(".work-modal").modal('show');
}

function editLanguage() {
    $(".language-modal").modal('show');

}

function editStatus() {
    $(".status-modal").modal('show');
}

function editType() {
    $(".type-modal").modal('show');
}

function editQualification() {
    $(".qualification-modal").modal('show');
}

function editProfilePic() {
    $(".profile-pic-modal").modal('show');
}

function updateGallery() {
    $(".gallery-modal").modal('show');
}

// registrationMode = ;
var registrationMode = '';

function formatRate(rate) {
    return parseFloat(rate).toFixed(2);
}

function getProfileData() {

    // e.preventDefault();

    let type = 'GET';
    let url = 'getProfileData';
    let message = '';
    let form = '';
    let data = '';
    // if ($(this).text() == 'Submit') {
    //     url = url;
    // }

    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', profileResponse, 'spinner_button', 'submit_button');

}
getProfileData()

function profileProductServices(elementAjaxData, elementArray, elementParagraph, elementHeading) {
    elementArray = [];

    for (var key in elementAjaxData) {
        if (elementAjaxData.hasOwnProperty(key) && !isNaN(key) && key !== 'heading' && key !== 'subHeading') {
            elementArray.push(elementAjaxData[key]);
        }
    }

    var heading = 'Heading';
    var para = 'Para';
    var dynamicHeading = {};
    var dynamicPara = {};

    dynamicHeading[elementAjaxData + heading] = elementAjaxData.heading || '-';
    dynamicPara[elementAjaxData + para] = elementArray.length > 0 ? elementArray.join(', ') : '-';

    $('#' + elementHeading).text(dynamicHeading[elementAjaxData + heading]);
    $('#' + elementParagraph).text(dynamicPara[elementAjaxData + para]);

}
function objectToArray(ProductsObject) {
    var ProductsArray = [];
    for (var key in ProductsObject) {
        if (key !== 'heading' && key !== 'subHeading') {
            ProductsArray.push(ProductsObject[key]);
        }
    }

    return ProductsArray;
}
function checkCheckBoxes(data, category, elementPrefix) {
    const categoryData = data.data[category];

    if (categoryData) {
        const elementHeading = `${elementPrefix}heading`;
        const elementParagraph = `${elementPrefix}Para`;
        const elementArray = [];

        profileProductServices(categoryData, elementArray, elementParagraph, elementHeading);
        const categoryArray = objectToArray(categoryData);

        categoryArray.forEach(function (item) {
            $(`input[type="checkbox"][name="${category}[]"][value="${item}"]`).prop('checked', true);
        });
    }
}
// function to handle the response from server side after sending request for getting user details
function profileResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200) {
        //saving response data in data var
        var data = response.data;
        var type = response.data.type;
        registrationMode = type;

        if (data != null || data != '') {

            // For profile image
            hero_image = data.hero_image;

            $('#profile-image-id').attr('src', baseURL + hero_image);
            $('#blah').attr('src', baseURL + hero_image);

            // For name,surname,phone
            profilename = data.name;
            surname = data.surname;
            phone = data.phone;

            // if (phone) {
            //     var cleanedPhone = phone.replace(/\D/g, '');
            // } else {
            //     var cleanedPhone = '-'
            // }

            $('#ownerName').text(profilename + ' ' + surname);
            $('#ownerName').append('<a class="text-center btn" onclick="editName()" title="Edit">✎</a>');

            $('#stylist-name').val(profilename);
            $('#stylist-surname').val(surname);
            $('#stylist-mobile').val(phone);

            // for age
            age = data.age

            $('#ownerAge').text(age);
            $('#ownerAge').append('<a class="text-center btn" onclick = "editAge()" title = "Edit" >✎</a >');

            $(`input[name='stylist_age'][value='${age}']`).prop('checked', true);

            // for Profile Type
            profile_type = data.profile_type

            $('#profiletype').text(profile_type);
            $('#profiletype').append('<a class="text-center btn" onclick="editType();" title="Edit">✎</a>');

            $('#profile_type').val(profile_type);


            // for qualification
            qualifications = data.qualification;
            utr_number = data.utr_number;
            video = data.trade_video;

            $('#ownerQualification').text(qualifications);
            $('#ownerQualification').append('<a class="text-center btn" onclick="editQualification()" title="Edit">✎</a>');

            qualifications.forEach(function (qualifi) {
                $(`input[type="checkbox"][name="qualification[]"][value="${qualifi}"]`).prop('checked', true);
            });
            $('#utr-number').val(utr_number);
            $('#video').val(video);

            // for languages
            languages = data.languages;

            $('#ownerLanguage').text(languages);
            $('#ownerLanguage').append('<a class="text-center btn" onclick="editLanguage()" title="Edit">✎</a>');
            $('#stylist-language').val(languages);

            // for rate
            rate = data.rate;
            formattedRate = formatRate(rate);

            $('#ownerRate').text(formattedRate);
            $('#ownerRate').append('<a class="text-center btn" onclick="editRate()" title="Edit">✎</a>');
            if (rate != 110 && rate != 120 && rate != 130) {
                // This block will execute if rate is NOT 110, 120, or 130
                $(`input[type="radio"][name='stylist_rate']`).prop('checked', true);
                $('#rateOther').val(rate);
                $('#otherRate').show();
            } else {
                // This block will execute if rate is 110, 120, or 130
                $(`input[name='stylist_rate'][value='${rate}']`).prop('checked', true);
            }
            // for zone
            zone = data.zone;

            $('#ownerWork').text(zone);
            $('#ownerWork').append('<a class="text-center btn" onclick="editWork()" title="Edit">✎</a>');

            zone.forEach(function (zone) {

                $(`input[type="checkbox"][name="zone[]"][value="${zone}"]`).prop('checked', true);
            });

            // for resume
            resume = data.resume;

            $('#ownerResume').text(resume);
            $('#ownerResume').append('<a class="text-center btn" onclick="editResume()" title="Edit">✎</a>');
            $('#stylist-resume').val(resume);

            // for email
            email = data.email;

            $('#ownerEmail').text(email);

            // for status
            profile_status = data.status;
            $('#status').text(profile_status);
            $('#status').append('<a class="text-center btn" onclick="editStatus();" title="Edit">✎</a>');
            $('#stylist_status').val(profile_status);

            // for tokens
            $('#remaining_tokens').text((data.tokens != null && data.tokens != '') ? data.tokens : '0');
            $('#total_tokens').text((data.total_tokens != null && data.total_tokens != '') ? data.total_tokens : '0');


            if (type == 'wedding' || type == 'hairStylist' || type == 'barber') {
                checkCheckBoxes(data, 'stylingProducts', 'stylingProducts');
                checkCheckBoxes(data, 'chemicalTreatmentProducts', 'chemicalTreatmentProducts');
                checkCheckBoxes(data, 'chemicalTreatmentServices', 'chemicalTreatmentServices');
                checkCheckBoxes(data, 'hairCuttingServices', 'hairCuttingServices');
                checkCheckBoxes(data, 'weddingStyleServices', 'weddingStyleServices');
                checkCheckBoxes(data, 'barberMaleGroomingServices', 'barberMaleGroomingServices');
                checkCheckBoxes(data, 'hairColorServices', 'hairColorServices');
                checkCheckBoxes(data, 'makeupServives', 'makeupServives');
                checkCheckBoxes(data, 'salonMaleGroomingServices', 'salonMaleGroomingServices');
                checkCheckBoxes(data, 'hairColorBrands', 'hairColorBrands');
                // checkCheckBoxes(data, 'homeMaleGroomingServices', 'homeMaleGroomingServices');
                checkCheckBoxes(data, 'homeServiceMaleGroomingServices', 'homeServiceMaleGroomingServices');
            }

            if (type == 'beautician') {
                checkCheckBoxes(data, 'massageServices', 'massageServices');
                checkCheckBoxes(data, 'massageProducts', 'massageProducts');
                checkCheckBoxes(data, 'hairRemovalPermanentServices', 'hairRemovalPermanentServices');
                checkCheckBoxes(data, 'ladyWaxingServices', 'ladyWaxingServices');
                checkCheckBoxes(data, 'ladyWaxingProducts', 'ladyWaxingProducts');
                checkCheckBoxes(data, 'maleWaxingServices', 'maleWaxingServices');
                checkCheckBoxes(data, 'manicurePedicureServices', 'manicurePedicureServices');
                checkCheckBoxes(data, 'manicurePedicureProducts', 'manicurePedicureProducts');
                checkCheckBoxes(data, 'salonFacialServices', 'salonFacialServices');
                checkCheckBoxes(data, 'salonFacialProducts', 'salonFacialProducts');
                checkCheckBoxes(data, 'homeServiceFacialServices', 'homeServiceFacialServices');
                checkCheckBoxes(data, 'bodyTreatmentServices', 'bodyTreatmentServices');
                checkCheckBoxes(data, 'EyesAndBrowServices', 'EyesAndBrowServices');
                checkCheckBoxes(data, 'EyesAndBrowProducts', 'EyesAndBrowProducts');
                checkCheckBoxes(data, 'makeupServives', 'makeupServives');

            }

            galleryImages = data.gallery
            if (galleryImages) {
                var galleryContainer = $('#gallery-content');
                galleryContainer.empty(); // Clear the container before adding images

                for (var i = 0; i < galleryImages.length; i++) {
                    var imageSrc = galleryImages[i];
                    var imageHtml = '<div class="col-lg-4 p-4">' +
                        '<img alt="" width="100%" height="100%" src="' + imageSrc + '">' +
                        '<p>' +
                        '<a class="text-center btn" onclick="deletePicture(\'' + imageSrc + '\')" title="Edit"><u>remove</u></a>' +
                        '</p>' +
                        '</div>';

                    galleryContainer.append(imageHtml);
                }
            }

        }
    }

}

function editServiceAndProduct() {
    if (registrationMode === "wedding" || registrationMode === "hairStylist" || registrationMode === "barber") {
        $(".wedding-service-product-modal").modal('show');
    }
    if (registrationMode === "hairStylist") {
        $(".hairstylist-service-product-modal").modal('show');
    }
    if (registrationMode === "beautician") {
        $(".beautician-service-product-modal").modal('show');
    }
}

//update

function loadFileProfile(event) {
    var output = document.getElementById('blah');

    // Check if the event object and its target property exist
    if (event && event.target) {
        // Check if files were selected
        if (event.target.files && event.target.files[0]) {
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src); // free memory
            }
        }
    }

}

$(document).on('click', '#updateProfileImage', function (e) {

    e.preventDefault();
    let type = 'POST';
    let url = '/updateProfileImage';
    let message = '';
    let form = $('#hero_image_form');
    let data = new FormData(form[0]);
    // if ($(this).text() == 'Submit') {
    //     url = url;
    // }

    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', updateProfileImageResponse, 'spinner_button', 'submit_button');
});

function updateProfileImageResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {

        getProfileData();
        $('#hero_image_form')[0].reset();
        toastr.success(response.message, '', {
            timeOut: 3000
        });

        $('.profile-pic-modal').modal('hide');
    } else {

        error = response.message;

        toastr.error(error, '', {
            timeOut: 3000
        });
    }

}

$(document).on('click', '#updateGalleryImages', function (e) {

    e.preventDefault();
    let type = 'POST';
    let url = '/updateGalleryImages';
    let message = '';
    let form = $('#gallery_images_form');
    let data = new FormData(form[0]);
    // if ($(this).text() == 'Submit') {
    //     url = url;
    // }

    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', updateGalleryImagesResponse, 'spinner_button', 'submit_button');
});

function updateGalleryImagesResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
        getProfileData();

        $('#gallery_images_form')[0].reset();
        toastr.success(response.message, '', {
            timeOut: 3000
        });

        $('.gallery-modal').modal('hide');


    } else {

        error = response.message;

        toastr.error(error, '', {
            timeOut: 3000
        });
    }

}

function deletePicture(path) {

    let type = 'POST';
    let url = '/deleteGalleryImage';
    let message = '';
    let form = '';
    var data = JSON.stringify({
        path: path

    });
    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', deleteGalleryImageResponse, 'spinner_button', 'submit_button');
}

function deleteGalleryImageResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
        getProfileData();

        toastr.success(response.message, '', {
            timeOut: 3000
        });

    } else {

        error = response.message;

        toastr.error(error, '', {
            timeOut: 3000
        });
    }
}

$(document).on('click', '.updateBasicInfoProfile', function (e) {

    e.preventDefault();
    let type = 'POST';
    let url = '/updateBasicInfoProfile';
    let message = '';
    let form = $('#updateBasicInfoProfile');
    let data = new FormData(form[0]);
    // if ($(this).text() == 'Submit') {
    //     url = url;
    // }

    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', updateBasicInfoProfileResponse, 'spinner_button', 'submit_button');
});

function updateBasicInfoProfileResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
        getProfileData();

        toastr.success(response.message, '', {
            timeOut: 3000
        });

        // $('.modal').modal('hide');


    } else {

        // CALLING OUR FUNTION ERROR & SUCCESS HANDLING
        error = response.responseJSON.message;
        var is_invalid = response.responseJSON.errors;

        // Loop through the error object
        $.each(is_invalid, function (key) {

            // Assuming 'key' corresponds to the form field name
            var inputField = $('[name="' + key + '"]');
            // Add the 'is-invalid' class to the input field's parent or any desired container
            inputField.closest('.form-control').addClass('is-invalid');
        });
        // error_msg = error.split('(');

        toastr.error(error, '', {
            timeOut: 3000
        });
    }

}

$(document).on('click', '.updateProductAndServices', function (e) {

    e.preventDefault();
    let type = 'POST';
    let url = '/updateProductAndServices';
    let message = '';
    let form = $('#updateProductAndServices');
    let data = new FormData(form[0]);
    // if ($(this).text() == 'Submit') {
    //     url = url;
    // }

    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', updateProductAndServicesResponse, 'spinner_button', 'submit_button');
});


function updateProductAndServicesResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
        getProfileData();

        toastr.success(response.message, '', {
            timeOut: 3000
        });

        $('.modal').modal('hide');

    } else {

        // CALLING OUR FUNTION ERROR & SUCCESS HANDLING
        toastr.error(error, '', {
            timeOut: 3000
        });
    }

}

function avaliableAppointmentDate(status) {

    var availableDate = localStorage.getItem(SELECTEDSTATUSDATE);
    let type = 'POST';
    let url = '/saveAvaibleDate';
    let message = '';
    let form = '';
    let data = JSON.stringify({
        Status: status,
        IsActive: "1",
        availableDays: availableDate
    });

    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', saveAvaibleDate, 'spinner_button', 'submit_button');

}
function saveAvaibleDate(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
        var availableDate = localStorage.getItem(SELECTEDSTATUSDATE);
        toastr.success(response.message, '', {
            timeOut: 3000
        });

        if (response.data == "Available") {
            $("#p_status").text("Available");
            $(".appointment-status").show();
            $("#calendar").fullCalendar('refetchEvents');
            $(".cancel").removeClass("customBtnNotSelected");
            $(".addTimeSlots, .addTimeSlotstxt").removeClass("d-none");
            $(".available").addClass("customBtnNotSelected");
            $(".off").removeClass("customBtnNotSelected");
            $(".on-call").addClass("customBtnNotSelected");
            $(".avaliable-modal").modal('show');

        } else if (response.data == "Off") {
            $("#p_status").text("Off");
            $(".appointment-status").show();
            $(".addTimeSlots, .addTimeSlotstxt").removeClass("d-none");
            $("#calendar").fullCalendar('refetchEvents');
            $(".cancel").removeClass("customBtnNotSelected");
            $(".available").removeClass("customBtnNotSelected");
            $(".off").addClass("customBtnNotSelected");
            $(".on-call").addClass("customBtnNotSelected");
            $(".avaliable-modal").modal('show');

        } else if (response.data == "On Call") {
            $("#p_status").text("On Call");
            $(".appointment-status").show();
            $("#calendar").fullCalendar('refetchEvents');
            $(".addTimeSlots, .addTimeSlotstxt").addClass("d-none");
            $(".cancel").removeClass("customBtnNotSelected");
            $(".available").addClass("customBtnNotSelected");
            $(".off").addClass("customBtnNotSelected");
            $(".on-call").addClass("customBtnNotSelected");
            $(".avaliable-modal").modal('show');

        } else if (response.data == "Cancel") {
            $("#calendar").fullCalendar('refetchEvents');
            $(".addTimeSlots, .addTimeSlotstxt").addClass("d-none");
            $(".appointment-status").hide();
            $(".cancel").addClass("customBtnNotSelected");
            $(".available").removeClass("customBtnNotSelected");
            $(".off").removeClass("customBtnNotSelected");

            if (availableDate === onCall) {

                // if (currentHour > 18) {
                $(".on-call").removeClass("customBtnNotSelected");
                // }

            }
        }

    } else {

        // CALLING OUR FUNCTION ERROR & SUCCESS HANDLING
        toastr.error(error, '', {
            timeOut: 3000
        });
    }

}


$(document).on('click', '#add-slots', function (e) {

    e.preventDefault();
    var availableDate = localStorage.getItem(SELECTEDSTATUSDATE);
    let type = 'POST';
    let url = '/saveAvaibleSlots';
    let message = '';
    let form = $('#add-slots-form');

    let data = new FormData(form[0])
    data.append('availableDate', availableDate)
    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', saveAvaibleSlots, 'spinner_button', 'submit_button');
});

function saveAvaibleSlots(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
        // $("#calendar").fullCalendar('refetchEvents');
        $('#add-slots-form')[0].reset();
        toastr.success(response.message, '', {
            timeOut: 3000
        });
        $("#calendar").fullCalendar('refetchEvents');
        $('.slots-modal').modal('hide');
    } else {

        error = response.message;

        toastr.error(error, '', {
            timeOut: 3000
        });
    }

}

function changeSlotTime(total_time) {

    $('#slots_time').val(total_time);
    $('#add-slots').html('Update');

    $('.slots-modal').modal('show');

}
function after_nine() {

    var availableDate = localStorage.getItem(SELECTEDSTATUSDATE);
    let type = 'POST';
    let url = '/updateAfterNineSlot';
    let message = '';
    let form = $('#after_nine');

    check_slot = $('#after_nine_slot').prop('checked') == true ? 'on' : 'off';

    let data = new FormData();
    data.append('availableDate', availableDate);
    data.append('check_slot', check_slot);

    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', updateAfterNineSlotResponse, 'spinner_button', 'submit_button');
}
function updateAfterNineSlotResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == '200') {
        // $("#calendar").fullCalendar('refetchEvents');
        // $('#after_nine')[0].reset();
        toastr.success(response.message, '', {
            timeOut: 3000
        });
        $("#calendar").fullCalendar('refetchEvents');
        // $('.slots-modal').modal('hide');
    } else {

        error = response.message;

        toastr.error(error, '', {
            timeOut: 3000
        });
    }

}

function loadFeedback() {

    let type = 'GET';
    let url = '/loadFeedbackFreelancer';
    let message = '';
//    let form = $('#reviewForm');
    let data = 'freelancerId=' + userId;//new FormData(form[0]);

    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', loadFeedbackResponse, 'spinner_button', 'submit_button');
}

function loadFeedbackResponse(response) {

    if (response.status == 200 || response.status == '200') {

    	var feedback = response.data;
    	var reviewshtml = '';
    	var likeshtml = '';
    	
    	$("#freelancerReviewsHtml, #freelancerLikesHtml").empty();
    	
    	if(feedback.length > 0  ) {
            // console.log(response);
            $.each(feedback, function(i) {
              if(feedback[i]['remarks'] != "") {
            	  if(feedback[i]['feedback_type'] == 'review'){
            		  
            		  reviewshtml += '<div>' +
						                  '<h5 class="color-1">' + feedback[i]['user']['name'] + ' ' + feedback[i]['user']['surname'] + '</h5>' + 
						                  '<p class="mt-2">'+feedback[i]['remarks']+'</p>'+
						             '</div>';
            	  }else{
            		  likeshtml += '<div>' +
						                  '<h5 class="color-1">' + feedback[i]['user']['name'] + '</h5>' + 
						                  '<p class="mt-2">'+feedback[i]['remarks']+'</p>'+
						             '</div>';
            	  }
              }
            });
            $("#freelancerReviewsHtml").append(reviewshtml != '' ? reviewshtml : '<div>No Reviews Yet!</div>');
            $("#freelancerLikesHtml").append(likeshtml != '' ? likeshtml : '<div>No Likes Yet!</div>');
            
          } else {
        	  
            $("#freelancerReviewsHtml").append('<div>No Reviews Yet!</div>');
            $("#freelancerLikesHtml").append('<div>No Reviews Yet!</div>');
          }

    } else {

        toastr.error(response.message, '', {
            timeOut: 3000
        });
    }
}
