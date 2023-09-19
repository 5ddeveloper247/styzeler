@extends('layouts.master.template_new.master')

@push('css')
    <style>
        .price_item p {
            color: #138a8f !important;
            font-size: 21px !important;
        }
        #wedding h1.main_heading {
            font-size: 4rem;
        }
        #wedding .price_banner .price_item {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            margin-bottom: 0.6rem;
            align-items: center;
        }
    </style>
@endpush

@section('content')
<section id="wedding">
    
    <img src="{{ asset('template_new/assets/images/wedding_main.jpg') }}" alt="" class="main_img" />
    
    <div class="contain" data-aos="fade-up" data-aos-duration="1000">
      <h1 class="main_heading">Styzeler Brides</h1>
      <img src="assets/images/lines_gray.jpg" alt="" class="lines" />
    </div>
    
    <img src="{{ asset('template_new/assets/images/wedding_main2.jpg') }}" alt="" class="main_img" />
    
    <div class="contain" data-aos="fade-up" data-aos-duration="1000">
      <h3 class="party_heading">
        Your wedding should be the party of your life
      </h3>
    </div>
    
    <div class="intro_banner"
      style="background-image: url('{{ asset('template_new/assets/images/wedding_main3.jpg') }}')" >
      <div class="contain" data-aos="fade-up" data-aos-duration="1000">
        <div class="outer">
          <div
            class="txt"
            style="background-image: url('{{ asset('template_new/assets/images/wedding_main3.jpg') }}')" >
            Styzeler freelancers can help you to achieve your dream day,
            <br />
            at Styzeler we have a variety of experienced wedding <br />
            Hairstylists, passionate about creating a personalised <br />
            updo for your wedding day from beautiful <br />
            Long SmoothCurls, Fishtail Braid, <br />
            Classic Finger Wave, and more.
          </div>
        </div>
      </div>
    </div>
    <div
      class="price_banner"
      style="background-image: url('{{ asset('template_new/assets/images/wedding_main_4.jpg') }}')" >
      <div class="contain" data-aos="fade-up" data-aos-duration="1000">
        <div class="price_block">
          <h4>Bridal Price List</h4>
          <div class="price_item">
            <p>Make up trial</p>
            <div class="price"
              style=" background-image: url('{{ asset('template_new/assets/images/wedding_btn_03.jpg') }}'); " >
              £120
            </div>
          </div>
          <div class="price_item">
            <p>Make up bridal</p>
            <div class="price"
              style=" background-image: url('{{ asset('template_new/assets/images/wedding_btn_03.jpg') }}'); " >
              £200
            </div>
          </div>
          <div class="price_item">
            <p>Bridal Gauest Make-up</p>
            <div class="price"
              style=" background-image: url('{{ asset('template_new/assets/images/wedding_btn_03.jpg') }}'); " >
              £80
            </div>
          </div>
          <div class="price_item">
            <p>Groom Make-up</p>
            <div class="price"
              style=" background-image: url('{{ asset('template_new/assets/images/wedding_btn_03.jpg') }}'); " >
              £80
            </div>
          </div>
          <br />
          <div class="price_item">
            <p>Hair Trail</p>
            <div class="price"
              style="background-image: url('{{ asset('template_new/assets/images/wedding_btn_02.jpg') }}'); " >
              £90
            </div>
          </div>
          <div class="price_item">
            <p>Hair Bridal</p>
            <div class="price"
              style=" background-image: url('{{ asset('template_new/assets/images/wedding_btn_02.jpg') }}'); " >
              £160
            </div>
          </div>
          <div class="price_item">
            <p>Bridal Guest Hair</p>
            <div
              class="price"
              style=" background-image: url('{{ asset('template_new/assets/images/wedding_btn_02.jpg') }}'); " >
              £60
            </div>
          </div>
          <div class="price_item">
            <p>Groom</p>
            <div
              class="price"
              style=" background-image: url('{{ asset('template_new/assets/images/wedding_btn_02.jpg') }}'); " >
              £100
            </div>
          </div>
          <div class="price_item price_item_last">
            <p style="margin-bottom: 20px">
              This Price List indicates the starting price for each service
              for the final quotation contact any of our wedding stylists
            </p><!-- https://beta.styzeler.co.uk/ -->
            
            <button onclick="location.href='{{route('weddingStylist')}}'"
              	type="button" class="price"
              	style=" background-image: url('{{ asset('template_new/assets/images/wedding_btn_01.jpg') }}'); " >
              	<img src="{{ asset('template_new/assets/images/eye.svg') }}" alt="" /> View
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- wedding -->
@endsection

@push('script')
    
@endpush