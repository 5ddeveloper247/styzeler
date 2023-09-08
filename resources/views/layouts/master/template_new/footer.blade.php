 <!-- footer -->
 <footer>
     <div class="contain" data-aos="fade-up" data-aos-duration="1000">
         <div class="txt">
             Styzeler Kemp House,152-160 City Road London. EC1V 2NX
         </div>
         <div class="num"><a href="tel:0207 566 3989">0207 566 3989</a></div>
         <div class="email">
             <a href="mailto:wearestyzeler@gmail.com">wearestyzeler@gmail.com</a>
         </div>
         <p>
             © 2019 All Rights Reserved | <a href="{{ route('privacyPolicy') }}">Privacy Policy</a> |
             <a href="{{ route('termAndConditions') }}">Terms & Conditions</a> |
             <a href="{{ route('webTermAndConditions') }}">Web Site Terms and Conditions</a>
         </p>
     </div>
 </footer>
 <!-- JS Files -->
 <script src="{{ asset('template_new/assets/js/jquery.min.js') }}"></script>
 <script src="{{ asset('template_new/assets/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('template_new/assets/js/animation.min.js') }}"></script>
 <script src="{{ asset('template_new/assets/js/main.js') }}"></script>
 <script src="{{ asset('template_new/assets/js/toastr.min.js') }}"></script>
 <script>
     $(".dropdown-toggle").click(function() {
         $('.dropdown-menu').toggleClass('show')
     });
 </script>
 <!-- Favicon -->
 @stack('script')
 <!-- End Footer -->
