<?php
$conn = new mysqli("localhost", "root", "Night@123", "student_db");

$dept = "";
$sort = "";

if(isset($_GET['department'])) {
    $dept = $_GET['department'];
}

if(isset($_GET['sort'])) {
    $sort = $_GET['sort'];
}

$sql = "SELECT * FROM students WHERE 1";

if($dept != "") {
    $sql .= " AND department='$dept'";
}

if($sort == "name") {
    $sql .= " ORDER BY name ASC";
}
elseif($sort == "dob") {
    $sql .= " ORDER BY dob ASC";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body { font-family: Arial; }
        table { border-collapse: collapse; width: 80%; margin: auto; }
        th, td { padding: 10px; border: 1px solid black; text-align: center; }
        .controls { text-align: center; margin: 20px; }
    </style>
</head>
<body>

<h2 align="center">Student Dashboard</h2>

<div class="controls">
    <form method="get">
        Filter by Department:
        <select name="department">
            <option value="">All</option>
            <option>CSE</option>
            <option>ECE</option>
            <option>EEE</option>
            <option>IT</option>
        </select>

        Sort by:
        <select name="sort">
            <option value="">None</option>
            <option value="name">Name</option>
            <option value="dob">Date of Birth</option>
        </select>

        <button type="submit">Apply</button>
    </form>
</div>

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>DOB</th>
<th>Department</th>
<th>Phone</th>
</tr>

<?php
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
?>

</table>

<br><br>

<?php
// Count per department
$count_sql = "SELECT department, COUNT(*) as total FROM students GROUP BY department";
$count_result = $conn->query($count_sql);

echo "<h3 align='center'>Students per Department</h3>";
echo "<table align='center'>
<tr><th>Department</th><th>Total Students</th></tr>";

while($row = $count_result->fetch_assoc()) {
    echo "<tr>
    <td>".$row["department"]."</td>
    <td>".$row["total"]."</td>
    </tr>";
}

echo "</table>";

$conn->close();
?>

</body>
</html>