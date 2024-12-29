<?php include 'db.php'; ?>

<!DOCTYPE html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Irrigation Data</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>

<h1>Add Irrigation Data</h1>

<form method="POST" action="">
    <input type="number" name="field_id" placeholder="Field ID" required />
    <input type="number" name="total_water_used" placeholder="Total Water Used (liters)" required />
    <input type="date" name="irrigation_date" required />
    <button type="submit">Add Irrigation Data</button>
</form>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $field_id = $_POST['field_id'];
    $total_water_used = $_POST['total_water_used'];
    $irrigation_date = $_POST['irrigation_date'];

    // Insert into irrigation table
    $sql = "INSERT INTO irrigation (field_id, total_water_used, irrigation_date) VALUES ('$field_id', '$total_water_used', '$irrigation_date')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Irrigation data added successfully!'); window.location.href='view_irrigation.php';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

</body>
</html>


