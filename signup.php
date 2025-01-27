<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];  
        $password = $_POST['password'];  

        include('connect.php');  

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");

        if ($stmt === false) {
            echo "Error preparing statement: " . $conn->error;
            die();
        }

        $stmt->bind_param("ss", $username, $password);  

        if ($stmt->execute()) {
            echo "Jaunais lietotājs saglabats!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Aizpildiet abus ievades laukus.";
    }
}
?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Reģistrējies!</h2>
    <form action="signup.php" method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="password" name="password_repeat" placeholder="Repeat Password" required><br>
        <button type="submit">Reģistrēties</button>
    </form>

    <p>Jau esi lietotājs?</p>
    <form action="index.php" method="GET">
        <button type="submit">Pieslēgties</button>
    </form>
</div>

</body>
</html>
