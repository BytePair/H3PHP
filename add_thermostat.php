<?php

    include_once 'header.php';

    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }

    // check if not logged in or we are trying to access directly
    if (!isset($_SESSION['u_id']) || !function_exists('header_loaded')) {
        header("Location: ./");
        exit();
    }

    // check for any errors adding
    $error = (isset($_GET['add'])) ? $_GET['add'] : null;
?>

<!-- Navigation -->
<nav class="navbar fixed-top navbar-toggleable-md navbar-inverse bg-primary" id="bg-primary">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsingNavbarLg">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="./">H3</a>
    <div class="navbar-collapse collapse" id="collapsingNavbarLg">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form action="./" class="nav-form text-center">
                    <button class="btn btn-link nav-button">
                        Home
                    </button>
                </form>
            </li>
            <li class="nav-item">
                <form action="includes/logout.inc.php" method="POST" class="nav-form text-center">
                    <button class="btn btn-link nav-button" type="submit" name="submit">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>


<div class="container-fluid container-with-header">

    <div class="row-fluid">

        <div class="col-md-6 offset-md-3">

            <form id="add-thermostat-form" class="center-block text-center" action="./includes/addthermo.inc.php" method="POST">

                <h1>Add New Thermostat</h1>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                    <input class="form-control" type="text" name="username" placeholder="<?php echo $_SESSION['u_name']; ?>" value="<?php echo $_SESSION['u_name']; ?>" required disabled />
                </div>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-home fa-fw" aria-hidden="true"></i></span>
                    <input class="form-control" type="text" name="locationName" placeholder="Location Name" required />
                </div>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-address-card fa-fw" aria-hidden="true"></i></span>
                    <input class="form-control" type="text" name="ip" placeholder="IP Address" required />
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block" id="signUpButton">Add</button>

                <?php
                /* Catch and display registration errors */
                if ($error) {
                    switch ($error) {
                        case "empty":
                            echo('<p style="font-weight: bold; color: red; margin: 0;">Error: Missing Field</p>');
                            break;
                        case "iptaken":
                            echo('<p style="font-weight: bold; color: red; margin: 0;">Error: IP address already used</p>');
                            break;
                        default:
                            break;
                    }
                }
                ?>

                <a id="back-home-button" class="btn btn-link col-6 text-center" href="./">Go Back</a>
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