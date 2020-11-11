<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Brand Logo -->
<a href="<?= base_url(); ?>" class="brand-link">
      <img src="<?= base_url(); ?>admin_assets/dist/img/AdminLTELogo.png" alt="Ardi Putra Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Administrator</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item"><a href="<?= base_url('admin'); ?>" class="nav-link <?= ($this->uri->segment(2) == '') ? 'active' : ''; ?>"><i class="fa fa-igloo"></i> <span>Overview</span></a></li>

          <li class="nav-header">Project</li>
          <li class="nav-item"><a href="<?= base_url('admin/portofolio') ?>" class="nav-link <?= ($this->uri->segment(2) == 'portofolio') ? 'active' : ''; ?>"><i class="fa fa-project-diagram"></i> <span>Portofolio Project</span></a></li>
          <li class="nav-item"><a href="<?= base_url('admin/client'); ?>" class="nav-link <?= ($this->uri->segment(2) == 'client') ? 'active' : ''; ?>"><i class="fa fa-building"></i> <span>Client</span></a></li>
          <li class="nav-item"><a href="<?= base_url('admin/testimoni'); ?>" class="nav-link <?= ($this->uri->segment(2) == 'testimoni') ? 'active' : ''; ?> "><i class="fa fa-smile-beam"></i> <span>Testimoni</span></a></li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
