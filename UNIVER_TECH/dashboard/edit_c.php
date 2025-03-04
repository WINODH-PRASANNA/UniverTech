<?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $conn = new mysqli("localhost", "root", "", "univertech");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $c_name = $_POST['c_name'];
            $duration = $_POST['duration'];
            $module = $_POST['module'];
            $fee = $_POST['fee'];
            $certificate = $_POST['certificate'];
            $address = $_POST['address'];
            $contact = $_POST['contact'];

            $updateSQL = "UPDATE courses SET c_name='$c_name', duration='$duration', module='$module', fee='$fee', certificate='$certificate' WHERE c_id='$id'";

            if ($conn->query($updateSQL) === TRUE) {
                echo "<script>alert('Updated Successfully...');</script>";
                header("Location: manage_c.php");
                exit;
            } else {
                echo "<script>alert('Error: " . $sql . " \\n" . $conn->error . "');</script>";
            }
        }

        $sql = "SELECT * FROM courses WHERE c_id='$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "No course found";
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
    <link rel="stylesheet" href="../source/css/manage_php.css">
    <title>UNIVER TECH | EDIT COURSES</title>
</head>
<body>
    <form method="POST" action="">
        <label>Staff Name:</label>
        <input type="text" name="c_name" value="<?php echo $row['c_name']; ?>" required><br>
        <label>Duration:</label>
        <input type="text" name="duration" value="<?php echo $row['duration']; ?>" required><br>
        <label>Modules:</label>
        <input type="text" name="module" value="<?php echo $row['module']; ?>" required><br>
        <label>Fee:</label>
        <input type="text" name="fee" value="<?php echo $row['fee']; ?>" required><br>
        <label>Certificate:</label>
        <input type="text" name="certificate" value="<?php echo $row['certificate']; ?>" required><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>