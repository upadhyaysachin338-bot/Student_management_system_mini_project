<?php

session_start();

if (!isset($_SESSION['admin_id'])) {

    header("Location: /student_management/login.php");
    exit;
}

?>