<?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $conn = new mysqli("localhost", "root", "", "univertech");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "DELETE FROM courses WHERE c_id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Deleted Successfully...');</script>";
            header("Location: manage_c.php");
            exit;
        } else {
            echo "<script>alert('Error deleting record: " . $sql . " \\n" . $conn->error . "');</script>";
        }

        $conn->close();
    } else {
        echo "No ID provided";
    }

?>