<?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $conn = new mysqli("localhost", "root", "", "univertech");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $salary = $_POST['salary'];

            $updateSQL = "UPDATE staffs SET salary='$salary' WHERE sta_id='$id'";

            if ($conn->query($updateSQL) === TRUE) {
                echo "Record updated successfully";
                header("Location: salary_dashboard.php");
                exit;
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }

        $sql = "SELECT * FROM staffs WHERE sta_id='$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "No staff found";
            exit;
        }
    } else {
        echo "No ID provided";
        exit;
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../source/imgs/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../source/css/reset.css">
    <link rel="stylesheet" href="source/css/manage_php.css">
    <title>UNIVER TECH | EDIT STUDENTS</title>
</head>
<body>
    <form method="POST" action="">
        <label>Staff Salary:</label>
        <input type="text" name="salary" value="<?php echo $row['salary']; ?>" placeholder="Rs 0.00" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>