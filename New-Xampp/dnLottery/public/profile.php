<?php
session_start();
include '../partial/db_connect.php'; // Adjust the path if necessary

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];

// Fetch user details
$query = $conn->prepare("SELECT username, email, points, created_at FROM users WHERE username = ?");
$query->bind_param("s", $username);
$query->execute();
$result = $query->get_result();
$user = $result->fetch_assoc();

// Fetch user points
$user_points = $user['points'] ?? 0; // Default to 0 if no result

$error = '';
$success = '';

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_username = $_POST['username'];
    $new_email = $_POST['email'];

    if (empty($new_username) || empty($new_email)) {
        $error = 'All fields are required.';
    } else {
        $update_query = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE username = ?");
        $update_query->bind_param("sss", $new_username, $new_email, $username);

        if ($update_query->execute()) {
            $_SESSION['username'] = $new_username; // Update session username
            $success = 'Profile updated successfully.';
        } else {
            $error = 'Error updating profile. Please try again.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dnLottery - Profile</title>
    <link rel="stylesheet" href="../css/profile.css"> <!-- Update the path if necessary -->
</head>

<body>
    <?php include 'header.php'; ?>

    <main>
        <div class="profile-container">
            <h2>Your Profile</h2>
            <?php if ($error): ?>
                <div class="message error"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            <?php if ($success): ?>
                <div class="message success"><?php echo htmlspecialchars($success); ?></div>
            <?php endif; ?>
            <form action="profile.php" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="points">Points:</label>
                    <input type="text" id="points" value="<?php echo htmlspecialchars($user['points']); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="created_at">Member Since:</label>
                    <input type="text" id="created_at" value="<?php echo htmlspecialchars($user['created_at']); ?>" readonly>
                </div>
                <button type="submit" class="submit-button">Update Profile</button>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 dnLottery. All rights reserved.</p>
    </footer>
</body>

</html>