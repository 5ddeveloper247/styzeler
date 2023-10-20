@extends('layouts.master.template_new.master')

@push('css')
    <style>
        #packages .modal {
            --bs-modal-width: 57rem;
        }

        /* Style the entire payment form container */
        #payment-form {
            max-width: 55rem;
            margin: 0 auto;
            padding: 20px;
            color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: transparent;
        }

        .InputElement {
            color: #fff;
        }

        /* Style the card element container */
        #card-element {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            background: lavender;
        }

        /* Style the card error message */
        #card-errors {
            color: #ff0000;
            font-size: 14px;
            margin-top: 5px;
        }

        #pay_btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-transform: capitalize;
            width: 100%
        }

        #pay_btn:hover {
            background-color: #0056b3;
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
    <section id="home_service">
        <div class="contain">
            <div class="top_head" data-aos="fade-up" data-aos-duration="1000">
                <div class="txt">
                    <h1>HOME SERVICE</h1>
                    <p>Styzeler Hair & Beauty Agency</p>
                </div>
                <div class="btn_head mobile" data-aos="fade-up" data-aos-duration="1000">
                    <div class="txt">
                        <ul class="btn_list">
                            <li>
                                <button type="button" class="shadow_btn">
                                    Register<img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
                                </button>
                                <ul class="sub_list">
                                    <li><a href="{{ @!Auth::user() ? route('register') : 'javascript:;' }}" class="shadow_btn">Freelancer</a>
                                    </li>
                                    <li><a href="{{ @!Auth::user() ? route('register') : 'javascript:;' }}" class="shadow_btn">Client</a></li>
                                </ul>
                            </li>
                            <li>
                            	<a href="#booking" class="shadow_btn">Price List 
                            		<img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
                            	</a>
                            </li>
                        </ul>
                    </div>
                    <div class="img">
                        <!-- <img src="assets/images/home_service_02.jpg" alt=""> -->
                    </div>
                </div>
                <div class="img">
                    <img src="{{ asset('template_new/assets/images/home_service_01.jpg') }}" alt="">
                </div>
            </div>
        </div>
        <div class="btn_wraper_head">
            <div class="contain">
                <div class="btn_head desktop" data-aos="fade-up" data-aos-duration="1000">
                    <div class="txt">
                        <ul class="btn_list">
                            <li>
                                <button type="button" class="shadow_btn">
                                    Register<img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
                                </button>
                                <ul class="sub_list">
                                    <li><a href="{{ @!Auth::user() ? route('register') : 'javascript:;' }}"
                                            class="shadow_btn">Freelancer</a>
                                    </li>
                                    <li><a href="{{ @!Auth::user() ? route('register') : 'javascript:;' }}"
                                            class="shadow_btn">Client</a></li>
                                </ul>
                            </li>
                            <li>
                            	<a href="#booking" class="shadow_btn"> {{@Auth::user() ? 'Book' : 'Price List'}} 
                            		<img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
                            	</a>
                            </li>
                        </ul>
                    </div>
                    <div class="img">
                        <!-- <img src="assets/images/home_service_02.jpg" alt=""> -->
                    </div>
                </div>
            </div>
            <img src="{{ asset('template_new/assets/images/home_service_main.jpg') }}" alt="">
        </div>
        <!-- <div class="img_block" data-aos="fade-up" data-aos-duration="1000">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               <div class="fig_wrap">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="fig">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <img src="assets/images/home_service_03.jpg" alt="">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               <div class="fig_wrap">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="fig">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <img src="assets/images/home_service_04.jpg" alt="">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               <div class="fig_wrap">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="fig">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <img src="assets/images/home_service_05.jpg" alt="">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               <div class="fig_wrap">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="fig">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 <img src="assets/images/home_service_06.jpg" alt="">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              </div> -->
        <div class="contain">
            <div class="block_row" data-aos="fade-up" data-aos-duration="1000">
                <div class="col">
                    <div class="txt"
                        style="background-image: url('{{ asset('template_new/assets/images/home_service_bg_01.jpg') }}');">
                        <h3>
                            WHY CHOOSE HAIR & BEAUTY <br> HOME SERVICE
                        </h3>
                        <p>More and more hair & beauty home service is becoming a luxury
                            treat especially since working from home is likely playing a more
                            significant part in most people's life, than it ever has before.,
                            or Whatever your circumstances Styzeler hair & beauty home service
                            will deliver the right salon service experience at the comfort of
                            your own house without the Hiden add on</p>
                    </div>
                </div>
                <div class="col">
                    <div class="txt_blk">
                        <h3>
                            YOU BOOK <br> WE DELIVER.
                        </h3>
                        <div class="txt"
                            style="background-image: url('{{ asset('template_new/assets/images/home_service_bg_02.jpg') }}');">
                            <p>
                                All our freelancers have the experience & skills to adapt to any
                                environment to deliver a bespoke at-home hair &beauty service <br>
                                Check the Styzeler price list for hair & beauty home service
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn_blk mt-5 d-flex justify-content-end">
                <a href="{{ @!Auth::user() ? route('register') : 'javascript:;' }}" class="site_btn">Register <img
                        src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></a>
            </div>
            <div class="content">
                <h1>Buy tokens to book</h1>
                <h3>One token! one booking!</h3>
                <img src="{{ asset('template_new/assets/images/booking_line.jpg') }}" alt="">
                <h2>MULTIPLE SERVICES</h2>
            </div>
        </div>

    </section>

    <section id="booking">
        <div class="contain" data-aos="fade-up" data-aos-duration="1000">
            <div class="txt">
                <p>Choose the service !!</p>
                <p>Compare the price !!</p>
                <p>Book a freelancer !!</p>
            </div>
            <div class="flex_row">
                <div class="column1">
                    <h4>Price list</h4>
                    <div class="btn_blk">
                        @auth
                            <a href="#!" onclick="clientLink('beauty')" class="shadow_btn">Beauty
                                <!-- services-beauty1.html -->
                                <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="" />
                            </a>
                        </div>
                        <div class="btn_blk">
                            <a href="#!" onclick="clientLink('massage')" class="shadow_btn">Massage
                                <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="" />
                            </a>
                        </div>
                        <div class="btn_blk">
                            <a href="#!" onclick="clientLink('hairmakeup')" class="shadow_btn">Hair & Make-Up
                                <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="" />
                            </a>
                        </div>
                    @else
                        <a class="shadow_btn" id="show_beauty">Beauty
                            <!-- services-beauty1.html -->
                            <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="" />
                        </a>
                    </div>
                    <div class="btn_blk" id="show_message">
                        <a class="shadow_btn">Massage
                            <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="" />
                        </a>
                    </div>
                    <div class="btn_blk" id="show_hair">
                        <a class="shadow_btn">Hair & Make-Up
                            <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="" />
                        </a>
                    </div>
                @endauth

            </div>
            <div class="column2 d-none d-md-block">
                <div class="text_block"
                    style="background-image: url('{{ asset('template_new/assets/images/booking_img.PNG') }}')">
                    <h3>You book We deliver</h3>
                    <p>
                        Are you fed up with the hard sale that you face every time you
                        visit a hair and beauty salon Or the long waiting in an unfamiliar
                        environment? <br /> Or maybe you need that pick-me-up feel <br />
                        and your favourite beauty spot in town is all booked up Styzeler
                        hair & beauty home service would be the solution
                    </p>
                </div>
            </div>
            <div class="column2 d-block d-md-none">
                <div class="text_block"
                    style="background-image: url('{{ asset('template_new/assets/images/booking_img.PNG') }}')">
                    <h3>
                        You book <br />We deliver
                    </h3>
                    <p class="mbl-image">
                        Are you fed up with the hard sale that you face every time you
                        visit a hair and beauty salon Or the long waiting in an unfamiliar
                        environment? <br /> Or maybe you need that pick-me-up feel <br />
                        and your favourite beauty spot in town is all booked up Styzeler
                        hair & beauty home service would be the solution
                    </p>
                </div>
            </div>
        </div>
        <div class="content">
            <h1>
                Buy tokens to book <span>your home service</span>
            </h1>
            <h3>One token! one booking!</h3>
            <img src="{{ asset('template_new/assets/images/booking_line.jpg') }}" alt="" />
            <h2>MULTIPLE SERVICES</h2>
            <button type="button" class="play_btn">
                <img src="{{ asset('template_new/assets/images/play_button.jpg') }}" alt="" />
            </button>
        </div>
        </div>
    </section>

    <section id="packages">
        <div class="contain" data-aos="fade-up" data-aos-duration="1000">
            <div class="row flex_row">
                <div class="col-lg-4">
                    <div class="package_blk">
                        <div class="sm">
                            Styzeler Hair and Beauty Recruiting Agency <br> Styzeler Hair and
                            Beauty <br> Recrutining Freelancers All level
                        </div>
                        <h2>Styzeler The-one-off</h2>
                        <div class="inner">
                            <div class="txt">
                                <div class="token">
                                    <span>1</span> Tokens
                                </div>
                                <div class="save">&nbsp;</div>
                                <div class="price">&#163;16</div>
                            </div>
                            <div class="image">
                                <img src="{{ asset('template_new/assets/images/package_01.jpg') }}" alt="">
                            </div>
                            <div class="btn_blk">
                                <button class="site_btn" onclick="paymentModal('16','1')">Buy</button>
                                <a href="javascript:void(0)" class="eye_btn popup-pkg1">
                                    <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="package_blk">
                        <div class="sm">
                            Styzeler Hair and Beauty Recruiting Agency <br> Styzeler Hair and
                            Beauty <br> Recrutining Freelancers All level
                        </div>
                        <h2>Most Popular</h2>
                        <div class="inner">
                            <div class="txt">
                                <div class="token">
                                    <span>8</span> Tokens
                                </div>
                                <div class="save">Save 25 %</div>
                                <div class="price">&#163;96</div>
                            </div>
                            <div class="image">
                                <img src="{{ asset('template_new/assets/images/package_02.jpg') }}" alt="">
                            </div>
                            <div class="btn_blk">
                                <button class="site_btn" onclick="paymentModal('96','8')">Buy</button>
                                <a href="javascript:void(0)" class="eye_btn popup-pkg2">
                                    <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="package_blk">
                        <div class="sm">
                            Styzeler Hair and Beauty Recruiting Agency <br> Styzeler Hair and
                            Beauty <br> Recrutining Freelancers All level
                        </div>
                        <h2>Best Value</h2>
                        <div class="inner">
                            <div class="txt">
                                <div class="token">
                                    <span>12</span> Tokens
                                </div>
                                <div class="save">Save 35 %</div>
                                <div class="price">&#163;125</div>
                            </div>
                            <div class="image">
                                <img src="{{ asset('template_new/assets/images/package_03.jpg') }}" alt="">
                            </div>
                            <div class="btn_blk">
                                <button class="site_btn" onclick="paymentModal('125','12')">Buy</button>
                                <a href="javascript:void(0)" class="eye_btn popup-pkg3">
                                    <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="content">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               <h1>Buy tokens to book</h1>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               <h3>One token! one booking!</h3>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               <img src="assets/images/booking_line.jpg" alt="">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               <h2>MULTIPLE SERVICES</h2>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              </div> -->
        </div>

        <div class="modal fade bd-example-modal-md" id="popup-pkg1" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content border border-warning"
                    style="background-color: black; color: white; max-height: 400px; overflow-y: auto;">
                    <div class="modal-header" style="border-bottom: 5px solid #766d48;">
                        <h4 class="modal-title">STYZELER THE-ONE-OFF</h4>
                        <i class="close-modal" style="font-size: 2rem;"><b>&times;</b></i>
                    </div>
                    <div class="modal-body">

                        <h3 class="subheading">Unlimited candidate</h3>
                        <p>The-one-off subscription is a great way to ensure work is
                            compleated while searching for the right candidate for the role</p>

                        <h3 class="subheading">Wedding</h3>
                        <p>wedding planners or brides can book a wedding stylist for a
                            trial to discuss the suitable look</p>

                        <h3 class="subheading">Events</h3>
                        <p>Organisers are allowed to book unlimited freelancers for music
                            videos, product launches, music festivals, Organisers are allowed
                            to book unlimited freelancers for music festivals, trade shows,
                            and business conferences.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-md" id="popup-pkg2" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content border border-warning "
                    style="background-color: black; color: white; max-height: 400px; overflow-y: auto;">
                    <div class="modal-header" style="border-bottom: 5px solid #766d48;">
                        <h4 class="modal-title">DEDICATED TO HELPING</h4>
                        <i class="close-modal" style="font-size: 2rem;"><b>&times;</b></i>
                    </div>
                    <div class="modal-body">
                        <h3 class="subheading">Unlimited candidate</h3>
                        <p>"The dedicated to helping" is perfect for holiday leave to
                            ensure, professionalism, performance and competitiveness remain at
                            a high standard to ease up the pressure on permanent staff. the
                            dedicated to Helping membership allows start-up businesses to grow
                            the business organically with the help of freelancers and ease up
                            the pressure of fixed wages, can offer a full-time position to any
                            and ease up the pressure of fixed wages, can offer a full-time
                            position to any freelancer that suits the company policy Rent &
                            Let Rent & Let gives the chance to utilise and maximise on an
                            empty chair, take advantage of the new feature rent & let as you
                            go or the traditional chair rental.</p>

                        <h3 class="subheading">Rent & Let</h3>
                        <p>Rent & Let gives the chance to utilise and maximise on an empty
                            chair, take advantage of the new feature rent & let as you go or
                            the traditional chair rental</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-md" id="popup-pkg3" role="dialog">
            <div class="modal-dialog modal-md ">
                <div class="modal-content border border-warning"
                    style="background-color: black; color: white; max-height: 400px; overflow-y: auto;">
                    <div class="modal-header" style="border-bottom: 5px solid #766d48;">
                        <h4 class="modal-title">UNITED TO SUCCEED</h4>
                        <i class="close-modal" style="font-size: 2rem;"><b>&times;</b></i>
                    </div>
                    <div class="modal-body">
                        <h3 class="subheading">Unlimited candidate</h3>
                        <p>United to succeed has been tailored to make sure efficiency and
                            productivity remain at a high standard don't be short of staff
                            risking turning that walk-in customer away that potentially could
                            have become a loyal client with the united to succeed can hire any
                            freelancer for a short period time or for an unlimited time can
                            offer a full-time position to a freelancer that suits the company
                            policy or directly contacts a candidate looking that suits the
                            company policy or directley contact any job seeker candidate looking for a
                            permanent position</p>

                        <h3 class="subheading">Rent & Let</h3>
                        <p>Rent & Let gives the chance to utilise and maximise on an empty
                            chair, take advantage of the new feature rent & let as you go or
                            the traditional chair rental</p>

                        <h3 class="subheading">Wedding</h3>
                        <p>wedding planners or brides can book a wedding stylist for a
                            trial to discuss the suitable look</p>

                        <h3 class="subheading">Events</h3>
                        <p>Organizers are allowed to discuss the suitable look</p>

                        <h3 class="subheading">Events</h3>
                        <p>Organizers are allowed to book unlimited freelancers for music
                            festivals, business conferences, product launches, and trade
                            shows.</p>

                        <h3 class="subheading">Post a job</h3>
                        <p>Post a job and have candidates from the agency contact you or
                            the whole online community can reach your organisation through our
                            online marketing</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-md" id="payment_modal" role="dialog">
            <div class="modal-dialog modal-md ">
                <div class="modal-content border border-warning"
                    style="background-color: black; color: white; max-height: 400px; overflow-y: auto;">
                    <div class="modal-header" style="border-bottom: 5px solid #766d48;">
                        <h4 class="modal-title">Payment</h4>
                        <i class="close-modal" style="font-size: 2rem;"><b>&times;</b></i>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('stripe.charge') }}" method="post" id="payment-form">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="payment_amount" id="payment_amount">
                                <input type="hidden" name="payment_tokens" id="payment_tokens">
                                <input type="hidden" name="payment_type" id="payment_type" value="homeServices">
                                <label for="card-element">
                                    Credit or Debit card
                                </label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>

                            <button type="submit" class="btn btn-primary" id="pay_btn">Pay</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-md" id="register_modal" role="dialog">
            <div class="modal-dialog modal-md ">
                <div class="modal-content border border-warning"
                    style="background-color: black; color: white; max-height: 400px; overflow-y: auto;">
                    <div class="modal-header" style="border-bottom: 5px solid #766d48;">
                        <h4 class="modal-title">Registeration is Free</h4>
                        <i class="close-modal" style="font-size: 2rem;"><b>&times;</b></i>
                    </div>
                    <div class="modal-body">
                        Do you want to register your self?
                    </div>
                    <div class="modal-footer text-center">
                        <a type="" href="{{ route('registration') }}" class="btn1 customBtn">Ok</a>
                        <a type="button" class="btn1 customBtn close-modal" data-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade bd-example-modal-md" id="userType_message" role="dialog">
            <div class="modal-dialog modal-md ">
                <div class="modal-content border border-warning"
                    style="background-color: black; color: white; max-height: 400px; overflow-y: auto;">
                    <div class="modal-header" style="border-bottom: 5px solid #766d48;">
                        <h4 class="modal-title">Alert</h4>
                        <i class="close-modal" style="font-size: 2rem;"><b>&times;</b></i>
                    </div>
                    <div class="modal-body">
                        Kindly login as Client!
                    </div>
                    <div class="modal-footer text-center">
                        <a type="button" class="btn1 customBtn close-modal" data-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection

