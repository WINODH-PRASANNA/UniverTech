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

    $totalStudents = 0;
    $totalStaff = 0;
    $totalCourses = 0;

    $result = $conn->query("SELECT COUNT(*) as count FROM students");
    if ($result && $row = $result->fetch_assoc()) {
        $totalStudents = $row['count'];
    }

    $result = $conn->query("SELECT COUNT(*) as count FROM staffs");
    if ($result && $row = $result->fetch_assoc()) {
        $totalStaff = $row['count'];
    }

    $result = $conn->query("SELECT COUNT(*) as count FROM courses");
    if ($result && $row = $result->fetch_assoc()) {
        $totalCourses = $row['count'];
    }

    $staffDetails = [];
    if (isset($_SESSION['sta_id'])) {
        $sta_id = $_SESSION['sta_id'];
        $result = $conn->query("SELECT * FROM staffs WHERE sta_id = '$sta_id'");
        if ($result && $row = $result->fetch_assoc()) {
            $staffDetails = $row;
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
    <link rel="stylesheet" href="source/css/reset.css">
    <link rel="stylesheet" href="source/css/sta_dash.css">
    <title>UNIVER TECH | STAFF DASHBOARD</title>
</head>
<body>
    
    <div class="container">

        <div class="nav">
            <div class="logo">
                <img src="source/imgs/logo.png" alt="">
            </div>
            <div class="items">
                <li><a href="index.php">home</a></li>
                <li><a href="dashboard/manage_stu.php">manage students</a></li>
                <li><a href="dashboard/manage_sta.php">manage staffs</a></li>
                <li><a href="dashboard/manage_c.php">manage courses</a></li>
                <li><a href="sta_logout.php">logout</a></li>
            </div>
        </div>

        <div class="head" id="head">
            <div class="text">
                <h1>institute of univer tech</h1>
                <h2>welcome back, &nbsp;&nbsp; <span> <?= $staffDetails['sta_id'] ?? 'N/A'; ?> </span></h2>
            </div>

            <div class="content">
                <div class="box">
                    <h1>total of staffs</h1>
                    <h2><?= $totalStaff; ?></h2>
                </div>
                <div class="box">
                    <h1>total of students</h1>
                    <h2><?= $totalStudents; ?></h2>
                </div>
                <div class="box">
                    <h1>total of courses</h1>
                    <h2><?= $totalCourses; ?></h2>
                </div>
            </div>

        </div>

        <div class="add">
            <div class="button">
                <a href="add/sta_reg.php">
                    <img src="source/imgs/staff.png">
                    <h2>add staff</h2>
                </a>
            </div>
            <div class="button">
                <a href="add/stu_reg.php">
                    <img src="source/imgs/student.png">
                    <h2>add student</h2>
                </a>
            </div>
            <div class="button">
                <a href="add/c_reg.php">
                    <img src="source/imgs/course.png">
                    <h2>add course</h2>
                </a>
            </div>
            <div class="button">
                <a href="salary_login.php">
                    <img src="source/imgs/money.png">
                    <h2>manage salary</h2>
                </a>
            </div>
        </div>


        <div class="about">
            <div class="profile">
                <img src="source/imgs/auser.png">
                <ul>
                    <li>name : <span> <?= $staffDetails['sta_name'] ?? 'N/A'; ?> </span></li>
                    <li>NIC number : <span> <?= $staffDetails['nic'] ?? 'N/A'; ?> </span></li>
                    <li>salary : <span> <?= $staffDetails['salary'] ?? 'N/A'; ?> </span></li>
                    <li>age : <span> <?= $staffDetails['age'] ?? 'N/A'; ?> </span></li>
                    <li>qulification : <span> <?= $staffDetails['qulification'] ?? 'N/A'; ?> </span></li>
                    <li>address : <span> <?= $staffDetails['address'] ?? 'N/A'; ?> </span></li>
                    <li>email : <span> <?= $staffDetails['email'] ?? 'N/A'; ?> </span></li>
                    <li>contact : <span> <?= $staffDetails['contact'] ?? 'N/A'; ?> </span></li>
                </ul>
            </div>
        </div>

        <div class="final">
            <p> --------------------> --------------------> --------------------> © institute of univer tech <-------------------- <-------------------- <-------------------- </p>
        </div>

    </div>

</body>
</html>