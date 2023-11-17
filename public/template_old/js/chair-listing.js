// let logInId = localStorage.getItem("loginstid");
$(function () {
    //Ajax call - getappointments
    getAllChairtData();
    //End of Ajax call
});
//Active a chair
function chairStatus(chairId, status) {
    var data = JSON.stringify({
        id: chairId,
        status: status,
    });
    $.ajax({
        type: "post",
        url: "/changeChairStatus",
        data: data,
        success: function (response) {
            $(".chair_booking_row").empty();
            if (response.status == 200) {
                getAllChairtData();
                toastr.success(response.message, "Success");
            }
        },
    });
    //End of Ajax call
}

function getAllChairtData() {
    $.ajax({
        type: "get",
        url: "/chairListingData",
        data: "",
        dataType: "json",
        success: function (response) {
            console.log(response);

            if (response.status == 200) {
                if (response.chairs.length === 0) {
                    $(".chair_booking_row").append(
                        '<div class="col-12 text-center" >You have No Chair Listing!</div>'
                    );
                } else {
                    $.each(response.chairs, function (i) {
                        let id = response.chairs[i]["id"];

                        let status = response.chairs[i]["status"];

                        $(".chair_booking_row").append(
                            '<div class="col-8">' +
                                '<div class="chair_listing_' +
                                i +
                                '">' +
                                "<p><strong>Category: </strong> " +
                                response.chairs[i]["category"] +
                                "</p>" +
                                "</div>" +
                                "</div>" +
                                '<div class="col-4 text-center " id="chair_' +
                                i +
                                '">' +
                                "</div>" +
                                "</div>"
                        );

                        $("#chair_" + i).append(
                            '<a class="text-capitalize" id="status_btn_' +
                                id +
                                '" onclick="chairStatus(' +
                                id +
                                ", '" +
                                status +
                                "');\" >" +
                                status +
                                "</a>"
                        );
                    });
                }
            } else {
                $(".chair_booking_row").append(
                    '<div class="col-12 text-center" >You have No Chair Listing!</div>'
                );
            }
        },
    });
}
