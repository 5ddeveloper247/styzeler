@extends('layouts.master.template_new.master')
@push('css')
    <style>
        #categ-0 .col-4 h2,
        #categ-0 .col-3 h2 {
            margin: 6rem 0 0 0;
            font-size: 3rem;
            font-weight: bold;
        }

        #categ-0 .col-4 p,
        #categ-0 .col-3 p {
            color: #cecfaa;
            font-size: 2.2rem;
            line-height: 1.4;
            margin-bottom: 36px;
            padding-right: 18px;
        }

        .btn-read-more {
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            height: 2rem;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            background: #73afdf;
            color: #fff;
            font-size: 1rem;
            font-family: "Poppins", sans-serif;
            font-weight: 600;
            padding: 1rem;
            border-radius: 2.2rem;
            overflow: hidden;
            white-space: nowrap;
            border: 0;
            cursor: pointer;
            -webkit-box-shadow: 0.5rem 0.5rem 2.5rem rgba(0, 0, 0, 0.08);
            box-shadow: 0.5rem 0.5rem 2.5rem rgba(0, 0, 0, 0.08);
            -webkit-transition: all ease 0.5s;
            transition: all ease 0.5s;
            position: relative;
            bottom: 3px;
        }

        .btn-read-more:hover {
            border: 0.2rem solid #926847;
            color: #cecfaa;
            background: transparent
        }

        #overlay {
            position: fixed;
            /* Sit on top of the page content */
            display: none;
            /* Hidden by default */
            width: 100%;
            /* Full width (cover the whole page) */
            height: 100%;
            /* Full height (cover the whole page) */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            /* Black background with opacity */
            z-index: 2;
            /* Specify a stack order in case you're using a different order for other elements */
            cursor: pointer;
            /* Add a pointer on hover */
        }

        .shadow_btn {
            min-width: 32rem;
        }

        .site_btn {
            border: 0.2rem solid #000000;
        }

        #browse .txt {
            font-size: 2rem;
            max-width: 60rem;
            margin-top: 6rem;
        }

        #startup .image_blk .txt p {
            font-size: 4rem;
            margin: 0 150px 25rem;
            color: #c4b9b0;
            text-align: center;
            max-width: 46rem;
        }

        #hire .content a {
            display: block;
            max-width: 16rem;
            background: transparent;
            padding: 0;
            border: 0;
            margin: 0 auto;
        }

        .img-box {
            position: relative;
            margin: 2rem 0 0;
            border: 3px solid black;
        }

        .img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .img-box::after {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.37);
            opacity: 0;
            transition-property: opacity;
            transition-duration: 200ms;
        }

        .img-box:hover::after {
            opacity: 1;
        }

        .cta a {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /* border: 2px solid black; */
            /* border-radius: 5em; */
            /* background-color: rgb(255, 201, 154); */
            padding: 0.75rem;
            text-decoration: none;
            text-transform: uppercase;
            font-family: sans-serif;
            font-weight: bold;
            /* color: black; */
            opacity: 0;
            transition-property: all;
            transition-duration: 500ms;
            z-index: 2;
        }

        .img-box:hover .cta a {
            opacity: 1;
            left: 45%;
        }

        .cta a:hover {
            transform: translate(-50%, -50%) scale(1.1);
        }

        .cta1 a {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /* border: 2px solid black; */
            /* border-radius: 5em; */
            /* background-color: rgb(255, 201, 154); */
            padding: 0.75rem;
            text-decoration: none;
            text-transform: uppercase;
            font-family: sans-serif;
            font-weight: bold;
            /* color: black; */
            opacity: 0;
            transition-property: all;
            transition-duration: 500ms;
            z-index: 2;
        }

        .img-box:hover .cta1 a {
            opacity: 1;
            left: 13%;
        }

        .cta1 a:hover {
            transform: translate(-50%, -50%) scale(1.1);
        }

        .cta2 a {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /* border: 2px solid black; */
            /* border-radius: 5em; */
            /* background-color: rgb(255, 201, 154); */
            padding: 0.75rem;
            text-decoration: none;
            text-transform: uppercase;
            font-family: sans-serif;
            font-weight: bold;
            /* color: black; */
            opacity: 0;
            transition-property: all;
            transition-duration: 500ms;
            z-index: 2;
        }

        .img-box:hover .cta2 a {
            opacity: 1;
            left: 82%;
        }

        .cta2 a:hover {
            transform: translate(-50%, -50%) scale(1.1);
        }

        @media only screen and (max-width: 600px) {
            #membership p {
                color: #cecfaa;
                font-size: 1.9rem;
                line-height: 1.4;
            }

            #membership .strip {
                font-size: 1.4rem;
            }

            #membership img {
                margin-bottom: 0rem;
            }

            #hiree {
                background-size: contain !important;
                /* background-position: top center; */
                background-repeat: no-repeat;
            }

            #hiree .content_mobile button {
                max-width: 18rem;
                margin-right: 109px;
            }

            #hiree .content_mobile h1 {
                font-size: 44px !important;
                padding-right: 21px;
                padding-top: 17px;
            }

            #hiree .content_mobile h2 {
                /* display: block !important; */
                font-size: 27px !important;
                padding-left: 0rem !important;
            }

            #hiree .content_mobile {
                text-align: center;
                padding: 9rem 0px 3rem;
            }

            #startup .image_blk .txt #home_section_logo {
                width: 83px;
                height: 95px;
                position: relative;
                /* top: auto; */
                bottom: 120px;
                right: -22px;
                text-align: center;
            }

            .img-set-hire {
                position: relative;
                bottom: 48px;
                left: 120px;
            }

            #categ .inner p {
                color: #cecfaa;
                font-size: 1.9rem;
            }

            #categ .inner h4 {
                font-size: 2rem;
                font-weight: 500;
                color: #cecfaa;
            }

            #categ .btm {
                display: block;
                text-align: left;
            }

            #startup .image_blk .txt p {
                font-size: 2.4rem !important;
                margin: 0 0 4rem;
                color: #fff;
                text-align: left;
                max-width: 46rem;
                text-align: center;
                margin-top: -72px;
            }

            #startup .image_blk {
                margin-bottom: 1rem;
            }

            #browse .line {
                padding: 2rem 0 2rem 1rem;
                font-size: 1.9rem !important;
            }
        }
    </style>
    <script>
        var scrollPosition = window.scrollY;

        // Restore the scroll position when the page is reloaded
    </script>
