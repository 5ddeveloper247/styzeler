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
					<h1>Barber Chair</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
						<li class="breadcrumb-item active">Barber Chair</li>
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
				<h3 class="card-title">Barber Chair</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">

				<div class="row">
					
					<div class="col-3">
						<p>Category</p>
					</div>
					<div class="col-3">
						<p>Salon Name</p>
					</div>
					<div class="col-3">
						<p>Details</p>
					</div>
					<div class="col-3">
						<p>Status</p>
					</div>
				</div>
				<div class="row user-details">
					@if(count($rentLetList))
					@foreach($rentLetList as $rentLet)
						<div class="col-3 pt-2" style="border-top: 1px solid grey;"><p>{{@$rentLet->category}}</p></div>
						<div class="col-3 pt-2" style="border-top: 1px solid grey;"><p>{{@$rentLet->salon_name}}</p></div>
						<div class="col-3 pt-2" style="border-top: 1px solid grey;"><p id="9"><a class="txtdec-none"  href="{{route('admin.chairDetails')}}/{{$rentLet->id}}">Click to see details</a></p></div>
						
						@if($rentLet->status == 'active')
							<div class="col-3 pt-2" style="border-top: 1px solid grey;"><p id="rent_{{$rentLet->id}}"><a class="txtdec-none" href="{{route('admin.changeRentLetStatusInActive')}}/{{$rentLet->id}}" style="color: green;">Activated</a></p></div>
						@else
							<div class="col-3 pt-2" style="border-top: 1px solid grey;"><p id="rent_{{$rentLet->id}}"><a class="txtdec-none" href="{{route('admin.changeRentLetStatusActive')}}/{{$rentLet->id}}" style="color: red;">Active Now</a></p></div>
						@endif
						<hr>
					@endforeach
					@endif
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
						<p class="mt-2" id="successMessage"></p>
						<button type="button" class="btn btn-primary mt-4 closeModal">Okay</button>

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
    <script>

    $(".closeModal").click(function () {
    	$(".activated-modal").modal('hide');
    });
    
	@if(session('success'))
		$("#successMessage").text("{{session('success')}}");
		$(".activated-modal").modal('show');
	@endif
	
    </script>
@endpush
