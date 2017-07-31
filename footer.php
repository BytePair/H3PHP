<?php

    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }

    // check if we are trying to access directly
    if (!function_exists('header_loaded')) {
        header("Location: ./");
        exit();
    }
?>



<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12 text-center">
            <p>Copyright &copy; Thermosmart 2017</p>
        </div>
</footer>
<!-- /.footer -->

<!-- jQuery -->
<script src="./js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="./js/bootstrap.min.js"></script>

<!-- Bootstrap Button -->
<script src="./js/bootstrap-toggle.min.js"></script>

<!-- Custom JavaScript -->
<script src="./js/script.js"></script>


</body>
</html>

