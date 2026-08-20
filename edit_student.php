<?php

require_once "config/auth.php";
require_once "config/database.php";

if (!isset($_GET['id'])) {
    header("Location: students.php");
    exit;
}

$id = (int) $_GET['id'];

$sql = "SELECT * FROM students WHERE ID = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$student = mysqli_fetch_assoc($result);

if (!$student) {
    header("Location: students.php");
    exit;
}

if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $semester = $_POST['semester'];

    $sql = "UPDATE students
            SET Name = ?,
                Email = ?,
                Phone = ?,
                dob = ?,
                Course = ?,
                Semester = ?,
                gender = ?
            WHERE ID = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "sssssisi",
        $name,
        $email,
        $phone,
        $dob,
        $course,
        $semester,
        $gender,
        $id
    );

    if (mysqli_stmt_execute($stmt)) {

        header("Location: students.php");
        exit;
    } else {

        echo "Error updating student: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="form-container">

        <div class="form-header">

            <div>
                <h1>Edit Student</h1>
                <p>Update the student's information.</p>
            </div>

            <a href="students.php" class="back-btn">
                Back to Students
            </a>

        </div>

        <form action="" method="POST" class="student-form">

            <div class="form-group">

                <label for="name">Student Name</label>

                <input type="text"
                    name="name"
                    id="name"
                    value="<?php echo htmlspecialchars($student['Name']); ?>"
                    required>

            </div>



            <div class="form-group">

                <label for="email">Email</label>

                <input type="email"
                    name="email"
                    id="email"
                    value="<?php echo htmlspecialchars($student['Email']); ?>"
                    required>

            </div>


            <div class="form-group">

                <label for="phone">Phone Number</label>

                <input type="tel"
                    name="phone"
                    id="phone"
                    value="<?php echo htmlspecialchars($student['Phone']); ?>"
                    maxlength="10"
                    pattern="[0-9]{10}"
                    required>

            </div>



            <div class="form-group">

                <label for="dob">Date of Birth</label>

                <input type="date"
                    name="dob"
                    id="dob"
                    value="<?php echo htmlspecialchars($student['dob']); ?>"
                    required>

            </div>



            <div class="form-group">

                <label>Gender</label>

                <div class="radio-group">

                    <label>
                        <input type="radio"
                            name="gender"
                            value="Male"
                            <?php if ($student['gender'] == 'Male') echo 'checked'; ?>>
                        Male
                    </label>

                    <label>
                        <input type="radio"
                            name="gender"
                            value="Female"
                            <?php if ($student['gender'] == 'Female') echo 'checked'; ?>>
                        Female
                    </label>

                    <label>
                        <input type="radio"
                            name="gender"
                            value="Other"
                            <?php if ($student['gender'] == 'Other') echo 'checked'; ?>>
                        Other
                    </label>

                </div>

            </div>



            <div class="form-group">

                <label for="course">Course</label>

                <select name="course" id="course" required>

                    <option value="CSE"
                        <?php if ($student['Course'] == 'CSE') echo 'selected'; ?>>
                        BTech CSE
                    </option>

                    <option value="Mechanical"
                        <?php if ($student['Course'] == 'Mechanical') echo 'selected'; ?>>
                        BTech Mechanical
                    </option>

                    <option value="Electrical"
                        <?php if ($student['Course'] == 'Electrical') echo 'selected'; ?>>
                        BTech Electrical
                    </option>

                    <option value="Civil"
                        <?php if ($student['Course'] == 'Civil') echo 'selected'; ?>>
                        BTech Civil
                    </option>

                    <option value="BSc"
                        <?php if ($student['Course'] == 'BSc') echo 'selected'; ?>>
                        Bachelor of Science (B.Sc.)
                    </option>

                    <option value="Pharmacy"
                        <?php if ($student['Course'] == 'Pharmacy') echo 'selected'; ?>>
                        B. Pharmacy
                    </option>

                    <option value="BALLB"
                        <?php if ($student['Course'] == 'BALLB') echo 'selected'; ?>>
                        BALLB
                    </option>

                    <option value="B.ComLLB"
                        <?php if ($student['Course'] == 'B.ComLLB') echo 'selected'; ?>>
                        B.ComLLB
                    </option>

                    <option value="BBALLB"
                        <?php if ($student['Course'] == 'BBALLB') echo 'selected'; ?>>
                        BBALLB
                    </option>

                </select>

            </div>



            <div class="form-group">

                <label for="semester">Semester</label>

                <input type="number"
                    name="semester"
                    id="semester"
                    min="1"
                    max="10"
                    value="<?php echo htmlspecialchars($student['Semester']); ?>"
                    required>

            </div>



            <button type="submit" name="update" class="submit-btn">
                Update Student
            </button>
        </form>
    </div>
</body>

</html>