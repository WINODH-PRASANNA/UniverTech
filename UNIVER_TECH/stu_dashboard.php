<?php

    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "univertech";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $studentDetails = [];

    if (isset($_SESSION['stu_id'])) {
        $stu_id = $_SESSION['stu_id'];

        $query = "SELECT * FROM students WHERE stu_id = '$stu_id'";
        $result = $conn->query($query);

        if ($result && $row = $result->fetch_assoc()) {
            $studentDetails = $row;
        } else {
            echo "No student record found for ID: $stu_id";
        }
    } else {
        echo "Session not set for student_id. Please log in again.";
    }

    $conn->close();
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="source/imgs/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="source/css/reset.css">
    <link rel="stylesheet" href="source/css/stu_dash.css">
    <title>UNIVER TECH | STUDENT DASHBOARD</title>
</head>
<body>
    
    <div class="container">

        <div class="nav">
            <div class="logo">
                <img src="source/imgs/logo.png" alt="">
            </div>
            <div class="items">
                <li><a href="index.php">home</a></li>
                <li><a href="stu_logout.php">logout</a></li>
            </div>
        </div>

        <div class="profile">
            <div class="left">
                <img src="source/imgs/auser.png" alt="">
            </div>
            <div class="right">
                <h1>institute of univer tech</h1>
                <h2>welcome, <span> <?= $studentDetails['stu_name'] ?? 'N/A'; ?> </span></h2>
                <div class="cont">
                    <p>contact - <span> <?= $studentDetails['contact'] ?? 'N/A'; ?> </span></p>
                    <p>email - <span> <?= $studentDetails['email'] ?? 'N/A'; ?> </span></p>
                </div>
                <h3>student ID - <span> <?= $studentDetails['stu_id'] ?? 'N/A'; ?> </span></h3>
            </div>
        </div>

    </div>

</body>
</html>