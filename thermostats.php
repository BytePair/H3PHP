<?php

    session_start();

    // check if not logged in or we are trying to access directly
    if (!isset($_SESSION['u_id']) || !function_exists('header_loaded')) {
        header("Location: ./");
        exit();
    }
?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./"><h1>H3</h1></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form action="includes/logout.inc.php" method="POST">
                        <button class="btn btn-link">Add New</button>
                    </form>
                </li>
                <li>
                    <form action="includes/logout.inc.php" method="POST">
                        <button class="btn btn-link" type="submit" name="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>


<!-- Page Content -->
<div class="container">

    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-header"><?php echo $_SESSION['u_name']; ?>'s Thermostats
                <small>
                </small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Projects Row -->
    <div class="row">

        <div class="col-md-4 portfolio-item">
            <a href="#">
                <div class="thermostat">

                    <div class="row">

                        <div class="col-xs-4 col-xs-offset-2 text-center">
                            <h1 class="set-temp">72
                            </h1>
                            <h2>Set</h2>
                        </div>
                        <div class="col-xs-4 text-center">
                            <h1 class="real-temp">72
                            </h1>
                            <h2>Real</h2>
                        </div>
                    </div>
                </div>
            </a>
            <h3>
                <a href="#">Home</a>
            </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </div>

        <div class="col-md-4 portfolio-item">
            <a href="#">
                <div class="thermostat">

                    <div class="row">

                        <div class="col-xs-4 col-xs-offset-2 text-center">
                            <h1 class="set-temp">72
                            </h1>
                            <h2>Set</h2>
                        </div>
                        <div class="col-xs-4 text-center">
                            <h1 class="real-temp">72
                            </h1>
                            <h2>Real</h2>
                        </div>
                    </div>
                </div>
            </a>
            <h3>
                <a href="#">Home</a>
            </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </div>


    </div>
    <!-- /.row -->

    <hr>

    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <li>
                    <a href="./">&laquo;</a>
                </li>
                <li class="active">
                    <a href="./">1</a>
                </li>
                <li>
                    <a href="./">&raquo;</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container (page content) -->

<hr>
