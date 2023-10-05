@extends('layouts.master.admin_template.master')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container">

			<form id="post_job" autocomplete="off">
				<input type="hidden" name="type" id="type" value="admin">
				<div class="form-group">
					<label for="job-title">Job Title</label> <input type="text"
						class="form-control" id="job-title" name="job_title">
				</div>
				<div class="form-group">
					<label for="job-title">Job Description</label>
					<textarea type="text" class="form-control" id="description"
						name="description" rows="3"></textarea>
				</div>
				<div class="form-group">
					<label for="job-title">Job Start Date</label> <input
						class="form-control" name="job_start_date"
						placeholder="01/01/2018" id="job-start-date" />
				</div>
				<div class="form-group">
					<label for="job-title">Job End Date</label> <input
						class="form-control" name="job_end_date" placeholder="01/01/2018"
						id="job-end-date" />
				</div>
				<button type="button" class="btn btn-primary" id="postJob">Submit</button>
			</form>

		</div>
		<!-- /.container -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Upload success -->
		<div class="modal success-modal" tabindex="-1" role="dialog">
			<div class="modal-dialog " role="document">
				<div class="modal-content text-center">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<!-- 							<span aria-hidden="true">&times;</span> -->
						</button>
					</div>
					<div class="modal-body">
						<p class="mt-2">Job Uploaded successfully!</p>
						<a href="{{route('admin.uploadJobs')}}" class="btn btn-primary mt-4">Okay</a>

					</div>
					<div class="modal-footer text-center"></div>
				</div>
			</div>
		</div>

	</section>
	<!-- /.content -->
</div>

@endsection

@push('script')

	<script src="{{ asset('assets_admin/plugins/jquery-ui/jquery-ui.js') }}"></script>
	<script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
	
    <script src="{{ asset('customjs/web/register/common.js') }}?v={{time()}}"></script>
    <script src="{{ asset('customjs/web/jobrequest/jobRequest.js') }}?v={{time()}}"></script>
    <script>
    $(function() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
    });
  	let today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        
    $("#job-start-date").datepicker({ 
    	dateFormat: "yy-mm-dd", 
        minDate: today
   	});

   	//Job End Date
   	$("#job-end-date").datepicker({ 
    	dateFormat: "yy-mm-dd", 
        minDate: today
  	});
    $(function(){
    	CKEDITOR.editorConfig = function (config) {	    
										        	config.language = 'es';	    
										        	config.uiColor = '#F7B42C';	    
										        	config.height = 300;	    
										        	config.toolbarCanCollapse = true;	
										       	};	
										       	CKEDITOR.replace('description');	
   	});
//     function uploadJob(){
//    		$('.upload-success').modal('show');
//    	}
//    	function redirect(){
//    		$('.upload-success').modal('hide');
//    	}
    </script>
@endpush
