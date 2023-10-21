<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hair and Beauty freelance agency London - Styzeler</title>
    <meta name="description"
        content="We are a London freelance agency recruiting Hairdresser and Beauticians, for Hair and Beauty Spa salons, freelancers help small businesses to grow" />
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('template_old/images/favicon-logo.png') }}" type="image/png" sizes="16x16">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('template_old/bootstrap/css/bootstrap.min.css') }}" />

    <!--Font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Animation -->
    <link rel="stylesheet" href="{{ asset('template_old/css/aos/aos.css') }}">

    <!--Custom CSS-->
    <link rel="stylesheet" href="{{ asset('template_old/css/style.css') }}?v={{ time() }}" />
    <link rel="stylesheet" href="{{ asset('template_new/assets/css/toastr.min.css') }}?v={{ time() }}">

    <!-- chat links -->
    <link rel="stylesheet" href="{{ asset('template_new/assets/css/chat_style.css') }}?v={{ time() }}" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <style>
        .pointer {
            cursor: pointer;
        }

        #toast-container>.toast {
            width: 300px;
            /* width: 100% */
        }
    </style>
    <style>
        .overlay {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 99999;
            background: rgba(0, 0, 0, 0.698) url("template_old/images/loader.gif") center no-repeat;
        }

        /* Turn off scrollbar when body element has the loading class */
        body.loading {
            overflow: hidden;
        }

        /* Make spinner image visible when body element has the loading class */
        body.loading .overlay {
            display: block;
        }
    </style>
    <style>
        :root {
            --prime_color: #73afdf;
            --dark: #000;
            --light: #fff;
            --font-open-sans: "Open Sans", sans-serif;
            --transition: all ease 0.3s;
        }

        .toggle {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            display: none;
            position: absolute;
            top: 45px;
            bottom: 0;
            right: 2rem;
            width: 1.5rem;
            height: 1.2rem;
            background: transparent;
            padding: 0;
            /* margin: auto; */
            border: 0;
            cursor: pointer;
            -webkit-transition: var(--transition);
            transition: var(--transition);
            z-index: 4;
        }

        .toggle::before,
        .toggle::after,
        .toggle>span {
            position: absolute;
            width: inherit;
            height: 0.2rem;
            background: var(--light);
            -webkit-transition: var(--transition);
            transition: var(--transition);
        }

        .toggle::before {
            content: "";
            top: 0;
        }

        .toggle.active::before {
            top: 50%;
            margin-top: -0.1rem;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .toggle::after {
            content: "";
            bottom: 0;
        }

        .toggle.active::after {
            bottom: 50%;
            margin-bottom: -0.1rem;
            -webkit-transform: rotate(135deg);
            -ms-transform: rotate(135deg);
            transform: rotate(135deg);
        }

        .toggle.active>span {
            opacity: 0;
        }

        header #nav {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            list-style: none;
            gap: 1rem;
            grid-gap: 1rem;
            margin: 0;
            padding: 0;
        }

        header #nav>li {
            position: relative;
        }


        header #nav>li:hover>.sub {
            pointer-events: auto;
            visibility: visible;
            opacity: 1;
            margin-top: 0;
        }

        header #nav>li>a {
            display: block;
            color: #b1bcc5;
            font-size: 1.3rem;
            line-height: 1;
            text-align: center;
            text-transform: uppercase;
        }

        header #nav>li>a::after {
            content: "";
            display: block;
            width: 6rem;
            height: 0.3rem;
            background-image: url(template_new/assets/images/header_hr.png);
            background-position: center;
            background-size: contain;
            background-repeat: no-repeat;
            margin: 0.6rem auto 0;
        }

        header #nav {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            list-style: none;
            gap: 1rem;
            grid-gap: 1rem;
            margin: 0;
            padding: 0;
        }

        header #nav .sub>li>a {
            display: block;
            text-align: center;
            color: #f00;
            text-transform: uppercase;
            font-size: 1rem;
        }

        header #nav>li>.sub {
            pointer-events: auto;
            visibility: visible;
            opacity: 1;
            margin-top: 0;
        }

        header #nav>li>.sub {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        header #nav>li:hover>.sub {
            display: block;

        }

        header #nav>li>.sub {
            position: absolute;
            top: 100%;
            left: 50%;
            right: 0;
            width: 11rem;
            margin: 2rem auto 0;
            padding: .5rem;
            background: var(--dark);
            border-radius: 1rem;
            -webkit-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            transform: translateX(-50%);
            -webkit-transition: var(--transition);
            transition: var(--transition);
            pointer-events: none;
            visibility: hidden;
            opacity: 0;
            z-index: 5;
        }

        .header .subtitle {
            font-size: 23px;
            letter-spacing: 1px;
            font-weight: normal;
        }

        footer .txt {
            font-size: 1.6rem;
        }

        footer {
            margin-top: auto;
            padding: 3rem 0 0;
            font-size: 1.3rem;
            color: #b1bcc5;
        }

        @media (max-width: 991px) {
            .toggle {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
            }

            .toggle.active::before {
                width: 1rem;
                left: 0.2rem;
            }

            .toggle.active::after {
                width: 1rem;
                left: -0.4rem;
            }

            .nav-item {
                line-height: 1.5;
            }

            header #nav>li>.sub {
                pointer-events: auto;
                visibility: visible;
                opacity: 1;
                margin-top: 0;
            }

            header #nav {
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                list-style: none;
            }

            header #nav>li:not(:nth-last-child(1)) {
                margin-bottom: 0.5rem;
            }

            header #nav>li>.sub {
                display: block;
                list-style: none;
                margin: 0;
                padding: 0;
            }

            button.navbar-toggler {
                outline: none;
            }

            header #nav>li>.sub {
                position: relative;
                top: 100%;
                left: 50%;
                right: 0;
                width: 11rem;
                margin: 0rem auto 0;
                padding: 0.5rem;
                background: var(--dark);
                border-radius: 1rem;
                -webkit-transform: translateX(-50%);
                -ms-transform: translateX(-50%);
                transform: translateX(-50%);
                -webkit-transition: var(--transition);
                transition: var(--transition);
                pointer-events: none;

                z-index: 5;
            }

            header .logon_btn {
                width: 104px
            }

            footer .txt {
                font-size: 1.2rem;
            }

            footer {
                font-size: 1.2rem;
            }

            footer p {
                color: #cecfaa;
                font-size: 14px !important;
            }

            .chat-btn {
                width: 30%;
                height: 6.25vw;
                padding: 0;
                font-size: 3vw;
                border-radius: 0.3vw;
                font-weight: 500;
                border: 2px solid #f6ce30;
                background: #f6ce30;
                color: white;
            }

        }
    </style>
    @stack('css')
</head>

<body>

    @include('layouts.master.template_old.header')
    <main>
        <div class="overlay"></div>
        @yield('content')
    </main>
    @include('layouts.master.template_old.footer')

</body>

</html>
