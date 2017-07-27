<?php

    // check if button was clicked (which is called submit)
    if (isset($_POST['submit'])) {

        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        // connect to the db
        include_once 'dbh.inc.php';

        // get fields and sanitize
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        if (empty($username)) {
            $username = $_SESSION['u_name'];
        }
        $locationName = mysqli_real_escape_string($conn, $_POST['locationName']);
        $ipAddress = mysqli_real_escape_string($conn, $_POST['ip']);

        // check for empty fields
        if (empty($username) || empty($locationName) || empty($ipAddress)) {

            header("Location: ../add_thermostat.php?add=empty");
            exit();

        } else {

            // encode the object as a json object
            $new_count = rand(10, 50000);
            $data = array("CurrentTemp" => 75, "SetTemp" => 76, "acActivated" => true);
            $data_string = json_encode($data);

            // initialize a curl session
            $curl = curl_init();

            // the URL to fetch
            curl_setopt($curl, CURLOPT_URL, "http://www.colehirapara.com/api/thermostat");

            // set to post request
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: '.strlen($data_string))
            );

            // execute
            $result = curl_exec($curl);

            // close a curl session
            curl_close($curl);

            // return to successful sign up screen
            header("Location: ../thermostats.php");
            exit();
        }

    } else {

        // else send them back to the add_therostats page
        header("Location: ../add_thermostat.php");
        exit();

    }
