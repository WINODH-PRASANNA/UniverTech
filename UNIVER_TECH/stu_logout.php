<?php
    session_start();
    session_unset();
    session_destroy();

    header("Location: stu_login.php");
    exit();
?>