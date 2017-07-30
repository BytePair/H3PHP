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
    <a class="navbar-brand" href="./"><img  id="navbar-brand-img" src="/assets/icon_clear_2.png" /></a>
    <div class="navbar-collapse collapse" id="collapsingNavbarLg">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form action="./add_thermostat.php" class="nav-form text-center">
                    <button class="btn btn-link nav-button">
                        Add New
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

    <h1 class="page-header text-center"><?php echo $_SESSION['u_name']; ?>'s Thermostats</h1>

    <?php


    // initialize a curl session
    $curl = curl_init();

    // the URL to fetch
    curl_setopt($curl, CURLOPT_URL, "http://www.colehirapara.com/api/thermostat");

    // TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    // perform a curl session
    $result = curl_exec($curl);

    // close a curl session
    curl_close($curl);

    // decode the json result
    $json = json_decode($result);


    echo "<div class='row'>";

        // keep track of loop number
        $loop_number = 0;

        // loop through all of the json objects
        foreach ($json as $item) {

            // check if ac is on
            $active = $item->acActivated ? 'true' : 'false';

            // and get label for that section
            $active_string = ($active == 'true') ? 'ON' : 'OFF';

            // color effects
            $color_coding = ($active == 'true') ? 'green-shadow' : 'red-shadow';
            $word_color = ($active == 'true') ? 'rgb(0, 160, 0)' : 'rgb(160, 0, 0)';

            // print the thermostat
            echo   "<div class='col-md-4 thermostat-div'>
                        <div class='thermostat ".$color_coding."'>
                        <a href='./edit_thermostat.php?id=".$item->Id."&settemp=".$item->SetTemp."&state=".$active."'>
                            
                            <h2 class='text-center location-heading'>Location #".$item->Id."</h2>
                            <div class='row'>
                                <div class='col-4 offset-2 text-center'>
                                    <h1 class='set-temp'>".$item->SetTemp."</h1>
                                    <h3 class='temp-heading'>Set</h3>
                                </div>
                                <div class='col-4 text-center'>
                                    <h1 class='real-temp'>".$item->CurrentTemp."</h1>
                                    <h3 class='temp-heading'>Real</h3>
                                </div>
                            </div>
                            <table style='width: 100%;'>
                                <tr>
                                    <td style='text-align: right; width: 45%;'>Status: </td>
                                    <td style='text-align: left; width: 45%;'><b style='color: ".$word_color."'>".$active_string."</b></td>
                                </tr>
                                <tr>
                                    <td style='text-align: right;'>Make: </td>
                                    <td>Emerson</td>
                                </tr>
                                <tr>
                                    <td style='text-align: right;'>Model: </td>
                                    <td>ST75</td>
                                </tr>
                            </table>
                        </a>
                        </div>
                    </div>";

            // increment the location number
            $loop_number = $loop_number + 1;

        // end of loop
        };

    echo "</div>";





?>

</div>
<!-- ./container-fluid -->

