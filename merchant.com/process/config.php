<?php

	session_start();
	
	$user = "root";//username
	$database = "escrowisfy";//database
	$password = "";//password
	$host = "localhost";//server

	$connection = new mysqli($host, $user, $password, $database);
	
	// Error handling
	if(mysqli_connect_error()) {
		trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(), E_USER_ERROR);
	}

	include_once 'orders.php';
	$order = new Orders($connection); 
?>