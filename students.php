<?php

require_once "config/auth.php";
require_once "config/database.php";

if (isset($_GET['search']) && $_GET['search'] != '') {

    $search = "%" . $_GET['search'] . "%";

    $sql = "SELECT * FROM students
            WHERE Name LIKE ?
            OR Email LIKE ?
            OR Course LIKE ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "sss",
        $search,
        $search,
        $search
    );

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
} else {

    $sql = "SELECT * FROM students";

    $result = mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
    <div class="header">

    <div>
        <h1>Student List</h1>

        <p>
            Welcome,
            <?php echo htmlspecialchars($_SESSION['username']); ?>
        </p>
    </div>

    <div class="header-actions">
        <a href="dashboard.php" class="dashboard-btn">Dashboard</a>

        <a href="add_student.php" class="add-btn">Add Student</a>

        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

</div>

<?php if (isset($_GET['deleted'])) { ?>

    <div class="success-message">
        Student deleted successfully!
    </div>

<?php } ?>

<form action="" method="GET" class="search-form">

        <input type="text" name="search" placeholder="Search by name, email or course" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        
        <button type="submit">Search</button>

<a href="students.php" class="show-all-btn">Show All</a>
    </form>



    <table class="student-table">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date of Birth</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Gender</th>
            <th>Action</th>
        </tr>

        <?php while ($student = mysqli_fetch_assoc($result)) { ?>

            <tr>
                <td><?php echo $student['ID']; ?></td>
                <td><?php echo $student['Name']; ?></td>
                <td><?php echo $student['Email']; ?></td>
                <td><?php echo $student['Phone']; ?></td>
                <td><?php echo $student['dob']; ?></td>
                <td><?php echo $student['Course']; ?></td>
                <td><?php echo $student['Semester']; ?></td>
                <td><?php echo $student['gender']; ?></td>
                <td class="action-cell">

    <a class="edit-btn"
       href="edit_student.php?id=<?php echo $student['ID']; ?>">
        Edit
    </a>

    <form action="delete_student.php"
      method="POST"
      class="delete-form"
      onsubmit="return confirm('Are you sure you want to delete this student?');">

    <input type="hidden"
           name="id"
           value="<?php echo $student['ID']; ?>">

    <button type="submit" class="delete-btn">
        Delete
    </button>

</form>

</td>
            </tr>

        <?php } ?>

    </table>
</div>
</body>

</html>