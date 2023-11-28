@extends('layouts.master.template_old.master')

@push('css')
@endpush

@section('content')
    <div class="newProfile container my-5">
        <div class="newProfile-header">
            <h4>Client pages profile building</h4>
        </div>
        <div>
            <form id="register_form" class="my-5">
                <input type="hidden" name="type" value="client">

                <div class="profilePicture">
                    <img id="blah" class="rounded-circle" src="{{ asset('template_old/images/blank.png') }}"
                        alt="your image" /> <br>

                    <input id="owner-picture" name="owner_picture" accept=".jpg, .jpeg, .png" class="col-lg-6 my-4 hidden"
                        type='file' onchange="loadFile(event);" />
                    <label for="owner-picture">+</label>

                </div>
                <div class="personalDetails">
                    <h4>Personal Details</h4>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6" id="owner-name" name="owner_name"
                            aria-describedby="owner-name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6" id="owner-surname" name="owner_surname"
                            aria-describedby="owner-surname" placeholder="Surname">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control col-lg-6" id="owner-address" name="owner_address" rows="3" placeholder="Address"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6" id="owner-postcode" name="owner_postcode"
                            aria-describedby="owner-postcode" placeholder="Postcode">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6 " id="owner-telephone" name="owner_telephone"
                            aria-describedby="owner-telephone" placeholder="Telephone">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6" id="owner-email" name="owner_email"
                            aria-describedby="owner-email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control col-lg-6" id="owner-password" name="owner_password"
                            aria-describedby="owner-password" placeholder="Password">
                    </div>

                </div>
                <div class="terms-conditions text-center">
                    <div class="terms btn my-5">

                        <button type="button" class="btn customBtn agreeTermCond" data-toggle="modal"
                            data-target="#exampleModalLong">
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

                                        <div class="form-check">
                                            <a href="{{ route('privacyPolicy') }}" target="_blank"
                                                rel="noopener noreferrer">Privacy Policy</a><br>
                                            <a href="{{ route('webTermAndConditions') }}" target="_blank"
                                                rel="noopener noreferrer">Website Terms & Conditions</a><br>
                                            <a href="{{ route('freelancerTermAndConditions') }}" target="_blank"
                                                rel="noopener noreferrer">Freelancer Terms & Conditions</a><br>
                                            <input class="form-check-input btn customBtn" type="checkbox"
                                                id="terms-and-conditions" value="1" name="agree">
                                            <label class="form-check-label" for="agree">Agree To Terms and
                                                Conditions</label>
                                        </div>
                                        <div class="submit mt-5 text-center">
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
            </form>


        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('customjs/web/register/common.js') }}"></script>

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
        });

        $(document).on('click', '.agreeTermCond', function(e) {
            $("#terms-and-conditions").prop('checked', false);
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
            $('[name]').removeClass('is-invalid');
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
@endpush
