@extends('layouts.master.template_new.master')

@push('css')
    <style>
        .site_btn {
            border: 0.2rem solid #000000;
        }
    </style>
@endpush

@section('content')
    <section id="candidates">
        <!-- <img src="{{ asset('template_new/assets/images/candidate_main.jpg') }}" alt="" class="main_img desktop">
                <img src="{{ asset('template_new/assets/images/styzeler-candidate-banner.JPG') }}" alt="" class="main_img mobile"> -->

        <img src="{{ asset('template_new/assets/images/candidate-banner.png') }}" alt="" class="main_img desktop">
        <img src="{{ asset('template_new/assets/images/candidate-banner-mb.png') }}" alt="" class="main_img mobile">

        <div class="contain">
            <div class="candidate_logo"><img src="{{ asset('template_new/assets/images/candidate_logo.jpg') }}"
                    alt=""></div>
            <ul class="btn_list" data-aos="fade-up" data-aos-duration="1000">
                <li>
                    <a href="{{ @Auth::user() ? route('hairstylist') . '?type=' . $type : 'javascript:;' }}"
                        class="shadow_btn {{ @!Auth::user() ? 'show_message' : '' }}"
                        style="font-size: 1.7rem; padding: 0 1rem;
                	justify-content: space-between;text-align: left;">Hair
                        Stylists
                        <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
                    </a>
                </li>
                <li>
                    <a href="{{ @Auth::user() ? route('beautician') . '?type=' . $type : 'javascript:;' }}"
                        class="shadow_btn {{ @!Auth::user() ? 'show_message' : '' }}"
                        style="font-size: 1.7rem; padding: 0 1rem;
                	justify-content: space-between;text-align: left;">Beauticians
                        <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
                    </a>
                </li>
                <li>
                    <a href="{{ @Auth::user() ? route('barber') . '?type=' . $type : 'javascript:;' }}"
                        class="shadow_btn {{ @!Auth::user() ? 'show_message' : '' }}"
                        style="font-size: 1.7rem; padding: 0 1rem;
                	justify-content: space-between;text-align: left;">Barbers
                        <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
                    </a>
                </li>
                <li>
                    <a href="{{ @Auth::user() ? route('weddingStylist') : 'javascript:;' }}"
                        class="shadow_btn {{ @!Auth::user() ? 'show_message' : '' }}"
                        style="font-size: 1.7rem; padding: 0 1rem;
                		justify-content: space-between;text-align: left;">Wedding
                        Stylists
                        <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
                    </a>
                </li>
            </ul>
            <div class="flexBlocks" data-aos="fade-up" data-aos-duration="1000">
                <div class="column">
                    <h1>Styzeler <span>Freelance Agency</span></h1>
                    <h2>The winning formula for both Candidate and Business owner</h2>
                    <div class="inner"
                        style="background-image: url('{{ asset('template_new/assets/images/candidate_block_bg.jpg') }}');">
                        <p>Candidates can be used in multiple ways, for a start-up business, they take away the pressure of
                            fixed-wage, for established businesses Freelance can serve as stand-by or oversee waiting lists
                            that become too long. A full-time position can be offered to a candidate that suits the company
                            policy</p>
                    </div>
                </div>
                <div class="column">
                    <h1>Freelance <span>Is the new full time</span></h1>
                    <div class="inner"
                        style="background-image: url('{{ asset('template_new/assets/images/candidate_block_bg2.jpg') }}');">
                        <p>Styzeler’s reputation is based on exceptional reliability and professionalism providing clients,
                            with experienced and qualified Freelancer, who have the skills to take any business and make a
                            difference straight away, taking the pressure off overstretched permanent personnel</p>
                    </div>
                    <div class="btn_blk d-flex justify-content-end mt-5 pt-4">
                        <a href="{{ route('register') }}" class="site_btn" {!! Auth::user() ? 'style="pointer-events: none"' : '' !!}>Register
                            <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="freedom" data-aos="fade-up" data-aos-duration="1000">
                <p>Enjoy the flexibility of freelancing and feel in control of</p>
                <h3>your freedom</h3>
            </div>
        </div>
        <img src="{{ asset('template_new/assets/images/candidate_main2.jpg') }}" alt="">
    </section>
    <div class="modal fade bd-example-modal-md" id="register_modal" role="dialog">
        <div class="modal-dialog modal-md modal-dialog-centered">
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
    <!-- candidates -->
@endsection

@push('script')
    <script>
        $(".show_message").click(function() {
            $("#register_modal").modal('show');
        });
        $(".close-modal").click(function() {
            $("#register_modal").modal('hide');
        });
    </script>
@endpush
