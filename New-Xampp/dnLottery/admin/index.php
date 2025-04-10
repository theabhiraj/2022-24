<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
include '../partial/db_connect.php'; // Update the path if necessary

// Fetch lottery data
$lotteries = $conn->query("SELECT * FROM lotteries");

// Fetch user data
$users = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="CSS/index.css"> <!-- Update the path if necessary -->
</head>
<body>
    <header class="dashboard-header">
        <h1 class="dashboard-title">Admin Dashboard</h1>
        <a href="logout.php" class="logout-button">Logout</a>
    </header>
    <div class="dashboard-content">
        <section class="stats-section">
            <div class="stats-card">
                <h2 class="stats-title">Total Lotteries</h2>
                <p class="stats-number"><?php echo $lotteries->num_rows; ?></p>
            </div>
            <div class="stats-card">
                <h2 class="stats-title">Total Users</h2>
                <p class="stats-number"><?php echo $users->num_rows; ?></p>
            </div>
        </section>
        <section class="recent-activities">
            <h2 class="section-title">Recent Lotteries</h2>
            <table class="lotteries-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Launch Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($lottery = $lotteries->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $lottery['id']; ?></td>
                        <td><?php echo htmlspecialchars($lottery['name']); ?></td>
                        <td><?php echo htmlspecialchars($lottery['launch_date']); ?></td>
                        <td><?php echo htmlspecialchars($lottery['status']); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
