<?php

session_start();

require_once "config/database.php";

$error = "";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "s",
        $username
    );

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $admin = mysqli_fetch_assoc($result);

    if ($admin && password_verify($password, $admin['password'])) {

        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['username'] = $admin['username'];

        header("Location: dashboard.php");
        exit;

    } else {

        $error = "Invalid username or password";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="login-page">

    <div class="login-container">

        <h1>Admin Login</h1>

        <?php
        if ($error != "") {
            echo '<p class="login-error">' . htmlspecialchars($error) . '</p>';
        }
        ?>

        <form action="" method="POST" class="login-form">

       <div class="login-group">
    <label for="username">Username</label>

    <input type="text"
           name="username"
           id="username"
           required>
</div>

       <div class="login-group">
    <label for="password">Password</label>

    <input type="password"
           name="password"
           id="password"
           required>
</div>

        <button type="submit" name="login" class="login-btn">
    Login
</button>
    </form>
    </div>
</body>
</html>