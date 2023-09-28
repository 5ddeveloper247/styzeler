@extends('layouts.master.template_new.master')

@push('css')
    <style>
       	#services .text_list .btns .shadow_btn{
			text-align: left;
		}
		#services .text_list .txt_wrap form .input_box {
			height: 3rem;
		}
    </style>
@endpush

@section('content')

<section id="services">
		<div class="contain" data-aos="fade-up" data-aos-duration="1000">
			<div class="outer">
				<div class="image_blk">
					<div class="image"><img src="{{ asset('template_new/assets/images/service_bg_04.jpg') }}" alt=""></div>
					<div class="image"><img src="{{ asset('template_new/assets/images/service_bg_05.jpg') }}" alt=""></div>
				</div>
				<div class="content_blk" style="background-image: url('{{ asset('template_new/assets/images/service_main.jpg') }}');">
					<h2>You book We deliver</h2>
					<div class="inner">
						<div class="btn_list">
							
							<a href="{{route('servicesBodywaxing')}}" class="shadow_btn" data-id="body_waxing">Body Waxing</a>
							<a href="{{route('servicesEyebrows')}}" class="shadow_btn" data-id="eye_brows">Eyes & Brows</a>
							<a href="javascript:;" class="shadow_btn" data-id="mani_pedi">Mani / Pedi</a>
							<a href="{{route('servicesFacial')}}" class="shadow_btn" data-id="facial">Facial</a>
						</div>
						<div class="text_list" data-id="mani_pedi" style="display: block;">
							<div class="text_list_inner">
								<ul class="btns scrollbar">
									<li>
										<button type="button" class="shadow_btn shadowbtn" onclick="caseCat('HydraRegular_Mani_Pedicurefacial')">Regular Mani/Pedicure <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn" onclick="caseCat('Regular_Mani')">Regular Mani <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn" onclick="caseCat('Regular_Pedicure')">Regular Pedicure <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn" onclick="caseCat('Russian_Mani_Pedicure')">Russian Mani/Pedicure <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn" onclick="caseCat('Russian_Mani')">Russian Mani <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn" onclick="caseCat('Russian_Pedicure')">Russian Pedicure <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn" onclick="caseCat('French_Mani_Pedicure')">French Mani/Pedicure <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn" onclick="caseCat('French_Mani')">French Mani <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn" onclick="caseCat('French_Pedicure')">French Pedicure <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn" onclick="caseCat('Gel_Mani_Pedicure')">Gel Mani/Pedicure <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn" onclick="caseCat('Gel_Mani')">Gel Mani <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn" onclick="caseCat('Gel_Pedicure')">Gel Pedicure <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn" onclick="caseCat('Get_Nail_Extension')">Get Nail Extension <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn" onclick="caseCat('Acrylic_Nail_Extension')">Acrylic Nail Extension <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn" onclick="caseCat('Nail_Designs')">Nail Designs <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn" onclick="caseCat('Nail_Art_Gel_mani')">Nail Art + Gel mani <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<li>
										<button type="button" class="shadow_btn shadowbtn" onclick="caseCat('Nail_Art_Gel_Pedi')">Nail Art + Gel Pedi <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									<!-- <li>
										<button type="button" class="shadow_btn shadowbtn" onclick="caseCat('Hard_Gel')">Hard Gel <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
									</li>
									 -->
								</ul>
								<div class="txt_wrap scrollbar">
									<form action="" method="post">
										<div class="form_inner">
											<div class="row">
												<div class="col-10">
													<div class="row">
														<div id="top_1" class="col-md-4 mb-4">
															<div class="input_box_wrap">
<!-- 																<input type="text" class="input_box" value=""> -->
																<p class="input_box"></p>
															</div>
														</div>
														<div id="top_2" class="col-md-4 mb-4">
															<div class="input_box_wrap">
<!-- 																<input type="text" class="input_box" value=""> -->
																<p class="input_box"></p>
															</div>
														</div>
														<div id="top_3" class="col-md-4 mb-4">
															<div class="input_box_wrap">
