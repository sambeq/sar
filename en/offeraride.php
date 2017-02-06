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
						<form class="form-horizontal" action="searchCategory.php" method="post">
							<fieldset>
								
								<!-- Form Name -->
								<legend style= "color:red">OFFER A RIDE</legend>
								
								<h2 style="color:yellow" align="center" >Coming Soon</h2>
								
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

