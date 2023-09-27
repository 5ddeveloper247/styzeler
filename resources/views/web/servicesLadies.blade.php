@extends('layouts.master.template_new.master')

@push('css')
    <style>
       	#services .text_list .btns .shadow_btn{
			text-align: left;
		}
		#services .text_list .txt_wrap form .input_box {
			height: 3rem;
			color: #9f866d !important;
	/* 		width: auto !important; */
			background-color: transparent !important
		}
	
		#services .text_list .btns > li > .shadow_btn::after {
			border-color: #00c2cb;
		}
		.shadowbtn::after{
			border-color: #fdd431 !important;
		}
		.shadow_btn{
			padding: 0 2rem;
		}
		.input_box{
			font-size:1.8rem !important;
		}
		#services .text_list .txt_wrap form .input_box_wrap::before {
			border:unset !important;
		} 
		#descHeading{
			font-weight:600;
		}
    </style>
@endpush

@section('content')

<section id="services">
		<div class="contain" data-aos="fade-up" data-aos-duration="1000">
			<div class="outer">
				<div class="image_blk">
					<div class="image"><img src="{{ asset('template_new/assets/images/service_bg_06.jpg') }}" alt=""></div>
					<div class="image"><img src="{{ asset('template_new/assets/images/service_bg_07.jpg') }}" alt=""></div>
				</div>
				<div class="content_blk" style="background-image: url('{{ asset('template_new/assets/images/service_main.jpg') }}');">
					<h2>You book We deliver</h2>
					<div class="inner">
						<div class="btn_list">
							
							<a href="javascript:;" class="shadow_btn" data-id="ladies-services">Ladies services</a>
							<a href="{{route('servicesMakeup')}}" class="shadow_btn" data-id="makeup">Make-up</a>
							<a href="{{route('servicesGents')}}" class="shadow_btn" data-id="gents-services">Gents Services</a>
							
						</div>
						<div class="text_list" data-id="ladies-services">
							<div class="text_list_inner">
								<ul class="btns scrollbar">
									
									<li>
										<button type="button" class="shadow_btn shadowbtn"   onclick="caseCat('Cut_Blowdry')">Cut & Blowdry <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn"  onclick="caseCat('Blowdry')">Blowdry <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn"  onclick="caseCat('Color')">Color <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn"  onclick="caseCat('Highlights')">Highlights <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn"  onclick="caseCat('Balayage')">Balayage <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn"  onclick="caseCat('Full_Head_Bleach')">Full Head Bleach <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn"  onclick="caseCat('Colour_Correction')">Colour Correction <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn"  onclick="caseCat('Perm')">Perm <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn"  onclick="caseCat('Brazilian_Blow_Dry')">Brazilian Blow-out <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn"  onclick="caseCat('keratin_Treatment')">keratin Treatment <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn"  onclick="caseCat('Olaplex')">Olaplex <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn"  onclick="caseCat('Up_do')">Up-do <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn"  onclick="caseCat('Bridal_Hair')">Bridal Hair <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn">Hair extension</button>
										<ul class="sub_btns">
											<li>
												<button type="button" class="shadow_btn" onclick="caseCat('Tape_in_Hair')">Tape-in-Hair <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
											</li>
											<li>
												<button type="button" class="shadow_btn" onclick="caseCat('Bonded_Hair')">Bonded Hair <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
											</li>
											<li>
												<button type="button" class="shadow_btn" onclick="caseCat('Micro_Ring')">Micro Ring <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
											</li>
										</ul>
									</li>
									
								</ul>
								<div class="txt_wrap scrollbar" id="showbox">
									<form action="" method="post">
										<div class="form_inner">
											<div class="row">
												<div class="col-12">
													<div class="row">
														<div id="top_1" class="col-md-7 mb-4">
															<div class="input_box_wrap d-flex">
<!-- 																<input type="text" class="input_box" value="" >  -->
																<p class="input_box"></p>
																<span><i class="fas fa-plus my-1" style="color: #9f866d;"></i></span>
															</div>
														</div>
													</div>
												</div>
												<div class="col-12">
													<div class="row">
														<div id="top_2" class="col-md-7 mb-4">
															<div class="input_box_wrap d-flex">
