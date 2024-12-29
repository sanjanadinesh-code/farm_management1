<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Crop Yield Data</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>
<h1>Add Crop Yield Data</h1>

<form method="POST" action="">
    <input type="number" name="field_id" placeholder="Field ID" required>
    <input type="number" name="crop_id" placeholder="Crop ID" required>
    <input type="text" name="planting_season" placeholder="Planting Season" required>
    <button type="submit">Add Crop Yield Data</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $field_id = $_POST['field_id'];
    $crop_id = $_POST['crop_id'];
    $planting_season = $_POST['planting_season'];

    // Insert into crop_yield_data table
    $sql = "INSERT INTO crop_yield_data (field_id, crop_id, planting_season) VALUES ('$field_id', '$crop_id', '$planting_season')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Crop yield data added successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
</body>
</html>