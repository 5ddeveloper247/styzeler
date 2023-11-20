<header>
    <div class="contain">
        <div class="top">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('template_new/assets/images/logo.png') }}" alt="Styzeler" />
                </a>
            </div>
            <button type="button" class="toggle"><span></span></button>
            <div class="logo_name">Styzeler</div>
            <p class="subtitle">Recruitment Agency For Hair, Beauty, Spa</p>
            <div class="btn_blk">

                @if (auth()->check())
                    <!-- Check if the user is logged in -->
                    <!-- Display sign out and dropdown when the user is logged in -->
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="mb-0">
                            @csrf
                            <button type="submit" class="logon_btn">Sign Out</button>
                        </form>
                        @if (!isset(auth()->user()->profile_type) && !in_array(auth()->user()->type, ['beautySalon', 'hairdressingSalon']))
                            <a href="{{ route('cart') }}" class="logon_btn heart_btn">
                                <img src="{{ asset('template_new/assets/images/cart-round.png') }}" alt=""
                                    style="width:28px;">
                            </a>
                        @endif
                    @endauth

                    <button href="javascript:void(0)" class="logon_btn heart_btn dropdown-toggle position-relative"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        id="navbarDropdown">
                        <img src="{{ asset('template_new/assets/images/user-icon.png') }}" alt=""
                            style="width:28px;"><!-- heart_icon.jpg -->
                        <div class="dropdown-menu position-absolute" aria-labelledby="navbarDropdown">
                            {{-- <div class="user-profile"></div> --}}
                            @if (auth()->user()->type != 'client')
                                <a class="dropdown-item" href="{{ route('freelancerBookingHistory') }}">Your Booking
                                    History</a>
                            @endif

                            <a class="dropdown-item" href="{{ route('Profile') }}">Profile</a>
                            @if (auth()->user()->type == 'client')
                                <a class="dropdown-item" href="{{ route('clientBooking') }}">Your
                                    Booking</a>
                                <a class="dropdown-item oldredirect" href="{{ route('clientBookingHistory') }}">Your
                                    Booking
                                    History</a>
                            @else
                                <a class="dropdown-item" href="{{ route('freelancerBooking') }}">Your
                                    Booking</a>
                            @endif
                            @if (auth()->user()->type == 'beautySalon' || auth()->user()->type == 'hairdressingSalon')
                                <a class="dropdown-item oldredirect" href="{{ route('chairListing') }}">Your Chair
                                    Listing</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('termAndConditions') }}">Terms &
                                Conditions</a>
                            <a class="dropdown-item" href="{{ route('privacyPolicy') }}">Privacy Policy</a>
                            <a class="dropdown-item" href="{{ route('webTermAndConditions') }}">Website
                                Terms &
                                Conditions</a>
                            <a class="dropdown-item" href="{{ route('freelancerTermAndConditions') }}">Freelancer
                                Terms &
                                Conditions</a>
                            @if (auth()->user()->type == 'client' ||
                                    auth()->user()->type == 'hairdressingSalon' ||
                                    auth()->user()->type == 'beautySalon')
                                <a class="dropdown-item" href="javascript:;" onclick="getClientTokens();">Tokens</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('faqs') }}">FAQ</a>
                        </div>
                    </button>
                @else
                    <!-- Display sign in and register when the user is not logged in -->
                    <a href="{{ route('login') }}" class="logon_btn">Sign In</a>
                    <a href="{{ route('register') }}" class="logon_btn">Register</a>
                @endif
            </div>
        </div>
        <nav>
            <ul id="nav">
                <li>
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="drop large_screen">
                    <a href="{{ route('aboutUs') }}">About us</a>
                    <ul class="sub">
                        <li><a href="{{ route('contactUs') }}">Contact us</a></li>
                    </ul>
                </li>
                <li class="drop dropdown small_screen">
                    <a href="javascript:void(0)" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">About us</a>
                    <ul class="sub" style="border: 0px; display: none;">
                        <li class="dropdown-item"><a href="{{ route('aboutUs') }}">About us</a></li>
                        <li class="dropdown-item"><a href="{{ route('contactUs') }}">Contact us</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('businessOwner') }}">Business Owner</a>
                </li>
                <li class="drop large_screen">
                    <a href="{{ route('candidate') }}">Candidate</a>
                    <ul class="sub">
                        <li><a href="{{ route('candidate') }}?type=freelancer">Freelance</a></li>
                        <li><a href="{{ route('candidate') }}?type=jobseeker">Job Seeker</a></li>
                    </ul>
                </li>
                <li class="drop dropdown small_screen">
                    <a href="javascript:void(0)" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Candidate</a>
                    <ul class="sub" style="border: 0px; display: none;">
                        <li class="dropdown-item"><a href="{{ route('candidate') }}?type=freelancer">Freelance</a></li>
                        <li class="dropdown-item"><a href="{{ route('candidate') }}?type=jobseeker">Job Seeker</a></li>
                    </ul>
                </li>
                <li class="drop large_screen">
                    <a href="{{ route('news') }}">News</a>
                    <ul class="sub">
                        <li><a href="{{ route('blogs') }}">Styzeler Feeds</a></li>
                        <li><a href="{{ route('jobs') }}">Styzeler Jobs</a></li>
                    </ul>
                </li>
                <li class="drop dropdown small_screen">
                    <a href="javascript:void(0)" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">News</a>
                    <ul class="sub" style="border: 0px; display: none;">
                        <li class="dropdown-item"><a href="{{ route('blogs') }}">Styzeler Feeds</a></li>
                        <li class="dropdown-item"><a href="{{ route('jobs') }}">Styzeler Jobs</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('wedding') }}">Bridal</a>
                </li>
                <li class="drop large_screen">
                    <a href="{{ route('rentAndLet') }}">Rent & Let</a>
                    <ul class="sub">
                        <li><a href="{{ route('rentAndLet') }}">Hourly</a></li>
                        <li><a href="{{ route('rentAndLet') }}">Daily</a></li>
                        <li><a href="{{ route('rentAndLet') }}">Monthly</a></li>
                    </ul>
                </li>
                <li class="drop dropdown small_screen">
                    <a href="javascript:void(0)" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Rent & Let</a>
                    <ul class="sub" style="border: 0px; display: none;">
                        <li class="dropdown-item"><a href="{{ route('rentAndLet') }}">Hourly</a></li>
                        <li class="dropdown-item"><a href="{{ route('rentAndLet') }}">Daily</a></li>
                        <li class="dropdown-item"><a href="{{ route('rentAndLet') }}">Monthly</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</header>
