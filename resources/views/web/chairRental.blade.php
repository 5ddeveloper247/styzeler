@extends('layouts.master.template_old.master')

@push('css')
    <style>
        input:focus,
        input:active,
        textarea:focus,
        textarea:active {
            background: transparent !important;
            color: #ffde59 !important;
            font-weight: 600 !important;
        }

        .main_heading {
            font-size: 40px !important;
            font-weight: bold !important;
        }

        .sub_heading {
            font-size: 30px !important;
            font-weight: bold !important;
        }

        .rental .details input,
        .rental .details textarea {
            font-weight: 600;
            padding-right: 40px !important;
        }

        .sub_heading1 {
            /*font-size: 15px !important;*/
            font-weight: 600 !important;
        }

        /*.chair-rental-1 {*/
        /*    background: transparent !important;*/
        /*    color: #ffde59 ;*/
        /*}*/

        .change::placeholder {
            /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #000000 !important;
            opacity: 1 !important;
            /* Firefox */
        }

        .change:-ms-input-placeholder {
            /* Internet Explorer 10-11 */
            color: #000000 !important;
        }

        .change::-ms-input-placeholder {
            /* Microsoft Edge */
            color: #000000 !important;
        }
    </style>
@endpush

@section('content')
    <section class="rental p-md-5 my-md-5">
        <div class="rental-background p-md-5">
            <div class="container">
                <form id="chair_rental" class="chair-rental-2" autocomplete="off">
                    <div class="row">
                        <div class="col-4 col-lg-2">
                            <img src="{{ asset('template_old/images/logo.png') }}" alt="" width="100%">
                        </div>

                        <div class="col-lg-12" data-aos="fade-up">
                            <div class="details col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control change" id="salonName" name="salonName"
                                        aria-describedby="salon-name" placeholder="Salon Name" autocomplete="nope" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control change" id="salonAddress" name="salonAddress" rows="3" placeholder="Salon Address"
                                        autocomplete="nope" required></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control change" id="salonCountry" name="salonCountry"
                                        aria-describedby="salon-country" autocomplete="nope" placeholder="Country" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control change" id="salonCounty" name="salonCounty"
                                        aria-describedby="salon-country" autocomplete="nope" placeholder="County" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control change" id="salon-country-code"
                                        aria-describedby="salonCountryCode" name="salonCountryCode" placeholder="Post code"
                                        autocomplete="nope" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control change" id="salonMobile" name="salonMobile"
                                        aria-describedby="salon-mobile" placeholder="Phone" autocomplete="nope" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control change" id="spaceDescription" name="spaceDescription" name="space-description"
                                        style="height:8vw;" placeholder="Space Description" autocomplete="nope" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5 col-xl-4">
                            <div class="category">
                                <div class="heading text-center">
                                    <span><b>Contact Us</b></span>
                                </div>
                                <div class="mt-5">
                                    <h2 class="main_heading">Rent & Let</h2>
                                    <hr>

                                    <h4 class="sub_heading">Category</h4>
                                    <div class="form-group">
                                        <select id="rentalCategory" name="rentalCategory" class="form-control sub_heading1">
                                            <option value="Hairdressing Chair">Hairdressing Chair</option>
                                            <option value="Barber Chair">Barber Chair</option>
                                            <option value="Beauty Chair">Beauty Chair</option>
                                        </select>
                                    </div>

                                    <!--changing here-->

                                    <h4 class="sub_heading" style="font-size: 26px !important;">Rent & Let Category</h4>
                                    <div class="form-group">
                                        <select id="rentLet-category" name="rentLetCategory"
                                            class="form-control sub_heading1" onchange="rentLet(this);">
                                            <option value="">--select--</option>
                                            <option value="Rent and Let">Rent & Let</option>
                                            <option value="Rent and Let go">Rent & Let as you go</option>
                                        </select>
                                    </div>


                                    <h4 class="rent-and-let sub_heading" style="font-size: 22px !important;">Rent & Let</h4>
                                    <div class="form-group longRent rent-and-let">
                                        <select id="rent-let" name="rentAndLet" class="form-control sub_heading1"
                                            onchange="longRent(this);">
                                            <option value="">--select--</option>
                                            <option value="Weekly rent">Weekly Rent</option>
                                            <option value="Monthly rent">Monthly Rent</option>
                                        </select>
                                        <br>
                                        <div class="weeklyRent">
                                            <input type="number" class="form-control" id="rent-let-charge-weekly"
                                                name="weeklyRent" aria-describedby="rent-let-charge"
                                                placeholder="Weekly Rate &pound;">
                                        </div>
                                        <div class="monthlyRent">
                                            <input type="number" class="form-control" id="rent-let-charge-monthly"
                                                name="monthlyRent" aria-describedby="rent-let-charge"
                                                placeholder="Monthly Rate &pound;">
                                        </div>
                                    </div>


                                    <h4 class="rent-and-let-go sub_heading" style="font-size: 22px !important;">Rent & Let
                                        as you go</h4>
                                    <div class="form-group shortRent rent-and-let-go">
                                        <select id="rent-let-go" name="rentAndLetGo" class="form-control sub_heading1"
                                            onchange="shortRent(this);">
                                            <option value="">--select--</option>
                                            <option value="Daily rent">Daily Rent</option>
                                            <option value="Hourly rent">Hourly Rent</option>
                                        </select>
                                        <br>
                                        <div class="dailyRent">
                                            <input type="number" class="form-control" id="rent-let-charge-go-daily"
                                                name="dailyRent" aria-describedby="rent-let-charge"
                                                placeholder="Daily Rate &pound;">
                                        </div>
                                        <div class="hourlyRent">
                                            <input type="number" class="form-control" id="rent-let-charge-go-hourly"
                                                name="hourlyRent" aria-describedby="rent-let-charge"
                                                placeholder="Hourly Rate &pound;">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <input type="file" id="chair-picture-1" name="chairPicture1"
                                            class="form-control" accept=".jpg, .jpeg, .png" >
                                    </div>
                                    <div class="form-group">
                                        <input type="file" id="chair-picture-2" name="chairPicture2"
                                            class="form-control" accept=".jpg, .jpeg, .png" >
                                    </div>
                                    <div class="form-group">
                                        <input type="file" id="chair-picture-3" name="chairPicture3"
                                            class="form-control" accept=".jpg, .jpeg, .png">
                                    </div>
                                    <div class="col-12">
                                        <canvas id="canvas"></canvas>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input name="code" />
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <button class="btn border border-secondary" type="button" id="valid">Verify</button>
                                        </div>
                                        <div class="col-md-6 mt-2 text-right">
                                            <button class="btn border border-secondary" type="button" id="saveRentAndLet">Submit</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- not logged in-->
                <div class="modal not-loggedin-modal" tabindex="-1" role="dialog" data-keyboard="false"
                    data-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content bg-dark">
                            <div class="modal-header">
                                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button> -->
                            </div>
                            <div class="modal-body">
                                <h5 class="text-center">Sorry!</h5>
                                <p>You're not logged in!</p>
                                <p class="mt-2">Login to list a salon chair!</p>
                                <a href="{{ route('rentAndLet') }}" class="btn customBtn">Okay</a>

                            </div>
                            <div class="modal-footer text-center"></div>
                        </div>
                    </div>
                </div>

                <!-- not Business owner -->
                <div class="modal not-salon-owner-modal" tabindex="-1" role="dialog" data-keyboard="false"
                    data-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content bg-dark">
                            <div class="modal-header">
                                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button> -->
                            </div>
                            <div class="modal-body">
                                <h5 class="text-center">Sorry!</h5>
                                <p>You're not a business owner!</p>
                                <a href="{{ route('rentAndLet') }}" class="btn customBtn">Okay</a>

                            </div>
                            <div class="modal-footer text-center"></div>
                        </div>
                    </div>
                </div>

                <!-- Success Modal-->
                <div class="modal success-modal" tabindex="-1" role="dialog" data-keyboard="false"
                    data-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content bg-dark">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5 class="text-center">Request has been submitted!!</h5>
                                <!--<p class="mt-2">We will get back to you soon!</p>-->
                                <a href="{{ route('chairRental') }}" class="btn customBtn">Okay</a>

                            </div>
                            <div class="modal-footer text-center"></div>
                        </div>
                    </div>
                </div>

                <!--Verify modal-->
                <div class="modal verified-modal" tabindex="-1" role="dialog" data-keyboard="false"
                    data-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content bg-dark">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5 class="text-center">Verified Successfully!!</h5>
                                <!--<p class="mt-2">We will get back to you soon!</p>-->
                                <button type="button" class="btn customBtn mt-4" data-dismiss="modal">Okay</button>

                            </div>
                            <div class="modal-footer text-center"></div>
                        </div>
                    </div>
                </div>

                <!--Not verify modal-->
                <div class="modal not-verified-modal" tabindex="-1" role="dialog" data-keyboard="false"
                    data-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content bg-dark">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5 class="text-center">Please enter the right verification
                                    code!!!</h5>
                                <!--<p class="mt-2">We will get back to you soon!</p>-->
                                <button type="button" class="btn customBtn mt-4" data-dismiss="modal">Okay</button>

                            </div>
                            <div class="modal-footer text-center"></div>
                        </div>
                    </div>
                </div>

                <!-- Error Modal-->
                <div class="modal error-modal" tabindex="-1" role="dialog" data-keyboard="false"
                    data-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content bg-dark">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5 class="error-message text-center"></h5>
                                <!--<p class="mt-2">Please try again!</p>-->
                                <button type="button" class="btn customBtn mt-4" data-dismiss="modal">Okay</button>

                            </div>
                            <div class="modal-footer text-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('script')
    <script src="{{ asset('template_old/js/jquery-captcha.min.js') }}"></script>
    <script src="{{ asset('customjs/web/register/common.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('customjs/web/rentlet/rentLet.js') }}?v={{ time() }}"></script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
        });
        const captcha = new Captcha($('#canvas'));
        $(document).ready(function() {


            @if (!Auth::user())
                $(".not-loggedin-modal").modal('show');
            @elseif (Auth::user()->type == 'wedding' ||
                    Auth::user()->type == 'hairStylist' ||
                    Auth::user()->type == 'beautician' ||
                    Auth::user()->type == 'barber' ||
                    Auth::user()->type == 'client')

                $(".not-salon-owner-modal").modal('show');
            @endif
        });
    </script>
@endpush
