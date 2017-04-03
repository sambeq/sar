<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>OFFER A RIDE</title>

        <?php include 'head.php'; ?>

	</head>
	<body>

    <?php include 'navbar.php'; ?>
		
		<section class="bg-primary" id="one">
			<div class="container">    
				<div class="row">
					<div class="col-sm-12">
						<form enctype="multipart/form-data" action="upload.php" method="POST">
						
						<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
						Send this file: <input name="userfile" type="file" style="color:black" />
						<input type="submit" value="Send File" style="color:black"/>
						
						
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
					require 'dbconnect.php';
							$uploaddir = '/xampp/htdocs/sar/en/img/uploads/';
							$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

							
							
							echo "<p>";

							if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
							  echo "File is valid, and was successfully uploaded.\n";
							} else {
							   echo "Upload failed";
							}
							
							$email=$_SESSION['Email'];
							$sql="update user set Photo = '$uploadfile' where Email='$email'";
							echo $sql;
							$stmt = $conn->prepare($sql);
							$stmt->execute();

							?> 
	</section>
	<?php
		include 'footer.php';
	?>
	
</body>
</html>

