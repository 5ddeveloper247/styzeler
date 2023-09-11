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
					<h1>Email Enquiry</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
						<li class="breadcrumb-item active">Email Enquiry</li>
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
				<h3 class="card-title">Beauty Salon Owner</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">

				<div class="row">
					<div class="col-3">
						<p>Name</p>
					</div>
					<div class="col-2">
						<p>Email</p>
					</div>
					<div class="col-2">
						<p>Phone</p>
					</div>
					<div class="col-3">
						<p>Message</p>
					</div>
					<!-- <div class="col-2">
                    <p>Date</p>
                </div> -->
				</div>
				<div class="row email-details">
					
					<div class="col-3" style="border-top: 1px solid grey;"><p>Jenny </p></div>
					<div class="col-2" style="border-top: 1px solid grey;"><p>jennifer@pimpsandpinups.com</p></div>
					<div class="col-2" style="border-top: 1px solid grey;"><p>02074262121</p></div>
					<div class="col-3" style="border-top: 1px solid grey;">
						<p>Hi, 
							We are looking to either have stylists in for the day as freelance, or look at recruiting a permanent freelance stylist. 
							
							Could you please let me know how to go about this and your rates 
							
							Kind regards
							Jenny 
						</p>
					</div>
					<hr>
					
					<div class="col-3" style="border-top: 1px solid grey;"><p>Jenny </p></div>
					<div class="col-2" style="border-top: 1px solid grey;"><p>jennifer@pimpsandpinups.com</p></div>
					<div class="col-2" style="border-top: 1px solid grey;"><p>02074262121</p></div>
					<div class="col-3" style="border-top: 1px solid grey;">
						<p>Hi, 
							We are looking to either have stylists in for the day as freelance, or look at recruiting a permanent freelance stylist. 
							
							Could you please let me know how to go about this and your rates 
							
							Kind regards
							Jenny 
						</p>
					</div>
					<hr>
					
				</div>

			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</section>
	<!-- /.content -->
</div>
@endsection

@push('script')
    <script src="{{ asset('customjs/web/register/common.js') }}"></script>
    
@endpush
