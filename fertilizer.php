<?php include 'db.php'; // Include your database connection file ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Fertilizer</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>
<h1>Add Fertilizer</h1>

<form method="POST" action="">
    <input type="text" name="name" placeholder="Fertilizer Name" required>
    <input type="text" name="component1" placeholder="Component 1 (e.g., Nitrogen)" required>
    <input type="text" name="component2" placeholder="Component 2 (e.g., Phosphorus)" required>
    <input type="text" name="component3" placeholder="Component 3 (e.g., Potassium)" required>
    <button type="submit">Add Fertilizer</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $component1 = $_POST['component1'];
    $component2 = $_POST['component2'];
    $component3 = $_POST['component3'];

    // Prepare SQL query to insert fertilizer data
    $sql = "INSERT INTO fertilizer (name, component1, component2, component3) VALUES ('$name', '$component1', '$component2', '$component3')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Fertilizer added successfully!');</script>";
        // Optionally redirect or clear the form after successful submission
        // header("Location: add_fertilizer.php"); // Uncomment to redirect
        // exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close(); // Close the database connection
?>
</body>
</html>
