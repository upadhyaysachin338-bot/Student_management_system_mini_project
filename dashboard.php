<?php

require_once "config/auth.php";
require_once "config/database.php";

$sql = "SELECT COUNT(*) AS total FROM students";

$result = mysqli_query($conn, $sql);

$data = mysqli_fetch_assoc($result);

$total_students = $data['total'];

$course_sql = "SELECT Course, COUNT(*) AS total
               FROM students
               GROUP BY Course";

$course_result = mysqli_query($conn, $course_sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container">

        <!-- Header -->
        <div class="header">

            <div>
                <h1>Student Management System</h1>

                <p>
                    Welcome,
                    <?php echo htmlspecialchars($_SESSION['username']); ?>
                </p>
            </div>

            <a href="logout.php" class="logout-btn">
                Logout
            </a>

        </div>


        <!-- Dashboard -->
        <h2>Dashboard</h2>

        <div class="stat-card">

            <h3>Total Students</h3>

            <p class="student-count">
                <?php echo $total_students; ?>
            </p>

        </div>


        <!-- Course Statistics -->
        <h2>Students by Course</h2>

<table class="course-table">
            <tr>
                <th>Course</th>
                <th>Total Students</th>
            </tr>

            <?php while ($course = mysqli_fetch_assoc($course_result)) { ?>

                <tr>

                    <td>
                        <?php echo htmlspecialchars($course['Course']); ?>
                    </td>

                    <td>
                        <?php echo $course['total']; ?>
                    </td>

                </tr>

            <?php } ?>

        </table>

        <!-- Management -->
        <h2>Management</h2>

        <div class="actions">

            <a href="students.php">View Students</a>
            <a href="add_student.php">Add Student</a>

        </div>

    </div>

</body>

</html>