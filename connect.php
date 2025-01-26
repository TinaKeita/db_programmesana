<?php
$servername = "localhost";  
$username = "root";         
$password = " ";             
$dbname = "ipb23_t";  

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the HTML form
$user = $_POST['username'];
$pass = $_POST['password'];

// Query the database (example: checking if user exists)
$sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
$result = $conn->query($sql);

// Check if a user is found
if ($result->num_rows > 0) {
    echo "Tev izdevās!";
} else {
    echo "Nepareizs username vai password.";
}

// Close the connection
$conn->close();
?>
