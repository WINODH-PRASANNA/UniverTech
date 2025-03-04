<?php

    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $conn = new mysqli('localhost', 'root', '', 'univertech');
        $name = $_POST['name'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM admin WHERE name='$name'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($password === $user['password']) { 
                $_SESSION['name'] = $name;
                header('Location: salary_dashboard.php');
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
    <link rel="stylesheet" href="source/css/salary_login.css">
    <title>UNIVER TECH | MANAGE SALARY</title>
</head>
<body>
    
    <div class="container">

        <div class="left">
            <img src="source/imgs/salary.jpg">
        </div>

        <div class="right">
            <h1>institute of univer tech</h1>
            <h2>manage salary</h2>

            <form method="POST">
                <div class="input-group">
                    <label for="name">admin name</label>
                    <input type="text" name="name" placeholder="Admin Name" required  autocomplete="off">
                </div>

                <div class="input-group">
                    <label for="password">admin password</label>
                    <input type="password" name="password" placeholder="Admin Password" required  autocomplete="off">
                </div>

                <button type="submit" class="btn">Login</button>

                <div class="divider">
                    -------------------------------- or --------------------------------
                </div>

                <button type="submit" class="btn">
                    <a href="index.php">home</a>
                </button>
                <button type="button" class="btn">
                    <a href="sta_dashbord.php">dashboard</a>
                </button>

            </form>
        </div>

    </div>

</body>
</html>