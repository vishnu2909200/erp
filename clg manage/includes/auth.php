<?php
// Start or resume the session
session_start();

// Check if the user is logged in
function isUserLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Redirect to login page if user is not logged in
function redirectToLogin() {
    header("Location: login.php");
    exit();
}

// Redirect to dashboard if user is already logged in
function redirectToDashboard() {
    header("Location: dashboard.php");
    exit();
}

// Set the logged-in user
function setLoggedInUser($user_id) {
    $_SESSION['user_id'] = $user_id;
}

// Get the logged-in user ID
function getLoggedInUserID() {
    return $_SESSION['user_id'];
}

// Log out the user
function logout() {
    session_unset();
    session_destroy();
    redirectToLogin();
}
