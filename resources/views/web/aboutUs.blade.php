@extends('layouts.master.template_new.master')

@push('css')
    <style>
        @media (max-width: 330px) {
            #about .data {
                font-size: 2.2rem;
                margin-top: -251px !important;
                padding: 24px !important;
            }

            #about .video_block .txt1 {
                font-size: 1.8rem !important;
                text-align: left !important;
                padding-top: 14px !important;
                position: relative !important;
                bottom: 244px !important;
                left: 24px !important;
            }
        }

        @media (max-width: 600px) {

            #about img.main_bg,
            #candidates img.main_img,
            #business img.top_banner {
                object-fit: contain !important;
                min-height: unset !important;
            }

            #about .video_block {
                background-size: contain;
                background-position: top;
                background-repeat: no-repeat;
            }

            #about .video_block .txt {
                font-size: 1.8rem !important;
                text-align: left;
                padding-top: 14px;
                position: relative;
                bottom: 237px;
            }

            #about .video_block .txt button {
                width: 7rem !important;
                min-width: 3rem;
                height: 2.6rem;
                margin: 0.5rem auto 0;
            }

            #about .content {
                margin: 6rem auto 17rem auto !important;
            }

            /* .data.m-0 {
                    margin-top: -119px !important;
                  } */
            #about .use_links {
                font-size: 3rem;
                max-width: 80rem;
                margin: 11rem auto 3rem !important;
            }

            #about .video_block .txt1 button {
                width: 7rem !important;
                min-width: 3rem;
                height: 2.6rem;
                margin: 0.5rem 81px;
                background: transparent;
                border: 0;
            }

            #about .video_block .txt1 {
                font-size: 1.8rem !important;
                text-align: left;
                padding-top: 14px;
                position: relative;
                bottom: 244px;
                left: 46px;
            }

            #about .data {
                font-size: 2.2rem;
                margin-top: -270px;
                padding: 43px;
            }
        }
    </style>
@endpush

@section('content')
    <section id="about" style="width: 100%; overflow: hidden;">
        <!--     <img src="{{ asset('template_new/assets/images/about-us-page- banner.JPG') }}" alt="" class="main_bg"/> -->
        <img src="{{ asset('template_new/assets/images/about-us-banner.png') }}" alt="" class="main_bg" />
        <div class="contain">
            <div class="content" data-aos="fade-up" data-aos-duration="1000">
                <h3>
                    We are Styzeler <br />
                    We are recruiting for You
                </h3>
                <h2>What we do</h2>
                <div class="txt">
                    <div class="inr">
                        <p>
                            Our recruiting project is to link freelancers with the business
                            owner to use their knowledge and experience to benefit each
                            other to succeed, especially in those unprecedented times.
                        </p>
                        <p>
                            Should one of your employees quit, you won’t find yourself
                            hastily hiring a replacement from a desperate position. Doing so
                            causes owners to hire the wrong people, which can damage your
                            brand, and generate a ton of excess stress. Instead, you can
                            shift the clients onto a Styzeler's freelancer and take time to
                            find the best person for the job.
                        </p>
                    </div>
                    <div class="line_img">
                        <img src="{{ asset('template_new/assets/images/about_line.jpg') }}" alt="" />
                    </div>
                </div>
            </div>
            <div class="video_block d-none d-md-block">
                <img src="{{ asset('template_new/assets/images/styzeler_can.png') }}" style="height: 391px"
                    alt="" />
                <div class="txt" data-aos="fade-up" data-aos-duration="1000">
                    <p>
                        More companies are discovering the benefits<br />
                        of hiring freelancers, why not join <br />
                        the Styzeler membership
                    </p>
                    <p><u>UNITED TO SUCCEED</u></p>
                    <button type="button">
                        <img src="{{ asset('template_new/assets/images/hire_play_btn.jpg') }}" alt="" />
                    </button>
                </div>
            </div>
            <div class="video_block d-block d-md-none">
                <img src="{{ asset('template_new/assets/images/about_us.PNG') }}" style="height: 243px" alt="" />
                <div class="txt1" data-aos="fade-up" data-aos-duration="1000">
                    <p style="font-size: 14px !important">
                        More companies are<br />
                        discovering the benefits of hiring<br />
                        freelancers, why not join the<br />
                        Styzeler membership
                    </p>
                    <p style="text-align: center; padding-right: 140px">
                        <u>UNITED TO SUCCEED</u>
                    </p>
                    <button type="button">
                        <img src="{{ asset('template_new/assets/images/hire_play_btn.jpg') }}" alt="" />
                    </button>
                </div>
            </div>
            <div class="data" data-aos="fade-up" data-aos-duration="1000">
                <p class="m-0">United To Succeed</p>
                <p>
                    is a low-cost membership!!<br />
                    Styzeler Hair & Beauty, price tag services are so appealing. we
                    offer a range of top services from hiring freelancers chair rentals
                    either pay-as-you-go or contracted deals, <br />
                    And many more services that could benefit any business
                </p>
                <p>
                    Check our <u>On Hold booking</u> great feature which allows the
                    business owner to monitor the flow of the booking before confirming
                    the freelancer's booking
                </p>
            </div>
            <div class="use_links" data-aos="fade-up" data-aos-duration="1000">
                <h4>Styzeler useful links</h4>
                <div class="inr">
                    <img src="{{ asset('template_new/assets/images/about_logo.jpg') }}" alt="" />
                    <div class="links_item">
                        <div class="item"
                            style="background-image: url('{{ asset('assets/images/about_link_purple.jpg') }}')"></div>
                        <div class="item"
                            style="background-image: url('{{ asset('template_new/assets/images/about_link_gray.jpg') }}')">
                        </div>
                        <div class="item"
                            style="background-image: url('{{ asset('template_new/assets/images/about_link_yellow.jpg') }}')">
                        </div>
                        <div class="item"
                            style="background-image: url('{{ asset('template_new/assets/images/about_link_blue.jpg') }}')">
                        </div>
                        <div class="item"
                            style="background-image: url('{{ asset('template_new/assets/images/about_link_red.jpg') }}')">
                        </div>
                        <div class="item"
                            style="background-image: url('{{ asset('template_new/assets/images/about_link_gold.jpg') }}')">
                        </div>
                        <div class="item"
                            style="background-image: url('{{ asset('template_new/assets/images/about_link_green.jpg') }}')">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about -->
@endsection

@push('script')
@endpush
