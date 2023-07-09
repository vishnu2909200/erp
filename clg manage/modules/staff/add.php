<?php
// Include the database configuration and any other required files
include "../../config.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the staff details from the form
    $staffID = $_POST['staff_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];

    // Insert the new staff member into the database
    $sql = "INSERT INTO staff (staff_id, name, email, phone, department) VALUES ('$staffID', '$name', '$email', '$phone', '$department')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Redirect to the staff list page after successful addition
        header("Location: list.php");
        exit();
    } else {
        // Error occurred while adding the staff member
        $error = "Error adding staff member: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Staff Member</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Add Staff Member</h2>
        <?php if (isset($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>
        <form action="" method="POST">
            <label for="staff_id">Staff ID:</label>
            <input type="text" id="staff_id" name="staff_id" required>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>
            <label for="department">Department:</label>
            <input type="text" id="department" name="department" required>
            <input type="submit" value="Add">
            <a href="list.php">Cancel</a>
        </form>
    </div>
</body>
</html>
