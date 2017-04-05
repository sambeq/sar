<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User profile form requirement</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg=="
          crossorigin="anonymous">
    <!-- Bootstrap Core CSS -->
    <!--     <link href="css/bootstrap.min.css" rel="stylesheet"> --><?php include 'head.php'; ?>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw=="
          crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
        body {
            padding-top: 70px;
            /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
        }

        .othertop {
            margin-top: 10px;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php include 'navbar.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            <form class="form-horizontal" action="edit.php" method="post">
                <div class="col-md-2 hidden-xs">
                    <img src="http://websamplenow.com/30/userprofile/images/avatar.jpg"
                         class="img-responsive img-thumbnail ">
                </div>


                <fieldset>

                    <!-- Form Name -->

                    <legend>User profile form requirement</legend>

                    <!-- Text input username-->
                    <?php

                    require 'dbconnect.php';
                    $email = $_SESSION['Email'];

                    $query = "SELECT UserId,Username, Firstname, Lastname, Birthdate,Gender, State,Country, Phone,Email,Preferences FROM user where  Email = '$email'";

                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);


                    //echo $result['Firstname'];

                    ?>


                    <!-- Text input firstname-->


                    <div class="form-group">
                        <label class="col-md-4 control-label" for="username">Username</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-male" style="font-size: 20px;"></i>
                                </div>

                                <input id="username" name="username" type="text" placeholder="Username"
                                       value="<?php echo $result['Username']; ?>"

                                       class="form-control input-md">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Firstname">Firstname</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user">

                                    </i>
                                </div>
                                <input id="firstname" name="firstname" type="text" placeholder="Firstaname"
                                       value="<?php echo $result['Firstname']; ?>"
                                       class="form-control input-md">
                            </div>

                        </div>
                    </div>

                    <!-- Text input lastname-->

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Lastname">Lastname</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>

                                </div>
                                <input id="lastname" name="lastname" type="text" placeholder="Lastname"
                                       value="<?php echo $result['Lastname']; ?>"
                                       class="form-control input-md">
                            </div>
                        </div>
                    </div>

                    <!-- File Button  foto-->
                    <!--<div class="form-group">
                        <label class="col-md-4 control-label" for="Upload photo">Upload photo</label>
                        <div class="col-md-4">
                            <input id="Upload photo" name="Upload photo" class="input-file" type="file" readonly>
                        </div>
                    </div>-->

                    <!-- Text input date of birth-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Date Of Birth">Date Of Birth</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-birthday-cake"></i>
                                </div>
                                <input id="dob" name="dob" type="date" placeholder="Date Of Birth"
                                       value="<?php echo $result['Birthdate']; ?>"
                                       class="form-control input-md">
                            </div>
                        </div>
                    </div>

                    <!-- input (inline) gender -->

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Gender">Gender</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-birthday-cake"></i>
                                </div>
                                <input id="gender" name="gender" type="text" placeholder="Gender"
                                       value="<?php echo $result['Gender']; ?>"
                                       class="form-control input-md">

                            </div>
                        </div>
                    </div>

                    <!-- State -->

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="state">State</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-globe" style="font-size: 20px;"></i>
                                </div>
                                <select style="color:black" name="state"id="countries_states1" class="form-control bfh-countries" data-country="<?php echo $result['State']; ?>"></select>

                            </div>
                        </div>
                    </div>

                    <!-- Country -->

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="state">Country</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-globe" style="font-size: 20px;"></i>
                                </div>
                                <input id="country" name="country" type="text" placeholder="Country"
                                       value="<?php echo $result['Country']; ?>"
                                       class="form-control input-md">
                                <select  style="color:black" name="country" class="form-control bfh-states" data-country="countries_states1" value="<?php echo $result['Country']; ?>"></select>

                            </div>
                        </div>
                    </div>

                    <!-- Text input phone number-->

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Phone number ">Phone number </label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input style="color:black" name="phone" type="text" class="form-control bfh-phone" data-country="countries_states1" value="<?php echo $result['Phone']; ?>">

                            </div>
                        </div>
                    </div>

                    <!-- Text input email address-->

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Email Address">Email Address</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <input id="Email Address" name="email" type="text" placeholder="Email Address"
                                       value="<?php echo $result['Email']; ?>"
                                       class="form-control input-md">
                            </div>
                        </div>
                    </div>

                    <!-- Preferences -->

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Preferences">Preferences</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <textarea id="Preferences" name="Preferences" type="text" placeholder="Preferences"
                                          class="form-control input-md"><?php echo $result['Preferences']; ?></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Edit"></label>
                        <div class="col-md-4">
                            <div class="input-group">

                                <a href='user.php'>
                                    <button name="Send" type="submit">Change</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Edit"></label>
                        <div class="col-md-4">
                            <div class="input-group">

                                <input type="hidden" name="UserId" value="<?php echo $result['UserId']; ?>"/>

                            </div>
                        </div>
                    </div>

                    <?php

                    if (isset($_POST["Send"])) {
                        require 'dbconnect.php';
                        $email = $_SESSION['Email'];

                        $UserId = $_POST['UserId'];
                        $username = $_POST['username'];
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $dob = $_POST['dob'];
                        $gender = $_POST['gender'];
                        $state = $_POST['state'];
                        $country = $_POST['country'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $preferences = $_POST['Preferences'];

                        $query = "Update user Set Username= '$username', Firstname = '$firstname', 
					Lastname = '$lastname', Birthdate = '$dob',Gender = '$gender', State = '$state',
					Country = '$country', Phone = '$phone',Email = '$email',Preferences = '$preferences' 
					where  UserId = '$UserId'";


                        $stmt = $conn->prepare($query);
                        $stmt->execute();
                        //$result = $stmt->fetch(PDO::FETCH_ASSOC);
                        if ($stmt)
                            echo "<script>window.location = 'user.php';</script>";

                        else
                            echo "Die Kategorie wurde nicht ge&auml;ndert!<br />" . $stmt;


                    }


                    ?>


            </form>

        </div>
    </div>
</div>


<!-- jQuery Version 1.11.1 -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<?php
include 'footer.php';
?>
</body>

</html>
