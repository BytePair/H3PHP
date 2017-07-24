<?php
    include_once 'header.php';

    $error = (isset($_GET['signup'])) ? $_GET['signup'] : null;
?>

<div class="container-fluid">

    <div class="row-fluid">

        <div class="col-md-4 col-md-offset-4">

            <form id="sign-up-form" class="center-block text-center" action="./includes/signup.inc.php" method="POST">
                
                <h1>Register</h1>
                
                <input class="form-control" type="text" name="username" placeholder="Username" required />
                <input class="form-control" type="text" name="email" placeholder="Email" required />
                <input class="form-control" type="password" name="pwd" placeholder="Password" required />
                <input class="form-control" type="password" name="pwd2" placeholder="Verify Password" required />
                
                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block" id="signUpButton">Register</button>

                <?php
                    /* Catch and display registration errors */
                    if ($error) {
                        switch ($error) {
                            case "usernametaken":
                                echo('<p style="font-weight: bold; color: red; margin: 0;">Error: Username already taken</p>');
                                break;
                            case "invalidemail":
                                echo('<p style="font-weight: bold; color: red; margin: 0;">Error: Invalid email</p>');
                                break;
                            case "empty":
                                echo('<p style="font-weight: bold; color: red; margin: 0;">Error: Check for missing field</p>');
                                break;
                            default:
                                break;
                        }
                    }
                ?>

                <a id="back-home-button" type="button" class="btn btn-link" href="./">Go Back Home</a>
            </form>

        </div>
        <!-- ./col-md-6 -->

    </div>
    <!-- ./row -->

</div>
<!-- ./container-fluid -->

<?php
include_once 'footer.php';
?>
