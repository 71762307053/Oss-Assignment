<?php
include("db.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['student_name']);
    $email = trim($_POST['email']);
    $course = trim($_POST['course']);

    if (!empty($name) && !empty($email) && !empty($course)) {
        $sql = "INSERT INTO enrollments (student_name, email, course) VALUES ('$name', '$email', '$course')";
        if (mysqli_query($conn, $sql)) {
            $message = "Student enrolled successfully!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    } else {
        $message = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Enrollment</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
            background-color: #f2f2f2;
        }

        form {
            background: #fff;
            padding: 20px;
            max-width: 400px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
        }

        .message {
            text-align: center;
            color: green;
            font-weight: bold;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #007BFF;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Enroll Student</h2>

<?php if ($message): ?>
    <p class="message"><?php echo $message; ?></p>
<?php endif; ?>

<form method="post" action="">
    <label>Name:</label>
    <input type="text" name="student_name" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Course:</label>
    <input type="text" name="course" required>

    <input type="submit" value="Enroll">
</form>

<a href="index.php">← Back to List</a>

</body>
</html>
