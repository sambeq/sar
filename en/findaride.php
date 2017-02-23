<!DOCTYPE html>
<html lang="en">
<head>
    <title>FIND A RIDE</title>

    <?php include 'head.php'; ?>

</head>


<body>
<?php include 'navbar.php'; ?>

<section class="bg-primary" id="one">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form class="form-horizontal" action="findaride.php" method="post">
                    <fieldset>

                        <!-- Form Name -->
                        <legend style="color:Black">Find a Ride</legend>


                        <div class="form-group">
                            <div class="col-sm-6 col-md-12 col-lg-12">
                                <input name="from" type="text" style="color:black" class="form-control" placeholder="From..">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6 col-md-12 col-lg-12">
                                <input name="to" type="text" style="color:black" class="form-control " placeholder="To..">
                            </div>
                        </div>

                        <div class="form-group last">
                            <div class=" col-sm-6 col-md-12 col-lg-12">
                                <button name="search" type="submit" class="btn btn-success btn-md">Search</button>

                            </div>

                        </div>

                        <?php

                        if (isset($_POST["search"])) {

                            require_once 'dbconnect.php';

                            $from = $_POST['from'];
                            $to = $_POST['to'];


                            $sql = "SELECT u.Firstname, u.Lastname, ct.Seats, ct.DepartureTime, ct.DepartureDate, adr1.Street as DepartureStreet, adr1.Country as DepartureCity, adr2.Street, adr2.Country 
														from user u join createtrip ct on u.UserId=ct.UserId
														join address adr1 on ct.DepartureSourceId = adr1.AddressId
														join address adr2 on ct.DestinationId= adr2.AddressId
														where adr1.Country = ?
														and adr2.Country = ?";


                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(1, $from);
                            $stmt->bindParam(2, $to);

                            $stmt->execute();
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


                            echo "<table class=\"table table-striped\" style= \"color:Black\">";
                            echo "<tr>";
                            echo "<th>Firstname</th>";
                            echo "<th>Lastname</th>";
                            echo "<th>Seats</th>";
                            echo "<th>Departure Time</th>";
                            echo "<th>Departure Date</th>";
                            echo "<th>Departure Street</th>";
                            echo "<th>Departure City</th>";
                            echo "<th>Destination Street</th>";
                            echo "<th>Destination Country </th>";
                            echo "</tr>";

                            if (count($result) > 0) {
                                foreach ($result as $row) {

                                    echo "<tr>";
                                    echo "<td>" . $row["Firstname"] . "</td>";
                                    echo "<td>" . $row["Lastname"] . "</td>";
                                    echo "<td>" . $row["Seats"] . "</td>";
                                    echo "<td>" . $row["DepartureTime"] . "</td>";
                                    echo "<td>" . $row["DepartureDate"] . "</td>";
                                    echo "<td>" . $row["DepartureStreet"] . "</td>";
                                    echo "<td>" . $row["DepartureCity"] . "</td>";
                                    echo "<td>" . $row["Street"] . "</td>";
                                    echo "<td>" . $row["Country"] . "</td>";
                                    echo "</tr>";

                                }
                            } else
                                echo "<h2 style='color:black'>There is no Product with that name, category, price or description!</h2>";

                            echo "</table>";
                        }

                        ?>
                    </fieldset>
                </form>

            </div>
</section>
<?php
include 'footer.php';
?>

</body>
</html>
