<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee_db";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM employees";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Employees</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Employee ID</th>
            <th>Department</th>
            <th>Sex</th>
            <th>Marital Status</th>
            <th>Address</th>
            <th>Salary</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                      <td>{$row['id']}</td>
                      <td>{$row['name']}</td>
                      <td>{$row['employee_id']}</td>
                      <td>{$row['department']}</td>
                      <td>{$row['sex']}</td>
                      <td>{$row['marital_status']}</td>
                      <td>{$row['address']}</td>
                      <td>{$row['salary']}</td>
                      <td><a href='edit.php?id={$row['id']}'>Edit</a></td>
                      <td><a href='delete.php?id={$row['id']}'>Delete</a></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No records found</td></tr>";
        }
        ?>
    </table>
</body>

</html>
<?php
$conn->close();
?>