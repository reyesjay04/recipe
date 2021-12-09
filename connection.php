<?php

define('DB_HOST', 'localhost'); 
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'recipes');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

function ConnectionArray() {
	return $dbDetails = array('host' => DB_HOST, 'user' => DB_USER, 'pass' => DB_PASSWORD, 'db' => DB_NAME);
}  

?>