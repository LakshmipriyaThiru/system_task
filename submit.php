<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $employee_id = $_POST['employee_id'];
    $department = $_POST['department'];
    $sex = $_POST['sex'];
    $marital_status = $_POST['marital_status'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO employees (name, employee_id, department, sex, marital_status, address, salary)
            VALUES ('$name', '$employee_id', '$department', '$sex', '$marital_status', '$address', '$salary')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>