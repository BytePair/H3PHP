<?php


    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }


    // if user not logged in, return to home page
    if (!isset($_SESSION['u_id'])) {
        header("Location: ../");
        exit();
    };


    // connect to the db
    include_once 'dbh.inc.php';


    // get id
    $id = $_GET['id'];


    echo "<p>id: ".$id."</p>";

    // check for empty id
    if (empty($id)) {
        header("Location: ../");
        exit();

    } else {

        // initialize a curl session
        $curl = curl_init();

        // the URL to fetch
        $url = "http://www.colehirapara.com/api/thermostat"."/".$id;
        echo '<p>url: '.$url.'</p>';
        curl_setopt($curl, CURLOPT_URL, $url);


        // set to PUT request
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");

        // perform a curl session
        $result = curl_exec($curl);

        // close a curl session
        curl_close($curl);

        header("Location: ../");
        exit();

    }


