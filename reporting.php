<?php include 'db.php'; session_start(); ?>

<!DOCTYPE html >
<html lang=“en” >
<head >
     <meta charset=“UTF-8” />
     <title > Reporting </title >
<link rel="stylesheet" type="text/css" href="style.css">

 </head >
<body >
<h1 > Reporting </h1 >

<h2 > Total Yield of Crops </h2 >

<?php 
$result = $conn->query("SELECT SUM(yield_per_acre) AS total_yield FROM Crop_Yield_Data");
$row = $result->fetch_assoc();
echo "<p>Total Yield of Crops: " . htmlspecialchars($row['total_yield']) . "</p>";
?>

<h2 > Total Financial Transactions </h2 >

<?php 
$result = $conn->query("SELECT SUM(income) AS total_income, SUM(expense) AS total_expense FROM Financial_Transactions");
$row = $result->fetch_assoc();
echo "<p>Total Income: $" . htmlspecialchars($row['total_income']) . "</p>";
echo "<p>Total Expense: $" . htmlspecialchars($row['total_expense']) . "</p>";
?>

<a href=“index.php” > Back to Home </ a >

 </body >
 </html >
