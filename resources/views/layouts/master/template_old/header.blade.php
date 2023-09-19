<header>
    <section class="header">
        <nav class="navbar navbar-expand-lg navbar-light ">

            <div class="text-left d-block d-lg-none">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('template_old/images/logo.png') }}" width="80px" /></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <img src="{{ asset('template_old/images/menu.png') }}" alt="Styzeler">
            </button>

            <div class="row collapse navbar-collapse" id="navbarSupportedContent">
                <div class="container-fluid top-header pb-2 pb-lg-2">
                    <a class="navbar-brand" href="{{ url('/') }}"><img
                            src="{{ asset('template_old/images/logo.png') }}" width="100px"
                            class="d-none d-lg-inline" /> </a>
                    <a class="navbar-heading" href="{{ url('/') }}"><strong style="font-size: 60px"
                            class="d-none d-lg-inline">Styzeler</strong></a>
                    <p class="subtitle ml-2 d-none d-lg-inline"> Recruitment Agency For Hair, Beauty, Spa</p>
                    <div class="row d-lg-none">
                        <div class="col-6">
                            <h6 class="subtitle-small d-block d-lg-none my-3 ">Recruitment Agency For Hair, Beauty, Spa
                            </h6>
                        </div>
                    </div>
                    <span style="float: right;" class="signinGroup1 d-none d-lg-block mt-4">

                        <div class="btn_blk position-relative">
                            @if (auth()->check())
                                <!-- Check if the user is logged in -->
                                <!-- Display sign out and dropdown when the user is logged in -->
                                @auth
                                    <form method="POST" action="{{ route('logout') }}" class="mb-0">
                                        @csrf
                                        <button type="submit" class="logon_btn">Sign Out</button>
                                    </form>
                                @endauth
                                <button href="javascript:void(0)" class="logon_btn heart_btn dropdown-toggle"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    id="navbarDropdown">
                                    <img src="{{ asset('template_new/assets/images/heart_icon.jpg') }}" alt="">
                                    <div class="dropdown-menu position-absolute" aria-labelledby="navbarDropdown">
                                        {{-- <div class="user-profile"></div> --}}
                                        <a class="dropdown-item" href="booking-history.html">Your Booking History</a>
                                        <a class="dropdown-item" href="{{ route('Profile') }}">Profile</a>
                                        <a class="dropdown-item" href="freelancer-booking.html">Your Booking</a>
                                        <a class="dropdown-item" href="terms-conditions.html">Terms & Conditions</a>
                                        <a class="dropdown-item" href="privacy-notice.html">Privacy Policy</a>
                                        <a class="dropdown-item" href="webstite-terms-condition.html">Website Terms &
                                            Conditions</a>
                                        <a class="dropdown-item" href="freelancer-terms-conditions.html">
                                            Freelancer Terms & Conditions</a>
                                        <a class="dropdown-item" href="faq.html">FAQ</a>
                                    </div>
                                </button>
                            @else
                                <!-- Display sign in and register when the user is not logged in -->
                                <a href="{{ route('login') }}" class="logon_btn">Sign In</a>
                                <a href="{{ route('register') }}" class="logon_btn">Register</a>
                            @endif

                        </div>
                    </span>
                </div>

                <div class="container-fluid my-1">
                    <div class="d-flex navbar-nav  text-light text-center justify-content-between">

                        <div class=" nav-item  ">
                            <a class="nav-link" href="{{ url('/') }}">Home<span
                                    class="sr-only">(current)</span></a>
                            <img src="{{ asset('template_old/images/header-hr.png') }}" class="header-hr" />

                        </div>
                        <div class="nav-item position-relative">
                            <a class="nav-link" href="{{ route('aboutUs') }}">About Us</a>
                            <img src="{{ asset('template_old/images/header-hr.png') }}" class="header-hr" />
                            <ul class="sub">
                                <li>
                                    <a href="{{ route('contactUs') }}">Contact us</a>
                                </li>
                            </ul>
                        </div>
                        <div class=" nav-item ">
                            <a class="nav-link" href="{{ route('businessOwner') }}">BUSINESS OWNER</a>
                            <img src="{{ asset('template_old/images/header-hr.png') }}" class="header-hr" />
                        </div>
                        <div class=" nav-item position-relative">
                            <a class="nav-link" href="{{ route('candidate') }}">Candidate</a>
                            <img src="{{ asset('template_old/images/header-hr.png') }}" class="header-hr" />
                            <ul class="sub">
                                <li>
                                    <a href="{{ route('candidate') }}">Freelance</a>
                                </li>
                                <li>
                                    <a href="{{ route('candidate') }}">Job Seeker</a>
                                </li>
                            </ul>
                        </div>
                        <div class=" nav-item position-relative">
                            <a class="nav-link" href="{{ route('news') }}">News </a>
                            <img src="{{ asset('template_old/images/header-hr.png') }}" class="header-hr" />
                            <ul class="sub">
                                <li>
                                    <a href="{{ route('news') }}">Styzeler Feeds</a>
                                </li>
                                <li>
                                    <a href="{{ route('news') }}">Styzeler Jobs</a>
                                </li>
                            </ul>
                        </div>
                        <div class=" nav-item position-relative">
                            <a class="nav-link" href="{{ route('wedding') }}">Bridal </a>
                            <img src="{{ asset('template_old/images/header-hr.png') }}" class="header-hr" />
                        </div>
                        <div class=" nav-item position-relative">
                            <a class="nav-link" href="{{ route('rentAndLet') }}">Rent & Let</a>
                            <img src="{{ asset('template_old/images/header-hr.png') }}" class="header-hr" />
                            <ul class="sub">
                                <li>
                                    <a href="{{ route('rentAndLet') }}">Hourly</a>
                                </li>
                                <li>
                                    <a href="{{ route('rentAndLet') }}">Daily</a>
                                </li>
                                <li>
                                    <a href="{{ route('rentAndLet') }}">Monthly</a>
                                </li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </nav>
    </section>
</header>
