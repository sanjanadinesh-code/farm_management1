<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather Management</title>
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<h1>Weather Management</h1>

<form method="POST" action="">
    <input type="date" name="date" required>
    <input type="number" step="0.01" name="temperature" placeholder="Temperature (°C)">
    <input type="number" step="0.01" name="rainfall" placeholder="Rainfall (mm)">
    <input type="number" step="0.01" name="humidity" placeholder="Humidity (%)">
    <button type="submit">Add Weather Data</button>
</form>

<?php
// Insert Weather Data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $_POST['date'];
    $temperature = $_POST['temperature'];
    $rainfall = $_POST['rainfall'];
    $humidity = $_POST['humidity'];

    $sql = "INSERT INTO Weather (date, temperature, rainfall, humidity) VALUES ('$date', '$temperature', '$rainfall', '$humidity')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New weather data added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Display Weather Data
$result = $conn->query("SELECT * FROM Weather");
if ($result->num_rows > 0) {
    echo "<h2>Existing Weather Data</h2><ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>Date: " . htmlspecialchars($row['date']) . ", Temp: " . htmlspecialchars($row['temperature']) . "°C, Rainfall: " . htmlspecialchars($row['rainfall']) . "mm, Humidity: " . htmlspecialchars($row['humidity']) . "%</li>";
    }
    echo "</ul>";
} else {
    echo "No weather data found.";
}

$conn->close();
?>
</body>
</html>
