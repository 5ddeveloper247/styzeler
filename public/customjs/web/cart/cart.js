let logInId = localStorage.getItem("loginstid");

var selected;

$(function () {
    //Ajax call - getappointments
    $.ajax({
        type: "GET",
        url: "/cartData",
        data: {},
        success: function (response) {
            if (response.cart == "" || response.cart[0]["cart_lines"] == "") {
                $("#cart_line_table").append(
                    '<div class="col-12 text-center">You Have No Items in Cart!</div>'
                );
            } else {
                $("#cart_services").removeClass("d-none");
                var cart_line_table = "";
                $.each(response.cart, function (i) {
                    let cart = response.cart[i];
                    if (cart != "") {
                        $.each(response.cart[i].cart_lines, function (j) {
                            let cart_line_id = cart.cart_lines[j]["id"];
                            let item_service =
                                cart.cart_lines[j]["item_service"];
                            let item_text = cart.cart_lines[j]["item_text"];
                            let item_type = cart.cart_lines[j]["item_type"];
                            cart_line_table +=
                                `<tr id="cart_line_` +
                                cart_line_id +
                                `">
                                <td>
		                            <span class="">Type:</span>
		                            <span class="">` +
                                item_type +
                                `</span>
		                            <br>
                                    <span class="">Service:</span>
                                    <span class="">` +
                                item_service +
                                `</span>
                                    <br>
                                    <span class="">Text:</span>
                                    <span class="">` +
                                item_text +
                                `</span>


                                </td>
                                <td><button class="logon_btn heart_btn p-2 mx-auto" onclick="deletePrompt(` +
                                cart_line_id +
                                `)" title="Delete service"><i class="fa fa-trash"></i></button></td>
                            </tr>`;
                        });
                    }
                });
                $("#cart_line_table").append(cart_line_table);
            }
        },
    });
});
var modal = $("#cart_line_delete");

function deletePrompt(id) {
    modal.modal("show");
    document
        .getElementById("confirm_delete")
        .setAttribute("onclick", "confirmDelete(" + id + ")");
}

function confirmDelete(id) {
    $.ajax({
        type: "DELETE",
        url: "/cartLineDelete/" + id,
        data: {},
        success: function (response) {
            if (response.status == 200) {
                $("#cart_line_" + response.data).remove();
                modal.modal("hide");

                if ($("#cart_line_table").children().length == 0) {
                    $("#cart_line_table").append(
                        '<div class="col-12 text-center">You Have No Items in Cart!</div>'
                    );
                    $("#cart_services").addClass("d-none");
                    // $("#services .check_list").addClass("d-none");
                }
                countLoadClient()
                toastr.success(response.message, "", {
                    timeOut: 3000,
                });
            }
        },
    });
}
