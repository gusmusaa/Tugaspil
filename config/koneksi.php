<?php
$servername = "localhost";
$username = "root";
$password = "";
$db		  = "bukutamu";	
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>