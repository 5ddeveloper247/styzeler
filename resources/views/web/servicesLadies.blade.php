@extends('layouts.master.template_new.master')

@push('css')
    <style>
        #services .text_list .btns .shadow_btn {
            text-align: left;
        }

        #services .text_list .txt_wrap form .input_box {
            height: 3rem;
            color: #9f866d !important;
            /* 		width: auto !important; */
            background-color: transparent !important
        }

        #services .text_list .btns>li>.shadow_btn::after {
            border-color: #00c2cb;
        }

        .shadowbtn::after {
            border-color: #fdd431 !important;
        }

        .shadow_btn {
            padding: 0 2rem;
        }

        .input_box {
            font-size: 1.8rem !important;
        }

        #services .text_list .txt_wrap form .input_box_wrap::before {
            border: unset !important;
        }

        #descHeading {
            font-weight: 600;
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

                            <a href="javascript:;" class="shadow_btn" data-id="ladies-services">Ladies Services</a>
                            <a href="{{ route('servicesMakeup') }}" class="shadow_btn" data-id="makeup">Make-Up</a>
                            <a href="{{ route('servicesGents') }}" class="shadow_btn" data-id="gents-services">Gents Services</a>

                        </div>
                        <div class="text_list" data-id="ladies-services" style="display: block;">
                            <div class="text_list_inner">
                                <ul class="btns scrollbar">

                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Cut_Blowdry')">Cut & Blowdry <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Blowdry')">Blowdry <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn" onclick="caseCat('Color')">Colour
                                            <img src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Highlights')">Highlights <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Balayage')">Balayage <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Full_Head_Bleach')">Full Head Bleach <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Colour_Correction')">Colour Correction <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn" onclick="caseCat('Perm')">Perm
                                            <img src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Brazilian_Blow_Dry')">Brazilian Blow-Dry <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('keratin_Treatment')">Keratin Treatment <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Olaplex')">Olaplex <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn" onclick="caseCat('Up_do')">Up-Do
                                            <img src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shadowbtn"
                                            onclick="caseCat('Bridal_Hair')">Hair Bridal <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn">Hair Extension</button>
                                        <ul class="sub_btns">
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Tape_in_Hair','Hair Extension')">Tape-in-Hair <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Bonded_Hair','Hair Extension')">Bonded Hair <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Micro_Ring','Hair Extension')">Micro Ring <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>
                                <div class="txt_wrap scrollbar" id="showbox">
                                    <form action="" method="post">
                                        <div class="form_inner">
                                            <div class="row">
                                                <div class="col-11">
                                                    <div class="row">
                                                        <div id="top_1" class="col-md-8 mb-4">
                                                            <div class="input_box_wrap d-flex">
                                                                <!-- 																<input type="text" class="input_box" value="" >  -->
                                                                <p class="input_box "></p>
                                                                <span class="add_to_cart" data-time="" data-price="" data-type="" 
                                                                	data-subtype="" data-service="">
                                                                	<i class="fas fa-plus my-1" style="color: #9f866d;cursor:pointer;"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-11">
                                                    <div class="row">
                                                        <div id="top_2" class="col-md-8 mb-4">
                                                            <div class="input_box_wrap d-flex">
                                                                <!-- 																<input type="text" class="input_box" value=""> -->
                                                                <p class="input_box "></p>
                                                                <span class="add_to_cart" data-time="" data-price="" data-type="" 
                                                                	data-subtype="" data-service="">
                                                                	<i class="fas fa-plus my-1" style="color: #9f866d;cursor:pointer;"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-11">
                                                    <div class="row">
                                                        <div id="top_3" class="col-md-8 mb-4 ">
                                                            <div class="input_box_wrap d-flex">
                                                                <p class="input_box "></p>
                                                                <span class="add_to_cart" data-time="" data-price="" data-type="" 
                                                                	data-subtype="" data-service="">
                                                                	<i class="fas fa-plus my-1" style="color: #9f866d;cursor:pointer;"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-11">
                                                    <div class="row">
                                                        <div id="top_4" class="col-md-8 mb-4">
                                                            <div class="input_box_wrap d-flex">
                                                                <!-- 																<input type="text" class="input_box" value=""> -->
                                                                <p class="input_box "></p>
                                                                <span class="add_to_cart" data-time="" data-price="" data-type="" 
                                                                	data-subtype="" data-service="">
                                                                	<i class="fas fa-plus my-1" style="color: #9f866d;cursor:pointer;"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-11">
                                                    <div class="row">
                                                        <div id="top_5" class="col-md-8 mb-4">
                                                            <div class="input_box_wrap d-flex">
                                                                <!-- 																<input type="text" class="input_box" value=""> -->
                                                                <p class="input_box "></p>
                                                                <span class="add_to_cart" data-time="" data-price="" data-type="" 
                                                                	data-subtype="" data-service="">
                                                                	<i class="fas fa-plus my-1" style="color: #9f866d;cursor:pointer;"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-11">
                                                    <div class="row">
                                                        <div id="top_6" class="col-md-8 mb-4">
                                                            <div class="input_box_wrap d-flex">
                                                                <!-- 																<input type="text" class="input_box" value=""> -->
                                                                <p class="input_box "></p>
                                                                <span class="add_to_cart" data-time="" data-price="" data-type="" 
                                                                	data-subtype="" data-service="">
                                                                	<i class="fas fa-plus my-1" style="color: #9f866d;cursor:pointer;"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-11">
                                                    <div class="row">
                                                        <div id="top_7" class="col-md-8 mb-4">
                                                            <div class="input_box_wrap d-flex">
                                                                <!-- 																<input type="text" class="input_box" value=""> -->
                                                                <p class="input_box "></p>
                                                                <span class="add_to_cart" data-time="" data-price="" data-type="" 
                                                                	data-subtype="" data-service="">
                                                                	<i class="fas fa-plus my-1" style="color: #9f866d;cursor:pointer;"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-11">
                                                    <div class="row">
                                                        <div id="top_8" class="col-md-8 mb-4">
                                                            <div class="input_box_wrap d-flex">
                                                                <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       <input type="text" class="input_box" value=""> -->
                                                                <p class="input_box "></p>
                                                                <span class="add_to_cart" data-time="" data-price="" data-type="" 
                                                                	data-subtype="" data-service="">
                                                                	<i class="fas fa-plus my-1" style="color: #9f866d;cursor:pointer;"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="padding-left: 1rem;">
                                                <h2 id="descHeading"></h2>
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
    <script src="https://kit.fontawesome.com/8389fcfe36.js" crossorigin="anonymous"></script>
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

        var bookFrelancerRoute = "{{route('bookFreelancer')}}";
        
        var addtocartType = 'Ladies Services';

        function caseCat(i, subtype = '') {
            if (i == 'Cut_Blowdry') {
                $("#top_1,#top_2,#top_3").show();
                $("#top_1 p").html('Short  60 mints  &pound; 40').attr('onclick', "");
                $("#top_1 span").show().attr('data-time', '60').attr('data-price', '40').attr(
                    'data-service', 'Cut Blowdry').attr('data-text', 'Short  60 mints  £40').attr('data-subtype', subtype);

                $("#top_2 p").html('Medium 60 mints  &pound;48').attr('onclick', "");
                $("#top_2 span").show().attr('data-time', '60').attr('data-price', '48').attr(
                    'data-service', 'Cut Blowdry').attr('data-text', 'Medium 60 mints  £48').attr('data-subtype', subtype);

                $("#top_3 p").html('Long 60 mints  &pound; 56').attr('onclick', "");
                $("#top_3 span").show().attr('data-time', '60').attr('data-price', '56').attr(
                    'data-service', 'Cut Blowdry').attr('data-text', 'Long 60 mints  £56').attr('data-subtype', subtype);
                $("#top_4,#top_5,#top_6,#top_7,#top_8").hide();
                $("#descHeading").hide().text('');
                $("#description").hide();
            }

            if (i == 'Blowdry') {
                $("#top_1,#top_2,#top_3").show();
                $("#top_1 p").html('Medium 45 mints &pound;35').attr('onclick', "");
                $("#top_1 span").show().attr('data-time', '45').attr('data-price', '35').attr(
                    'data-service', 'Blowdry').attr('data-text', 'Medium 45 mints £35').attr('data-subtype', subtype);

                $("#top_2 p").html('Long 60 mints  &pound; 40').attr('onclick', "");
                $("#top_2 span").show().attr('data-time', '60').attr('data-price', '40').attr(
                    'data-service', 'Blowdry').attr('data-text', 'Long 60 mints  £40').attr('data-subtype', subtype);

                $("#top_3 p").html('B+Updo 90 mints &pound; 72').attr('onclick', "");
                $("#top_3 span").show().attr('data-time', '90').attr('data-price', '72').attr(
                    'data-service', 'Blowdry').attr('data-text', 'B+Updo 90 mints £72').attr('data-subtype', subtype);
                

                $("#top_4,#top_5,#top_6,#top_7,#top_8").hide();
                $("#descHeading").hide().text('');
                $("#description").hide();

            }

            if (i == 'Color') {
                $("#top_1,#top_2,#top_3,#top_4").show();
                $("#description").hide();
                $("#top_1 p").html('Roots +Length  90 mints  &pound; 48').attr('onclick', "");
                $("#top_1 span").show().attr('data-time', '90').attr('data-price', '48')
                    .attr('data-service', 'Color').attr('data-text', 'Roots +Length  90 mints  £48').attr('data-subtype', subtype);

                $("#top_2 p").html('Roots  60 mints   &pound; 40').attr('onclick', "");
                $("#top_2 span").show().attr('data-time', '60').attr('data-price', '40').attr(
                    'data-service', 'Color').attr('data-text', 'Roots  60 mints   £40').attr('data-subtype', subtype);

                $("#top_3 p").html('+ Blow-Dry').attr('onclick', "caseCat('Blowdry')");
                $("#top_3 span").hide().attr('data-time', '').attr('data-price', '').attr(
                    'data-service', 'Color').attr('data-text', '+ Blow-Dry').attr('data-subtype', subtype);

                $("#top_4 p").html('+ Cut- Blow-Dry').attr('onclick', "caseCat('Cut_Blowdry')");
                $("#top_4 span").hide().attr('data-time', '').attr('data-price', '').attr(
                    'data-service', 'Color').attr('data-text', '+ Cut- Blow-Dry').attr('data-subtype', subtype);

                $("#top_5,#top_6,#top_7,#top_8").hide();
                $("#descHeading").hide().text('');
                $("#description").hide();
            }
            if (i == 'Highlights') {
                $("#top_1,#top_2,#top_3,#top_4,#top_5,#top_6,#top_7").show();

                $("#top_1 p").html('T-sectiom 60 mints  &pound; 48').attr('onclick', "");;
                $("#top_1 span").show().attr('data-time', '60').attr('data-price', '48').attr(
                    'data-service', 'Highlights').attr('data-text', 'T-sectiom 60 mints  £48').attr('data-subtype', subtype);

                $("#top_2 p").html('Half Head  90 minuts  &pound;88').attr('onclick', "");;
                $("#top_2 span").show().attr('data-time', '90').attr('data-price', '88').attr(
                    'data-service', 'Highlights').attr('data-text', 'Half Head  90 minuts  £88').attr('data-subtype', subtype);

                $("#top_3 p").html('Full Head 120 mints &pound; 104').attr('onclick', "");;
                $("#top_3 span").show().attr('data-time', '120').attr('data-price', '104')
                    .attr('data-service', 'Highlights').attr('data-text', 'Full Head 120 mints £104').attr('data-subtype', subtype);

                $("#top_4 p").html('+ Toner  10 minuts  &pound; 15').attr('onclick', "");;
                $("#top_4 span").show().attr('data-time', '10').attr('data-price', '15').attr(
                    'data-service', 'Highlights').attr('data-text', '+ Toner  10 minuts  £15').attr('data-subtype', subtype);

                $("#top_5 p").html('+ Colour').attr('onclick', "caseCat('Color')");
                $("#top_5 span").hide().attr('data-time', '').attr('data-price', '').attr(
                    'data-service', 'Highlights').attr('data-text', '+ Colour').attr('data-subtype', subtype);

                $("#top_6 p").html('+ Blow-Dry').attr('onclick', "caseCat('Blowdry')");
                $("#top_6  span").hide().attr('data-time', '').attr('data-price', '').attr(
                    'data-service', 'Highlights').attr('data-text', '+ Blow-Dry').attr('data-subtype', subtype);

                $("#top_7 p").html('+ Cut- Blow-Dry').attr('onclick', "caseCat('Cut_Blowdry')");
                $("#top_7 span").hide().attr('data-price', '').attr(
                    'data-service', 'Highlights').attr('data-text', '+ Cut- Blow-Dry').attr('data-subtype', subtype);

                $("#top_8").hide();
                $("#descHeading").hide().text('');
                $("#description").hide();
            }

            if (i == 'Balayage') {
                $("#top_1,#top_2,#top_3,#top_4,#top_5,#top_6,#top_7").show();

                $("#top_1 p").html('Half Head  60 mints  &pound; 96').attr('onclick', "");
                $("#top_1 span").show().attr('data-time', '60').attr('data-price', '96').attr(
                    'data-service', 'Balayage').attr('data-text', 'Half Head  60 mints  £96').attr('data-subtype', subtype);

                $("#top_2 p").html('Full Head  90 mints  &pound; 112').attr('onclick', "");
                $("#top_2 span").show().attr('data-time', '90').attr('data-price', '112')
                    .attr('data-service', 'Balayage').attr('data-text', 'Full Head  90 mints  £112').attr('data-subtype', subtype);

                $("#top_3 p").html('+ Root shadow 30 minuts  &pound; 30').attr('onclick', "");
                $("#top_3 span").show().attr('data-time', '30').attr('data-price', '30')
                    .attr('data-service', 'Balayage').attr('data-text', '+ Root shadow 30 minuts  £30').attr('data-subtype', subtype);

                $("#top_4 p").html('+ Toner 15 minuts &pound; 15').attr('onclick', "");
                $("#top_4 span").show().attr('data-time', '15').attr('data-price', '15').attr(
                    'data-service', 'Balayage').attr('data-text', '+ Toner 15 minuts £15').attr('data-subtype', subtype);

                $("#top_5 p").html('+ Colour').attr('onclick', "caseCat('Color')");
                $("#top_5 span").hide().attr('data-price', '').attr(
                    'data-service', 'Balayage').attr('data-text', '+ Colour').attr('data-subtype', subtype);

                $("#top_6 p").html('+ Blow-Dry').attr('onclick', "caseCat('Blowdry')");
                $("#top_6 span").hide().attr('data-time', '').attr('data-price', '').attr(
                    'data-service', 'Balayage').attr('data-text', '+ Blow-Dry').attr('data-subtype', subtype);

                $("#top_7 p").html('+ Cut- Blow-Dry').attr('onclick', "caseCat('Cut_Blowdry')");
                $("#top_7 span").hide().attr('data-time', '').attr('data-price', '').attr(
                    'data-service', 'Balayage').attr('data-text', '+ Cut-Blow-Dry').attr('data-subtype', subtype);

                $("#top_8").hide();
                $("#descHeading").hide().text('');
                $("#description").hide();
            }


            if (i == 'Full_Head_Bleach') {

                $("#top_1,#top_2,#top_3,#top_4,#top_5,#top_6,#top_7,#top_8").show();
                $("#top_1 p").html('Short  90 mints  &pound; 80').attr('onclick', "");
                $("#top_1 span").show().attr('data-time', '90').attr('data-price', '80').attr(
                    'data-service', 'Full Head Bleach').attr('data-text', 'Short  90 mints  £80').attr('data-subtype', subtype);

                $("#top_2 p").html('Medium 90 mints  &pound;100').attr('onclick', "");
                $("#top_2 span").show().attr('data-time', '90').attr('data-price', '100').attr(
                    'data-service', 'Full Head Bleach').attr('data-text', 'Medium 90 mints  £100').attr('data-subtype', subtype);

                $("#top_3 p").html('Long 120 mints  &pound; 140').attr('onclick', "");
                $("#top_3 span").show().attr('data-time', '120').attr('data-price', '140').attr(
                    'data-service', 'Full Head Bleach').attr('data-text', 'Long 120 mints  £140').attr('data-subtype', subtype);

                $("#top_4 p").html('Roots Bleach  90 mints  &pound; 50').attr('onclick', "");
                $("#top_4 span").show().attr('data-time', '90').attr('data-price', '50')
                    .attr('data-service', 'Full Head Bleach').attr('data-text', 'Roots Bleach  90 mints  £50').attr('data-subtype', subtype);

                $("#top_5 p").html('+ Rots  Toner  15 mints  &pound;16').attr('onclick', "");
                $("#top_5 span").show().attr('data-time', '15').attr('data-price', '16')
                .attr('data-service', 'Full Head Bleach').attr('data-text', '+ Rots  Toner  15 mints  £16').attr('data-subtype', subtype);

                $("#top_6 p").html('+ Full Head Toner 45 mints  &pound;40').attr('onclick', "");
                $("#top_6 span").show().attr('data-time', '45').attr('data-price', '40')
                    .attr('data-service', 'Full Head Bleach').attr('data-text', '+ Full Head Toner 45 mints  £40').attr('data-subtype', subtype);

                $("#top_7 p").html('+ Cut- Blow-Dry').attr('onclick', "caseCat('Cut_Blowdry')");
                $("#top_7 span").hide().attr('data-time', '').attr('data-price', '').attr(
                    'data-service', 'Full Head Bleach').attr('data-text', '+ Cut- Blow-Dry').attr('data-subtype', subtype);

                $("#top_8 p").html('+ Blow-Dry').attr('onclick', "caseCat('Blowdry')");
                $("#top_8 span").hide().attr('data-time', '').attr('data-price', '').attr(
                    'data-service', 'Full Head Bleach').attr('data-text', '+ Blow-Dry').attr('data-subtype', subtype);

                $("#descHeading").hide().text('');
                $("#description").hide();
            }

            if (i == 'Colour_Correction') {
                $("#top_1,#top_2,#top_3").show();
                $("#top_1 p").html('From &pound;100 minuts 90');
                $("#top_1 span").show().attr('data-time', '90').attr('data-price', '100').attr(
                    'data-service', 'Colour Correction').attr('data-text', 'From &pound;100 minuts 90').attr('data-subtype', subtype);

                $("#top_2 p").html('+ Cut- Blow-Dry').attr('onclick', "caseCat('Cut_Blowdry')");
                $("#top_2 span").hide().attr('data-time', '').attr('data-price', '').attr(
                    'data-service', 'Colour Correction').attr('data-text', '+ Cut- Blow-Dry').attr('data-subtype', subtype);

                $("#top_3 p").html('+ Blow-Dry').attr('onclick', "caseCat('Blowdry')");
                $("#top_3 span").hide().attr('data-time', '').attr('data-price', '').attr(
                    'data-service', 'Colour Correction').attr('data-text', '+ Blow-Dry').attr('data-subtype', subtype);

                $("#top_4,#top_5,#top_6,#top_7,#top_8").hide();
                $("#descHeading").hide().text('');
                $("#description").hide();
            }

            if (i == 'Perm') {
                $("#top_1,#top_2,#top_3,#top_4,#top_5").show();
                $("#top_1 p").html('Short  60 minutes  &pound; 64').attr('onclick', "");
                $("#top_1 span").show().attr('data-time', '60').attr('data-price', '64').attr(
                    'data-service', 'Perm').attr('data-text', 'Short  60 minutes  £64').attr('data-subtype', subtype);


                $("#top_2 p").html('Medium 60 minutes  &pound;88').attr('onclick', "");
                $("#top_2 span").show().attr('data-time', '60').attr('data-price', '88').attr(
                    'data-service', 'Perm').attr('data-text', 'Medium 60 minutes  £88').attr('data-subtype', subtype);

                $("#top_3 p").html('Long 90 minutes  &pound; 104').attr('onclick', "");
                $("#top_3 span").show().attr('data-time', '90').attr('data-price', '104').attr(
                    'data-service', 'Perm').attr('data-text', 'Long 90 minutes  £104').attr('data-subtype', subtype);

                $("#top_4 p").html('+ Cut- Blow-Dry').attr('onclick', "caseCat('Cut_Blowdry')");
                $("#top_4 span").hide().attr('data-time', '').attr('data-price', '').attr(
                    'data-service', 'Perm').attr('data-text', '+ Cut- Blow-Dry').attr('data-subtype', subtype);

                $("#top_5 p").html('+ Blow-Dry').attr('onclick', "caseCat('Blowdry')");
                $("#top_5 span").hide().attr('data-time', '').attr('data-price', '').attr(
                    'data-service', 'Perm').attr('data-text', '+ Blow-Dry').attr('data-subtype', subtype);

                $("#top_6,#top_7,#top_8").hide();
                $("#descHeading").hide().text('');
                $("#description").hide();
            }

            if (i == 'Brazilian_Blow_Dry') {
                $("#top_1,#top_2,#top_3,#description").show();

                $("#top_1 p").html('Short  60 mints  &pound; 70').attr('onclick', "");
                $("#top_1 span").show().attr('data-time', '60').attr('data-price', '70').attr(
                    'data-service', 'Brazilian Blow-Dry').attr('data-text', 'Short  60 mints  £70').attr('data-subtype', subtype);

                $("#top_2 p").html('Medium 60 mints  &pound;90').attr('onclick', "");
                $("#top_2 span").show().attr('data-time', '60').attr('data-price', '90').attr(
                    'data-service', 'Brazilian Blow-Dry').attr('data-text', 'Medium 60 mints  £90').attr('data-subtype', subtype);

                $("#top_3 p").html('Long 60 mints  &pound; 100').attr('onclick', "");
                $("#top_3 span").show().attr('data-time', '60').attr('data-price', '100').attr(
                    'data-service', 'Brazilian Blow-Dry').attr('data-text', 'Long 60 mints  £100').attr('data-subtype', subtype);

                $("#descHeading").hide().text('');
                $("#description").show().text(
                    "The Brazilian blowout is lighter and will leave your hair with a more natural texture than you'll experience with keratin treatment."
                );
                $("#top_4,#top_5,#top_6,#top_7,#top_8").hide();

            }


            if (i == 'keratin_Treatment') {
                $("#top_1,#top_2,#top_3").show();
                $("#top_1 p").html('Short  90 mints  &pound; 80').attr('onclick', "");
                $("#top_1 span").show().attr('data-time', '90').attr('data-price', '80').attr(
                    'data-service', 'Keratin Treatment').attr('data-text', 'Short  90 mints  £80').attr('data-subtype', subtype);

                $("#top_2 p").html('Medium 120 mints  &pound;120').attr('onclick', "");
                $("#top_2 span").show().attr('data-time', '120').attr('data-price', '120').attr(
                    'data-service', 'Keratin Treatment').attr('data-text', 'Medium 120 mints  £120').attr('data-subtype', subtype);

                $("#top_3 p").html('Long 150 mints  &pound; 140').attr('onclick', "");
                $("#top_3 span").show().attr('data-time', '150').attr('data-price', '140').attr(
                    'data-service', 'Keratin Treatment').attr('data-text', 'Long 150 mints £140').attr('data-subtype', subtype);

                $("#top_4,#top_5,#top_6,#top_7,#top_8").hide();
                $("#descHeading").hide().text('');
                $("#description").show().text(
                    "keratin treatment is the best for curly hair Keratin helps straighten overly curly hair, so it's less frizzy and is easy to style and manage."
                );
            }


            if (i == 'Olaplex') {
                $("#top_1,#top_2").show();
                $("#top_1 p").html('Add-on 20 minuts &pound; 30').attr('onclick', "");
                $("#top_1 span").show().attr('data-time', '20').attr('data-price', '30').attr(
                    'data-service', 'Olaplex').attr('data-text', 'Add-on 20 minuts £30').attr('data-subtype', subtype);

                $("#top_2 p").html('Stand alone service 30 minuts &pound; 40').attr('onclick', "");
                $("#top_2 span").show().attr('data-time', '30').attr('data-price', '40').attr(
                    'data-service', 'Olaplex').attr('data-text', 'Stand alone service 30 minuts £40').attr('data-subtype', subtype);

                $("#top_3,#top_4,#top_5,#top_6,#top_7,#top_8").hide();
                $("#descHeading").hide().text('');
                $("#description").show().text(
                    "It works on a molecular level by restoring the hair's broken dislfide bonds which can result from harsh chemical treatments like bleaching and coloring."
                );
            }


            if (i == 'Up_do') {
                $("#top_1").show();
                $("#top_1 p").html('60 mints  &pound; 50').attr('onclick', "");
                $("#top_1 span").show().attr('data-time', '60').attr('data-price', '50').attr(
                    'data-service', 'Up do').attr('data-text', '60 minuts  £50').attr('data-subtype', subtype);

                $("#top_2,#top_3,#top_4,#top_5,#top_6,#top_7,#top_8").hide();
                $("#descHeading").hide().text('');
                $("#description").show().text(
                    'An updo is a style that pulls the hair up and away from the face, there are many variations of the hairstyle, allowing you to adapt it to suit your preference easily. Whether you have short hair or long, straight texture or curly, there is an option for everyone'
                );
            }


            if (i == 'Bridal_Hair') {
            	$("#top_1,#top_2,#top_3,#top_4,#top_5,#top_6,#top_7,#top_8").hide();
                $("#description").show();
                $("#descHeading").hide().text('');
                $("#description").show().text('Hair Bridal should be connected with the wedding page');
            }
            if (i == 'Tape_in_Hair') {

                $("#top_1").show();
                $("#top_1 p").html('From &pound;350 minuts 120').attr('onclick', "");
                $("#top_1 span").show().attr('data-time', '120').attr('data-price', '350').attr(
                    'data-service', 'Tape in Hair').attr('data-text', 'From £350 minuts 120').attr('data-subtype', subtype);

                $("#top_2,#top_3,#top_4,#top_5,#top_6,#top_7,#top_8").hide();
                $("#descHeading").show().text('For full quatation contact freelancer');
                $("#description").show().text(
                    'A must-have for those with normal-to-thick hair textures, tape-in hair extensions create a cascading veil effect and are reusable up to three times. This application is convenient for those who need to touch up their hair color within that time frame as well,'
                );
            }
            if (i == 'Bonded_Hair') {

                $("#top_1").show();
                $("#top_1 p").html('From &pound;650 minuts 240').attr('onclick', "");
                $("#top_1 span").show().attr('data-time', '240').attr('data-price', '650').attr(
                    'data-service', 'Bonded Hair').attr('data-text', 'From £650 minuts 240').attr('data-subtype', subtype);

                $("#top_2,#top_3,#top_4,#top_5,#top_6,#top_7,#top_8").hide();
                $("#descHeading").show().text('For full quatation contact freelance');
                $("#description").show().text(
                    'Also known as keratin bond extensions, bonded hair extensions are flexible at the root, which is perfect for the client who regularly styles her hair or wears low ponytails'
                );
            }
            if (i == 'Micro_Ring') {

                $("#top_1").show();
                $("#top_1 p").html('From &pound;450 minuts 180').attr('onclick', "");
                $("#top_1 span").show().attr('data-time', '180').attr('data-price', '450').attr(
                    'data-service', 'Micro Ring').attr('data-text', 'From £450 minuts 180').attr('data-subtype', subtype);

                $("#top_2,#top_3,#top_4,#top_5,#top_6,#top_7,#top_8").hide();
                $("#descHeading").show().text('For full quatation contact freelancer');
                $("#description").show().text(
                    'Micro rings are small metal rings that hair extensions are threaded through, along with some of your own hair. Once they have been positioned correctly the micro rings are clamped into place, securing the hair extensions to your hair'
                );
            }

        }
    </script>
@endpush
