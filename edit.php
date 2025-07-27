<?php
include("db.php");
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM enrollments WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['student_name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    mysqli_query($conn, "UPDATE enrollments SET student_name='$name', email='$email', course='$course' WHERE id=$id");
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
<h2>Edit Enrollment</h2>

<form method="post">
    <label>Name:</label><br>
    <input type="text" name="student_name" value="<?= $row['student_name'] ?>"><br>
    <label>Email:</label><br>
    <input type="email" name="email" value="<?= $row['email'] ?>"><br>
    <label>Course:</label><br>
    <input type="text" name="course" value="<?= $row['course'] ?>"><br>
    <input type="submit" value="Update">
</form>

</body>
</html>
