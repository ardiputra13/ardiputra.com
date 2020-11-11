<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= $title; ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Administrator</a></li>
                    <li class="breadcrumb-item active"><?= $title; ?></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary"
                    <!-- form start -->
                    <form role="form" action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name=<?= $this->security->get_csrf_token_name(); ?> value="<?= $this->security->get_csrf_hash(); ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Klien</label>
                                <input type="text" name="client_name" class="form-control"
                                    placeholder="Nama Klien">
                            </div>
                            <div class="form-group">
                                <label>Logo Klien</label>
                                <div class="input-group">
                                    <div class="">
                                        <input type="file" name="client_image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" name="submit" value="addClient" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('admin/client'); ?>" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
echo validation_errors();
?>