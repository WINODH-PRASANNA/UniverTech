<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="source/imgs/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="source/css/reset.css">
    <link rel="stylesheet" href="source/css/mess.css">
    <title>UNIVER TECH | MESSAGES</title>
</head>
<body>
    
    <div class="container">

        <div class="nav">
            <img src="source/imgs/logo.png" alt="">
            <div class="item">
                <li><a href="index.php">home</a></li>
                <li><a href="courses.php">courses</a></li>
                <li>message</li>
                <li><a href="about.php">about</a></li>
                <li><a href="contact.php">contact us</a></li>
            </div>
        </div>

        <div class="head">
            <h1>institute of univer tech</h1>
            <h2>messages</h2>
        </div>

        <div class="body">
            <?php

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "univertech";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT name, emai, message FROM message";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="box">';
                        echo '<h2>name <span>' . htmlspecialchars($row['name']) . '</span></h2>';
                        echo '<h2>email <span>' . htmlspecialchars($row['emai']) . '</span></h2>';
                        echo '<div class="mess">';
                        echo '<h2>message</h2>';
                        echo '<p>' . nl2br(htmlspecialchars($row['message'])) . '</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No messages found.</p>';
                }

                $conn->close();

            ?>
        </div>

    </div>

</body>
</html>
