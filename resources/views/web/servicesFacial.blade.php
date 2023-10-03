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

                            <a href="{{ route('servicesBodywaxing') }}" class="shadow_btn" data-id="body_waxing">Body
                                Waxing</a>
                            <a href="{{ route('servicesEyebrows') }}" class="shadow_btn" data-id="eye_brows">Eyes &
                                Brows</a>
                            <a href="{{ route('servicesManiPedi') }}" class="shadow_btn" data-id="mani_pedi">Mani / Pedi</a>
                            <a href="javascript:;" class="shadow_btn" data-id="facial">Facial</a>
                        </div>
                        <div class="text_list" data-id="facial" style="display: block;">
                            <div class="text_list_inner">
                                <ul class="btns scrollbar">
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Classic_facial')">Classic facial <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Hydrafacial')">Hydrafacial <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>

                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Linphatic_Facial')">Linphatic Facial <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Antioxidant_facial')">Antioxidant facial <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Acupuncture_facial')">Acupuncture facial <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Acne_Reduction_Facial')">Acne Reduction Facial <img
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

        function caseCat(i, subtype = '') {
            if (i == 'Hydrafacial') {
                $("#top_1").show();
                $("#top_1 p").html('60 Minuts &pound; 60').attr('data-time', '60').attr('data-price', '60').attr(
                    'data-service', 'Hydrafacial').attr('data-subtype', subtype);
                $("#top_2,#top_3").hide();
                $("#description").text(
                    'Hydrafacial is a non-invasive skin resurfacing treatment. It combines cleansing, exfoliation, extraction, hydration and antioxidant protection that removes dead skin cells and impurities, while simultaneously delivering moisturizing serums into the skin. Will give the skin maximum hydration and  an incredible youth looking face'
                );
            }

            if (i == 'Classic_facial') {
                $("#top_1,#top_2").show();
                $("#top_3").hide();
                $("#top_1 p").html('60 Minuts &pound; 54').attr('data-time', '60').attr('data-price', '54').attr(
                    'data-service', 'Classic Facial').attr('data-subtype', subtype);
                $("#top_2 p").html('45 Minuts &pound; 40').attr('data-time', '45').attr('data-price', '40').attr(
                    'data-service', 'Classic Facial').attr('data-subtype', subtype);
                $("#description").text(
                    'A classic or standard facial usually involves cleansing, exfoliating, extractions, a mask, and a moisturizer. Given its calming nature, this facial can be a great choice for anyone with normal to dry skin'
                );
            }

            if (i == 'Linphatic_Facial') {
                $("#top_1,#top_2").show();
                $("#top_3").hide();
                $("#top_1 p").html('60 Minuts &pound; 54').attr('data-time', '60').attr('data-price', '54').attr(
                    'data-service', 'Linphatic Facial').attr('data-subtype', subtype);
                $("#top_2 p").html('45 Minuts &pound; 40').attr('data-time', '45').attr('data-price', '40').attr(
                    'data-service', 'Linphatic Facial').attr('data-subtype', subtype);
                $("#description").text(
                    'A lymphatic drainage massage is a part of other types of  {classic facials }, it drains a build-up of lymphatic fluid within your face. The gentle, light massage treatment enhances circulation in your face by delivering oxygen around the skin and pushing waste and toxins out of the lymph nodes'
                );
            }

            if (i == 'Antioxidant_facial') {
                $("#top_1,#top_2").show();
                $("#top_1 p").html('60 Minuts &pound; 50').attr('data-time', '60').attr('data-price', '50').attr(
                    'data-service', 'Antioxidant Facial').attr('data-subtype', subtype);
                $("#top_2 p").html('45 Minuts &pound; 40').attr('data-time', '45').attr('data-price', '40').attr(
                    'data-service', 'Antioxidant Facial').attr('data-subtype', subtype);
                $("#top_3").hide();
                $("#description").text(
                    "Rich in vitamins A, C, and E, it�s a wonderful treatment for more mature skin. Plus, it also features creams and masks that are rich in beta carotene, giving you soft and smooth skin. An Antioxidant Facial can even your skin tone, clear the pores, and eliminate the impurities. It can also make your skin radiantly glowing and youthful-looking."
                );
            }

            if (i == 'Acupuncture_facial') {
                $("#top_1,top_2").show();
                $("#top_3").hide();
                $("#top_1 p").html('60 Minuts &pound; 100').attr('data-time', '60').attr('data-price', '100').attr(
                    'data-service', 'Acupuncture Facial').attr('data-subtype', subtype);
                $("#top_2 p").html('45 Minuts &pound; 150').attr('data-time', '45').attr('data-price', '150').attr(
                    'data-service', 'Acupuncture Facial').attr('data-subtype', subtype);
                $("#description").text(
                    "This treatment focuses specifically on the face, neck, and hairline your aesthetician will place several needles on those areas. This helps to increase blood flow and stimulate collagen production which helps with skin elasticity.Other benefits of Acupuncture Facial include firming up the skin and reducing the appearance of wrinkles and fine lines, ugly acne scars, and blemishes"
                );
            }


            if (i == 'Acne_Reduction_Facial') {
                $("#top_1").show();
                $("#top_1 p").html('60 Minuts &pound; 70').attr('data-time', '60').attr('data-price', '70').attr(
                    'data-service', 'Acne Reduction Facial').attr('data-subtype', subtype);
                $("#top_2 p").html('45 Minuts &pound; 56').attr('data-time', '45').attr('data-price', '56').attr(
                    'data-service', 'Acne Reduction Facial').attr('data-subtype', subtype);
                $("#top_3").hide();
                $("#description").text(
                    'Acne facials reduce acne symptoms by cleansing the skin, removing impurities, debris, and oil. unclogging pores using exfoliation, which is the removal of dead skin cells. reducing oil production and inflammation of the skin. reducing irritation.'
                );
            }

        }
    </script>
@endpush
