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
					<h1>Hairstylist</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
						<li class="breadcrumb-item active">Hairstylist</li>
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
				<h3 class="card-title">Hairstylist</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">

				<div class="row">
					
					<div class="col-4">
						<p>Name</p>
					</div>
					<div class="col-4">
						<p>Details</p>
					</div>
					<div class="col-4">
						<p>Status</p>
					</div>
				</div>
				<div class="row user-details">
					<div class="col-4 pt-2" style="border-top: 1px solid grey;"><p>Ganna Zhuravlyova </p></div>
					<div class="col-4 pt-2" style="border-top: 1px solid grey;"><p id="56"><a href="{{ route('admin.seeDetails') }}">Click to see details</a></p></div>
					<div class="col-4 pt-2" style="border-top: 1px solid grey;"><p id="freelancer_0"><a style="color: green;">Activated</a></p></div>
					<hr>
					
					<div class="col-4 pt-2" style="border-top: 1px solid grey;"><p>Ganna Zhuravlyova </p></div>
					<div class="col-4 pt-2" style="border-top: 1px solid grey;"><p id="56"><a href="{{ route('admin.seeDetails') }}">Click to see details</a></p></div>
					<div class="col-4 pt-2" style="border-top: 1px solid grey;"><p id="freelancer_0"><a style="color: green;">Activated</a></p></div>
					<hr>
					
					<div class="col-4 pt-2" style="border-top: 1px solid grey;"><p>Ganna Zhuravlyova </p></div>
					<div class="col-4 pt-2" style="border-top: 1px solid grey;"><p id="56" ><a href="{{ route('admin.seeDetails') }}">Click to see details</a></p></div>
					<div class="col-4 pt-2" style="border-top: 1px solid grey;"><p id="freelancer_2"><a style="color:red;">Active Now</a></p></div>
					<hr>
				</div>

				<!-- <div id="jsGrid1"></div> -->
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
