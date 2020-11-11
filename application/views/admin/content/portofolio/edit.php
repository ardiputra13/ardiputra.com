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
                                <label>Nama Proyek</label>
                                <input type="text" name="project_name" value="<?= $portofolio->project_name; ?>" class="form-control"
                                    placeholder="Nama Proyek">
                            </div>
                            <div class="form-group">
                                <label>Pemilik Proyek</label>
                                    <select class="custom-select" name="project_client">
                                    <option>-- Pilih Client --</option>
                                    <?php foreach ($client_list as $client): ?>
                                        <option value="<?= $client->id_client; ?>"
                                            <?php 
                                                if ($client->id_client == $portofolio->project_client) {
                                                    echo 'selected';
                                                }
                                            ?>
                                        ><?= $client->client_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <input type="text" name="compelete_date" class="form-control" value="<?= time_convert_dashboard($portofolio->project_compelete_date); ?>"
                                    placeholder="Tanggal Selesai">
                                <small>yyyy-mm-dd | kosong jika belum selesai</small>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Proyek</label>
                                <textarea class="textarea" class="form-control" name="project_description" placeholder="Tuliskan deskripsi proyek"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $portofolio->project_description; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Gambar Proyek</label>
                                <div class="input-group">
                                    <div class="">
                                        <input type="file" name="project_image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" name="submit" value="editProject" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('admin/portofolio'); ?>" class="btn btn-danger">Batal</a>
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