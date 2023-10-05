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
    <link rel="stylesheet" href="{{ asset('template_old/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('template_new/assets/css/toastr.min.css') }}">

    <!-- chat links -->
    <link rel="stylesheet" href="{{ asset('template_new/assets/css/chat_style.css') }}" />
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
