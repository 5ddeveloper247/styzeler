@extends('layouts.master.template_old.master')

@push('css')

@endpush

@section('content')
<div class="login">
    <section class="container content-body ">
        <div class="row text-center justify-content-center" data-aos="fade-up">
            <div class="col-10 col-md-7 ">

                <div class="login-body py-5 px-3 p-sm-5" >
                    <form class="p-md-5" id="forgot-password-form">
                        <div class="form-group p-md-2">
                          <label for="user-email">Enter your email</label>
                          <input type="email" class="form-control" id="user-email" aria-describedby="emailHelp" placeholder="Email" required>
                        </div>
                        <div class="form-group p-md-2">
                          <label for="user-email">Enter your new password</label>
                          <input type="password" class="form-control" id="user-password" placeholder="Password" required>
                          <br>
                          <input type="checkbox" class="text-left" onclick="showPassword()">&nbsp;Show Password
                        </div>
                       
                        <button type="submit" class="p-2">Get otp</button>

                        <!--<div class=" my-2 my-sm-3 my-lg-5">-->
                        <!--    <span><a onclick="forgetPassword();">Forgot password?</a></span>-->

                        <!--</div>-->

                    </form>
                </div>
            

            </div>
        </div>

        <!-- Login Email Error Message-->
        <div class="modal invalid-email-modal" tabindex="-1" role="dialog">
          <div class="modal-dialog " role="document">
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
        <div class="modal invalid-password-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
          <div class="modal-dialog " role="document">
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
        <div class="modal password-change-success" tabindex="-1" role="dialog">
          <div class="modal-dialog " role="document">
            <div class="modal-content bg-dark">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="p-md-5" id="otp-form">
                        <div class="form-group p-md-2">
                          <label for="user-otp">Enter your otp</label>
                          <input type="text" class="form-control" id="user-otp" aria-describedby="otp" placeholder="OTP" required>
                        </div>
                       
                        <button type="submit" class="p-2 ">Change Password</button>

                        <!--<div class=" my-2 my-sm-3 my-lg-5">-->
                        <!--    <span><a onclick="forgetPassword();">Forgot password?</a></span>-->

                        <!--</div>-->

                </form>

              </div>
              <div class="modal-footer text-center">
              </div>
            </div>
          </div>
        </div>

        <!-- Password Change Error -->
        <div class="modal password-change-error" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
          <div class="modal-dialog " role="document">
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
        
        <!-- Success -->
        <div class="modal success" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
          <div class="modal-dialog " role="document">
            <div class="modal-content bg-dark">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p class="mt-2">Password has changed!</p>
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
<script>
    function showPassword() {
        var x = document.getElementById("user-password");
        if (x.type === "password") {
        x.type = "text";
        } else {
        x.type = "password";
        }
    }
</script>
@endpush