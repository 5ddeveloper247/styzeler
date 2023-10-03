@extends('layouts.master.template_new.master')

@push('css')
    <style>
        .site_btn {
            border: 0.2rem solid #000000;
        }

        #business .token h3 {
            text-align: center;
            font-size: 4rem;
            margin: 6rem 0 6rem;
        }

        .item .in h4>a {
            color: #926847;
        }

        @media only screen and (max-width: 600px) {
            #business img.top_banner {
                min-height: unset;
                object-fit: contain !important;
            }

            #business .data_01 {
                background-size: 100% 100%;
                background-position: center;
                background-repeat: no-repeat;
                padding: 4rem 3rem;
                font-size: 2rem;
                max-width: 120rem;
                margin-top: 3rem;
                margin-bottom: 3rem;
            }

            #business .to_hire h3 {
                font-size: 3.8rem !important;
            }

            #business .to_hire h5 {
                font-size: 3rem !important;
                font-weight: 700;
                margin-top: 1rem;
            }

            #business .mid_banner {
                margin: 13rem 0 0 !important;
            }

            #business .to_hire h1>span {
                top: 3px;
                position: relative;
                color: #649f68;
                font-weight: 700;
            }

            #business .to_hire h1>span::before {
                content: "";
                position: absolute;
                top: 17px;
                bottom: 1rem;
                left: 0;
                right: 16%;
                background: var(--dark);
                margin: auto;
                height: 0.3rem;
            }

            #business .token img.mobile {
                display: block;
                margin-top: 63px;
            }

        }
    </style>
@endpush

