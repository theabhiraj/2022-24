<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dnLotterydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Hashed password
$hashedPassword = password_hash('admin', PASSWORD_BCRYPT);

// SQL query
$sql = "INSERT INTO admins (username, password) VALUES ('admin', '$hashedPassword')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
