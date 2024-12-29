<?php 
session_start(); 
include 'db.php'; 

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: user_login.php"); // Redirect to login if not logged in
    exit();
}

// Fetch soil data from the database
$sql = "SELECT * FROM soil"; // Adjust table name as necessary
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Soil Data</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>

<div class="container">
    <h1>Soil Data</h1>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
            <th>SOIL_ID</th>
                <th>FIELD_ID</th>
                <th>SOIL_Type</th>
                <th>Nutrient Content</th>
                <th>pH Level</th>
               
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['soil_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['field_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['soil_type']); ?></td>
                    <td><?php echo htmlspecialchars($row['nutrient_level']); ?></td>
                    <td><?php echo htmlspecialchars($row['pH_level']); ?></td>
                   
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No soil data available.</p>
    <?php endif; ?>

    <a href="user_dashboard.php">Back to Dashboard</a> <!-- Link back to user dashboard -->
</div>

<?php
$conn->close(); // Close the database connection
?>
</body>
</html>
