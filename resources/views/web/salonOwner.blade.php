@extends('layouts.master.template_old.master')

@push('css')
    <style>
       .salon-owner {
            padding: 10px 5px 5px 15px;
        }
        
        @media screen and (max-width: 500px) {
            .owner h1{
                font-size: 2.3rem !important;
            }
    
        }
        
         @media screen and (max-width: 320px) {
            .owner h1{
                font-size: 2.1rem !important;
            }
    
        }
        
    </style>
@endpush

@section('content')

<div class="salon-owner-banner mb-5"  data-aos="fade-up">

      <img src="{{ asset('template_old/images/salon-owner-banner.png') }}" alt="" width="100%" height="80%">

    </div>
    <div class="owner">
	    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <h1>We are Styzeler</h1>
                    <h1>We are Recruiting</h1>
                    <div class="my-4">
                        <h3 class="color-1">Freelance Agency</h3>
                        <h5>Specialist in Hair & Beauty London Uk </h5>
                        <h6>Permanent & Temporary Recrutiment</h6>
                        <hr class="customHr">
                    </div>
                    <p>Styzeler's reputation is based on exceptional reliability and professionalism providing clients with experienced and qualified Freelancer who have the skills to take any business forward and make a difference straight away, taking the pressure off overstretched permanent personnel

                    </p>
                </div>
                <div class="col-lg-6 p-md-5" data-aos="fade-up">
                    <div class="salon-owner">
                        <h3 class="color-1">Salon Owner</h3>
                        <div class="salon-owner-text">
                            <p>Freelancers can be used in multiple ways, one of the biggest reword is for a start-up  business, they take away the pressure of fixed-wage and allows the freedom of booking, for established businesses Freelancers can serve as stand by or oversee waiting list that became too long</p>
                            <p>Salon Owner can hire a Freelancer for an unlimited or designated short period of time if desired offer a full-time position to a Freelancer who suits the business philosophy. Hiring a Freelancer can also be a great method of ensuring work is completed while you search for the perfect candidate for a particular job</p>
                        </div>
                       
                    </div>
                    <br/><br/><br/>
                </div>
	        </div>
	
	        <!--Put a picture-->
	
	        <div class="salon-owner-bottom-banner my-5" >
	
	          <!-- <img src="images/salon-owner-bottom-banner.png" alt="" width="100%" height="80%" style="background-attachment: fixed;"> -->
	    
	        </div>
	      
	
	        <div class="content-category">
	            <div class="container">
	                <div class="content-category-header ">
	                    <h1><button id="hairdressing" class="btn  salonCustomBtnSelected hairdressingBtn" onclick="showHairdressingOwner();">Hairdressing / Barber</button></h1> 
	                    <h1><button id="beauty" class="btn customBtn beautyBtn" onclick="showBeautyOwner();">Beauty / Spa </button></h1> 
	                    <div class="line line-1"></div>
	                    <div class="line line-2"></div>
	                    <div class="line line-3"></div>
	                    <div class="line line-4"></div>
	                    <div class="line line-5"></div>
	                </div>
	                <div class="content-category-people row my-5" id="hairdressing_container">
	                	@if(isset($users))
	                	@foreach($users as $row)
	                	@if($row->type == 'hairdressingSalon')
	                	<div class="col-sm-6 col-lg-4">
	                		<a id="{{$row->id}}" ><!-- onclick="getFreelancer('Hairdressing Owner', 59)" -->
	                			<h4 class="color-1">{{$row->name}} {{$row->surname}}</h4>
	                			<div class="category-people py-3">
	                				<div class="picture">
	                					<img id="profile-image-id-0" alt="" width="100%" height="100%" src="{{ asset(isset($row->hero_image) ? $row->hero_image : 'template_old/images/blank.png') }}">
	                				</div>
	                			</div>
	                		</a>
	                	</div>
	                	@endif
	                	@endforeach
	                	@endif
	              	</div>
	              	
	              	<div class="content-category-people row my-5" id="beautyspa_container" style="display:none;">
	                	@if(isset($users))
	                	@foreach($users as $row)
	                	@if($row->type == 'beautySalon')
	                	<div class="col-sm-6 col-lg-4">
	                		<a id="{{$row->id}}" ><!-- onclick="getFreelancer('Hairdressing Owner', 59)" -->
	                			<h4 class="color-1">{{$row->name}} {{$row->surname}}</h4>
	                			<div class="category-people py-3">
	                				<div class="picture">
	                					<img id="profile-image-id-0" alt="" width="100%" height="100%" src="{{ asset(isset($row->hero_image) ? $row->hero_image : 'template_old/images/blank.png') }}">
	                				</div>
	                			</div>
	                		</a>
	                	</div>
	                	@endif
	                	@endforeach
	                	@endif
	              	</div>
	            </div>
	            
	        </div>
	    </div>
	</div>

@endsection

@push('script')
<script>
function showHairdressingOwner(){

	$('#hairdressing').removeClass('customBtn').addClass('salonCustomBtnSelected');
	$('#beauty').removeClass('salonCustomBtnSelected').addClass('customBtn');

	$('#hairdressing_container').show();
	$('#beautyspa_container').hide();
	
}
function showBeautyOwner(){

	$('#beauty').removeClass('customBtn').addClass('salonCustomBtnSelected');
	$('#hairdressing').removeClass('salonCustomBtnSelected').addClass('customBtn');

	$('#hairdressing_container').hide();
	$('#beautyspa_container').show();
}
</script>
@endpush
