@extends('layouts.master.template_new.master')
@push('css')
    <style>
        .booking-box .row,
        .booking-box .col-4,
        .booking-box .col-8 {
            border: 1px solid #c9b9b0;
            padding: 5px;

        }

        tr,
        td {
            border: 1px solid #fdd431;
            padding: 5px;
        }

        @media only screen and (max-width: 600px) {
            #content_row {
                padding: 0px 15px;
            }
        }

        #circle {
            width: auto;
            /* Adjust the width and height as needed */
            height: 25px;
            background-color: #fdd431;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@endpush
@section('content')
    <script>
        const baseURL = "{{ request()->root() }}";
    </script>
    <div class="booking my-5">
        <div class="container">
            <div style="display: flex; justify-content: center;">
                <h1 class="color-1 m-4 mx-4 my-4 text-center">Your Cart</h1>
                <div id="circle" class="my-4">
                    <a href="{{ url()->previous() }}" style="height: auto">
                        <svg xmlns="http://www.w3.org/2000/svg" style="color: black"
                            class="icon icon-tabler icon-tabler-arrow-left" width="25" height="25"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l14 0"></path>
                            <path d="M5 12l6 6"></path>
                            <path d="M5 12l6 -6"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="row justify-content-center" id="content_row">
                <div class="booking-box col-lg-8">
                    {{-- <div class="row text-center">
                        <div class="col-4">
                            <h4 class="month-of-year">Date
                            </h4>
                        </div>
                        <div class="col-8">
                            <h4 class="year">Booking Details
                            </h4>
                        </div>
                    </div> --}}
                    <div class="row text-left">
                        <table id="cart_line_table">

                        </table>

                    </div>
                    <div id="cart_services" class="d-flex justify-content-center d-none my-4">
                        @if ($tokens > 0)
                            <a href="{{ route('bookFreelancer') }}" class="book_freelance_btn freelancer_btn">
                                <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""> Book a
                                Freelancer
                            </a>
                        @else
                            <a href="javascript:;" class="book_freelance_btn error-booking freelancer_btn">
                                <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""> Book a
                                Freelancer
                            </a>
                        @endif
                        <ul class="check_list">
                            <li><img src="{{ asset('template_new/assets/images/tick2.svg') }}" alt=""> All
                                candidates are DBS verified</li>
                            <li><img src="{{ asset('template_new/assets/images/tick2.svg') }}" alt=""> At - Home
                                service 24/7</li>
                            <li><img src="{{ asset('template_new/assets/images/tick2.svg') }}" alt=""> Minimum call
                                out &pound;30</li>
                        </ul>
                    </div>
                    {{-- <a class="logon_btn my-5" id="back-btn" href="{{ url()->previous() }}"
                        style="
                        width: fit-content;
                        justify-content: space-around;
                        float: inline-end;
                        font-size: 1.6rem;
                        padding: 1.5rem
                        ">Back
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-md" id="cart_line_delete" role="dialog">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content border-warning border"
                style="background-color: black; color: white; max-height: 400px; overflow-y: auto;">
                <div class="modal-header" style="border-bottom: 5px solid #766d48;">
                    <h4 class="modal-title">Delete?</h4>
                    <i class="close-modal closeCartConfirm" style="font-size: 2rem;cursor:pointer;"><b>&times;</b></i>
                </div>
                <div class="modal-body">
                    <h5 class="text-center">Are you Sure You Want to Delete?</h5>
                </div>
                <div class="modal-footer text-center">
                    <a type="" href="javascript:;" class="btn1 customBtn" id="confirm_delete">Yes</a>
                    <a type="button" class="btn1 customBtn closeCartConfirm" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-md" id="fail-modal" role="dialog">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content border-warning border"
                style="background-color: black; color: white; max-height: 400px; overflow-y: auto;">
                <div class="modal-header" style="border-bottom: 5px solid #766d48;">
                    <h4 class="modal-title">Buy Package</h4>
                    <i class="close-modal" data-dismiss="modal" style="font-size: 2rem;"><b>&times;</b></i>
                </div>
                <div class="modal-body">
                    Insufficient tokens, first buy package!
                </div>
                <div class="modal-footer text-center">
                    <a type="" href="{{ route('home_service') }}#packages" class="btn1 customBtn">Ok</a>
                    <a type="button" class="btn1 customBtn close-modal" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal success-modal" id="cart_line_delete" tabindex="-1" role="dialog" data-keyboard="false"
        data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h4>Delete?</h4>
                </div>
                <div class="modal-body">
                    <h5 class="text-center">Are you Sure You Want to Delete?</h5>

                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn1 customBtn" id="confirm_delete">Delete</button>

                </div>
            </div>
        </div>
    </div> --}}
@endsection
@push('script')
    <script>
        $(function() {

            $(document).on("click", ".error-booking", function() {
                $('#fail-modal').modal('show');
            });
            /***************** Change Back button color on hover effect
             * Code Added by: Muhammad Umer *****************/
            $('a#back-btn').hover(
                function() {
                    $(this).css('color', '#FFFFFF');
                },
                function() {
                    $(this).css('color', '#c4b9b0');
                }
            );
            /***************** End *****************/
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
        });
    </script>
    <script src="{{ asset('customjs/web/cart/cart.js') }}?v={{ time() }}"></script>
    @if (auth()->user()->type == 'client')
    @else
        {{-- <script src="{{ asset('template_old/js/freelancer-booking.js') }}?v={{ time() }}"></script> --}}
    @endif
@endpush
