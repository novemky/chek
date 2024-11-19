<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Student</h1>
        <?php
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM students WHERE id = $id");
        $student = $result->fetch_assoc();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $stmt = $conn->prepare("UPDATE students SET firstname=?, middlename=?, lastname=?, age=?, address=?, course_section=? WHERE id=?");
            $stmt->bind_param("sssissi", $_POST['firstname'], $_POST['middlename'], $_POST['lastname'], $_POST['age'], $_POST['address'], $_POST['course_section'], $id);
            $stmt->execute();
            header("Location: index.php");
        }
        ?>
        <form action="" method="POST">
            <label>Firstname:</label>
            <input type="text" name="firstname" value="<?= $student['firstname'] ?>" required>
            
            <label>Middlename:</label>
            <input type="text" name="middlename" value="<?= $student['middlename'] ?>">
            
            <label>Lastname:</label>
            <input type="text" name="lastname" value="<?= $student['lastname'] ?>" required>
            
            <label>Age:</label>
            <input type="number" name="age" value="<?= $student['age'] ?>" required>
            
            <label>Address:</label>
            <textarea name="address" required><?= $student['address'] ?></textarea>
            
            <label>Course & Section:</label>
            <input type="text" name="course_section" value="<?= $student['course_section'] ?>" required>
            
            <button type="submit" class="btn btn-green">Update</button>
        </form>
        <a href="index.php" class="btn btn-back">Back</a>
    </div>
</body>
</html>
