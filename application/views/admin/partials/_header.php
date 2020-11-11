<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Ardi Putra Admin | <?= $title; ?></title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet"
    href="<?= base_url(); ?>admin_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/jqvmap/jqvmap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/dist/css/adminlte.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/dist/css/jangkrikstyle.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/summernote/summernote-bs4.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- Sweet Alerts -->
<script src="<?= base_url(); ?>admin_assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/sweetalert2/sweetalert2.min.css">


<?php if($this->uri->segment(3) == 'add'): ?>
<!-- summernote -->
<link rel="stylesheet" href="<?= base_url(); ?>admin_assets/plugins/summernote/summernote-bs4.css">
<?php endif; ?>
