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
			<a href="{{route('rentLetHairstylist')}}" class="btn customBtn my-4 beautyTherapistBtn">Beauty therapist Chair</a>
			<br> 
			<a href="" class="btn customBtnSelected mb-4 hairstylistBtn" style="pointer-events: none">Hairstylist / Barber Chair </a>
		</div>
		<div class="row chair-row my-lg-5">

			<div class="col-lg-6 mt-5">
				<div id="24">
					<div class="row">
						<div class="col-md-6 therapist-content p-3 px-4">
							<h4>Hairdressing Chair</h4>
							<p>
								<strong>Rent&amp;let</strong>
							</p>
							<p>
								<strong>Weekly rent &pound;12.00</strong>
							</p>
							<p>
								<strong>Name: </strong>test salon
							</p>
							<p>
								<strong>Address: </strong>asasa
							</p>
							<p>
								<strong>Country: </strong>asasa
							</p>
							<p>
								<strong>County: </strong>asasa
							</p>
							<p>
								<strong>Email: </strong>
								<a href="mailto:llifesoulmindbody@gmail.com">llifesoulmindbody@gmail.com</a>
								<span class="customTooltip"> 
									<span class="exclamation"> 
										<i class="fa fa-exclamation" aria-hidden="true"></i>&nbsp;&nbsp;
										<i class="fa fa-eye" aria-hidden="true"></i>
									</span> 
									<span class="tooltiptext">Use the email to contact salon owner for more info!</span>
								</span>
							</p>
							<p>
								<strong>Mobile: </strong>121312321
							</p>
							<p>
								<strong>Postal Code: </strong>123
							</p>
							<p>
								<strong>Space Description: </strong>dsadsad sdsadsa
							</p>
						</div>
						<div class="col-md-6">
							<div class="therapist-content-frame p-2" id="salon-space">
								<div id="carouselExampleControls_0" class="carousel slide"
									data-ride="carousel">
									<div class="carousel-inner">
										<div class="carousel-item">
											<img id="salon-image-id-10" alt="" width="100%" height="400px"
												src="{{asset('template_old/images/logo.png')}}">
										</div>
										<div class="carousel-item active">
											<img id="salon-image-id-20" alt="" width="100%" height="400px"
												src="{{asset('template_old/images/logo.png')}}">
										</div>
										<div class="carousel-item">
											<img id="salon-image-id-30" alt="" width="100%" height="400px"
												src="{{asset('template_old/images/logo.png')}}">
										</div>
									</div>
								</div>
							</div>
							<div class="mt-4">
								<a class="carousel-control-prev-1" href="#carouselExampleControls_0" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next-1" style="float: right" href="#carouselExampleControls_0" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 mt-5">
				<div id="24">
					<div class="row">
						<div class="col-md-6 therapist-content p-3 px-4">
							<h4>Hairdressing Chair</h4>
							<p>
								<strong>Rent&amp;let</strong>
							</p>
							<p>
								<strong>Weekly rent &pound;12.00</strong>
							</p>
							<p>
								<strong>Name: </strong>test salon
							</p>
							<p>
								<strong>Address: </strong>asasa
							</p>
							<p>
								<strong>Country: </strong>asasa
							</p>
							<p>
								<strong>County: </strong>asasa
							</p>
							<p>
								<strong>Email: </strong>
								<a href="mailto:llifesoulmindbody@gmail.com">llifesoulmindbody@gmail.com</a>
								<span class="customTooltip"> 
									<span class="exclamation"> 
										<i class="fa fa-exclamation" aria-hidden="true"></i>&nbsp;&nbsp;
										<i class="fa fa-eye" aria-hidden="true"></i>
									</span> 
									<span class="tooltiptext">Use the email to contact salon owner for more info!</span>
								</span>
							</p>
							<p>
								<strong>Mobile: </strong>121312321
							</p>
							<p>
								<strong>Postal Code: </strong>123
							</p>
							<p>
								<strong>Space Description: </strong>dsadsad sdsadsa
							</p>
						</div>
						<div class="col-md-6">
							<div class="therapist-content-frame p-2" id="salon-space">
								<div id="carouselExampleControls_1" class="carousel slide"
									data-ride="carousel">
									<div class="carousel-inner">
										<div class="carousel-item">
											<img id="salon-image-id-10" alt="" width="100%" height="400px"
												src="{{asset('template_old/images/logo.png')}}">
										</div>
										<div class="carousel-item active">
											<img id="salon-image-id-20" alt="" width="100%" height="400px"
												src="{{asset('template_old/images/logo.png')}}">
										</div>
										<div class="carousel-item">
											<img id="salon-image-id-30" alt="" width="100%" height="400px"
												src="{{asset('template_old/images/logo.png')}}">
										</div>
									</div>
								</div>
							</div>
							<div class="mt-4">
								<a class="carousel-control-prev-1" href="#carouselExampleControls_1" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next-1" style="float: right" href="#carouselExampleControls_1" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 mt-5">
				<div id="24">
					<div class="row">
						<div class="col-md-6 therapist-content p-3 px-4">
							<h4>Hairdressing Chair</h4>
							<p>
								<strong>Rent&amp;let</strong>
							</p>
							<p>
								<strong>Weekly rent &pound;12.00</strong>
							</p>
							<p>
								<strong>Name: </strong>test salon
							</p>
							<p>
								<strong>Address: </strong>asasa
							</p>
							<p>
								<strong>Country: </strong>asasa
							</p>
							<p>
								<strong>County: </strong>asasa
							</p>
							<p>
								<strong>Email: </strong>
								<a href="mailto:llifesoulmindbody@gmail.com">llifesoulmindbody@gmail.com</a>
								<span class="customTooltip"> 
									<span class="exclamation"> 
										<i class="fa fa-exclamation" aria-hidden="true"></i>&nbsp;&nbsp;
										<i class="fa fa-eye" aria-hidden="true"></i>
									</span> 
									<span class="tooltiptext">Use the email to contact salon owner for more info!</span>
								</span>
							</p>
							<p>
								<strong>Mobile: </strong>121312321
							</p>
							<p>
								<strong>Postal Code: </strong>123
							</p>
							<p>
								<strong>Space Description: </strong>dsadsad sdsadsa
							</p>
						</div>
						<div class="col-md-6">
							<div class="therapist-content-frame p-2" id="salon-space">
								<div id="carouselExampleControls_2" class="carousel slide"
									data-ride="carousel">
									<div class="carousel-inner">
										<div class="carousel-item">
											<img id="salon-image-id-10" alt="" width="100%" height="400px"
												src="{{asset('template_old/images/logo.png')}}">
										</div>
										<div class="carousel-item active">
											<img id="salon-image-id-20" alt="" width="100%" height="400px"
												src="{{asset('template_old/images/logo.png')}}">
										</div>
										<div class="carousel-item">
											<img id="salon-image-id-30" alt="" width="100%" height="400px"
												src="{{asset('template_old/images/logo.png')}}">
										</div>
									</div>
								</div>
							</div>
							<div class="mt-4">
								<a class="carousel-control-prev-1" href="#carouselExampleControls_2" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next-1" style="float: right" href="#carouselExampleControls_2" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		
		
		<!-- Booking Success Message-->
		<div class="modal success-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
			<div class="modal-dialog " role="document">
				<div class="modal-content bg-dark">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
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
		<div class="modal fail-modal" tabindex="-1" role="dialog"
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
						<h5 class="text-center">Sorry!</h5>
						<p>Chair is booked for the day!</p>
						<button type="button" class="btn customBtn" data-dismiss="modal">Close</button>

					</div>
					<div class="modal-footer text-center"></div>
				</div>
			</div>
		</div>
		<!-- not Logged in-->
		<div class="modal not-loggedin-modal" tabindex="-1" role="dialog"
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
