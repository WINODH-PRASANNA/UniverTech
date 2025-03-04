<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "univertech";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $stu_id = $_POST['stu_id'];
        $stu_name = $_POST['stu_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $course = $_POST['course'];
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        $age = $_POST['age'];
        $contact = $_POST['contact'];

        $sql = "INSERT INTO students (stu_id, stu_name, email, password, gender, course, address, dob, age, contact) VALUES ('$stu_id', '$stu_name', '$email', '$password', '$gender', '$course', '$address', '$dob', '$age', '$contact')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Added Successful...');</script>";
        } else {
            echo "<script>alert('Error: " . $sql . " \\n" . $conn->error . "');</script>";
        }
    }

    $courses = [];
    $sql = "SELECT c_name FROM courses";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $courses[] = $row['c_name'];
        }
    }

    $conn->close();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="source/imgs/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../source/css/reset.css">
    <link rel="stylesheet" href="../source/css/login.css">
    <link rel="stylesheet" href="../source/css/login_reset.css">
    <title>UNIVER TECH | STUDENT REGISTER</title>
</head>
<body>
    
    <div class="container">

        <div class="left">
            <img src="../source/imgs/image.jpg" alt="Exam Illustration" class="illustration">
        </div>

        <div class="right">
            <h1>institute of univer tech</h1>
            <h2>new student register</h2>

            <form method="POST">
                <div class="input-group">
                    <label for="stu_id">student ID</label>
                    <input type="text" id="stu_id" name="stu_id" maxlength="8" placeholder="Ex - ' STU00000 '" required>
                </div>

                <div class="input-group">
                    <label for="stu_name">student name</label>
                    <input type="text" name="stu_name" placeholder="student full name" required>
                </div>

                <div class="input-group">
                    <label for="email">email address</label>
                    <input type="text" name="email" class="email" placeholder="correct email address" required>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Your Password" required>
                </div>

                <div class="input-group">
                    <label for="gender">gender</label>
                    <select name="gender" id="">
                        <option value="">select your gender</option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </select>
                </div>

                <div class="input-group">
                    <label for="course">course</label>
                    <select name="course" id="">
                        <option value="">select your course</option>
                        <?php foreach ($courses as $course): ?>
                            <option value="<?= htmlspecialchars($course) ?>"><?= htmlspecialchars($course) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="input-group">
                    <label for="address">address</label>
                    <input type="text" name="address" placeholder="home address" required>
                </div>

                <div class="input-group">
                    <label for="dob">date of birth</label>
                    <input type="date" name="dob" placeholder="date of birth" required>
                </div>

                <div class="input-group">
                    <label for="age">age</label>
                    <input type="number" name="age" placeholder="age" required>
                </div>

                <div class="input-group">
                    <label for="contact">contact number</label>
                    <input type="number" name="contact" placeholder="working mobile number" required>
                </div>

                <button type="submit" class="btn">Register</button>

                <div class="divider">-------------------------------- or --------------------------------</div>

                <button type="button" class="btn">
                    <a href="../stu_login.php">Login Now</a>
                </button>
                <button type="button" class="btn">
                    <a href="../index.php">Back to Home</a>
                </button>

            </form>
        </div>

    </div>

</body>
</html>