@push('script')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        $(window).on("load", function() {
            $(document).on("click", "#home_service .btn_list > li > .shadow_btn", function() {
                $(this).parent().find(".sub_list").slideToggle();
            })
        });
    </script>
    <script>
        const stripe = Stripe('{{ config('keys.STRIPE_PUBLISHABLE_KEY') }}');
        const elements = stripe.elements();

        const cardElement = elements.create('card');
        cardElement.mount('#card-element');

        const form = document.getElementById('payment-form');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const {
                token,
                error
            } = await stripe.createToken(cardElement);

            if (error) {
                const errorElement = document.getElementById('card-errors');
                errorElement.textContent = error.message;
            } else {
                const tokenInput = document.createElement('input');
                tokenInput.setAttribute('type', 'hidden');
                tokenInput.setAttribute('name', 'stripeToken');
                tokenInput.setAttribute('value', token.id);
                form.appendChild(tokenInput);

                form.submit();
            }
        });
    </script>
    <script>
        $(document).on("click", ".popup-pkg1", function() {
        	@if(@!Auth::user())
	    		$('#register_modal').modal('show'); return;
	       	@endif
            $('#popup-pkg1').modal('show');
        });
        $(document).on("click", ".popup-pkg2", function() {
        	@if(@!Auth::user())
	    		$('#register_modal').modal('show'); return;
	       	@endif
            $('#popup-pkg2').modal('show');
        });
        $(document).on("click", ".popup-pkg3", function() {
        	@if(@!Auth::user())
	    		$('#register_modal').modal('show'); return;
	       	@endif
            $('#popup-pkg3').modal('show');
        });
        $(document).on("click", ".close-modal", function() {
            $('.modal').modal('hide');
        });
        $(document).on("click", "#show_beauty,#show_message,#show_hair", function() {
            $('#register_modal').modal('show');
        });

        function paymentModal(amount, tokens) {
        	@if(@!Auth::user())
	    		$('#register_modal').modal('show');return;
			@elseif(@Auth::user()->type != 'client')
				$('#userType_message').modal('show');return;
	       	@endif
            $('#payment_amount').val(amount);
            $('#payment_tokens').val(tokens);
            $('#payment_modal').modal('show');
        }
    </script>
    <script>

        @auth
        var user = '{{ auth()->user()->type }}';
        @else
            var user = '';
        @endauth

        function clientLink($btn) {
            if (user == 'client') {
                if ($btn == 'beauty') {
                    window.location.href = '{{ route('servicesBodywaxing') }}';
                } else if ($btn == 'massage') {
                    window.location.href = '{{ route('servicesMassage') }}';
                } else if ($btn == 'hairmakeup') {
                    window.location.href = '{{ route('servicesLadies') }}';
                }
            } else {
                toastr.error('Access Denied! Please Login as Client', 'Error', {
                    timeOut: 3000
                });
            }



        }
        // Check if the 'error' key is present in the session data
        @if (session('error'))
            // Display Toastr notification
            toastr.error("{{ session('error') }}");
        @endif
        @if (session('success'))
            // Display Toastr notification
            toastr.success("{{ session('success') }}");
        @endif
    </script>
@endpush
