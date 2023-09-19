@extends('layouts.master.template_old.master')

@push('css')
<style>
    
    .rent-let-div img {
        width: 80%;
    }
    
    .rental-text h2 {
        margin-top: 3rem!important;
    }
    
    @media screen and (max-width: 320px) {
        .rental-text h2 {
            font-size: 15px !important;
        }
        .rental-text h2 {
            margin-top: 1rem!important;
        }
    }
  
    @media screen and (max-width: 414px) {
        .rent-let-div img {
            width: 100%;
        }
        .rental-text h2 {
            padding: 0px !important;
            font-size: 16px ;
            margin-top: 1.5rem!important;
        }
        
    }
    
    .dropdown-content a {
        padding: 12px 5px;
    }
    
   
</style>
@endpush

@section('content')
    <!-- Image -->
    <div class="rent-let mb-5"  data-aos="fade-up">

        <img src="{{ asset('template_old/images/rent-let.png') }}" alt="" width="100%" height="80%">
  
      </div>
  
    
      <!-- Content -->
      <div class="rent-let rent-let-div">
          <!-- Picture -->
          <div class="container-fluid header">
              <div class="p-2 p-md-4">
                  <h1>Rent & Let </h1>
                  <h3>Hair & Beauty chair </h3>
              </div>
          </div>
          <div class="container-fluid px-5">
              <div class="row my-4 justify-content-center">
                  <div class="col-5 col-md-2 text-center text-lg-left">
                      <img src="{{ asset('template_old/images/logo.png') }}" alt="" >
                  </div>
                  <div class="col-7 col-md-10 text-left text-md-left rental-text">
                      <h2 class="color-1 mt-4 mt-lg-5">Maximise on your empty chair </h2>
                  </div>
                  <div class="col-12">
                      <p class="mt-4">It is estimated that there are 52,000 Hair & Beauty salon across the UK, 30% of them have one empty chair or more  for endless reasons  from stylist being off or having  misjudged the business flow</p>
                      <p class="mt-4">Nonetheless, why not take advantage of rent & let as you go and maximise on your empty chair  for daily rent  or for a permanent rent. Rent & Let for a start-up business, is  a golden opportunity that helps to reduce some of the overheads expenses and also create the right atmosphere  because an empty shop in not inviting</p>
                    
                  </div>
                  <div class="col-lg-6">
                      <p class="color-1">
                          <u><a href="{{ route('contactUs') }}" class="color-1">For more info on Rent & Let contact styzeler agency</a></u>
                      </p>
                  </div>
                  <div class="col-lg-6 text-right"  data-aos="fade-up">
                      <a href="{{route('chairRental')}}" class="btn customBtn">List Space</a><!-- chair-rental.html -->
  
                  </div>
              </div>
              <div class="row my-4 justify-content-center">
                  <div class="col-5 col-md-2 text-left text-md-left ">
                      <img src="{{ asset('template_old/images/logo.png') }}" alt="" >
                  </div>
                  <div class="col-7 col-md-10 text-left text-md-left rental-text">
                      <h2 class="color-1 mt-4 mt-lg-5">Book a chair for few hours</h2>
                  </div>
                  <div class="col-12">
                      <p class="mt-4">With Rent & Let the chair can be rented for daily use!! for few hours Or for the whole day, to those freelancers that might have a need for a professional and comfortable place to perform a demanding service [[ photo shooting for a portfolio or a demanding customer ]]  Daily rent gives the Owner chance to be in control of the chair and assess the suitability of the freelancer in the eventuality of an agreement for a permanent chair rental.</p>
                    
                  </div>
                
              </div>
              <div class="row my-4 justify-content-center">
                  <div class="col-5 col-md-2 text-left text-lg-left">
                      <img src="{{ asset('template_old/images/logo.png') }}" alt="" >
                  </div>
                  <div class="col-7 col-md-10 text-left text-md-left rental-text">
                      <h2 class="color-1 mt-4 mt-lg-5">Rent & Let as you go </h2>
                  </div>
                  <div class="col-12">
                      <p class="mt-4">Rent & Let as you go it gives Freelancers the chance to utilise the commodity of a salon service if a difficult client needs more attention or a difficult colour correction needs the attention required  or for a photo shooting where such a service can be performed.</p>                  
                  </div>
                  <div class="col-lg-6">
                      <p class="color-1">
                          <u><a href="{{route('contactUs')}}" class="color-1">For more info on Rent & Let contact styzeler agency</a></u>
                      </p>
                  </div>
                  <div class="col-lg-6 text-right"  >
                    <div class="dropdown rent-let-dropdown">
                      <h5 class="btn customBtn"><a class="dropbtn" data-aos="fade-up">Search</a></h5>
                      <div class="dropdown-content text-center">
                        <a href="rent-let-hairstylist.html">Hairstylist / Barber chair </a>
                        <a href="rent-let-beauty-therapist.html">Beauty therapist  chair </a>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
          
      </div>
@endsection

@push('script')
    
@endpush