<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>SIGN UP</title>

        <?php include 'head.php'; ?>

	</head>
	
	<body>

    <?php include 'navbar.php'; ?>
		
		<section class="bg-primary" id="one">
			
			<div class="container">    
				<div class="row">
					<div class="col-sm-12">
						<form class="form-horizontal" action="singUp.php" method="post">
							<fieldset>
								
								<!-- Form Name -->
								<legend style="color:red">SIGN UP</legend>
								
								<!-- Text input-->
								<div class="col-md-6 col-md-offset-2">
									<div class="panel-body">
										<form class="form-horizontal" role="form">
											<!-- User Name-->
											<div class="form-group">
												<label for="userName" class="col-sm-3 control-label">User Name</label>
												<div class="col-sm-9">
													<input name="username" type="text" id="userName" placeholder="User Name" class="form-control" />
												</div>
											</div>
											<!-- First Name-->
											<div class="form-group">
												<label for="firstName" class="col-sm-3 control-label">First Name</label>
												<div class="col-sm-9">
													<input name="firstname" type="text" id="firstName" placeholder="First Name" class="form-control" />
												</div>
											</div>
											<!-- Last Name-->
											<div class="form-group">
												<label for="lastName" class="col-sm-3 control-label">Last Name</label>
												<div class="col-sm-9">
													<input name="lastname" type="text" id="lastName" placeholder="Last Name" class="form-control" >
												</div>
											</div>
											<!-- Email-->
											<div class="form-group">
												<label for="email" class="col-sm-3 control-label">Email</label>
												<div class="col-sm-9">
													<input name="email" type="email" id="email" placeholder="Email" class="form-control" >
												</div>
											</div>
											<!-- Password -->
											<div class="form-group">
												<label for="password" class="col-sm-3 control-label">Password</label>
												<div class="col-sm-9">
													<input name="password" type="password" id="password" placeholder="Password" class="form-control" >
												</div>
											</div>
											<!-- Confirm Password -->
											<div class="form-group">
												<label for="passwordConfirm" class="col-sm-3 control-label">Confirm Password</label>
												<div class="col-sm-9">
													<input type="password" name="confirmpassword" id="passwordConfirm" class="form-control" placeholder="Confirm Password"  >
													
												</div>
											</div>
											<!-- Birthdate -->
											<!-- <div class="form-group">
												<label for="birthDate" class="col-sm-3 control-label">Birthdate</label>
												<div class="col-sm-9">
													<!-- <input name="geburtstag" type="date" id="birthDate" data-min="01/15/2013" data-max="today" class="form-control">
														<div class="bfh-datepicker" data-format="d-m-y" data-date="today" data-max="today">
													</div>
												</div> 
											</div>-->
											<!-- Birthdate -->
											<div class="form-group">
												<label for="birthDate" class="col-sm-3 control-label">Date of Birth</label>
												<div class="col-sm-9">
													<input name="birthdate" type="date" id="birthDate" class="form-control">
												</div>
											</div>
											<!-- State -->
											<div class="form-group">
												<label for="state" class="col-sm-3 control-label">State</label>
												<div class="col-sm-9">
													<select name="state"id="countries_states1" class="form-control bfh-countries" data-country="AL"></select>
												</div>
											</div> 
											<!-- Country -->
											<div class="form-group">
												<label for="country" class="col-sm-3 control-label">Country</label>
												<div class="col-sm-9">
													<select name="country" class="form-control bfh-states" data-country="countries_states1"></select>
												</div>
											</div>
											<!-- Phone -->
											<div class="form-group">
												<label for="phone" class="col-sm-3 control-label">Phone</label>
												<div class="col-sm-9">
													
													<input name="phone" type="text" class="form-control bfh-phone" data-country="countries_states1">
												</div>
											</div>
											<!-- Gender -->
											<div class="form-group">
												<label class="control-label col-sm-3">Gender</label>
												<div class="col-sm-6">
													<div class="row">
														<div class="col-sm-4">
															<label for="femaleRadio"class="radio-inline">
																<input name="gender" type="radio" id="femaleRadio" value="Female">Female
															</label>
														</div>
														<div class="col-sm-4">
															<label for="maleRadio" class="radio-inline">
																<input name="gender" type="radio" id="maleRadio" value="Male">Male
															</label>
														</div>
													</div>
												</div>
											</div> 
											<div class="form-group last">
												<div class="col-sm-offset-3 col-sm-9">
													<button name="singup"type="submit" class="btn btn-success btn-md">SingUp</button>
													<button type="reset" class="btn btn-danger">Reset</button>
												</div>
											</div>
											<div class="col-sm-offset-3 col-sm-9">
												<div class="form-group last">Already registered? <a href="login.php">Login here</a>
												</div>
											</div>
										</form> <!-- /form -->
									</div>
								</div> <!-- ./container -->
							</fieldset>
						</form>
					</div>
				</div>
				<?php

					
					if(!empty($_POST))
					{ 
						// Ensure that the user fills out fields 
						if(empty($_POST['username'])) 
						{ die("Please enter your Username."); }
						if(empty($_POST['firstname'])) 
						{ die("Please enter your Firstname."); } 
						if(empty($_POST['lastname'])) 
						{ die("Please enter your Lastname."); } 
						if(empty($_POST['birthdate'])) 
						{ die("Please enter your BirthDate."); } 
						if(empty($_POST['state'])) 
						{ die("Please enter your State."); } 
						if(empty($_POST['country'])) 
						{ die("Please enter your Country."); }
						if(empty($_POST['phone'])) 
						{ die("Please enter your Phone Number."); }
						if(empty($_POST['gender'])) 
						{ die("Please enter your Gender."); } 
						if(empty($_POST['password'])) 
						{ die("Please enter a password."); } 
						if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
						{ die("Invalid E-Mail Address"); }

                        require 'dbconnect.php';//verbindung zur DB

                        $Pass=$_POST['password'];
                        $confirmpassword=$_POST['confirmpassword'];
                        if ($Pass != $confirmpassword) {
                            echo("Error... Passwords do not match");
                            exit;
                        }

						// Check if the email is already taken
						$query = "SELECT * FROM User WHERE Email = ?";
						
						$email=$_POST['email'];
						try { 
							$stmt = $conn->prepare($query);
							$stmt->bindParam(1, $email);
							
							$result = $stmt->execute();

						} 
						catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage());} 
						$row = $stmt->fetch(PDO::FETCH_ASSOC);
						if($row){ die("This email address is already registered"); } 
						
						// Add row to database 
						$query = "INSERT INTO User (  Firstname, Lastname, Username, Birthdate, Password, Phone, Email, Gender, Salt, State, Country ) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ";
						
						// Security measures
						$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
						$password = hash('sha256', $_POST['password'] . $salt); 
						for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); } 
						
						
						$firstname=$_POST['firstname'];
						$lastname=$_POST['lastname'];
						$username=$_POST['username'];
						$birthdate=$_POST['birthdate'];
						$email=$_POST['email'];
						$pass=$password;
						$sa=$salt;
						$state=$_POST['state'];
						$country=$_POST['country'];
						$phone=$_POST['phone'];
						$gender=$_POST['gender'];
						
						try {  
							$stmt = $conn->prepare($query);
							
							$stmt->bindParam(1, $firstname);
							$stmt->bindParam(2, $lastname);
							$stmt->bindParam(3, $username);
							$stmt->bindParam(4, $birthdate);
							$stmt->bindParam(5, $pass);
							$stmt->bindParam(6, $phone);
							$stmt->bindParam(7, $email);
							$stmt->bindParam(8, $gender);
							$stmt->bindParam(9, $salt);
							$stmt->bindParam(10, $state);
							$stmt->bindParam(11, $country);

							$result = $stmt->execute();
							
							//$result = $stmt->execute($query_params);
						} 
						catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); }
						if($result==true ){
							echo"<div class='panel panel-success'>";
							echo"<div class='panel-heading'>Your Registration Succeed!</div>";
							echo"</div>";

							}else{
							echo"<div class='panel panel-warning'>";
							echo"<div class='panel-heading'>Your Registration Failed!</div>";
							echo"</div>";
						}
					} 
					
					
				?>
			</div>
			
		</section>
		
		<?php
			include 'footer.php';
		?>
		
	</body>
</html>
