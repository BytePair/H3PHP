<?php

    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }

    // check if not logged in or we are trying to access directly
    if (!isset($_SESSION['u_id']) || !function_exists('header_loaded')) {
        header("Location: ./");
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
                <form action="./add_thermostat.php" class="nav-form text-center">
                    <button class="btn btn-link">
                        Add New
                    </button>
                </form>
            </li>
            <li class="nav-item">
                <form action="includes/logout.inc.php" method="POST" class="nav-form text-center">
                    <button class="btn btn-link" type="submit" name="submit">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>


<div class="container-fluid container-with-header">

    <h1 class="page-header text-center"><?php echo $_SESSION['u_name']; ?>'s Thermostats</h1>

    <?php

    echo "<div class='row'>";

        for ($i = 0; $i < 5; $i++) {

            // end the new row
            if ($i % 3 == 0) {
                echo "";
            }

            // start a new row
            if ($i % 3 == 0) {
                echo "";
            }

            // print the thermostat
            echo   "<div class='col-md-4 thermostat-div'>
                        <div class='thermostat'>
                        <a href='./' class=''>
                            
                            <h2 class='text-center'>Home</h2>
                            <div class='row'>
                                <div class='col-4 offset-2 text-center'>
                                    <h1 class='set-temp'>76</h1>
                                    <h3>Set</h3>
                                </div>
                                <div class='col-4 text-center'>
                                    <h1 class='real-temp'>75</h1>
                                    <h3>Real</h3>
                                </div>
                            </div>
                            <br>
                            <table>
                                <tr>
                                    <td>Status:</td>
                                    <td> </td>
                                    <td><b>ON</b></td>
                                </tr>
                                <tr>
                                    <td>Model:</td>
                                    <td> </td>
                                    <td>Super Cooler 9000</td>
                                </tr>
                                <tr>
                                    <td>IP Address:</td>
                                    <td> </td>
                                    <td>192.14.723.1</td>
                                </tr>
                            </table>
                        </a>
                        </div>
                    </div>";
        };

    echo "</div>";

    ?>



</div>
<!-- ./container-fluid -->

