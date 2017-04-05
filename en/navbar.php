<?php
// Include FB config file && User class
require_once '../facebook/fbConfig.php';

if(isset($accessToken)){
    require_once '../facebook/User.php';
    if(isset($_SESSION['facebook_access_token'])){
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }else{
        // Put short-lived access token in session
        $_SESSION['facebook_access_token'] = (string) $accessToken;

        // OAuth 2.0 client handler helps to manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();

        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

        // Set default access token to be used in script
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }

    // Redirect the user back to the same page if url has "code" parameter in query string
    if(isset($_GET['code'])){
        header('Location: ./');
    }

    // Getting user facebook profile info
    try {
        $profileRequest = $fb->get('/me?fields=name,first_name,last_name,email,link,gender,locale,picture');
        $fbUserProfile = $profileRequest->getGraphNode()->asArray();
    } catch(FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        // Redirect user back to app login page
        header("Location: ./");
        exit;
    } catch(FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

    // Initialize User class
    $user = new User();

    // Insert or update user data to the database
    $fbUserData = array(
        'oauth_provider'=> 'facebook',
        'oauth_uid' 	=> $fbUserProfile['id'],
        'first_name' 	=> $fbUserProfile['first_name'],
        'last_name' 	=> $fbUserProfile['last_name'],
        'email' 		=> $fbUserProfile['email'],
        'gender' 		=> $fbUserProfile['gender'],
        'picture' 		=> $fbUserProfile['picture']['url'],
        'link' 			=> $fbUserProfile['link']
    );
    $userData = $user->checkUser($fbUserData);

    // Put user data into session
    $_SESSION['userData'] = $userData;
    $output = $userData['Email'];
    $_SESSION['Email'] =  $output;

    // Get logout url
    $logoutURL = $helper->getLogoutUrl($accessToken, $redirectURL.'logout.php');

    // Render facebook profile data
    if(!empty($userData)){

    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }

}else{
    // Get login url
    $loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);

    // Render facebook login button
    $output = '<a href="'.htmlspecialchars($loginURL).'"><img src="images/fblogin-btn.png"></a>';
}
?>
<nav id="topNav" style="color: black" class="navbar navbar-default navbar-fixed-top">
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

                echo "<a style=\"color:whitesmoke\" class=\"navbar-brand page-scroll\" href=\"index.php\"><i class=\"icon ion-model-s\"></i> Share A Ride</a>";


            } else {

                echo "<a class=\"navbar-brand page-scroll\" href=\"index.php\"><i class=\"icon ion-model-s\"></i> Share A Ride</a>";

            }?>

        </div>
        <div class="navbar-collapse collapse" id="bs-navbar" background="black">
            <ul class="nav navbar-nav">

                <li>
                    <a class="page-scroll" href="info.php">Info</a>
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

                    <!--<li>
                        <a class="page-scroll" href="geolocation.php">Location</a>
                    </li> -->
                <?php } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="page-scroll" href="../al">shqip</a>
                </li>
                <li>
                    <?php
                    if (!empty($userData) || (isset($_SESSION['loggedin'])) && $_SESSION['loggedin']) {

                    ?>
                <li id="noti_container">
                    <div class="dropdown">
                        <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="" class="glyphicon glyphicon-inbox" style="color: #ffffff;">
                        </a>
                        <div id="show" class="noti_bubble"></div>
                        <ul class="dropdown-menu notifications" role="menu" aria-labelledby="dLabel" style="min-width:420px;">

                            <div class="notification-heading"><h4 class="menu-title">Njoftimet</h4>
                            </div>
                            <li class="divider"></li>
                            <div id="nww" class="notifications-wrapper">
                                <?php include("show_not1.php");?>
                            </div>
                            <li class="divider"></li>
                            <div class="notification-footer"><h4 class="menu-title">View all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4></div>
                        </ul>

                    </div>
                </li>

                <?php

                if (!empty($userData)) {

                    echo "<li><a href='user.php'><span class='glyphicon glyphicon-log-in'></span>" . $userData['Firstname'] . " " . $userData['Lastname'] . "</a></li>";
                }
                if ((isset($_SESSION['loggedin'])) && $_SESSION['loggedin']) {

                    echo "<li><a href='user.php'><span class='glyphicon glyphicon-log-in'></span>" . $_SESSION['Username'] . "</a></li>";
                }
                echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Log Out</a></li>";

                } else {
                    echo "<li><a href='login.php'> Log In</a></li>";
                    echo "<li><a href='singUp.php'> Register</a></li>";
                } ?>
                </li>
            </ul>
        </div>
    </div>
</nav>