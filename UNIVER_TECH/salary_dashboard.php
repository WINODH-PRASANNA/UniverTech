<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="source/imgs/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="source/css/salary_dashboard.css">
    <title>UNIVER TECH | SALARY DASHBOARD</title>
</head>
<body>
    <div class="container">
        <div class="nav">
            <h1>univer tech</h1>
            <div class="items">
                <li><a href="index.php">home</a></li>
                <li><a href="sta_dashbord.php">dashboard</a></li>
                <li><a href="salary_logout.php">logout</a></li>
            </div>
        </div>

        <div class="head">
            <div class="top">
                <img src="source/imgs/money.png" alt="">
                <h1>manage staffs salary</h1>
            </div>
            <div class="buttom">
                <p>[ this page only for admin... ]</p>
            </div>
        </div>

        <div class="table">
            <h2>our staff list</h2>
            <table>
                <tr>
                    <th>staff ID</th>
                    <th>staff name</th>
                    <th>salary</th>
                    <th>update</th>
                </tr>
                <?php

                    $conn = new mysqli('localhost', 'root', '', 'univertech');

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT sta_id, sta_name, salary FROM staffs";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row['sta_id'] . "</td>
                                    <td>" . $row['sta_name'] . "</td>
                                    <td>" . $row['salary'] . "</td>
                                    <td><a href='update_salary.php?id=" . $row['sta_id'] . "'>update</a></td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No staff found</td></tr>";
                    }

                    $conn->close();

                ?>
            </table>
        </div>
    </div>
</body>
</html>
