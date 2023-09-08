$(document).ready(function () {

    $("#showProducts").hide();
    $("#showService").hide();
    $("#profile").removeClass("customBtn").addClass("customBtnSelected");

});
function editProfilePic() {
    $(".profile-pic-modal").modal("show");
}

function editName() {
    $(".name-modal").modal("show");

}

function editMobile() {
    $(".mobile-modal").modal('show');
}

function editAddress() {
    $(".address-modal").modal('show');

}

function editPostcode() {
    $(".postcode-modal").modal('show');

}
function editStatus() {
    $(".status-modal").modal('show');
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
getProfileData();


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
            address = data.address;
            post_code = data.post_code;
            var cleanedPhone = phone.replace(/\D/g, '');
            email = data.email;

            $('#ownerName').text(profilename + ' ' + surname);
            $('#ownerName').append('<a class="text-center btn" onclick="editName()" title="Edit">✎</a>');

            $("#owner-address").text(address);
            $("#owner-address").append('<a class="text-center btn" onclick="editAddress()" title="Edit">' + "✎" + "</a>");

            $("#owner-postcode").text(post_code);
            $("#owner-postcode").append('<a class="text-center btn" onclick="editPostcode()" title="Edit">' + "✎" + "</a>");

            $("#owner-phone").text(phone);
            $("#owner-phone").append('<a class="text-center btn" onclick="editMobile()" title="Edit">' + "✎" + "</a>");

            $("#owner-email").text(email);

            $('#stylist-name').val(profilename);
            $('#stylist-surname').val(surname);
            $('#stylist-mobile').val(cleanedPhone);
            $('#stylist-address').val(address);
            $('#stylist-postcode').val(post_code);

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
            // for languages
            languages = data.languages;

            $('#ownerLanguage').text(languages);
            $('#ownerLanguage').append('<a class="text-center btn" onclick="editLanguage()" title="Edit">✎</a>');
            $('#stylist-language').val(languages);

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

        }
    }

}