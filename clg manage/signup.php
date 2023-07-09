<?php
include "config.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>




<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

// Check if the signup form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate the submitted form fields (you may need to modify this based on your requirements)
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Perform additional validation (e.g., check for password strength, duplicate usernames, etc.)

    // Assuming validation passes, you can store the user in the database (you will need to modify this based on your database logic)
    // $userID = storeUser($username, $password);

    // Set the user_id session variable as a simple example
    // $_SESSION['user_id'] = $userID;

    // Redirect to the dashboard or login page after successful signup
    // header("Location: dashboard.php");
    // exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>ERP Sign Up</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>ERP Sign Up</h2>
        <form action="signup.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <input type="submit" value="Sign Up">
        </form>
        <p>Already have an account? <a href="index.php">Log In</a></p>
    </div>
</body>
</html>
