<?php

session_start();

// check if we are trying to access directly
if (!function_exists('header_loaded')) {
    header("Location: ./");
    exit();
}
?>

    </header>

    <!-- Footer -->

    <!-- jQuery -->
    <script src="./js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./js/script.js"></script>


</body>
</html>

