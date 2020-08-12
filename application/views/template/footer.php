     <!-- Start Footer area-->
     <div class="footer-copyright-area">
       <div class="container">
         <div class="row">
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <div class="footer-copy-right">
               <p>Copyright © 2019
                 . All rights reserved. Versi <span class="badge">0.5</span>. <span class="pull-right"><i> Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></i></span></p>
             </div>
           </div>
         </div>
       </div>
     </div>
     <!-- End Footer area-->
     </div>
     <!-- jquery
		============================================ -->
     <script src="<?= base_url('assets1/js/vendor/jquery-1.12.4.min.js') ?>"></script>
     <!-- bootstrap JS
		============================================ -->
     <script src="<?= base_url('assets1/js/bootstrap.min.js') ?>"></script>
     <script src="<?= base_url('assets1/js/bootstrap-select/bootstrap-select.js') ?>"></script>

     <!-- wow JS
		============================================ -->
     <script src="<?= base_url('assets1/js/wow.min.js')  ?>"></script>
     <!-- price-slider JS
		============================================ -->
     <script src="<?= base_url('assets1/js/jquery-price-slider.js') ?>"></script>
     <!-- owl.carousel JS
		============================================ -->
     <script src="<?= base_url('assets1/js/owl.carousel.min.js') ?>"></script>
     <!-- scrollUp JS
		============================================ -->
     <script src="<?= base_url('assets1/js/jquery.scrollUp.min.js') ?>"></script>
     <!-- meanmenu JS
		============================================ -->
     <script src="<?= base_url('assets1/js/meanmenu/jquery.meanmenu.js') ?>"></script>
     <!-- counterup JS
		============================================ -->
     <script src="<?= base_url('assets1/js/counterup/jquery.counterup.min.js') ?>"></script>
     <script src="<?= base_url('assets1/js/counterup/waypoints.min.js') ?>"></script>
     <script src="<?= base_url('assets1/js/counterup/counterup-active.js') ?>"></script>
     <!-- mCustomScrollbar JS
		============================================ -->
     <script src="<?= base_url('assets1/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') ?>"></script>
     <!-- jvectormap JS
        ============================================ -->
     <script src="<?= base_url('assets1/js/jvectormap/jquery-jvectormap-2.0.2.min.js')  ?>"></script>
     <script src="<?= base_url('assets1/js/jvectormap/jquery-jvectormap-world-mill-en.js')  ?>"></script>
     <script src="<?= base_url('assets1/js/jvectormap/jvectormap-active.js')  ?>"></script>
     <!-- sparkline JS
		============================================ -->
     <script src="<?= base_url('assets1/js/sparkline/jquery.sparkline.min.js') ?>"></script>
     <script src="<?= base_url('assets1/js/sparkline/sparkline-active.js') ?>"></script>
     <!-- flot JS
		============================================ -->
     <script src="<?= base_url('assets1/js/flot/jquery.flot.js') ?>"></script>
     <script src="<?= base_url('assets1/js/flot/jquery.flot.resize.js') ?>"></script>
     <script src="<?= base_url('assets1/js/flot/flot-active.js') ?>"></script>
     <!-- knob JS
		============================================ -->
     <script src="<?= base_url('assets1/js/knob/jquery.knob.js') ?>"></script>
     <script src="<?= base_url('assets1/js/knob/jquery.appear.js') ?>"></script>
     <script src="<?= base_url('assets1/js/knob/knob-active.js') ?>"></script>
     <!--  Chat JS
		============================================ -->
     <script src="<?= base_url('assets1/js/chat/jquery.chat.js') ?>"></script>
     <!--  wave JS
		============================================ -->
     <script src="<?= base_url('assets1/js/wave/waves.min.js') ?>"></script>
     <script src="<?= base_url('assets1/js/wave/wave-active.js') ?>"></script>
     <!-- icheck JS
		============================================ -->
     <script src="<?= base_url('assets1/js/icheck/icheck.min.js') ?>"></script>
     <script src="<?= base_url('assets1/js/icheck/icheck-active.js') ?>"></script>
     <!--  todo JS
		============================================ -->
     <script src="<?= base_url('assets1/js/todo/jquery.todo.js') ?>"></script>
     <!-- Login JS
		============================================ -->
     <script src="<?= base_url('assets1/js/login/login-action.js') ?>"></script>
     <!-- plugins JS
		============================================ -->
     <script src="<?= base_url('assets1/js/plugins.js') ?>"></script>
     <!-- main JS
		============================================ -->
     <script src="<?= base_url('assets1/js/main.js') ?>"></script>
     <!-- tawk chat JS
        ============================================ -->
     <!-- <script src="<?= base_url('assets1/js/tawk-chat.js')  ?>"></script> -->
     <!-- datatbles JS
		============================================ -->
     <!-- <script src="<?= base_url('assets1/lib/datatables.min.js') ?>"></script> -->
     <!-- Data Table JS
        ============================================ -->
    <script src="<?= base_url('assets1/js/data-table/jquery.dataTables.min.js') ?> "></script>
    <script src="<?= base_url('assets1/js/data-table/data-table-act.js') ?> "></script>
    <!-- khusus chained -->
    <script src="<?= base_url('assets1/lib/jquery-chained.min.js') ?> "></script>
    <script src="<?= base_url('assets1/js/Chart.min.js') ?> "></script>
     </body>
     <script type="text/javascript">
       $(document).ready(function() {
         $('#loader').fadeOut(500);
         // $('#submit').submit(function(e){
         //    $('#loading').addClass('overlay');
         //    $('#loading').html('<i class="fa fa-spinner fa-spin fa-2x"></i>');
         //    setTimeOut(removeClass,500);
         // });
         // function removeClass() {
         //     $('#loading').removeClass('overlay');
         //     $('#loading').fadeOut();
         // }
         $("#kota").chained("#provinsi");
         $("#kecamatan").chained("#kota");
         $("#kelurahan").chained("#kecamatan");

         $("#nama_s").chained("#nik_s");

         $("#nik").chained("#no_kk");
         $("#nama").chained("#nik");

         $("#kota_s").chained("#provinsi_s");
         $("#kecamatan_s").chained("#kota_s");
         $("#kelurahan_s").chained("#kecamatan_s");
       });
     </script>

     </html>