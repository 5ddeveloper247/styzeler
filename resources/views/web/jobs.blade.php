@extends('layouts.master.template_old.master')

@push('css')
    <style>
       .jobs .card {
        	background-color: #070708;
    	}
    	.color-1, h4 {
	    	color: #c9b9b0 !important;
		}
    	.date_input:focus {
		    background: #ffffff !important;
		    color: black !important;
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

		@if(@Auth::user()->type == 'hairdressingSalon' || @Auth::user()->type == 'beautySalon')
		<a id="postjob" onclick="postNewJob();" class="btn"
			style="width: 100%; margin-top: 5px; background: url({{ asset('template_old/images/postjob.png') }}); no-repeat scroll -2px 0 transparent; background-position: center; height: 80px; border: none;"></a>
		@endif
		<div class="all-jobs row" data-aos="fade-up">
			
			@if(count($jobs))
			@foreach($jobs as $row)
				<div class="col-12 mt-4">
					<div class="card card-body color-1">
						<h4>{{@$row->job_title}}</h4>
						<div><?php echo $row->description;?></div>
<!-- 						<p>Job Types: Temporary, Contract, &pound;25,000.00-&pound;30,000.00+ per year</p> -->
						
						<a id="1" href="javascript:;" class="btn customBtn" onclick="applyJob({{$row->id}});">Apply</a>
					</div>
				</div>
			@endforeach
			@endif
			
           	
                
		</div>
	</div>
</div>

<div class="modal post-job-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog " role="document" style="max-width: 660px !important;">
		<div class="modal-content bg-dark">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h5 class="text-center">POST JOB</h5>
				<form id="post_job">
					<input type="hidden" name="type" value="owner">
					<div class="form-group">
						<label for="job-title">Company Name</label> 
						<input type="text" class="form-control" id="company_name" name="company_name">
					</div>
					<div class="form-group">
						<label for="job-title">Job Title</label> 
						<input type="text" class="form-control" id="job-title" name="job_title">
					</div>
					<div class="form-group">
						<label for="job-title">Job Description & benefits</label>
						<textarea type="text" class="form-control" id="description" name="description" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label for="job-title">Salary</label> 
						<input type="text" class="form-control" id="salary" name="salary">
					</div>
					<div class="form-group">
						<label for="job-title">Location</label> 
						<input type="text" class="form-control" id="location" name="location">
					</div>
					<div class="form-group">
						<label for="job-title">Email Address</label> 
						<input type="text" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
						<label for="job-title">Ad Starts</label> 
						<input type="date" class="form-control date_input" name="job_start_date" id="job-start-date" />
					</div>
					<div class="form-group">
						<label for="job-title">Ad Ends</label> 
						<input type="date" class="form-control date_input" name="job_end_date" placeholder="01/01/2018" id="job-end-date" />
					</div>
					
					<button type="button" class="btn customBtn" id="postJob">POST</button>
				</form>
			</div>
			<div class="modal-footer text-center"></div>
		</div>
	</div>
</div>
<div class="modal success-modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog " role="document">
		<div class="modal-content bg-dark">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
<!-- 					<span aria-hidden="true">&times;</span> -->
				</button>
			</div>
			<div class="modal-body">
				<h5 class="text-center">Request has been submitted!!</h5>
				<!--<p class="mt-2">We will get back to you soon!</p>-->
				<a href="{{route('jobs')}}" class="btn customBtn">Okay</a>

			</div>
			<div class="modal-footer text-center"></div>
		</div>
	</div>
</div>
<form class="" id="jobApplyForm" method="POST" action="{{ route('jobApply') }}" enctype="multipart/form-data" style="display:none;">
    {{ csrf_field() }}
    <input type="hidden" class="jobId" id="jobId" name="jobId" value="">
</form>

@endsection

@push('script')
<script src="{{ asset('customjs/web/register/common.js') }}"></script>
<script src="{{ asset('customjs/web/jobrequest/jobRequest.js') }}"></script>
<script>
$(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
});
function applyJob(id){
	$("#jobId").val(id);
	setTimeout(function(){
		$("#jobApplyForm").submit();
	}, 500);
}
function postNewJob(){
	$(".post-job-modal").modal('show');
}
</script>
@endpush
