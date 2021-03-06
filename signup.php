<?php
    include_once 'header.php';

    $error = (isset($_GET['signup'])) ? $_GET['signup'] : null;
?>

<div class="container-fluid">

    <div class="row-fluid">

        <div class="col-md-6 offset-md-3">

            <form id="sign-up-form" class="center-block text-center" action="./includes/signup.inc.php" method="POST">
                
                <h1>Register</h1>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                    <input class="form-control" type="text" name="username" placeholder="Username" required />
                </div>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i></span>
                    <input class="form-control" type="text" name="email" placeholder="Email" required />
                </div>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                    <input class="form-control" type="password" name="pwd" placeholder="Password" id="password1" required />
                </div>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                    <input class="form-control" type="password" name="pwd2" placeholder="Verify Password" id="password2" required />
                </div>
                
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

                <a id="back-home-button" class="btn btn-link col-12 text-center" href="./">Cancel</a>

            </form>

        </div>
        <!-- ./col-md-6 -->

    </div>
    <!-- ./row -->

</div>
<!-- ./container-fluid -->

<script>

    /**
     * Checks if passwords are matching
     */

    var pw1 = document.getElementById("password1");
    var pw2 = document.getElementById("password2");

    function validatePasswords() {
        if (pw1.value === pw2.value) {
            pw2.setCustomValidity("");
        } else {
            pw2.setCustomValidity("Passwords do not match");
        }
    }

    pw1.addEventListener('change', function() {
        validatePasswords();
    });

    pw2.addEventListener('keyup', function() {
        validatePasswords();
    });

</script>

<?php
    include_once 'footer.php';
?>
