<?php

    $dbUserName = 'root';
    $dbPassword = 'root';
    $dbServerName = 'localhost';
    $dbName = 'h3_users';

    // sql connection
    $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);