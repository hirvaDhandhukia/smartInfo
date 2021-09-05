<?php

// Database connection here
$dbServerName = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'smartinfo';

// this '$conn' is a variable that connects to database
$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

if(!$conn) {
	die('Error connecting to database' . mysqli_connect_error());
}