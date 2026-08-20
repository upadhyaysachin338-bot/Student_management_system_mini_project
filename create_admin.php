<?php

require_once "config/database.php";

$username = "admin";
$password = "admin123";

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO admins (username, password)
        VALUES (?, ?)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "ss",
    $username,
    $hashed_password
);

if (mysqli_stmt_execute($stmt)) {
    echo "Admin Created Successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}

?>