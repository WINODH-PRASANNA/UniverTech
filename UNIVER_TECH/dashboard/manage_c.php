<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "univertech";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $searchQuery = '';
    if (isset($_GET['course_id']) && !empty($_GET['course_id'])) {
        $course_id = $conn->real_escape_string($_GET['course_id']);
        $searchQuery = "WHERE c_id LIKE '%$course_id%'";
    }

    $query = "SELECT * FROM courses $searchQuery";
    $result = $conn->query($query);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../source/imgs/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../source/css/reset.css">
    <link rel="stylesheet" href="../source/css/manage.css">
    <title>UNIVER TECH | MANAGE COURSES</title>
</head>
<body>
    
    <div class="container">

        <div class="navbar">
            <div class="left">
                <h1>univer tech</h1>
            </div>
            <div class="right">
                <a href="../index.php" class="btn">home</a>
                <a href="../sta_dashbord.php" class="btn">dashboard</a>
                <a href="../sta_logout.php" class="btn">logout</a>
            </div>
        </div>

        <div class="header">
            <h1>manage courses</h1>
        </div>

        <div class="search">
            <a href="../add/c_reg.php" class="add">
                <img src="../source/imgs/course.png" alt="">
                <p>add course</p>
            </a>
            <form action="" method="GET">
                <input type="search" name="course_id" id="course_id" placeholder="enter course ID" value="<?php echo isset($_GET['course_id']) ? $_GET['course_id'] : ''; ?>" maxlength="6">
                <button type="submit" class="icon_btn btn">search</button>
            </form>
        </div>

        <div class="table c_table">
            <table>
                <tr>
                    <th>course ID</th>
                    <th>course name</th>
                    <th>duration</th>
                    <th>modules</th>
                    <th>fee</th>
                    <th>certificate</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>{$row['c_id']}</td>
                                <td>{$row['c_name']}</td>
                                <td>{$row['duration']}</td>
                                <td>{$row['module']}</td>
                                <td>{$row['fee']}</td>
                                <td>{$row['certificate']}</td>
                                <td><a href='edit_c.php?id=" . $row['c_id'] . "'>edit</a></td>
                                <td><a href='delete_c.php?id=" . $row['c_id'] . "'>delete</a></td>
                            </tr>
                            ";
                        }
                    } else {
                        echo "
                        <tr>
                            <td colspan='8' style='text-align: center;'>No courses found.</td>
                        </tr>
                        ";
                    }
                ?>
            </table>
        </div>

        <div class="final">
            <p> --------------------> © 2025 | Inftitute of Univer Tech <-------------------- </p>
        </div>

    </div>

    <?php
        $conn->close();
    ?>

</body>
</html>
