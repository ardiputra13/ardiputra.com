<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- jQuery -->
<script src="<?= base_url(); ?>admin_assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url(); ?>admin_assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url(); ?>admin_assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url(); ?>admin_assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url(); ?>admin_assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url(); ?>admin_assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url(); ?>admin_assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url(); ?>admin_assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>admin_assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url(); ?>admin_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url(); ?>admin_assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>admin_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>admin_assets/dist/js/adminlte.js"></script>


<?php if($this->uri->segment(3) == 'add' || $this->uri->segment(3) == 'edit'): ?>
<!-- Summernote -->
<script src="<?= base_url(); ?>admin_assets/plugins/summernote/summernote-bs4.min.js"></script>
    
<script>
    $(function () {
        // Summernote
        $('.textarea').summernote()
    })
</script>
<?php endif; ?>