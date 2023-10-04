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
						<li class="breadcrumb-item active" id="reg_mode">Applicant Detail</li>
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
				<h3 class="card-title" id="reg_sub_heading"></h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">

				<div class="row justify-content-center">
					<div class="profile-pic col-8 col-md-2 text-center">
						<img alt="" id="profile-image-id" width="100%">
					</div>
				</div>


				<div class="showProfile col-10 text-left mt-4" id="showProfile">
					<div class="name row ">
						<label class="color-1 col-lg-2">Job Title : </label>
						<p class="col-lg-10" id="ownerName">{{@$applicantDetail->jobRequest->job_title}}</p>
					</div>
					
					<div class="name row ">
						<label class="color-1 col-lg-2">Name : </label>
						<p class="col-lg-10" id="ownerName">{{@$applicantDetail->applicant_name}}</p>
					</div>

					<div class="email row">
						<label class="color-1 col-lg-2">Email : </label>
						<p class="col-lg-10" id="ownerEmail">{{@$applicantDetail->applicant_email}}</p>
					</div>

					<div class="mobile row">
						<label class="color-1 col-lg-2">Mobile : </label>
						<p class="col-lg-10" id="ownerMobile">+{{@$applicantDetail->applicant_phone}}</p>
					</div>

					<div class="resume row">
						<label class="color-1 col-lg-2">Resume : </label>
						<p class="col-lg-10" id="ownerResume">
							<a href="{{route('admin.applicantCv')}}/{{@$applicantDetail->id}}" target="_blank" rel="noopener noreferrer">View</a>
						</p>
					</div>

					<div class="cv row">
						<label class="color-1 col-lg-2">Cover Letter : </label>
						<p class="col-lg-10" id="ownerCv">
							<a href="{{route('admin.applicantCl')}}/{{@$applicantDetail->id}}" target="_blank"
								rel="noopener noreferrer">View</a>
						</p>
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
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div id="gallery-content"></div>
						<button type="button" class="btn customBtn mt-4"
							onclick="redirect();">Okay</button>

					</div>
					<div class="modal-footer text-center"></div>
				</div>
			</div>
		</div>
		<!-- /.card -->
	</section>

	<!-- /.content -->
</div>
@endsection

@push('script')
    <script src="{{ asset('customjs/web/register/common.js') }}?v={{time()}}"></script>
    
@endpush
