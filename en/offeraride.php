<?php session_start(); ?>
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
            <div class="col-sm-8">
                <div class="col-sm-12 col-lg-6 col-md-6">
                    <form class="form-horizontal" action="offeraride.php" method="post">
                        <fieldset style="color:black">

                            <!-- Form Name -->
                            <legend style="color:red">From..</legend>
                            <div class="panel-body">
                                <!-- State -->
                                <div class="form-group">
                                    <label for="state" class="col-sm-3 control-label">State</label>
                                    <div class="col-sm-9">
                                        <select style="color:black" name="from-state" id="countries_states1"
                                                class="form-control bfh-countries" data-country="AL"></select>
                                    </div>
                                </div>
                                <!-- Country -->
                                <div class="form-group">
                                    <label for="country" class="col-sm-3 control-label">Country</label>
                                    <div class="col-sm-9">
                                        <select style="color:black" name="from-country" class="form-control bfh-states"
                                                data-country="countries_states1"></select>
                                    </div>
                                </div>
                                <!-- Place-->
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label">Place</label>
                                    <div class="col-sm-9">
                                        <input style="color:black" name="from-place" type="text" class="form-control"
                                               placeholder="Place" required="">
                                    </div>
                                </div>
                                <!-- Street -->
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Street</label>
                                    <div class="col-sm-9">
                                        <input style="color:black" name="from-street" type="text" class="form-control"
                                               placeholder="Street" required="">
                                    </div>
                                </div>
                                <!-- Date -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Date</label>
                                    <div class="col-sm-9">
                                        <input style="color:black" name="date" type="date" class="form-control">
                                    </div>
                                </div>
                                <!-- Time -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Time</label>
                                    <div class="col-sm-9">
                                        <input style="color:black" name="time" type="time" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset style="color:black">

                            <!-- Form Name -->
                            <legend style="color:red">To..</legend>
                            <div class="panel-body">
                                <!-- State -->
                                <div class="form-group">
                                    <label for="state" class="col-sm-3 control-label">State</label>
                                    <div class="col-sm-9">
                                        <select style="color:black" name="to-state" id="countries_states2"
                                                class="form-control bfh-countries" data-country="AL"></select>
                                    </div>
                                </div>
                                <!-- Country -->
                                <div class="form-group">
                                    <label for="country" class="col-sm-3 control-label">Country</label>
                                    <div class="col-sm-9">
                                        <select style="color:black" name="to-country" class="form-control bfh-states"
                                                data-country="countries_states2"></select>
                                    </div>
                                </div>
                                <!-- Place-->
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-3 control-label">Place</label>
                                    <div class="col-sm-9">
                                        <input style="color:black" name="to-place" type="text" class="form-control"
                                               placeholder="Place" required="">
                                    </div>
                                </div>
                                <!-- Street -->
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Street</label>
                                    <div class="col-sm-9">
                                        <input style="color:black" name="to-street" type="text" class="form-control"
                                               placeholder="Street" required="">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset style="color:black">

                            <!-- Form Name -->
                            <legend style="color:red">Other..</legend>
                            <div class="panel-body">
                                <!-- Seats -->
                                <div class="form-group">
                                    <label for="seats" class="col-sm-3 control-label">Seats</label>
                                    <div class="col-sm-9">
                                        <select name="seats" style="color:black" class="form-control" id="seats">
                                            <option selected>Choose...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                            <option value="4">Four</option>
                                            <option value="5">Five</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Country -->
                                <div class="form-group">
                                    <label for="seats" class="col-sm-3 control-label">Preferences</label>
                                    <div class="col-sm-9">
                                        <input type="checkbox" name="pref[]" value="Music"> <label>Music </label><br>
                                        <input type="checkbox" name="pref[]" value="Talking">
                                        <label>Talking </label><br>
                                        <input type="checkbox" name="pref[]" value="Animals">
                                        <label>Animals </label><br>
                                        <input type="checkbox" name="pref[]" value="Smoking">
                                        <label>Smoking </label><br>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <!-- Buttons -->
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button name="submit" type="submit" class="btn btn-success btn-md">Submit</button>
                                <button type="reset" class="btn btn-danger btn-md">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        require 'dbconnect.php';//verbindung zur DB

        if (!empty($_POST)) {

            $query = "INSERT INTO address (  AddressId, State, Country, Place, Street ) VALUES ( ?, ?, ?, ?, ?) ";


            $addid = rand();
            $fstate = $_POST['from-state'];
            $fcountry = $_POST['from-country'];
            $fplace = $_POST['from-place'];
            $fstreet = $_POST['from-street'];


            $crt_qry = "INSERT INTO createtrip (  Seats, DepartureDate, DepartureTime, DepartureSourceId, DestinationId) VALUES ( ?, ?, ?, ?, ? ) ";

            $seats = $_POST['seats'];
            $date = $_POST['date'];
            $time = $_POST['time'];


            $query1 = "INSERT INTO address (  AddressId, State, Country, Place, Street ) VALUES ( ?, ?, ?, ?, ?) ";

            $addid1 = $addid + 1;
            $tstate = $_POST['to-state'];
            $tcountry = $_POST['to-country'];
            $tplace = $_POST['to-place'];
            $tstreet = $_POST['to-street'];

            $stmt = $conn->prepare($query);

            $stmt->bindParam(1, $addid);
            $stmt->bindParam(2, $fstate);
            $stmt->bindParam(3, $fcountry);
            $stmt->bindParam(4, $fplace);
            $stmt->bindParam(5, $fstreet);

            $stmt->execute();


            $crt_stmt = $conn->prepare($crt_qry);

            $crt_stmt->bindParam(1, $seats);
            $crt_stmt->bindParam(2, $date);
            $crt_stmt->bindParam(3, $time);
            $crt_stmt->bindParam(4, $addid);
            $crt_stmt->bindParam(5, $addid1);

            $crt_stmt->execute();

            $stmt1 = $conn->prepare($query1);

            $stmt1->bindParam(1, $addid1);
            $stmt1->bindParam(2, $tstate);
            $stmt1->bindParam(3, $tcountry);
            $stmt1->bindParam(4, $tplace);
            $stmt1->bindParam(5, $tstreet);


            $stmt1->execute();


            $query2 = "SELECT * from user";
            $stmt = $conn->prepare($query2);
            $stmt->execute();
            $total_found = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($total_found > 0) {
                $my_value = $stmt->fetch(PDO::FETCH_ASSOC);
                $my_stored_preference = explode(',', $my_value['Preferences']);
            }

            if (isset($_POST['submit'])) {
                $all_preferences_value = implode(", ", $_POST['pref']);
                if ($total_found > 0) {
                    //update
                    $upd_qry = "UPDATE user SET Preferences='" . $all_preferences_value . "'";
                    $stmt = $conn->prepare($upd_qry);
                    $result = $stmt->execute();

                } else {
                    //insert
                    $ins_qry = "INSERT INTO users(Preferences) VALUES('" . $all_preferences_value . "')";
                    $stmt = $conn->prepare($ins_qry);
                    $result = $stmt->execute();
                }
            }
        }
        //http://stackoverflow.com/questions/27578858/php-insert-multiple-check-boxes-values-into-one-mysql-cloumn
        ?>


        <?php
        /* include_once("dbconnect.php"); //include your db config file
         if(isset($_POST['submit']))
         {
             echo "Complete";
             if(isset($_POST['music'])){
                 $music=1;
             }else{
                 $music=0;
             }
             if(isset($_POST['talking'])){
                 $talking=1;
             }else{
                 $talking=0;
             }if(isset($_POST['smoking'])){
                 $smoking=1;
             }else{
                 $smoking=0;
             }if(isset($_POST['animals'])){
                 $animals=1;
             }else{
                 $animals=0;
             }
             $query="INSERT INTO preferences(Music, Talking, Animals, Smoking) VALUES ($music,$talking,$animals,$smoking)";


             $stmt = $conn->prepare($query) or die ("OOPs something went wrong by Offer A Ride" );
             $result = $stmt->execute();

             echo $query;

         }
 */
        ?>

    </div>
</section>
<?php
include 'footer.php';
?>

</body>
</html>

