<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "univertech";

    $conn = new mysqli($servername, $username, $password, $database);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT COUNT(*) AS record_count FROM staffs";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h3>Staffs Total Records: " . $row['record_count'] . "</h3>";
    } else {
        echo "<h3>No records found.</h3>";
    }


    $sql = "SELECT COUNT(*) AS record_count FROM students";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h3>Students Total Records: " . $row['record_count'] . "</h3>";
    } else {
        echo "<h3>No records found.</h3>";
    }


    $sql = "SELECT COUNT(*) AS record_count FROM courses";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h3>Courses Total Records: " . $row['record_count'] . "</h3>";
    } else {
        echo "<h3>No records found.</h3>";
    }

    $conn->close();

?>
