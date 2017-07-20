<?php

    session_start();

    // check if not logged in or we are trying to access directly
    if (!isset($_SESSION['u_id']) || !function_exists('header_loaded')) {
        header("Location: ./");
        exit();
    } else {
        echo '<h1>Thermostats</h1>';
    }

    // TODO: Move logout button somewhere better
    if (isset($_SESSION['u_id'])) {
            echo '  <form action="includes/logout.inc.php" method="POST">
                        <button type="submit" name="submit">Logout</button>
                    </form>';
        }

