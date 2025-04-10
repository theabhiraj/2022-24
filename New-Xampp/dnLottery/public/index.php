<?php
session_start();
include '../partial/db_connect.php'; // Update the path if necessary

// Fetch active lotteries
$active_lotteries = $conn->query("SELECT * FROM lotteries WHERE status='active' ORDER BY launch_date DESC LIMIT 5");

// Fetch user points
$user_points = $user['points'] ?? 0; // Default to 0 if no result

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dnLottery - Home</title>
    <link rel="stylesheet" href="../css/index.css"> <!-- Update the path if necessary -->
</head>

<body>
    <!-- <header> < ?php include 'header.php' ?> </header> -->
        

        <main>
            <section class="hero-section">
                <div class="hero-content">
                    <h2>Welcome to dnLottery</h2>
                    <p>Your chance to win big starts here! Explore our active lotteries and try your luck today.</p>
                    <a href="lotteries.php" class="cta-button">Explore Lotteries</a>
                </div>
            </section>

            <section class="active-lotteries">
                <h2>Active Lotteries</h2>
                <div class="lotteries-grid">
                    <?php while ($lottery = $active_lotteries->fetch_assoc()): ?>
                        <div class="lottery-card">
                            <img src="../images/<?php echo $lottery['image']; ?>" alt="<?php echo htmlspecialchars($lottery['name']); ?>">
                            <h3><?php echo htmlspecialchars($lottery['name']); ?></h3>
                            <p>Launch Date: <?php echo htmlspecialchars($lottery['launch_date']); ?></p>
                            <a href="lotteryDetails.php?id=<?php echo $lottery['id']; ?>" class="details-button">View Details</a>
                        </div>
                    <?php endwhile; ?>
                </div>
            </section>
        </main>

        <footer>
            <p>&copy; 2024 dnLottery. All rights reserved.</p>
        </footer>
</body>

</html>