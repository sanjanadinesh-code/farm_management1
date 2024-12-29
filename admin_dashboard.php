<?php 
session_start(); 
include 'db.php'; 

// Check if admin is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: admin_login.php"); // Redirect to login if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Admin Dashboard</h1>

    <!-- Admin management options -->
    <h2>Manage Data:</h2>
    <ul class="dashboard-options">
        <li><a href="crop.php">Manage Crops</a></li>
        <li><a href="soil.php">Manage Soil</a></li>
        <li><a href="fertilizer.php">Manage Fertilizers</a></li>
        <li><a href="weather.php">Manage Weather Data</a></li>
    
        <li><a href="insert_field.php">Manage fied Data</a></li>
        <li><a href="add_labor.php">Manage Labor Data</a></li>
        <li><a href="add_transaction.php">Manage Financial transaction</a></li>
        <li><a href="add_crop_yield.php">Manage Crop yield  data</a></li>
        <li><a href="add_irrigation.php">Manage irrigation data</a></li>

    </ul>

    <!-- Logout link -->
    <a href="logout.php">Logout</a> 
</div>

</body>
</html>

<?php
$conn->close(); // Close the database connection
?>
