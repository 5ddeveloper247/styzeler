@extends('layouts.master.template_new.master')

@push('css')
    <style>
       	#services .text_list .btns .shadow_btn{
			text-align: left;
		}
		#services .text_list .txt_wrap form .input_box {
			height: 3rem;
		}
		.shadow_btn{
			padding: 0 2rem;
		}
		.input_box {
            cursor: pointer;
        }
        .btn1 {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
        .customBtn {
		    color: #c4b9b0 !important;
		    border: 1px solid #c4b9b0;
		    border-radius: 0;
		    font-size: 18px;
		    transition-duration: 0.3s;
		    cursor: pointer;
		}
    </style>
@endpush

@section('content')

<section id="services">
		<div class="contain" data-aos="fade-up" data-aos-duration="1000">
			<div class="outer">
				<div class="image_blk">
					<div class="image"><img src="{{ asset('template_new/assets/images/service_bg_08.jpg') }}" alt=""></div>
					<div class="image"><img src="{{ asset('template_new/assets/images/service_bg_09.jpg') }}" alt=""></div>
				</div>
				<div class="content_blk" style="background-image: url('{{ asset('template_new/assets/images/service_main.jpg') }}');">
					<h2>You book We deliver</h2>
					<div class="inner">
						<div class="btn_list">
							
							<a href="{{route('servicesLadies')}}" class="shadow_btn" data-id="ladies-services">Ladies services</a>
							<a href="javascript:;" class="shadow_btn" data-id="makeup">Make-up</a>
							<a href="{{route('servicesGents')}}" class="shadow_btn" data-id="gents-services">Gents Services</a>
							
						</div>
						<div class="text_list" data-id="makeup" style="display: block;">
							<div class="text_list_inner">
								<ul class="btns scrollbar">
									<li>
										<button type="button" class="shadow_btn shadowbtn"   onclick="caseCat('Makeup_Blowdry')">Make -up & Blow-dry <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn"   onclick="caseCat('Make_up_Up_do')">Make-up & Up-do <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn"   onclick="caseCat('Make_up')">Make-up <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<a href="{{route('wedding')}}" class="shadow_btn shadowbtn" onclick="caseCat('Bridal_Make_up')">Bridal Make-up <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></a>
									</li>
								</ul>
								<div class="txt_wrap scrollbar" id="showbox">
									<form action="" method="post">
										<div class="form_inner">
											<div class="row">
												<div id="top_1" class="col-md-3 mb-4">
													<div class="input_box_wrap">
<!-- 														<input type="text" class="input_box" value=""> -->
														<p class="input_box add_to_cart" data-time=""
                                                          	data-price="" data-type="" data-subtype=""
                                                         	data-service=""></p>
													</div>
												</div>
												<div id="top_2" class="col-md-3 mb-4">
													<div class="input_box_wrap">
<!-- 														<input type="text" class="input_box" value=""> -->
														<p class="input_box add_to_cart" data-time=""
                                                          	data-price="" data-type="" data-subtype=""
                                                         	data-service=""></p>
													</div>
												</div>
												<div id="top_3" class="col-md-3 mb-4">
													<div class="input_box_wrap">
<!-- 														<input type="text" class="input_box" value=""> -->
														<p class="input_box add_to_cart" data-time=""
                                                          	data-price="" data-type="" data-subtype=""
                                                         	data-service=""></p>
													</div>
												</div>
											</div>
											<div>
												<p id="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
											</div>
										</div>
										<div class="right-arrow">
											<img src="{{ asset('template_new/assets/images/arrow-234.svg') }}">
										</div>
										<div class="btn_block">
											@if(@$tokens>0)
												<a href="{{ route('bookFreelancer') }}" class="book_freelance_btn">
													<img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""> Book a Freelancer
												</a>
											@else
												<a href="{{ route('bookFreelancer') }}" class="book_freelance_btn "><!-- error-booking -->
													<img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""> Book a Freelancer
												</a>
											@endif
											<ul class="check_list">
												<li><img src="{{ asset('template_new/assets/images/tick2.svg') }}" alt=""> All candidates are DBS verified</li>
												<li><img src="{{ asset('template_new/assets/images/tick2.svg') }}" alt=""> At - Home service 24/7</li>
												<li><img src="{{ asset('template_new/assets/images/tick2.svg') }}" alt=""> Minimum call out &pound;30</li>
											</ul>
										</div>
									</form>
									<form id="addtocart_form" style="display: none;">
                                        <input type="hidden" id="userId" name="userId" value="{{ @Auth::user()->id }}">
                                        <input type="hidden" id="userType" name="userType" value="{{ @Auth::user()->type }}">
                                        <input type="hidden" id="item_text" name="item_text" value="">
                                        <input type="hidden" id="item_time" name="item_time" value="">
                                        <input type="hidden" id="item_price" name="item_price" value="">
                                        <input type="hidden" id="item_type" name="item_type" value="">
                                        <input type="hidden" id="item_subtype" name="item_subtype" value="">
                                        <input type="hidden" id="item_service" name="item_service" value="">
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Booking Fail Message-->
		<div class="modal fade bd-example-modal-md" id="fail-modal" role="dialog">
	    	<div class="modal-dialog modal-md" style="width: 350px">
	        	<div class="modal-content border border-warning"
	            	style="background-color: black; color: white; max-height: 1000px; overflow-y: auto; margin-top: 30%; margin-left: 10%;">
	            	<div class="modal-header" style="border-bottom: 5px solid #766d48">
	                	<h4 class="modal-title fs-1">Alert</h4>
	                    <i class="close-modal" style="font-size: 2rem; cursor: pointer"><b>&times;</b></i>
	              	</div>
	             	<div class="modal-body my-5">
	                	<p class="fs-2">Insufficient tokens, first buy package!</p>
	             	</div>
	          	</div>
	      	</div>
	  	</div>
	  	<div class="modal fade bd-example-modal-md" id="cartConfirm_modal" role="dialog">
            <div class="modal-dialog modal-md ">
                <div class="modal-content border border-warning"
                    style="background-color: black; color: white; max-height: 400px; overflow-y: auto;">
                    <div class="modal-header" style="border-bottom: 5px solid #766d48;">
                        <h4 class="modal-title">Confirmation</h4>
                        <i class="close-modal closeCartConfirm" style="font-size: 2rem;cursor:pointer;"><b>&times;</b></i>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to add this service in cart?
                    </div>
                    <div class="modal-footer text-center">
                        <a type="" href="javascript:;" class="btn1 customBtn" onclick="addToCartConfirm();">Yes</a>
                        <a type="button" class="btn1 customBtn closeCartConfirm" data-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
	</section>

@endsection

@push('script')
<script src="{{ asset('customjs/web/cart/addtocart.js') }}?v={{time()}}"></script>
<script src="https://kit.fontawesome.com/8389fcfe36.js" crossorigin="anonymous"></script>
<script>
	$(window).on("load", function () {
		$(document).on("click", ".btn_list .shadow_btn", function () {
			let id = $(this).data("id");
			$(".text_list[data-id = " + id + "]").slideToggle();
		});
		$(document).on("click", ".btns > li > button", function () {
			$(this).parent().find(".sub_btns").slideToggle();
		});
		$(document).on("click", ".sub_btns > li > button", function () {
			$(this).parents(".text_list_inner").find(".txt_wrap").fadeIn(); //.fadeToggle();
		});
		$(document).on("click", ".shadowbtn", function () {
			$(this).parents(".text_list_inner").find(".txt_wrap").fadeIn(); //.fadeToggle();
		});
		
	});

	var addtocartType = 'Make-up';
	
	function caseCat(i, subtype = '') { 
		
		 if(i=='Makeup_Blowdry') { 
		  $("#top_1").show();
		  $("#top_1 p").html('90 mints  &pound;100').attr('data-time', '90').attr('data-price', '100').attr(
                  'data-service', 'Make -up & Blow-dry').attr('data-subtype', subtype);
		  $("#top_2,#top_3").hide();
		  $("#description").text('This package combines two of the most requested treatments for a special night out or event. Styzeler Hair & Makeup Freelancers  will provide the Make-up and   a Blow-dry of your choice');
	    }  

		
		if(i=='Make_up_Up_do') { 
			$("#top_1").show();
		    $("#top_1 p").html('80 mints  &pound;90').attr('data-time', '80').attr('data-price', '90').attr(
	                  'data-service', 'Make-up & Up-do').attr('data-subtype', subtype);	
			$("#top_2,#top_3").hide();
	        $("#description").text('This package combines two of the most requested treatments for a special night out or event. Styzeler Hair & Makeup Freelancers  will provide the Make-up and   Up-do of your choice,');
	    }  
	  		
		if(i=='Make_up') {   
			$("#top_1").show();
		    $("#top_1 p").html('60 mints  &pound;50').attr('data-time', '60').attr('data-price', '50').attr(
	                  'data-service', 'Make-up').attr('data-subtype', subtype);	
			$("#top_2,#top_3").hide();
	        $("#description").text('Our Freelancer can create the perfect makeup that is most suitable to your facial features for a night out with friends, or for special events');
	    }   
	    
		
		if(i=='Bridal_Make_up') {
	  	   	$("#top_1,#top_2,#top_3").hide();
	  	 	$("#top_1 p").html('').attr('data-time', '').attr('data-price', '').attr(
                 'data-service', 'Bridal Make-up').attr('data-subtype', subtype);	
	       	$("#description").text('the bridal makeup needs to be linked with the bridal page');
	    }
	}
	
</script>
@endpush
