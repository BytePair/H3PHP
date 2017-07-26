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
    $oldTemp = $_POST['original_temp'];
    $setTemp = $_POST['setTemp'];
    $old_state = $_POST['original_state'];
    $new_state = $_POST['state'];


    // if old and new values are different, toggle the ac state
    $acToggle = ($old_state == $new_state) ? 'false' : 'true';


    // if new temp is missing, just keep the old one
    if (empty($setTemp)) {
        // if old one is missing too, we have a prob
        if (empty($oldTemp)) {
            header("Location: ../");
            exit();
        } else {
            $setTemp = $oldTemp;
        }
    }


    // check for other empty fields
    if (empty($id) || empty($old_state) || empty($new_state)) {
        header("Location: ../");
        exit();

    } else {


        // initialize a curl session
        $curl = curl_init();


        // the URL to fetch
        $url = "http://www.colehirapara.com/api/thermostat"."/".$id;
        curl_setopt($curl, CURLOPT_URL, $url);


        // encode the object as a json object
        $data = array("Id" => $id, "CurrentTemp" => 75, "SetTemp" => $setTemp, "toggleAc" => $acToggle);


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
            // echo $result;
            header("Location: ../edit_thermostat.php?error=put");
            exit();
        } else {
            header("Location: ../");
            exit();
        }

    }


} else {
    // if they didn't use post button, send back to thermostat page
    header("Location: ../edit_thermostat.php?error=usesubmit");
    exit();
}
