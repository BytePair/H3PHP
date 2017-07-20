<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="./css/reset.css" />
    <link rel="stylesheet" type="text/css" href="./css/style.css" />

</head>

<body>

<header>
    <nav>
        <div class="main-wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
            <div class="nav-login">

                <?php
                    if (isset($_SESSION['u_id'])) {
                        echo '  <form action="includes/logout.inc.php" method="POST">
                                    <button type="submit" name="submit">Logout</button>
                                </form>';
                    } else {
                        echo '  <form action="includes/login.inc.php" method="POST">
                                    <input type="text" name="username" placeholder="Username/Email" />
                                    <input type="password" name="pwd" placeholder="Password" />
                                    <button type="submit" name="submit" class="">Login</button>
                                </form>
                                <a href="signup.php">Sign Up</a>';
                    }
                ?>


                <!-- TODO: Add forgot password -->
            </div>
        </div>
    </nav>
</header>