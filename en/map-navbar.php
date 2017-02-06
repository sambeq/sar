
<nav id="topNav" class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php
            if ( (isset($_SESSION['loggedin'])) && $_SESSION['loggedin']) {

                echo "<a style=\"color:red\" class=\"navbar-brand page-scroll\" href=\"index.php\"><i class=\"icon ion-model-s\"></i> Share A Ride</a>";


            } else {

                echo "<a class=\"navbar-brand page-scroll\" href=\"index.php\"><i class=\"icon ion-model-s\"></i> Share A Ride</a>";

            }
            ?>

        </div>
        <div class="navbar-collapse collapse" id="bs-navbar" background="black">
            <ul class="nav navbar-nav">

                <li>
                    <a class="page-scroll" href="about.php">About</a>
                </li>
                <li>
                    <a class="page-scroll" href="findaride.php">Find a ride</a>
                </li>
                <li>
                    <a class="page-scroll" href="offeraride.php">Offer a ride</a>
                </li>
                <li>
                    <a class="page-scroll" href="contact.php">Contact</a>
                </li>
                <?php
                if ( (isset($_SESSION['loggedin'])) && $_SESSION['loggedin']) {


                    ?>
                    <li>
                        <a class="page-scroll" href="map.php">MAP</a>
                    </li>
                    <!--<li>
                        <a class="page-scroll" href="geolocation.php">Location</a>
                    </li> -->
                <?php } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php
                    if ( (isset($_SESSION['loggedin'])) && $_SESSION['loggedin']) {

                        echo "<li><a href=''><span class='glyphicon glyphicon-log-in'></span>" . $_SESSION['Email'] . "</a></li>";
                        echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Log Out</a></li>";

                    } else {
                        echo "<a href='login.php'> Log In</a></li>";
                        echo "<li><a href='singUp.php'> Register</a></li>";
                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>