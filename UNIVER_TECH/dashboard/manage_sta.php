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
        $sql = "SELECT * FROM staffs WHERE sta_id = '" . $conn->real_escape_string($searchQuery) . "'";
    } else {
        $sql = "SELECT * FROM staffs";
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
    <title>UNIVER TECH | MANAGE STAFFS</title>
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
            <h1>manage staffs</h1>
        </div>

        <div class="search">
            <a href="../add/sta_reg.php" class="add">
                <img src="../source/imgs/staff.png" alt="">
                <p>add staff</p>
            </a>
            <form method="GET" action="">
                <input type="search" name="search" placeholder="enter staff ID" autofocus maxlength="8" value="<?php echo htmlspecialchars($searchQuery); ?>">
                <button type="submit" class="btn">Search</button>
            </form>
        </div>

        <div class="table">
            <table>
                <tr>
                    <th>staff ID</th>
                    <th>staff name</th>
                    <th>email</th>
                    <th>gender</th>
                    <th>qualification</th>
                    <th>date of birth</th>
                    <th>age</th>
                    <th>salary</th>
                    <th>address</th>
                    <th>contact</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['sta_id'] . "</td>
                                <td>" . $row['sta_name'] . "</td>
                                <td>" . $row['email'] . "</td>
                                <td>" . $row['gender'] . "</td>
                                <td>" . $row['qulification'] . "</td>
                                <td>" . $row['dob'] . "</td>
                                <td>" . $row['age'] . "</td>
                                <td>" . $row['salary'] . "</td>
                                <td>" . $row['address'] . "</td>
                                <td>" . $row['contact'] . "</td>
                                <td><a href='edit_sta.php?id=" . $row['sta_id'] . "'>edit</a></td>
                                <td><a href='delete_sta.php?id=" . $row['sta_id'] . "'>delete</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No staff records found</td></tr>";
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
