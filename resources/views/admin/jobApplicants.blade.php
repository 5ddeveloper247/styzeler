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
					<h1>Styzeler Job Applicants</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
						<li class="breadcrumb-item active">Job applicants</li>
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
				<h3 class="card-title">Applicants</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">

				<div class="row">
					
					<div class="col-4">
						<p>Job Title</p>
					</div>
					<div class="col-4">
						<p>Applicant Name</p>
					</div>
					<div class="col-4">
						<p>Details</p>
					</div>
				</div>
				<div class="row user-details">
					
					@if(count($applicants))
					@foreach($applicants as $row)
						<div class="col-4 pt-2" style="border-top: 1px solid grey;"><p>{{@$row->jobRequest->job_title}}</p></div>
						<div class="col-4 pt-2" style="border-top: 1px solid grey;"><p id="freelancer_0">{{@$row->applicant_name}}</p></div>
						<div class="col-4 pt-2" style="border-top: 1px solid grey;"><p><a class="txtdec-none" href="{{route('admin.applicant')}}/{{$row->id}}">Click to see details</a></p></div>
						<hr>
					@endforeach
					@endif
					
				</div>

			</div>
			<!-- /.card-body -->
		</div>
		<!-- Activate Freelancers -->
		<div class="modal activated-modal" tabindex="-1" role="dialog">
			<div class="modal-dialog " role="document">
				<div class="modal-content text-center">
					<div class="modal-body">
						<p class="mt-2">User activated!</p>
						<button type="button" class="btn btn-primary mt-4"
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

	<script src="{{ asset('customjs/web/register/common.js') }}"></script>
    
@endpush
