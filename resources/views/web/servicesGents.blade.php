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
			<div class="content_blk" style="background-image: url('{{ asset('template_new/') }}assets/images/service_main.jpg');">
				<h2>You book We deliver</h2>
				<div class="inner">
					<div class="btn_list">
						
						<a href="{{route('servicesLadies')}}" class="shadow_btn" data-id="ladies-services">Ladies services</a>
						<a href="{{route('servicesMakeup')}}" class="shadow_btn" data-id="makeup">Make-up</a>
						<a href="javascript:;" class="shadow_btn" data-id="gents-services">Gents Services</a>
						
					</div>
					<div class="text_list" data-id="gents-services" style="display: block;">
						<div class="text_list_inner">
							<ul class="btns scrollbar">
								<li>
									<button type="button" class="shadow_btn shadowbtn"  onclick="caseCat('Scissors_Cut')">Scissors Cut <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
								</li>
								<li>
									<button type="button" class="shadow_btn shadowbtn"  onclick="caseCat('Cliper_Scissors_Cut')">Cliper & Scissors Cut <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
								</li>
								<li>
									<button type="button" class="shadow_btn shadowbtn"  onclick="caseCat('Clipper_Cut')">Clipper Cut <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
								</li>
								<li>
									<button type="button" class="shadow_btn shadowbtn"  onclick="caseCat('Skin_Fade')">Skin Fade <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
								</li>
								<li>
									<button type="button" class="shadow_btn shadowbtn"  onclick="caseCat('Beard_Shaped')">Beard Shaped <img src="{{ asset('template_new/assets/images/eye.svg') }}" alt=""></button>
								</li>				
								
							</ul>
							<div class="txt_wrap scrollbar" id="showbox">
								<form action="" method="post">
									<div class="form_inner">
										<div class="row">
											<div id="top_1" class="col-md-3 mb-4">
												<div class="input_box_wrap">
<!-- 													<input type="text" class="input_box" value=""> -->
													<p class="input_box"></p>
												</div>
											</div>
											<div id="top_2" class="col-md-3 mb-4">
												<div class="input_box_wrap">
<!-- 													<input type="text" class="input_box" value=""> -->
													<p class="input_box"></p>
												</div>
											</div>
											<div id="top_3" class="col-md-3 mb-4">
												<div class="input_box_wrap">
<!-- 													<input type="text" class="input_box" value=""> -->
													<p class="input_box"></p>
												</div>
											</div>
										</div>
										<div>
											<p id="category_description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
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
	function caseCat(i) {

		if (i == 'Scissors_Cut') {
			$("#top_1").show();
			$("#top_1 p").html('40 Mints &pound;35');
			$("#top_2,#top_3").hide();
			$("#category_description").text("A scissors cut is a more 'natural' cut. It contours to the head better than a clipper cut, The hair blends in better with a scissors cut, and the hair grows in more naturally.");
		}

		if (i == 'Cliper_Scissors_Cut') {
			$("#top_1").show();
			$("#top_1 p").html('30 Mints &pound;30');
			$("#top_2,#top_3").hide();
			$("#category_description").text("The  back and side will be cut with a clipper for a sharper look and the top finished with the scissors for a softer finish");
		}

		if (i == 'Clipper_Cut') {
			$("#top_1").show();
			$("#top_1 p").html('20 Mints &pound;20');
			$("#top_2,#top_3").hide();
			$("#category_description").text('Hair Clippers are distinctly different for its sharpennes from other hair cutting methods like scissors or razors');
		}


		if (i == 'Skin_Fade') {
			$("#top_1").show();
			$("#top_1 p").html('45 Mints &pound;40');
			$("#top_2,#top_3").hide();
			$("#category_description").text("The hair is gradual transition from skin fade to bold on the back and sides to longer hair on the top the head");
		}


		if (i == 'Beard_Shaped') {
			$("#top_1").show();
			$("#top_1 p").html('20 Mints &pound;15');
			$("#top_2,#top_3").hide();
			$("#category_description").text('A shape-up is a groming style that involves "line-up and shape-up" with the goal of creating a perfectly straight edge');
		}
	}
	
</script>
@endpush