@endpush
@section('content')
    <!-- header -->
    <section class="d-none d-md-block" id="banner"
        style="background-image: url('{{ asset('template_new/assets/images/banner.jpg') }}')">
        <div class="contain" data-aos="fade-up" data-aos-duration="1000">
            <div class="content">
                <h1>
                    Styzeler <small>Agency</small>
                </h1>
                <h2>Hair & Beauty</h2>
                <div class="logo mylogodiv">
                    <a href="{{ url('/') }}"> <img src="{{ asset('template_new/assets/images/logo.png') }}"
                            alt="" />
                    </a>
                </div>
                <!-- 				<p>To continue browsing the pages <br> please chose a category</p> -->
            </div>
        </div>
    </section>
    <section class="d-lg-none d-md-none">
        <img src="{{ asset('template_new/assets/images/new_home_1.jpg') }}" alt="" />
    </section>
    <!-- banner -->
    <section id="browse">
        <div class="contain" data-aos="fade-up" data-aos-duration="1000">
            <div class="dots">
                <span>..............</span> <span>..............</span> <span>..............</span>
            </div>
            <ul class="btn_list">
                <li><a href="{{ route('home_service') }}" class="shadow_btn"
                        style="font-size: 1.7rem; padding: 0 1rem; justify-content: space-between;">Home
                        Services <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="" />
                    </a></li>
                <li><a href="{{ route('businessOwner') }}" class="shadow_btn"
                        style="font-size: 1.7rem; padding: 0 1rem; justify-content: space-between;">Business
                        Owner <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="" />
                    </a></li>
                <li><a href="{{ route('candidate') }}" class="shadow_btn"
                        style="font-size: 1.7rem; padding: 0 1rem; justify-content: space-between;">Freelancer
                        / job seeker <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="" />
                    </a></li>
            </ul>
            <h2 class="h2_01">
                Specialist in Hair & Beauty Recruitmen, London & Uk <br /> Permanent
                & Temporary position
            </h2>
            <div class="line none-modal"
                style="background-image: url('{{ asset('template_new/assets/images/browse_bg.jpg') }}'">
                <p style="margin: 10px 0px 11px 13px">Styzeler a leading Hair &
                    Beauty digital agency providing expert freelancers for temporary
                    work or permanent employment for Hair Beauty & Spa businesses</p>
                <p style="margin: 10px 0px 11px 13px">Besides offering our clients a
                    bespoke service, we make sure that all our candidate enjoy an
                    excellent working environment</p>
                <h3 style="margin: 10px 0px 11px 13px">Small businesses rely on
                    freelancers</h3>
                <p style="margin: 10px 0px 11px 13px">A Business Owner can hire a
                    Freelancer for an unlimited or designated short period, ensuring the
                    job is completed while searching for the perfect candidate or offer
                    a full-time position to a Freelancer who suits the business
                    philosophy. Hiring a Freelancer can also be a great solution to take
                    away the pressure of fixed-wage and allows the freedom of booking,</p>
            </div>
            <img src="{{ asset('template_new/assets/images/line_gray.jpg') }}" alt="" class="browse_line_gray" />
            <div class="d-block d-md-none">
                <div class="reg_line">
                    <span style="font-size: 3rem; color: #c4b9b0">Freelancers Help Small
                        Businesses Grow</span>
                    <p>By working full-time for a long time often employees run out of
                        new ideas. On the other hand, freelancers can bring a new
                        perspective to the team. They work with different clients across
                        different projects. Hence, they can effectively brainstorm
                        creativity and motivate full-time employees</p>
                </div>
                <a href="{{ route('register') }}" class="site_btn" style="border: #000000">Register <img
                        src="{{ asset('template_new/assets/images/eye.svg') }}" alt="" /></a>
                <img src="{{ asset('template_new/assets/images/line_yellow.jpg') }}" alt=""
                    class="browse_line_yellow" style="margin-top: 32px; margin-bottom: 20px" />
            </div>

            <!-- for desktop -->
            <div class="reg_line d-none d-md-block">
                <div class="d-flex justify-content-between">
                    <p>Freelancers Help Small Businesses Grow</p>
                    <a href="{{ route('register') }}" class="site_btn" style="border: #000000">Register <img
                            src="{{ asset('template_new/assets/images/eye.svg') }}" alt="" /></a>
                </div>
                <img src="{{ asset('template_new/assets/images/line_yellow.jpg') }}" alt=""
                    class="browse_line_yellow" style="margin-top: 32px" /> <span
                    style="color: #fff; font-size: 20px; display: block; width: 50%; margin-top: 15px;">
                    By working full-time for a long time often employees run out of new
                    ideas. On the other hand, freelancers can bring a new perspective to
                    the team. They work with different clients across different
                    projects. Hence, they can effectively brainstorm creativity and
                    motivate full-time employees </span>
            </div>

            <div class="txt">
                <h3>Specialist in Hair & Beauty Hire London Uk</h3>
                <p class="">Before onboarding a freelancer, you can look at their
                    work portfolio, check product knowledge and skillset and interview
                    them to ensure they are the right fit for your project</p>
            </div>
        </div>
    </section>
    <!-- browse -->
    <section class="d-none d-md-block" id="hire"
        style="background-image: url('{{ asset('template_new/assets/images/hire.jpg ') }}'">
        <div class="contain" data-aos="fade-up" data-aos-duration="1000">
            <div class="content">
                <h2>
                    <span>Get Styzeler <br /> membership !!
                    </span>
                </h2>
                <h1>To Hire</h1>

                <a type="button" href="{{ route('businessOwner') . '#inr' }}"> <!-- packages2.html -->
                    <img src="{{ asset('template_new/assets/images/hire_play_btn.jpg') }}" alt="" />
                </a>
            </div>
        </div>
    </section>
    <section class="d-lg-none d-md-none mt-4" id="hiree"
        style="background-image: url('{{ asset('template_new/assets/images/recompre-min.JPG') }}'; margin-top: 45px !important;">
        <div class="contain" data-aos="fade-up" data-aos-duration="1000">
            <div class="content_mobile">
                <h2>
                    <span>Get Styzeler <br /> membership !!
                    </span>
                </h2>
                <h1>To Hire</h1>
                <button type="button" style="display: flex; justify-content: center; align-items: center">
                    <img src="{{ asset('template_new/assets/images/hire_play_btn.jpg') }}" class="float-end w-50"
                        alt="" />
                </button>
            </div>
        </div>
    </section>
    <!-- hire -->
    <section id="categ">
        {{-- <div class="img-box d-none d-md-block">
            <img src="{{ asset('template_new/assets/images/categ_bg_main.jpg') }}" alt="" />
            <div class="cta">
                <a class="site_btn" href="{{ route('hairstylist') }}">Read More</a>
                <!-- https://beta.styzeler.co.uk/hairstylist.html -->
            </div>
            <div class="cta1">
                <a class="site_btn" href="{{ route('barber') }}">Read More</a>
                <!-- https://beta.styzeler.co.uk/barber.html -->
            </div>
            <div class="cta2">
                <a class="site_btn" href="{{ route('beautician') }}">Read More</a>
                <!-- https://beta.styzeler.co.uk/beautician.html -->
            </div>
        </div> --}}

        <div class="contain" data-aos="fade-up" data-aos-duration="1000">
            <!-- <div class="flexRow">                                                                                                                                                           </div>
                                                                                                                                                                                           </div> -->
            <div class="flexRow" style="padding: 0px 38px">
                <div class="col">
                    <div class="inner"
                        style="background-image: url('{{ asset('template_new/assets/images/categ_bg_block.jpg') }}'">
                        <h4>Hairdressers</h4>
                        <div class="image">
                            <img src="{{ asset('template_new/assets/images/categ_photo_02.jpg') }}" alt="" />
                        </div>
                        <div class="txt">
                            <p>freelancers focus on getting a good review and expanding their
                                portfolio, they strive to maintain industry-standard quality
                                aligned with your expectations</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="inner"
                        style="background-image: url('{{ asset('template_new/assets/images/categ_bg_block.jpg') }}')">
                        <h4>Beauticians</h4>
                        <div class="image">
                            <img src="{{ asset('template_new/assets/images/categ_photo_03.jpg') }}" alt="" />
                        </div>
                        <div class="txt">
                            <p>Spending hours freelancing across various roles you can learn
                                new skills and enrich your CV</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="inner"
                        style="background-image: url('{{ asset('template_new/assets/images/categ_bg_block.jpg') }}')">
                        <h4>Male grooming</h4>
                        <div class="image">
                            <img src="{{ asset('template_new/assets/images/categ_photo_01.jpg') }}" alt="" />
                        </div>
                        <div class="txt">
                            <p>Styzeler is the leading male grooming agency across London & UK
                                we offer master barbers to craft art for our clients</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btm" style="margin-right: 6px">
                <img src="{{ asset('template_new/assets/images/line_purple.jpg') }}" alt="" /> <a
                    href="{{ route('registration') }}" class="site_btn">Register
                    <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="" />
                </a>
            </div>
        </div>
    </section>
    <section id="categ-0" class="mt-5 d-none d-md-block">
        <div class="contain px-4" data-aos="fade-up" data-aos-duration="1000"
            style="background-image: url('{{ asset('template_new/assets/images/sec_bg_1.png') }}');background-size:100% 100%">
            <div class="row">
                <div class="col-4">
                    <h2>Male Grooming</h2>
                    <img class="mt-3" src="{{ asset('template_new/assets/images/categ_photo_01.jpg') }}"
                        alt="" width="100" height="200" style="width: 300px;object-fit: cover;">
                    <p class="mt-2">Styzeler is the leading male grooming agency across London & UK we offer master
                        barbers to craft art for our clients
                        <a class="link-light btn-read-more btn-sm" href="{{ route('barber') }}">Read more</a>
                    </p>
                </div>
                {{-- <div class="col-1"></div> --}}
                <div class="col-4">
                    <h2>Hairdressers</h2>
                    <img class="mt-3" src="{{ asset('template_new/assets/images/categ_photo_02.jpg') }}"
                        alt="" width="100" height="200" style="width: 300px;object-fit: cover;">
                    <p class="mt-2">Freelancers focus on getting a good review and expanding their portfolio, they strive
                        to maintain industry- standard quality aligned with your expectations
                        <a class="link-light btn-read-more btn-sm" href="{{ route('hairstylist') }}">Read more</a>
                    </p>
                </div>
                <div class="col-4">
                    <h2>Beauticians</h2>
                    <img class="mt-3" src="{{ asset('template_new/assets/images/categ_photo_03.jpg') }}"
                        alt="" width="100" height="200" style="width: 300px;object-fit: cover;">
                    <p class="mt-2">Spending hours freelancing across various roles you can learn new skills and enrich
                        your CV
                        <a class="link-light btn-read-more btn-sm" href="{{ route('beautician') }}">Read more</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- categ -->
    <section id="startup">
        <div class="contain" data-aos="fade-up" data-aos-duration="1000">
            <div class="image_blk">
                <img src="{{ asset('template_new/assets/images/startup_image_00.jpg') }}" alt=""
                    class="desktop" /> <img src="{{ asset('template_new/assets/images/styzeler home-freedom.JPG') }}"
                    alt="" class="mobile" />
                <div class="txt">
                    <img class="d-block d-md-none" id="home_section_logo" width="40" height="40"
                        src="{{ asset('template_new/assets/images/home_next_logo.jpg') }}" alt="" />
                    <div>
                        <p>Freelancers are great help for Start up Businesses</p>
                    </div>
                    <img src="{{ asset('template_new/assets/images/line_gray.jpg') }}" alt="" />
                </div>
            </div>
            <div class="data">
                <p>For Start-up businesses it is unpredictable to quantify the volume
                    of work in the early days, you don't want to miss on that walk-in
                    Costumer, Hiring freelancers for help in the early days allows the
                    business owner to grow the business organically, allowing the
                    freedom of booking. and ease up the pressure of fixed wages.</p>
                <p>
                    <a href="?"> <u>Can offer a full-time position to any freelancer
                            that suits the company policy</u>
                    </a>
                </p>
            </div>
        </div>
        <img src="{{ asset('template_new/assets/images/STYZELER-homepage-3.JPG') }}" alt="" class="img-fluid" />
    </section>
    <!-- startup -->
    <section class="d-none d-md-block" id="membership">
        <div class="contain" data-aos="fade-up" data-aos-duration="1000">
            <div class="flexRow">
                <div class="col-12">
                    <div class="data">
                        <h2>
                            Styzeler membership <br /> buy it now !!
                        </h2>
                    </div>
                </div>
                <div class="col col1">
                    <img src="{{ asset('template_new/assets/images/membership_01.jpg') }}" alt=""
                        class="img1" />
                    <p>There are many reasons companies are turning to freelancers
                        rather than hiring full-time staff.</p>
                    <p>Freelancers are increasingly seen as highly skilled professionals
                        with valuable abilities that can take any business forward</p>
                </div>
                <div class="col col2" style="text-align: center">

                    <a href="{{ route('businessOwner') . '#to_hire' }}" type="button"
                        style="background: transparent; border: 0; margin-top: 134px"> <img
                            src="{{ asset('template_new/assets/images/hire_play_btn.jpg') }}" alt="" />
                    </a>
                </div>
                <div class="col col3">
                    <img src="{{ asset('template_new/assets/images/membership_02.jpg') }}" alt=""
                        class="img2" />
                    <p>Freelancers create an opportunity to expand the diversity of your
                        company. Diversity helps increase the flow of ideas and often leads
                        to better business solutions.</p>
                </div>
            </div>
            <div class="strip">
                <span class="title">Styzeler Agency</span> <span>The winning formula
                    for both</span> <span>Businesses Owner & Freelancer</span>
            </div>
        </div>
    </section>
    <section class="d-block d-lg-none d-md-none" id="membership">
        <div class="contain">
            <div class="row">
                <div class="col-md-12">
                    <div class="data mt-2 text-center">
                        <h2>
                            Styzeler membership <br /> buy it now !!
                        </h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <p>There are many reasons companies are turning to freelancers
                        rather than hiring full-time staff.Freelancers are increasingly
                        seen as highly skilled professionals with valuable abilities that
                        can take any business forward.</p>
                </div>
                <div class="col-md-12 mt-5">
                    <img src="{{ asset('template_new/assets/images/homepage-2.png') }}" alt="" />
                    <button type="button" class="img-set-hire"
                        style="max-width: 15rem; background: transparent;
	/* padding: 0; */ border: 0; margin: 0 auto;">
                        <img width="40" height="40"
                            src="{{ asset('template_new/assets/images/hire_play_btn.jpg') }}" alt="" />
                    </button>
                </div>
                <div class="col-md-12">
                    <p>Freelancers create an opportunity to expand the diversity of your
                        company. Diversity helps increase the flow of ideas and often leads
                        to better business solutions.</p>
                </div>
                <div class="col-md-12">
                    <div class="strip">
                        <span class="title">Styzeler Agency</span> <span>The winning
                            formula for both</span> <span>Businesses Owner & Freelancer</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- <img src="assets/images/126-minr.jpg" alt="">
                                                                                                                                                                                                                                                                                             </div> -->
    </section>
    <!-- membership -->
    <section id="get_job">
        <div class="contain" data-aos="fade-up" data-aos-duration="1000">
            <div class="image">
                <img src="{{ asset('template_new/assets/images/get_job.jpg') }}" alt="" />
                <div class="txt">
                    <p>Through freelancing , people who wouldn’t normally get the job
                    </p>
                    <h2>get the job</h2>
                </div>
            </div>
        </div>
        <!-- <div class="modal fade bd-example-modal-md" id="popupInfo-modal" role="dialog">                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div> -->
        <div class="modal fade bd-example-modal-md" id="popupInfo-modal" role="dialog">
            <div class="modal-dialog modal-md" style="width: 350px">
                <div class="modal-content border-warning border"
                    style="background-color: black; color: white; max-height: 1000px; overflow-y: auto; margin-top: 30%; margin-left: 10%;">
                    <div class="modal-header" style="border-bottom: 5px solid #766d48">
                        <h4 class="modal-title fs-1">Alert</h4>
                        <i class="close-modal" style="font-size: 2rem; cursor: pointer"><b>&times;</b></i>
                    </div>
                    <div class="modal-body my-5">
                        <p class="fs-2">To continue browsing the pages, please choose a
                            category</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- get_job -->
    @endsection @push('script')
    <script src="{{ asset('template_new/assets/js/animation.min.js') }}"></script>
    <script>
    function setLocalStorageWithExpiration(key, value, expirationInHours) {
        const now = new Date();
        const item = {
            value: value,
            expiration: now.getTime() + expirationInHours * 60 * 60 * 1000 // Convert hours to milliseconds
        };
        localStorage.setItem(key, JSON.stringify(item));
    }

    // Get data from localStorage and check expiration
    function getLocalStorageWithExpiration(key) {
        const itemStr = localStorage.getItem(key);
        if (!itemStr) {
            return null;
        }
        const item = JSON.parse(itemStr);
        const now = new Date();
        if (now.getTime() > item.expiration) {
            localStorage.removeItem(key); // Remove the item from localStorage if it's expired
            return null;
        }
        return item.value;
    }
    </script>
    <script>
        $(document).ready(function() {
        	
        	localStorage.removeItem('bookType');

            window.scrollTo(0, scrollPosition);

            setTimeout(function() {
                flag = "0";
                $("html").css({
                    "overflow": "auto"
                });
            }, 1500);
        });


        $(function() {
        	const retrievedData = getLocalStorageWithExpiration("flag");
            if(retrievedData != 'true'){
            	$("#popupInfo-modal").modal("show");
            }
            
        });


        function isScrolledToClass(className) {
            var scrollPosition =
                window.pageYOffset || document.documentElement.scrollTop;
            var elements = document.getElementsByClassName(className);

            for (var i = 0; i < elements.length; i++) {
                var elementOffset = elements[i].offsetTop;

                if (scrollPosition >= elementOffset) {
                    return true;
                }
            }

            return false;
        }

        // Usage
        var targetClass = "none-modal";
        var flag = "0";

        window.addEventListener("scroll", function() {

            if (isScrolledToClass(targetClass)) {

                if (flag == "0") {

                    if ($("#popupInfo-modal").is(":visible")) {
                        //                         $("#popupInfo-modal").modal("hide");
                        flag = "1";
                        const retrievedData = getLocalStorageWithExpiration("flag");
                        if(retrievedData != 'true'){
                        	$("html").css({
                                "overflow": "hidden"
                            });
                     	}
                        
                    }
                }
            }
            // if (isScrolledToClass(targetClass))
        });
        $(document).on("click", ".close-modal, body", function() {
        	const dataToStore = "true";
            setLocalStorageWithExpiration("flag", 'true', 12);
            $("html").css({
                "overflow": "auto"
            });
            $(".modal").modal("hide");
        });
    </script>
    
    
@endpush
