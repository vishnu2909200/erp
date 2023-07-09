<?php
// Include the database configuration and any other required files
include "../../config.php";

// Check if the student ID is provided as a query parameter
if (isset($_GET['id'])) {
    // Get the student ID from the query parameter
    $studentID = $_GET['id'];

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Delete the student from the database
        $sql = "DELETE FROM students WHERE id = '$studentID'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Redirect to the student list page after successful deletion
            header("Location: list.php");
            exit();
        } else {
            // Error occurred while deleting the student
            $error = "Error deleting student: " . mysqli_error($conn);
        }
    }

    // Query to retrieve the student from the database
    $sql = "SELECT * FROM students WHERE id = '$studentID'";
    $result = mysqli_query($conn, $sql);

    // Check if the student exists in the database
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Delete Student</title>
            <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
        </head>
        <body>
            <div class="container">
                <h2>Delete Student</h2>
                <?php if (isset($error)) { ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php } ?>
                <p>Are you sure you want to delete this student?</p>
                <form action="" method="POST">
                    <input type="submit" value="Delete">
                    <a href="view.php?id=<?php echo $studentID; ?>">Cancel</a>
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        // Student not found in the database
        echo "Student not found.";
    }
} else {
    // Student ID not provided in the query parameter
    echo "Invalid request.";
}

// Close the database connection
mysqli_close($conn);
?>
