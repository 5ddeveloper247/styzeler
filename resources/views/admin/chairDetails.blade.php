@extends('layouts.master.admin_template.master')

@push('css')
@endpush

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 id="reg_mode_heading">Hairdressing Chair</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
						<li class="breadcrumb-item active" id="reg_mode">Hairdressing Chair</li>
					</ol>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title" id="reg_sub_heading">Hairdressing Chair</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
                
                <div class="name row ">
                    <label class="color-1 col-lg-2">Salon Name : </label>
                    <p class="col-lg-10" id="ownerName">Nik Hudson</p>
                </div>

                <div class="address row">
                    <label class="color-1 col-lg-2">Salon Address : </label>
                    <p class="col-lg-10" id="ownerAdress">337 Field Road</p>
                </div>

                <div class="country row">
                    <label class="color-1 col-lg-2">Country : </label>
                    <p class="col-lg-10" id="ownerCountry">UK</p>
                </div>

                <div class="county row">
                  <label class="color-1 col-lg-2">County : </label>
                  <p class="col-lg-10" id="ownerCounty">London</p>
                </div>

                <div class="postcode row">
                  <label class="color-1 col-lg-2">Postcode : </label>
                  <p class="col-lg-10" id="ownerPostcode">SW15 7UT</p>
                </div>

                <div class="category row">
                  <label class="color-1 col-lg-2">Category : </label>
                  <p class="col-lg-10" id="ownerCategory">Rent &amp; Let as you go</p>
                </div>

                <div class="hour row">
                  <label class="color-1 col-lg-2">Hourly Rate : </label>
                  <p class="col-lg-10" id="ownerHour">56.00&#163;</p>
                </div>

                <div class="daily row">
                  <label class="color-1 col-lg-2">Daily Rate : </label>
                  <p class="col-lg-10" id="ownerDaily">0.00&#163;</p>
                </div>

                <div class="week row">
                  <label class="color-1 col-lg-2">Weekly Rate : </label>
                  <p class="col-lg-10" id="ownerWeek">0.00&#163;</p>
                </div>

                <div class="month row">
                  <label class="color-1 col-lg-2">Monthly Rate : </label>
                  <p class="col-lg-10" id="ownerMonth">0.00&#163;</p>
                </div>

                <div class="mobile row">
                    <label class="color-1 col-lg-2">Salon Mobile : </label>
                    <p class="col-lg-10" id="ownerPhone">02075663979</p>
                </div>

                <div class="email row">
                    <label class="color-1 col-lg-2">Salon Email Id : </label>
                    <p class="col-lg-10" id="ownerEmail">matt@aol.com</p>
                </div>

                <div class="description row">
                    <label class="color-1 col-lg-2">Salon Description : </label>
                    <p class="col-lg-10" id="chairDescription">Description about hair and beauty salon</p>
                </div>

                <div class="gallery">
                    <h1 class="color-1 col-lg-12 text-center">GALLERY</h1>
                    <hr> <hr>
                    <div class=" row" id="gallery-content">
                        <div class="col-lg-4 p-4">
	                    	<img id="gallery-image-id-0" alt="" width="100%" height="100%" src="{{asset('template_new/assets/images/application_logo.jpg')}}">
	                    </div>
	                    <div class="col-lg-4 p-4">
	                    	<img id="gallery-image-id-0" alt="" width="100%" height="100%" src="{{asset('template_new/assets/images/application_logo.jpg')}}">
	                    </div>
                    </div>
                </div>
                    
                
            </div>
            
        </div>
        <!-- /.card-body -->
      </div>
      <!-- Gallery Modal -->
      <div class="modal show-images-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog " role="document">
          <div class="modal-content bg-dark">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div id="gallery-content">

              </div>
              <button type="button" class="btn customBtn mt-4" onclick="redirect();">Okay</button>

            </div>
            <div class="modal-footer text-center">
            </div>
          </div>
        </div>
      </div>
      <!-- /.card -->
    </section>

	<!-- /.content -->
</div>
@endsection

@push('script')
    <script src="{{ asset('customjs/web/register/common.js') }}"></script>
@endpush
