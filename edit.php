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

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM employees WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found!";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $employee_id = $_POST['employee_id'];
    $department = $_POST['department'];
    $sex = $_POST['sex'];
    $marital_status = $_POST['marital_status'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];

    $sql = "UPDATE employees SET
            name='$name',
            employee_id='$employee_id',
            department='$department',
            sex='$sex',
            marital_status='$marital_status',
            address='$address',
            salary='$salary'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: view.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Employee</title>
</head>

<body>
    <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="name">Employee Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required><br>

        <label for="employee_id">Employee ID:</label>
        <input type="text" id="employee_id" name="employee_id" value="<?php echo $row['employee_id']; ?>" required><br>

        <label for="department">Department/Team:</label>
        <select id="department" name="department" required>
            <option value="HR" <?php if ($row['department'] == 'HR')
                echo 'selected'; ?>>HR</option>
            <option value="Finance" <?php if ($row['department'] == 'Finance')
                echo 'selected'; ?>>Finance</option>
            <option value="IT" <?php if ($row['department'] == 'IT')
                echo 'selected'; ?>>IT</option>
        </select><br>

        <label>Sex:</label>
        <input type="radio" id="male" name="sex" value="Male" <?php if ($row['sex'] == 'Male')
            echo 'checked'; ?>
            required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="sex" value="Female" <?php if ($row['sex'] == 'Female')
            echo 'checked'; ?>
            required>
        <label for="female">Female</label>
        <input type="radio" id="other" name="sex" value="Other" <?php if ($row['sex'] == 'Other')
            echo 'checked'; ?>
            required>
        <label for="other">Other</label><br>

        <label>Marital Status:</label>
        <input type="radio" id="single" name="marital_status" value="Single" <?php if ($row['marital_status'] == 'Single')
            echo 'checked'; ?> required>
        <label for="single">Single</label>
        <input type="radio" id="married" name="marital_status" value="Married" <?php if ($row['marital_status'] == 'Married')
            echo 'checked'; ?> required>
        <label for="married">Married</label>
        <input type="radio" id="divorced" name="marital_status" value="Divorced" <?php if ($row['marital_status'] == 'Divorced')
            echo 'checked'; ?> required>
        <label for="divorced">Divorced</label><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>"><br>

        <label for="salary">Salary:</label>
        <input type="text" id="salary" name="salary" value="<?php echo $row['salary']; ?>" required
            pattern="\d+(\.\d{1,2})?"><br>

        <button type="submit">Update</button>
        <button type="button" onclick="window.location.href='view.php';">Cancel</button>
    </form>
</body>

</html>