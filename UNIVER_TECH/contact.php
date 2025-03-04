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
        $name = $_POST['name'];
        $emai = $_POST['emai'];
        $message = $_POST['message'];

        $sql = "INSERT INTO message (name, emai, message) VALUES ('$name', '$emai', '$message')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Message send successful...";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
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
    <link rel="stylesheet" href="source/css/contact.css">
    <title>UNIVER TECT | CONTACT</title>
</head>
<body>
    
    <div class="container">

        <div class="nav">
            <img src="source/imgs/logo.png" alt="">
            <div class="item">
                <li><a href="index.php">home</a></li>
                <li><a href="courses.php">courses</a></li>
                <li><a href="message.php">message</a></li>
                <li><a href="about.php">about</a></li>
                <li>contact us</li>
            </div>
        </div>

        <div class="text">
            <h1>institute of univer tech</h1>
            <h2>contact us</h2>
            <p>We'd love to hear from you! Whether you have questions, feedback, or inquiries about our programs, feel free to reach out. Our team is here to assist you and provide the information you need.</p>  
        </div> 

        <div class="message">
            <div class="left">
                <h2>contact method</h2>
                <div class="box">
                    <div class="sub">
                        <h1>address</h1>
                        <p>institute of univer tech,</p>
                        <p>colombo,</p>
                        <p>sri lanka.</p>
                    </div>
                    <div class="sub">
                        <h1>contact number</h1>
                        <p>011-9876543</p>
                    </div>
                    <div class="sub">
                        <h1>email</h1>
                        <p>univertech@gmail.com</p>
                    </div>
                </div>

            </div>
            <div class="right">
                <form action="" method="POST">
                    <h1>send email</h1>
                    <div class="input-grp">
                        <input type="text" name="name" id="name" placeholder="name" required>
                        <input type="email" name="emai" id="emai" placeholder="email" required>
                        <input type="text" name="message" id="message" placeholder="message" required>
                        <button type="submit" class="btn">send</button>
                    </div>
                </form>
            </div>

        </div>

        <footer>
            <p> © 2025 -  institute of univer tech </p>
        </footer>

    </div>

</body>
</html>