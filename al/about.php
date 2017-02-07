<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ABOUT</title>

        <?php include 'head.php'; ?>

	</head>
	<body>

    <?php include 'navbar.php'; ?>
		
		<section class="bg-primary" id="one">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 text-center">
						<h2 class="margin-top-0 text-primary">Built On The Bootstrap Grid</h2>
						<br>
						<p class="text-faded">
							Bootstrap's responsive grid comes in 4 sizes or "breakpoints": tiny (xs), small(sm), medium(md) and large(lg). These 4 grid sizes enable you create responsive layouts that behave accordingly on different devices.
						</p>
						<a href="learnmore.php" class="btn btn-default btn-xl page-scroll">Learn More</a>
					</div>
				</div>
			</div>
		</section>
		<?php
			include 'footer.php';
		?>
	</body>
</html>