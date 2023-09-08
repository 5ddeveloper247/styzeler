@extends('layouts.master.template_old.master')

@push('css')
@endpush
@section('content')
    <div class="newProfile container my-5">
        <div class="newProfile-header">
            <h4>Hairdressing & Barber Salon Owner Profile Building </h4>

        </div>
        <div>
            <form class="my-5" id="register_form">
                <input type="hidden" name="type" value="hairdressingSalon">
                <div class="profilePicture">
                    <img id="blah" class="rounded-circle" accept=".jpg, .jpeg, .png"
                        src="{{ asset('template_old/images/blank.png') }}" alt="your image" /> <br>

                    <input id="owner-picture" name="owner_picture" class="my-4 col-lg-6 hidden" type='file'
                        onchange="loadFile(event);" />
                    <label for="owner-picture">+</label>

                </div>
                <div class="personalDetails">
                    <h4>Personal Details</h4>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6 " id="owner-name" name="owner_name"
                            aria-describedby="owner-name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6 " id="owner-surname" name="owner_surname"
                            aria-describedby="owner-surname" placeholder="Surname">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control col-lg-6 " id="owner-address" name="owner_address" rows="3" placeholder="Address"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6 " id="owner-postcode" name="owner_postcode"
                            aria-describedby="owner-postcode" placeholder="Postcode">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6 " id="owner-telephone" name="owner_telephone"
                            aria-describedby="owner-telephone" placeholder="Telephone">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6 " id="owner-email" name="owner_email"
                            aria-describedby="owner-email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6 " id="owner-password" name="owner_password"
                            aria-describedby="owner-password" placeholder="Password">
                    </div>

                </div>
                <div class="list my-5">
                    <h4 class="py-5 text-center">List products and service that your company provide</h4>
                </div>
                <div class="hair-cutting my-5">
                    <h4>Hair-Cutting</h4>
                    <h5><u>Services</u></h5>
                    <div class="form-check">
                        <input type="hidden" name="hairCuttingServices[heading]" value="Hair-Cutting">
                        <input type="hidden" name="hairCuttingServices[subHeading]" value="Services">
                        <input class="form-check-input" type="checkbox" name="hairCuttingServices[]"
                            id="stylist-customer-ladies" value="Ladies">
                        <label class="form-check-label" for="">Ladies</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hairCuttingServices[]"
                            id="stylist-customer-gents" value="Gents">
                        <label class="form-check-label" for="">Gents</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hairCuttingServices[]"
                            id="stylist-customer-kids" value="Kids">
                        <label class="form-check-label" for="">Kids</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hairCuttingServices[]"
                            id="stylist-customer-afro" value="Afro Caribbean">
                        <label class="form-check-label" for="">Afro Caribbean</label>
                    </div>
                </div>
                <div class="male-grooming my-5">
                    <h4>Barber Male Grooming</h4>
                    <h5><u>Services</u></h5>
                    <div class="form-check">
                        <input type="hidden" name="barberMaleGroomingServices[heading]" value="Barber Male Grooming">
                        <input type="hidden" name="barberMaleGroomingServices[subHeading]" value="Services">
                        <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]"
                            id="scissors-cut" value="Scissors Cut">
                        <label class="form-check-label" for="scissors-cut">Scissors Cut</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]"
                            id="clipper-cut" value="Clipper Cut">
                        <label class="form-check-label" for="clipper-cut">Clipper Cut</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]"
                            id="beard-shaped" value="Beard Shaped">
                        <label class="form-check-label" for="beard-shaped">Beard Shaped</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]"
                            id="skin-fade" value="Skin Fade">
                        <label class="form-check-label" for="skin-fade">Skin Fade</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]"
                            id="wet-shave" value="Wet Shave">
                        <label class="form-check-label" for="wet-shave">Wet Shave</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]"
                            id="hot-towel" value="Hot towel">
                        <label class="form-check-label" for="">Hot Towel</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]"
                            id="chemical-relaxer" value="Chemical Relaxer">
                        <label class="form-check-label" for="chemical-relaxer">Chemical Relaxer</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="barberMaleGroomingServices[]"
                            id="gray-blending" value="Gray Blending">
                        <label class="form-check-label" for="gray-blending">Gray Blending</label>
                    </div>
                </div>
                <div class="styling-products my-5">
                    <h4>Styling Products</h4>
                    <div class="form-check">
                        <input type="hidden" name="stylingProducts[heading]" value="Styling Products">
                        {{-- <input type="hidden" name="stylingProducts['subHeading']" value="Services"> --}}
                        <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="kerastase"
                            value="Kerastase">
                        <label class="form-check-label" for="kerastase">Kerastase</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="loreal-tecni-art"
                            value="L'oreal Tecni Art">
                        <label class="form-check-label" for="loreal-tecni-ar">L'oreal Tecni Art</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="stylingProducts[]"
                            id="schwarzkopf-bc-bonacure" value="Schwarzkopf Bc Bonacure">
                        <label class="form-check-label" for="schwarzkopf-bc-bonacure">Schwarzkopf Bc Bonacure</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="keracare"
                            value="KeraCare">
                        <label class="form-check-label" for="keracare">KeraCare</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="redken"
                            value="Redken">
                        <label class="form-check-label" for="redken">Redken</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="anita-grant"
                            value="Anita Grant">
                        <label class="form-check-label" for="nita-grant">Anita Grant</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="fudge"
                            value="Fudge">
                        <label class="form-check-label" for="fudge">Fudge</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="moroccan-oil"
                            value="Moroccan Oil">
                        <label class="form-check-label" for="moroccan-oil">Moroccan Oil</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="kevin-murphy"
                            value="Kevin Murphy">
                        <label class="form-check-label" for="kevin-murphy">Kevin Murphy</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="proraso"
                            value="Proraso">
                        <label class="form-check-label" for="proraso">Proraso</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="wella-eimi"
                            value="Wella EIMI">
                        <label class="form-check-label" for="wella-eimi">Wella EIMI</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="shu-uemura"
                            value="Shu Uemura">
                        <label class="form-check-label" for="shu-uemura">Shu Uemura</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="stylingProducts[]" id="aveda"
                            value="Aveda">
                        <label class="form-check-label" for="aveda">Aveda</label>
                    </div>
                </div>
                <div class="hair-color my-5">
                    <h4>Hair Color</h4>
                    <h5><u>Brands</u></h5>
                    <div class="form-check">
                        <input type="hidden" name="hairColorBrands[heading]" value="Hair Color">
                        <input type="hidden" name="hairColorBrands[subHeading]" value="Brands">
                        <input class="form-check-input" type="checkbox" id="loreal" value="L’Oréal"
                            name="hairColorBrands[]">
                        <label class="form-check-label" for="loreal">L’Oréal</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="wella" value="Wella"
                            name="hairColorBrands[]">
                        <label class="form-check-label" for="wella">Wella</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="schwarzkopf" value="Schwarzkopf"
                            name="hairColorBrands[]">
                        <label class="form-check-label" for="schwarzkopf">Schwarzkopf</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="redken" value="Redken"
                            name="hairColorBrands[]">
                        <label class="form-check-label" for="redken">Redken</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="matrix" value="Matrix"
                            name="hairColorBrands[]">
                        <label class="form-check-label" for="matrix">Matrix</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="goldwell" value="Goldwell"
                            name="hairColorBrands[]">
                        <label class="form-check-label" for="goldwell">Goldwell</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="aveda" value="Aveda"
                            name="hairColorBrands[]">
                        <label class="form-check-label" for="aveda">Aveda</label>
                    </div>
                    <h5 class="mt-5"><u>Services</u></h5>
                    <div class="form-check">
                        <input type="hidden" name="hairColorServices[heading]" value="Hair Color">
                        <input type="hidden" name="hairColorServices[subHeading]" value="Services">
                        <input class="form-check-input" type="checkbox" id="fashion-color" value="Fashion Color"
                            name="hairColorServices[]">
                        <label class="form-check-label" for="fashion-color">Fashion Color</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="highlights" value="Highlights"
                            name="hairColorServices[]">
                        <label class="form-check-label" for="highlights">Highlights</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="balayage" value="Balayage"
                            name="hairColorServices[]">
                        <label class="form-check-label" for="balayage">Balayage</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="colour-correction" value="Colour Correction"
                            name="hairColorServices[]">
                        <label class="form-check-label" for="colour-correction">Colour Correction</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="full-head-bleach" value="Full Head Bleach"
                            name="hairColorServices[]">
                        <label class="form-check-label" for="full-head-bleach">Full Head Bleach</label>
                    </div>
                </div>
                <div class="chemical-treatments my-5">
                    <h4>Chemical Treatments</h4>
                    <h5><u>Services</u></h5>
                    <div class="form-check">
                        <input type="hidden" name="chemicalTreatmentServices[heading]" value="Chemical Treatments">
                        <input type="hidden" name="chemicalTreatmentServices[subHeading]" value="Services">
                        <input class="form-check-input" type="checkbox" id="perm" value="Perm"
                            name="chemicalTreatmentServices[]">
                        <label class="form-check-label" for="perm">Perm</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="brazilian-blow-dry"
                            value="Brazilian Blow-dry" name="chemicalTreatmentServices[]">
                        <label class="form-check-label" for="brazilian-blow-dry">Brazilian Blow-dry</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="keratin-treatment" value="Keratin Treatment"
                            name="chemicalTreatmentServices[]">
                        <label class="form-check-label" for="keratin-treatment">Keratin Treatment</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="chemical-relaxer" value="Chemical Relaxer"
                            name="chemicalTreatmentServices[]">
                        <label class="form-check-label" for="chemical-relaxer">Chemical Relaxer</label>
                    </div>

                    <h5 class="mt-5"><u>Products</u></h5>
                    <div class="form-check">
                        <input type="hidden" name="chemicalTreatmentProducts[heading]" value="Chemical Treatments">
                        <input type="hidden" name="chemicalTreatmentProducts[subHeading]" value="Products">
                        <input class="form-check-input" type="checkbox" id="kerastraight" value="kerastraight"
                            name="chemicalTreatmentProducts[]">
                        <label class="form-check-label" for="kerastraight">Kerastraight</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="global-keratin" value="Global Keratin"
                            name="chemicalTreatmentProducts[]">
                        <label class="form-check-label" for="global-keratin">Global Keratin</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="cocochoco-brazilian-keratin"
                            value="Cocochoco Brazilian" name="chemicalTreatmentProducts[]">
                        <label class="form-check-label" for="cocochoco-brazilian-keratin">Cocochoco Brazilian
                            Keratin</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="goldwell-kerasilk" value="Goldwell KeraSilk"
                            name="chemicalTreatmentProducts[]">
                        <label class="form-check-label" for="goldwell-kerasilk">Goldwell KeraSilk </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="schwarzkopf-professional"
                            value="Schwarzkopf Professional" name="chemicalTreatmentProducts[]">
                        <label class="form-check-label" for="schwarzkopf-professional">Schwarzkopf Professional</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="wella-professionals"
                            value="Wella Professionals" name="chemicalTreatmentProducts[]">
                        <label class="form-check-label" for="wella-professionals">Wella Professionals</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sibel" value="Sibel"
                            name="chemicalTreatmentProducts[]">
                        <label class="form-check-label" for="sibel">Sibel</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="loreal-professionnel"
                            value="L'Oréal Professionnel" name="chemicalTreatmentProducts[]">
                        <label class="form-check-label" for="loreal-professionnel">L'Oréal Professionnel</label>
                    </div>
                </div>
        </div> -->
        <div class="terms-conditions text-center">
            <div class="terms my-5 btn ">

                <button type="button" class="btn customBtn" data-toggle="modal" data-target="#exampleModalLong">
                    Agree To Terms and Conditions
                </button>

                <!-- Modal -->
                <div class="modal fade terms-conditions-modal" id="exampleModalLong" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-keyboard="false"
                    data-backdrop="static">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5 class="modal-title text-center" id="exampleModalLongTitle">Terms and
                                    Conditions</h5>

                                <div class="form-check ">
                                    <a href="{{ route('privacyPolicy') }}" target="_blank"
                                        rel="noopener noreferrer">Privacy Policy</a><br>
                                    <a href="{{ route('termAndConditions') }}" target="_blank"
                                        rel="noopener noreferrer">Terms & Conditions</a><br>
                                    <a href="{{ route('webTermAndConditions') }}" target="_blank"
                                        rel="noopener noreferrer">Website Terms & Conditions</a><br>
                                    <input class="form-check-input btn customBtn" type="checkbox"
                                        id="terms-and-conditions" value="1" name="agree">
                                    <label class="form-check-label " for="terms-and-conditions">Agree To Terms and
                                        Conditions</label>
                                </div>
                                <div class="submit text-center mt-5">
                                    <button type="submit" id="submit_button" class="btn customBtn"
                                        disabled>Submit</button>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Success Modal-->
        <div class="modal success-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog " role="document">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center">Congratulations!</h5>
                        <p>You've registered successfully!</p>
                        <button type="button" class="btn customBtn" onclick="redirect();">Okay</button>

                    </div>
                    <div class="modal-footer text-center">
                    </div>
                </div>
            </div>
        </div>

        <!--Error Modal-->
        <div class="modal error-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog " role="document">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-center error-message"></h5>
                        <!--<p>Please try again!</p>-->
                        <button type="button" class="btn customBtn" data-dismiss="modal">Okay</button>

                    </div>
                    <div class="modal-footer text-center">
                    </div>
                </div>
            </div>
        </div>

        </form>
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
        $(document).on('click', '#submit_button', function(e) {

            e.preventDefault();

            let type = 'POST';
            let url = '';
            let message = '';
            let form = $('#register_form');
            let data = new FormData(form[0]);
            if ($(this).text() == 'Submit') {
                url = '{{ route('registration') }}';
            }

            // PASSING DATA TO FUNCTION
            SendAjaxRequestToServer(type, url, data, '', registrationResponse, 'spinner_button', 'submit_button');

        });

        function registrationResponse(response) {

            // SHOWING MESSAGE ACCORDING TO RESPONSE
            if (response.status == 200) {
                toastr.success(response.message, '', {
                    timeOut: 3000
                });

                $('.terms-conditions-modal').modal('hide');

                setTimeout(function() {
                    window.location.href = '{{ route('login') }}';
                }, 3000);
            } else {

                // CALLING OUR FUNTION ERROR & SUCCESS HANDLING
                error = response.responseJSON.message;
                var is_invalid = response.responseJSON.errors;

                // Loop through the error object
                $.each(is_invalid, function(key) {

                    // Assuming 'key' corresponds to the form field name
                    var inputField = $('[name="' + key + '"]');
                    // Add the 'is-invalid' class to the input field's parent or any desired container
                    inputField.closest('.form-control').addClass('is-invalid');
                });
                // error_msg = error.split('(');

                toastr.error(error, '', {
                    timeOut: 3000
                });
            }

        }
    </script>
    <script src="{{ asset('customjs/web/register/common.js') }}"></script>
@endpush
