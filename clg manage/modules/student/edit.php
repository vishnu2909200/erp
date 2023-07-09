<?php
// Include the database configuration and any other required files
include "../../config.php";

// Check if the student ID is provided as a query parameter
if (isset($_GET['id'])) {
    // Get the student ID from the query parameter
    $studentID = $_GET['id'];

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the updated details from the form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $dateOfBirth = $_POST['date_of_birth'];

        // Update the student in the database
        $sql = "UPDATE students SET name='$name', email='$email', phone='$phone', date_of_birth='$dateOfBirth' WHERE id='$studentID'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Redirect to the view page after successful update
            header("Location: view.php?id=$studentID");
            exit();
        } else {
            // Error occurred while updating the student
            $error = "Error updating student: " . mysqli_error($conn);
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
            <title>Edit Student</title>
            <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
        </head>
        <body>
            <div class="container">
                <h2>Edit Student</h2>
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
                    <label for="date_of_birth">Date of Birth:</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $row['date_of_birth']; ?>" required>
                    <input type="submit" value="Update">
                </form>
                <p><a href="view.php?id=<?php echo $studentID; ?>">Cancel</a></p>
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
