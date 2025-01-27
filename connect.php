<?php
$servername = "localhost";
$username = "root";
$password = "root";  
$dbname = "ipb23_t";  

// izveido connection
$conn = new mysqli($servername, $username, $password, $dbname);

// parbauda connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
