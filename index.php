<?php
    include_once 'header.php';
?>

    <section class="main-container">
        <div class="main-wrapper">
            <h2>Home</h2>

            <?php

                // code will only run if logged in
                if (isset($_SESSION['u_id'])) {
                    echo "You are logged in!";
                }

            ?>

        </div>
    </section>

<?php
    include_once 'footer.php';
?>
