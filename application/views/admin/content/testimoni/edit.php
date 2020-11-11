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
                    <form role="form" action="" method="POST">
                    <input type="hidden" name=<?= $this->security->get_csrf_token_name(); ?> value="<?= $this->security->get_csrf_hash(); ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Pegawai</label>
                                <input type="text" name="testimoni_client_name" value="<?= $testimoni->testimoni_client_name; ?>" class="form-control"
                                    placeholder="Nama Pegawai">
                            </div>
                            <div class="form-group">
                                <label>Posisi Pegawai</label>
                                <input type="text" name="testimoni_client_position" class="form-control" value="<?= $testimoni->testimoni_client_position; ?>"
                                    placeholder="Posisi Pegawai">
                            </div>
                            <div class="form-group">
                                <label>Klien</label>
                                    <select class="custom-select" name="testimoni_client">
                                    <option>-- Pilih Client --</option>
                                    <?php foreach ($client_list as $client): ?>
                                        <option value="<?= $client->id_client; ?>"
                                        <?php
                                            if ($client->id_client == $testimoni->testimoni_client) {
                                                echo 'selected';
                                            }
                                        ?>
                                        ><?= $client->client_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ulasan</label>
                                <textarea class="textarea" class="form-control" name="testimoni_desc" placeholder="Tuliskan testimoni"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $testimoni->testimoni_desc; ?></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" name="submit" value="editTestimoni" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('admin/testimoni'); ?>" class="btn btn-danger">Batal</a>
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