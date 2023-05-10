<base href="<?= base_url(); ?>">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/tamu.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row navtamu sticky-top">
            <div class="col">
                <?php $this->load->view($nav); ?>
            </div>
        </div>

        <div class="row">
            <div class="col"></div>

            <div class="col-10 isi">
                <div class="judul">
                    <?= $judul; ?>
                </div>

                <?php $this->load->view($isi); ?>
            </div>

            <div class="col"></div>
        </div>
    </div>


    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>