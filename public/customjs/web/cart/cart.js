let logInId = localStorage.getItem("loginstid");

var selected;

$(function () {
    //Ajax call - getappointments
    $.ajax({
        type: "GET",
        url: "/cartData",
        data: {},
        success: function (response) {
            console.log(response.cart);
            if (response.cart == "") {
                $("#cart_line_table").append(
                    '<div class="col-12 text-center">You have no bookings!</div>'
                );
            } else {
                // console.log(response.cart);
                var cart_line_table = "";
                $.each(response.cart, function (i) {
                    if (response.cart[i] != "") {
                        let item_service =
                            response.cart[i].cart_lines[0]["item_service"];
                        let item_text =
                            response.cart[i].cart_lines[0]["item_text"];
                        let item_type =
                            response.cart[i].cart_lines[0]["item_type"];
                        cart_line_table +=
                            `<tr>
                                <td>
                                    <span class="">Service</span>
                                    <span class="">` +
                            item_service +
                            `</span>
                                    <br>
                                    <span class="">Text</span>
                                    <span class="">` +
                            item_text +
                            `</span>
                                    <br>
                                    <span class="">Type</span>
                                    <span class="">` +
                            item_type +
                            `</span>
                                </td>
                                <td><button class="logon_btn heart_btn"><i class="fa fa-trash"></i></button></td>
                            </tr>`;
                        $("#cart_line_table").append(cart_line_table);
                    }
                });
            }
        },
    });
});
