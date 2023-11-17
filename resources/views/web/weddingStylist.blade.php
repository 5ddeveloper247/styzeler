@extends('layouts.master.template_old.master')

@push('css')
    <style>
        .price_item p {
            color: #138a8f !important;
            font-size: 21px !important;
        }

        #wedding h1.main_heading {
            font-size: 4rem;
        }

        #wedding .price_banner .price_item {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            margin-bottom: 0.6rem;
            align-items: center;
        }
    </style>
@endpush

@section('content')

    <div class="wedding-banner mb-5">

        <img src="{{ asset('template_old/images/wedding-banner.jpeg') }}" alt="" width="100%" height="80%">

    </div>

    <div class="wedding-header-banner d-none d-md-block my-5">

        <img src="{{ asset('template_old/images/wedding-header-banner.png') }}" alt="" width="100%">

    </div>

    <div class="wedding-header-banner d-block d-md-none mb-5">

        <img src="{{ asset('template_old/images/wedding-banner-small-3.png') }}" alt="" width="100%"
            height="120%">

    </div>

    <!-- Content -->
    <div class="occupation">
        <!-- <section class="content-body">
                    <div class="container">
                        <h1>Your wedding should be the party of your life </h1>
                        <div class="content-text my-5 p-4">
                            <p>Styzeler freelancers can help you to achieve your dream day
                                At Styzeler we have a variety of experienced wedding Hairstylist, passionate to create a personalised updo for your wedding day from beautiful  Long Smooth Curls, Fishtail Braid, to Classic Finger Wave and more.</p>
                        </div>
                    </div>
                </section> -->

        <section class="content-category">
            <div class="container">
                <div class="content-category-header">
                    <h1>Wedding Hair Stylist </h1>

                    <div class="line line-1"></div>
                    <div class="line line-2"></div>
                    <div class="line line-3"></div>
                    <div class="line line-4"></div>
                    <div class="line line-5"></div>
                </div>
                <div class="content-category-people row my-5">

                    @if (isset($users))
                        @foreach ($users as $row)
                            <div class="col-sm-6 col-lg-4">
                                <a id="{{ $row->id }}" href="{{ route('freelancerProfile') }}?id={{ $row->id }}">
                                    <h4 class="color-1">{{ $row->name }} {{ $row->surname }}</h4>
                                    <div class="category-people mx-auto py-3">
                                        <div class="picture">
                                            <img id="profile-image-id-0" alt="" width="100%" height="100%"
                                                src="{{ asset(isset($row->hero_image) ? $row->hero_image : 'template_old/images/blank.png') }}">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>

        </section>

    </div>

@endsection

@push('script')
    <script>
        $(document).ready(function() {
            if (localStorage.getItem('bookType') == '') {
                localStorage.removeItem('bookType');
            }
        });
    </script>
@endpush
