<?php

    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $conn = new mysqli('localhost', 'root', '', 'univertech');
        $stu_id = $_POST['stu_id'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM students WHERE stu_id='$stu_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($password === $user['password']) {
                $_SESSION['stu_id'] = $stu_id;
                header('Location: stu_dashboard.php');
            } else {
                echo "Invalid password!";
            }
        } else {
            echo "User not found!";
        }
        $conn->close();
    }
    
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="source/imgs/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="source/css/reset.css">
    <link rel="stylesheet" href="source/css/login.css">
    <title>UNIVER TECH | STUDENT LOGIN</title>
</head>
<body>
    
    <div class="container">

        <div class="left">
            <img src="source/imgs/image.jpg" alt="Exam Illustration" class="illustration">
        </div>

        <div class="right">
            <h1>institute of univer tech</h1>
            <h2>login as student</h2>

            <form method="POST">
                <div class="input-group">
                    <label for="stu_id">student ID</label>
                    <input type="text" id="stu_id" name="stu_id" maxlength="8" placeholder="Ex - ' STU00000 '" required>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Your Password" required>
                </div>

                <button type="submit" class="btn">Log in</button>

                <div class="divider">-------------------------------- or --------------------------------</div>

                <button type="button" class="btn">
                    <a href="add/stu_reg.php">Create New Account</a>
                </button>
                <button type="button" class="btn">
                    <a href="index.php">Back to Home</a>
                </button>

            </form>
        </div>

    </div>

</body>
</html>