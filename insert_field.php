<?php include 'db.php'; // Include your database connection file ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Field</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>
<h1>Add Field</h1>

<form method="POST" action="">
    <input type="text" name="field_name" placeholder="Field Name" required>
    <input type="text" name="location" placeholder="Location" required>
    <button type="submit">Add Field</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data and escape for security
    $field_name = mysqli_real_escape_string($conn, $_POST['field_name']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);

    // Prepare SQL query to insert field data
    $sql = "INSERT INTO field (field_name, location) VALUES ('$field_name', '$location')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Field added successfully!');</script>";
        // Optionally redirect or clear the form after successful submission
        // header("Location: add_field.php"); // Uncomment to redirect
        // exit();
    } else {
        echo "<script>alert('Error adding field: " . $conn->error . "');</script>";
    }
}

$conn->close(); // Close the database connection
?>
</body>
</html>
