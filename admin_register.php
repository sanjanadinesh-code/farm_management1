<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Admin Registration</h1>

<form method="POST" action="">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Insert into users table with role 'admin'
    $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', 'admin')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful!'); window.location.href='admin_login.php';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
</body>
</html>
