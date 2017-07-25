<?php

    include_once 'header.php';

    // check if we are trying to access directly
    if (!function_exists('header_loaded')) {
        header("Location: ./");
        exit();
    }
?>

<div class="container-fluid">

    <div class="row-fluid">

        <div class="col-md-6 offset-md-3">

            <div class="reset-message">

                <h2 class="text-center">If your email exists, a password reset link has been sent!</h2>

                <a type="button" name="back home" class="btn btn-primary btn-lg btn-block" href="./">Go Back Home</a>

            </div>

        </div>
        <!-- ./col-md-6 -->

    </div>
    <!-- ./row -->

</div>
<!-- ./container-fluid -->

<?php
    include_once 'footer.php';
?>
