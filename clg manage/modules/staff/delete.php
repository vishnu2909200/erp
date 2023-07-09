<?php
// Include the database configuration and any other required files
include "../../config.php";

// Check if the staff ID is provided as a query parameter
if (isset($_GET['id'])) {
    // Get the staff ID from the query parameter
    $staffID = $_GET['id'];

    // Query to retrieve the staff member from the database
    $sql = "SELECT * FROM staff WHERE id = '$staffID'";
    $result = mysqli_query($conn, $sql);

    // Check if the staff member exists in the database
    if (mysqli_num_rows($result) == 1) {
        // Delete the staff member from the database
        $deleteSql = "DELETE FROM staff WHERE id = '$staffID'";
        $deleteResult = mysqli_query($conn, $deleteSql);

        if ($deleteResult) {
            // Redirect to the staff list page after successful deletion
            header("Location: list.php");
            exit();
        } else {
            // Error occurred while deleting the staff member
            $error = "Error deleting staff member: " . mysqli_error($conn);
        }
    } else {
        // Staff member not found in the database
        $error = "Staff member not found.";
    }
} else {
    // Staff ID not provided in the query parameter
    $error = "Invalid request.";
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Staff Member</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Delete Staff Member</h2>
        <?php if (isset($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>
        <p>Are you sure you want to delete this staff member?</p>
        <form action="" method="POST">
            <input type="submit" value="Delete">
            <a href="list.php">Cancel</a>
        </form>
    </div>
</body>
</html>
