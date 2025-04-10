<?php
session_start();
if (isset($_SESSION['user_logged_in'])) {
    header("Location: dashboard.php");
    exit();
}

include '../partial/db_connect.php'; // Update the path if necessary

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_logged_in'] = true;
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - dnLottery</title>
    <link rel="stylesheet" href="../css/login.css"> <!-- Update the path if necessary -->
</head>
<body>
<?php include 'header.php'; ?>

    <main>
        <div class="login-container">
            <h2>Login to Your Account</h2>
            <?php if (isset($error_message)): ?>
            <div class="error-message"><?php echo htmlspecialchars($error_message); ?></div>
            <?php endif; ?>
            <form method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="login-btn">Login</button>
            </form>
            <p class="signup-link">Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 dnLottery. All rights reserved.</p>
    </footer>
</body>
</html>
