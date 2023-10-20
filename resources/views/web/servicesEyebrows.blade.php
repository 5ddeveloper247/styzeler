@extends('layouts.master.template_new.master')

@push('css')
    <style>
        #services .text_list .btns>li>.shadow_btn::after {
            border-color: #00c2cb;
        }

        .shaddowbtn1::after {
            border-color: #fdd431 !important;
        }

        #services .text_list .btns .shadow_btn {
            text-align: left;
        }

        #services .text_list .txt_wrap form .input_box {
            height: 3rem;
            width: 100%;
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
                    <div class="image"><img src="{{ asset('template_new/assets/images1/eye1.webp') }}" alt=""></div>
                    <div class="image"><img src="{{ asset('template_new/assets/images1/eye2.webp') }}" alt=""></div>
                </div>
                <div class="content_blk"
                    style="background-image: url('{{ asset('template_new/') }}assets/images/service_main.jpg');">
                    <h2>You book We deliver</h2>
                    <div class="inner">
                        <div class="btn_list">

                            <a href="{{ route('servicesBodywaxing') }}" class="shadow_btn" data-id="body_waxing">Body
                                Waxing</a>
                            <a href="javascript:;" class="shadow_btn" data-id="eye_brows">Eyes & Brows</a>
                            <a href="{{ route('servicesManiPedi') }}" class="shadow_btn" data-id="mani_pedi">Mani / Pedi</a>
                            <a href="{{ route('servicesFacial') }}" class="shadow_btn" data-id="facial">Facial</a>
                        </div>
                        <div class="text_list" data-id="eye_brows" style="display:block;">
                            <div class="text_list_inner">
                                <ul class="btns scrollbar shadowbtn" id="list_btns">
                                    <li>
                                        <button type="button" class="shadow_btn shaddowbtn1"
                                            onclick="caseCat('Brow_Lamination')">Brow Lamination <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shaddowbtn1"
                                            onclick="caseCat('Eyebrow_Threading')">Eyebrow Threading <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shaddowbtn1"
                                            onclick="caseCat('Eyebrow_Tint')">Eyebrow Tint <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shaddowbtn1"
                                            onclick="caseCat('Lash_Lifting')">Lash Lifting <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>
                                    <li>
                                        <button type="button" class="shadow_btn shaddowbtn1"
                                            onclick="caseCat('Eyelash_Tint')">Eyelash Tint <img
                                                src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                alt=""></button>
                                    </li>

                                    <!-- <li>
                                                                                                      <button type="button" class="shadow_btn" onclick="caseCat('Eyelash_Extensions')">Eyelash Extensions <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
                                                                                                     </li> -->
                                    <li>
                                        <button type="button" class="shadow_btn">Eyelash Extensions</button>
                                        <ul class="sub_btns">
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Ckassic_full','Eyelash Extensions')">Classic Full <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Classic_Half','Eyelash Extensions')">Classic Half <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Clamourous_Volume_Full','Eyelash Extensions')">Clamourous
                                                    Volume Full <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Clamourous_Volume_Half','Eyelash Extensions')">Clamourous
                                                    Volume Half <img
                                                        src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Hybrid_full_set','Eyelash Extensions')">Hybrid Full
                                                    Set
                                                    <img src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Hybrid_half_set','Eyelash Extensions')">Hybrid Half
                                                    Set
                                                    <img src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Eyelash_Infilt','Eyelash Extensions')">Eyelash Infil
                                                    <img src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                            <li>
                                                <button type="button" class="shadow_btn"
                                                    onclick="caseCat('Eyelash_Removal','Eyelash Extensions')">Eyelash
                                                    Removal <img src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""></button>
                                            </li>
                                        </ul>
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
                                                                <p class="input_box add_to_cart" data-time=""
                                                                    data-price="" data-type="" data-subtype=""
                                                                    data-service=""></p>
                                                            </div>
                                                        </div>
                                                        <div id="top_2" class="col-md-4 mb-4">
                                                            <div class="input_box_wrap">
                                                                <p class="input_box add_to_cart" data-time=""
                                                                    data-price="" data-type="" data-subtype=""
                                                                    data-service=""></p>
                                                            </div>
                                                        </div>
                                                        <div id="top_3" class="col-md-4 mb-4">
                                                            <div class="input_box_wrap">
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
                                            @if (@$tokens > 0)
                                                <a href="{{ route('bookFreelancer') }}" class="book_freelance_btn">
                                                    <img src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""> Book a Freelancer
                                                </a>
                                            @else
                                                <a href="javascript:;" class="book_freelance_btn error-booking">
                                                    <img src="{{ asset('template_new/assets/images/eye.svg') }}"
                                                        alt=""> Book a Freelancer
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
            <!-- Booking Fail Message-->


    </section>
    <div class="modal fade bd-example-modal-md" id="fail-modal" role="dialog">
        <div class="modal-dialog modal-md">
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
        <div class="modal-dialog modal-md">
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
                    <a type="" href="javascript:;" class="btn1 customBtn" onclick="addToCartConfirm();">Yes</a>
                    <a type="button" class="btn1 customBtn closeCartConfirm" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('customjs/web/cart/addtocart.js') }}?v={{ time() }}"></script>
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
                console.log('kamran');
                $(this).parents(".text_list_inner").find(".txt_wrap").fadeIn(); //.fadeToggle();
            });
            $(document).on("click", ".shadowbtn", function() {
                console.log('kami');

                $(this).parents(".text_list_inner").find(".txt_wrap").fadeIn(); //.fadeToggle();
                // $(this).parents(".text_list_inner").find(".txt_wrap").css({
                //     'opacity': 1,
                //     'visibility': 'visible',
                //     'z-index': 9999999999,
                //     'display': 'block'
                // });
                // $(this).parents(".text_list_inner").find("#list_btns").css({
                //     // 'opacity': 0,
                //     // 'visibility': 'hidden',
                //     // 'z-index': 0
                //     'display': 'none'
                // });
                //.fadeToggle();
            });

        });

        var addtocartType = 'Eyes & Brows';

        function caseCat(i, subtype = '') {
            console.log(i, subtype);
            if (i == 'Brow_Lamination') {
                $("#top_1").show();
                $("#top_1 p").html('145 Minuts &pound; 48').attr('data-time', '145').attr('data-price', '48').attr(
                    'data-service', 'Brow Lamination').attr('data-subtype', subtype);
                $("#top_2,#top_3").hide();
                $("#description").text(
                    'Brow lamination involves straightening and lifting the hairs using a chemical solution, which allows the hairs to have more flexibility to move them into your desired shape, therefore covering any gaps or stray areas, lasting around six weeks. the treatment is often paired with a brow tint for a bolder enhanced look 48 hours patch test required'
                );
            }

            if (i == 'Eyebrow_Threading') {
                $("#top_1").show();
                $("#top_1 p").html('15 Minuts &pound; 14').attr('data-time', '15').attr('data-price', '14').attr(
                    'data-service', 'Eyebrow Threading').attr('data-subtype', subtype);;
                $("#top_2,#top_3").hide();
                $("#description").text(
                    'Eyebrow threading is the purest form of hair removal there is no chemical used in the threading process of removing eyebrow hair a piece of thread is used'
                );
            }

            if (i == 'Eyebrow_Tint') {
                $("#top_1").show();
                $("#top_1 p").html('15 Minuts &pound; 10').attr('data-time', '15').attr('data-price', '10').attr(
                    'data-service', 'Eyebrow Tint').attr('data-subtype', subtype);;
                $("#top_2,#top_3").hide();
                $("#description").text(
                    'Eyebrow tinting involves smoothing semi-permanent dye over your eyebrows to make them appear fuller and slightly darker than normal'
                );
            }

            if (i == 'Lash_Lifting') {
                $("#top_1").show();
                $("#top_1 p").html('45 Minuts &pound; 50').attr('data-time', '45').attr('data-price', '50').attr(
                    'data-service', 'Lash Lifting').attr('data-subtype', subtype);;
                $("#top_2,#top_3").hide();
                $("#description").text(
                    'An eyelash lift enhances the appearance of your natural lashes, to make them appear longer and fuller while maintaining a natural look.Be advised this service requires a 24 hours patch test before the appointment can be carried out'
                );
            }

            if (i == 'Eyelash_Tint') {
                $("#top_1").show();
                $("#top_1 p").html('15 Minuts &pound; 16').attr('data-time', '15').attr('data-price', '16').attr(
                    'data-service', 'Eyelash  Tint').attr('data-subtype', subtype);;
                $("#top_2,#top_3").hide();
                $("#description").text(
                    'Eyelash Tinting is applying a safe, semi-permanent vegetable dye to your eyelashes. This is done to make your dull lashes appear not only darker but also longer and fuller'
                );
            }


            if (i == 'Eyelash_Extensions') {
                $("#top_1").show();
                $("#top_1 p").html('120 Minuts &pound; 90').attr('data-time', '120').attr('data-price', '90').attr(
                    'data-service', 'Eyelash Extensions').attr('data-subtype', subtype);;
                $("#top_2,#top_3").hide();
                $("#description").text(
                    'Classic Full Set is 1:1 lash application. One extension is applied to each one of your natural lashes, extending the length and appearance of your eyelashes. Classic lashes are suitable for clients who have a good amount of natural lashes'
                );
            }

            if (i == 'Ckassic_full') {
                $("#top_1").show();
                $("#top_1 p").html('120 Minuts &pound; 90').attr('data-time', '120').attr('data-price', '90').attr(
                    'data-service', 'Classic full').attr('data-subtype', subtype);;
                $("#top_2,#top_3").hide();
                $("#description").text(
                    'Classic Full Set is 1:1 lash application. One extension is applied to each one of your natural lashes, extending the length and appearance of your eyelashes. Classic lashes are suitable for clients who have a good amount of natural lashes'
                );
            }

            if (i == 'Classic_Half') {
                $("#top_1").show();
                $("#top_1 p").html('90 Minuts &pound; 65').attr('data-time', '90').attr('data-price', '65').attr(
                    'data-service', 'Classic Half').attr('data-subtype', subtype);;
                $("#top_2,#top_3").hide();
                $("#description").text(
                    'Half-set eyelash extension would be half of a full set. What does this mean exactly? It means that instead of an eyelash extension for every natural lash, you get an eyelash extension put in for every second or third natural lash,Half sets are great places to start if you are a beginner and are a bit nervous about your first treatment'
                );
            }


            if (i == 'Clamourous_Volume_Full') {
                $("#top_1").show();
                $("#top_1 p").html('120 Minuts &pound; 130').attr('data-time', '120').attr('data-price', '130').attr(
                    'data-service', 'Clamourous Volume Full').attr('data-subtype', subtype);;
                $("#top_2,#top_3").hide();
                $("#description").text(
                    'What are glam volume lashes? Volume lashing is where the technician takes 2-6 very thin eyelash extensions and makes them into a fan shape before applying to the natural eyelash. All the fans are hand made during each lash set using different lengths, curls and thickness to suit each individual client'
                );
            }


            if (i == 'Clamourous_Volume_Half') {
                $("#top_1").show();
                $("#top_1 p").html('120 Minuts &pound; 110').attr('data-time', '120').attr('data-price', '110').attr(
                    'data-service', 'Clamourous Volume Half').attr('data-subtype', subtype);;
                $("#top_2,#top_3").hide();
                $("#description").text(
                    'Glamourous Volume lashing is where the technician takes 2-6 very thin eyelash extensions and makes them into a fan shape before applying to the natural eyelash. All the fans are handmade during each lash set using different lengths, curls and thicknesses to suit each individual client <Half set you to get an eyelash extension put in for every second or third natural lash>'
                );
            }

            if (i == 'Hybrid_full_set') {
                $("#top_1").show();
                $("#top_1 p").html('120 Minuts &pound; 100').attr('data-time', '120').attr('data-price', '100').attr(
                    'data-service', 'Hybrid full set').attr('data-subtype', subtype);;
                $("#top_2,#top_3").hide();
                $("#description").text(
                    'Hybrid full set Hybrid lashes are a 70-30 mixture of both classic lashes and volume lashes. Choosing hybrid eyelash extensions gives you the best of both worlds.'
                );
            }

            if (i == 'Hybrid_half_set') {
                $("#top_1").show();
                $("#top_1 p").html('120 Minuts &pound; 80').attr('data-time', '120').attr('data-price', '80').attr(
                    'data-service', 'Hybrid half set').attr('data-subtype', subtype);;
                $("#top_2,#top_3").hide();
                $("#description").text(
                    "Hybrid Half set Hybrid lashes are a 70-30 mixture of both classic lashes and volume lashes. Choosing hybrid eyelash extensions gives you the best of both worlds.<Half set you get an eyelash extension put in for every second or third natural lash>"
                );
            }

            if (i == 'Eyelash_Infilt') {
                $("#top_1").show();
                $("#top_1 p").html('60 Minuts &pound; 50').attr('data-time', '60').attr('data-price', '50').attr(
                    'data-service', 'Eyelash Infil').attr('data-subtype', subtype);;
                $("#top_2,#top_3").hide();
                $("#description").text(
                    'Eyelash infills are individual lashes or fans that fill in the gaps in your lash extensions which can appear after 2-3 weeks, due to natural shedding.'
                );
            }

            if (i == 'Eyelash_Removal') {
                $("#top_1").show();
                $("#top_1 p").html('15 Minuts &pound; 15').attr('data-time', '15').attr('data-price', '15').attr(
                    'data-service', 'Eyelash Removal').attr('data-subtype', subtype);;
                $("#top_2,#top_3").hide();
                $("#description").text(
                    'The therapist will run the gel remover through the lashes. let it set for three to five minutes, while doing so we want to make sure our client has their eyes closed tightly.'
                );
            }
        }
    </script>
@endpush
