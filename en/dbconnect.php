	<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "sharearide";

		try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				echo "connected";
			}
		catch(PDOException $e)
			{
				die("OOPs something went wrong");
			}


?>
