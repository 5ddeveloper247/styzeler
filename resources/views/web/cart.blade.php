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
                    <a class="logon_btn my-5" id="back-btn" href="{{ url()->previous() }}" 
                        style=" 
                        width: fit-content;
                        justify-content: space-around;
                        float: inline-end;
                        font-size: 1.6rem;
                        padding: 1.5rem
                        ">Back
                    </a>
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
