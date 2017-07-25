<?php

// check if button was clicked (which is called submit)
if (isset($_POST['submit'])) {


    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }


    // connect to the db
    include_once 'dbh.inc.php';


    // get fields
    $id = $_POST['id'];
    $setTemp = $_POST['setTemp'];
    $state = $_POST['state'];


    // convert to boolean value
    // $acOn = ($state=='ON') ? "true" : "false";

    echo "<p>id: ".$id."</p>";
    echo "<p>settemp: ".$setTemp."</p>";
    echo "<p>state: ".$state."</p>";
    echo "<p>acon: ".$acOn."</p>";


    // check for empty fields
    if (empty($id) || empty($setTemp) || empty($state)) {
        // header("Location: ../add_thermostat.php?add=empty");
        // exit();

    } else {

        // initialize a curl session
        $curl = curl_init();

        // the URL to fetch
        $url = "http://www.colehirapara.com/api/thermostat"."/".$id;
        echo '<p>'.$url.'</p>';
        curl_setopt($curl, CURLOPT_URL, $url);

        // encode the object as a json object
        $data = array("Id" => $id, "CurrentTemp" => 75, "SetTemp" => $setTemp, "acActivated" => $state);

        echo "<p>".json_encode($data)."</p>";

        // set to PUT request
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));

        // perform a curl session
        $result = curl_exec($curl);

        // close a curl session
        curl_close($curl);

        // check for errors
        if (!empty($result)) {
            echo $result;
            header("Location: ../edit_thermostat.php?error=put");
            exit();
        } else {
            header("Location: ../");
            exit();
        }

    }


} else {
    // else send them back to the add_therostats page
    header("Location: ../edit_thermostat.php?error=usesubmit");
    exit();
}
