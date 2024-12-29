<?php 
session_start(); 
include 'db.php'; 

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: user_login.php"); // Redirect to login if not logged in
    exit();
}

// Fetch user information (optional)
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?></h1>

    <!-- User options -->
    <h2>Your Options:</h2>
    <ul class="dashboard-options">
        <!-- Links to view data managed by admin -->
        <li><a href="view_crops.php">View Crops Managed by Admin</a></li> 
        <li><a href="view_soil.php">View Soil Managed by Admin</a></li> 
        <li><a href="view_fertilizers.php">View fertilizer Managed by Admin</a></li> 
        <li><a href="view_weather.php">View weather Managed by Admin</a></li>
        <li><a href="view_labor.php">View labor Managed by Admin</a></li> 
        <li><a href="view_transaction.php">View financial transactions Managed by Admin</a></li> 
        <li><a href="view_crop_yield.php">View crop yeild data Managed by Admin</a></li> 
        <li><a href="view_irrigation.php">View irrigation data Managed by Admin</a></li> 
       
    </ul>

    <!-- Logout link -->
    <a href="logout.php">Logout</a> 
</div>

<?php
$conn->close(); // Close the database connection
?>
