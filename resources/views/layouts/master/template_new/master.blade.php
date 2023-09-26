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
