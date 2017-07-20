<?php

    session_start();

    // check if button was clicked (which is called submit)
    if (isset($_POST['submit'])) {

        // connect to db
        include_once 'dbh.inc.php';

        // get fields and sanitize
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

        // check for empty inputs
        if (empty($username) || empty($pwd)) {
            header("Location: ../index.php?login=error");
            exit();
        } else {
            // check if username exists
            $sql = "SELECT * FROM users WHERE user_name='$username' OR user_email='$username'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck < 1) {
                header("Location: ../index.php?login=error");
                exit();
            } else {
                // assign the results of query (an array) to $row
                if ($row = mysqli_fetch_assoc($result)) {

                    // de-hash and verify stored password
                    $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);

                    if ($hashedPwdCheck == false) {
                        header("Location: ../index.php?login=error");
                        exit();
                    } else if ($hashedPwdCheck == true) {

                        // lock in the user here (session)
                        $_SESSION['u_id'] = $row['user_id'];
                        $_SESSION['u_name'] = $row['user_name'];
                        $_SESSION['u_email'] = $row['user_email'];

                        header("Location: ../");
                        exit();
                    }

                }
            }
        }

    } else {
        header("Location: ../index.php?login=error");
        exit();
    }
