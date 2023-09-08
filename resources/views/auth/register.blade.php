@extends('layouts.master.template_new.master')

@section('content')
    <!-- header -->
    <section id="registration">
        <div class="contain" data-aos="fade-up" data-aos-duration="1000">
            <div class="inner">
                <div class="image">
                    <h2>United to succeed</h2>
                    <h3>Styzeler Agency</h3>
                    <img src="{{ asset('template_new/assets/images/registration_main.jpg') }}" alt="">
                </div>
                <div class="txt">
                    <ul>

                        <li class="redirPkg1" style="cursor:pointer;"><a href="{{ route('weddingRegistration') }}">Wedding
                                Stylist</a></li>

                        <li class="redirPkg2 position-relative" onclick="myFunction()" style="cursor:pointer;">Salon Owner
                            <div id="myDropdown" class="reg-dropdown-content">
                                <a href="{{ route('hairdressingSalonRegistration') }}">Hairdressing / Barber Salon</a>
                                <a href="{{ route('beautySalonRegistration') }}">Beauty / Spa Salon</a>
                            </div>
                        </li>
                        <li class="redirPkg1" style="cursor:pointer;">
                            <a href="{{ route('hairStylistRegistration') }}">Hair Stylist</a>
                        </li>
                        <li class="redirPkg2" style="cursor:pointer;">
                            <a href="{{ route('beauticianRegistration') }}">Beautician</a>
                        </li>
                        <li class="redirPkg1" style="cursor:pointer;">
                            <a href="{{ route('barberRegistration') }}">Barber</a>
                        </li>
                        <li class="redirPkg1" style="cursor:pointer;">
                            <a href="{{ route('clientRegistration') }}">Client</a>
                        </li>
                    </ul>
                    <h4 class="redirPkg1" style="cursor:pointer;">
                        <a href="{{ route('login') }}">Sign in <br>With Email</a>
                    </h4>
                    <h3 class="redirPkg2" style="cursor:pointer;">Join the Styzeler Feed</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- registration -->
@endsection

@push('script')
    <script>
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
    </script>
@endpush