<!-- 																<input type="text" class="input_box" value=""> -->
																<p class="input_box"></p>
															</div>
														</div>
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
<!-- <script src="{{ asset('template_new/assets/js/main.js') }}"></script> -->
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
		if(i=='HydraRegular_Mani_Pedicurefacial'){
			$("#top_1").show();
			$("#top_1 p").html('90 Minuts &pound; 48');
			$("#top_2,#top_3").hide();
			$("#description").text("Manicure and Pedicure are the curation and care of a client's hands and  feet. This includes skincare, nail care, and artificial nail enhancements that can be customised to a variety of preferences");
		} 

		if(i=='Regular_Mani'){
			$("#top_1").show();
			$("#top_1 p").html('45 Minuts &pound; 24');
			$("#top_2,#top_3").hide();
			$("#description").text("Regular manicure is the traditional manicure that you're probably familiar with. Here your nails are trimmed, shaped and buffed. Cuticle oil is applied and cuticles are managed too. You'll usually get to enjoy a wonderfully relaxing hand massage. In the end, standard nail polish is applied");
		} 
		if(i=='Regular_Pedicure'){
			$("#top_1").show();
			$("#top_1 p").html('45 Minuts &pound; 30');
			$("#top_2,#top_3").hide();
			$("#description").text('Classic pedicures. During the classic pedicure, the feet are soaked in warm water, usually with dissolved sea salt or other ingredients for the pedicure. Later, the hard layer of skin is removed, coticules are cut around the nails, and the nail shape is corrected. Nails are covered with nail polish.');
		} 

		if(i=='Russian_Mani_Pedicure'){
			$("#top_1").show();
			$("#top_1 p").html('90 Minuts &pound; 65');
			$("#top_2,#top_3").hide();
			$("#description").text('With a Russian manicure, however, the technician will use an electronic file or drill to remove the extra cuticle under the nail bed for a clean trim');
		} 


		if(i=='Russian_Mani'){
			$("#top_1").show();
			$("#top_1 p").html('45 Minuts &pound; 35');
			$("#top_2,#top_3").hide();
			$("#description").text('The Russian Manicure involves a dry process of filing, cutting, and removing the cuticle with electric drill bits entirely for a clean, edge-less look');
		} 


		if(i=='Russian_Pedicure'){
			$("#top_1").show();
			$("#top_1 p").html('45 Minuts &pound; 40');
			$("#top_2,#top_3").hide();
			$("#description").text("A Russian pedicure is a technique that makes use of an electronic file to remove the excess skin surrounding your nail bed. The cuticle attachments are super fine and gentle so to avoid any damage to the nail bed or surrounding skin");
		} 



		if(i=='French_Mani_Pedicure'){
			$("#top_1").show();
			$("#top_1 p").html('90Minuts &pound; 56');
			$("#top_2,#top_3").hide();
			$("#description").text('A French manicure or pedicure is a specific style of painting the nails that consists of a natural looking clear, pink or nude toned base polish paired with thin white tips.');
		} 


		if(i=='French_Mani'){
			$("#top_1").show();
			$("#top_1 p").html('45 Minuts &pound; 30');
			$("#top_2,#top_3").hide();
			$("#description").text('French manicure in which a band of usually white polish across the tip of the nail contrasts with the often clear or pale polish below.');
		} 


		if(i=='French_Pedicure'){
			$("#top_1").show();
			$("#top_1 p").html('45 Minuts &pound; 35');
			$("#top_2,#top_3").hide();
			$("#description").text('French Pedicure in which a band of usually white polish across the tip of the nail contrasts with the often clear or pale polish below.');
		} 


		if(i=='Gel_Mani_Pedicure'){
			$("#top_1").show();
			$("#top_1 p").html('120 Minuts &pound; 60');
			$("#top_2,#top_3").hide();
			$("#description").text('A gel manicure or pedicure involves a manicurist applying two coats of gel then set and hardening under UV (ultra-violet) light using a small, portable UV machine. Application may involve up to three coats of gel, and each coat needs to be set or “cured” under the light');
		} 

		
		if(i=='Gel_Mani'){
			$("#top_1").show();
			$("#top_1 p").html('60 Minuts &pound; 30');
			$("#top_2,#top_3").hide();
			$("#description").text('A gel manicure involves a manicurist applying two coats of gel and then set and hardening under UV (ultra-violet) light using a small, portable UV machine. Application may involve up to three coats of gel, and each coat needs to be set or “cured” under the light');
		} 

		
		if(i=='Gel_Pedicure'){
			$("#top_1").show();
			$("#top_1 p").html('60 Minuts &pound; 35');
			$("#top_2,#top_3").hide();
			$("#description").text('A gel pedicure involves a manicurist applying two coats of gel and then set and hardening under UV (ultra-violet) light using a small, portable UV machine. Application may involve up to three coats of gel, and each coat needs to be set or “cured” under the light');
		} 

      
		if(i=='Get_Nail_Extension'){
			$("#top_1").show();
			$("#top_1 p").html('60 Minuts &pound; 45');
			$("#top_2,#top_3").hide();
			$("#description").text('Gel extensions are created when the hard or semi-hard gel is sculpted, cured, and then shaped to add length and strength to the nail.');
		} 
		
		if(i=='Acrylic_Nail_Extension'){
			$("#top_1").show();
			$("#top_1 p").html('90 Minuts &pound; 50');
			$("#top_2,#top_3").hide();
			$("#description").text('An acrylic tip is  added to your nails and requires a monomer liquid and polymer powder to create the sculpted nail');
		} 

		if(i=='Nail_Designs'){
			$("#top_1").show();
			$("#top_1 p").html('&pound;10');
			$("#top_2,#top_3").hide();
			$("#description").text("Nail Design is a creative way to paint, decorate, enhance, and embellish nails. It is a type of artwork that can be done on fingernails and toenails,");
		} 

		if(i=='Nail_Art_Gel_mani'){
			$("#top_1").show();
			$("#top_1 p").html('70 Minuts &pound; 40');
			$("#top_2,#top_3").hide();
			$("#description").text('Nail art is a creative way to paint, decorate, enhance, and embellish nails. It is a type of artwork that can be done on fingernails and toenails,');
		} 

		if(i=='Nail_Art_Gel_Pedi'){
			$("#top_1").show();
			$("#top_1 p").html('60 Minuts &pound; 45');
			$("#top_2,#top_3").hide();
			$("#description").text("Nail art is a creative way to paint, decorate, enhance, and embellish nails. It is a type of artwork that can be done on fingernails and toenails,");
		} 


		if(i=='Gel_Mani_Pedicure'){
			$("#top_1").show();
			$("#top_1 p").html('120 Minuts &pound; 60');
			$("#top_2,#top_3").hide();
			$("#description").text('A gel manicure or pedicure involves a manicurist applying two coats of gel then set and hardening under UV (ultra-violet) light using a small, portable UV machine. Application may involve up to three coats of gel, and each coat needs to be set or “cured” under the light');
		} 
	}
</script>
@endpush
