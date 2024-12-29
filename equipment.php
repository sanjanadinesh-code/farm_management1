<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Equipment Management</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Equipment Management</h1>

<form method="POST" action="">
    <input type="text" name="equipment_name" placeholder="Equipment Name" required>
    <input type="date" name="purchase_date">
    <input type="number" step="0.01" name="maintenance_cost" placeholder="Maintenance Cost">
    <button type="submit">Add Equipment</button>
</form>

<?php
// Insert Equipment Data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $equipment_name = $_POST['equipment_name'];
    $purchase_date = $_POST['purchase_date'];
    $maintenance_cost = $_POST['maintenance_cost'];

    $sql = "INSERT INTO Equipment (equipment_name, purchase_date, maintenance_cost) VALUES ('$equipment_name', '$purchase_date', '$maintenance_cost')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New equipment added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
</body>
</html>
