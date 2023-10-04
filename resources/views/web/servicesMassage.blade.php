@extends('layouts.master.template_new.master')

@push('css')
    <style>
        #services .text_list .btns .shadow_btn {
            text-align: left;
        }

        #services .text_list .txt_wrap form .input_box {
            height: 3rem;
        }
    </style>
@endpush

@section('content')
    <section id="services">
        <div class="contain" data-aos="fade-up" data-aos-duration="1000">
            <div class="outer">
                <div class="image_blk">
                    <div class="image"><img src="{{ asset('template_new/assets/images/service_bg_06.jpg') }}" alt="">
                    </div>
                    <div class="image"><img src="{{ asset('template_new/assets/images/service_bg_07.jpg') }}"
                            alt=""></div>
                </div>
                <div class="content_blk"
                    style="background-image: url('{{ asset('template_new/assets/images/service_main.jpg') }}');">
                    <h2>You book We deliver</h2>
                    <div class="inner">
                        <div class="btn_list">

                            <a href="javascript:;" class="shadow_btn" data-id="massage">Massage</a>

                        </div>
                        <div class="text_list" data-id="massage">
                            <div class="text_list_inner">
                                <ul class="btns scrollbar">
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Swedish_Massag')">Swedish Massage <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Hot_Stone_Massage')">Hot Stone Massage <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Deep_Tissue_Massage')">Deep Tissue Massage <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Aromatherapy_Massage')">Aromatherapy Massage <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Shiatsu_Massage')">Shiatsu Massage <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Thai_Massage')">Thai Massage <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Lymphatic_Massagel')">Lymphatic Massage <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Reflexology')">Reflexology <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>

                                </ul>
                                <div class="txt_wrap scrollbar" id="showbox">
                                    <form action="" method="post">
                                        <div class="form_inner">
                                            <div class="row">

                                                <div class="col-10">
                                                    <div class="row">
                                                        <div id="top_1" class="col-md-4 mb-4">
                                                            <div class="input_box_wrap">
                                                                <!-- 															<input type="text" class="input_box" value=""> -->
                                                                <p class="input_box add_to_cart" data-time=""
                                                                    data-price="" data-type="" data-subtype=""
                                                                    data-service=""></p>
                                                            </div>
                                                        </div>
                                                        <div id="top_2" class="col-md-4 mb-4">
                                                            <div class="input_box_wrap">
                                                                <!-- 															<input type="text" class="input_box" value=""> -->
                                                                <p class="input_box add_to_cart" data-time=""
                                                                    data-price="" data-type="" data-subtype=""
                                                                    data-service=""></p>
                                                            </div>
                                                        </div>
                                                        <div id="top_3" class="col-md-4 mb-4">
                                                            <div class="input_box_wrap">
                                                                <!-- 															<input type="text" class="input_box" value=""> -->
                                                                <p class="input_box add_to_cart" data-time=""
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
	    	<div class="modal-dialog modal-md" style="width: 350px">
	        	<div class="modal-content border border-warning"
	            	style="background-color: black; color: white; max-height: 1000px; overflow-y: auto; margin-top: 30%; margin-left: 10%;">
	            	<div class="modal-header" style="border-bottom: 5px solid #766d48">
	                	<h4 class="modal-title fs-1">Alert</h4>
	                    <i class="close-modal" style="font-size: 2rem; cursor: pointer"><b>&times;</b></i>
	              	</div>
	             	<div class="modal-body my-5">
	                	<p class="fs-2">To continue book freelancer first buy package.</p>
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
                $(this).parents(".text_list_inner").find(".txt_wrap").fadeIn();
            });
            $(document).on("click", ".shadowbtn", function() {
                $(this).parents(".text_list_inner").find(".txt_wrap").fadeIn();
            });

        });
        var addtocartType = 'Message';

        function caseCat(i, subtype = '') {
            if (i == 'Swedish_Massag') {
                $("#top_1").show();
                $("#top_1 p").html('60 MINS &pound; 55').attr('data-time', '60').attr('data-price', '55').attr(
                    'data-service', 'Swedish Massage').attr('data-subtype', subtype);
                $("#top_2 p").html('90 MINS &pound; 80').attr('data-time', '90').attr('data-price', '80').attr(
                    'data-service', 'Swedish Massage').attr('data-subtype', subtype);
                $("#top_3").hide();
                $("#description").text(
                    "Swedish techniques are extremely valuable when a massage therapist is gauging tissue mobility and tenderness. It's actually easier for your massage therapist to feel the tension in your muscles when applying lighter pressure. Don't let that fool you, though, as deep pressure can absolutely be applied during a Swedish massage. You might be surprised how powerful a Swedish massage can be!"
                );
            }


            if (i == 'Hot_Stone_Massage') {
                $("#top_1,#top_2,#top_3").show();
                $("#top_1 p").html('60 MINS &pound; 55').attr('data-time', '60').attr('data-price', '55').attr(
                    'data-service', 'Hot Stone Massage').attr('data-subtype', subtype);
                $("#top_2 p").html('90 MINS &pound; 72').attr('data-time', '90').attr('data-price', '72').attr(
                    'data-service', 'Hot Stone Massage').attr('data-subtype', subtype);
                $("#top_3 p").html('90 MINS &pound; 96').attr('data-time', '90').attr('data-price', '96').attr(
                    'data-service', 'Hot Stone Massage').attr('data-subtype', subtype);
                $("#description").text(
                    "Hot stone therapy is effective for muscle tension relief, improving blood circulation, and relieving stress. The procedure of hot stone massage provides a deeper feeling of relaxation and well-being than other techniques, and it all has to do with the temperature. The application of higher-temperature stones produces deep-down blood circulation that gives the following benefits"
                );
            }


            if (i == 'Deep_Tissue_Massage') {
                $("#top_1").show();
                $("#top_1 p").html('60 MINS &pound; 55').attr('data-time', '60').attr('data-price', '55').attr(
                    'data-service', 'Deep Tissue Massage').attr('data-subtype', subtype);
                $("#top_2 p").html('90 MINS &pound; 72').attr('data-time', '90').attr('data-price', '72').attr(
                    'data-service', 'Deep Tissue Massage').attr('data-subtype', subtype);
                $("#top_3 p").html('90 MINS &pound; 104').attr('data-time', '90').attr('data-price', '104').attr(
                    'data-service', 'Deep Tissue Massage').attr('data-subtype', subtype);
                $("#description").text(
                    "Deep tissue massage is a technique that uses slow and deep strokes and sustained pressure to target the deeper layers of your muscles and the connective tissues around them. A deep tissue massage is a great choice for anyone who engages in physical activities or those who have an injury or chronic pain"
                );
            }


            if (i == 'Aromatherapy_Massage') {
                $("#top_1").show();
                $("#top_1 p").html('60 MINS &pound; 64').attr('data-time', '60').attr('data-price', '64').attr(
                    'data-service', 'Aromatherapy Massage').attr('data-subtype', subtype);
                $("#top_2 p").html('90 MINS &pound; 80').attr('data-time', '90').attr('data-price', '80').attr(
                    'data-service', 'Aromatherapy Massage').attr('data-subtype', subtype);
                $("#top_3 p").html('90 MINS &pound; 104').attr('data-time', '90').attr('data-price', '104').attr(
                    'data-service', 'Aromatherapy Massage').attr('data-subtype', subtype);
                $("#description").text(
                    "An aromatherapy massage is used for a variety of different reasons, including relaxation, pain management, and improved mood. These are also some of the basic benefits of massage therapy. Adding essential oils is thought to enhance such benefits"
                );
            }


            if (i == 'Shiatsu_Massage') {
                $("#top_1").show();
                $("#top_1 p").html('60 MINS &pound; 55').attr('data-time', '60').attr('data-price', '55').attr(
                    'data-service', 'Shiatsu Massage').attr('data-subtype', subtype);
                $("#top_2 p").html('90 MINS &pound; 80').attr('data-time', '90').attr('data-price', '80').attr(
                    'data-service', 'Shiatsu Massage').attr('data-subtype', subtype);
                $("#top_3 p").html('90 MINS &pound; 120').attr('data-time', '90').attr('data-price', '120').attr(
                    'data-service', 'Shiatsu Massage').attr('data-subtype', subtype);
                $("#description").text(
                    "Shiatsu is a non-invasive therapy originating from Japan. It uses a combination of kneading, pressing, tapping and stretching techniques. These gentle techniques aim to reduce tension and re-energise the body. A shiatsu therapist applies pressure on the body's meridians, parts of the body believed to be energy channels, to balance or unblock the flow of energy, known as Ki or Qi"
                );
            }



            if (i == 'Thai_Massage') {
                $("#top_1").show();
                $("#top_1 p").html('60 MINS &pound; 55').attr('data-time', '60').attr('data-price', '55').attr(
                    'data-service', 'Thai Massage').attr('data-subtype', subtype);
                $("#top_2 p").html('90 MINS &pound; 80').attr('data-time', '90').attr('data-price', '80').attr(
                    'data-service', 'Thai Massage').attr('data-subtype', subtype);
                $("#top_3 p").html('90 MINS &pound; 104').attr('data-time', '90').attr('data-price', '104').attr(
                    'data-service', 'Thai Massage').attr('data-subtype', subtype);
                $("#description").text(
                    "The practice of Thai yoga massage is said to be thousands of years old, but it is still part of Thailand's medical system due to its perceived healing properties on both emotional and physical levels. Traditional Thai massage uses no oils or lotions. The client remains clothed during a treatment. A full Thai massage session may last two hours and includes rhythmic pressing and stretching of the entire body. This may include pulling fingers, toes, ears, cracking knuckles,"
                );
            }



            if (i == 'Lymphatic_Massagel') {
                $("#top_1").show();
                $("#top_1 p").html('60 MINS &pound; 55').attr('data-time', '60').attr('data-price', '55').attr(
                    'data-service', 'Lymphatic Massage').attr('data-subtype', subtype);
                $("#top_2 p").html('90 MINS &pound; 80').attr('data-time', '90').attr('data-price', '80').attr(
                    'data-service', 'Lymphatic Massage').attr('data-subtype', subtype);
                $("#top_3 p").html('90 MINS &pound; 120').attr('data-time', '90').attr('data-price', '120').attr(
                    'data-service', 'Lymphatic Massage').attr('data-subtype', subtype);
                $("#description").text(
                    "Lymph drainage massage has become a popular form of massage due to its potential health benefits. This specialized approach focuses on the lymphatic system which is part of the immune system. This type of massage aims to help the body maintain proper blood circulation, body fluid balance, and immune function the largest nodes are in the neck, groin, and armpits. They all work together to make sure clean lymph is transported back to the veins that carry blood toward the heart."
                );
            }


            if (i == 'Reflexology') {
                $("#top_1").show();
                $("#top_1 p").html('60 MINS &pound; 55').attr('data-time', '60').attr('data-price', '55').attr(
                    'data-service', 'Reflexology').attr('data-subtype', subtype);
                $("#top_2 p").html('90 MINS &pound; 72').attr('data-time', '90').attr('data-price', '72').attr(
                    'data-service', 'Reflexology').attr('data-subtype', subtype);
                $("#top_3 p").html('90 MINS &pound; 88').attr('data-time', '90').attr('data-price', '88').attr(
                    'data-service', 'Reflexology').attr('data-subtype', subtype);
                $("#description").text(
                    "Reflexology, also known as zone therapy, is an alternative medical practice involving the application of pressure to specific points on the feet, ears, and/or hands. This is done using thumb, finger, and hand massage techniques without the use of oil or lotion. It is based on a system of zones and reflex areas that reflect an area of the body on the feet and hands, with the premise that such work on the feet and hands causes a physical change to the supposedly related areas of the body."
                );
            }
        }
    </script>
@endpush
