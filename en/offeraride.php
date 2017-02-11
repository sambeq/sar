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
						<form class="form-horizontal" action="offeraride.php" method="post">
                            <fieldset style="color:black">

                                <!-- Form Name -->
                                <legend style= "color:red" >From..</legend>

                                <div class="col-md-6 col-md-offset-2">
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Street</label>
                                                <div class="col-sm-9">
                                                    <input style="color:black" name="street" type="text" class="form-control"  placeholder="Street" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-3 control-label">Place</label>
                                                <div class="col-sm-9">
                                                    <input style="color:black"  name="place" type="text" class="form-control"  placeholder="Place" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">City</label>
                                                <div class="col-sm-9">
                                                    <input style="color:black" name="city" type="text" class="form-control"  placeholder="City" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-3 control-label">State</label>
                                                <div class="col-sm-9">
                                                    <input style="color:black"  name="state" type="text" class="form-control"  placeholder="State" required="">
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset style="color:black">

                                <!-- Form Name -->
                                <legend style= "color:red" >To..</legend>

                                <div class="col-md-6 col-md-offset-2">
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Street</label>
                                                <div class="col-sm-9">
                                                    <input style="color:black" name="street" type="text" class="form-control"  placeholder="Street" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-3 control-label">Place</label>
                                                <div class="col-sm-9">
                                                    <input style="color:black"  name="place" type="text" class="form-control"  placeholder="Place" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">City</label>
                                                <div class="col-sm-9">
                                                    <input style="color:black" name="city" type="text" class="form-control"  placeholder="City" required="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-3 control-label">State</label>
                                                <div class="col-sm-9">
                                                    <input style="color:black"  name="state" type="text" class="form-control"  placeholder="State" required="">
                                                </div>
                                            </div>

                                        </form>

                                        <div class="form-group last">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button name="login" type="submit" class="btn btn-success btn-md">Next</button>
                                                <button type="reset" class="btn btn-danger btn-md">Reset</button>
                                            </div>
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

