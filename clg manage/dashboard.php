<?php
include "config.php";
?>

<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Retrieve the user ID from the session (you may need to modify this based on your authentication logic)
$userID = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>ERP Dashboard</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome to the ERP Dashboard</h2>
        <p>User ID: <?php echo $userID; ?></p>
        <ul>
            <li><a href="modules/students/list.php">Manage Students</a></li>
            <li><a href="modules/staff/list.php">Manage Staff</a></li>
            <li><a href="modules/departments/list.php">Manage Departments</a></li>
            <li><a href="modules/courses/list.php">Manage Courses</a></li>
            <li><a href="modules/enrollments/list.php">Manage Enrollments</a></li>
        </ul>
        <p><a href="logout.php">Log Out</a></p>
    </div>
</body>
</html>
