@extends('layouts.master.template_new.master')

@push('css')
    <style>
        .site_btn {
            border: 0.2rem solid #000000;
        }
        .li-100{
        	width:100% !important;
        }
    </style>
@endpush

@section('content')
    <section id="contact">
        <div class="top_banner" data-aos="fade-up" data-aos-duration="1000">
            <div class="contain">
                <div class="heading">
                    <img src="{{ asset('template_new/assets/images/contact_logo.jpg') }}" alt="">
                    <h1>Contact us</h1>
                </div>
            </div>
            <img src="{{ asset('template_new/assets/images/contact_main.jpg') }}" alt="" class="main_bg">
        </div>
        <div class="contain">
            <div class="content" data-aos="fade-up" data-aos-duration="1000">
                <h2>United to Succeed</h2>
                <p>What we do through Our recruiting project is to link freelancers with businesses owner to use their
                    knowledge and experience to benefit each other to succeed</p>
            </div>
            <div class="contact_for" data-aos="fade-up" data-aos-duration="1000">
                
                <div class="row">
                	<div class="col-sm-3 col-12"><h3>Contact Styzeler for:</h3></div>
	               	<div class="col-sm-3 col-6 mb-5">
	                	<ul class="btn_list">
	                		<li class="li-100">
	                    		<a href="{{route('contactUs')}}" class="shadow_btn">Styzeler 
		                    		<img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
		                    	</a>
		                    </li>
	                	</ul>
	                </div>
	                <div class="col-sm-3 col-6 mb-5">
	                	<ul class="btn_list">
	                		<li class="li-100">
	                    		<a href="{{route('salonOwner')}}" class="shadow_btn">Salon Owner 
		                    		<img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
		                    	</a>
		                    </li>
	                	</ul>
	                </div>
	                <div class="col-sm-3 col-6 mb-5">
	                	<ul class="btn_list">
	                		<li class="li-100">
	                    		<a href="{{route('rentAndLet')}}" class="shadow_btn">Rent & Let 
		                    		<img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
		                    	</a>
		                    </li>
	                	</ul>
	                </div>
	                <div class="col-sm-3 col-6 mb-5">
	                	<ul class="btn_list">
	                		<li class="li-100">
	                    		<a href="{{route('barber')}}" class="shadow_btn">Barber/Grooming 
		                    		<img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
		                    	</a>
		                    </li>
	                	</ul>
	                </div>
	                <div class="col-sm-3 col-6 mb-5">
	                	<ul class="btn_list">
	                		<li class="li-100">
	                    		<a href="{{route('hairstylist')}}" class="shadow_btn">Hair Stylist 
		                    		<img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
		                    	</a>
		                    </li>
	                	</ul>
	                </div>
	                <div class="col-sm-3 col-6 mb-5">
	                	<ul class="btn_list">
	                		<li class="li-100">
	                    		<a href="{{route('beautician')}}" class="shadow_btn">Beautician
		                    		<img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
		                    	</a>
		                    </li>
	                	</ul>
	                </div>
	                <div class="col-sm-3 col-6 mb-5">
	                	<ul class="btn_list">
	                		<li class="li-100">
	                    		<a href="{{route('news')}}" class="shadow_btn">News Feed
		                    		<img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
		                    	</a>
		                    </li>
	                	</ul>
	                </div>
	                <div class="col-sm-3 col-6 mb-5">
	                	<ul class="btn_list">
	                		<li class="li-100">
	                    		<a href="{{route('weddingStylist')}}" class="shadow_btn">Wedding Stylist
		                    		<img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
		                    	</a>
		                    </li>
	                	</ul>
	                </div>
	                
	                
	           	</div>
            </div>
            
            
                
            <!-- <div class="contact_for" data-aos="fade-up" data-aos-duration="1000">
                <h3>Contact Styzeler for</h3>
                <ul class="btn_list">
                    <li>
                    	<a href="javascript:;" class="shadow_btn">Candidate 
                    		<img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
                    	</a>
                    </li>
                    <li>
                    	<a href="javascript:;" class="shadow_btn">Freelancing 
                    		<img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
                    	</a>
                    </li>
                    <li>
                    	<a href="javascript:;" class="shadow_btn">Rent & Let 
                    		<img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
                    	</a>
                    </li>
                    <li>
                    	<a href="javascript:;" class="shadow_btn">Job Sicker 
                    		<img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
                    	</a>
                    </li>
                    <li>
                    	<a href="javascript:;" class="shadow_btn">News 
                    		<img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="">
                    	</a>
                    </li>
                    
                </ul>
            </div> -->
            <div class="contact_form_wrap" data-aos="fade-up" data-aos-duration="1000">
                <div class="info_block">
                    <h3>Contact Details</h3>
                    <p>Styzeler Kemp House,152-160 <br> City Road London. EC1V 2NX</p>
                    <br>
                    <p><a href="tel:0207 566 3989">0207 566 3989</a></p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p>General Enquiries:</p>
                    <p><a href="mailto:wearestyzeler@gmail.com">wearestyzeler@gmail.com</a></p>
                </div>
                <div class="form_block">
                    <h3>Enquiry Form</h3>
                    <form action="" method="post">
                        <div class="input_block">
                            <label for="">Your Name</label>
                            <input type="text" name="" id="" class="input_text"
                                style="background-image: url('{{ asset('template_new/assets/images/input_name.jpg') }}');">
                        </div>
                        <div class="input_block">
                            <label for="">Email</label>
                            <input type="text" name="" id="" class="input_text"
                                style="background-image: url('{{ asset('template_new/assets/images/input_email.jpg') }}');">
                        </div>
                        <div class="input_block">
                            <label for="">Tel</label>
                            <input type="text" name="" id="" class="input_text"
                                style="background-image: url('{{ asset('template_new/assets/images/input_tel.jpg') }}');">
                        </div>
                        <div class="input_block">
                            <label for="">Message</label>
                            <textarea name="" id="" rows="5" class="input_text"
                                style="background-image: url('{{ asset('template_new/assets/images/input_message.jpg') }}');"></textarea>
                        </div>
                        <div class="btn_blk">
                            <button type="submit" class="site_btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- contact -->
@endsection

@push('script')
@endpush
