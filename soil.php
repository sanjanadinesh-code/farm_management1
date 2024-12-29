<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Soil Management</title>
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <h1>Soil Management</h1>

    <form method="POST" action="">
        <input type="number" name="field_id" placeholder="Field ID" required>
        <input type="text" name="soil_type" placeholder="Soil Type">
        <input type="number" step="0.01" name="nutrient_level" placeholder="Nutrient Level">
        <input type="number" step="0.01" name="ph_level" placeholder="pH Level">
        <button type="submit">Add Soil</button>
    </form>

    <?php
    // Insert Soil Data
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $field_id = $_POST['field_id'];
        $soil_type = $_POST['soil_type'];
        $nutrient_level = $_POST['nutrient_level'];
        $ph_level = $_POST['ph_level'];

        $sql = "INSERT INTO Soil (field_id, soil_type, nutrient_level, pH_level) VALUES ('$field_id', '$soil_type', '$nutrient_level', '$ph_level')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New soil added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Display Soils
    $result = $conn->query("SELECT * FROM Soil");
    if ($result->num_rows > 0) {
        echo "<h2>Existing Soils</h2><ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>Field ID: " . $row['field_id'] . ", Soil Type: " . $row['soil_type'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No soils found.";
    }

    $conn->close();
    ?>
</body>
</html>
