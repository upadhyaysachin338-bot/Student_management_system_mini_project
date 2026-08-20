<?php

require_once "config/auth.php";
require_once "config/database.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    header("Location: students.php");
    exit;
}

if (!isset($_POST['id'])) {

    header("Location: students.php");
    exit;
}

$id = (int) $_POST['id'];

$sql = "DELETE FROM students WHERE ID = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {

    header("Location: students.php?deleted=1");
    exit;

} else {

    echo "Error deleting student.";
}