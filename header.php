<?php

    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }

    function header_loaded(){};
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>H3</title>

    <!-- Favicon -->
    <link rel="icon" href="./assets/favicon.ico" />

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="./fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
    <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="./css/style.css" />

</head>

<body>
