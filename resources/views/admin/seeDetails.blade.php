@extends('layouts.master.admin_template.master')

@push('css')
@endpush

@section('content')
@php

if(isset($userDetails->type)){
	if(isset($userDetails->type) && $userDetails->type == 'wedding'){
		$userType = 'Wedding Stylist';
	}
	if(isset($userDetails->type) && $userDetails->type == 'hairStylist'){
		$userType = 'Hairstylist';
	}
	if(isset($userDetails->type) && $userDetails->type == 'beautician'){
		$userType = 'Beautician';
	}
	if(isset($userDetails->type) && $userDetails->type == 'barber'){
		$userType = 'Barber';
	}
	if(isset($userDetails->type) && $userDetails->type == 'hairdressingSalon'){
		$userType = 'Hairdressing Owner';
	}
	if(isset($userDetails->type) && $userDetails->type == 'beautySalon'){
		$userType = 'Beauty Owner';
	}
	if(isset($userDetails->type) && $userDetails->type == 'client'){
		$userType = 'Client';
	}
}else{
	$userType = 'Details';
}
@endphp
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 id="reg_mode_heading">{{$userType}}</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
						<li class="breadcrumb-item active" id="reg_mode">{{$userType}}</li>
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
          <h3 class="card-title" id="reg_sub_heading">{{$userType}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <div class="row justify-content-center">
              <div class="profile-pic col-8 col-md-2 text-center">
                	<img alt="" id="profile-image-id" width="100%" src="{{ asset(isset($userDetails->hero_image) ? $userDetails->hero_image : 'template_old/images/blank.png') }}">
              </div>
            </div>

             
            <div class="showProfile col-10 text-left mt-4" id="showProfile">
                <div class="name row ">
                    <label class="color-1 col-lg-2">Freelancer's Name : </label>
                    <p class="col-lg-10" id="ownerName">{{$userDetails->name}} {{$userDetails->surname}}</p>
                </div>

				@if($userDetails->type == 'hairdressingSalon' || $userDetails->type == 'beautySalon' || $userDetails->type == 'client')
					<div class="address row ">
	               		<label class="color-1 col-lg-2">Address : </label>
	                  	<p class="col-lg-10" id="ownerAddress">{{@$userDetails->address}}</p>
	              	</div>
	
	              	<div class="postcode row ">
	                	<label class="color-1 col-lg-2">Postcode : </label>
	                	<p class="col-lg-10" id="ownerPostcode">{{@$userDetails->post_code}}</p>
	            	</div>
	            @else
	            	<div class="age row">
	                    <label class="color-1 col-lg-2">Age : </label>
	                    <p class="col-lg-10" id="ownerAge">{{@$userDetails->age}} years</p>
	                </div>
	
	                <div class="qualification row">
	                    <label class="color-1 col-lg-2">Qualification : </label>
	                    <p class="col-lg-10" id="ownerQualification">
	                    @if(@$userDetails->qualification != null)
	                    	{{implode(', ', @$userDetails->qualification)}}
	                    @endif
	                    </p>
	                </div>
	
	                <div class="languages row">
	                    <label class="color-1 col-lg-2">Languages : </label>
	                    <p class="col-lg-10" id="ownerLanguage">{{@$userDetails->languages}}</p>
	                </div>
	
	                <div class="rate row">
	                    <label class="color-1 col-lg-2">Daily rate : </label>
	                    <p class="col-lg-10" id="ownerRate"> {{@$userDetails->rate != null ? '$'.$userDetails->rate : 'To be quoted'}}</p>
	                </div>
	
	                <div class="work row">
	                  	<label class="color-1 col-lg-2">Zone of London open to work : </label>
	                  	<p class="col-lg-10" id="ownerWork">
	                  	@if(@$userDetails->qualification != null)
	                    	{{implode(', ', @$userDetails->zone)}}
	                    @endif
	                  	</p>
	              </div>
	
	                <div class="resume row">
	                    <label class="color-1 col-lg-2">Resume : </label>
	                    <p class="col-lg-10" id="ownerResume">{{@$userDetails->resume}}</p>
	                </div>
	                
	                <div class="video row">
	                 	<label class="color-1 col-lg-2">Test Video : </label>
	                  	<p class="col-lg-10" id="ownerVideo">
	                  	@if(@$userDetails->trade_video != 'null' && @$userDetails->trade_video != '')
	                  	<a href="{{@$userDetails->trade_video}}" target="_blank">Open Video</a>
	                  	@endif
	                  	</p>
	              	</div>
	
	                <div class="utr row">
	               		<label class="color-1 col-lg-2">UTR Number : </label>
	                  	<p class="col-lg-10" id="ownerUtr">{{$userDetails->utr_number}}</p>
	             	</div>
	
	                <div class="cv row">
	                  	<label class="color-1 col-lg-2">CV : </label>
	                	<p class="col-lg-10" id="ownerCv">
	                  	@if(@$userDetails->cv != 'null' && @$userDetails->cv != '')
	                  	<a href="{{ route('admin.cv') }}/{{@$userDetails->id}}" target="_blank" rel="noopener noreferrer">View</a>
	                  	@endif
	                  </p>
	              </div>
				@endif
                

                

                <div class="email row">
                    <label class="color-1 col-lg-2">Email : </label>
                    <p class="col-lg-10" id="ownerEmail">{{@$userDetails->email}}</p>
                </div>

                <div class="mobile row">
                  	<label class="color-1 col-lg-2">Mobile : </label>
                  	<p class="col-lg-10" id="ownerMobile">{{@$userDetails->phone}}</p>
              	</div>
				
                @if($userDetails->type != 'client')
                
	                <div class="products row">
	                    <h3><label class="color-1 col-lg-12">Products : </label></h3>
	                    <p class="col-lg-12">
	                    	<div class="text-left">
	                    		
	                    		@if(count(@$userDetails->data))
	                    		@php $prodFlag =  'false'; @endphp
	                    		@foreach(@$userDetails->data as $row)
	                    			
	                    			@if(!in_array(@$row['heading'], ['Hair-Cutting','Wedding-Styles']))
	                    		
	                    				@if(@$row['heading'] == 'Barber Male Grooming')
	                    					<p id="prod_heading">{{@$row['heading']}}</p>
	                    				@else
	                    					
	                    					@if(isset($row['subHeading']) && $row['subHeading'] != 'Services')
	                    						@php
	                    							$tempArr = $row;
	                    							if(isset($tempArr['heading'])){
	                    								unset($tempArr['heading']);
	                    							}
	                    							if(isset($tempArr['subHeading'])){
	                    								unset($tempArr['subHeading']);
	                    							}
	                    							$str = implode(', ', $tempArr);
	                    						@endphp
	                    						@if(@$str != '')
	                    						@php $prodFlag =  'true'; @endphp
	                    							<p>{{@$row['heading']}}</p>
		                    						<p><strong>{{@$row['subHeading']}}:</strong>
		                    							{{@$str}}
		                    						</p>
	                    						@endif
	                    						
	                    					@elseif(@$row['heading'] == 'Styling Products')
	                    						@php
	                    							$tempArr = $row;
	                    							if(isset($tempArr['heading'])){
	                    								unset($tempArr['heading']);
	                    							}
	                    							if(isset($tempArr['subHeading'])){
	                    								unset($tempArr['subHeading']);
	                    							}
	                    							$str = implode(', ', $tempArr);
	                    						@endphp
	                    						@if(@$str != '')
	                    						@php $prodFlag =  'true'; @endphp
	                    							<p><strong>{{@$row['heading']}}:</strong>
	                    								{{@$str}}
		                    						</p>
	                    						@endif
	                    					@endif
	                    				@endif
	                    			@endif
	                    		@endforeach
	                    		@endif
	                   
	                    	</div><br>
	                    </p>
	                </div>
                	<div class="services row">
	                    <h3><label class="color-1 col-lg-12 mt-3">Services : </label></h3>
	                    
	                    <p class="col-lg-12">
	                    	<div class="text-left">
	                    		
	                    		@if(count(@$userDetails->data))
	                    		@foreach(@$userDetails->data as $row)
	                    			
	                    			@if(isset($row['subHeading']) && $row['subHeading'] == 'Services')
	                    				@php
	                    					$tempArr = $row;
	                    					if(isset($tempArr['heading'])){
	                    						unset($tempArr['heading']);
	                    					}
	                    					if(isset($tempArr['subHeading'])){
	                    						unset($tempArr['subHeading']);
	                    					}
	                    					$str1 = implode(', ', $tempArr);
	                   					@endphp
	                   					@if(@$str1 != '')
	                   						<p>{{@$row['heading']}}</p>
		                    				<p><strong>{{@$row['subHeading']}}:</strong>
		                    					
		                    					{{@$str1}}
		                    				</p>
	                   					@endif
	                    				
	                    			@endif
	                    		@endforeach
	                    		@endif
	                    		
	                    		
	                    	</div><br>
	                    	
	                    </p>
	                </div>
	                
	                <div class="gallery">
	                    <h1 class="color-1 col-lg-12 text-center">GALLERY</h1>
	                    <hr> <hr>
	                    <div class=" row" id="gallery-content">
	                        @if(isset($userDetails->gallery) && $userDetails->gallery != null)
	                        @foreach($userDetails->gallery as $image)
	                        	<div class="col-lg-4 p-4">
			                    	<img id="gallery-image-id-0" alt="" width="100%" height="100%" src="{{asset((isset($image) && $image != '') ? $image : 'template_new/assets/images/application_logo.jpg')}}">
			                    </div>
	                        @endforeach
	                        @endif
	                    </div>
	                </div>
                @endif

                

                
                    
                
            </div>
            
        </div>
        <!-- /.card-body -->
      </div>
      <!-- Gallery Modal -->
      <div class="modal show-images-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog " role="document">
          <div class="modal-content bg-dark">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div id="gallery-content">

              </div>
              <button type="button" class="btn customBtn mt-4" onclick="redirect();">Okay</button>

            </div>
            <div class="modal-footer text-center">
            </div>
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

    $(document).ready(function () {
		@if(@$prodFlag == 'false')
			$("#prod_heading").text('').hide();
		@endif
    });
	
    </script>
@endpush
