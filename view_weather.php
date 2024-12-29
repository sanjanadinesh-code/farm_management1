<?php 
session_start(); 
include 'db.php'; 

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: user_login.php"); // Redirect to login if not logged in
    exit();
}

// Fetch weather data from the database
$sql = "SELECT * FROM weather"; // Adjust table name as necessary
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Weather Data</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>

<div class="container">
    <h1>Weather Data</h1>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Temperature (°C)</th>
                <th>Humidity (%)</th>
                <!-- Add more columns as needed -->
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['date']); ?></td>
                    <td><?php echo htmlspecialchars($row['temperature']); ?></td>
                    <td><?php echo htmlspecialchars($row['humidity']); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No weather data available.</p>
    <?php endif; ?>

    <a href="user_dashboard.php">Back to Dashboard</a> <!-- Link back to user dashboard -->
</div>

<?php
$conn->close(); // Close the database connection
?>
</body>
</html>
