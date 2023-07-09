<?php
// Include the database configuration and any other required files
include "../../config.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the student details from the form
    $studentID = $_POST['student_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dateOfBirth = $_POST['date_of_birth'];

    // Insert the new student into the database
    $sql = "INSERT INTO students (student_id, name, email, phone, date_of_birth) VALUES ('$studentID', '$name', '$email', '$phone', '$dateOfBirth')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Redirect to the student list page after successful addition
        header("Location: list.php");
        exit();
    } else {
        // Error occurred while adding the student
        $error = "Error adding student: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Add Student</h2>
        <?php if (isset($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>
        <form action="" method="POST">
            <label for="student_id">Student ID:</label>
            <input type="text" id="student_id" name="student_id" required>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" required>
            <input type="submit" value="Add">
            <a href="list.php">Cancel</a>
        </form>
    </div>
</body>
</html>
