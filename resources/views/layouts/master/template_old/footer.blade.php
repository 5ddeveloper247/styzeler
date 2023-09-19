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

<!--Bootstrap CDN-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('template_old/bootstrap/popper/popper.min.js') }}"></script>
<script src="{{ asset('template_old/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('template_new/assets/js/toastr.min.js') }}"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<!-- Animation CDN -->
<script src="{{ asset('template_old/js/aos/aos.js') }}"></script>

<script src="{{ asset('template_old/js/main.js') }}"></script>

<script>
    $(document).on({
        ajaxStart: function() {
            $("body").addClass("loading");
        },
        ajaxStop: function() {
            $("body").removeClass("loading");
        }
    });
</script>
@stack('script')
