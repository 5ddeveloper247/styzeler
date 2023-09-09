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
					<h1 id="reg_mode_heading"></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
						<li class="breadcrumb-item active" id="reg_mode">Wedding Stylist</li>
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
          <h3 class="card-title" id="reg_sub_heading">Wedding Stylist</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <div class="row justify-content-center">
              <div class="profile-pic col-8 col-md-2 text-center">
                	<img alt="" id="profile-image-id" width="100%" src="{{asset('template_new/assets/images/application_logo.jpg')}}">
              </div>
            </div>

             
            <div class="showProfile col-10 text-left mt-4" id="showProfile">
                <div class="name row ">
                    <label class="color-1 col-lg-2">Freelancer's Name : </label>
                    <p class="col-lg-10" id="ownerName">Sas qw</p>
                </div>

                <div class="address row " style="display: none;">
                  <label class="color-1 col-lg-2">Address : </label>
                  <p class="col-lg-10" id="ownerAddress"></p>
              </div>

              <div class="postcode row " style="display: none;">
                <label class="color-1 col-lg-2">Postcode : </label>
                <p class="col-lg-10" id="ownerPostcode"></p>
            </div>

                <div class="age row">
                    <label class="color-1 col-lg-2">Age : </label>
                    <p class="col-lg-10" id="ownerAge">18-25 years</p>
                </div>

                <div class="qualification row">
                    <label class="color-1 col-lg-2">Qualification : </label>
                    <p class="col-lg-10" id="ownerQualification">NVQ2</p>
                </div>

                <div class="languages row">
                    <label class="color-1 col-lg-2">Languages : </label>
                    <p class="col-lg-10" id="ownerLanguage">English</p>
                </div>

                <div class="rate row">
                    <label class="color-1 col-lg-2">Daily rate : </label>
                    <p class="col-lg-10" id="ownerRate">$0.00</p>
                </div>

                <div class="work row">
                  <label class="color-1 col-lg-2">Zone of London open to work : </label>
                  <p class="col-lg-10" id="ownerWork">1/2, </p>
              </div>

                <div class="resume row">
                    <label class="color-1 col-lg-2">Resume : </label>
                    <p class="col-lg-10" id="ownerResume">ewqefrqe</p>
                </div>
                
                <div class="video row">
                  <label class="color-1 col-lg-2">Test Video : </label>
                  <p class="col-lg-10" id="ownerVideo"><a href="" target="_blank">Open Video</a></p>
              </div>

                <div class="utr row">
                  <label class="color-1 col-lg-2">UTR Number : </label>
                  <p class="col-lg-10" id="ownerUtr">2312</p>
              </div>

                <div class="cv row">
                  <label class="color-1 col-lg-2">CV : </label>
                  <p class="col-lg-10" id="ownerCv">
                    <a href="{{ route('admin.cv') }}" target="_blank" rel="noopener noreferrer">View</a>
                  </p>
              </div>

                <div class="email row">
                    <label class="color-1 col-lg-2">Email : </label>
                    <p class="col-lg-10" id="ownerEmail">a@a.aacom</p>
                </div>

                <div class="mobile row">
                  <label class="color-1 col-lg-2">Mobile : </label>
                  <p class="col-lg-10" id="ownerMobile">1231131</p>
              </div>

                <div class="products row">
                    <h3><label class="color-1 col-lg-12">Products : </label></h3>
                    <p class="col-lg-12"><div class="text-left"><p>Barber Male Grooming</p><div><p><strong>Styling Products:  </strong>L'oreal Tecni Art, Schwarzkopf Bc Bonacure, American Crew, Moroccan Oil, Wella EIMI.</p></div></div><br><div class="text-left"><p>Hair Color</p><div><p><strong>Brands:  </strong>L'Oreal, Wella, Schwarzkopf, Goldwell.</p></div></div><br><div class="text-left"><p>Chemical Treatments</p><div><p><strong>Products:  </strong>Cocochoco Brazilian Keratin, Schwarzkopf Professional, Wella Professionals.</p></div></div></p>
                </div>

                <div class="services row">
                    <h3><label class="color-1 col-lg-12 mt-3">Services : </label></h3>
                    <p class="col-lg-12" id="ownerService"><br>
	                    <div class="text-left"><p>Hair Cutting</p><div><p><strong>Services:  </strong>Ladies, Gents, Kids.</p></div></div><br>
	                    <div class="text-left"><p>Wedding Styles</p><div><p><strong>Services:  </strong>Classic Low Chignon, French Chignon, Updo With Flowers, Long, Smooth Curls, Pinned Curls, Glam Long Ponytail, Hidden Hair Piece, Fishtail Braid.</p></div></div><br>
	                    <div class="text-left"><p>Barber Male Grooming</p><div><p><strong>Services:  </strong>Scissors Cut, Clipper Cut, Beard Shaped, Wet Shave.</p></div></div><br>
	                </p>
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
