<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the login info
    $username = $_POST['username']; 
    $password = $_POST['password'];  

    include('connect.php');

    // Fetch the stored user info
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    // Check if user exists
    if ($result->num_rows > 0) {
        // Fetch data
        $row = $result->fetch_assoc();
        
        // Compare passwords
        if ($password == $row['password']) {
            echo "Login successful!";
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No user found with that username.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pieslēgties</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Pieslēgties</h2>
    <form action="index.php" method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Pieslēgties</button>
    </form>

    <p>Nav konta?</p>
    <form action="signup.php" method="GET">
        <button type="submit">Reģistrēties</button>
    </form>
</div>

</body>
</html>
