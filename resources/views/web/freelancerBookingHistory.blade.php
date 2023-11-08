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
    </style>
@endpush
@section('content')
    <script>
        const baseURL = "{{ request()->root() }}";
    </script>
    <div class="booking my-5">
        <div class="container">
            <h2 class="color-1 my-4 text-center">Your Schedule</h2>
            <div class="row justify-content-center">
                <div class="booking-box col-lg-8">
                    <div class="row text-center">
                        <div class="col-4">
                            <h4 class="month-of-year">
                                Date
                            </h4>
                        </div>
                        <div class="col-8">
                            <h4 class="year">
                                Booking Details
                            </h4>
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
