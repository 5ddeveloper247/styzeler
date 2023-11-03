@extends('layouts.master.template_old.master')
@push('css')
    <style>
        .booking-box .row,
        .booking-box .col-4,
        .booking-box .col-8 {
            border: 1px solid #c9b9b0;
            padding: 5px;

        }
        #circle {
            width: auto; /* Adjust the width and height as needed */
            height: 25px;
            background-color: #fdd431;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: auto;
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
            <h2 class="color-1 my-4 text-center">Your Schedule</h2>
            <div class="row justify-content-center">
                <div class="booking-box col-lg-8">
                    <div class="row text-center">
                        <div class="col-4">
                            <h4 class="month-of-year">Date
                            </h4>
                        </div>
                        <div class="col-8" style="display: flex; justify-content: center;">
                            <h4 class="year" style="margin-left: auto">
                                <span>Booking Details</span>
                            </h4>
                            <div id="circle">
                                <a href="{{ url()->previous() }}" style="height: 25px">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="color: black" class="icon icon-tabler icon-tabler-arrow-left" width="25" height="25" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l14 0"></path>
                                        <path d="M5 12l6 6"></path>
                                        <path d="M5 12l6 -6"></path>
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
                                <h4 style="color: #ffde59 ">Are you sure to <span id="confirm_or_cancel"></span> On Hold?
                                </h4>
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