@section('content')
    <section id="business">
        <img src="{{ asset('template_new/assets/images/styzeler-business-owner-banner.JPG') }}" alt=""
            class="top_banner" />
        <div class="contain">
            <div class="text_wrap_blk" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="h2_01">Styzeler ''United to succeed'' Membership</h2>
                <div class="data_01"
                    style="background-image: url('{{ asset('template_new/assets/images/business_bg_01.jpg') }}')">
                    <p>
                        Introducing a Membership package, to your business ensure that
                        efficiency & productivity remain at a high standard the whole
                        time.
                        <br />
                        Styzeler Hair & Beauty Agency has tailored made three attractive
                        Membership packages to suit any requirement and needs based on the
                        type of business, to help businesses owner grow the company with
                        the help of freelancers
                    </p>
                </div>
                <div class="data_02"
                    style="background-image: url('{{ asset('template_new/assets/images/business_bg_02.jpg') }}')">
                    <p>
                        Styzeler Hair & Beauty agency offers highly skilled freelancers to
                        independent <br />
                        Hair and Beauty / Spa businesses, freelancers who have the skills
                        to understand the value and philosophy of the independent company
                        and are trusted to take any business forward as well as respond
                        rapidly
                        <br />
                        with the UNITED TO SUCCEED membership, Business Oner can offer a
                        full-time position to a freelancer that suits the company
                        philosophy
                    </p>
                </div>
            </div>
            <div class="content" data-aos="fade-up" data-aos-duration="1000">
                <img src="{{ asset('template_new/assets/images/line_yellow_vr.jpg') }}" alt="" />
                <div class="inr" id="inr">
                    <h3>
                        UNITED TO SUCCEED <br />
                        PACKAGES DEALS & OFFERS !!
                    </h3>
                    <div class="item">
                        <img src="{{ asset('template_new/assets/images/logo.png') }}" alt="" />
                        <div class="in">
                            <h4><a href="{{ route('packagesDescription') }}">Freelancer</a></h4>
                            <p>for temporary work or full/part-time position</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{ asset('template_new/assets/images/logo.png') }}" alt="" />
                        <div class="in">
                            <h4><a href="{{ route('packagesDescription') }}">Rent & let:</a></h4>
                            <p>Chair rental, maximise on an empty chair</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{ asset('template_new/assets/images/logo.png') }}" alt="" />
                        <div class="in">
                            <h4><a href="{{ route('packagesDescription') }}">Job posting:</a></h4>
                            <p>Invite candidate to apply for a vacancy</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{ asset('template_new/assets/images/logo.png') }}" alt="" />
                        <div class="in">
                            <h4><a href="{{ route('packagesDescription') }}">Wedding Stylistes</a></h4>
                            <p>Take advantage and upgrade your services</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{ asset('template_new/assets/images/logo.png') }}" alt="" />
                        <div class="in">
                            <h4><a href="{{ route('packagesDescription') }}">Events</a></h4>
                            <p>Festivals, photo shooting, presentations Job posting:</p>
                        </div>
                    </div>
                </div>
                <div class="btn_blk">
                    <a href="registration.html" class="site_btn">Register <img
                            src="{{ asset('template_new/assets/images/eye.svg') }}" alt="" /></a>
                </div>
            </div>
        </div>
        <img src="{{ asset('template_new/assets/images/business_owner_main2.jpg') }}" alt="" class="mid_banner" />
        <div class="contain" data-aos="fade-up" data-aos-duration="1000">
            <div class="to_hire" id="to_hire">
                <span style="font-size: 22px; font-weight: 700">Buy</span>
                <h5>Styzeler</h5>
                <h3>Membership</h3>
                <h1>
                    <span>TO HIRE!!</span>
                </h1>
            </div>
        </div>
        <section id="packages">
            <div class="contain" data-aos="fade-up" data-aos-duration="1000">
                <div class="row flex_row">
                    <div class="col-lg-4">
                        <div class="package_blk">
                            <div class="sm">Styzeler Hair and Beauty Recruiting Agency <br> Styzeler Hair and Beauty
                                <br> Recrutining
                                Freelancers All level
                            </div>
                            <h2>Styzeler The-one-off <span>&nbsp;</span></h2>
                            <div class="inner">
                                <div class="txt">
                                    <div class="token"><span>1</span> Tokens</div>
                                    <div class="save">&nbsp;</div>
                                    <div class="price">£40</div>
                                </div>
                                <div class="listing">
                                    <ul>
                                        <li>
                                            <div class="box"><img
                                                    src="{{ asset('template_new/assets/images/tick.svg') }}"
                                                    alt=""></div>
                                            <span>Candidates</span>
                                        </li>
                                        <li>
                                            <div class="box"></div>
                                            <span>Let & Rent chairs</span>
                                        </li>
                                        <li>
                                            <div class="box"></div>
                                            <span>Job posting</span>
                                        </li>
                                        <li>
                                            <div class="box"></div>
                                            <span>Wedding Stylist</span>
                                        </li>
                                        <li>
                                            <div class="box"><img
                                                    src="{{ asset('template_new/assets/images/tick.svg') }}"
                                                    alt=""></div>
                                            <span>Events</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="btn_blk">
                                    <a href="booking.html" class="site_btn">Buy</a>
                                    <a href="javascript:void(0)" class="eye_btn popup-pkg1"><img
                                            src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="package_blk">
                            <div class="sm">Styzeler Hair and Beauty Recruiting Agency <br> Styzeler Hair and Beauty
                                <br> Recrutining
                                Freelancers All level
                            </div>
                            <h2>Dedicated to Helping <span>Most Popular</span></h2>
                            <div class="inner">
                                <div class="txt">
                                    <div class="token"><span>8</span> Tokens</div>
                                    <div class="save">Save 24 %</div>
                                    <div class="price">£244</div>
                                </div>
                                <div class="listing">
                                    <ul>
                                        <li>
                                            <div class="box"><img
                                                    src="{{ asset('template_new/assets/images/tick.svg') }}"
                                                    alt=""></div>
                                            <span>Candidates</span>
                                        </li>
                                        <li>
                                            <div class="box"><img
                                                    src="{{ asset('template_new/assets/images/tick.svg') }}"
                                                    alt=""></div>
                                            <span>Let & Rent chairs</span>
                                        </li>
                                        <li>
                                            <div class="box"></div>
                                            <span>Job posting</span>
                                        </li>
                                        <li>
                                            <div class="box"></div>
                                            <span>Wedding Stylist</span>
                                        </li>
                                        <li>
                                            <div class="box"><img
                                                    src="{{ asset('template_new/assets/images/tick.svg') }}"
                                                    alt=""></div>
                                            <span>Events</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="btn_blk">
                                    <a href="booking.html" class="site_btn">Buy</a>
                                    <a href="javascript:void(0)" class="eye_btn popup-pkg2"><img
                                            src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="package_blk">
                            <div class="sm">Styzeler Hair and Beauty Recruiting Agency <br> Styzeler Hair and Beauty
                                <br> Recrutining
                                Freelancers All level
                            </div>
                            <h2>United to Succseed <span>Best Value</span></h2>
                            <div class="inner">
                                <div class="txt">
                                    <div class="token"><span>12</span> Tokens</div>
                                    <div class="save">Save 32 %</div>
                                    <div class="price">£436</div>
                                </div>
                                <div class="listing">
                                    <ul>
                                        <li>
                                            <div class="box"><img
                                                    src="{{ asset('template_new/assets/images/tick.svg') }}"
                                                    alt=""></div>
                                            <span>Candidates</span>
                                        </li>
                                        <li>
                                            <div class="box"><img
                                                    src="{{ asset('template_new/assets/images/tick.svg') }}"
                                                    alt=""></div>
                                            <span>Let & Rent chairs</span>
                                        </li>
                                        <li>
                                            <div class="box"><img
                                                    src="{{ asset('template_new/assets/images/tick.svg') }}"
                                                    alt=""></div>
                                            <span>Job posting</span>
                                        </li>
                                        <li>
                                            <div class="box"><img
                                                    src="{{ asset('template_new/assets/images/tick.svg') }}"
                                                    alt=""></div>
                                            <span>Wedding Stylist</span>
                                        </li>
                                        <li>
                                            <div class="box"><img
                                                    src="{{ asset('template_new/assets/images/tick.svg') }}"
                                                    alt=""></div>
                                            <span>Events</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="btn_blk">
                                    <a href="booking.html" class="site_btn">Buy</a>
                                    <a href="javascript:void(0)" class="eye_btn popup-pkg3"><img
                                            src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="token"
            style="background-image: url('{{ asset('template_new/assets/images/business_owner_main3.jpg') }}')">
            <div class="contain" data-aos="fade-up" data-aos-duration="1000">
                <!-- <div class="btn_blk">
                    <a href="registration.html" class="site_btn"
                      >Register <img src="assets/images/eye.svg" alt=""
                    /></a>
                  </div> -->
                <div class="text">
                    <h3>One-token-One-service</h3>
                    <p>
                        Tokens allow BUSINESS OWNER to book any <br />
                        freelancers either for temporary work or for a full-time position
                        <br />
                        Tokens can be utilised also for chair rental or job offers. With
                        Styzeler ‘’ UNITED TO SUCCEED’’ membership you choose from
                        different packages based on the size of your organization and
                        needs, tokens haven't got an expiring date they can be used
                        whenever it is needed
                    </p>
                </div>
            </div>
            <img src="assets/images/new-1.JPG" alt="" class="mobile" />
        </div>
        <div class="contain" data-aos="fade-up" data-aos-duration="1000">
            <div class="btm_block">
                <ul class="btn_list">
                    <li>
                        <a href="?" class="shadow_btn"
                            style="
                  font-size: 1.7rem;
                  padding: 0 1rem;
                  justify-content: space-between;
                ">Hairdressing
                            / Babers <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="" /></a>
                    </li>
                    <li>
                        <a href="?" class="shadow_btn"
                            style="
                  font-size: 1.7rem;
                  padding: 0 1rem;
                  justify-content: space-between;
                ">Beauty
                            / Spa <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="" /></a>
                    </li>
                </ul>
                <img src="{{ asset('assets/images/business_lines.jpg') }}" alt="" />
            </div>
        </div>
        <div class="modal fade bd-example-modal-md" id="popup-pkg1" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content border border-warning"
                    style=" background-color: black; color: white; max-height:400px; overflow-y:auto; ">
                    <div class="modal-header" style=" border-bottom: 5px solid #766d48; ">
                        <h4 class="modal-title">STYZELER THE-ONE-OFF</h4>
                        <i class="close-modal" style="font-size:2rem;"><b>&times;</b></i>
                    </div>
                    <div class="modal-body">

                        <h3 class="subheading">Unlimited candidate</h3>
                        <p>The-one-off subscription is a great way to ensure work is
                            compleated while searching for the right candidate for the role</p>

                        <h3 class="subheading">Wedding</h3>
                        <p>wedding planners or brides can book a wedding stylist for a
                            trial to discuss the suitable look</p>

                        <h3 class="subheading">Events</h3>
                        <p>Organisers are allowed to book unlimited freelancers for
                            music videos, product launches, music festivals, Organisers are
                            allowed to book unlimited freelancers for music festivals, trade
                            shows, and business conferences.</p>
                    </div>

                </div>

            </div>
        </div>
        <div class="modal fade bd-example-modal-md" id="popup-pkg2" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content border border-warning"
                    style=" background-color: black; color: white; max-height:400px; overflow-y:auto; ">
                    <div class="modal-header" style=" border-bottom: 5px solid #766d48; ">
                        <h4 class="modal-title">DEDICATED TO HELPING</h4>
                        <i class="close-modal" style="font-size:2rem;"><b>&times;</b></i>
                    </div>
                    <div class="modal-body">
                        <h3 class="subheading">Unlimited candidate</h3>
                        <p>"The dedicated to helping" is perfect for holiday leave to
                            ensure, professionalism, performance and competitiveness remain
                            at a high standard to ease up the pressure on permanent staff.
                            the dedicated to Helping membership allows start-up businesses to
                            grow the business organically with the help of freelancers and
                            ease up the pressure of fixed wages, can offer a full-time
                            position to any and ease up the pressure of fixed wages, can
                            offer a full-time position to any freelancer that suits the
                            company policy Rent & Let Rent & Let gives the chance to utilise
                            and maximise on an empty chair, take advantage of the new feature
                            rent & let as you go or the traditional chair rental.</p>

                        <h3 class="subheading">Rent & Let</h3>
                        <p>Rent & Let gives the chance to utilise and maximise on an
                            empty chair, take advantage of the new feature rent & let as you
                            go or the traditional chair rental</p>
                    </div>

                </div>

            </div>
        </div>
        <div class="modal fade bd-example-modal-md" id="popup-pkg3" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content border border-warning"
                    style=" background-color: black; color: white; max-height:400px; overflow-y:auto; ">
                    <div class="modal-header" style=" border-bottom: 5px solid #766d48; ">
                        <h4 class="modal-title">UNITED TO SUCCEED</h4>
                        <i class="close-modal" style="font-size:2rem;"><b>&times;</b></i>
                    </div>
                    <div class="modal-body">
                        <h3 class="subheading">Unlimited candidate</h3>
                        <p>United to succeed has been tailored to make sure efficiency
                            and productivity remain at a high standard don't be short of
                            staff risking turning that walk-in customer away that potentially
                            could have become a loyal client with the united to succeed can
                            hire any freelancer for a short period time or for an unlimited
                            time can offer a full-time position to a freelancer that suits
                            the company policy or directly contacts a candidate looking that
                            suits the company policy ordirectley contact any freelancer
                            looking for a permanent position</p>

                        <h3 class="subheading">Rent & Let</h3>
                        <p>Rent & Let gives the chance to utilise and maximise on an
                            empty chair, take advantage of the new feature rent & let as you
                            go or the traditional chair rental</p>

                        <h3 class="subheading">Wedding</h3>
                        <p>wedding planners or brides can book a wedding stylist for a
                            trial to discuss the suitable look</p>

                        <h3 class="subheading">Events</h3>
                        <p> Organizers are allowed to discuss the suitable look</p>

                        <h3 class="subheading">Events</h3>
                        <p>Organizers are allowed to book unlimited freelancers for
                            music festivals, business conferences, product launches, and
                            trade shows.</p>

                        <h3 class="subheading">Post a job</h3>
                        <p>Post a job and have candidates from the agency contact you
                            or the whole online community can reach your organisation through
                            our online marketing</p>

                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- business -->
@endsection

@push('script')
@endpush
