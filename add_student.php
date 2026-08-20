<?php

require_once "config/auth.php";
require_once "config/database.php";

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $semester = $_POST['semester'];

    $sql = "INSERT INTO students
            (Name, Email, Phone, dob, Course, Semester, gender)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "sssssis",
        $name,
        $email,
        $phone,
        $dob,
        $course,
        $semester,
        $gender
    );

    if (mysqli_stmt_execute($stmt)) {

        header("Location: add_student.php?success=1");
        exit;
    } else {

        $error = "Failed to add student.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="form-container">

        <div class="form-header">
            <div>
                <h1>Add Student</h1>
                <p>Enter the student's personal and academic details.</p>
            </div>

            <a href="students.php" class="back-btn">Back to Students</a>
        </div>

        <?php if (isset($_GET['success'])) { ?>

            <div class="success-message">
                Student added successfully!
            </div>

        <?php } ?>

        <?php if (isset($error)) { ?>

            <div class="error-message">
                <?php echo htmlspecialchars($error); ?>
            </div>

        <?php } ?>

        <form action="" method="post" class="student-form">
            <div class="form-group">
                <label for="name">Enter your name</label>
                <input type="text" name="name" id="name" placeholder="Enter your name" required>
            </div>

            <div class="form-group">
                <label for="email">Enter email</label>
                <input type="email" name="email" id="email" placeholder="abc@gmail.com" required>
            </div>

            <div class="form-group">
                <label for="phone">Enter Phone No.</label>
                <input type="tel" name="phone" id="phone" placeholder="Enter phone number" maxlength="10" pattern="[0-9]{10}" required>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="dob" required>
            </div>

            <div class="form-group radio-group">
                <label>Select your Gender</label>

                <input type="radio" name="gender" id="male" value="Male" required>
                <label for="male">Male</label>

                <input type="radio" name="gender" id="female" value="Female">
                <label for="female">Female</label>

                <input type="radio" name="gender" id="other" value="Other">
                <label for="other">Other</label>
            </div>

            <div class="form-group">
                <label for="course">Course:</label>
                <select name="course" id="course" required>
                    <option value="">Select your course</option>
                    <option value="CSE">BTech CSE</option>
                    <option value="Mechanical">BTech Mechanical</option>
                    <option value="Electrical">BTech Electrical</option>
                    <option value="Civil">BTech Civil</option>
                    <option value="BSc">Bachelor of Science (B. Sc.)</option>
                    <option value="Pharmacy">B. Pharmacy</option>
                    <option value="BALLB">BALLB</option>
                    <option value="B.ComLLB">B.ComLLB</option>
                    <option value="BBALLB">BBALLB</option>
                </select>
            </div>

            <div class="form-group">

                <label for="semester">Semester</label>
                <input type="number" name="semester" id="semester" min="1" max="10" placeholder="Enter semester" required>

            </div>


            <button type="submit" name="submit" class="submit-btn">
                Add Student
            </button>
        </form>
    </div>
</body>

</html>