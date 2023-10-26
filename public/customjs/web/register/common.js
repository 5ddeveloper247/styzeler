function loadFile(event) {
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

function SendAjaxRequestToServer(
    requestType = "GET",
    url,
    data,
    dataType = "json",
    callBack = "",
    spinner_button,
    submit_button
) {
    // console.log(data, url, dataType);
    $.ajax({
        type: requestType,
        url: url,
        data: data,
        dataType: dataType,
        processData: false,
        contentType: false,
        beforeSend: function (response) {
            $(spinner_button).toggle();
            $(submit_button).toggle();
        },
        success: function (response) {
            if (typeof callBack === "function") {
                callBack(response);
            } else {
                console.log("error");
            }
        },
        complete: function (data) {
            $(spinner_button).toggle();
            $(submit_button).toggle();
        },
        error: function (response) {
            if (typeof callBack === "function") {
                callBack(response);
            } else {
                console.log("error");
            }
        },
    });
}

function getClientTokens() {
    //	e.preventDefault();
    let type = "GET";
    let url = "/getClientTokens";
    let message = "";
    //	let form = $('#blog-form');
    let data = ""; //new FormData(form[0]);

    // PASSING DATA TO FUNCTION
    $("[name]").removeClass("is-invalid");
    SendAjaxRequestToServer(
        type,
        url,
        data,
        "",
        getClientTokensResponse,
        "spinner_button",
        "submit_button"
    );
}

function getClientTokensResponse(response) {
    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200 || response.status == "200") {
        var details = response.data;

        $("#clientRemTokens").text(
            details.tokens != null ? details.tokens : "0"
        );
        $("#clientTotalTokens").text(
            details.total_tokens != null ? details.total_tokens : "0"
        );

        $("#showTokens_modal").modal("show");
    } else {
        error = response.message;
        var is_invalid = response.errors;

        // Loop through the error object
        //        $.each(is_invalid, function(key) {
        //
        //            // Assuming 'key' corresponds to the form field name
        //            var inputField = $('[name="' + key + '"]');
        //            // Add the 'is-invalid' class to the input field's parent or any desired container
        //            inputField.closest('.form-control').addClass('is-invalid');
        //        });
        // error_msg = error.split('(');

        toastr.error(error, "", {
            timeOut: 3000,
        });
    }
}

$(document).ready(function () {
    $(".oldredirect").click(function () {
        var url = $(this).attr("href");
        window.location.href = url;
    });
});