<!-- 																<input type="text" class="input_box" value=""> -->
																<p class="input_box"></p>
																<span><i class="fas fa-plus my-1" style="color: #9f866d;"></i></span>
															</div>
														</div>
													</div>
												</div>
												<div class="col-12">
													<div class="row">
														<div id="top_3" class="col-md-7 mb-4">
															<div class="input_box_wrap d-flex">
<!-- 																<input type="text" class="input_box" value=""> -->
																<p class="input_box"></p>
																<span><i class="fas fa-plus my-1" style="color: #9f866d;"></i></span>
															</div>
														</div>
													</div>
												</div>
												<div class="col-12">
													<div class="row">
														<div id="top_4" class="col-md-7 mb-4">
															<div class="input_box_wrap d-flex">
<!-- 																<input type="text" class="input_box" value=""> -->
																<p class="input_box"></p>
																<span><i class="fas fa-plus my-1" style="color: #9f866d;"></i></span>
															</div>
														</div>
													</div>
												</div>
												<div class="col-12">
													<div class="row">
														<div id="top_5" class="col-md-7 mb-4">
															<div class="input_box_wrap d-flex">
<!-- 																<input type="text" class="input_box" value=""> -->
																<p class="input_box"></p>
																<span><i class="fas fa-plus my-1" style="color: #9f866d;"></i></span>
															</div>
														</div>
													</div>
												</div>
												<div class="col-12">
													<div class="row">
														<div id="top_6" class="col-md-7 mb-4">
															<div class="input_box_wrap d-flex">
<!-- 																<input type="text" class="input_box" value=""> -->
																<p class="input_box"></p>
																<span><i class="fas fa-plus my-1" style="color: #9f866d;"></i></span>
															</div>
														</div>
													</div>
												</div>
												<div class="col-12">
													<div class="row">
														<div id="top_7" class="col-md-7 mb-4">
															<div class="input_box_wrap d-flex">
<!-- 																<input type="text" class="input_box" value=""> -->
																<p class="input_box"></p>
																<span><i class="fas fa-plus my-1" style="color: #9f866d;"></i></span>
															</div>
														</div>
													</div>
												</div>
												<div class="col-12">
													<div class="row">
														<div id="top_8" class="col-md-7 mb-4">
															<div class="input_box_wrap d-flex">
<!-- 																<input type="text" class="input_box" value=""> -->
																<p class="input_box"></p>
																<span><i class="fas fa-plus my-1" style="color: #9f866d;"></i></span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div style="padding-left: 1rem;">
												<h2 id="descHeading"></h2>
												<p id="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
											</div>
										</div>
										<div class="right-arrow">
											<img src="{{ asset('template_new/assets/images/arrow-234.svg') }}">
										</div>
										<div class="btn_block">
											<button type="button" class="book_freelance_btn"><img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""> Book a Freelancer</button>
											<ul class="check_list">
												<li><img src="{{ asset('template_new/assets/images/tick2.svg') }}" alt=""> All candidates are DBS verified</li>
												<li><img src="{{ asset('template_new/assets/images/tick2.svg') }}" alt=""> At - Home service 24/7</li>
												<li><img src="{{ asset('template_new/assets/images/tick2.svg') }}" alt=""> Minimum call out &pound;30</li>
											</ul>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</section>

@endsection

