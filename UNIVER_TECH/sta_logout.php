<?php
    session_start();
    session_unset();
    session_destroy();

    header("Location: sta_login.php");
    exit();
?>