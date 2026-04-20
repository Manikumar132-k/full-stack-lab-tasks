<?php
$conn = new mysqli("localhost", "root", "Night@123", "test_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Login Successful!";
} else {
    echo "Invalid Username or Password!";
}

$conn->close();
?>