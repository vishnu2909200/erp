<?php
// Include the database configuration and any other required files
include "../../config.php";

// Query to retrieve students from the database
$sql = "SELECT * FROM students ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

// Check if there are students in the database
if (mysqli_num_rows($result) > 0) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Student List</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    </head>
    <body>
        <div class="container">
            <h2>Student List</h2>
            <table>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date of Birth</th>
                </tr>
                <?php
                // Loop through each student and display their details
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['student_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['date_of_birth']; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </body>
    </html>
    <?php
} else {
    // No students found in the database
    echo "No students found.";
}

// Close the database connection
mysqli_close($conn);
?>
