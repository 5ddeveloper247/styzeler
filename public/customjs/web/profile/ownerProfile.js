$(document).ready(function () {
    $("#showProducts").hide();
    $("#showService").hide();
    $("#profile").removeClass("customBtn").addClass("customBtnSelected");

    $("#profile").click(function () {
        $("#showProfile").show();
        $("#showProducts").hide();
        $("#showService").hide();

        $("#service").removeClass("customBtnSelected").addClass("customBtn");
        $("#products").removeClass("customBtnSelected").addClass("customBtn");

        $("#profile").removeClass("customBtn").addClass("customBtnSelected");
    });

    $("#products").click(function () {
        $("#showProducts").show();
        $("#showProfile").hide();
        $("#showService").hide();

        $("#service").removeClass("customBtnSelected").addClass("customBtn");
        $("#profile").removeClass("customBtnSelected").addClass("customBtn");

        $("#products").removeClass("customBtn").addClass("customBtnSelected");
    });

    $("#service").click(function () {
        $("#showService").show();
        $("#showProducts").hide();
        $("#showProfile").hide();

        $("#products").removeClass("customBtnSelected").addClass("customBtn");
        $("#profile").removeClass("customBtnSelected").addClass("customBtn");

        $("#service").removeClass("customBtn").addClass("customBtnSelected");
    });
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
    $(".address-modal").modal("show");
}

function editPostcode() {
    $(".postcode-modal").modal("show");
}

// registrationMode = ;
var registrationMode = "";

function formatRate(rate) {
    return parseFloat(rate).toFixed(2);
}

function getProfileData() {
    // e.preventDefault();

    let type = "GET";
    let url = "getProfileData";
    let message = "";
    let form = "";
    let data = "";
    // if ($(this).text() == 'Submit') {
    //     url = url;
    // }

    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(
        type,
        url,
        data,
        "",
        profileResponse,
        "spinner_button",
        "submit_button"
    );
}
getProfileData();

function profileProductServices(
    elementAjaxData,
    elementArray,
    elementParagraph,
    elementHeading
) {
    elementArray = [];

    for (var key in elementAjaxData) {
        if (
            elementAjaxData.hasOwnProperty(key) &&
            !isNaN(key) &&
            key !== "heading" &&
            key !== "subHeading"
        ) {
            elementArray.push(elementAjaxData[key]);
        }
    }

    var heading = "Heading";
    var para = "Para";
    var dynamicHeading = {};
    var dynamicPara = {};

    dynamicHeading[elementAjaxData + heading] = elementAjaxData.heading || "-";
    dynamicPara[elementAjaxData + para] =
        elementArray.length > 0 ? elementArray.join(", ") : "-";

    $("#" + elementHeading).text(dynamicHeading[elementAjaxData + heading]);
    $("#" + elementParagraph).text(dynamicPara[elementAjaxData + para]);
}
function objectToArray(ProductsObject) {
    var ProductsArray = [];
    for (var key in ProductsObject) {
        if (key !== "heading" && key !== "subHeading") {
            ProductsArray.push(ProductsObject[key]);
        }
    }

    return ProductsArray;
}

function populateCheckboxes(data, elementType, serviceName, checkboxName) {
    const services = data.data[serviceName];
    if (services) {
        const elementHeading = `${elementType}heading`;
        const elementParagraph = `${elementType}Para`;
        const elementArray = [];

        profileProductServices(
            services,
            elementArray,
            elementParagraph,
            elementHeading
        );
        const serviceArray = objectToArray(services);

        serviceArray.forEach(function (service) {
            $(
                `input[type="checkbox"][name="${checkboxName}[]"][value="${service}"]`
            ).prop("checked", true);
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

        if (data != null || data != "") {
            // For profile image
            hero_image = data.hero_image;

            $("#profile-image-id").attr("src", baseURL + hero_image);
            $("#blah").attr("src", baseURL + hero_image);

            // For name,surname,phone
            profilename = data.name;
            surname = data.surname;
            // phone = data.phone; previous is like this but now showing the telephone on owenr profile
             phone = data.data.owner_telephone;
         
            address = data.address;
            post_code = data.post_code;

            email = data.email;

            $("#ownerName").text(profilename + " " + surname);
            $("#ownerName").append(
                '<a class="text-center btn" onclick="editName()" title="Edit">✎</a>'
            );

            $("#owner-address").text(address);
            $("#owner-address").append(
                '<a class="text-center btn" onclick="editAddress()" title="Edit">' +
                    "✎" +
                    "</a>"
            );

            $("#owner-postcode").text(post_code);
            $("#owner-postcode").append(
                '<a class="text-center btn" onclick="editPostcode()" title="Edit">' +
                    "✎" +
                    "</a>"
            );

            $("#owner-phone").text(phone);
            $("#owner-phone").append('<a class="text-center btn" onclick="editMobile()" title="Edit">' + "✎" + "</a>");

            $("#owner-email").text(email);

            $("#stylist-name").val(profilename);
            $("#stylist-surname").val(surname);
            $('#stylist-mobile').val(phone);
            $("#stylist-address").val(address);
            $("#stylist-postcode").val(post_code);

            // for age
            age = data.age;

            $("#ownerAge").text(age);
            $("#ownerAge").append(
                '<a class="text-center btn" onclick = "editAge()" title = "Edit" >✎</a >'
            );

            $(`input[name='stylist_age'][value='${age}']`).prop(
                "checked",
                true
            );

            // for Profile Type
            profile_type = data.profile_type;

            $("#profiletype").text(profile_type);
            $("#profiletype").append(
                '<a class="text-center btn" onclick="editType();" title="Edit">✎</a>'
            );

            $("#profile_type").val(profile_type);
            // for languages
            languages = data.languages;

            $("#ownerLanguage").text(languages);
            $("#ownerLanguage").append(
                '<a class="text-center btn" onclick="editLanguage()" title="Edit">✎</a>'
            );
            $("#stylist-language").val(languages);

            // for rate
            rate = data.rate;
            formattedRate = formatRate(rate);

            $("#ownerRate").text(formattedRate);
            $("#ownerRate").append(
                '<a class="text-center btn" onclick="editRate()" title="Edit">✎</a>'
            );

            $(`input[name='stylist_rate'][value='${rate}']`).prop(
                "checked",
                true
            );

            // for resume
            resume = data.resume;

            $("#ownerResume").text(resume);
            $("#ownerResume").append(
                '<a class="text-center btn" onclick="editResume()" title="Edit">✎</a>'
            );
            $("#stylist-resume").val(resume);

            // for email
            email = data.email;

            $("#ownerEmail").text(email);

            // for status
            profile_status = data.status;
            $("#status").text(profile_status);
            $("#status").append(
                '<a class="text-center btn" onclick="editStatus();" title="Edit">✎</a>'
            );
            $("#stylist_status").val(profile_status);

            if (type === "hairdressingSalon") {
                populateCheckboxes(
                    data,
                    "stylingProducts",
                    "stylingProducts",
                    "stylingProducts"
                );
                populateCheckboxes(
                    data,
                    "chemicalTreatmentProducts",
                    "chemicalTreatmentProducts",
                    "chemicalTreatmentProducts"
                );
                populateCheckboxes(
                    data,
                    "chemicalTreatmentServices",
                    "chemicalTreatmentServices",
                    "chemicalTreatmentServices"
                );
                populateCheckboxes(
                    data,
                    "hairCuttingServices",
                    "hairCuttingServices",
                    "hairCuttingServices"
                );
                populateCheckboxes(
                    data,
                    "barberMaleGroomingServices",
                    "barberMaleGroomingServices",
                    "barberMaleGroomingServices"
                );
                populateCheckboxes(
                    data,
                    "hairColorServices",
                    "hairColorServices",
                    "hairColorServices"
                );
                populateCheckboxes(
                    data,
                    "hairColorBrands",
                    "hairColorBrands",
                    "hairColorBrands"
                );
            } else if (type === "beautySalon") {
                populateCheckboxes(
                    data,
                    "massageServices",
                    "massageServices",
                    "massageServices"
                );
                populateCheckboxes(
                    data,
                    "massageProducts",
                    "massageProducts",
                    "massageProducts"
                );
                populateCheckboxes(
                    data,
                    "hairRemovalPermanentServices",
                    "hairRemovalPermanentServices",
                    "hairRemovalPermanentServices"
                );
                populateCheckboxes(
                    data,
                    "ladyWaxingServices",
                    "ladyWaxingServices",
                    "ladyWaxingServices"
                );
                populateCheckboxes(
                    data,
                    "ladyWaxingProducts",
                    "ladyWaxingProducts",
                    "ladyWaxingProducts"
                );
                populateCheckboxes(
                    data,
                    "maleWaxingServices",
                    "maleWaxingServices",
                    "maleWaxingServices"
                );
                populateCheckboxes(
                    data,
                    "manicurePedicureServices",
                    "manicurePedicureServices",
                    "manicurePedicureServices"
                );
                populateCheckboxes(
                    data,
                    "manicurePedicureProducts",
                    "manicurePedicureProducts",
                    "manicurePedicureProducts"
                );
                populateCheckboxes(
                    data,
                    "facialServices",
                    "facialServices",
                    "facialServices"
                );
                populateCheckboxes(
                    data,
                    "facialProducts",
                    "facialProducts",
                    "facialProducts"
                );
                populateCheckboxes(
                    data,
                    "homeServiceFacialServices",
                    "homeServiceFacialServices",
                    "homeServiceFacialServices"
                );
                populateCheckboxes(
                    data,
                    "bodyTreatmentServices",
                    "bodyTreatmentServices",
                    "bodyTreatmentServices"
                );
                populateCheckboxes(
                    data,
                    "EyesAndBrowServices",
                    "EyesAndBrowServices",
                    "EyesAndBrowServices"
                );
                populateCheckboxes(
                    data,
                    "EyesAndBrowProducts",
                    "EyesAndBrowProducts",
                    "EyesAndBrowProducts"
                );
                populateCheckboxes(
                    data,
                    "bodyWaxingProducts",
                    "bodyWaxingProducts",
                    "bodyWaxingProducts"
                );
                populateCheckboxes(
                    data,
                    "bodyWaxingServices",
                    "bodyWaxingServices",
                    "bodyWaxingServices"
                );
            }
        }
    }
}

function editServiceAndProduct() {
    if (registrationMode === "hairdressingSalon") {
        $(".Hairdressing-service-product-modal").modal("show");
    }
    if (registrationMode === "beautySalon") {
        $(".Beauty-service-product-modal").modal("show");
    }
}

//update

function loadFileProfile(event) {
    var output = document.getElementById("blah");

    // Check if the event object and its target property exist
    if (event && event.target) {
        // Check if files were selected
        if (event.target.files && event.target.files[0]) {
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src); // free memory
            };
        }
    }
}

$(document).on("click", "#updateProfileImage", function (e) {
    e.preventDefault();
    let type = "POST";
    let url = "/updateProfileImage";
    let message = "";
    let form = $("#hero_image_form");
    let data = new FormData(form[0]);
    // if ($(this).text() == 'Submit') {
    //     url = url;
    // }

    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(
        type,
        url,
        data,
        "",
        updateProfileImageResponse,
        "spinner_button",
        "submit_button"
    );
});

function updateProfileImageResponse(response) {
    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == "200") {
        getProfileData();
        $("#hero_image_form")[0].reset();
        toastr.success(response.message, "", {
            timeOut: 3000,
        });

        $(".profile-pic-modal").modal("hide");
    } else {
        error = response.message;

        toastr.error(error, "", {
            timeOut: 3000,
        });
    }
}

