<?php
		$hostname = "127.0.0.1";		
		$username = "root";		
		$password = "";	
		$dbname = "db_test_api";
		// Create connection
		$conn = mysqli_connect($hostname, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed !!!");
		} 
	?>