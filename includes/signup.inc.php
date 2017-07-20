<?php

    // check if button was clicked (which is called submit)
    if (isset($_POST['submit'])) {

        // connect to the db
        include_once 'dbh.inc.php';

        // get fields and sanitize
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

        // check for empty fields
        if (empty($username) || empty($email) || empty($pwd)) {
            header("Location: ../signup.php?signup=empty");
            exit();
        } else {
            // check for valid characters
            if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                header("Location: ../signup.php?signup=invalidusername");
                exit();
            } else {
                // check if email is valid
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    header("Location: ../signup.php?signup=invalidemail");
                    exit();
                } else {
                    // check if username is taken
                    $sql = "SELECT * FROM users WHERE user_name='$username'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck > 0) {
                        header("Location: ../signup.php?signup=usernametaken");
                        exit();
                    } else {
                        // all the checks passed

                        // hash the password
                        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                        // insert user into the database
                        $insert_sql = "INSERT INTO users (user_name, user_email, user_pwd) 
                                      VALUES ('$username', '$email', '$hashedPwd');";
                        mysqli_query($conn, $insert_sql);

                        // return to successful sign up screen
                        header("Location: ../");
                        exit();
                    }
                }
            }
        }

    } else {
        // else send them back to sign up page
        header("Location: ../signup.php");
        exit();
    }
