@extends('layouts.master.template_old.master')
<script>
    var user_type = "{{ auth()->user()->type }}";
    var profile_type = "{{ auth()->user()->profile_type }}";
    var user_name = "{{ auth()->user()->name }}";
</script>
@push('css')
    <style>
        .booking-box .row,
        .booking-box .col-4,
        .booking-box .col-8 {
            border: 1px solid #c9b9b0;
            padding: 5px;

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
            margin-left: auto;
        }
    </style>
@endpush
@section('content')
    <script>
        const baseURL = "{{ request()->root() }}";
    </script>
    <div class="booking my-5">
        <div class="container">
            <h2 class="color-1 my-4 text-center">Your Booking History</h2>
            <div class="row justify-content-center">
                <div class="booking-box col-lg-8">
                    <div class="row text-center">
                        <div class="col-4">
                            <h4 class="month-of-year">
                                Date
                            </h4>
                        </div>
                        <div class="col-8 d-flex justify-content-center">
                            <h4 class="year ml-auto">
                                Details
                            </h4>
                            <div id="circle">
                                <a href="{{ url()->previous() }}" style="height: 25px">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="color: black"
                                        class="icon icon-tabler icon-tabler-arrow-left" width="25" height="25"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
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
                </div>
            </div>
        </div>


    </div>
@endsection
@push('script')
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
        });
    </script>

    <script src="{{ asset('template_old/js/freelancer-booking-history.js') }}?v={{ time() }}"></script>
@endpush
