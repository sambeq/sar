<?php 
	session_start();
	
	$_SESSION =array();
	session_destroy();
    header("Location: index.php"); 
    die("Redirecting to: index.php");
?>