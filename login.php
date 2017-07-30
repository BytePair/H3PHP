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

<div class="container-fluid">

    <div class="row-fluid">

        <div class="col-md-6 offset-md-3">

            <form id="login-form" class="text-center" action="includes/login.inc.php" method="POST">

                <img src="./assets/icon.jpg" id="loginIcon"  />

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                    <input id="login_username" class="form-control" type="text" name="username" placeholder="Username/Email" required />
                </div>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                    <input id="login_password" class="form-control" type="password" name="pwd" placeholder="Password" required />
                </div>


                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block" id="loginButton">Login</button>

                <?php

                $login_error = (isset($_GET['login'])) ? $_GET['login'] : null;
                $new_user = (isset($_GET['newuser'])) ? $_GET['newuser'] : null;

                /* Catch and display registration errors */
                if ($login_error) {
                    switch ($login_error) {
                        case "error":
                            echo('<p class="text-center" style="font-weight: bold; color: red; margin: 0;">Error: Invalid Username/Password</p>');
                            break;
                        default:
                            break;
                    }
                }

                /* Catch new user message */
                if ($new_user) {
                    echo('<p class="text-center" style="font-weight: bold; color: green; margin: 0;">User created successfully!</p>');
                }

                ?>

                <div class="row">
                    <!-- TODO: Add Lost Password Button -->
                    <a id="reset_password_link" class="btn btn-link col-6 text-center" href="./send_reset.php">Forgot Password?</a>
                    <a id="sign_up_link" class="btn btn-link col-6 text-center" href="signup.php">Register</a>
                </div>
            </form>

        </div>
        <!-- ./col-md-6 -->

    </div>
    <!-- ./row -->

</div>
<!-- ./container-fluid -->