$(document).on("click", ".updateBasicInfoProfile", function (e) {
    e.preventDefault();
    let type = "POST";
    let url = "/updateBasicInfoProfile";
    let message = "";
    let form = $("#updateBasicInfoProfile");
    let data = new FormData(form[0]);
    // if ($(this).text() == 'Submit') {
    //     url = url;
    // }
    $("[name]").removeClass("is-invalid");

    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(
        type,
        url,
        data,
        "",
        updateBasicInfoProfileResponse,
        "spinner_button",
        "submit_button"
    );
});

function updateBasicInfoProfileResponse(response) {
    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == "200") {
        getProfileData();

        toastr.success(response.message, "", {
            timeOut: 3000,
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
            inputField.closest(".form-control").addClass("is-invalid");
        });
        // error_msg = error.split('(');

        toastr.error(error, "", {
            timeOut: 3000,
        });
    }
}

$(document).on("click", ".updateProductAndServices", function (e) {
    e.preventDefault();
    let type = "POST";
    let url = "/updateProductAndServices";
    let message = "";
    let form = $("#updateProductAndServices");
    let data = new FormData(form[0]);
    // if ($(this).text() == 'Submit') {
    //     url = url;
    // }

    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(
        type,
        url,
        data,
        "",
        updateProductAndServicesResponse,
        "spinner_button",
        "submit_button"
    );
});

function updateProductAndServicesResponse(response) {
    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == "200") {
        getProfileData();

        toastr.success(response.message, "", {
            timeOut: 3000,
        });

        $(".modal").modal("hide");
    } else {
        // CALLING OUR FUNTION ERROR & SUCCESS HANDLING
        toastr.error(error, "", {
            timeOut: 3000,
        });
    }
}
