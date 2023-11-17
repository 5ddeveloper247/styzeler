@extends('layouts.master.template_old.master')

@push('css')
    <style>

    </style>
@endpush

@section('content')

    <div>
        <img src="{{ asset('template_old/images/rent-let-top-banner.png') }}" width="100%" />
    </div>

    <div class="rent-let">
        <div class="container">
            <div class="text-center">
                <a href="{{ route('rentLetHairstylist') }}"
                    class="btn beautyTherapistBtn {{ @$page == 'hairstylist' ? 'customBtnSelected' : 'customBtn' }} my-4">Hairstylist
                    / Barber Chair</a>
                <br>
                <a href="{{ route('rentLetBeautyTherapist') }}"
                    class="btn hairstylistBtn {{ @$page == 'beauty-therapist' ? 'customBtnSelected' : 'customBtn' }} mb-4">Beauty
                    therapist Chair</a>
            </div>
            <div class="row chair-row my-lg-5">
                @if (count($rentLetList))
                    @foreach ($rentLetList as $rentLet)
                        <div class="col-lg-6 mt-5">
                            <div id="24">
                                <div class="row">
                                    <div class="col-md-6 therapist-content p-3 px-4">
                                        <h4>Hairdressing Chair</h4>
                                        <p>
                                            <strong>{{ $rentLet->rent_let_category }}</strong>
                                        </p>
                                        <p>

                                            @if ($rentLet->rent_let_type == 'Weekly rent')
                                                <strong>{{ @$rentLet->rent_let_type }}
                                                    &pound;{{ number_format(@$rentLet->weekly_rent, 2) }}</strong>
                                            @elseif($rentLet->rent_let_type == 'Monthly rent')
                                                <strong>{{ @$rentLet->rent_let_type }}
                                                    &pound;{{ number_format(@$rentLet->monthly_rent, 2) }}</strong>
                                            @elseif($rentLet->rent_let_type == 'Daily rent')
                                                <strong>{{ @$rentLet->rent_let_type }}
                                                    &pound;{{ number_format(@$rentLet->daily_rent, 2) }}</strong>
                                            @elseif($rentLet->rent_let_type == 'Hourly rent')
                                                <strong>{{ @$rentLet->rent_let_type }}
                                                    &pound;{{ number_format(@$rentLet->hourly_rent, 2) }}</strong>
                                            @endif

                                        </p>
                                        <p>
                                            <strong>Name: </strong>{{ $rentLet->salon_name }}
                                        </p>
                                        <p>
                                            <strong>Address: </strong>{{ $rentLet->salon_address }}
                                        </p>
                                        <p>
                                            <strong>Country: </strong>{{ $rentLet->country }}
                                        </p>
                                        <p>
                                            <strong>County: </strong>{{ $rentLet->county }}
                                        </p>
                                        <p>
                                            <strong>Email: </strong>
                                            <a href="mailto:{{ @$rentLet->user->email }}">{{ @$rentLet->user->email }}</a>
                                            <span class="customTooltip">
                                                <span class="exclamation">
                                                    <i class="fa fa-exclamation" aria-hidden="true"></i>&nbsp;&nbsp;
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </span>
                                                <span class="tooltiptext">Use the email to contact business owner for more
                                                    info!</span>
                                            </span>
                                        </p>
                                        {{-- <p>
                                            <strong>Mobile: </strong>{{ $rentLet->phone }}
                                        </p> --}}
                                        <p>
                                            <strong>Postal Code: </strong>{{ $rentLet->post_code }}
                                        </p>
                                        <p>
                                            <strong>Space Description: </strong>{{ $rentLet->space_description }}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="therapist-content-frame p-2" id="salon-space">
                                            <div id="carouselExampleControls_{{ $rentLet->id }}" class="carousel slide"
                                                data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item">
                                                        <img id="salon-image-id-10" alt="" width="100%"
                                                            height="400px"
                                                            src="{{ asset(isset($rentLet->image1) && $rentLet->image1 != '' ? $rentLet->image1 : 'template_new/assets/images/application_logo.jpg') }}">
                                                    </div>
                                                    <div class="carousel-item active">
                                                        <img id="salon-image-id-20" alt="" width="100%"
                                                            height="400px"
                                                            src="{{ asset(isset($rentLet->image2) && $rentLet->image2 != '' ? $rentLet->image2 : 'template_new/assets/images/application_logo.jpg') }}">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img id="salon-image-id-30" alt="" width="100%"
                                                            height="400px"
                                                            src="{{ asset(isset($rentLet->image3) && $rentLet->image3 != '' ? $rentLet->image3 : 'template_new/assets/images/application_logo.jpg') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <a class="carousel-control-prev-1"
                                                href="#carouselExampleControls_{{ $rentLet->id }}" role="button"
                                                data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next-1" style="float: right"
                                                href="#carouselExampleControls_{{ $rentLet->id }}" role="button"
                                                data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>


            <!-- Booking Success Message-->
            <div class="modal success-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-center">Congratulations!</h5>
                            <p>You've booked salon chair successfully!</p>
                            <button type="button" class="btn customBtn" data-dismiss="modal">Close</button>

                        </div>
                        <div class="modal-footer text-center"></div>
                    </div>
                </div>
            </div>

            <!-- Booking Fail Message-->
            <div class="modal fail-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-center">Sorry!</h5>
                            <p>Chair is booked for the day!</p>
                            <button type="button" class="btn customBtn" data-dismiss="modal">Close</button>

                        </div>
                        <div class="modal-footer text-center"></div>
                    </div>
                </div>
            </div>
            <!-- not Logged in-->
            <div class="modal not-loggedin-modal" tabindex="-1" role="dialog" data-keyboard="false"
                data-backdrop="static">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-center">Sorry!</h5>
                            <p>you're not logged in!</p>
                            <button type="button" class="btn customBtn" data-dismiss="modal">Close</button>

                        </div>
                        <div class="modal-footer text-center"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('script')
@endpush
