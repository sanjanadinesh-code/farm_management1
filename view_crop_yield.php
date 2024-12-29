<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Crop Yield Data</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>

<h1>Crop Yield Data</h1>

<?php
$sql = "SELECT * FROM crop_yield_data";
$result = $conn->query($sql);

if ($result->num_rows > 0): ?>
    <table>
        <tr>
            <th>Rotation ID</th>
            <th>Field ID</th>
            <th>Crop ID</th>
            <th>Planting Season</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['rotation_id']); ?></td>
                <td><?php echo htmlspecialchars($row['field_id']); ?></td>
                <td><?php echo htmlspecialchars($row['crop_id']); ?></td>
                <td><?php echo htmlspecialchars($row['planting_season']); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>No crop yield data available.</p>
<?php endif; ?>

<a href="index.php">Back to Home</a> <!-- Link back to home -->
<?php $conn->close(); ?>
</body>
</html>

