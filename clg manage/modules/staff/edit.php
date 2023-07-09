<?php
// Include the database configuration and any other required files
include "../../config.php";

// Check if the staff ID is provided as a query parameter
if (isset($_GET['id'])) {
    // Get the staff ID from the query parameter
    $staffID = $_GET['id'];

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the updated details from the form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $department = $_POST['department'];

        // Update the staff member in the database
        $sql = "UPDATE staff SET name='$name', email='$email', phone='$phone', department='$department' WHERE id='$staffID'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Redirect to the view page after successful update
            header("Location: view.php?id=$staffID");
            exit();
        } else {
            // Error occurred while updating the staff member
            $error = "Error updating staff member: " . mysqli_error($conn);
        }
    }

    // Query to retrieve the staff member from the database
    $sql = "SELECT * FROM staff WHERE id = '$staffID'";
    $result = mysqli_query($conn, $sql);

    // Check if the staff member exists in the database
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Edit Staff Member</title>
            <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
        </head>
        <body>
            <div class="container">
                <h2>Edit Staff Member</h2>
                <?php if (isset($error)) { ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php } ?>
                <form action="" method="POST">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required>
                    <label for="department">Department:</label>
                    <input type="text" id="department" name="department" value="<?php echo $row['department']; ?>" required>
                    <input type="submit" value="Update">
                </form>
                <p><a href="view.php?id=<?php echo $staffID; ?>">Cancel</a></p>
            </div>
        </body>
        </html>
        <?php
    } else {
        // Staff member not found in the database
        echo "Staff member not found.";
    }
} else {
    // Staff ID not provided in the query parameter
    echo "Invalid request.";
}

// Close the database connection
mysqli_close($conn);
?>
