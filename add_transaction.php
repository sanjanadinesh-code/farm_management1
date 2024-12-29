<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Financial Transaction</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>
<h1>Add Financial Transaction</h1>

<form method="POST" action="">
    <input type="number" step="0.01" name="income" placeholder="Income Amount" required>
    <input type="number" step="0.01" name="expense" placeholder="Expense Amount" required>
    <button type="submit">Add Transaction</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $income = $_POST['income'];
    $expense = $_POST['expense'];

    // Insert into financial_transactions table
    $sql = "INSERT INTO financial_transactions (income, expense) VALUES ('$income', '$expense')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Transaction added successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
</body>
</html>
