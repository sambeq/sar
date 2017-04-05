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


                            $sql = "SELECT ct.CTripId, u.Firstname, u.Lastname, ct.Seats, ct.DepartureDate, ct.DepartureTime, ct.Price, a.Source , a.Destination 
														from user u join createtrip ct on u.UserId=ct.UserId
														join address a on ct.AddressId = a.AddressId
														where a.Source like '%$from%'
														or a.Destination like '%$to%' ";
														
														//where a.Destination like '%Libr%'
                                                        //or a.Source like '%Ers%'";
                            $stmt = $conn->prepare($sql);
                           // $stmt->bindParam(1, $from);
                            // $stmt->bindParam(2, $to);

                            $stmt->execute();
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


                            echo "\"<table class=\"table table - striped\" style= \"color:Black\">";
                            echo "<tr>";
                            echo "<th>Firstname</th>";
                            echo "<th>Lastname</th>";
                            echo "<th>Seats</th>";
                            echo "<th>Departure Date</th>";
							echo "<th>Departure Time</th>";
                            echo "<th>Source</th>";
                            echo "<th>Destination</th>";
                            echo "<th>Price</th>";
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
                                    echo "<td>" . $row["Price"] . "</td>";
                                    echo "<td><input type='radio' name='select'  value='" . $row["CTripId"] . "'></td>";

                                    echo "</tr>";

                                }
                                echo "<td> <button name=\"book\" type=\"submit\" class=\"btn btn-success btn-md\">Book</button></td>";
                            } else
                                echo "<h3 style='color:black'>There is no Product with that name, category, price or description!</h3>";

                            echo "</table>";
                        }

                        ?>
                    </fieldset>
                </form>

            </div>
</section>
<?php
if (isset($_POST["book"])) {

    require_once 'dbconnect.php';
    $ctripId= $_POST['select'];
    $email1 = $_SESSION['Email'];
    $user= "select UserId from user where Email= '$email1'";
    $stmt1 = $conn->prepare($user);
    $stmt1->execute();
    $userid = $stmt1->fetch(PDO::FETCH_ASSOC);
    $userid1= $userid["UserId"] ;

    $stmt2 = "insert into jointrip (UserId, CTrip, request_time) VALUES ($userid1, $ctripId, now())";
    $join = $conn->prepare($stmt2);
    $join->execute();


}

include 'footer.php';
?>

</body>
</html>
