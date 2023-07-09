<?php
include "config.php";
?>

<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate the submitted username and password (you may need to modify this based on your database schema)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the username and password (you may need to modify this based on your authentication logic)
    if ($username === 'admin' && $password === 'password') {
        // Set the user_id session variable as a simple example
        $_SESSION['user_id'] = 1;

        // Redirect to the dashboard after successful login
        header("Location: dashboard.php");
        exit();
    } else {
        // Invalid username or password, display an error message
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>ERP Login</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>ERP Login</h2>
        <?php if (isset($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Log In">
        </form>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>
</body>
</html>
