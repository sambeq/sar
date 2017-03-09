<?php
//Include FB config file && User class
require_once '../facebook/fbConfig.php';
require_once '../facebook/User.php';

if(!$fbUser){
    $fbUser = NULL;
    $loginURL = $facebook->getLoginUrl(array('redirect_uri'=>$redirectURL,'scope'=>$fbPermissions));
    $output = '<a href="'.$loginURL.'"><img src="../facebook/images/fblogin-btn.png"></a>';
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
        $output .= '<img src="'.$userData['picture'].'">';
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
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>LOG IN</title>

        <?php include 'head.php'; ?>

		
	</head>
	<body>

    <?php include 'navbar.php'; ?>
		
		<section style= "color:black" class="bg-primary" id="one">

			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<form class="form-horizontal" action="login.php" method="post">
							<fieldset style="color:black">

								<!-- Form Name -->
								<legend style= "color:red" >LOG IN</legend>

								<div class="col-md-6 col-md-offset-2">
									<div class="panel-body">
										<form class="form-horizontal" role="form">
											<div class="form-group">
												<label for="inputEmail3" class="col-sm-3 control-label">Email</label>
												<div class="col-sm-9">
													<input style="color:black" name="email"type="email" class="form-control" id="inputEmail3" placeholder="Email" required="">
												</div>
											</div>
											<div class="form-group">
												<label for="inputPassword3" class="col-sm-3 control-label">Password</label>
												<div class="col-sm-9">
													<input style="color:black"  name="password"type="password" class="form-control" id="inputPassword3" placeholder="Password" required="">
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-offset-3 col-sm-9">
													<div class="checkbox">
														<label class="">
														<input type="checkbox" class="">Remember me</label>
													</div>
												</div>
											</div>
											<div class="form-group last">
												<div class="col-sm-offset-3 col-sm-9">
													<button name="login" type="submit" class="btn btn-success btn-md">Log In</button>
													<button type="reset" class="btn btn-danger btn-md">Reset</button>
												</div>

											</div>
											<div class="col-sm-offset-3 col-sm-9">
												<div class="form-group last">Not Registered? <a href="singUp.php" class="">Register here</a>
												</div>
											</div>
                                            <div><?php echo $output; ?></div>

                                            <div class="form-group last">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <a href="../facebook" type="button" class="btn btn-success btn-md">Facebook</a>
                                                    <a href="../google" type="button" class="btn btn-danger btn-md">Gmail</a>
                                                </div>

                                            </div>
										</form>
									</div>
                                </div>
						    </fieldset>
					    </form>
				    </div>
                </div>

                <?php

                require 'dbconnect.php';

                if(!empty($_POST)){
                    $query = " SELECT Userid, Firstname, Password, Salt, Email 	FROM User WHERE Email = ? ";
                    $email=$_POST['email'];

                    try{
                        $stmt = $conn->prepare($query);
                        $stmt->bindParam(1, $email);
                        $result = $stmt->execute();
                    }

                    catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
                    $login_ok = false;
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    if($row){
                        $check_password = hash('sha256', $_POST['password'] . $row['Salt']);
                        for($round = 0; $round < 65536; $round++){
                            $check_password = hash('sha256', $check_password . $row['Salt']);
                        }
                        if($check_password === $row['Password']){

                            $login_ok = true;

                        }
                    }

                    if($login_ok){

                        unset($row['Salt']);
                        unset($row['Password']);
                        $_SESSION['Email'] = $row['Email'];
                        $_SESSION['loggedin']=true;


                        $update = "UPDATE user SET LastLoginDate = now(), LastLoginIp= '" . $_SERVER['REMOTE_ADDR'] . "' WHERE Email = ? ";
                        $sth = $conn->prepare($update);

                        $emaili=$_POST["email"];
                        $sth->bindParam(1, $emaili);
                        $result=$sth->execute();

                        echo'<script>window.location="index.php";</script>';
                        die("Redirecting to:index.php");

                    }
                    else{
                        echo"<div class='panel panel-warning'>";
                        echo"<div class='panel-heading text-center'>Login Failed!</div>";
                        echo"</div>";

                    }
                }
                ?>

	        </div>
        </section>

    <?php include 'footer.php'; ?>

    </body>
</html>
