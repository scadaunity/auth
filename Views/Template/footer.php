<!--FOOTER - INICIO (import)-->
</main>


<!-- Javascript -->
<!-- Vendors -->
<script src="<?php echo base_url('src/assets/lib/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('src/assets/lib/popper.js/popper.min.js') ?>"></script>
<script src="<?php echo base_url('src/assets/lib/bootstrap/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('src/assets/lib/jquery.scrollbar/jquery.scrollbar.min.js') ?>"></script>
<script src="<?php echo base_url('src/assets/lib/jquery-scrollLock/jquery-scrollLock.min.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>

<!-- App functions and actions -->
<script src="<?php echo base_url('src/assets/js/app.js') ?>"></script>

<!-- Carrega js individual através do controller através de um array de dados $js -->
<?php
if (isset($js) and !empty($js)) {
    foreach ($js as $jsItem) {
        echo '<script src="' . $jsItem . '" ></script>';
    }
}
?>

<script>
    window.setTimeout(function () {
        $(".alert").alert('close');
    }, 10000);
</script>

</body>


</html>

<!--FOOTER - FIM -->
