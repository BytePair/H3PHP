<?php
include_once 'header.php';
?>

<section class="main-container">
    <div class="main-wrapper">
        <h2>Sign Up</h2>

        <form class="sign-up-form" action="includes/signup.inc.php" method="POST">
            <input type="text" name="username" placeholder="Username" />
            <input type="text" name="email" placeholder="Email" />
            <input type="password" name="pwd" placeholder="Password" />
            <input type="password" name="pwd2" placeholder="Verify Password" />
            <button type="submit" name="submit">Sign Up</button>
        </form>
    </div>
</section>

<?php
include_once 'footer.php';
?>
