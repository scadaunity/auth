<!--HEADER - INICIO (Import)-->
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url('src/assets/img/logo/LogoIcon01.png') ?>" type="image/x-icon">
    <title>Scada Unity</title>

    <!-- Carrega css Global -->
    <link rel="stylesheet" href="<?php echo base_url('src/assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('src/assets/lib/animate.css/animate.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('src/assets/lib/jquery.scrollbar/jquery.scrollbar.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('src/assets/css/app.min.css') ?>">

    <!-- Carrega css individual através do controller através de um array de dados $css -->
    <?php
        if (isset($css) and !empty($css)){
            foreach ($css as $cssItem){
                echo '<link rel="stylesheet" href="'.$cssItem.'">';
            }
        }
    ?>
</head>

<body data-sa-theme="5">
<main class="main">
    <?php
    if (isset($_SESSION['alert'])) : ?>
        <div
                class="alert alert-<?php if (isset($_SESSION['alert-cls'])) {
                    echo $_SESSION['alert-cls'];
                } else {
                    echo 'info';
                } ?>"
                role="alert" style="position: absolute; width: 100%">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="text-muted">×</span>
            </button>
            <?php echo $_SESSION['alert']; ?>
        </div>
    <?php endif; ?>
    <div class="page-loader">
        <div class="page-loader__spinner">
            <svg viewBox="25 25 50 50">
                <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
            </svg>
        </div>
    </div>

    <!--HEADER - FIM -->
