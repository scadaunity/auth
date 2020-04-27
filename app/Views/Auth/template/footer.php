<!-- Older IE warning message -->
<!--[if IE]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade to any of the following web browsers to
        access this website.</p>

    <div class="ie-warning__downloads">
        <a href="http://www.google.com/chrome">
            <img src="img/browsers/chrome.png" alt="">
        </a>

        <a href="https://www.mozilla.org/en-US/firefox/new">
            <img src="img/browsers/firefox.png" alt="">
        </a>

        <a href="http://www.opera.com">
            <img src="img/browsers/opera.png" alt="">
        </a>

        <a href="https://support.apple.com/downloads/safari">
            <img src="img/browsers/safari.png" alt="">
        </a>

        <a href="https://www.microsoft.com/en-us/windows/microsoft-edge">
            <img src="img/browsers/edge.png" alt="">
        </a>

        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
            <img src="img/browsers/ie.png" alt="">
        </a>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->

<!-- Javascript -->
<!-- Vendors -->
<script src="<?php echo base_url('assets/vendors/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/bower_components/popper.js/dist/umd/popper.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>

<!-- App functions and actions -->
<script src="<?php echo base_url('assets/js/app.js') ?>"></script>

<script>
    window.setTimeout(function () {
        $(".alert").alert('close');
    }, 10000);
</script>
</body>

<!--Designed By ALpha-->
</html>