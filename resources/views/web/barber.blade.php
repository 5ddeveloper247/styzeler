@extends('layouts.master.template_old.master')

@push('css')
    <style>
       
    </style>
@endpush

@section('content')

<div class="barber-banner mb-5" data-aos="fade-up">

      <img src="{{ asset('template_old/images/barber-top-banner.png') }}" alt="" width="100%" height="80%">

    </div>

<div class="occupation barber">

        <div class="container">
          <div class="row justify-content-center" data-aos="fade-up">
            <div class="col-lg-10">
              <div class="content-body" >
                <div class="">
                    <h1>United to succeed</h1>
                    <div class="content-text p-4 my-5" >
                      <p>
                        The men's grooming industry is booming and younger men seem more health -and body-conscious than what might have been expected. Men are becoming more emotionally involved with the products they use.
                        <br>
                        They are more educated and they know what they want, one of the fastest-growing revivals amongst men is traditional wet shave and the re-emergence of the full beard and sharp moustaches there's more to the perfect style than meets the eye Styzeler barbers know how to judge their client's suitability  to create a style that suits


                      </p>

                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       

        <section class="content-category">
            <div class="container">
                <div class="content-category-header ">
                    <h1>Barber/Male Grooming</h1>

                    <div class="line line-1"></div>
                    <div class="line line-2"></div>
                    <div class="line line-3"></div>
                    <div class="line line-4"></div>
                    <div class="line line-5"></div>
                </div>
                <div class="content-category-people row my-5">
                  	<div class="col-sm-6 col-lg-4">
                  		<a id="19">
                  			<h4 class="color-1">Demo Barber</h4>
                  			<div class="category-people py-3">
                  				<div class="picture">
                  					<img id="profile-image-id-0" alt="" width="100%" height="100%" src="data:image/png;base64,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">
                  				</div>
                  			</div>
                  		</a>
                  	</div>
                </div>
            </div>
            
        </section>

    </div>

@endsection

@push('script')

@endpush
