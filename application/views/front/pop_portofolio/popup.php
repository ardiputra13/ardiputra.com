<!doctype html>
<html lang="en">
<head>
<title>Ardi Putra - This is Mine</title>
<meta charset="UTF-8">
<meta name="description" content="Portofolio Ardi Putra">
<meta name="keywords" content="personal, portfolio">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Favicon -->
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />

<!-- Stylesheets -->
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.css"/>

<!-- Google Web fonts -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

<!-- Font icons -->
<link rel="stylesheet" href="<?= base_url(); ?>assets/icon-fonts/font-awesome-4.5.0/css/font-awesome.min.css"/>
<link rel="stylesheet" href="<?= base_url(); ?>assets/icon-fonts/essential-regular-fonts/essential-icons.css"/>

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>

<div class="container">
        <div class="row">
            <div class="blog-single col-md-8 col-md-offset-2">
                <div class="blog-image">
                    <img src="<?= base_url('data/portofolio_image/'.$portofolio->project_image); ?>" alt="" style="max-height: 300px;">
                </div>
                <h1><?= $portofolio->project_name; ?></h1>
                <div class="blog-detail">
                    <?php if ($portofolio->project_compelete_date == null || $portofolio->project_compelete_date == '' || $portofolio->project_compelete_date == 0): ?>
                        <span>Proyek sedang dikerjakan</span><br>
                    <?php else: ?>
                        Selesai <span><?= time_convert($portofolio->project_compelete_date); ?></span><br>
                    <?php endif; ?>
                    Klien <span><?= $portofolio->client_name; ?></span>
                </div>

                <div class="blog-content">
                    <?= $portofolio->project_description;  ?>
                </div>
            </div>
        </div>
    </div>




</body>
</html>
