@extends('layouts.master.template_old.master')

@push('css')
    <style>
        .tawk-min-container,
        .tawk-min-container .tawk-button {
            background: black !important;
        }

        :root {
            --tawk-header-background-color: black !important;
            --tawk-header-text-color: #ffffff !important;
        }

        .tawk-visitor-chat-bubble {
            background: black !important;
            color: #333333 !important;
        }

        .tawk-agent-chat-bubble {
            background: black !important;
            color: #ffffff !important;
        }

        @media screen and (max-width: 500px) {
            .header-1 {
                font-size: 24px;
            }

            .header-2 {
                font-size: 25px;
            }

            .header-3 {
                font-size: 17px !important;
            }
        }

        @media screen and (max-width: 360px) {
            .header-3 {
                font-size: 15px !important;
            }
        }

        @media screen and (max-width: 360px) {
            .header-3 {
                font-size: 13px !important;
            }
        }

        .bg-custom {
            background-color: #4f4e4e;
        }

        .button-fixed {
            bottom: 0;
            position: fixed;
            right: 0;
            border-radius: 4px;
        }

        .fas {
            cursor: pointer;
            font-size: 24px;
        }

        .cookieLink {
            color: white !important;
            font-weight: 900;
        }
    </style>
@endpush

@section('content')
 <!-- Content -->
 <section class="home">

    <section>
      <div data-aos="fade-up">
        <img src="{{ asset('template_old/images/home-top-1.png') }}" alt="" width="100%">
        <img src="{{ asset('template_old/images/home-top-2.png') }}" alt="" width="100%">
      </div>
    </section>

    <!--<section class="content-body d-block d-md-none">-->
    <!--  <div class="container">-->
    <!--    <div class="content-text-home">-->
          <!-- <h1>We are styzeler</h1>-->
    <!--      <hr>-->
    <!--      <h3>Recruitment Agency</h3>-->
    <!--      <h6>Hair, Beauty, Spa</h5> -->
    <!--    </div>-->
    <!--  </div>-->
 
    <!--</section>-->
    <section class="d-block d-md-none">
        <!-- <img src="images/home-banner-2.png" width="100%" /> -->
        <img src="{{ asset('template_old/images/styzeler-small-banner.png') }}" width="100%" />
    </section>
    
    <section class="d-none d-md-block">
        <img src="{{ asset('template_old/images/home-banner.png') }}" width="100%" />
    </section>

    <div class="container">
      <div class="row justify-content-center">
        <div class="content-info my-lg-5 py-4 col-lg-8" data-aos="fade-up">
          <div class="container" >
            <div class="info" >
              <p class="text1">
                A dynamic recruitment agency, specialising in Hair and Beauty hire for elite salons and Beauty spas. across London and the Uk.
              </p>
              <br>
              <p class="text1">
                We are moving into a new phase we apply all our experience and the power of web technology to take us to the next level, Which means fast placements with even better-matched applicants – and applicants who remain committed to our values.
              </p>
            </div>
          </div>            
          
        </div>
      </div>
    </div>
   
    <section class="my-5 ">
        
      <div class="container info text-left">

        <h1 class="my-4 header-1">Styzeler Agency</h1>
        <h3 class="color-1 header-3">Specialist in Hair & Beauty Hire London Uk. <br> Permanent & Temporary  Recruitment. </h3>
        <p class="my-2">Besides offering our clients a bespoke service, we make sure that all our candidate enjoy an excellent working environment. This ensures that Styzeler can always supply high calibre personnel who are committed to providing high standard service </p>
      </div>
    </section>

    <section class="my-5 ">
      <div class="container text-left">
        <h1 class="my-4 color-1 header-2">Styzeler <u><a href="rent-let.html" class="color-1">Rent & Let</a></u></h1>
        <p class="my-2">Styzeler Rent &  Let gives  the chance to utilise and maximise on your empty chair and make the 
          difference to your freedom calling  all hair and beauty business owner across London and the Uk  

        </p>
      </div>
    </section>

    <section class="my-5 ">
      <div class="container text-left">
        <h1 class="my-4 color-1 header-2">Permanet & Temporary Jobs </h1>
        <div>
          <h3><u><a href="hairstylist.html">HAIR</a></u></h3>
          <p>Artistic Directors, Creative Stylists, Senior Stylists, Blow Dry Experts, Hair Colour Technicians, Hairdressers, Hair Technicians, 
            Hairdressing Receptionists, Hair Salon Managers, Hair Salon Trainers, Assistant Hair Salon Managers,

          </p>
        </div>
        <div class="mt-5">
          <h3><u><a href="wedding.html">WEDDING STYLIST</a></u></h3>
          <h3><u><a href="barber.html">MALE GROOMING EXPERTS</a></u></h3>
          <h3><u><a href="barber.html">MASTER BARBER</a></u></h3>
          </div>
        <div class="mt-5">
          <h3><u><a href="beautician.html">BEAUTY</a></u></h3>
          <p>Beauty Therapists, Front of House, Managers, Floor Managers, Assistant Beauty Clinic Managers, Operations Manager (Beauty), Beauty Lecturers, Skin Care Therapists, Advanced Skin Care Therapists, Aesthetic Technicians, Aesthetic Therapists, Prescribing Nurses, Laser Technicians, Medical Aestheticians, Aesthetic Clinic Managers, Facialists, Waxing Specialists.</p>

        </div>
        <div class="mt-5">
          <h3><u><a href="beautician.html">SPA</a></u></h3>
          <p>Spa Managers, Senior Spa Therapists, Assistant Spa Managers, Spa Receptionists, Operations Manager (Spa). </p>
        </div>
        <div class="text-center mt-5">
          <a href="register.html" class="btn customBtn">Register</a>
        </div>
      </div>
    </section>

    <div class="container text-center my-5" data-aos="fade-up">
      <p class="customHeader p-2 d-none d-lg-block">
        <span>
          Styzeler Recruitment
        </span>
        <span>
          The winning formula for both
        </span>  
        <span>
          Business Owner & Freelancer
        </span> 
      </p>
      <div class="customHeader small p-2 d-block d-lg-none">
        <p class="text-left mt-2">
          Styzeler Recruitment
        </p>
        <p class="text-left">
          The winning formula for both
        </p>
        <p class="text-left" style="margin-top: -12px">
          Business Owner & Freelancer
        </p> 
      </div>
    </div>

    

  </section>

  <!-- cookie banner -->
  {{-- <div class="row cookie">
    <div class="col-md-4 col-sm-12 button-fixed">
      <div class="p-3 pb-4 bg-custom text-white">
        <div class="row">
          <div class="col-10">
            <h2>Cookie Notice</h2>
          </div>
          <div class="col-2 text-center ">
            <button type="button" class="close cookieCancel" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
        <p>This Website uses cookies, by continuing to use this website, you consent to our 
          use of these cookies. <a href="cookie.html" class="cookieLink" target="_blank">Find out more</a>
        </p>
        
      </div>
    </div>
  </div> --}}
@endsection

@push('script')
@endpush
