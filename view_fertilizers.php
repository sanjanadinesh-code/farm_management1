<?php 
session_start(); 
include 'db.php'; 

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: user_login.php"); // Redirect to login if not logged in
    exit();
}

// Fetch fertilizers from the database
$sql = "SELECT * FROM fertilizer"; // Adjust table name as necessary
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Fertilizers</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>

<div class="container">
    <h1>Available Fertilizers</h1>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Component 1</th>
                <th>Component 2</th>
                <th>Component 3</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['component1']); ?></td>
                    <td><?php echo htmlspecialchars($row['component2']); ?></td>
                    <td><?php echo htmlspecialchars($row['component3']); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No fertilizers available.</p>
    <?php endif; ?>

    <a href="user_dashboard.php">Back to Dashboard</a> <!-- Link back to user dashboard -->
</div>

<?php
$conn->close(); // Close the database connection
?>
</body>
</html>
