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
        $sta_id = $_POST['sta_id'];
        $sta_name = $_POST['sta_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $course = $_POST['course'];
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        $age = $_POST['age'];
        $qulification = $_POST['qulification'];
        $contact = $_POST['contact'];

        $sql = "INSERT INTO staffs (sta_id, sta_name, email, password, gender, course, address, dob, age, qulification, contact) 
                VALUES ('$sta_id', '$sta_name', '$email', '$password', '$gender', '$course', '$address', '$dob', '$age', '$qulification', '$contact')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Added Successful...');</script>";
        } else {
            echo "<script>alert('Error: " . $sql . " \\n" . $conn->error . "');</script>";
        }
    }

    $courses = [];
    $sql_courses = "SELECT c_name FROM courses";
    $result = $conn->query($sql_courses);

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
    <title>UNIVER TECH | STAFF REGISTER</title>
</head>
<body>
    
    <div class="container">

        <div class="left">
            <img src="../source/imgs/image.jpg" alt="Exam Illustration" class="illustration">
        </div>

        <div class="right">
            <h1>institute of univer tech</h1>
            <h2>new staff register</h2>

            <form method="POST">
                <div class="input-group">
                    <label for="sta_id">staff ID</label>
                    <input type="text" name="sta_id" maxlength="8" placeholder="Ex - ' STA00000 '" required>
                </div>

                <div class="input-group">
                    <label for="sta_name">staff name</label>
                    <input type="text" name="sta_name" placeholder="staff full name" required>
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
                    <select name="course" id="" required>
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
                    <label for="qulification">qualification</label>
                    <select name="qulification" id="" required>
                        <option value="">select minimum qualification</option>
                        <option value="High School">High School</option>
                        <option value="Bachelor's">Bachelor's</option>
                        <option value="Master's">Master's</option>
                        <option value="PhD">PhD</option>
                    </select>
                </div>

                <div class="input-group">
                    <label for="contact">contact number</label>
                    <input type="number" name="contact" placeholder="working mobile number" required>
                </div>

                <button type="submit" class="btn">Register</button>

                <div class="divider">-------------------------------- or --------------------------------</div>

                <button type="button" class="btn">
                    <a href="../sta_login.php">Login Now</a>
                </button>
                <button type="button" class="btn">
                    <a href="../index.php">Back to Home</a>
                </button>

            </form>
        </div>

    </div>

</body>
</html>
