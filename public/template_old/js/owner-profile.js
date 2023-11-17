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

// let OWNERID = "loginstid";
// let FREELANCERREGISTRATIONMODE = "loginmode";

let ownerStId = localStorage.getItem(STID);
let registrationMode = localStorage.getItem(REGISTRATIONMODE);
let registrationEmail = localStorage.getItem(REGISTRATIONEMAIL);
let IMAGEID = "imageid";

// let ownerStId = localStorage.getItem(OWNERID);
// let registrationMode = localStorage.getItem(FREELANCERREGISTRATIONMODE);
//localStorage.clear();

function redirectToPage() {
    // location.reload();
    window.location.href = "./owner-profile.html";
}

//For profile Picture
function readURL(input) {
    var file = input.files[0];
    var reader = new FileReader();
    reader.onloadend = function (e) {
        $("#blah").attr("src", e.target.result);
        // console.log(e.target.result);
        let base64 = reader.result
            .split(";base64")
            .join(",")
            .split("data:image/")
            .join(",")
            .split(",");
        // console.log( base64[1] + base64[3]);

        $.ajax({
            type: "post",
            url: webUrl + "uploadimage",
            data: {
                _ImageContent: base64[3],
                _ImageType: base64[1],
            },
            success: function (response) {
                console.log(response);

                localStorage.setItem(IMAGEID, response["_ImageId"]);
            },
        });
    };
    reader.readAsDataURL(file);
}

let firstName,
    lastName,
    mobile,
    age,
    profileImageId,
    resume,
    nvq2,
    nvq3,
    nvqAssesor,
    tradeTestVideo,
    utr,
    publicLiabilityImage,
    rate,
    language,
    address,
    postcode,
    imageId,
    saveService;

$(function () {
    //Get freelancers
    $.ajax({
        type: "post",
        url: webUrl + "getfreelancers",
        data: {
            _RegistrationMode: registrationMode,
        },
        success: function (response) {
            console.log(response);

            $.each(response.freelancers, function (i) {
                if (response.freelancers[i]["_StId"] == ownerStId) {
                    localStorage.setItem(
                        ISACTIVE,
                        response.freelancers[i]["_IsActive"]
                    );

                    firstName = response.freelancers[i]["_FirstName"];
                    lastName = response.freelancers[i]["_LastName"];
                    //   mobile = response.freelancers[i]["_MobileNumber"];
                    age = response.freelancers[i]["_Age"];
                    profileImageId = response.freelancers[i]["_ProfileImageId"];
                    resume = response.freelancers[i]["_Resume"];
                    nvq2 = response.freelancers[i]["_NVQ_2"];
                    nvq3 = response.freelancers[i]["_NVQ_3"];
                    nvqAssesor = response.freelancers[i]["_NVQ_ASSESOR"];
                    tradeTestVideo =
                        response.freelancers[i]["_TradeTestVideoUrl"];
                    utr = response.freelancers[i]["_UTR"];
                    publicLiabilityImage =
                        response.freelancers[i]["_PublicLiabilityImageId"];
                    rate = response.freelancers[i]["_Rate"];
                    language = response.freelancers[i]["_Languages"];
                    address = response.freelancers[i]["_Address"];
                    postcode = response.freelancers[i]["_PostCode"];
                    saveService = response.freelancers[i]["services"];
                    console.log(saveService);

                    $("#owner-name").text(
                        response.freelancers[i]["_FirstName"] +
                            " " +
                            response.freelancers[i]["_LastName"]
                    );
                    $("#owner-name").append(
                        '<a class="text-center btn" onclick="editName()" title="Edit">' +
                            "✎" +
                            "</a>"
                    );
                    $("#owner-address").text(
                        response.freelancers[i]["_Address"]
                    );
                    $("#owner-address").append(
                        '<a class="text-center btn" onclick="editAddress()" title="Edit">' +
                            "✎" +
                            "</a>"
                    );
                    $("#owner-postcode").text(
                        response.freelancers[i]["_PostCode"]
                    );
                    $("#owner-postcode").append(
                        '<a class="text-center btn" onclick="editPostcode()" title="Edit">' +
                            "✎" +
                            "</a>"
                    );
                    // $("#owner-phone").text(response.freelancers[i]["_MobileNumber"]);
                    // $("#owner-phone").append('<a class="text-center btn" onclick="editMobile()" title="Edit">' + "✎" + "</a>");
                    $("#owner-email").text(response.freelancers[i]["_EmailId"]);

                    //for services
                    $.each(
                        response.freelancers[i].services,
                        function (service) {
                            //console.log(response.freelancers[i].services[service]["service_sub_header"]);
                            if (
                                response.freelancers[i].services[service][
                                    "service_name"
                                ] != ""
                            ) {
                                if (
                                    response.freelancers[i].services[service][
                                        "service_header"
                                    ] === "Services"
                                ) {
                                    $("#ownerService").append(
                                        '<br><div class="text-left"><p>' +
                                            response.freelancers[i].services[
                                                service
                                            ]["service_sub_header"] +
                                            "</p>" +
                                            "<div>" +
                                            "<p><strong>" +
                                            response.freelancers[i].services[
                                                service
                                            ]["service_header"] +
                                            ":  </strong>" +
                                            response.freelancers[i].services[
                                                service
                                            ]["service_name"].substring(
                                                0,
                                                response.freelancers[i]
                                                    .services[service][
                                                    "service_name"
                                                ].length - 2
                                            ) +
                                            "." +
                                            "</p>" +
                                            "</div></div>"
                                    );
                                } else {
                                    $("#ownerProducts").append(
                                        '<br><div class="text-left"><p>' +
                                            response.freelancers[i].services[
                                                service
                                            ]["service_sub_header"] +
                                            "</p>" +
                                            "<div>" +
                                            "<p><strong>" +
                                            response.freelancers[i].services[
                                                service
                                            ]["service_header"] +
                                            ":  </strong>" +
                                            response.freelancers[i].services[
                                                service
                                            ]["service_name"].substring(
                                                0,
                                                response.freelancers[i]
                                                    .services[service][
                                                    "service_name"
                                                ].length - 2
                                            ) +
                                            "." +
                                            "</p>" +
                                            "</div></div>"
                                    );
                                }
                            }
                        }
                    );

                    //for profile image
                    $.ajax({
                        type: "post",
                        url: webUrl + "getimage",
                        data: {
                            _ImageId:
                                response.freelancers[i]["_ProfileImageId"],
                            // "_ImageId": "39"
                        },
                        success: function (newResponse) {
                            //console.log(newResponse["_ImageContent"]);
                            $("#profile-image-id").attr(
                                "src",
                                "data:iamge;base64," +
                                    newResponse["_ImageContent"]
                            );
                            $(".profile-pic").append(
                                '<p><a class="text-center btn edit_pro_pic"  onclick="editProfilePic()" title="Edit">' +
                                    "+" +
                                    "</a></p>"
                            );
                        },
                    });
                }
            });
        },
    });
});

