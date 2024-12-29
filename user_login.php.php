<?php include 'db.php'; session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>User Login</h1>

        <form method="POST" action="">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Fetch user data from users table
            $sql = "SELECT * FROM users WHERE email='$email' AND role='user'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                // Verify hashed password
                if (password_verify($password, $row['password'])) {
                    $_SESSION['user_id'] = $row['id']; // Store user ID in session
                    header("Location: user_dashboard.php"); // Redirect to user dashboard
                    exit();
                } else {
                    echo "Invalid email or password.";
                }
            } else {
                echo "No user found with that email.";
            }
        }
        ?>
    </div>
</body>
</html>
