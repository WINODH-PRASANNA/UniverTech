<?php

    $conn = new mysqli("localhost", "root", "", "univertech");


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $searchQuery = "";
    if (isset($_GET['search'])) {
        $searchQuery = $_GET['search'];
    }

    if (!empty($searchQuery)) {
        $sql = "SELECT * FROM students WHERE stu_id = '" . $conn->real_escape_string($searchQuery) . "'";
    } else {
        $sql = "SELECT * FROM students";
    }
    $result = $conn->query($sql);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../source/imgs/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../source/css/reset.css">
    <link rel="stylesheet" href="../source/css/manage.css">
    <title>UNIVER TECH | MANAGE STUDENTS</title>
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
            <h1>manage students</h1>
        </div>

        <div class="search">
            <a href="../add/stu_reg.php" class="add">
                <img src="../source/imgs/student.png" alt="">
                <p>add student</p>
            </a>
            <form method="GET" action="">
                <input type="search" name="search" placeholder="enter staff ID" autofocus maxlength="8" value="<?php echo htmlspecialchars($searchQuery); ?>">
                <button type="submit" class="btn">Search</button>
            </form>
        </div>

        <div class="table">
            <table>
                <tr>
                    <th>student ID</th>
                    <th>student name</th>
                    <th>email</th>
                    <th>gender</th>
                    <th>date of birth</th>
                    <th>age</th>
                    <th>address</th>
                    <th>contact</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['stu_id'] . "</td>
                                <td>" . $row['stu_name'] . "</td>
                                <td>" . $row['email'] . "</td>
                                <td>" . $row['gender'] . "</td>
                                <td>" . $row['dob'] . "</td>
                                <td>" . $row['age'] . "</td>
                                <td>" . $row['address'] . "</td>
                                <td>" . $row['contact'] . "</td>
                                <td><a href='edit_stu.php?id=" . $row['stu_id'] . "'>edit</a></td>
                                <td><a href='delete_stu.php?id=" . $row['stu_id'] . "'>delete</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No student records found</td></tr>";
                }
                ?>
            </table>
        </div>

        <div class="final">
            <p> --------------------> © 2025 | Inftitute of Univer Tech <-------------------- </p>
        </div>

    </div>

</body>
</html>

<?php
    $conn->close();
?>