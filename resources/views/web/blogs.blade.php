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

	<img src="{{ asset('template_old/images/new-image-15.png') }}" alt="" width="100%">

</div>
<div class="jobs my-5">
	<div class="container">
		<h1 class="text-center text-uppercase color-1">Blogs</h1>
		<div class="all-blogs row justify-content-center" data-aos="fade-up">
			@if(@count($blogs))
			@foreach($blogs as $row)
				@php
					$date = Carbon\Carbon::parse($row->date);
					$formattedDate = $date->format('d M Y');
				@endphp
				<div class="col-10 mt-4">
					<div id="{{$row->id}}" class="card card-body color-1">
						<h4 class="text-uppercase">{{@$row->blog_title}}</h4>
						<h6 class="mt-4">{{$formattedDate}}</h6>
						<div class="show-image">
							<img class="blog-image" id="blog-image-id-0" src="{{ asset((isset($row->blog_image) && $row->blog_image != null)? $row->blog_image : 'template_old/images/logo.png') }}" alt="" width="100%">
						</div>
						@php
							echo $row->description;
						@endphp
					</div>
				</div>
			@endforeach
			@endif
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
