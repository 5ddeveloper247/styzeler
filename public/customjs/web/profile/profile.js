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

        $("#showReviewLike").empty();
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

        $("#showLikes").empty();
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

    });

});

function editName() {
    $(".name-mobile-modal").modal('show');

    // console.log(firstName);
}


function editAge() {
    $(".age-modal").modal('show');
}

function editResume() {
    $(".resume-modal").modal('show');
    $("#stylist-resume").attr("placeholder", resume).blur();
}

function editRate() {
    $(".rate-modal").modal('show');
}

function editWork() {
    $(".work-modal").modal('show');
}

function editLanguage() {
    $(".language-modal").modal('show');
    $("#stylist-language").attr("placeholder", language).blur();
}

function editStatus() {
    $(".status-modal").modal('show');
}

function editType() {
    $(".type-modal").modal('show');
}

function editQualification() {
    $(".qualification-modal").modal('show');
    $("#utr-number").attr("placeholder", utr).blur();
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
            qualification = data.qualification;
            utr_number = data.utr_number;

            $('#ownerQualification').text(qualification);
            $('#ownerQualification').append('<a class="text-center btn" onclick="editQualification()" title="Edit">✎</a>');

            qualification.forEach(function (qualification) {

                $(`input[type="checkbox"][name="qualification[]"][value="${qualification}"]`).prop('checked', true);
            });
            $('#utr-number').val(utr_number);

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

            $(`input[name='stylist_rate'][value='${rate}']`).prop('checked', true);

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
                checkCheckBoxes(data, 'homeServiceMaleGroomingServices', 'homeServiceMaleGroomingServices');
                checkCheckBoxes(data, 'hairColorBrands', 'hairColorBrands');
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