<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "univertech";

        $conn = new mysqli($servername, $username, $password);

        if ($conn->connect_error) {
            die("<script>alert('Connection failed: " . $conn->connect_error . "');</script>");
        }

        $sql = "
            CREATE DATABASE IF NOT EXISTS univertech;
            USE univertech;

            CREATE TABLE IF NOT EXISTS admin(
                id INT(10) AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255),
                password VARCHAR(255)
            );

            INSERT INTO admin (id, name, password) VALUES 
                (1, 'admin', 'admin');

            CREATE TABLE IF NOT EXISTS message(
                id INT(10) AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255),
                emai VARCHAR(255),
                message VARCHAR(255)
            );

            CREATE TABLE IF NOT EXISTS courses(
                id INT(10) AUTO_INCREMENT PRIMARY KEY,
                c_id VARCHAR(255) UNIQUE,
                c_name VARCHAR(255),
                duration VARCHAR(255),
                module VARCHAR(255),
                fee VARCHAR(255),
                certificate VARCHAR(255)
            );

            INSERT INTO courses (id, c_id, c_name, duration, module, fee, certificate) VALUES 
                (1, 'C00001', 'Computer Science', '1 year', 5, 'Rs 50,000.00', 'yes'),
                (2, 'C00002', 'Information Technology', '6 month', 0, 'Rs 25,000.00', 'yes'),
                (3, 'C00003', 'Cybersecurity', '1 year', 7, 'Rs 100,000.00', 'yes'),
                (4, 'C00004', 'Software Engineering', '3 year', 8, 'Rs 300,000.00', 'yes'),
                (5, 'C00005', 'Data Science', '2 year', 11, 'Rs 120,000.00', 'yes');

            CREATE TABLE IF NOT EXISTS staffs(
                id INT(10) AUTO_INCREMENT PRIMARY KEY,
                sta_id VARCHAR(255) UNIQUE,
                sta_name VARCHAR(255),
                email VARCHAR(255),
                password VARCHAR(255),
                gender VARCHAR(255),
                course VARCHAR(255),
                salary VARCHAR(255),
                address VARCHAR(255),
                dob DATE,
                age VARCHAR(255),
                qualification VARCHAR(255),
                contact VARCHAR(255)
            );

            CREATE TABLE IF NOT EXISTS students(
                id INT(10) AUTO_INCREMENT PRIMARY KEY,
                stu_id VARCHAR(255) UNIQUE,
                stu_name VARCHAR(255),
                email VARCHAR(255),
                password VARCHAR(255),
                gender VARCHAR(255),
                course VARCHAR(255),
                address VARCHAR(255),
                dob DATE,
                age VARCHAR(255),
                contact VARCHAR(255)
            );
        ";

        if ($conn->multi_query($sql)) {
            echo "<script>
                    alert('Database and tables imported successfully into localhost!');
                    window.history.back();
                </script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }

        $conn->close();
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="UNIVER_TECH/source/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="source/style.css">
    <title>UNIVER TECH</title>
</head>
<body>
    
    <div class="container">

        <div class="head">
            <h1>welcome to our institute</h1>
            <h2> univer tech</h2>
        </div>

        <div class="body">
            <div class="db">
                <p>click <span> import </span> button to import the database in your localhost server</p>
                <form method="post">
                    <button type="submit">Import Database</button>
                </form>
            </div>
            <div class="pro">
                <p>click <span> continue </span> button to view project</p>
                <form action="" method="">
                    <a href="UNIVER_TECH/index.php">continue</a>
                </form>
            </div>
        </div>

    </div>

</body>
</html>