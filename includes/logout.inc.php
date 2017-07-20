<?php

    session_start();

    if (isset($_POST['submit'])) {
        // log out
        session_unset();
        session_destroy();
        // return to home page
        header("Location: ../");
    }