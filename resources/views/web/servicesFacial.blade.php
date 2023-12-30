@extends('layouts.master.template_new.master')

@push('css')
    <style>
        #services .text_list .btns .shadow_btn {
            text-align: left;
        }

        #services .text_list .txt_wrap form .input_box {
            height: 4rem;
            gap: 7px !important;
        }

        .btn1 {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .customBtn {
            color: #c4b9b0 !important;
            border: 1px solid #c4b9b0;
            border-radius: 0;
            font-size: 18px;
            transition-duration: 0.3s;
            cursor: pointer;
        }

        .outer-width {
            width: auto !important;
        }

        .cart_icon {
            border: 1px solid #fdd431;
            border-radius: 50%;
        }
    </style>
@endpush

@section('content')
    <section id="services">
        <input type="hidden" name="check_btn" id="check_btn">
        <div class="contain" data-aos="fade-up" data-aos-duration="1000">
            <div class="outer">
                <div class="image_blk">
                    <div class="image"><img src="{{ asset('template_new/assets/images1/facial1.webp') }}" alt="">
                    </div>
                    <div class="image"><img src="{{ asset('template_new/assets/images1/facial2.webp') }}" alt="">
                    </div>
                </div>
                <div class="content_blk"
                    style="background-image: url('{{ asset('template_new/assets/images/service_main.jpg') }}');">
                    <h2>You book We deliver</h2>
                    <div class="inner">
                        <div class="btn_list">
                            <a href="{{ route('servicesBodywaxing') }}" class="shadow_btn special-button" data-id="body_waxing">Body
                                Waxing</a>
                            <a href="{{ route('servicesEyebrows') }}" class="shadow_btn special-button" data-id="eye_brows">Eyes &
                                Brows</a>
                            <a href="{{ route('servicesManiPedi') }}" class="shadow_btn special-button" data-id="mani_pedi">Mani / Pedi</a>
                            <a href="javascript:;" class="shadow_btn" data-id="facial">Facial</a>
                        </div>
                        <div class="text_list" data-id="facial" style="display: block;">
                            <div class="text_list_inner">
                                <ul class="btns scrollbar shadowbtn" id="list_btns">
                                    <li>
                                        <button type="button" class="shadow_btn shaddowbtn1"
                                            onclick="caseCat('Classic_facial')">Classic Facial <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shaddowbtn1"
                                            onclick="caseCat('Hydrafacial')">Hydrafacial <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>

                                    <li>
                                        <button type="button" class="shadow_btn shaddowbtn1"
                                            onclick="caseCat('Linphatic_Facial')">Linphatic Facial <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shaddowbtn1"
                                            onclick="caseCat('Antioxidant_facial')">Antioxidant Facial <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shaddowbtn1"
                                            onclick="caseCat('Acupuncture_facial')">Acupuncture Facial <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shaddowbtn1"
                                            onclick="caseCat('Acne_Reduction_Facial')" style="font-size: 1.5rem;">Acne
                                            Reduction Facial <img src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>

                                </ul>
                                <div class="txt_wrap scrollbar" id="showbox">
                                    <form action="" method="post" id="inner_form">
                                        <div class="form_inner">
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="row">
                                                        <div id="top_1" class="col-md-4 outer-width mb-4">
                                                            <div class="input_box_wrap">
                                                                <!-- 															<input type="text" class="input_box" value=""> -->
                                                                <p class="input_box add_to_cart d-flex" data-time=""
                                                                    data-price="" data-type="" data-subtype=""
                                                                    data-service=""></p>
                                                            </div>
                                                        </div>

                                                        <div id="top_2" class="col-md-4 outer-width mb-4">
                                                            <div class="input_box_wrap">
                                                                <!-- 															<input type="text" class="input_box" value=""> -->
                                                                <p class="input_box add_to_cart d-flex" data-time=""
                                                                    data-price="" data-type="" data-subtype=""
                                                                    data-service=""></p>
                                                            </div>
                                                        </div>
                                                        <div id="top_3" class="col-md-4 outer-width mb-4">
                                                            <div class="input_box_wrap">
                                                                <!-- 															<input type="text" class="input_box" value=""> -->
                                                                <p class="input_box add_to_cart d-flex" data-time=""
                                                                    data-price="" data-type="" data-subtype=""
                                                                    data-service=""></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div>
                                                <p id="description">Lorem Ipsum is simply dummy text of the printing and
                                                    typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                                    text ever since the 1500s, when an unknown printer took a galley of type
                                                    and scrambled it to make a type specimen book. It has survived not only
                                                    five centuries, but also the leap into electronic typesetting, remaining
                                                    essentially unchanged. It was popularised in the 1960s with the release
                                                    of Letraset sheets containing Lorem Ipsum passages, and more recently
                                                    with desktop publishing software like Aldus PageMaker including versions
                                                    of Lorem Ipsum.</p>
                                            </div>
                                        </div>
                                        <div class="right-arrow">
                                            {{-- <img src="{{ asset('template_new/assets/images/arrow-234.svg') }}"> --}}
                                        </div>
                                        <div class="btn_block mt-0">
                                            {{-- @if (@$tokens > 0)
                                                <a href="{{ route('bookFreelancer') }}" class="book_freelance_btn">
                                                    <img src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""> Book a Freelancer
                                                </a>
                                            @else
                                                <a href="javascript:;" class="book_freelance_btn error-booking">
                                                    <img src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""> Book a Freelancer
                                                </a>
                                            @endif --}}
                                            <ul class="check_list my-3">
                                                <li><img src="{{ asset('template_new/assets/images/tick2.svg') }}"
                                                        alt=""> All candidates are DBS verified</li>
                                                <li><img src="{{ asset('template_new/assets/images/tick2.svg') }}"
                                                        alt=""> At - Home service 24/7</li>
                                                <li><img src="{{ asset('template_new/assets/images/tick2.svg') }}"
                                                        alt=""> Minimum call out &pound;30</li>
                                            </ul>
                                        </div>
                                    </form>
                                    <form id="addtocart_form" style="display: none;">
                                        <input type="hidden" id="userId" name="userId"
                                            value="{{ @Auth::user()->id }}">
                                        <input type="hidden" id="userType" name="userType"
                                            value="{{ @Auth::user()->type }}">
                                        <input type="hidden" id="item_text" name="item_text" value="">
                                        <input type="hidden" id="item_time" name="item_time" value="">
                                        <input type="hidden" id="item_price" name="item_price" value="">
                                        <input type="hidden" id="item_type" name="item_type" value="">
                                        <input type="hidden" id="item_subtype" name="item_subtype" value="">
                                        <input type="hidden" id="item_service" name="item_service" value="">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Booking Fail Message-->
        <div class="modal fade bd-example-modal-md" id="fail-modal" role="dialog">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content border-warning border"
                    style="background-color: black; color: white; max-height: 400px; overflow-y: auto;">
                    <div class="modal-header" style="border-bottom: 5px solid #766d48;">
                        <h4 class="modal-title">Buy Package</h4>
                        <i class="close-modal" data-dismiss="modal" style="font-size: 2rem;"><b>&times;</b></i>
                    </div>
                    <div class="modal-body">
                        Insufficient tokens, first buy package!
                    </div>
                    <div class="modal-footer text-center">
                        <a type="" href="{{ route('home_service') }}#packages" class="btn1 customBtn">Ok</a>
                        <a type="button" class="btn1 customBtn close-modal" data-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-md" id="cartConfirm_modal" role="dialog">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content border-warning border"
                    style="background-color: black; color: white; max-height: 400px; overflow-y: auto;">
                    <div class="modal-header" style="border-bottom: 5px solid #766d48;">
                        <h4 class="modal-title">Confirmation</h4>
                        <i class="close-modal closeCartConfirm" style="font-size: 2rem;cursor:pointer;"><b>&times;</b></i>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to add this service in cart?
                    </div>
                    <div class="modal-footer text-center">
                        <a type="" href="javascript:;" class="btn1 customBtn"
                        onclick="addToCartConfirm();">Yes</a>
                        <a type="button" class="btn1 customBtn closeCartConfirm" data-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('script')
    <script src="{{ asset('customjs/web/cart/addtocart.js') }}?v={{ time() }}"></script>
    <script>
        var addtocartType = 'Facial';
        $.extend($.expr[":"], {
            "containsExact": function (a, i, m) {
                return jQuery(a).text() === m[3];
            }
        });
	    $(document).ready(function() { // for mobile view
			if ($(window).width() < 500) {
	        	// $(".text_list").addClass("active");
	       	}
		});
        $(window).on("load", function() {
            $(document).on("click", ".btn_list .shadow_btn", function() {
                let id = $(this).data("id");
                $(".text_list[data-id = " + id + "]").slideToggle();
            });
            $(document).on("click", ".btns > li > button", function() {
                $(this).parent().find(".sub_btns").slideToggle();
            });
            $(document).on("click", ".sub_btns > li > button", function() {
                $(this).parents(".text_list_inner").find(".txt_wrap").fadeIn();
            });
            $(document).on("click", ".special-button", function() {
                $(".sub_btns").hide();
                var body_wax = $(this).text();
                if(body_wax !== 'Facial'){
                    $(".text_list").removeClass("active");
                }
            });
            // $(document).on("click", ".shadowbtn", function() {
            //     $(this).parents(".text_list_inner").find(".txt_wrap").fadeIn();
            // });
            $(document).on("click", ".shadowbtn", function() {
                $(this).parents(".text_list_inner").find(".txt_wrap").fadeIn(); //.fadeToggle();
                $(this).parents(".text_list_inner").find(".txt_wrap").css({
                    'opacity': 1,
                    'visibility': 'visible',
                    'z-index': 99999999999,
                    'display': 'block',
                });
                $('#inner_form').css('pointer-events', 'auto');
            });

            $('.shaddowbtn1').on('click', function() {
                $('#inner_form').css('pointer-events', 'auto');
                $(this).parents('.text_list_inner').find('#showbox').addClass('d-block')
                    .removeClass(
                        'd-none');
                if ($(window).width() <= 767) {
                    if ($('#list_btns').hasClass('d-none') == true) {
                        $(this).parents('#list_btns').removeClass('d-none');
                        $(this).parents('.text_list_inner').find('#showbox').addClass('d-none')
                            .removeClass(
                                'd-block');
                        $(this).parents(".text_list_inner").find("#showbox").css({
                            'opacity': 0,
                            'visibility': 'hidden',
                            'z-index': 99999999999,
                            'display': 'none',
                        });
                    } else {
                        $(this).parents('#list_btns').addClass('d-none');
                        $(this).parents('.text_list_inner').find('#showbox').addClass('d-block')
                            .removeClass(
                                'd-none');
                        $(this).parents(".text_list_inner").find("#showbox").css({
                            'opacity': 1,
                            'visibility': 'visible',
                            'z-index': 99999999999,
                            'display': 'block',
                        });
                    }
                    $('#inner_form').css('pointer-events', 'auto');
                }
            });
            $(document).on('click', '.back_button', function() {
                $('#list_btns').removeClass('d-none');

                $('#showbox').addClass('d-none').removeClass('d-block');
                $("#showbox").css({
                    'opacity': 0,
                    'visibility': 'hidden',
                    'z-index': 99999999999,
                    'display': 'none',
                });

                var check__btn = $('#check_btn');
                ser_btn = check__btn.val();
               
                if (ser_btn === addtocartType) {
                    $('.shadow_btn:containsExact('+addtocartType+')').click();
                    check__btn.val('')
                }
            });
            @if (session('error'))
                // Display Toastr notification
                toastr.error("{{ session('error') }}");
            @endif
            @if (session('success'))
                // Display Toastr notification
                toastr.success("{{ session('success') }}");
            @endif
        });


        function caseCat(i, subtype = '') {
            if (i == 'Hydrafacial') {
                $("#top_1").show();
                $("#top_1 p").html(
                    '<span class="my-auto">60 Minutes &pound;60</span> <img src="{{ asset('template_new/assets/images/cart-round.png') }}" alt="" class="cart_icon"/>'
                ).attr('data-time', '60').attr('data-price', '60').attr(
                    'data-service', 'Hydrafacial').attr('data-subtype', subtype);
                $("#top_2,#top_3").hide();
                $("#description").text(
                    'Hydrafacial is a non-invasive skin resurfacing treatment. It combines cleansing, exfoliation, extraction, hydration and antioxidant protection that removes dead skin cells and impurities, while simultaneously delivering moisturizing serums into the skin. Will give the skin maximum hydration and  an incredible youth looking face'
                );
            }

            if (i == 'Classic_facial') {
                $("#top_1,#top_2").show();
                $("#top_3").hide();
                $("#top_1 p").html(
                    '<span class="my-auto">60 Minutes &pound;54</span> <img src="{{ asset('template_new/assets/images/cart-round.png') }}" alt="" class="cart_icon"/>'
                ).attr('data-time', '60').attr('data-price', '54').attr(
                    'data-service', 'Classic Facial').attr('data-subtype', subtype);
                $("#top_2 p").html(
                    '<span class="my-auto">45 Minutes &pound;40</span> <img src="{{ asset('template_new/assets/images/cart-round.png') }}" alt="" class="cart_icon"/>'
                ).attr('data-time', '45').attr('data-price', '40').attr(
                    'data-service', 'Classic Facial').attr('data-subtype', subtype);
                $("#description").text(
                    'A classic or standard facial usually involves cleansing, exfoliating, extractions, a mask, and a moisturizer. Given its calming nature, this facial can be a great choice for anyone with normal to dry skin'
                );
            }

            if (i == 'Linphatic_Facial') {
                $("#top_1,#top_2").show();
                $("#top_3").hide();
                $("#top_1 p").html(
                    '<span class="my-auto">60 Minutes &pound;54</span> <img src="{{ asset('template_new/assets/images/cart-round.png') }}" alt="" class="cart_icon"/>'
                ).attr('data-time', '60').attr('data-price', '54').attr(
                    'data-service', 'Linphatic Facial').attr('data-subtype', subtype);
                $("#top_2 p").html(
                    '<span class="my-auto">45 Minutes &pound;40</span> <img src="{{ asset('template_new/assets/images/cart-round.png') }}" alt="" class="cart_icon"/>'
                ).attr('data-time', '45').attr('data-price', '40').attr(
                    'data-service', 'Linphatic Facial').attr('data-subtype', subtype);
                $("#description").text(
                    'A lymphatic drainage massage is a part of other types of  {classic facials }, it drains a build-up of lymphatic fluid within your face. The gentle, light massage treatment enhances circulation in your face by delivering oxygen around the skin and pushing waste and toxins out of the lymph nodes'
                );
            }

            if (i == 'Antioxidant_facial') {
                $("#top_1,#top_2").show();
                $("#top_1 p").html(
                    '<span class="my-auto">60 Minutes &pound;50</span> <img src="{{ asset('template_new/assets/images/cart-round.png') }}" alt="" class="cart_icon"/>'
                ).attr('data-time', '60').attr('data-price', '50').attr(
                    'data-service', 'Antioxidant Facial').attr('data-subtype', subtype);
                $("#top_2 p").html(
                    '<span class="my-auto">45 Minutes &pound;40</span> <img src="{{ asset('template_new/assets/images/cart-round.png') }}" alt="" class="cart_icon"/>'
                ).attr('data-time', '45').attr('data-price', '40').attr(
                    'data-service', 'Antioxidant Facial').attr('data-subtype', subtype);
                $("#top_3").hide();
                $("#description").text(
                    "Rich in vitamins A, C, and E, its a wonderful treatment for more mature skin. Plus, it also features creams and masks that are rich in beta carotene, giving you soft and smooth skin. An Antioxidant Facial can even your skin tone, clear the pores, and eliminate the impurities. It can also make your skin radiantly glowing and youthful-looking."
                );
            }

            if (i == 'Acupuncture_facial') {
                $("#top_1,top_2").show();
                $("#top_3").hide();
                $("#top_1 p").html(
                    '<span class="my-auto">60 Minutes &pound;100</span> <img src="{{ asset('template_new/assets/images/cart-round.png') }}" alt="" class="cart_icon"/>'
                ).attr('data-time', '60').attr('data-price', '100').attr(
                    'data-service', 'Acupuncture facial').attr('data-subtype', subtype);
                $("#top_2 p").html(
                    '<span class="my-auto">45 Minutes &pound;150</span> <img src="{{ asset('template_new/assets/images/cart-round.png') }}" alt="" class="cart_icon"/>'
                ).attr('data-time', '45').attr('data-price', '150').attr(
                    'data-service', 'Acupuncture facial').attr('data-subtype', subtype);
                $("#description").text(
                    "This treatment focuses specifically on the face, neck, and hairline your aesthetician will place several needles on those areas. This helps to increase blood flow and stimulate collagen production which helps with skin elasticity.Other benefits of Acupuncture Facial include firming up the skin and reducing the appearance of wrinkles and fine lines, ugly acne scars, and blemishes"
                );
            }


            if (i == 'Acne_Reduction_Facial') {
                $("#top_1").show();
                $("#top_1 p").html(
                    '<span class="my-auto">60 Minutes &pound;70</span> <img src="{{ asset('template_new/assets/images/cart-round.png') }}" alt="" class="cart_icon"/>'
                ).attr('data-time', '60').attr('data-price', '70').attr(
                    'data-service', 'Acne Reduction Facial').attr('data-subtype', subtype);
                $("#top_2 p").html(
                    '<span class="my-auto">45 Minutes &pound;56</span> <img src="{{ asset('template_new/assets/images/cart-round.png') }}" alt="" class="cart_icon"/>'
                ).attr('data-time', '45').attr('data-price', '56').attr(
                    'data-service', 'Acne Reduction Facial').attr('data-subtype', subtype);
                $("#top_3").hide();
                $("#description").text(
                    'Acne facials reduce acne symptoms by cleansing the skin, removing impurities, debris, and oil. unclogging pores using exfoliation, which is the removal of dead skin cells. reducing oil production and inflammation of the skin. reducing irritation.'
                );
            }
            var check__btn = $('#check_btn');
            check__btn.val('Facial');
        }
    </script>
@endpush
