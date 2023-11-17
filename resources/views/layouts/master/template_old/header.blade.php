<header>
    <section class="header mx-auto">
        <nav class="navbar navbar-expand-lg navbar-light">

            <div class="d-block d-lg-none text-left">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('template_old/images/logo.png') }}" width="80px" /></a>
            </div>
            <button class="navbar-toggler toggle" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span></span>
                {{-- <img src="{{ asset('template_old/images/menu.png') }}" alt="Styzeler"> --}}
            </button>
            {{-- <button type="button" class="toggle"><span></span></button> --}}

            <div class="row navbar-collapse collapse" id="navbarSupportedContent">
                <div class="container-fluid top-header pb-lg-2 pb-2">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <div>
                            <a class="navbar-brand" href="{{ url('/') }}"><img
                                    src="{{ asset('template_old/images/logo.png') }}" width="100px"
                                    class="d-none d-lg-inline" /> </a>
                            <a class="navbar-heading" href="{{ url('/') }}">
                                <p style="font-size: 60px" class="d-none d-lg-inline">Styzeler</p>
                            </a>
                            <p class="subtitle d-none d-lg-inline ml-2"> Recruitment Agency For Hair, Beauty, Spa</p>
                        </div>

                        <div class="d-none d-md-block">
                            <div class="btn_blk">

                                @if (auth()->check())
                                    <!-- Check if the user is logged in -->
                                    <!-- Display sign out and dropdown when the user is logged in -->
                                    @auth
                                        <form method="POST" action="{{ route('logout') }}" class="mb-0">
                                            @csrf
                                            <button type="submit" class="logon_btn">Sign
                                                Out</button>
                                        </form>
                                        @if (!isset(auth()->user()->profile_type) && !in_array(auth()->user()->type, ['beautySalon', 'hairdressingSalon']))
                                            <a href="{{ route('cart') }}" class="logon_btn heart_btn">
                                                <img src="{{ asset('template_new/assets/images/cart-round.png') }}"
                                                    alt="" style="width:28px;">
                                            </a>
                                        @endif
                                    @endauth

                                    <button href="javascript:void(0)"
                                        class="logon_btn heart_btn dropdown-toggle position-relative" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        id="navbarDropdown">
                                        <img src="{{ asset('template_new/assets/images/user-icon.png') }}"
                                            alt="" style="width:28px;"><!-- heart_icon.jpg -->
                                        <div class="dropdown-menu position-absolute" aria-labelledby="navbarDropdown">
                                            {{-- <div class="user-profile"></div> --}}
                                            @if (!empty(auth()->user()->type) && auth()->user()->type != 'client')
                                                <a class="dropdown-item oldredirect"
                                                    href="{{ route('freelancerBookingHistory') }}">Your
                                                    Booking
                                                    History</a>
                                            @endif

                                            <a class="dropdown-item oldredirect"
                                                href="{{ route('Profile') }}">Profile</a>
                                            @if (!empty(auth()->user()->type) && auth()->user()->type == 'client')
                                                <a class="dropdown-item oldredirect"
                                                    href="{{ route('clientBooking') }}">Your
                                                    Booking</a>
                                                <a class="dropdown-item oldredirect"
                                                    href="{{ route('clientBookingHistory') }}">Your
                                                    Booking
                                                    History</a>
                                            @else
                                                <a class="dropdown-item oldredirect"
                                                    href="{{ route('freelancerBooking') }}">Your
                                                    Booking</a>
                                            @endif
                                            @if (auth()->user()->type == 'beautySalon' || auth()->user()->type == 'hairdressingSalon')
                                                <a class="dropdown-item oldredirect"
                                                    href="{{ route('chairListing') }}">Your Chair Listing</a>
                                            @endif
                                            <a class="dropdown-item oldredirect"
                                                href="{{ route('termAndConditions') }}">Terms &
                                                Conditions</a>
                                            <a class="dropdown-item oldredirect"
                                                href="{{ route('privacyPolicy') }}">Privacy
                                                Policy</a>
                                            <a class="dropdown-item oldredirect"
                                                href="{{ route('webTermAndConditions') }}">Website
                                                Terms &
                                                Conditions</a>
                                            <a class="dropdown-item oldredirect"
                                                href="{{ route('freelancerTermAndConditions') }}">Freelancer
                                                Terms &
                                                Conditions</a>
                                            @if (
                                                (!empty(auth()->user()->type) && auth()->user()->type == 'client') ||
                                                    (!empty(auth()->user()->type) && auth()->user()->type == 'hairdressingSalon') ||
                                                    (!empty(auth()->user()->type) && auth()->user()->type == 'beautySalon'))
                                                <a class="dropdown-item" href="javascript:;"
                                                    onclick="getClientTokens();">Tokens</a>
                                            @endif
                                            <a class="dropdown-item oldredirect" href="{{ route('faqs') }}">FAQ</a>
                                        </div>
                                    </button>
                                @else
                                    <!-- Display sign in and register when the user is not logged in -->
                                    <a href="{{ route('login') }}" class="logon_btn">Sign In</a>
                                    <a href="{{ route('register') }}" class="logon_btn">Register</a>
                                @endif


                            </div>
                        </div>
                    </div>



                    <div class="d-flex d-lg-none justify-content-between flex-row">
                        <div class="">
                            <h6 class="subtitle-small d-block d-lg-none my-3" style="color: #cecfaa">Recruitment Agency
                                For Hair, Beauty, Spa
                            </h6>
                        </div>
                        <div class="">
                            <span style="float: right; " class="signinGroup1 d-lg-block">

                                <div class="btn_blk position-relative" style="flex-direction: column">
                                    @if (auth()->check())
                                        <!-- Check if the user is logged in -->
                                        <!-- Display sign out and dropdown when the user is logged in -->
                                        @auth
                                            <form method="POST" action="{{ route('logout') }}" class="mb-0">
                                                @csrf
                                                <button type="submit" class="logon_btn">Sign Out</button>
                                            </form>
                                            <a href="{{ route('cart') }}" class="logon_btn heart_btn">
                                                <img src="{{ asset('template_new/assets/images/cart-round.png') }}"
                                                    alt="" style="width:28px;">
                                            </a>
                                        @endauth
                                        <button href="javascript:void(0)" class="logon_btn heart_btn dropdown-toggle"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" id="navbarDropdown">
                                            <!--                                     <img src="{{ asset('template_new/assets/images/heart_icon.jpg') }}" alt=""> -->
                                            <img src="{{ asset('template_new/assets/images/user-icon.png') }}"
                                                alt="" style="width:28px;"><!-- heart_icon.jpg -->
                                            <div class="dropdown-menu position-absolute"
                                                aria-labelledby="navbarDropdown">
                                                <div class="user-profile"></div>
                                                @if (!empty(auth()->user()->type) && auth()->user()->type != 'client')
                                                    <a class="dropdown-item oldredirect"
                                                        href="{{ route('freelancerBookingHistory') }}">Your
                                                        Booking History</a>
                                                @endif
                                                <a class="dropdown-item oldredirect"
                                                    href="{{ route('Profile') }}">Profile</a>
                                                @if (!empty(auth()->user()->type) && auth()->user()->type == 'client')
                                                    <a class="dropdown-item oldredirect"
                                                        href="{{ route('clientBooking') }}">Your
                                                        Booking</a>
                                                @else
                                                    <a class="dropdown-item oldredirect"
                                                        href="{{ route('freelancerBooking') }}">Your
                                                        Booking</a>
                                                @endif
                                                <a class="dropdown-item oldredirect"
                                                    href="{{ route('termAndConditions') }}">Terms &
                                                    Conditions</a>
                                                <a class="dropdown-item oldredirect"
                                                    href="{{ route('privacyPolicy') }}">Privacy Policy</a>
                                                <a class="dropdown-item oldredirect"
                                                    href="{{ route('webTermAndConditions') }}">Website
                                                    Terms &
                                                    Conditions</a>
                                                <a class="dropdown-item oldredirect"
                                                    href="{{ route('freelancerTermAndConditions') }}">
                                                    Freelancer Terms & Conditions</a>
                                                @if (
                                                    (!empty(auth()->user()->type) && auth()->user()->type == 'client') ||
                                                        (!empty(auth()->user()->type) && auth()->user()->type == 'hairdressingSalon') ||
                                                        (!empty(auth()->user()->type) && auth()->user()->type == 'beautySalon'))
                                                    <a class="dropdown-item" href="javascript:;"
                                                        onclick="getClientTokens();">Tokens</a>
                                                @endif
                                                <a class="dropdown-item oldredirect"
                                                    href="{{ route('faqs') }}">FAQ</a>
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
                    </div>

                </div>

                <div class="container-fluid my-1">
                    {{-- <div class="d-flex navbar-nav text-light justify-content-between text-center">

                        <div class="nav-item">
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
                        <div class="nav-item">
                            <a class="nav-link" href="{{ route('businessOwner') }}">BUSINESS OWNER</a>
                            <img src="{{ asset('template_old/images/header-hr.png') }}" class="header-hr" />
                        </div>
                        <div class="nav-item position-relative">
                            <a class="nav-link" href="{{ route('candidate') }}">Candidate</a>
                            <img src="{{ asset('template_old/images/header-hr.png') }}" class="header-hr" />
                            <ul class="sub">
                                <li>
                                    <a href="{{ route('candidate') }}?type=Freelancer">Freelance</a>
                                </li>
                                <li>
                                    <a href="{{ route('candidate') }}?type=Jobseeker">Job Seeker</a>
                                </li>
                            </ul>
                        </div>
                        <div class="nav-item position-relative">
                            <a class="nav-link" href="{{ route('news') }}">News </a>
                            <img src="{{ asset('template_old/images/header-hr.png') }}" class="header-hr" />
                            <ul class="sub">
                                <li>
                                    <a href="{{ route('blogs') }}">Styzeler Feeds</a>
                                </li>
                                <li>
                                    <a href="{{ route('jobs') }}">Styzeler Jobs</a>
                                </li>
                            </ul>
                        </div>
                        <div class="nav-item position-relative">
                            <a class="nav-link" href="{{ route('wedding') }}">Bridal </a>
                            <img src="{{ asset('template_old/images/header-hr.png') }}" class="header-hr" />
                        </div>
                        <div class="nav-item position-relative">
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


                    </div> --}}
                    <ul id="nav">
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="drop">
                            <a href="{{ route('aboutUs') }}">About us</a>
                            <ul class="sub">
                                <li><a href="{{ route('contactUs') }}">Contact us</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('businessOwner') }}">Business Owner</a>
                        </li>
                        <li class="drop">
                            <a href="{{ route('candidate') }}">Candidate</a>
                            <ul class="sub">

                                <li><a href="{{ route('candidate') }}?type=freelancer">Freelance</a></li>
                                <li><a href="{{ route('candidate') }}?type=jobseeker">Job Seeker</a></li>

                            </ul>
                        </li>
                        <li class="drop">
                            <a href="{{ route('news') }}">News</a>
                            <ul class="sub">
                                <li><a href="{{ route('blogs') }}">Styzeler Feeds</a></li>
                                <li><a href="{{ route('jobs') }}">Styzeler Jobs</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('wedding') }}">Bridal</a>
                        </li>
                        <li class="drop">
                            <a href="{{ route('rentAndLet') }}">Rent & Let</a>
                            <ul class="sub">
                                <li><a href="{{ route('rentAndLet') }}">Hourly</a></li>
                                <li><a href="{{ route('rentAndLet') }}">Daily</a></li>
                                <li><a href="{{ route('rentAndLet') }}">Monthly</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
</header>
