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

    // make sure the id and  set
    $id = $_GET['id'];
    $temp = $_GET['settemp'];
    $state = $_GET['state'];

    // check if empty
    if (empty($id) || empty($temp)) {
        header("Location: ../");
        exit();
    }

    // check for valid state
    if($state != 'true' && $state != 'false') {
        header("Location: ../");
        exit();
    }

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
                        Thermostats
                    </button>
                </form>
            </li>
            <li class="nav-item">
                <form action="./includes/logout.inc.php" method="POST" class="nav-form text-center">
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

            <form id="update-thermostat-form" class="center-block text-center" action="./includes/editthermo.inc.php" method="POST">

                <h1>Edit Thermostat</h1>

                <!-- Hidden field with value of the thermostat id -->
                <div class="input-group" style="display: none;">
                    <input class="form-control" type="number" name="id" value="<?php echo $id; ?>" required />
                </div>

                <!-- Hidden field with the original state of the ac -->
                <div class="input-group" style="display: none;">
                    <input class="form-control" type="string" name="original_state" value="<?php echo $state; ?>" required />
                </div>

                <!-- Hidden field with value of original temp -->
                <div class="input-group" style="display: none;">
                    <input class="form-control" type="number" name="original_temp" value="<?php echo $temp; ?>" required />
                </div>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                    <input class="form-control" type="number" name="id_fake" placeholder="ID: <?php echo $id; ?>" required disabled />
                </div>

                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-thermometer-three-quarters fa-fw" aria-hidden="true"></i></span>
                    <input class="form-control" type="number" name="setTemp" placeholder="Set Temperature: <?php echo $temp; ?>" />
                </div>

                <div class="input-group">
                    <div class="btn-group col-12" data-toggle="buttons" style="margin-top: 20px;">
                        <label class="btn btn-primary col-6 on-label <?php echo ($state=='true') ? 'active' : ''; ?>">
                            <input type="radio" name="state" id="on_input" autocomplete="off" value="true" <?php echo ($state=='true') ? 'checked' : ''; ?>>ON
                        </label>
                        <label class="btn btn-primary col-6 off-label <?php echo ($state=='false') ? 'active' : ''; ?>">
                            <input type="radio" name="state" id="off_input" autocomplete="off" value="false" <?php echo ($state=='false') ? 'checked' : ''; ?>>OFF
                        </label>
                    </div>
                </div>


                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block" id="applyButton">Apply</button>

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

                <a type="button" class="btn btn-danger btn-lg btn-block" id="deleteButton" href="./includes/deletethermo.inc.php?id=<?php echo $id; ?>">Delete</a>

                <a id="back-home-button" class="btn btn-link col-12 text-center" href="./">Go Back</a>

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

