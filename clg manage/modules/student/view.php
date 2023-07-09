<?php
// Include the database configuration and any other required files
include "../../config.php";

// Check if the student ID is provided as a query parameter
if (isset($_GET['id'])) {
    // Get the student ID from the query parameter
    $studentID = $_GET['id'];

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
            <title>View Student</title>
            <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
        </head>
        <body>
            <div class="container">
                <h2>View Student</h2>
                <table>
                    <tr>
                        <th>Student ID</th>
                        <td><?php echo $row['student_id']; ?></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><?php echo $row['name']; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td><?php echo $row['phone']; ?></td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td><?php echo $row['date_of_birth']; ?></td>
                    </tr>
                </table>
                <p><a href="list.php">Back to Student List</a></p>
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