@push('script')
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
			$(this).parents(".text_list_inner").find(".txt_wrap").fadeToggle();
		});
		$(document).on("click", ".shadowbtn", function () {
			$(this).parents(".text_list_inner").find(".txt_wrap").fadeToggle();
		});
		
	});
	function caseCat(i)
	{
		if(i=='Cut_Blowdry') { 
			$("#top_1,#top_2,#top_3").show();
			$("#top_1 p").html('Short  60 mints  &pound; 40');
			$("#top_2 p").html('Medium 60 mints  &pound;48');
			$("#top_3 p").html('Long 60 mints  &pound; 56');	
			$("#top_4,#top_5,#top_6,#top_7,#top_8").hide();      
			$("#descHeading").hide().text('');
			$("#description").hide();   
		} 
	
		if(i=='Blowdry') { 
			$("#top_1,#top_2,#top_3").show();			;
			$("#top_1 p").html('Medium 45 mints &pound;35');
			$("#top_2 p").html('Long 60 mints  &pound; 40');
			$("#top_3 p").html('B+Updo 90 mints &pound; 72');
			$("#top_4,#top_5,#top_6,#top_7,#top_8").hide();
			$("#descHeading").hide().text('');
			$("#description").hide();
			
		} 
	
		if(i=='Color') { 
			$("#top_1,#top_2,#top_3,#top_4").show();		
			$("#description").hide();
			$("#top_1 p").html('Roots +Length  90 mints  &pound; 48');
			$("#top_2 p").html('Roots  60 mints   &pound; 40');
			$("#top_3 p").html('+ Blow-Dry');			
			$("#top_4 p").html('+ Cut- Blow-Dry');
			$("#top_5,#top_6,#top_7,#top_8").hide();    
			$("#descHeading").hide().text('');
			$("#description").hide();
		}
		if(i=='Highlights') { 
			$("#top_1,#top_2,#top_3,#top_4,#top_5,#top_6,#top_7").show();
			$("#top_1 p").html('T-sectiom 60 mints  &pound; 48');
			$("#top_2 p").html('Half Head  90 minuts  &pound;88');
			$("#top_3 p").html('Full Head 120 mints &pound; 104');			
			$("#top_4 p").html('+ Toner  10 ninuts  &pound; 15');
			$("#top_5 p").html('+ Colour 30 ninuts  &pound; 30');
			$("#top_6 p").html('+ Blow-Dry');
			$("#top_7 p").html('+ Cut- blow-ry');
			$("#top_8").hide();   
			$("#descHeading").hide().text('');
			$("#description").hide();
		} 
	
		if(i=='Balayage') { 
			$("#top_1,#top_2,#top_3,#top_4,#top_5,#top_6,#top_7").show();
			$("#top_1 p").html('Half Head  60 mints  &pound; 96');
			$("#top_2 p").html('Full Head  90 mints  &pound; 112');
			$("#top_3 p").html('+ Root shadow 30 ninuts  &pound; 30');			
			$("#top_4 p").html('+ Toner  &pound; 15');
			$("#top_5 p").html('+ Colour');
			$("#top_6 p").html('+ Blow-Dry');
			$("#top_7 p").html('+ Cut-Blow-Dry');
			$("#top_8").hide();
			$("#descHeading").hide().text('');
			$("#description").hide();
		} 
	
	
		if(i=='Full_Head_Bleach') {
	 
			$("#top_1,#top_2,#top_3,#top_4,#top_5,#top_6,#top_7,#top_8").show();
			$("#top_1 p").html('Short  90 mints  &pound; 80');
			$("#top_2 p").html('Medium 90 mints  &pound;100');
			$("#top_3 p").html('Long 120 mints  &pound; 140');			
			$("#top_4 p").html('Roots Bleach  90 mints  &pound; 50');
			$("#top_5 p").html('+ Rots  Toner  15 mints  &pound;16');
			$("#top_6 p").html('+ Full Head Toner 45 mints  &pound;40');
			$("#top_7 p").html('+ Cut-Blow Dry');
			$("#top_8 p").html('+ Blow Dry');
			$("#descHeading").hide().text('');
			$("#description").hide();
		} 
	
		if(i=='Colour_Correction') {   
			$("#top_1,#top_2,#top_3").show();
			$("#top_1 p").html('To be quoted &pound;.........');
			$("#top_2 p").html('+ Cut-Blow Dry');
			$("#top_3 p").html('+ Blow Dry');	
			$("#top_4,#top_5,#top_6,#top_7,#top_8").hide();
			$("#descHeading").hide().text('');
			$("#description").hide(); 
		} 
	
		if(i=='Perm') {    
			$("#top_1,#top_2,#top_3,#top_4,#top_5").show();
			$("#top_1 p").html('Short  60 minutes  &pound; 64');
			$("#top_2 p").html('Medium 60 minutes  &pound;88');
			$("#top_3 p").html('Long 90 minutes  &pound; 104');			
			$("#top_4 p").html('+ Cut-Blow Dry');
			$("#top_5 p").html('+ Blow Dry');
			$("#top_6,#top_7,#top_8").hide();  
			$("#descHeading").hide().text('');
			$("#description").hide(); 
		} 
	
		if(i=='Brazilian_Blow_Dry') { 
			$("#top_1,#top_2,#top_3,#description").show();
			$("#top_1 p").html('Short  60 mints  &pound; 70');
			$("#top_2 p").html('Medium 60 mints  &pound;90');
			$("#top_3 p").html('Long 60 mints  &pound; 100');
			$("#descHeading").hide().text('');
			$("#description").show().text("The Brazilian blowout is lighter and will leave your hair with a more natural texture than you'll experience with keratin treatment.");
			$("#top_4,#top_5,#top_6,#top_7,#top_8").hide();  
			
		} 
	
	
		if(i=='keratin_Treatment') { 
			$("#top_1,#top_2,#top_3").show();
			$("#top_1 p").html('Short  90 mints  &pound; 80');
			$("#top_2 p").html('Medium 120 mints  &pound;1200');
			$("#top_3 p").html('Long 150 mints  &pound; 140');
			$("#top_4,#top_5,#top_6,#top_7,#top_8").hide(); 
			$("#descHeading").hide().text('');
			$("#description").show().text("keratin treatment is the best for curly hair Keratin helps straighten overly curly hair, so it's less frizzy and is easy to style and manage.");
		} 
	
	
		if(i=='Olaplex') { 
			$("#top_1,#top_2").show();
			$("#top_1 p").html('Add-on &pound; 20');
			$("#top_2 p").html('Stand alone service &pound; 40');
			$("#top_3,#top_4,#top_5,#top_6,#top_7,#top_8").hide(); 
			$("#descHeading").hide().text('');
			$("#description").show().text("It works on a molecular level by restoring the hair's broken disulfide bonds which can result from harsh chemical treatments like bleaching and coloring.");
		} 
	
	
		if(i=='Up_do') { 
			$("#top_1").show();
			$("#top_1 p").html('60 mints  &pound; 50');	
			$("#top_2,#top_3,#top_4,#top_5,#top_6,#top_7,#top_8").hide();
			$("#descHeading").hide().text('');
			$("#description").show().text('An updo is a style that pulls the hair up and away from the face, there are many variations of the hairstyle, allowing you to adapt it to suit your preference easily. Whether you have short hair or long, straight texture or curly, there is an option for everyone');
		} 
	
	
		if(i=='Bridal_Hair') {    
			$("#description").show();
			$("#descHeading").hide().text('');
			$("#description").show().text('Hair Bridal should be connected with the wedding page');
			$("#top_1,#top_2,#top_3,#top_4,#top_5,#top_6,#top_7,#top_8").hide(); 	
		} 
		if(i=='Tape_in_Hair') {   
			 
			$("#top_1").show();
			$("#top_1 p").html('From &pound;350');	
			$("#top_2,#top_3,#top_4,#top_5,#top_6,#top_7,#top_8").hide(); 	
			$("#descHeading").show().text('For full quatation contact freelancer');
			$("#description").show().text('A must-have for those with normal-to-thick hair textures, tape-in hair extensions create a cascading veil effect and are reusable up to three times. This application is convenient for those who need to touch up their hair color within that time frame as well,');
		}
		if(i=='Bonded_Hair') {   
			 
			$("#top_1").show();
			$("#top_1 p").html('From &pound;650');	
			$("#top_2,#top_3,#top_4,#top_5,#top_6,#top_7,#top_8").hide(); 	
			$("#descHeading").show().text('For full quatation contact freelance');
			$("#description").show().text('Also known as keratin bond extensions, bonded hair extensions are flexible at the root, which is perfect for the client who regularly styles her hair or wears low ponytails');
		} 
		if(i=='Micro_Ring') {   
			 
			$("#top_1").show();
			$("#top_1 p").html('From &pound;450');	
			$("#top_2,#top_3,#top_4,#top_5,#top_6,#top_7,#top_8").hide(); 	
			$("#descHeading").show().text('For full quatation contact freelancer');
			$("#description").show().text('Micro rings are small metal rings that hair extensions are threaded through, along with some of your own hair. Once they have been positioned correctly the micro rings are clamped into place, securing the hair extensions to your hair');
		} 

	}
	
</script>
@endpush
