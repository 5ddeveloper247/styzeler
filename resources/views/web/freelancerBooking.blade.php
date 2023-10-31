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
            <h2 class="color-1 my-4 text-center">Your Schedule</h2>
            <div class="row justify-content-center">
                <div class="booking-box col-lg-8">
                    <div class="row text-center">
                        <div class="col-4">
                            <h4 class="month-of-year">Date
                            </h4>
                        </div>
                        <div class="col-8">
                            <h4 class="year">Booking Details
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
