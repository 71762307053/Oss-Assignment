<?php include("db.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Enrollments</title>
    <style>
        body { font-family: Arial; background: #f9f9f9; padding: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: center; }
        th { background: #4CAF50; color: white; }
        a.button { background: #4CAF50; color: white; padding: 8px 12px; text-decoration: none; border-radius: 4px; }
        .actions a { margin: 0 5px; }
    </style>
</head>
<body>

<h2>Enrolled Students</h2>
<a class="button" href="add.php">+ Enroll New Student</a>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Actions</th>
    </tr>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM enrollments");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['student_name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['course']}</td>
            <td class='actions'>
                <a class='button' href='edit.php?id={$row['id']}'>Edit</a>
                <a class='button' href='delete.php?id={$row['id']}'>Delete</a>
            </td>
        </tr>";
    }
    ?>
</table>

</body>
</html>
