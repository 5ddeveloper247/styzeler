@extends('layouts.master.admin_template.master')

@push('css')
@endpush

@section('content')
    <div class="content-wrapper">
   
            <section class="container content-body ">
            <div class="row text-center justify-content-center" data-aos="fade-up">
                <div class="col-10 col-md-7 ">

                    <div class="login-body py-5 px-3 p-sm-5">
                        <form class="p-md-5" id="login_form">
                            <div class="form-group p-md-2">
                              <input type="input" class="form-control" id="user-email" name="email" placeholder="Username" required>
                            </div>
                            <div class="form-group p-md-2">
                              <input type="password" class="form-control" id="user-password" name="password" placeholder="Password" required>                             
                            </div>
                           
                            <button type="submit" id="submit_button" class="p-2 ">Login</button>
                            <a href="{{ route('admin.resetPassword') }}" class="nav-link">Reset Password</a>
                                
    
                        </form>
                    </div>
                

                </div>
            </div>

            <!-- Login Email Error Message-->
            <div class="modal activated-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
              <div class="modal-dialog " role="document">
                <div class="modal-content bg-light">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h5 class="text-center">Sorry!</h5>
                    <p class="mt-2">User registration not found!!</p>
                    <button type="button btn-primary mt-4" onclick="redirect();">Okay</button>
    
                  </div>
                  <div class="modal-footer text-center">
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Login Password Error Message-->
            <div class="modal invalid-password-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
              <div class="modal-dialog " role="document">
                <div class="modal-content bg-light">
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
            <div class="modal password-change-success" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
              <div class="modal-dialog " role="document">
                <div class="modal-content bg-light">
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
            <div class="modal password-change-error" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
              <div class="modal-dialog " role="document">
                <div class="modal-content bg-light">
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
    <script>
    var dashboardUrl = "{{route('admin.dashboard')}}";
//     $(document).on('click', '#loginbtn', function(e) {

//     	window.location.href = dashboardUrl;

//     });
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
//             if ($(this).text() == 'Submit') {
                url = '{{ route('admin.adminLogin') }}';
//             }


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
                    window.location.href = '{{ route('admin.dashboard') }}';
                }, 2000);
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
