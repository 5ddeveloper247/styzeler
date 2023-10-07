@extends('layouts.master.template_old.master')

@push('css')
@endpush

@section('content')
    <!-- Content -->
    <div class="login">
        <section class="content-body container">
            <div class="row justify-content-center text-center" data-aos="fade-up">
                <div class="col-10 col-md-7">

                    <div class="login-body p-sm-5 px-3 py-5">
                        <form class="p-md-5" id="login_form">
                            <div class="form-group p-md-2">
                                <input type="email" class="form-control" id="user-email" aria-describedby="emailHelp"
                                    name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group p-md-2">
                                <input type="password" class="form-control" id="user-password" placeholder="Password"
                                    name="password" required>
                                <br><input type="checkbox" class="text-left" onclick="showPassword()">&nbsp;Show Password
                            </div>

                            <button type="submit" id="submit_button" class="p-2">Continue</button>

                            <div class="my-sm-3 my-lg-5 my-2">
                                <span><a href="{{ route('forgetPassword') }}">Forgot password?</a></span>

                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <!-- Login Email Error Message-->
            <div class="modal invalid-email-modal" tabindex="-1" role="dialog" data-keyboard="false"
                data-backdrop="static">
                <div class="modal-dialog" role="document">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-center">Sorry!</h5>
                            <p class="mt-2">User registration not found!!</p>
                            <button type="button" class="btn customBtn mt-4" onclick="redirect();">Okay</button>

                        </div>
                        <div class="modal-footer text-center">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Login Password Error Message-->
            <div class="modal invalid-password-modal" tabindex="-1" role="dialog" data-keyboard="false"
                data-backdrop="static">
                <div class="modal-dialog" role="document">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-center">Sorry!</h5>
                            <p class="mt-2">Invalid Password! Try Again.</p>
                            <button type="button" class="btn customBtn mt-4" onclick="redirect();">Okay</button>

                        </div>
                        <div class="modal-footer text-center">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Password Change Success -->
            <div class="modal password-change-success" tabindex="-1" role="dialog" data-keyboard="false"
                data-backdrop="static">
                <div class="modal-dialog" role="document">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="mt-2">Password changed successfully.</p>
                            <button type="button" class="btn customBtn mt-4" onclick="redirect();">Okay</button>

                        </div>
                        <div class="modal-footer text-center">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Password Change Error -->
            <div class="modal password-change-error" tabindex="-1" role="dialog" data-keyboard="false"
                data-backdrop="static">
                <div class="modal-dialog" role="document">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-center">Sorry!</h5>
                            <p class="mt-2">Password couldn't be changed. Try later!</p>
                            <button type="button" class="btn customBtn mt-4" onclick="redirect();">Okay</button>

                        </div>
                        <div class="modal-footer text-center">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('script')
    <script src="{{ asset('customjs/web/register/common.js') }}"></script>
    <script script>
        function showPassword() {
            var x = document.getElementById("user-password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

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
            let form = $('#login_form');
            let data = new FormData(form[0]);
            if ($(this).text() == 'Submit') {
                url = '{{ route('login') }}';
            }

            // PASSING DATA TO FUNCTION
            $('[name]').removeClass('is-invalid');
            SendAjaxRequestToServer(type, url, data, '', loginResponse, 'spinner_button', 'submit_button');

        });

        function loginResponse(response) {

            // SHOWING MESSAGE ACCORDING TO RESPONSE
            if (response.status == 200) {
                toastr.success(response.message, '', {
                    timeOut: 3000
                });

                setTimeout(function() {
                    window.location.href = '{{ url('/Profile') }}';
                }, 3000);
            } else {
                if (response.status == 422) {
                    toastr.error(response.message, '', {
                        timeOut: 3000
                    });
                    return false
                }
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
