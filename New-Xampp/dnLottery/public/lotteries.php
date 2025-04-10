<?php
session_start();
include '../partial/db_connect.php'; // Update the path if necessary

// Fetch all lotteries
$lotteries = $conn->query("SELECT * FROM lotteries ORDER BY launch_date DESC");

// Fetch user points
$user_points = $user['points'] ?? 0; // Default to 0 if no result

// Check for query errors
if (!$lotteries) {
    die("Database query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lotteries - dnLottery</title>
    <link rel="stylesheet" href="../CSS/lotteries.css"> <!-- Update the path if necessary -->
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <section class="lotteries-section">
            <h2>Available Lotteries</h2>
            <div class="lotteries-grid">
                <?php while ($lottery = $lotteries->fetch_assoc()): ?>
                <div class="lottery-card" onclick="window.location.href='dashboard.php'">
                    <img src="../images/<?php echo htmlspecialchars($lottery['image'] ?? 'default.jpg'); ?>" alt="<?php echo htmlspecialchars($lottery['name']); ?>">
                    <h3><?php echo htmlspecialchars($lottery['name']); ?></h3>
                    <p>Launch Date: <?php echo htmlspecialchars($lottery['launch_date']); ?></p>
                </div>
                <?php endwhile; ?>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>
