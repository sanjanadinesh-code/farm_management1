<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Labor</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>

<h1>Available Labor</h1>

<?php
$sql = "SELECT * FROM labor";
$result = $conn->query($sql);

if ($result->num_rows > 0): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Worker Name</th>
            <th>Role</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['worker_id']); ?></td>
                <td><?php echo htmlspecialchars($row['worker_name']); ?></td>
                <td><?php echo htmlspecialchars($row['role']); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>No labor available.</p>
<?php endif; ?>

<a href="index.php">Back to Home</a> <!-- Link back to home -->
<?php $conn->close(); ?>
</body>
</html>
