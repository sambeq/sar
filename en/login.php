<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>LOG IN</title>

        <?php include 'head.php'; ?>
		
	</head>
	<body>

    <?php include 'navbar.php'; ?>
		
		<section class="bg-primary" id="one">
			<div class="container">    
				<div class="row">
					<div class="col-sm-12">
						<form class="form-horizontal" action="login.php" method="post">
							<fieldset>
								
								<!-- Form Name -->
								<legend style= "color:red" >LOG IN</legend>
								
								<div class="col-md-6 col-md-offset-2">
									<div class="panel-body">
										<form class="form-horizontal" role="form">
											<div class="form-group">
												<label for="inputEmail3" class="col-sm-3 control-label">Email</label>
												<div class="col-sm-9">
													<input name="email"type="email" class="form-control" id="inputEmail3" placeholder="Email" required="">
												</div>
											</div>
											<div class="form-group">
												<label for="inputPassword3" class="col-sm-3 control-label">Password</label>
												<div class="col-sm-9">
													<input name="password"type="password" class="form-control" id="inputPassword3" placeholder="Password" required="">
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
											
										</form>
										
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
													
													/**  $update $update = "UPDATE User SET lastLoginDate = getdate(), lastLoginIp= '" . $_SERVER['REMOTE_ADDR'] . "', ip= '" . $_SERVER['HTTP_X_FORWARDED_FOR'] . "' WHERE Email = ? ";
													$sth = $conn->prepare($update);
													
													
													$emaili=$_POST["email"];
													
													$sth->bindParam(1, $emaili);
													
													$result=$sth->execute();*/




                                                    echo'<script>window.location="index.php";</script>';
													die("Redirecting to:index.php"); 
													
												} 
												else{ 
													print("Login Failed.");

												} 
											} 
										?> 
										
									</div>
									
								</div>
							</div>
							
							
							
						</fieldset>
					</form>
					
				</div>
			</div>
		</div>
	</div>
	
</section>

<?php
	include 'footer.php';
?>

</body>
</html>
