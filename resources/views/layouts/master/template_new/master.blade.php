<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home — Styzeler</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=yes" />
    <!-- Css Files -->
    <link rel="stylesheet" href="{{ asset('template_new/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('template_new/assets/css/animation.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('template_new/assets/css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('template_new/assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('template_new/assets/css/responsive.css') }}" />
    <link rel="icon" href="{{ asset('template_old/images/favicon-logo.png') }}" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="{{ asset('template_new/assets/css/toastr.min.css') }}">
    <!-- chat links -->
    <link rel="stylesheet" href="{{ asset('template_new/assets/css/chat_style.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <link type="image/png" rel="icon" href="{{ asset('template_new/assets/images/fav') }}" /> --}}
    <style>
    .pointer{
    	cursor:pointer;
    }
        #toast-container>.toast {
            width: 300px;
            /* width: 100% */
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
    @stack('css')
</head>

<body>
    @include('layouts.master.template_new.header')
    <main>
        <div class="overlay"></div>
        @yield('content')
    </main>
    @include('layouts.master.template_new.footer')

</body>

</html>
