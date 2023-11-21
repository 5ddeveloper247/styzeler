@extends('layouts.master.template_old.master')

@push('css')
    <style>

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
                    <h1>Hairstylist</h1>

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
                                @auth
                                    <a id="{{ $row->id }}" href="{{ route('freelancerProfile') }}?id={{ $row->id }}">
                                        <h4 class="color-1">{{ $row->name }} {{ $row->surname }}</h4>
                                        <div class="category-people mx-auto py-3">
                                            <div class="picture">
                                                <img id="profile-image-id-0" alt="" width="100%" height="100%"
                                                    src="{{ asset(isset($row->hero_image) ? $row->hero_image : 'template_old/images/blank.png') }}">
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <button type="button" class="not_register border-0">
                                        <h4 class="color-1">{{ $row->name }} {{ $row->surname }}</h4>
                                        <div class="category-people mx-auto py-3">
                                            <div class="picture">
                                                <img id="profile-image-id-0" alt="" width="100%" height="100%"
                                                    src="{{ asset(isset($row->hero_image) ? $row->hero_image : 'template_old/images/blank.png') }}">
                                            </div>
                                        </div>
                                    </button>
                                @endauth

                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
            <div class="modal fade bd-example-modal-md" id="register_modal" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content border-warning border"
                        style="background-color: black; color: white; max-height: 400px; overflow-y: auto;">
                        <div class="modal-header" style="border-bottom: 5px solid #766d48;">
                            <h4 class="modal-title">Registeration is Free</h4>
                            <i class="close-modal" style="font-size: 2rem;"><b>&times;</b></i>
                        </div>
                        <div class="modal-body">
                            Do you want to register your self?
                        </div>
                        <div class="modal-footer text-center">
                            <a type="" href="{{ route('registration') }}" class="btn1 customBtn">Ok</a>
                            <a type="button" class="btn1 customBtn close-modal" data-dismiss="modal">Close</a>
                        </div>
                    </div>
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
        $(document).on("click", ".not_register", function() {
            $('#register_modal').modal('show');
        });
    </script>
@endpush
