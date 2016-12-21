<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>LOG IN</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		
		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link href="css/custom.css" rel="stylesheet">
		
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		
		<meta charset="utf-8">
		
		<meta name="description" content="The first carpooling company in Albania." />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="generator" content="Codeply">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
		<link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.1/animate.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
		<link rel="stylesheet" href="css/styles.css" />
		
	</head>
	
	
	<body>
		<?php
			include 'navbar.php';
		?>
		
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
													<input name="email"type="email" class="form-control" id="inputEmail3" placeholder="Email" value="<?php echo $submitted_email; ?>" required="">
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
											$submitted_email = ''; 
											if(!empty($_POST)){ 
												$query = " 
												SELECT 
												User_ID, 
												FirstName, 
												Password, 
												Salt, 
												Email 
												FROM Useri 
												WHERE 
												Email = ? 
												"; 
												$email=$_POST['email'];
												
												try{ 
													$stmt = $dbh->prepare($query); 
													$stmt->bindParam(1, $email);
													$result = $stmt->execute(); 
												} 
												catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
												$login_ok = false; 
												$row = $stmt->fetch(); 
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
													
													$update = "UPDATE Useri SET lastLoginDate = getdate(), lastLoginIp= '" . $_SERVER['REMOTE_ADDR'] . "', ip= '" . $_SERVER['HTTP_X_FORWARDED_FOR'] . "' WHERE Email = ? ";
													$sth = $dbh->prepare($update);
													
													
													$emaili=$_POST["email"];
													
													$sth->bindParam(1, $emaili);
													
													$result=$sth->execute();
													
													
													
													
													header("Location: index.php "); 
													die("Redirecting to:index.php"); 
													
												} 
												else{ 
													print("Login Failed."); 
													$submitted_email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8'); 
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
