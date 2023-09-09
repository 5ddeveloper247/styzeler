@extends('layouts.master.admin_template.master')

@push('css')
@endpush

@section('content')
    <div class="content-wrapper">
   
            <section class="container content-body ">
            <div class="row text-center justify-content-center" data-aos="fade-up">
                <div class="col-10 col-md-7 ">

                    <div class="login-body py-5 px-3 p-sm-5">
                        <form class="p-md-5" id="reset-passform">
                            <div class="form-group p-md-2">
                              <input type="input" class="form-control" id="user-name" aria-describedby="emailHelp" placeholder="Username" required>
                            </div>
                            <div class="form-group p-md-2">
                              <input type="input" class="form-control" id="user-email" aria-describedby="emailHelp" placeholder="Confirm Admin Email" required>
                            </div>
                            <div class="form-group p-md-2">
                              <input type="password" class="form-control" id="user-password" placeholder="New Password" required>                             
                            </div>
                           
                            <button type="submit" class="p-2 "  >Reset Password</button>
                                
    
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
                    <p class="mt-2">Username or Email not found!! Please enter correct Data!!</p>
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
            <div class="modal password-change-success" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
              <div class="modal-dialog " role="document">
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
            
        </section>
    
  </div>
@endsection

@push('script')
    <script src="{{ asset('customjs/web/register/common.js') }}"></script>
    
@endpush
