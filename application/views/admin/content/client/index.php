 <!-- Content Header (Page header) -->
 <section class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1><?= $title ?></h1>
             </div>
             <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="#">Admin</a></li>
                     <li class="breadcrumb-item active"><?= $title; ?></li>
                 </ol>
             </div>
         </div>
     </div><!-- /.container-fluid -->
 </section>
 <section class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <!-- /.card-header -->
                     <div class="card-body">
                         <div class="d-flex justify-content-end m-md-1">
                             <a href="<?= base_url('admin/client/add') ?>" class="btn btn-sm btn-info waves-effect"><i class="fa fa-plus"></i> Tambah Data</a>
                         </div>
                         <table class="table table-bordered">
                             <thead>
                                 <tr>
                                     <th style="width: 10px">#</th>
                                     <th>Nama Client</th>
                                     <th>Logo Client</th>
                                     <th style="width: 100px; text-align: center;">Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                <?php if($client): ?>
                                    <?php if ($this->uri->segment(3) == null) {
                                        $i = 1;
                                    } else {
                                        $i = $this->uri->segment(3);
                                    }
                                    foreach ($client as $data): ?>
                                    <tr>
                                        <td><?php echo $i; $i++ ?></td>
                                        <td><?= $data->client_name; ?></td>
                                        <td><img src="<?= base_url('data/client_image/'.$data->client_image); ?>" alt="<?= $data->client_image; ?>" class="image-resizer"></td>
                                        <td>
                                            <a href="<?= base_url('admin/client/edit?data-id='.urlencode($this->encryption->encrypt($data->id_client))); ?>" class="btn btn-sm btn-warning waves-effect" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger waves-effect" title="Hapus" onclick="confirm_delete('<?= urlencode($this->encryption->encrypt($data->id_client)); ?>');"><i class="fa fa-trash"></i></a>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4">Tidak ada data tersedia</td>
                                    </tr>
                                <?php endif; ?>    
                             </tbody>
                         </table>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer clearfix">
                        <?php echo $this->pagination->create_links(); ?>
                     </div>
                 </div>
                 <!-- /.card -->
             </div>
         </div>
     </div>
 </section>
 <?php 
 echo $this->session->flashdata('message');
 echo validation_errors();
 ?>
 <script>
    function confirm_delete(data_id){
        swal.fire({
            title: 'Apakah anda yakin?',
            text: "Menghapus data tidak bisa di batalkan!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yakin, hapus sekarang!',
            cancelButtonText: 'Tidak yakin, Batalkan!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
        }).then((result) => {
        if (result.value) {
            window.location = '<?= base_url("admin/client/delete?data-id="); ?>'+data_id
        }
        })      
    }
 </script>