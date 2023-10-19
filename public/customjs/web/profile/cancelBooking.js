function cancelAppointment(app_id) {
    let type = 'POST';
    let url = '/cancelAppointment';
    let message = '';
    let form = '';
    let data = new FormData();
    data.append('app_id', app_id);
    // if ($(this).text() == 'Submit') {
    //     url = url;
    // }

    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', cancelAppointmentResponse, 'spinner_button', 'submit_button');

}

function cancelAppointmentResponse(response) {

    // SHOWING MESSAGE ACCORDING TO RESPONSE
    if (response.status == 200) {
        toastr.success(response.message, '', {
            timeOut: 3000
        });
        getfreelancerBookings()
    } else {
        toastr.error(response.message, '', {
            timeOut: 3000
        });
    }
}