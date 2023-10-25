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
    </style>
@endpush
@section('content')
    <script>
        const baseURL = "{{ request()->root() }}";
    </script>
    <div class="booking my-5">
        <div class="container">
            <h2 class="color-1 my-4 text-center">Your Cart</h2>
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
                </div>
            </div>
        </div>
    </div>

    <div class="modal success-modal" id="cart_line_delete" tabindex="-1" role="dialog" data-keyboard="false"
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
    <script src="{{ asset('customjs/web/cart/cart.js') }}?v={{ time() }}"></script>
    @if (auth()->user()->type == 'client')
    @else
        {{-- <script src="{{ asset('template_old/js/freelancer-booking.js') }}?v={{ time() }}"></script> --}}
    @endif
@endpush
