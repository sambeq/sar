<?php
	//Include FB config file && User class
require_once '../facebook/fbConfig.php';
include_once '../google/gpConfig.php';
require_once '../facebook/User.php';


if(!$fbUser){
	$fbUser = NULL;
	$loginURL = $facebook->getLoginUrl(array('redirect_uri'=>$redirectURL,'scope'=>$fbPermissions));
}else{
	//Get user profile data from facebook
	$fbUserProfile = $facebook->api('/me?fields=id,first_name,last_name,email,link,gender,locale,picture');
	
	//Initialize User class
	$user = new User();
	
	//Insert or update user data to the database
	$fbUserData = array(
		'oauth_provider'=> 'facebook',
		'oauth_uid' 	=> $fbUserProfile['id'],
		'first_name' 	=> $fbUserProfile['first_name'],
		'last_name' 	=> $fbUserProfile['last_name'],
		'email' 		=> $fbUserProfile['email'],
		'gender' 		=> $fbUserProfile['gender'],
		'locale' 		=> $fbUserProfile['locale'],
		'picture' 		=> $fbUserProfile['picture']['data']['url'],
		'link' 			=> $fbUserProfile['link']
	);
	$userData = $user->checkUser($fbUserData);
	
	//Put user data into session
	$_SESSION['userData'] = $userData;
	
	//Render facebook profile data
	if(!empty($userData)){
		$output = '<h1>Facebook Profile Details </h1>';
		$output .= '<img src="'.$userData['picture'].'"  width="300" height="220">';
        $output .= '<br/>Facebook ID : ' . $userData['oauth_uid'];
        $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        $output .= '<br/>Email : ' . $userData['email'];
        $output .= '<br/>Gender : ' . $userData['gender'];
        $output .= '<br/>Locale : ' . $userData['locale'];
        $output .= '<br/>Logged in with : Facebook';
		$output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Facebook Page</a>';
        $output .= '<br/>Logout from <a href="logout.php">Facebook</a>';
	}else{
		$output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
	}
}

//require_once '../google/User.php';
if(isset($_GET['code'])){
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
    //Get user profile data from google
    $gpUserProfile = $google_oauthV2->userinfo->get();

    //Initialize User class
    $user = new User();

    //Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'gender'        => $gpUserProfile['gender'],
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture'],
        'link'          => $gpUserProfile['link']
    );
    $userData = $user->checkUser($gpUserData);

    //Storing user data into session
    $_SESSION['userData'] = $userData;

    //Render facebook profile data
    if(!empty($userData)){
        $output = '<h1>Google+ Profile Details </h1>';
        $output .= '<img src="'.$userData['picture'].'" width="300" height="220">';
        $output .= '<br/>Google ID : ' . $userData['oauth_uid'];
        $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        $output .= '<br/>Email : ' . $userData['email'];
        $output .= '<br/>Gender : ' . $userData['gender'];
        $output .= '<br/>Locale : ' . $userData['locale'];
        $output .= '<br/>Logged in with : Google';
        $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Google+ Page</a>';
        $output .= '<br/>Logout from <a href="logout.php">Google</a>';
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
} else {


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

                            echo "<a style=\"color:red\" class=\"navbar-brand page-scroll\" href=\"index.php\"><i class=\"icon ion-model-s\"></i> Share A Ride</a>";


							} else {

                            echo "<a class=\"navbar-brand page-scroll\" href=\"index.php\"><i class=\"icon ion-model-s\"></i> Share A Ride</a>";

						}
					?>
            
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
						if ( !empty($userData) || (isset($_SESSION['loggedin'])) && $_SESSION['loggedin']) {
                            if ( !empty($userData)) {

                                echo "<li><a href='user.php'><span class='glyphicon glyphicon-log-in'></span>" . $userData['first_name']." ".$userData['last_name'] ."</a></li>";
                            }
                            if ( (isset($_SESSION['loggedin'])) && $_SESSION['loggedin']) {

                                echo "<li><a href='user.php'><span class='glyphicon glyphicon-log-in'></span>" . $_SESSION['Email'] . "</a></li>";
                            }


                            echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Log Out</a></li>";


							} else {
                            echo "<li><a href='login.php'> Log In</a></li>";
                            echo "<li><a href='singUp.php'> Register</a></li>";

						}
					?>
				</li>
            </ul>
		</div>
	</div>
</nav>