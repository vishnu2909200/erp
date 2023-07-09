<?php
// Include the database configuration and any other required files
include "../../config.php";

// Query to retrieve staff members from the database
$sql = "SELECT * FROM staff ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

// Check if there are staff members in the database
if (mysqli_num_rows($result) > 0) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Staff List</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    </head>
    <body>
        <div class="container">
            <h2>Staff List</h2>
            <table>
                <tr>
                    <th>Staff ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Department</th>
                </tr>
                <?php
                // Loop through each staff member and display their details
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['staff_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['department']; ?></td>
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
    // No staff members found in the database
    echo "No staff members found.";
}

// Close the database connection
mysqli_close($conn);
?>
