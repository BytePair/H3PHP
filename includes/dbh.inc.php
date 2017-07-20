<?php

    $dbUserName = 'root';
    $dbPassword = 'root';
    $dbServerName = 'localhost';
    $dbName = 'h3';

    /*
    Command to create table

    CREATE TABLE users {
        user_id int(13) not null AUTO_INCREMENT PRIMARY KEY,
        user_name varchar(255) not null,
        user_email varchar(255) not null,
        user_pwd varchar(255) not null
    }
    */

    // sql connection
    $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);