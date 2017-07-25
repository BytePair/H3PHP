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

            <form id="reset-form" class="" action="./pass_reset_sent.php" method="POST">

                <h1 class="text-center">H3</h1>
                <h4 class="text-center" style="margin-bottom: 20px;">Forgot Password?</h4>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i></span>
                    <input id="login_username" class="form-control" type="email" name="username" placeholder="Email" required />
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block" id="sendButton">Send</button>

                <a id="back-home-button" class="btn btn-link col-12 text-center" href="./">Cancel</a>

        </div>
        <!-- ./col-md-6 -->

    </div>
    <!-- ./row -->

</div>
<!-- ./container-fluid -->

<?php
    include_once 'footer.php';
?>
