<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Labor</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
</head>
<body>
<h1>Add Labor</h1>

<form method="POST" action="">
    <input type="text" name="worker_name" placeholder="Worker Name" required>
    <input type="text" name="role" placeholder="Role" required>
    <button type="submit">Add Labor</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $worker_name = $_POST['worker_name'];
    $role = $_POST['role'];

    // Insert into labor table
    $sql = "INSERT INTO labor (worker_name, role) VALUES ('$worker_name', '$role')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Labor added successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
</body>
</html>
