<?php
	
	$url = "dblib:host=172.16.8.8;dbname=sharearide";
	$usr = "sharearide";
	$pwd = "ShareARide";
	
	try {
		$dbh = new PDO($url, $usr, $pwd);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		
		} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
?>
