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
        $row = mysqli_fetch_assoc($result);
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>View Staff Member</title>
            <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
        </head>
        <body>
            <div class="container">
                <h2>View Staff Member</h2>
                <table>
                    <tr>
                        <th>Staff ID</th>
                        <td><?php echo $row['staff_id']; ?></td>
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
                        <th>Department</th>
                        <td><?php echo $row['department']; ?></td>
                    </tr>
                </table>
                <p><a href="list.php">Back to Staff List</a></p>
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
