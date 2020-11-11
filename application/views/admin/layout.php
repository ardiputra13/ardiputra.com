<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('admin/partials/_header'); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <?php $this->load->view('admin/partials/_navbar'); ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php $this->load->view('admin/partials/_sidebar'); ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php echo $content; ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019 - <?= date('Y'); ?> Jangkrik.Online.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      Made with <i class="fa fa-heart"></i> by <b><a href="https://ardiputra.com">Ardi Putra</a>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php $this->load->view('admin/partials/_footer'); ?>
</body>
</html>
