<?php
    include_once 'header.php';
?>

<?php
    // code will only run if logged in
    if (isset($_SESSION['u_id'])) {
        include_once('thermostats.php');
    } else {
        include_once('login.php');
    }
?>

<?php
    include_once('footer.php');
?>
