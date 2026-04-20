<?php
$conn = new mysqli("localhost", "root", "Night@123", "student_db");

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM students";
$result = $conn->query($sql);

echo "<h2>Student Records</h2>";
echo "<table border='1' cellpadding='10'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>DOB</th>
<th>Department</th>
<th>Phone</th>
</tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["id"]."</td>
        <td>".$row["name"]."</td>
        <td>".$row["email"]."</td>
        <td>".$row["dob"]."</td>
        <td>".$row["department"]."</td>
        <td>".$row["phone"]."</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No records found</td></tr>";
}

echo "</table>";
echo "<br><a href='index.html'>Back to Registration</a>";

$conn->close();
?>