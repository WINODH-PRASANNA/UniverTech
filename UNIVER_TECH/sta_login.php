<?php

    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $conn = new mysqli('localhost', 'root', '', 'univertech');
        $sta_id = $_POST['sta_id'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM staffs WHERE sta_id='$sta_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($password === $user['password']) {
                $_SESSION['sta_id'] = $sta_id;
                header('Location: sta_dashbord.php');
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
    <title>UNIVER TECH | STAFF LOGIN</title>
</head>
<body>
    
    <div class="container">

        <div class="left">
            <img src="source/imgs/image.jpg" alt="Exam Illustration" class="illustration">
        </div>

        <div class="right">
            <h1>institute of univer tech</h1>
            <h2>login as staff</h2>

            <form method="POST">
                <div class="input-group">
                    <label for="stu_id">staff ID</label>
                    <input type="text" id="sta_id" name="sta_id" maxlength="8" placeholder="Ex - ' STA00000 '" required>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Your Password" required>
                </div>

                <button type="submit" class="btn">Log in</button>

                <div class="divider">-------------------------------- or --------------------------------</div>

                <button type="button" class="btn">
                    <a href="add/sta_reg.php">Create New Account</a>
                </button>
                <button type="button" class="btn">
                    <a href="index.php">Back to Home</a>
                </button>

            </form>
        </div>

    </div>

</body>
</html>