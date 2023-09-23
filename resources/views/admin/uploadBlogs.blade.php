@extends('layouts.master.admin_template.master')

@push('css')

@endpush

@section('content')

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container">

			<form id="blog-form" autocomplete="off">
				<div class="form-group">
					<label for="blog-title">Blog Title</label> 
					<input type="text" class="form-control" id="blog-title" name="blog_title">
				</div>
				<div class="form-group">
					<label for="blog-title">Blog Description</label>
					<textarea type="text" class="form-control" id="description" name="description" rows="3"></textarea>
				</div>
				<div class="form-group">
					<label for="image_uploads" class="color-1">Select picture</label> 
					<input class="form-control col-lg-6" type="file" id="image-gallery"
						name="image-gallery" accept=".jpg, .jpeg, .png">
				</div>
				<button type="button" class="btn btn-primary" id="submit-button">Submit</button>
			</form>

		</div>
		<!-- /.container -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Upload success -->
		<div class="modal upload-success" tabindex="-1" role="dialog">
			<div class="modal-dialog " role="document">
				<div class="modal-content text-center">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
<!-- 							<span aria-hidden="true">&times;</span> -->
						</button>
					</div>
					<div class="modal-body">
						<p class="mt-2">Blog Uploaded successfully!</p>
						<a href="{{route('admin.uploadBlogs')}}" class="btn btn-primary mt-4" >Okay</a>

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
	
    <script src="{{ asset('customjs/web/register/common.js') }}"></script>
    <script src="{{ asset('customjs/admin/blog/blogs.js') }}"></script>
    <script>

    $(function() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
    });
  	$(function(){

    	CKEDITOR.editorConfig = function (config) {	    config.language = 'es';	    config.uiColor = '#F7B42C';	    config.height = 300;	    config.toolbarCanCollapse = true;	};	CKEDITOR.replace('description');	
   	});
   	function uploadBlog(){
   		$('.upload-success').modal('show');
   	}
   	function redirect(){
   		$('.upload-success').modal('hide');
   	}
    </script>
@endpush
