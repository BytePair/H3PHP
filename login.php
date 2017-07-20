<?php

    // check if we are trying to access directly
    if (!function_exists('header_loaded')) {
        header("Location: ./");
        exit();
    }

    if (isset($_SESSION['u_id'])) {
        echo '  <form action="includes/logout.inc.php" method="POST">
                    <button type="submit" name="submit">Logout</button>
                </form>';
    }
?>
<div class="text-vertical-center">

    <form id="login-form" class="center-block" action="includes/login.inc.php" method="POST">
        <h1>H3</h1>
        <input id="login_username" class="form-control" type="text" name="username" placeholder="Username/Email" required />
        <input id="login_password" class="form-control" type="password" name="pwd" placeholder="Password" required />
        <br />
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

        <div>
            <!-- TODO: Add Lost Password Button
            <a id="login_lost_btn" type="button" class="btn btn-link">Lost Password?</a>
            -->
            <a id="login_register_btn" type="button" class="btn btn-link" href="signup.php">Register</a>
        </div>
    </form>

</div>
