function loadFile(event) {
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

function SendAjaxRequestToServer(requestType = 'GET', url, data, dataType = 'json', callBack = '', spinner_button, submit_button) {
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
            if (typeof callBack === 'function') {
                callBack(response);
            } else {
                console.log('error');
            }
        },
        complete: function (data) {
            $(spinner_button).toggle();
            $(submit_button).toggle();
        },
        error: function (response) {
            if (typeof callBack === 'function') {
                callBack(response);
            } else {
                console.log('error');
            }
        }
    })
}