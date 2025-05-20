<?php
session_start();
require 'db.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password_hash FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password_hash);
        $stmt->fetch();
        if (hash('sha256', $password) === $password_hash) {
            $_SESSION['admin_id'] = $id;
            $_SESSION['loggedin'] = true; // Add this line
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Incorrect password.";
        }
    } else {
        $error = "Username not found.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Portal Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background"></div>
    <div class="login-box">
        <form method="POST">
            <img src="assets/logonav.png" alt="Wish by Lilah">
            <?php if ($error): ?>
                <div class="error"><?= $error ?></div>
            <?php endif; ?>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <a href="#">Forgot password?</a>
            <p>&copy; Wish by Liah S. All Rights Reserved.</p>
            <a href="index.php" class="">Return to website</a>
        </form>
    </div>
</body>
</html>