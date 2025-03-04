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
        $c_id = $_POST['c_id'];
        $c_name = $_POST['c_name'];
        $duration = $_POST['duration'];
        $module = $_POST['module'];
        $fee = $_POST['fee'];
        $certificate = $_POST['certificate'];

        $sql = "INSERT INTO courses (c_id, c_name, duration, module, fee, certificate) VALUES ('$c_id', '$c_name', '$duration', '$module', '$fee', '$certificate')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Added Successful...');</script>";
        } else {
            echo "<script>alert('Error: " . $sql . " \\n" . $conn->error . "');</script>";
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
    <title>UNIVER TECH | NEW COURSE</title>
</head>
<body>
    
    <div class="container">

        <div class="left">
            <img src="../source/imgs/image.jpg" alt="Exam Illustration" class="illustration">
        </div>

        <div class="right">
            <h1>institute of univer tech</h1>
            <h2>add new course</h2>

            <form method="POST">
                <div class="input-group">
                    <label for="c_id">course ID</label>
                    <input type="text" name="c_id" maxlength="6" placeholder="Ex - ' C00000 '" required>
                </div>

                <div class="input-group">
                    <label for="c_name">course name</label>
                    <input type="text" name="c_name" placeholder="course name" required>
                </div>

                <div class="input-group">
                    <label for="duration">duration</label>
                    <select name="duration" id="">
                        <option value="">select duration</option>
                        <option value="6 month">6 month</option>
                        <option value="1 year">1 year</option>
                        <option value="2 year">2 year</option>
                        <option value="3 year">3 year</option>
                    </select>
                </div>

                <div class="input-group">
                    <label for="module">modules </label>
                    <input type="number" name="module" placeholder="total modules" required>
                </div>

                <div class="input-group">
                    <label for="fee">fee</label>
                    <input type="text" name="fee" placeholder="course fee ( Ex - ' Rs 0.00 ' )" required>
                </div>

                <div class="input-group">
                    <label for="certificate">certificate</label>
                    <select name="certificate" id="">
                        <option value="">compleated certificate</option>
                        <option value="yes">yes</option>
                        <option value="no">no</option>
                    </select>
                </div>

                <button type="submit" class="btn">add course</button>

                <div class="divider">-------------------------------- or --------------------------------</div>

                <button type="button" class="btn">
                    <a href="../sta_dashbord.php">dashboard</a>
                </button>

            </form>
        </div>

    </div>

</body>
</html>