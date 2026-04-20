<?php
$conn = new mysqli("localhost", "root", "Night@123", "student_db");

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$department = $_POST['department'];
$phone = $_POST['phone'];

$sql = "INSERT INTO students (name, email, dob, department, phone)
        VALUES ('$name', '$email', '$dob', '$department', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "<h3>✅ Registration Successful</h3>";
    echo "<a href='index.html'>Go Back</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>