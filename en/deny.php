<?php
	
	require 'dbconnect.php';

    $id=$_GET['id'];
    $sql2 = "update jointrip set status=1 WHERE JTripId = $id ";

    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();

if($stmt2)
    echo "<script>window.location = 'index.php';</script>";

else
    echo "Die Kategorie wurde nicht ge&auml;ndert!<br />" . $stmt2;



?>