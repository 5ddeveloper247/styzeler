@extends('layouts.master.template_new.master')

@push('css')
    <style>
        #services .text_list .btns>li>.shadow_btn::after {
            border-color: #00c2cb;
        }

        #services .text_list .txt_wrap form .input_box {
            height: 3rem;
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
    </style>
@endpush

@section('content')
    <section id="services">
        <div class="contain" data-aos="fade-up" data-aos-duration="1000">
            <div class="outer">
                <div class="image_blk">
                    <div class="image"><img src="{{ asset('template_new/assets/images1/bodywax1.1.webp') }}" alt="">
                    </div>
                    <div class="image"><img src="{{ asset('template_new/assets/images1/bodywax1.2.webp') }}" alt="">
                    </div>
                </div>
                <div class="content_blk"
                    style="background-image: url('{{ asset('template_new/assets/images/service_main.jpg') }}');">
                    <h2>You book We deliver</h2>
                    <div class="inner">
                        <div class="btn_list">
                            <a href="javascript:;" class="shadow_btn" data-id="body_waxing">Body Waxing</a>
                            <a href="{{ route('servicesEyebrows') }}" class="shadow_btn" data-id="eye_brows">Eyes &
                                Brows</a> <!-- services-beauty2.html -->
                            <a href="{{ route('servicesManiPedi') }}" class="shadow_btn" data-id="mani_pedi">Mani / Pedi</a>
                            <a href="{{ route('servicesFacial') }}" class="shadow_btn" data-id="facial">Facial</a>
                        </div>
                        <div class="text_list" data-id="body_waxing" style="display:block;">
                            <div class="text_list_inner">
                                <ul class="btns scrollbar">
                                    <li>
                                        <button type="button" class="shadow_btn">Female wax</button>
                                        <ul class="sub_btns">
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('upperLip','Female wax')">Uper Lip <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('FullLip','Female wax')">Full Lip <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Chin','Female wax')">Chin <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Neck','Female wax')">Neck <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Eye_brows','Female wax')">Eye Brows <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Full_Arms','Female wax')">Full Arms <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Half_Arms','Female wax')">Half Arms <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Under_Arms','Female wax')">Underarms <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Full_Legs','Female wax')">Full Legs <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Lower_Legs','Female wax')">Lower Legs <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Upper_Legs','Female wax')">Upper Legs <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Bikini','Female wax')">Bikini <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('French_Bikini','Female wax')">French Bikini <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Brazilian_Bikini','Female wax')">Brazilian Bikini
                                                    <img src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Hollywood','Female wax')">Hollywood <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn">Male wax</button>
                                        <ul class="sub_btns">
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Full_Back','Male wax')">Full Back <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Full_legs','Male wax')">Full legs <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Full_arms','Male wax')">Full arms <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Shoulders','Male wax')">Shoulders <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Chest_abbs','Male wax')">Chest + abbs <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Speedo_Line','Male wax')">Speedo Line <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Manzilian','Male wax')">Manzilian <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="txt_wrap scrollbar">
                                    <form>
                                        <div class="form_inner">
                                            <div class="row">

                                                <div class="col-10">
                                                    <div class="row">
                                                        <div id="top_1" class="col-md-4 mb-4">
                                                            <div class="input_box_wrap">
                                                                <p class="input_box add_to_cart" data-time=""
                                                                    data-price="" data-type="" data-subtype=""
                                                                    data-service="" title="Click to add in cart"></p>
                                                            </div>
                                                        </div>
                                                        <div id="top_2" class="col-md-4 mb-4">
                                                            <div class="input_box_wrap">
                                                                <p class="input_box add_to_cart" data-time=""
                                                                    data-price="" data-type="" data-subtype=""
                                                                    data-service="" title="Click to add in cart"></p>
                                                            </div>
                                                        </div>
                                                        <div id="top_3" class="col-md-4 mb-4">
                                                            <div class="input_box_wrap">
                                                                <p class="input_box add_to_cart" data-time=""
                                                                    data-price="" data-type="" data-subtype=""
                                                                    data-service="" title="Click to add in cart"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div>
                                                <p id="category_description">Lorem Ipsum is simply dummy text of the
                                                    printing and typesetting industry. Lorem Ipsum has been the industry's
                                                    standard dummy text ever since the 1500s, when an unknown printer took a
                                                    galley of type and scrambled it to make a type specimen book. It has
                                                    survived not only five centuries, but also the leap into electronic
                                                    typesetting, remaining essentially unchanged. It was popularised in the
                                                    1960s with the release of Letraset sheets containing Lorem Ipsum
                                                    passages, and more recently with desktop publishing software like Aldus
                                                    PageMaker including versions of Lorem Ipsum.</p>
                                            </div>
                                        </div>
                                        <div class="right-arrow">
                                            <img src="{{ asset('template_new/assets/images/arrow-234.svg') }}">
                                        </div>
                                        <div class="btn_block">
                                            @if(@$tokens>0)
												<a href="{{ route('bookFreelancer') }}" class="book_freelance_btn">
													<img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""> Book a Freelancer
												</a>
											@else
												<a href="javascript:;" class="book_freelance_btn error-booking">
													<img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""> Book a Freelancer
												</a>
											@endif
                                            <ul class="check_list">
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
                                        <input type="hidden" id="userId" name="userId" value="{{ @Auth::user()->id }}">
                                        <input type="hidden" id="userType" name="userType" value="{{ @Auth::user()->type }}">
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
	        <div class="modal-dialog modal-md ">
	            <div class="modal-content border border-warning"
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
            <div class="modal-dialog modal-md ">
                <div class="modal-content border border-warning"
                    style="background-color: black; color: white; max-height: 400px; overflow-y: auto;">
                    <div class="modal-header" style="border-bottom: 5px solid #766d48;">
                        <h4 class="modal-title">Confirmation</h4>
                        <i class="close-modal closeCartConfirm" style="font-size: 2rem;cursor:pointer;"><b>&times;</b></i>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to add this service in cart?
                    </div>
                    <div class="modal-footer text-center">
                        <a type="" href="javascript:;" class="btn1 customBtn" onclick="addToCartConfirm();">Yes</a>
                        <a type="button" class="btn1 customBtn closeCartConfirm" data-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('script')
    <script src="{{ asset('customjs/web/cart/addtocart.js') }}?v={{time()}}"></script>
    <script>
        $(window).on("load", function() {
            $(document).on("click", ".btn_list .shadow_btn", function() {
                let id = $(this).data("id");
                $(".text_list[data-id = " + id + "]").slideToggle();
            });
            $(document).on("click", ".btns > li > button", function() {
                $(this).parent().find(".sub_btns").slideToggle();
            });
            $(document).on("click", ".sub_btns > li > button", function() {
                $(this).parents(".text_list_inner").find(".txt_wrap").fadeIn(); //.fadeToggle();
            });
        });
        var addtocartType = 'Body Waxing';

        function caseCat(i, subtype = '') {

            if (i == 'upperLip') {
                $("#top_1").show();
                $("#top_1 p").html('10 Mints &pound; 8').attr('data-time', '10').attr('data-price', '8').attr(
                    'data-subtype', subtype).attr('data-service', 'Uper Lip');
                $("#top_2,#top_3").hide();
                $("#category_description").text(
                    'Upper lip waxing is a very quick facial hair removal treatment and the result can last for up to a month.'
                    );
            }

            if (i == 'FullLip') {
                $("#top_1").show();
                $("#top_1 p").html('10 Mints &pound; 8').attr('data-time', '10').attr('data-price', '8').attr(
                    'data-subtype', subtype).attr('data-service', 'Full Lip');
                $("#top_2,#top_3").hide();
                $("#category_description").text("Hair is removed above the upper lip and sides of the mouth.");
            }

            if (i == 'Chin') {
                $("#top_1").show();
                $("#top_1 p").html('10 Mints &pound; 8').attr('data-time', '10').attr('data-price', '8').attr(
                    'data-subtype', subtype).attr('data-service', 'Chin');
                $("#top_2,#top_3").hide();
                $("#category_description").text(
                    'Chin waxing removes all of the hair. You are guaranteed to receive long-lasting smooth skin');
            }


            if (i == 'Neck') {
                $("#top_1").show();
                $("#top_1 p").html('10 Mints &pound; 10').attr('data-time', '10').attr('data-price', '10').attr(
                    'data-subtype', subtype).attr('data-service', 'Neck');
                $("#top_2,#top_3").hide();
                $("#category_description").text(
                    'If you become a regular waxer, you will notice that your hair will become quite sparse and not as coarse. When hair is shaved, it is cut off at the thick part of the hair, which is why you can feel stubble the next day.'
                    );
            }


            if (i == 'Eye_brows') {
                $("#top_1").show();
                $("#top_1 p").html('10 Minuts &pound; 10').attr('data-time', '10').attr('data-price', '10').attr(
                    'data-subtype', subtype).attr('data-service', 'Eye Brows');
                $("#top_2,#top_3").hide();
                $("#category_description").text(
                    'Eyebrow waxing is a method of removing unwanted hair, either as a cold or hot wax.');
            }

            if (i == 'Full_Arms') {
                $("#top_1").show();
                $("#top_1 p").html('30 Minuts &pound; 18').attr('data-time', '30').attr('data-price', '18').attr(
                    'data-subtype', subtype).attr('data-service', 'Full Arms');
                $("#top_2,#top_3").hide();
                $("#category_description").text(
                    'A full arm wax will include everything from your shoulder downwards, including hands and fingers if required. Underarm wax. For those who hate shaving, the underarm wax gets rid of all the hair in your armpits'
                    );
            }

            if (i == 'Half_Arms') {
                $("#top_1").show();
                $("#top_1 p").html('30 Minuts &pound; 12').attr('data-time', '30').attr('data-price', '12').attr(
                    'data-subtype', subtype).attr('data-service', 'Half Arms');
                $("#top_2,#top_3").hide();
                $("#category_description").text(
                    'This wax includes everything from the elbow down. This normally includes the hands and fingers too.'
                    );
            }


            if (i == 'Under_Arms') {
                $("#top_1").show();
                $("#top_1 p").html('10 Minuts &pound; 12').attr('data-time', '10').attr('data-price', '12').attr(
                    'data-subtype', subtype).attr('data-service', 'Under Arms');
                $("#top_2,#top_3").hide();
                $("#category_description").text(
                    'Waxing will totally remove your underarm hair,As a result, the armpit area feels and looks smoother and lighter � no more worries about that not-so-sexy underarm shadow'
                    );
            }

            if (i == 'Full_Legs') {
                $("#top_1").show();
                $("#top_1 p").html('45 Minuts &pound; 40').attr('data-time', '45').attr('data-price', '40').attr(
                    'data-subtype', subtype).attr('data-service', 'Full Legs');
                $("#top_2,#top_3").hide();
                $("#category_description").text(
                    'This wax includes everything from the tops of the thighs down to your toes!');
            }


            if (i == 'Lower_Legs') {
                $("#top_1").show();
                $("#top_1 p").html('30 Minuts &pound; 24').attr('data-time', '30').attr('data-price', '24').attr(
                    'data-subtype', subtype).attr('data-service', 'Lower Legs');
                $("#top_2,#top_3").hide();
                $("#category_description").text('Lower leg waxing is everything from just above the knee downwards.');
            }

            if (i == 'Upper_Legs') {
                $("#top_1").show();
                $("#top_1 p").html('30 Minuts &pound; 24').attr('data-time', '30').attr('data-price', '24').attr(
                    'data-subtype', subtype).attr('data-service', 'Upper Legs');
                $("#top_2,#top_3").hide();
                $("#category_description").text(
                    'Upper leg wax typically eliminates hair from the thighs to above the knees (front and back');
            }

            if (i == 'Bikini') {
                $("#top_1").show();
                $("#top_1 p").html('30 Minuts &pound; 16').attr('data-time', '30').attr('data-price', '16').attr(
                    'data-subtype', subtype).attr('data-service', 'Bikini');
                $("#top_2,#top_3").hide();
                $("#category_description").text(
                    "A bikini wax is mainly for beginners and won't take off much hair. This kind of waxing is ideal for quick clean-ups and does not require you to remove your panties. So for those who aren't comfortable being naked around a stranger, a bikini wax is the one for you!"
                    );
            }

            if (i == 'French_Bikini') {
                $("#top_1").show();
                $("#top_1 p").html('30 Minuts &pound; 24').attr('data-time', '30').attr('data-price', '24').attr(
                    'data-subtype', subtype).attr('data-service', 'French Bikini');
                $("#top_2,#top_3").hide();
                $("#category_description").text(
                    "This waxing method removes hair from your labia and pubic bone, leaving a small rectangular strip (also known as a 'landing strip') on the front of your pubic area. This type of wax is similar to a Brazilian, but hair from the buttocks area isn't removed."
                    );
            }

            if (i == 'Brazilian_Bikini') {
                $("#top_1").show();
                $("#top_1 p").html('30 Minuts &pound; 32').attr('data-time', '30').attr('data-price', '32').attr(
                    'data-subtype', subtype).attr('data-service', 'Brazilian Bikini');
                $("#top_2,#top_3").hide();
                $("#category_description").text(
                    "A Brazilian is sometimes nicknamed 'the landing strip'! It removes all of the pubic hair but leaves a small neat strip at the front. This waxing involves removing the pubic hair between the legs and through into the buttocks area."
                    );
            }

            if (i == 'Hollywood') {
                $("#top_1").show();
                $("#top_1 p").html('45 Minuts &pound; 40').attr('data-time', '45').attr('data-price', '40').attr(
                    'data-subtype', subtype).attr('data-service', 'Hollywood');
                $("#top_2,#top_3").hide();
                $("#category_description").text(
                    "A Hollywood wax is where all pubic hair is removed from the whole intimate area, including the labia, perineum and anus, leaving you entirely bare."
                    );
            }

            if (i == 'Full_Back') {
                $("#top_1").show();
                $("#top_1 p").html('60 Minuts &pound; 50').attr('data-time', '60').attr('data-price', '50').attr(
                    'data-subtype', subtype).attr('data-service', 'Full Back');
                $("#top_2,#top_3").hide();
                $("#category_description").text(
                    "Full Back waxing includes the whole back, shoulders, and the base of the neck,");
            }


            if (i == 'Full_legs') {
                $("#top_1").show();
                $("#top_1 p").html('60 Minuts &pound; 50').attr('data-time', '60').attr('data-price', '50').attr(
                    'data-subtype', subtype).attr('data-service', 'Full legs');
                $("#top_2,#top_3").hide();
                $("#category_description").text(
                    "This wax includes everything from the tops of the thighs down to your toes!");
            }


            if (i == 'Full_arms') {
                $("#top_1").show();
                $("#top_1 p").html('45 Minuts &pound; 40').attr('data-time', '45').attr('data-price', '40').attr(
                    'data-subtype', subtype).attr('data-service', 'Full arms');
                $("#top_2,#top_3").hide();
                $("#category_description").text(
                    "A full Arm wax will include everything from your shoulder downwards, including hands and fingers if required"
                    );
            }

            if (i == 'Shoulders') {
                $("#top_1").show();
                $("#top_1 p").html('45 Minuts &pound; 15').attr('data-time', '45').attr('data-price', '15').attr(
                    'data-subtype', subtype).attr('data-service', 'Shoulders');
                $("#top_2,#top_3").hide();
                $("#category_description").text("Shoulders wax. Does what it says on the tin");
            }

            if (i == 'Chest_abbs') {
                $("#top_1").show();
                $("#top_1 p").html('60 Minuts &pound; 50').attr('data-time', '60').attr('data-price', '50').attr(
                    'data-subtype', subtype).attr('data-service', 'Chest + abbs');
                $("#top_2,#top_3").hide();
                $("#category_description").text(
                    "The chest and Abs are the ideal way to completely change the appearance of your upper body enhancing the mussels and Abs definition"
                    );
            }

            if (i == 'Speedo_Line') {
                $("#top_1").show();
                $("#top_1 p").html('30 Minuts &pound; 25').attr('data-time', '30').attr('data-price', '25').attr(
                    'data-subtype', subtype).attr('data-service', 'Speedo Line');
                $("#top_2,#top_3").hide();
                $("#category_description").text(
                    "This treatment follows the line of the pants and removes hair from the top of the pubic bone and the high sides of your legs so everything appears neatly trimmed."
                    );
            }
            if (i == 'Manzilian') {
                $("#top_1").show();
                $("#top_1 p").html('45 Minuts &pound; 50').attr('data-time', '45').attr('data-price', '50').attr(
                    'data-subtype', subtype).attr('data-service', 'Manzilian');
                $("#top_2,#top_3").hide();
                $("#category_description").text(
                    "A Manzilian involves complete hair removal surrounding the upper thighs, pubic mound, genitalia, and butt crack."
                    );
            }

        }
    </script>
@endpush
