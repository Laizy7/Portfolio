<base href="<?= base_url(); ?>">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/fa/css/all.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 stickys navadmin pl-0">
                <?php $this->load->view($nav); ?>
            </div>

            <div class="col-10">
                <div class="judul">
                    <?= $judul; ?>
                </div>

                <?php $this->load->view($isi); ?>
            </div>
        </div>
    </div>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/fa/js/all.min.js"></script>
</body>

</html>