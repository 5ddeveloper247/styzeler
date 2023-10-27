@extends('layouts.master.template_old.master')

@push('css')
    <style>

    </style>
@endpush

@section('content')

    <div class="beautician-banner mb-5" data-aos="fade-up">

        <img src="{{ asset('template_old/images/beautician-banner.png') }}" alt="" width="100%" height="80%">

    </div>

    <div class="occupation beautician">

        <div class="container">
            <div class="row justify-content-center" data-aos="fade-up">
                <div class="col-lg-10">
                    <div class="content-body">
                        <div class="">
                            <h1>United to succeed</h1>
                            <div class="content-text my-5 p-4">
                                <p class="">
                                    Styzeler's reputation is based on exceptional reliability and professionalism providing
                                    clients with experienced and qualified Freelancers who have the skills to take any
                                    business forward and make a difference straight away, taking the pressure off
                                    overstretched workforce.

                                    <br>
                                    Spending hours Freelancing across various roles Freelancers learn new skills and see how
                                    different companies operate, making a Freelancer far more employable and truly enriching
                                    Their CV.



                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="content-category">
            <div class="container">
                <div class="content-category-header">
                    <h1>Beautician</h1>

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
            localStorage.removeItem('bookType');
        });
    </script>
@endpush
