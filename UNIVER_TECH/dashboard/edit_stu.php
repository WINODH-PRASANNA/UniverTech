<?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $conn = new mysqli("localhost", "root", "", "univertech");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $stu_name = $_POST['stu_name'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $dob = $_POST['dob'];
            $age = $_POST['age'];
            $address = $_POST['address'];
            $contact = $_POST['contact'];

            $updateSQL = "UPDATE students SET stu_name='$stu_name', email='$email', gender='$gender', dob='$dob', age='$age', address='$address', contact='$contact' WHERE stu_id='$id'";

            if ($conn->query($updateSQL) === TRUE) {
                echo "<script>alert('Updated Successfully...');</script>";
                header("Location: manage_stu.php");
                exit;
            } else {
                echo "<script>alert('Error: " . $sql . " \\n" . $conn->error . "');</script>";
            }
        }

        $sql = "SELECT * FROM students WHERE stu_id='$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "No student found";
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
    <title>UNIVER TECH | EDIT STUDENTS</title>
</head>
<body>
    <form method="POST" action="">
        <label>Staff Name:</label>
        <input type="text" name="stu_name" value="<?php echo $row['stu_name']; ?>" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
        <label>Gender:</label>
        <input type="text" name="gender" value="<?php echo $row['gender']; ?>" required><br>
        <label>Date of Birth:</label>
        <input type="date" name="dob" value="<?php echo $row['dob']; ?>" required><br>
        <label>Age:</label>
        <input type="number" name="age" value="<?php echo $row['age']; ?>" required><br>
        <label>Address:</label>
        <input type="text" name="address" value="<?php echo $row['address']; ?>" required><br>
        <label>Contact:</label>
        <input type="text" name="contact" value="<?php echo $row['contact']; ?>" required><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>