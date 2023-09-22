@extends('layouts.master.template_old.master')

@push('css')
    <style>
       .jobs .card {
        	background-color: #070708;
    	}
    	.color-1, h4 {
	    	color: #c9b9b0 !important;
		}
    
    </style>
@endpush

@section('content')

<div class="newsfeed-feed-banner mb-5">

	<img src="{{ asset('template_old/images/rental-background.jpeg') }}" alt="" width="100%" height="80%">

</div>

<div class="jobs">
	<div class="container">
		<h1 class="text-center text-uppercase color-1" style="margin-left: 10px;">Jobs</h1>

		<a id="postjob" onclick="postNewJob();" class="btn"
			style="width: 100%; margin-top: 5px; background: url({{ asset('template_old/images/postjob.png') }}); no-repeat scroll -2px 0 transparent; background-position: center; height: 80px; border: none;"></a>

		<div class="all-jobs row" data-aos="fade-up">
			<div class="col-12 mt-4"><div class="card card-body color-1">
				<h4>BEAUTICIANS, COLOURISTS, HAIRDRESSERS, BARBERS</h4>
				<p>Styzeler Hair &amp; Beauty Agency is looking for creative, friendly, and dynamic Freelancers to join our team 
						We are looking for Beauticians of all levels Hair-stylists, colourists and  Barbers / Male grooming of all levels. You must be amazing at what you do, love your job, and be customer-focused in your approach. You’ll be expected to integrate into a specialist team of experienced Freelancers 
						A cover letter and CV is a must to apply for any position at STYZELER.
				</p>
				<p>Job Types: Temporary, Contract, &pound;25,000.00-&pound;30,000.00+ per year</p>
				
				<a id="1" href="{{route('jobApply')}}" class="btn customBtn">Apply</a></div></div>
           	
                
		</div>
	</div>
</div>

<div class="modal post-job-modal" tabindex="-1" role="dialog"
	data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog " role="document"
		style="max-width: 660px !important;">
		<div class="modal-content bg-dark">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h5 class="text-center">POST JOB</h5>
				<p>
				
				
				<div class="form-group">
					<label for="job-title">Company Name</label> <input type="text"
						class="form-control" id="company_name" name="company_name">
				</div>
				<div class="form-group">
					<label for="job-title">Job Title</label> <input type="text"
						class="form-control" id="job-title" name="job_title">
				</div>
				<div class="form-group">
					<label for="job-title">Job Description & benefits</label>
					<textarea type="text" class="form-control" id="description"
						name="description" rows="3"></textarea>
				</div>
				<div class="form-group">
					<label for="job-title">Salary</label> <input type="text"
						class="form-control" id="salary" name="salary">
				</div>
				<div class="form-group">
					<label for="job-title">Location</label> <input type="text"
						class="form-control" id="location" name="location">
				</div>
				<div class="form-group">
					<label for="job-title">Email Address</label> <input type="text"
						class="form-control" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="job-title">Ad Starts</label> <input
						class="form-control" name="job_start_date"
						placeholder="01/01/2018" id="job-start-date" />
				</div>
				<div class="form-group">
					<label for="job-title">Ad Ends</label> <input class="form-control"
						name="job_end_date" placeholder="01/01/2018" id="job-end-date" />
				</div>
				</p>
				<button type="button" class="btn customBtn" onclick="submitJob();">POST</button>
				<!-- <button type="button" class="btn customBtn" data-dismiss="modal"  >Okay</button> -->

			</div>
			<div class="modal-footer text-center"></div>
		</div>
	</div>
</div>

@endsection

@push('script')
<script>
function postNewJob(){
	$(".post-job-modal").modal('show');
}
</script>
@endpush
