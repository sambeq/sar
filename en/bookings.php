<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>CONTACT</title>

        <?php include 'head.php'; ?>

	</head>
	<body>

    <?php include 'navbar.php'; ?>
		
		<section class="bg-primary" id="one">
			<div class="container">    
				<div class="row">
					<div class="col-sm-12">
                        <?php

                        if (isset($_POST["search"])) {

                            require_once 'dbconnect.php';

                            $from = $_POST['from'];
                            $to = $_POST['to'];


                            $sql = "SELECT ct.CTripId, u.Firstname, u.Lastname, ct.Seats, ct.DepartureDate, ct.DepartureTime, a.Source , a.Destination 
														from user u join createtrip ct on u.UserId=ct.UserId
														join address a on ct.AddressId = a.AddressId
														join jointrip jt on u.UserId = 
														 ";

                            //where a.Destination like '%Libr%'
                            //or a.Source like '%Ers%'";
                            $stmt = $conn->prepare($sql);
                            // $stmt->bindParam(1, $from);
                            // $stmt->bindParam(2, $to);

                            $stmt->execute();
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


                            echo "<table class=\"table\" style= \"color:Black\">";
                            echo "<tr>";
                            echo "<th>Firstname</th>";
                            echo "<th>Lastname</th>";
                            echo "<th>Seats</th>";
                            echo "<th>Departure Date</th>";
                            echo "<th>Departure Time</th>";
                            echo "<th>Source</th>";
                            echo "<th>Destination</th>";
                            echo "<th> </th>";
                            echo "</tr>";

                            if (count($result) > 0) {
                                foreach ($result as $row) {

                                    echo "<tr>";
                                    echo "<td>" . $row["Firstname"] . "</td>";
                                    echo "<td>" . $row["Lastname"] . "</td>";
                                    echo "<td>" . $row["Seats"] . "</td>";
                                    echo "<td>" . $row["DepartureDate"] . "</td>";
                                    echo "<td>" . $row["DepartureTime"] . "</td>";
                                    echo "<td>" . $row["Source"] . "</td>";
                                    echo "<td>" . $row["Destination"] . "</td>";
                                    echo "<td><input type='radio' name='select'  value='" . $row["CTripId"] . "'></td>";

                                    echo "</tr>";

                                }
                                echo "<td> <button name=\"book\" type=\"submit\" class=\"btn btn-success btn-md\">Book</button></td>";
                            } else
                                echo "<h3 style='color:black'>There is no Product with that name, category, price or description!</h3>";

                            echo "</table>";
                        }

                        ?>


				</div>
			</div>
		</div>
	</section>
	
	
	<?php
		include 'footer.php';
	?>
	
</body>
</html>

