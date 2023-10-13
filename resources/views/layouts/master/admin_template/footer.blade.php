 <!-- footer -->
 <footer class="main-footer">
     All rights reserved.
     <div class="float-right d-none d-sm-inline-block"> </div>
 </footer>
 <script src="{{ asset('assets_admin/plugins/jquery/jquery.min.js') }}"></script>
 <script src="{{ asset('assets_admin/plugins/jquery-ui/jquery-ui.js') }}"></script>
 <script src="{{ asset('assets_admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

 <script>
     $.widget.bridge('uibutton', $.ui.button)
 </script>
 <script src="{{ asset('assets_admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('assets_admin/plugins/chart.js/Chart.min.js') }}"></script>
 <script src="{{ asset('assets_admin/plugins/sparklines/sparkline.js') }}"></script>
 <script src="{{ asset('assets_admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
 <script src="{{ asset('assets_admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
 <script src="{{ asset('assets_admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
 <script src="{{ asset('assets_admin/plugins/moment/moment.min.js') }}"></script>
 <script src="{{ asset('assets_admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
 <script src="{{ asset('assets_admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
 </script>
 <script src="{{ asset('assets_admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
 <script src="{{ asset('assets_admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>


 <script src="{{ asset('assets_admin/plugins/jquery/jquery.min.js') }}"></script>
 <script src="{{ asset('assets_admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('assets_admin/plugins/jsgrid/demos/db.js') }}"></script>
 <script src="{{ asset('assets_admin/plugins/jsgrid/jsgrid.min.js') }}"></script>
 <script src="{{ asset('assets_admin/dist/js/adminlte.js') }}"></script>
 <script src="{{ asset('template_new/assets/js/toastr.min.js') }}"></script>
 <!--<script src="{{ asset('assets_admin/dist/js/pages/dashboard.js') }}"></script> -->

 <script>
     $(".dropdown-toggle").click(function() {
         $('.dropdown-menu').toggleClass('show')
     });
     $("#logout-btn").click(function() {
         $('#logoutForm-btn').click();
     });
     $(function() {
         $.ajaxSetup({
             headers: {
                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
             }
         });
     });
 </script>
 <!-- Favicon -->
 @stack('script')
 <!-- End Footer -->
