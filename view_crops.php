<?php 
session_start(); 
include 'db.php'; 

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: user_login.php"); // Redirect to login if not logged in
    exit();
}

// Fetch crops from the database
$sql = "SELECT * FROM crop"; // Adjust table name as necessary
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Crops</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>

<div class="container">
    <h1>Available Crops</h1>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Season</th>
                <!-- Add more columns as needed -->
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['crop_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['crop_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['planting_season']); ?></td>
                    <td><?php echo htmlspecialchars($row['harvesting_season']); ?></td>
                    <td><?php echo htmlspecialchars($row['yield_per_acre']); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No crops available.</p>
    <?php endif; ?>

    <a href="user_dashboard.php">Back to Dashboard</a> <!-- Link back to user dashboard -->
</div>

<?php
$conn->close(); // Close the database connection
?>
</body>
</html>
