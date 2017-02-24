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
            <form class="form-horizontal">
                <fieldset>

                    <!-- Form Name -->
                    <legend>User profile form requirement</legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="username">Username</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-male" style="font-size: 20px;"></i>
                                </div>
                                <input id="username" name="username" type="text" placeholder="Username"
                                       class="form-control input-md">
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Firstname">Firstname</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user">
                                    </i>
                                </div>
                                <input id="firstname" name="firstname)" type="text" placeholder="Firstaname"
                                       class="form-control input-md">
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Lastname">Lastname</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user">
                                    </i>
                                </div>
                                <input id="lastname)" name="lastname" type="text" placeholder="Lastname"
                                       class="form-control input-md">
                            </div>
                        </div>
                    </div>

                    <!-- File Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Upload photo">Upload photo</label>
                        <div class="col-md-4">
                            <input id="Upload photo" name="Upload photo" class="input-file" type="file">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Date Of Birth">Date Of Birth</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-birthday-cake"></i>
                                </div>
                                <input id="Date Of Birth" name="Date Of Birth" type="date" placeholder="Date Of Birth"
                                       class="form-control input-md">
                            </div>
                        </div>
                    </div>

                    <!-- Multiple Radios (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Gender">Gender</label>
                        <div class="col-md-4">
                            <label class="radio-inline" for="maleRadio">
                                <input name="gender" type="radio" id="maleRadio" value="Male">Male</label>

                            <label class="radio-inline" for="femaleRadio">
                                <input name="gender" type="radio" id="femaleRadio" value="Female">Female
                            </label>
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
                                <select style="color:black" name="from-state" id="countries_states"
                                        class="form-control bfh-countries" data-country="AL" data-flags="true"></select>
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
                                <select style="color:black" name="from-country" class="form-control bfh-states"
                                        data-country="countries_states"></select>
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Phone number ">Phone number </label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input style="color:black" name="phone" type="text" class="form-control bfh-phone"
                                       data-country="countries_states">
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Email Address">Email Address</label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <input id="Email Address" name="Email Address" type="text" placeholder="Email Address"
                                       class="form-control input-md">
                            </div>
                        </div>
                    </div>

                    <!-- Multiple Checkboxes -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Languages Known">Languages Known</label>
                        <div class="col-md-4">
                            <div class="checkbox">
                                <label for="Languages Known-0">
                                    <input type="checkbox" name="Languages Known" id="Languages Known-0" value="1">
                                    Nepali
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="Languages Known-1">
                                    <input type="checkbox" name="Languages Known" id="Languages Known-1" value="2">
                                    Newari
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="Languages Known-2">
                                    <input type="checkbox" name="Languages Known" id="Languages Known-2" value="3">
                                    English
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="Languages Known-3">
                                    <input type="checkbox" name="Languages Known" id="Languages Known-3" value="4">
                                    Hindi
                                </label>
                            </div>

                            <div class="othertop">
                                <label for="Languages Known-4">
                                </label>
                                <input type="input" name="LanguagesKnown" id="Languages Known-4"
                                       placeholder="Other Language">
                            </div>
                        </div>
                    </div>


                    <!-- Button-->
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span>
                                Submit</a>
                            <a href="#" class="btn btn-danger" value=""><span
                                        class="glyphicon glyphicon-remove-sign"></span> Clear</a>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="col-md-2 hidden-xs">
            <img src="http://websamplenow.com/30/userprofile/images/avatar.jpg" class="img-responsive img-thumbnail ">
        </div>
    </div>
</div>
<!-- jQuery Version 1.11.1 -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<?php include 'footer.php'; ?>
</body>

</html>
