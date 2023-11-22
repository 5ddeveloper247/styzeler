@extends('layouts.master.template_old.master')
@push('css')
    <style>
        .booking-box .row,
        .booking-box .col-4,
        .booking-box .col-8 {
            border: 1px solid #c9b9b0;
            padding: 5px;

        }
    </style>
@endpush
@section('content')
    <script>
        const baseURL = "{{ request()->root() }}";
        var user_type = "{{ auth()->user()->type }}";
        var profile_type = "{{ auth()->user()->profile_type }}";
    </script>
    <div class="booking my-5">
        <div class="container">
            <h2 class="color-1 my-4 text-center">Your Bookings</h2>
            <div class="row justify-content-center">
                <div class="booking-box col-lg-8">
                    <div class="row text-center">
                        <div class="col-4">
                            <h4 class="month-of-year mt-1">Date
                            </h4>
                        </div>
                        <div class="col-8 d-flex">
                            <h4 class="ml-auto mt-1 text-center">
                                Details
                            </h4>
                            <div id="circle" class="my-auto ml-auto mr-1">
                                <a href="{{ url()->previous() }}" style="height: auto" cla>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-player-play-filled mt-1" width="20"
                                        height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round" style="transform: rotate(180deg);">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z"
                                            stroke-width="0" fill="currentColor" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row appointment-row p-3 text-left">
                        <!--<div class="col-4">
                                                                                                            <span class="day_of_week">Mon</span>
                                                                                                            <span class="day">16</span>
                                                                                                        </div>
                                                                                                        <div class="col-8">
                                                                                                            <span class="appointment">
                                                                                                                Compton Hair
                                                                                                                <div class="option text-right">
                                                                                                                <a href="">Confirm</a>
                                                                                                            </div>
                                                                                                            </span>
                                                                                                        </div>
                                                                                                        <div class="col-4 text-center">
                                                                                                            <span class="day_of_week">Mon</span>
                                                                                                            <span class="day">16</span>
                                                                                                        </div>
                                                                                                        <div class="col-8">
                                                                                                            <p class="appointment">

                                                                                                            </p>
                                                                                                        </div>
                                                                                                        <div class="col-4 text-center">
                                                                                                            <span class="day_of_week">Mon</span>
                                                                                                            <span class="day">16</span>
                                                                                                        </div>
                                                                                                        <div class="col-8">
                                                                                                            <p class="appointment">

                                                                                                            </p>
                                                                                                        </div>
                                                                                                        <div class="col-4 text-center">
                                                                                                            <span class="day_of_week">Mon</span>
                                                                                                            <span class="day">16</span>
                                                                                                        </div>
                                                                                                        <div class="col-8">
                                                                                                            <span class="appointment">
                                                                                                                Compton Hair
                                                                                                                <div class="option text-right">
                                                                                                                    <a href="">Confirm</a>
                                                                                                                </div>
                                                                                                            </span>
                                                                                                        </div>
                                                                                                        <div class="col-4 text-center">
                                                                                                            <span class="day_of_week">Mon</span>
                                                                                                            <span class="day">16</span>
                                                                                                        </div>
                                                                                                        <div class="col-8">
                                                                                                            <p class="appointment">

                                                                                                            </p>
                                                                                                        </div>
                                                                                                        <div class="col-4 text-center">
                                                                                                            <span class="day_of_week">Mon</span>
                                                                                                            <span class="day">16</span>
                                                                                                        </div>
                                                                                                        <div class="col-8">
                                                                                                            <p class="appointment">

                                                                                                            </p>
                                                                                                        </div>
                                                                                                        <div class="col-4 text-center">
                                                                                                            <span class="day_of_week">Mon</span>
                                                                                                            <span class="day">16</span>
                                                                                                        </div>
                                                                                                        <div class="col-8">
                                                                                                            <p class="appointment">

                                                                                                            </p>
                                                                                                        </div>
                                                                                                        <div class="col-4 text-center">
                                                                                                            <span class="day_of_week">Mon</span>
                                                                                                            <span class="day">16</span>
                                                                                                        </div>
                                                                                                        <div class="col-8">
                                                                                                            <p class="appointment">

                                                                                                            </p>
                                                                                                        </div> -->
                    </div>
                    {{-- <a class="logon_btn my-2" id="back-btn" href="{{ url()->previous() }}"
                        style="
                        width: fit-content;
                        justify-content: space-around;
                        float: inline-end;
                        border: 1px solid;
                        padding: 0.3rem;
                        color: rgb(196, 185, 176);
                        ">Back
                    </a> --}}
                </div>
            </div>
        </div>


    </div>
    <div class="modal confirm-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-dark">
                <div class="modal-header">

                </div>
                <form id="confirm_form">
                    <div class="modal-body">
                        <input type="hidden" id="booking_id" name="booking_id">

                        <div class="row">
                            <div class="col-md-12">
                                <h4 style="color: #ffde59 ">Are you sure to <span id="confirm_or_cancel"></span></h4>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer text-center">
                        <button type="button" class="btn customBtn book-slots" id="confirm_cancel_btn"></button>
                        <button type="button" class="btn customBtn" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(function() {
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
    @if (auth()->user()->type == 'client')
        <script src="{{ asset('template_old/js/client-booking.js') }}?v={{ time() }}"></script>
    @else
        <script src="{{ asset('template_old/js/freelancer-booking.js') }}?v={{ time() }}"></script>
    @endif
    <script src="{{ asset('customjs/web/profile/cancelBooking.js') }}?v={{ time() }}"></script>
@endpush
