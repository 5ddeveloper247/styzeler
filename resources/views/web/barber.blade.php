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
                	@if(isset($users))
                	@foreach($users as $row)
                	<div class="col-sm-6 col-lg-4">
                		<a id="{{$row->id}}" href="{{ route('freelancerProfile') }}?id={{$row->id}}">
                			<h4 class="color-1">{{$row->name}} {{$row->surname}}</h4>
                			<div class="category-people py-3">
                				<div class="picture">
                					<img id="profile-image-id-0" alt="" width="100%" height="100%" src="{{ asset(isset($row->hero_image) ? $row->hero_image : 'template_old/images/blank.png') }}">
                				</div>
                			</div>
                		</a>
                	</div>
                	@endforeach
                	@endif
                </div>
            </div>
            
        </section>

    </div>

@endsection

@push('script')

@endpush
