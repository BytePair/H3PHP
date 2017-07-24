<?php

    // check if we are trying to access directly
    if (!function_exists('header_loaded')) {
        header("Location: ./");
        exit();
    }
    
?>

<div class="container-fluid">

    <div class="row-fluid">

        <div class="col-md-4 col-md-offset-4">

            <form id="login-form" class="center-block text-center" action="includes/login.inc.php" method="POST">
                
                <h1>H3</h1>
                
                <input id="login_username" class="form-control" type="text" name="username" placeholder="Username/Email" required />
                <input id="login_password" class="form-control" type="password" name="pwd" placeholder="Password" required />

                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block" id="loginButton">Login</button>

                <?php

                $login_error = (isset($_GET['login'])) ? $_GET['login'] : null;

                /* Catch and display registration errors */
                if ($login_error) {
                    switch ($login_error) {
                        case "error":
                            echo('<p style="font-weight: bold; color: red; margin: 0;">Error: Invalid Username/Password</p>');
                            break;
                        default:
                            break;
                    }
                }
                ?>

                <div class="row" style="width: 100%;">
                    <a id="login_register_btn" type="button" class="btn btn-link col-xs-6 pull-right" href="signup.php">Register</a>
                    <!-- TODO: Add Lost Password Button -->
                    <a id="login_lost_btn" type="button" class="btn btn-link col-xs-6 pull-left">Forgot Password?</a>
                </div>
            </form>

        </div>
        <!-- ./col-md-6 -->

    </div>
    <!-- ./row -->

</div>
<!-- ./container-fluid -->
