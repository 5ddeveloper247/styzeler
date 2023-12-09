$(window).on("load", function () {
    /*_____ Toggle _____*/
    $(document).on("click", "header > .toggle", function () {
        $("header > .toggle").toggleClass("active");
        $("header").toggleClass("active");
        $("header .contain").slideToggle();
        /* $("html").toggleClass("flow")
		$("body").toggleClass("move")
		$("nav").toggleClass("active") */
    });
    $(document).on("click", "header > .toggle.active", function () {
        $("header > .toggle").removeClass("active");
        $("header").removeClass("active");
        $("header .contain").slideUp();
        /* $("html").removeClass("flow")
		$("body").removeClass("move")
		$("nav").removeClass("active") */
    });
    function subNav() {
        let w = $(window).width();
        if (w <= 1024) {
            $(document).on("click", "header #nav > li.drop > a", function () {
                $(this).parent().find(".sub").slideToggle();
            });
        }
    }
    subNav();
    /*_____ Popup _____*/
    $(document).on("click", ".popup", function (e) {
        if (
            $(e.target).closest(".popup ._inner, .popup .inside").length === 0
        ) {
            $(".popup").fadeOut("3000");
            $("html").removeClass("flow");
            $("#vid_blk > iframe, #vid_blk > video").attr("src", "");
        }
    });
    $(document).on("click", ".popup .x_btn", function () {
        $(".popup").fadeOut();
        $("html").removeClass("flow");
        $("#vid_blk > iframe, #vid_blk > video").attr("src", "");
    });
    $(document).keydown(function (e) {
        if (e.keyCode == 27) $(".popup .x_btn").click();
    });
    $(document).on("click", ".pop_btn", function (e) {
        e.target;
        e.relatedTarget;
        var popUp = $(this).attr("data-popup");
        $("html").addClass("flow");
        $(".popup[data-popup= " + popUp + "]").fadeIn();
        $("#slick-restock").slick("setPosition");
    });
    $(document).on("click", ".pop_btn[data-src]", function () {
        var src = $(this).attr("data-src");
        $("#vid_blk > iframe, #vid_blk > video").attr("src", src);
    });
    function serviceWidth() {
        let w = $(window).width();
        if (w > 767) {
            let svc_btn_width = $(
                "#services .btn_list .shadow_btn"
            ).outerWidth();
            final_svc_btn_width = svc_btn_width / 10;
            // console.log(final_svc_btn_width);
            let txt_wrap_width = svc_btn_width * 3;
            final_txt_wrap_width = (txt_wrap_width + 40 + 12) / 10;
            $("#services .text_list .btns .shadow_btn").each(function () {
                $(this).outerWidth(final_svc_btn_width + 0.1 + "rem");
            });
            $("#services .text_list .txt_wrap form").outerWidth(
                final_txt_wrap_width + "rem"
            );
        }
    }
    serviceWidth();
    function header() {
        let w = $(window).width();
        if (w <= 991) {
            let header = $("header .top .logo").html();
            $("header").prepend(
                "<div class='logo'>" +
                    header +
                    "</div><button type='button' class='toggle'><span></span></button>"
            );
        }
    }
    header();
    function services() {
        let w = $(window).width();
        if (w <= 767) {
            $("#services .text_list .txt_wrap, #services .text_list").prepend(
                "<button type='button' class='back_button'>Back</button>"
            );

            $(document).on(
                "click",
                "#services .btn_list .shadow_btn",
                function () {
                    $("#services .text_list").addClass("active");
                }
            );
            $(document).on(
                "click",
                "#services .text_list > .back_button",
                function () {
                    $("#services .text_list").removeClass("active");
                }
            );
            $(document).on(
                "click",
                "#services .text_list .sub_btns .shadow_btn",
                function () {
                    $("#services .text_list").addClass("flow");
                    $("#services .text_list .txt_wrap").addClass("active");
                }
            );
            $(document).on(
                "click",
                "#services .text_list .txt_wrap > .back_button",
                function () {
                    $("#services .text_list").removeClass("flow");
                    $("#services .text_list .txt_wrap").removeClass("active");
                }
            );
        }
    }
    services();
});

$(window).on("load", function () {
    // AOS Js
    AOS.init({
        easing: "ease-in-out-sine",
        offset: 10,
        disable: window.innerWidth <= 991,
    });
});


function countLoadClient() {
    // e.preventDefault();

    let type = 'GET';
    let url = 'getUserCounter';
    let message = '';
    let form = '';
    let data = '';


    // PASSING DATA TO FUNCTION
    SendAjaxRequestToServer(type, url, data, '', profileResponse, 'spinner_button', 'submit_button');
}
countLoadClient();

function profileResponse(response) {

// SHOWING MESSAGE ACCORDING TO RESPONSE
if (response.status == 200) {
    //saving response data in data var
    $('#cart_count').text(response.data);

}

}