@extends('layouts.master.template_new.master')
<script>
    localStorage.setItem('currentUrl', window.location.href);
</script>
@push('css')
    <style>
        #services .text_list .btns .shadow_btn {
            text-align: left;
        }

        #services .text_list .txt_wrap form .input_box {
            height: 4rem;
            gap: 7px !important;
        }

        .shadow_btn {
            padding: 0 2rem;
        }

        .input_box {
            cursor: pointer;
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
                    <div class="image"><img src="{{ asset('template_new/assets/images/service_bg_08.jpg') }}" alt="">
                    </div>
                    <div class="image"><img src="{{ asset('template_new/assets/images/service_bg_09.jpg') }}"
                            alt=""></div>
                </div>
                <div class="content_blk"
                    style="background-image: url('{{ asset('template_new/assets/images/service_main.jpg') }}');">
                    <h2>You book We deliver</h2>
                    <div class="inner">
                        <div class="btn_list">

                            <a href="{{ route('servicesLadies') }}" class="shadow_btn special-button" data-id="ladies-services">Ladies
                                Services</a>
                            <a href="javascript:;" class="shadow_btn" data-id="makeup">Make-up</a>
                            <a href="{{ route('servicesGents') }}" class="shadow_btn special-button" data-id="gents-services">Gents
                                Services</a>

                        </div>
                        <div class="text_list" data-id="makeup" style="display: block;">
                            <div class="text_list_inner">
                                <ul class="btns scrollbar shadowbtn" id="list_btns">
                                    <li>
                                        <button type="button" class="shadow_btn shaddowbtn1"
                                            onclick="caseCat('Makeup_Blowdry')">Blow-Dry & Make-Up <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shaddowbtn1"
                                            onclick="caseCat('Make_up_Up_do')">Up-Do & Make-Up <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shaddowbtn1"
                                            onclick="caseCat('Make_up')">Make-Up <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <!-- <li>
                                                                                  <button type="button" class="shadow_btn shaddowbtn1"   onclick="caseCat('Bridal_Make_up')">Bridal Make-up <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>

                                                                                 </li> -->
                                </ul>
                                <div class="txt_wrap scrollbar" id="showbox">
                                    <form action="" method="post" id="inner_form">
                                        <div class="form_inner">
                                            <div class="row">
                                                <div id="top_1" class="col-md-3 outer-width mb-4">
                                                    <div class="input_box_wrap">
                                                        <p class="input_box add_to_cart d-flex" data-time=""
                                                            data-price="" data-type="" data-subtype="" data-service="">
                                                        </p>
                                                    </div>
                                                </div>
                                                <div id="top_2" class="col-md-3 outer-width mb-4">
                                                    <div class="input_box_wrap">
                                                        <p class="input_box add_to_cart d-flex" data-time=""
                                                            data-price="" data-type="" data-subtype="" data-service="">
                                                        </p>
                                                    </div>
                                                </div>
                                                <div id="top_3" class="col-md-3 outer-width mb-4">
                                                    <div class="input_box_wrap">
                                                        <p class="input_box add_to_cart d-flex" data-time=""
                                                            data-price="" data-type="" data-subtype="" data-service="">
                                                        </p>
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
    <script src="https://kit.fontawesome.com/8389fcfe36.js" crossorigin="anonymous"></script>
    <script>
        var addtocartType = 'Make-up';
	    $(document).ready(function() { // for mobile view
			if ($(window).width() < 500) {
	        	$(".text_list").addClass("active");
	       	}
		});
        $(window).on("load", function() {
            $(document).on("click", ".btn_list > .shadow_btn", function() {
                let id = $(this).data("id");
                $(".text_list[data-id = " + id + "]").slideToggle();
            });
            $(document).on("click", ".btns > li > button", function() {
                $(this).parent().find(".sub_btns").slideToggle();
            });
            $(document).on("click", ".sub_btns > li > button", function() {
                $(this).parents(".text_list_inner").find(".txt_wrap").fadeIn(); //.fadeToggle();
            });
            $(document).on("click", ".special-button", function() {
                $(".text_list").removeClass("active");
            });
            // $(document).on("click", ".shadowbtn", function () {
            // 	$(this).parents(".text_list_inner").find(".txt_wrap").fadeIn(); //.fadeToggle();
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
                    $('.shadow_btn:contains('+addtocartType+')').click();
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

        var weddingRoute = "{{ route('wedding') }}";

        function caseCat(i, subtype = '') {

            if (i == 'Makeup_Blowdry') {
                $("#top_1").show();
                $("#top_1 p").html(
                    '<span class="my-auto">90 Minutes  &pound;100</span> <img src="{{ asset('template_new/assets/images/cart-round.png') }}" alt="" class="cart_icon"/>'
                ).attr('data-time', '90').attr('data-price', '100').attr(
                    'data-service', 'Blow-dry & Make-up').attr('data-subtype', subtype);
                $("#top_2,#top_3").hide();
                $("#description").text(
                    'This package combines two of the most requested treatments for a special night out or event. Styzeler Hair & Makeup Freelancers  will provide the Make-up and   a Blow-dry of your choice'
                );
            }


            if (i == 'Make_up_Up_do') {
                $("#top_1").show();
                $("#top_1 p").html(
                    '<span class="my-auto">80 Minutes  &pound;90</span> <img src="{{ asset('template_new/assets/images/cart-round.png') }}" alt="" class="cart_icon"/>'
                ).attr('data-time', '80').attr('data-price', '90').attr(
                    'data-service', 'Up-do & Make-up').attr('data-subtype', subtype);
                $("#top_2,#top_3").hide();
                $("#description").text(
                    'This package combines two of the most requested treatments for a special night out or event. Styzeler Hair & Makeup Freelancers  will provide the Make-up and   Up-do of your choice,'
                );
            }

            if (i == 'Make_up') {
                $("#top_1").show();
                $("#top_1 p").html(
                    '<span class="my-auto">60 Minutes  &pound;50</span> <img src="{{ asset('template_new/assets/images/cart-round.png') }}" alt="" class="cart_icon"/>'
                ).attr('data-time', '60').attr('data-price', '50').attr(
                    'data-service', 'Make-up').attr('data-subtype', subtype);
                $("#top_2,#top_3").hide();
                $("#description").text(
                    'Our Freelancer can create the perfect makeup that is most suitable to your facial features for a night out with friends, or for special events'
                );
            }


            if (i == 'Bridal_Make_up') {
                $("#top_1").show();
                $("#top_2,#top_3").hide();
                $("#top_1 p").html(
                    '<span class="my-auto">service &pound;20</span> <img src="{{ asset('template_new/assets/images/cart-round.png') }}" alt="" class="cart_icon"/>'
                ).attr('data-time', '').attr('data-price', '20').attr(
                    'data-service', 'Bridal Make-Up').attr('data-subtype', subtype);
                $("#description").text('the bridal makeup needs to be linked with the bridal page');
            }
            var check__btn = $('#check_btn');
            check__btn.val(addtocartType);
        }
    </script>
@endpush
