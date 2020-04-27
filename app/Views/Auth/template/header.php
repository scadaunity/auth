<!DOCTYPE html>
<html lang="en">

<!--Designed By ALpha-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/logo/LogoIcon01.png') ?>" type="image/x-icon">
    <!-- Vendor styles -->
    <link rel="stylesheet"
          href="<?php echo base_url('assets/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') ?>">
    <link rel="stylesheet"
          href="<?php echo base_url('assets/vendors/bower_components/animate.css/animate.min.css') ?>">

    <!-- App styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/app.min.css') ?>">
</head>

<body data-sa-theme="4" style="overflow-y: hidden">

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
