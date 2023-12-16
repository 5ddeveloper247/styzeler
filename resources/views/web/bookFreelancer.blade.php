@extends('layouts.master.template_old.master')

@push('css')
    <style>
        .color-1 {
            text-wrap: balance !important;
        }
    </style>
@endpush

@section('content')

    <div class="hairstylist-banner mb-5" data-aos="fade-up">

        <img src="{{ asset('template_old/images/hairstylist-banner.png') }}" alt="" width="100%" height="80%">

    </div>

    <div class="occupation hairstylist">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="content-body">
                        <div class="">
                            <h1>United to succeed</h1>
                            <div class="content-text my-5 p-4">
                                <p>Spending hours Freelancing across various roles Freelancers learn new skills and see how
                                    different companies operate, making a Freelancer far more employable and truly enriching
                                    Their CV <br>

                                    Freelancers are in control of their career and it's far easier to take career breaks and
                                    fit your job around your life. The beauty of Freelancing work is, to have the chance to
                                    select your potential employer should dream opportunity arise</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="content-category">
            <div class="container">
                <div class="content-category-header">
                    @if(count($users) > 1)
                        <h1>Freelancer(s) For Home Service</h1>
                    @else
                        <h1>Freelancer For Home Service</h1>
                    @endif
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
                                <a class="toUserProfile" id="{{ $row->id }}"
                                    href="javascript:;"><!-- {{ route('freelancerProfile') }}?id={{ $row->id }} -->
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

            localStorage.setItem('bookType', 'cart_book');

            var userprofileroute = "{{ route('freelancerProfile') }}";
            var cart_exist = "{{ $cart_exist }}";

            $(document).on('click', '.toUserProfile', function(e) {

                if (cart_exist == 'true') {
                    var route = userprofileroute + '?id=' + $(this).attr('id');
                    window.location.href = route;
                } else {

                    toastr.error('First add service in cart then proceed...', '', {
                        timeOut: 3000
                    });
                    return;
                }
            });
        });
    </script>
@endpush