function editProfilePic() {
    $(".profile-pic-modal").modal("show");
}

function editName() {
    $(".name-modal").modal("show");
    $("#stylist-name").attr("placeholder", firstName).blur();
    $("#stylist-surname").attr("placeholder", lastName).blur();
}

function editMobile() {
    $(".mobile-modal").modal("show");
    // $("#stylist-mobile").attr("placeholder", mobile).blur();
    // console.log(firstName);
}

function editAddress() {
    $(".address-modal").modal("show");
    $("#stylist-address").attr("placeholder", address).blur();
    console.log(address);
}

function editPostcode() {
    $(".postcode-modal").modal("show");
    $("#stylist-postcode").attr("placeholder", postcode).blur();
    // console.log(firstName);
}

function editServiceAndProduct() {
    if (registrationMode === "Hairdressing Owner") {
        $(".Hairdressing-service-product-modal").modal("show");
    }
    if (registrationMode === "Beauty Owner") {
        $(".Beauty-service-product-modal").modal("show");
    }
}

function updateProfile() {
    let newfirstName = $("#stylist-name").val();
    let newlastName = $("#stylist-surname").val();
    //   let newmobile = $("#stylist-mobile").val();
    let newaddress = $("#stylist-address").val();
    let newpostcode = $("#stylist-postcode").val();

    let newpicture = localStorage.getItem(IMAGEID);
    console.log(newpicture + "newpicture");

    let letters = /^[A-Za-z][A-Za-z ]+$/;
    if (newfirstName != "") {
        if (newfirstName.match(letters)) {
            firstName = newfirstName;
        }
    }

    if (newlastName != "") {
        if (newlastName.match(letters)) {
            lastName = newlastName;
        }
    }

    let numberLetters = /^[0-9]+$/;
    //   if (newmobile != "") {
    //       if (newmobile.match(numberLetters)) {
    //         mobile = newmobile;
    //       }
    //   }

    let addressLetters = /^[A-Za-z0-9 ':-_+.,A-Za-z0-9 '-_:+.,]+$/;
    if (newaddress != "") {
        if (newaddress.match(addressLetters)) {
            address = newaddress;
        }
    }

    if (newpostcode != "") {
        if (newpostcode.match(addressLetters)) {
            postcode = newpostcode;
        }
    }

    if (newpicture != null) {
        profileImageId = newpicture;
    }

    if (registrationMode === "Hairdressing Owner") {
        //Hair Cutting // idiot just make an array out of it----------------------------------------------------------------------------------------------------
        let hairCutting = [];
        let refinedHairCutting = "";

        hairCutting.push(
            $("#stylist-customer-ladies").is(":checked") ? "Ladies" : 0
        );
        hairCutting.push(
            $("#stylist-customer-gents").is(":checked") ? "Gents" : 0
        );
        hairCutting.push(
            $("#stylist-customer-kids").is(":checked") ? "Kids" : 0
        );
        hairCutting.push(
            $("#stylist-customer-afro").is(":checked") ? "Afro Caribbean" : 0
        );
        // console.log(hairCutting);

        // accepting if checked
        $.each(hairCutting, function (i) {
            console.log(hairCutting[i]);

            if (hairCutting[i] != "0") {
                refinedHairCutting = refinedHairCutting + hairCutting[i] + ", ";
            }
        });

        //merging serviceName + serviceHeader +serviceSubheader
        let hairCuttingService = {
            _ServiceName: refinedHairCutting,
            _ServiceHeader: "Hair Cutting",
            _ServiceSubHeader: "Services",
        };
        //console.log(headService);

        //Barber Male Grooming------------------------------------------------------------------------------------------------------------------------------------
        let barberMaleGrooming = [];
        let barberMaleGroomingProducts = [];
        let refinedBarberMaleGrooming = "";
        let refinedbarberMaleGroomingProducts = "";

        barberMaleGrooming.push(
            $("#scissors-cut").is(":checked") ? "Scissors Cut" : 0
        );
        barberMaleGrooming.push(
            $("#clipper-cut").is(":checked") ? "Clipper Cut" : 0
        );
        barberMaleGrooming.push(
            $("#beard-shaped").is(":checked") ? "Beard Shaped" : 0
        );
        barberMaleGrooming.push(
            $("#skin-fade").is(":checked") ? "Skin Fade" : 0
        );
        barberMaleGrooming.push(
            $("#wet-shave").is(":checked") ? "Wet Shave" : 0
        );
        barberMaleGrooming.push(
            $("#hot-towel").is(":checked") ? "Hot Towel" : 0
        );
        barberMaleGrooming.push(
            $("#chemical-relaxer").is(":checked") ? "Chemical Relaxer" : 0
        );
        barberMaleGrooming.push(
            $("#gray-blending").is(":checked") ? "Gray Blending" : 0
        );
        // console.log(barberMaleGrooming);

        // accepting if checked
        $.each(barberMaleGrooming, function (i) {
            if (barberMaleGrooming[i] != 0) {
                refinedBarberMaleGrooming =
                    refinedBarberMaleGrooming + barberMaleGrooming[i] + ", ";
            }
        });

        console.log(refinedBarberMaleGrooming);

        //merging serviceName + serviceHeader +serviceSubheader
        let barberMaleGroomingService = {
            _ServiceName: refinedBarberMaleGrooming,
            _ServiceHeader: "Barber Male Grooming",
            _ServiceSubHeader: "Services",
        };

        //products
        barberMaleGroomingProducts.push(
            $("#kerastase").is(":checked") ? "Kerastase" : 0
        );
        barberMaleGroomingProducts.push(
            $("#loreal-tecni-art").is(":checked") ? "L'oreal Tecni Art" : 0
        );
        barberMaleGroomingProducts.push(
            $("#schwarzkopf-bc-bonacure").is(":checked")
                ? "Schwarzkopf Bc Bonacure"
                : 0
        );
        barberMaleGroomingProducts.push(
            $("#keracare").is(":checked") ? "KeraCare" : 0
        );
        barberMaleGroomingProducts.push(
            $("#redken").is(":checked") ? "Redken" : 0
        );
        barberMaleGroomingProducts.push(
            $("#anita-grant").is(":checked") ? "Anita Grant" : 0
        );
        barberMaleGroomingProducts.push(
            $("#fudge").is(":checked") ? "Fudge" : 0
        );
        barberMaleGroomingProducts.push(
            $("#moroccan-oil").is(":checked") ? "Moroccan Oil" : 0
        );
        barberMaleGroomingProducts.push(
            $("#kevin-murphy").is(":checked") ? "Kevin Murphy" : 0
        );
        barberMaleGroomingProducts.push(
            $("#proraso").is(":checked") ? "Proraso" : 0
        );
        barberMaleGroomingProducts.push(
            $("#wella-eimi").is(":checked") ? "Wella EIMI" : 0
        );
        barberMaleGroomingProducts.push(
            $("#shu-uemura").is(":checked") ? "Shu Uemura" : 0
        );
        barberMaleGroomingProducts.push(
            $("#aveda").is(":checked") ? "Aveda" : 0
        );

        // accepting if checked
        $.each(barberMaleGroomingProducts, function (i) {
            if (barberMaleGroomingProducts[i] != 0) {
                refinedbarberMaleGroomingProducts =
                    refinedbarberMaleGroomingProducts +
                    barberMaleGroomingProducts[i] +
                    ", ";
            }
        });

        console.log(refinedbarberMaleGroomingProducts);

        //merging productName + serviceHeader +serviceSubheader
        let barberMaleGroomingProduct = {
            _ServiceName: refinedbarberMaleGroomingProducts,
            _ServiceHeader: "Barber Male Grooming",
            _ServiceSubHeader: "Styling Products",
        };

        //Hair Color-------------------------------------------------------------------------------------------------------------------------------------------------
        let hairColor = [];
        let hairColorBrands = [];
        let refinedHairColor = "";
        let refinedHairColorBrands = "";

        //Services
        hairColor.push(
            $("#fashion-color").is(":checked") ? "Fashion Color" : 0
        );
        hairColor.push($("#highlights").is(":checked") ? "Highlights" : 0);
        hairColor.push($("#balayage").is(":checked") ? "Balayage" : 0);
        hairColor.push(
            $("#colour-correction").is(":checked") ? "Colour Correction" : 0
        );
        hairColor.push(
            $("#full-head-bleach").is(":checked") ? "Full Head Bleach" : 0
        );
        // console.log(hairColor);

        // accepting if checked
        $.each(hairColor, function (i) {
            if (hairColor[i] != 0) {
                refinedHairColor = refinedHairColor + hairColor[i] + ", ";
            }
        });

        console.log(refinedHairColor);

        //merging serviceName + serviceHeader +serviceSubheader
        let hairColorService = {
            _ServiceName: refinedHairColor,
            _ServiceHeader: "Hair Color",
            _ServiceSubHeader: "Services",
        };

        //Product
        hairColorBrands.push($("#loreal").is(":checked") ? "Loreal" : 0);
        hairColorBrands.push($("#wella").is(":checked") ? "Wella" : 0);
        hairColorBrands.push(
            $("#schwarzkopf").is(":checked") ? "Schwarzkopf" : 0
        );
        hairColorBrands.push($("#redkenn").is(":checked") ? "Redken" : 0);
        hairColorBrands.push($("#matrix").is(":checked") ? "Matrix" : 0);
        hairColorBrands.push($("#goldwell").is(":checked") ? "Goldwell" : 0);
        hairColorBrands.push($("#aveda").is(":checked") ? "Aveda" : 0);

        // accepting if checked
        $.each(hairColorBrands, function (i) {
            if (hairColorBrands[i] != 0) {
                refinedHairColorBrands =
                    refinedHairColorBrands + hairColorBrands[i] + ", ";
            }
        });

        console.log(refinedHairColorBrands);

        //merging serviceName + serviceHeader +serviceSubheader
        let hairColorBrand = {
            _ServiceName: refinedHairColorBrands,
            _ServiceHeader: "Hair Color",
            _ServiceSubHeader: "Brands",
        };

        //Chemical Treatments---------------------------------------------------------------------------------------------------------------------------------------------
        let chemicalTreatments = [];
        let chemicalTreatmentsProducts = [];
        let refinedChemicalTreatments = "";
        let refinedChemicalTreatmentsProducts = "";

        //Services
        chemicalTreatments.push($("#perm").is(":checked") ? "Perm" : 0);
        chemicalTreatments.push(
            $("#brazilian-blow-dry").is(":checked") ? "Brazilian Blow-Dry" : 0
        );
        chemicalTreatments.push(
            $("#keratin-treatment").is(":checked") ? "Keratin Treatment" : 0
        );
        chemicalTreatments.push(
            $("#chemical-relaxer").is(":checked") ? "Chemical Relaxer" : 0
        );

        // console.log(chemicalTreatments);

        // accepting if checked
        $.each(chemicalTreatments, function (i) {
            if (chemicalTreatments[i] != 0) {
                refinedChemicalTreatments =
                    refinedChemicalTreatments + chemicalTreatments[i] + ", ";
            }
        });

        console.log(refinedChemicalTreatments);

        //merging serviceName + serviceHeader +serviceSubheader
        let chemicalTreatmentService = {
            _ServiceName: refinedChemicalTreatments,
            _ServiceHeader: "Chemical Treatment",
            _ServiceSubHeader: "Services",
        };

        //Products
        chemicalTreatmentsProducts.push(
            $("#kerastraight").is(":checked") ? "Kerastraight" : 0
        );
        chemicalTreatmentsProducts.push(
            $("#global-keratin").is(":checked") ? "Global Keratin" : 0
        );
        chemicalTreatmentsProducts.push(
            $("#cocochoco-brazilian-keratin").is(":checked")
                ? "Cocochoco Brazilian Keratin"
                : 0
        );
        chemicalTreatmentsProducts.push(
            $("#goldwell-kerasilk").is(":checked") ? "Goldwell Kerasilk" : 0
        );
        chemicalTreatmentsProducts.push(
            $("#schwarzkopf-professional").is(":checked")
                ? "Schwarzkopf Professional"
                : 0
        );
        chemicalTreatmentsProducts.push(
            $("#wella-professionals").is(":checked") ? "Wella Professionals" : 0
        );
        chemicalTreatmentsProducts.push(
            $("#sibel").is(":checked") ? "Sibel" : 0
        );
        chemicalTreatmentsProducts.push(
            $("#loreal-professionnel").is(":checked")
                ? "Loreal Professionnel"
                : 0
        );

        // accepting if checked
        $.each(chemicalTreatmentsProducts, function (i) {
            if (chemicalTreatmentsProducts[i] != 0) {
                refinedChemicalTreatmentsProducts =
                    refinedChemicalTreatmentsProducts +
                    chemicalTreatmentsProducts[i] +
                    ", ";
            }
        });

        console.log(refinedChemicalTreatmentsProducts);

        //merging productsName + serviceHeader +serviceSubheader
        let chemicalTreatmentsProduct = {
            _ServiceName: refinedChemicalTreatmentsProducts,
            _ServiceHeader: "Chemical Treatments",
            _ServiceSubHeader: "Products",
        };
        //console.log(chemicalTreatmentsService);

        $.each(saveService, function (service) {
            if (
                saveService[service]["service_sub_header"] === "Hair Cutting" &&
                saveService[service]["service_header"] === "Services"
            ) {
                if (refinedHairCutting != "") {
                    saveService[service]["service_name"] = refinedHairCutting;
                }
            }

            if (
                saveService[service]["service_sub_header"] ===
                    "Barber Male Grooming" &&
                saveService[service]["service_header"] === "Services"
            ) {
                if (refinedBarberMaleGrooming != "") {
                    saveService[service]["service_name"] =
                        refinedBarberMaleGrooming;
                }
            }
            if (
                saveService[service]["service_sub_header"] ===
                    "Barber Male Grooming" &&
                saveService[service]["service_header"] === "Styling Products"
            ) {
                if (refinedbarberMaleGroomingProducts != "") {
                    saveService[service]["service_name"] =
                        refinedbarberMaleGroomingProducts;
                }
            }
            if (
                saveService[service]["service_sub_header"] === "Hair Color" &&
                saveService[service]["service_header"] === "Services"
            ) {
                if (refinedHairColor != "") {
                    saveService[service]["service_name"] = refinedHairColor;
                }
            }
            if (
                saveService[service]["service_sub_header"] === "Hair Color" &&
                saveService[service]["service_header"] === "Brands"
            ) {
                if (refinedHairColorBrands != "") {
                    saveService[service]["service_name"] =
                        refinedHairColorBrands;
                }
            }
            if (
                saveService[service]["service_sub_header"] ===
                    "Chemical Treatment" &&
                saveService[service]["service_header"] === "Services"
            ) {
                if (refinedChemicalTreatments != "") {
                    saveService[service]["service_name"] =
                        refinedChemicalTreatments;
                }
            }
            if (
                saveService[service]["service_sub_header"] ===
                    "Chemical Treatments" &&
                saveService[service]["service_header"] === "Products"
            ) {
                if (refinedChemicalTreatmentsProducts != "") {
                    saveService[service]["service_name"] =
                        refinedChemicalTreatmentsProducts;
                }
            }
        });
    }
    if (registrationMode === "Beauty Owner") {
        //Message ----------------------------------------------------------------------------------------------------
        let message = [];
        let messageProducts = [];
        let refinedMessage = "";
        let refinedMessageProducts = "";

        //Services
        message.push(
            $("#swedish-massage").is(":checked") ? "Swedish Massage" : 0
        );
        message.push(
            $("#hot-stone-massage").is(":checked") ? "Hot Stone Massage" : 0
        );
        message.push(
            $("#deep-tissue-massage").is(":checked") ? "Deep Tissue Massage" : 0
        );
        message.push(
            $("#armatherapy").is(":checked") ? "Armatherapy Message" : 0
        );
        message.push(
            $("#shiatsu-massage").is(":checked") ? "Shiatsu Massage" : 0
        );
        message.push(
            $("#pregnancy-massage").is(":checked") ? "Pregnancy Massage" : 0
        );
        message.push($("#thai-massage").is(":checked") ? "Thai Massage" : 0);
        message.push(
            $("#lymphatic-massage").is(":checked") ? "lymphatic Massage" : 0
        );
        message.push($("#reflexology").is(":checked") ? "Reflexology" : 0);

        //Products
        messageProducts.push($("#kaeso").is(":checked") ? "Kaeso" : 0);
        messageProducts.push(
            $("#purple-flame").is(":checked") ? "Purple Flame" : 0
        );
        messageProducts.push(
            $("#strictly-professional").is(":checked")
                ? "Strictly Professional"
                : 0
        );
        messageProducts.push($("#lotus").is(":checked") ? "Lotus" : 0);
        messageProducts.push($("#elemis").is(":checked") ? "Elemis" : 0);
        messageProducts.push(
            $("#dermalogica").is(":checked") ? "Dermalogica" : 0
        );

        // console.log(hairCutting);

        // accepting if checked
        $.each(message, function (i) {
            console.log(message[i]);

            if (message[i] != 0) {
                refinedMessage = refinedMessage + message[i] + ", ";
            }
        });

        //String
        console.log(refinedMessage);

        //merging serviceName + serviceHeader +serviceSubheader
        let messageService = {
            _ServiceName: refinedMessage,
            _ServiceHeader: "Message",
            _ServiceSubHeader: "Services",
        };
        //console.log(headMessage);

        // accepting if checked
        $.each(messageProducts, function (i) {
            console.log(messageProducts[i]);

            if (messageProducts[i] != 0) {
                refinedMessageProducts =
                    refinedMessageProducts + messageProducts[i] + ", ";
            }
        });

        let messageProduct = {
            _ServiceName: refinedMessageProducts,
            _ServiceHeader: "Message",
            _ServiceSubHeader: "Products",
        };

        //Hair Removal Permanent----------------------------------------------------------------------------------------------------
        let hairRemovalPermanent = [];
        let refinedHairRemoval = "";

        //Services
        hairRemovalPermanent.push($("#laser").is(":checked") ? "Laser" : 0);
        hairRemovalPermanent.push($("#ipl").is(":checked") ? "Ipl" : 0);
        hairRemovalPermanent.push(
            $("#electrolysis").is(":checked") ? "Electrolysis" : 0
        );

        // console.log(hairCutting);

        // accepting if checked
        $.each(hairRemovalPermanent, function (i) {
            console.log(hairRemovalPermanent[i]);

            if (hairRemovalPermanent[i] != 0) {
                refinedHairRemoval =
                    refinedHairRemoval + hairRemovalPermanent[i] + ", ";
            }
        });

        //String
        console.log(refinedHairRemoval);

        //merging serviceName + serviceHeader +serviceSubheader
        let hairRemovalService = {
            _ServiceName: refinedHairRemoval,
            _ServiceHeader: "Hair Removal Permanent",
            _ServiceSubHeader: "Services",
        };
        //console.log(headService);

        //Body Wax Permanent----------------------------------------------------------------------------------------------------
        let bodyWax = [];
        let bodyWaxProducts = [];
        let refinedBodyWax = "";
        let refinedBodyWaxProductes = "";

        //Services
        bodyWax.push($("#eye-brows").is(":checked") ? "Eye Brows" : 0);
        bodyWax.push($("#lip").is(":checked") ? "Lip" : 0);
        bodyWax.push($("#chin").is(":checked") ? "Chin" : 0);
        bodyWax.push($("#neck").is(":checked") ? "Neck" : 0);
        bodyWax.push($("#full-arms").is(":checked") ? "Full Arms" : 0);
        bodyWax.push($("#underarms").is(":checked") ? "Underarms" : 0);
        bodyWax.push($("#forearms").is(":checked") ? "Forearms" : 0);
        bodyWax.push($("#upper-legs").is(":checked") ? "Upper Legs" : 0);
        bodyWax.push($("#full-legs").is(":checked") ? "Full Legs" : 0);
        bodyWax.push($("#lower-legs").is(":checked") ? "Lower-legs" : 0);
        bodyWax.push($("#bikini").is(":checked") ? "Bikini" : 0);
        bodyWax.push($("#french-bikini").is(":checked") ? "French Bikini" : 0);
        bodyWax.push(
            $("#brazilian-bikini").is(":checked") ? "Brazilian Bikini" : 0
        );
        bodyWax.push($("#hollywood").is(":checked") ? "Hollywood" : 0);

        //Products
        bodyWaxProducts.push(
            $("#gigi-honee").is(":checked") ? "Gigi Honee" : 0
        );
        bodyWaxProducts.push($("#hive-wax").is(":checked") ? "Hive Wax" : 0);
        bodyWaxProducts.push(
            $("#lotus-essentials").is(":checked") ? "Lotus Essentials" : 0
        );
        bodyWaxProducts.push(
            $("#berodinsatin").is(":checked") ? "Berodin Satin" : 0
        );
        bodyWaxProducts.push($("#cirepil").is(":checked") ? "Cirepil" : 0);
        bodyWaxProducts.push(
            $("#Smooth Honey Waz").is(":checked") ? "Smooth Honey Wax" : 0
        );
        bodyWaxProducts.push(
            $("#shobha-sugar-wax").is(":checked") ? "Shobha Sugar Wax" : 0
        );

        // console.log(hairCutting);

        // accepting if checked
        $.each(bodyWax, function (i) {
            console.log(bodyWax[i]);

            if (bodyWax[i] != 0) {
                refinedBodyWax = refinedBodyWax + bodyWax[i] + ", ";
            }
        });

        //String
        console.log(refinedBodyWax);

        //merging serviceName + serviceHeader +serviceSubheader
        let bodyWaxService = {
            _ServiceName: refinedBodyWax,
            _ServiceHeader: "Body Wax",
            _ServiceSubHeader: "Services",
        };
        //console.log(bodyWax);

        // accepting if checked
        $.each(bodyWaxProducts, function (i) {
            console.log(bodyWaxProducts[i]);

            if (bodyWaxProducts[i] != 0) {
                refinedBodyWaxProductes =
                    refinedBodyWaxProductes + bodyWaxProducts[i] + ", ";
            }
        });

        //String
        console.log(refinedBodyWaxProductes);

        //merging serviceName + serviceHeader +serviceSubheader
        let bodyWaxProduct = {
            _ServiceName: refinedBodyWaxProductes,
            _ServiceHeader: "Body Wax",
            _ServiceSubHeader: "Products",
        };

        //Manicure Pedicure Permanent----------------------------------------------------------------------------------------------------
        let maniPedi = [];
        let maniPediProducts = [];
        let refinedmaniPedi = "";
        let refinedmaniPediProducts = "";

        //Services
        maniPedi.push(
            $("#traditional-mani-pedi").is(":checked")
                ? "Traditional Mani Pedi"
                : 0
        );
        maniPedi.push($("#spa-mani-pedi").is(":checked") ? "Spa Mani Pedi" : 0);
        maniPedi.push($("#get-mani-pedi").is(":checked") ? "Gel Mani Pedi" : 0);
        maniPedi.push($("#mani-pedi").is(":checked") ? "Mani Pedi" : 0);
        maniPedi.push(
            $("#french-mani-pedi").is(":checked") ? "French Mani Pedi" : 0
        );
        maniPedi.push(
            $("#russian-mani-pedi").is(":checked")
                ? "Russian Manicure/Pedicure"
                : 0
        );
        maniPedi.push(
            $("#acrylic-nail-extension").is(":checked")
                ? "Acrylic Nail Extension"
                : 0
        );
        maniPedi.push(
            $("#get-nail-extension").is(":checked") ? "Get Nail Extension" : 0
        );
        maniPedi.push($("#hard-gel").is(":checked") ? "Hard Gel" : 0);
        maniPedi.push($("#nail-designs").is(":checked") ? "Nail Designs" : 0);
        maniPedi.push($("#nail-art").is(":checked") ? "Nail Art" : 0);

        //Products
        maniPediProducts.push($("#nails-inc").is(":checked") ? "Nails Inc" : 0);
        maniPediProducts.push($("#siegel").is(":checked") ? "siegel" : 0);
        maniPediProducts.push($("#opi").is(":checked") ? "Opi" : 0);
        maniPediProducts.push($("#cnd").is(":checked") ? "Cnd" : 0);
        maniPediProducts.push($("#gelish").is(":checked") ? "Gelish" : 0);
        maniPediProducts.push($("#zoya").is(":checked") ? "Zoya" : 0);
        maniPediProducts.push(
            $("#sally-hansen").is(":checked") ? "Sally Hansen" : 0
        );
        maniPediProducts.push($("#kaeso").is(":checked") ? "Kaeso" : 0);
        maniPediProducts.push(
            $("#ibd-flex").is(":checked") ? "IBD flex polymer powder" : 0
        );
        maniPediProducts.push(
            $("#ibd-grip-monomer-liquid").is(":checked")
                ? "IBD grip monomer liquid"
                : 0
        );
        maniPediProducts.push(
            $("#nail-harmony").is(":checked") ? "Nail harmony" : 0
        );
        maniPediProducts.push($("#nsi").is(":checked") ? "NSI" : 0);

        // console.log(hairCutting);

        // accepting if checked
        $.each(maniPedi, function (i) {
            console.log(maniPedi[i]);

            if (maniPedi[i] != 0) {
                refinedmaniPedi = refinedmaniPedi + maniPedi[i] + ", ";
            }
        });

        //String
        console.log(refinedmaniPedi);

        //merging serviceName + serviceHeader +serviceSubheader
        let maniPediService = {
            _ServiceName: refinedmaniPedi,
            _ServiceHeader: "Mani Pedi",
            _ServiceSubHeader: "Services",
        };
        //console.log(headService);

        // accepting if checked
        $.each(maniPediProducts, function (i) {
            console.log(maniPediProducts[i]);

            if (maniPediProducts[i] != 0) {
                refinedmaniPediProducts =
                    refinedmaniPediProducts + maniPediProducts[i] + ", ";
            }
        });

        //String
        console.log(refinedmaniPedi);

        //merging serviceName + serviceHeader +serviceSubheader
        let maniPediProduct = {
            _ServiceName: refinedmaniPediProducts,
            _ServiceHeader: "Mani Pedi",
            _ServiceSubHeader: "Products",
        };

        //Facials ----------------------------------------------------------------------------------------------------
        let facials = [];
        let facialsProducts = [];
        let refinedFacials = "";
        let refinedFacialsProducts = "";

        //Services
        facials.push(
            $("#fire-iced-red").is(":checked")
                ? "Fire & Iced Red Carpet Facial"
                : 0
        );
        facials.push(
            $("#microdermabrasion-with-crystals").is(":checked")
                ? "Microdermabrasion with Crystals"
                : 0
        );
        facials.push(
            $("#biophora-deep-cleansing").is(":checked")
                ? "Biophora deep cleansing"
                : 0
        );
        facials.push(
            $("#microdermabrasion-with-hyaluronic").is(":checked")
                ? "Microdermabrasion with Hyaluronic"
                : 0
        );
        facials.push($("#acid-infusion").is(":checked") ? "Acid Infusion" : 0);
        facials.push(
            $("#oxygen-infused-facial").is(":checked")
                ? "oxygen Infused Facial"
                : 0
        );
        facials.push(
            $("#hydra-facial-md").is(":checked") ? "Hydra Facial Md" : 0
        );
        facials.push($("#micro-facial").is(":checked") ? "Micro Facial" : 0);
        facials.push(
            $("#standard-facials").is(":checked") ? "Standard Facials" : 0
        );
        facials.push($("#dermaplaning").is(":checked") ? "Dermaplaning" : 0);

        //Products
        facialsProducts.push(
            $("#eve-taylor").is(":checked") ? "Eve Taylor" : 0
        );
        facialsProducts.push($("#environ").is(":checked") ? "Environ" : 0);
        facialsProducts.push(
            $("#sans-souis").is(":checked") ? "Sans Souis" : 0
        );
        facialsProducts.push($("#elemis").is(":checked") ? "Elemis" : 0);
        facialsProducts.push(
            $("#glo-therapeutics").is(":checked") ? "Glo Therapeutics" : 0
        );
        facialsProducts.push(
            $("#mario-badescu").is(":checked") ? "Mario Badescu" : 0
        );
        facialsProducts.push(
            $("#dermalogica").is(":checked") ? "Dermalogica" : 0
        );
        facialsProducts.push(
            $("#md-formulation").is(":checked") ? "Md Formulation" : 0
        );

        // console.log(hairCutting);

        // accepting if checked
        $.each(facials, function (i) {
            console.log(facials[i]);

            if (facials[i] != 0) {
                refinedFacials = refinedFacials + facials[i] + ", ";
            }
        });

        //String
        console.log(refinedFacials);

        //merging serviceName + serviceHeader +serviceSubheader
        let facialsService = {
            _ServiceName: refinedFacials,
            _ServiceHeader: "Facials",
            _ServiceSubHeader: "Services",
        };
        //console.log(facialsService);

        // accepting if checked
        $.each(facialsProducts, function (i) {
            console.log(facialsProducts[i]);

            if (facialsProducts[i] != 0) {
                refinedFacialsProducts =
                    refinedFacialsProducts + facialsProducts[i] + ", ";
            }
        });

        //String
        console.log(refinedFacials);

        //merging serviceName + serviceHeader +serviceSubheader
        let facialsProduct = {
            _ServiceName: refinedFacialsProducts,
            _ServiceHeader: "Facials",
            _ServiceSubHeader: "Products",
        };

        //Bodytreatment ----------------------------------------------------------------------------------------------------
        let bodyTreatment = [];
        let refinedBodyTreatment = "";

        //Services
        bodyTreatment.push(
            $("#body-polish").is(":checked") ? "Body Polish" : 0
        );
        bodyTreatment.push($("#body-scrub").is(":checked") ? "Body Scrub" : 0);
        bodyTreatment.push($("#body-wrap").is(":checked") ? "Body Wrap" : 0);

        // console.log(hairCutting);

        // accepting if checked
        $.each(bodyTreatment, function (i) {
            console.log(bodyTreatment[i]);

            if (bodyTreatment[i] != 0) {
                refinedBodyTreatment =
                    refinedBodyTreatment + bodyTreatment[i] + ", ";
            }
        });

        //String
        console.log(refinedBodyTreatment);

        //merging serviceName + serviceHeader +serviceSubheader
        let bodyTreatmentService = {
            _ServiceName: refinedBodyTreatment,
            _ServiceHeader: "Body Treatment",
            _ServiceSubHeader: "Services",
        };
        //console.log(bodyTreatmentService);

        //Eyebrows ----------------------------------------------------------------------------------------------------
        let eyebrows = [];
        let eyebrowsProducts = [];
        let refinedEyebrows = "";
        let refinedEyebrowsProducts = "";

        //Services
        eyebrows.push(
            $("#eyelash-extensions").is(":checked") ? "Eyelash Extensions" : 0
        );
        eyebrows.push($("#eyebrow-tint").is(":checked") ? "Eyebrow Tint" : 0);
        eyebrows.push($("#lash-lifting").is(":checked") ? "Lash Lifting" : 0);
        eyebrows.push(
            $("#eyebrow-threading").is(":checked") ? "Eyebrow Threading" : 0
        );

        //Products
        eyebrowsProducts.push(
            $("#london-lash").is(":checked") ? "London Lash" : 0
        );
        eyebrowsProducts.push(
            $("#eyelure-lashes").is(":checked") ? "Eyelure Lashes" : 0
        );
        eyebrowsProducts.push($("#lash-art").is(":checked") ? "Lash Art" : 0);
        eyebrowsProducts.push(
            $("#lash-heaven").is(":checked") ? "Lash Heaven" : 0
        );
        eyebrows.push(
            $("#eyelash-extensions").is(":checked") ? "Eyelash Extensions" : 0
        );
        eyebrowsProducts.push(
            $("#smart-brow").is(":checked") ? "Smart Brow" : 0
        );
        eyebrowsProducts.push(
            $("#lrefectiocil").is(":checked") ? "Lrefectiocil" : 0
        );

        // console.log(hairCutting);

        // accepting if checked
        $.each(eyebrows, function (i) {
            console.log(eyebrows[i]);

            if (eyebrows[i] != 0) {
                refinedEyebrows = refinedEyebrows + eyebrows[i] + ", ";
            }
        });

        //String
        console.log(refinedEyebrows);

        //merging serviceName + serviceHeader +serviceSubheader
        let eyebrowsService = {
            _ServiceName: refinedEyebrows,
            _ServiceHeader: "Eyebrows",
            _ServiceSubHeader: "Services",
        };
        //console.log(eyebrowsService);

        // accepting if checked
        $.each(eyebrowsProducts, function (i) {
            console.log(eyebrowsProducts[i]);

            if (eyebrowsProducts[i] != 0) {
                refinedEyebrowsProducts =
                    refinedEyebrowsProducts + eyebrowsProducts[i] + ", ";
            }
        });

        //String
        console.log(refinedEyebrowsProducts);

        //merging serviceName + serviceHeader +serviceSubheader
        let eyebrowsProduct = {
            _ServiceName: refinedEyebrowsProducts,
            _ServiceHeader: "Eyebrows",
            _ServiceSubHeader: "Products",
        };

        $.each(saveService, function (service) {
            if (
                saveService[service]["service_sub_header"] === "Message" &&
                saveService[service]["service_header"] === "Services"
            ) {
                if (refinedMessage != "") {
                    saveService[service]["service_name"] = refinedMessage;
                }
            }
            if (
                saveService[service]["service_sub_header"] === "Message" &&
                saveService[service]["service_header"] === "Products"
            ) {
                if (refinedMessageProducts != "") {
                    saveService[service]["service_name"] =
                        refinedMessageProducts;
                }
            }
            if (
                saveService[service]["service_sub_header"] ===
                    "Hair Removal Permanent" &&
                saveService[service]["service_header"] === "Services"
            ) {
                if (refinedHairRemoval != "") {
                    saveService[service]["service_name"] = refinedHairRemoval;
                }
            }
            if (
                saveService[service]["service_sub_header"] === "Body Waxing" &&
                saveService[service]["service_header"] === "Services"
            ) {
                if (refinedBodyWax != "") {
                    saveService[service]["service_name"] = refinedBodyWax;
                }
            }
            if (
                saveService[service]["service_sub_header"] === "Body Wax" &&
                saveService[service]["service_header"] === "Products"
            ) {
                if (refinedBodyWaxProductes != "") {
                    saveService[service]["service_name"] =
                        refinedBodyWaxProductes;
                }
            }
            if (
                saveService[service]["service_sub_header"] ===
                    "Manicure Pedicure" &&
                saveService[service]["service_header"] === "Services"
            ) {
                if (refinedmaniPedi != "") {
                    saveService[service]["service_name"] = refinedmaniPedi;
                }
            }
            if (
                saveService[service]["service_sub_header"] ===
                    "Manicure Pedicure" &&
                saveService[service]["service_header"] === "Products"
            ) {
                if (refinedmaniPediProducts != "") {
                    saveService[service]["service_name"] =
                        refinedmaniPediProducts;
                }
            }
            if (
                saveService[service]["service_sub_header"] === "Facials" &&
                saveService[service]["service_header"] === "Services"
            ) {
                if (refinedFacials != "") {
                    saveService[service]["service_name"] = refinedFacials;
                }
            }
            if (
                saveService[service]["service_sub_header"] === "Facials" &&
                saveService[service]["service_header"] === "Products"
            ) {
                if (refinedFacialsProducts != "") {
                    saveService[service]["service_name"] =
                        refinedFacialsProducts;
                }
            }
            if (
                saveService[service]["service_sub_header"] ===
                    "Body Treatment" &&
                saveService[service]["service_header"] === "Services"
            ) {
                if (refinedBodyTreatment != "") {
                    saveService[service]["service_name"] = refinedBodyTreatment;
                }
            }
            if (
                saveService[service]["service_sub_header"] === "Eyebrows" &&
                saveService[service]["service_header"] === "Services"
            ) {
                if (refinedEyebrows != "") {
                    saveService[service]["service_name"] = refinedEyebrows;
                }
            }
            if (
                saveService[service]["service_sub_header"] === "Eyebrows" &&
                saveService[service]["service_header"] === "Products"
            ) {
                if (refinedEyebrowsProducts != "") {
                    saveService[service]["service_name"] =
                        refinedEyebrowsProducts;
                }
            }
        });
    }

    console.log(
        ownerStId,
        registrationMode,
        registrationEmail,
        firstName,
        lastName,
        mobile,
        age,
        profileImageId,
        resume,
        nvq2,
        nvq3,
        nvqAssesor,
        tradeTestVideo,
        utr,
        publicLiabilityImage,
        rate,
        language,
        address,
        postcode,
        imageId,
        saveService
    );

    $.ajax({
        type: "post",
        url: webUrl + "editfreelancer",
        data: {
            _StId: ownerStId,
            _RegistrationMode: registrationMode,
            _EmailId: registrationEmail,
            _FirstName: firstName,
            _LastName: lastName,
            // "_MobileNumber" : mobile,
            _Age: age,
            _ProfileImageId: profileImageId,
            _Resume: resume,
            _NVQ_2: nvq2,
            _NVQ_3: nvq3,
            _NVQ_ASSESOR: nvqAssesor,
            _TradeTestVideoUrl: tradeTestVideo,
            _UTR: utr,
            _PublicLiabilityImageId: publicLiabilityImage,
            _Rate: rate,
            _Languages: language,
            _Address: address,
            _PostCode: postcode,
            _images: imageId,
            services: saveService,
        },
        success: function (response) {
            console.log(response);

            localStorage.removeItem(IMAGEID);

            if (response["_ReturnMessage"] === "Success") {
                $(".success-modal").modal("show");
            }
        },
    });
}
