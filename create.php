<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Add New Student</h1>
        <form action="" method="POST">
            <label>Firstname:</label>
            <input type="text" name="firstname" required>
            
            <label>Middlename:</label>
            <input type="text" name="middlename">
            
            <label>Lastname:</label>
            <input type="text" name="lastname" required>
            
            <label>Age:</label>
            <input type="number" name="age" required>
            
            <label>Address:</label>
            <textarea name="address" required></textarea>
            
            <label>Course & Section:</label>
            <input type="text" name="course_section" required>
            
            <button type="submit" class="btn btn-green">Submit</button>
        </form>
        <a href="index.php" class="btn btn-back">Back</a>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $stmt = $conn->prepare("INSERT INTO students (firstname, middlename, lastname, age, address, course_section) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssiss", $_POST['firstname'], $_POST['middlename'], $_POST['lastname'], $_POST['age'], $_POST['address'], $_POST['course_section']);
            $stmt->execute();
            header("Location: index.php");
        }
        ?>
    </div>
</body>
</html>
