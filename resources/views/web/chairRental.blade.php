@extends('layouts.master.template_old.master')

@push('css')
    <style>
   		input:focus, input:active, textarea:focus, textarea:active {
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
      	.rental .details input, .rental .details textarea {
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
        
        .change::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
              color: #000000 !important;
              opacity: 1 !important; /* Firefox */
        }
            
        .change:-ms-input-placeholder { /* Internet Explorer 10-11 */
              color: #000000 !important;
        }
            
        .change::-ms-input-placeholder { /* Microsoft Edge */
              color: #000000 !important;
        }
    </style>
@endpush

@section('content')

<section class="rental p-md-5 my-md-5">
	<div class="rental-background p-md-5">
		<div class="container">
			<div class="row ">
				<div class="col-4 col-lg-2">
					<img src="{{ asset('template_old/images/logo.png') }}" alt="" width="100%">
				</div>
				<div class="col-lg-12" data-aos="fade-up">
					<div class="details col-lg-6">
						<form id="chair-rental-1" class="chair-rental-2"
							autocomplete="off">
							<div class="form-group">
								<input type="text" class="form-control change" id="salon-name"
									name="salon-name" aria-describedby="salon-name"
									placeholder="Salon Name" autocomplete="nope" required>
							</div>
							<div class="form-group">
								<textarea class="form-control change" id="salon-address"
									rows="3" placeholder="Salon Address" autocomplete="nope"
									required></textarea>
							</div>
							<div class="form-group">
								<input type="text" class="form-control change"
									id="salon-country" aria-describedby="salon-country"
									autocomplete="nope" placeholder="Country" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control change" id="salon-county"
									aria-describedby="salon-country" autocomplete="nope"
									placeholder="County" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control change"
									id="salon-country-code" aria-describedby="salon-country-code"
									placeholder="Post code" autocomplete="nope" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control change" id="salon-mobile"
									aria-describedby="salon-mobile" placeholder="Phone"
									autocomplete="nope" required>
							</div>
							<div class="form-group">
								<textarea class="form-control change" id="space-description"
									name="space-description" rows="3"
									placeholder="Space Description" autocomplete="nope" required></textarea>
							</div>
							<!-- <div class="form-group">
                                <input type="text" class="form-control" id="salon-email" aria-describedby="salon-email" placeholder="Email" required>
                            </div> -->
						</form>
					</div>
				</div>

				<div class="col-12 col-lg-5 col-xl-4">
					<div class="category">
						<form id="chair-rental-1" class="chair-rental-1" autocomplete="off">
							<div class="heading text-center">
								<span><b>Contact Us</b></span>
							</div>
							<div class="mt-5">
								<h2 class="main_heading">Rent & Let</h2>
								<hr>
								<!-- <h2>Let</h2> -->
								<!--<div class="form-group">-->
								<!--    <select name="rent-let" id="rent-let" class="form-control">-->
								<!--        <option value="rent">Rent</option>-->
								<!--        <option value="let">Let</option>-->
								<!--    </select>-->
								<!--</div>-->
								<h4 class="sub_heading">Category</h4>
								<div class="form-group">
									<select name="rental-category" id="rental-category"
										class="form-control sub_heading1">
										<option value="Hairdressing Chair">Hairdressing Chair</option>
										<option value="Barber Chair">Barber Chair</option>
										<option value="Beauty Chair">Beauty Chair</option>
									</select>
								</div>

								<!--changing here-->

								<h4 class="sub_heading">Rent & Let Category</h4>
								<div class="form-group">
									<select name="rentLet-category" id="rentLet-category"
										class="form-control sub_heading1" onchange="rentLet(this);">
										<option>--select--</option>
										<option value="rent let">Rent & Let</option>
										<option value="rent let go">Rent & Let as you go</option>
									</select>
								</div>

								<!-- <h4 class="rent-and-let sub_heading">Rent & Let</h4>
								<div class="form-group longRent rent-and-let">
									<select name="rent-let" id="rent-let"
										class="form-control sub_heading1" onchange="longRent(this);">
										<option>--select--</option>
										<option value="weekly rent">Weekly Rent</option>
										<option value="monthly rent">Monthly Rent</option>
									</select> <br>
									<div class="weeklyRent">
										<input type="number" class="form-control"
											id="rent-let-charge-weekly"
											aria-describedby="rent-let-charge"
											placeholder="Weekly Rate &#163;">
									</div>
									<div class="monthlyRent">
										<input type="number" class="form-control"
											id="rent-let-charge-monthly"
											aria-describedby="rent-let-charge"
											placeholder="Monthly Rate &#163;">
									</div>
								</div>


								<h4 class="rent-and-let-go sub_heading">Rent & Let as you go</h4>
								<div class="form-group shortRent rent-and-let-go">
									<select name="rent-let-go" id="rent-let-go"
										class="form-control sub_heading1" onchange="shortRent(this);">
										<option>--select--</option>
										<option value="daily rent">Daily Rent</option>
										<option value="hourly rent">Hourly Rent</option>
									</select> <br>
									<div class="dailyRent">
										<input type="number" class="form-control"
											id="rent-let-charge-go-daily"
											aria-describedby="rent-let-charge" placeholder="Daily Rate &#163;">
									</div>
									<div class="hourlyRent">
										<input type="number" class="form-control"
											id="rent-let-charge-go-hourly"
											aria-describedby="rent-let-charge"
											placeholder="Hourly Rate &#163;">
									</div>
								</div> -->

								<!--changing ends here-->

								<!--<h2>Space Description</h2>-->
								<!--<div class="form-group">-->
								<!--    <textarea class="form-control" id="space-description" name="space-description" rows="3" ></textarea>-->
								<!--</div>-->
								<div class="form-group">
									<input type="file" name="chair-picture-1" id="chair-picture-1"
										class="form-control" onchange="readURL(this);">
								</div>
								<div class="form-group">
									<input type="file" name="chair-picture-2" id="chair-picture-2"
										class="form-control" onchange="readURL(this);">
								</div>
								<div class="form-group">
									<input type="file" name="chair-picture-3" id="chair-picture-3"
										class="form-control" onchange="readURL(this);">
								</div>
								<!--<div class="reCaptcha my-4 col-6">-->
								<!--    <input type="checkbox" name="recaptcha-verify" id="recaptcha-robot"><span style="color: #000000"> I'm not a robot </span> -->

								<!--</div>-->
								<!--COMMENT THIS OUT-->
								<div class="col-12">
									<canvas id="canvas"></canvas>
								</div>
								<div class="row">
									<div class="col-md-6">
										<input name="code" />
									</div>
									<!--<div class="col-md-6 mt-4 mt-md-0">-->
									<div class="col-md-6 mt-4 mt-md-1 ml-1">
										<button type="button" id="valid" onclick="captchaVerify();">Verify</button>
									</div>
								</div>
								<!--end here-->

								<!--<div class="text-right">-->
								<div class="text-right mt-1">
									<!-- <input type="submit"  value="Submit"> -->
									<button type="button" id="submitData">Submit</button>

								</div>

							</div>

						</form>

					</div>

				</div>

				<!--<div class="col-12 d-block d-lg-none">-->
				<!--  <div class="category">-->
				<!--      <form  class="chair-rental-1">-->
				<!--          <div class="heading text-center">-->
				<!--              <span>Contact Us</span>-->
				<!--          </div>-->
				<!--          <div class="mt-5">-->
				<!--              <h2>Rent & Let</h2>-->
				<!--              <div class="form-group">-->
				<!--                  <select name="rent-let" id="rent-let" class="form-control">-->
				<!--                      <option value="rent">Rent</option>-->
				<!--                      <option value="let">Let</option>-->
				<!--                  </select>-->
				<!--              </div>-->
				<!--              <h2>Category</h2>-->
				<!--              <div class="form-group">-->
				<!--                  <select name="rental-category" id="rental-category" class="form-control">-->
				<!--                      <option value="rent">Hairdressing Chair</option>-->
				<!--                      <option value="let">Barber Chair</option>-->
				<!--                      <option value="beauty">Beauty Chair</option>-->
				<!--                  </select>-->
				<!--              </div>-->
				<!--              <h2>Space Description</h2>-->
				<!--              <div class="form-group">-->
				<!--                  <textarea class="form-control" id="space-description" name="space-description" rows="3" ></textarea>-->
				<!--              </div>-->
				<!--              <div class="form-group">-->
				<!--                  <input type="file" name="chair-picture-1" id="chair-picture-1" class="form-control" onchange="readURL(this);" >-->
				<!--              </div>-->
				<!--              <div class="form-group">-->
				<!--                  <input type="file" name="chair-picture-2" id="chair-picture-2" class="form-control" onchange="readURL(this);" >-->
				<!--              </div>-->
				<!--              <div class="form-group">-->
				<!--                  <input type="file" name="chair-picture-3" id="chair-picture-3" class="form-control" onchange="readURL(this);" >-->
				<!--              </div>-->
				<!--              <div class="reCaptcha my-4 col-6">-->
				<!--                  <input type="checkbox" name="recaptcha-verify" id="recaptcha-robot"><span style="color: #000000"> I'm not a robot </span> -->
				<!-- <span class="image-group"> -->
				<!--                      <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png">-->
				<!--                      <span class="recaptcha">reCAPTCHA</span>-->
				<!--                      <br>-->
				<!--                      <a href="#">Privacy</a>-->
				<!--                      <span class="dash">-</span>-->
				<!--                      <a href="#">Terms</a>-->
				<!--                  </span> -->
				<!--              </div>-->
				<!--              <div class="text-right">-->
				<!--                  <input type="submit" value="Submit">-->
				<!--              </div>-->

				<!--          </div>-->

				<!--      </form>-->

				<!--  </div>-->

				<!--</div>-->
			</div>


			<!-- not logged in-->
			<div class="modal not-loggedin-modal" tabindex="-1" role="dialog"
				data-keyboard="false" data-backdrop="static">
				<div class="modal-dialog " role="document">
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
							<button type="button" class="btn customBtn" onclick="redirect();">Okay</button>

						</div>
						<div class="modal-footer text-center"></div>
					</div>
				</div>
			</div>

			<!-- not salon owner -->
			<div class="modal not-salon-owner-modal" tabindex="-1" role="dialog"
				data-keyboard="false" data-backdrop="static">
				<div class="modal-dialog " role="document">
					<div class="modal-content bg-dark">
						<div class="modal-header">
							<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button> -->
						</div>
						<div class="modal-body">
							<h5 class="text-center">Sorry!</h5>
							<p>You're not a salon owner!</p>
							<button type="button" class="btn customBtn" onclick="redirect();">Okay</button>

						</div>
						<div class="modal-footer text-center"></div>
					</div>
				</div>
			</div>

			<!-- Success Modal-->
			<div class="modal success-modal" tabindex="-1" role="dialog"
				data-keyboard="false" data-backdrop="static">
				<div class="modal-dialog " role="document">
					<div class="modal-content bg-dark">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"
								aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<h5 class="text-center">Request has been submitted!!</h5>
							<!--<p class="mt-2">We will get back to you soon!</p>-->
							<button type="button" class="btn customBtn mt-4"
								onclick="redirect();">Okay</button>

						</div>
						<div class="modal-footer text-center"></div>
					</div>
				</div>
			</div>

			<!--Verify modal-->
			<div class="modal verified-modal" tabindex="-1" role="dialog"
				data-keyboard="false" data-backdrop="static">
				<div class="modal-dialog " role="document">
					<div class="modal-content bg-dark">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"
								aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<h5 class="text-center">Verified Successfully!!</h5>
							<!--<p class="mt-2">We will get back to you soon!</p>-->
							<button type="button" class="btn customBtn mt-4 "
								data-dismiss="modal">Okay</button>

						</div>
						<div class="modal-footer text-center"></div>
					</div>
				</div>
			</div>

			<!--Not verify modal-->
			<div class="modal not-verified-modal" tabindex="-1" role="dialog"
				data-keyboard="false" data-backdrop="static">
				<div class="modal-dialog " role="document">
					<div class="modal-content bg-dark">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"
								aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<h5 class="text-center">Please enter the right verification
								code!!!</h5>
							<!--<p class="mt-2">We will get back to you soon!</p>-->
							<button type="button" class="btn customBtn mt-4"
								data-dismiss="modal">Okay</button>

						</div>
						<div class="modal-footer text-center"></div>
					</div>
				</div>
			</div>

			<!-- Error Modal-->
			<div class="modal error-modal" tabindex="-1" role="dialog"
				data-keyboard="false" data-backdrop="static">
				<div class="modal-dialog " role="document">
					<div class="modal-content bg-dark">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"
								aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<h5 class="text-center error-message"></h5>
							<!--<p class="mt-2">Please try again!</p>-->
							<button type="button" class="btn customBtn mt-4"
								data-dismiss="modal">Okay</button>

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
<script src="js/jquery-captcha.min.js"></script>
<script>
        const captcha =new Captcha($('#canvas'));
        $('#valid').on('click',function() {

          const ans = captcha.valid($('input[name="code"]').val());
        
          
        
          let VERIFY = 'verify';
          
          localStorage.setItem(VERIFY, ans);
        
        })

    </script>
@endpush
