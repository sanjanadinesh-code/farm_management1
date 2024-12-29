<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Financial Transactions</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>

<h1>Financial Transactions</h1>

<?php
$sql = "SELECT * FROM financial_transactions";
$result = $conn->query($sql);

if ($result->num_rows > 0): ?>
    <table>
        <tr>
            <th>Transaction ID</th>
            <th>Income</th>
            <th>Expense</th>
            <th>Date</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['transaction_id']); ?></td>
                <td><?php echo htmlspecialchars($row['income']); ?></td>
                <td><?php echo htmlspecialchars($row['expense']); ?></td>
                <td><?php echo htmlspecialchars($row['transaction_date']); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>No transactions available.</p>
<?php endif; ?>

<a href="index.php">Back to Home</a> <!-- Link back to home -->
<?php $conn->close(); ?>
</body>
</html>
