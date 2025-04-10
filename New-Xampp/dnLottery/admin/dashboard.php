<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
include '../partial/db_connect.php'; // Update the path if necessary

// Fetch statistics
$total_lotteries = $conn->query("SELECT COUNT(*) as count FROM lotteries")->fetch_assoc()['count'];
$total_users = $conn->query("SELECT COUNT(*) as count FROM users")->fetch_assoc()['count'];
$active_lotteries = $conn->query("SELECT COUNT(*) as count FROM lotteries WHERE status='active'")->fetch_assoc()['count'];

// Fetch recent activities
$recent_lotteries = $conn->query("SELECT * FROM lotteries ORDER BY launch_date DESC LIMIT 5");
$recent_users = $conn->query("SELECT * FROM users ORDER BY created_at DESC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="CSS/dashboard.css"> <!-- Update the path if necessary -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Include Chart.js library -->
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="dashboard-container">
        <section class="stats-section">
            <div class="stats-card">
                <h2>Total Lotteries</h2>
                <p><?php echo $total_lotteries; ?></p>
            </div>
            <div class="stats-card">
                <h2>Active Lotteries</h2>
                <p><?php echo $active_lotteries; ?></p>
            </div>
            <div class="stats-card">
                <h2>Total Users</h2>
                <p><?php echo $total_users; ?></p>
            </div>
        </section>

        <section class="chart-section">
            <h2>Lottery Statistics</h2>
            <canvas id="lotteryChart"></canvas>
        </section>

        <section class="recent-activities">
            <div class="recent-lotteries">
                <h2>Recent Lotteries</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Launch Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($lottery = $recent_lotteries->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $lottery['id']; ?></td>
                            <td><?php echo htmlspecialchars($lottery['name']); ?></td>
                            <td><?php echo htmlspecialchars($lottery['launch_date']); ?></td>
                            <td><?php echo htmlspecialchars($lottery['status']); ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <div class="recent-users">
                <h2>Recent Users</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Signup Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($user = $recent_users->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo htmlspecialchars($user['username']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo htmlspecialchars($user['created_at']); ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    <div class="just">
        
    </div>
    <?php include 'footer.php'; ?>

    <script>
        // Chart.js configuration
        var ctx = document.getElementById('lotteryChart').getContext('2d');
        var lotteryChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total Lotteries', 'Active Lotteries', 'Total Users'],
                datasets: [{
                    label: 'Statistics',
                    data: [<?php echo $total_lotteries; ?>, <?php echo $active_lotteries; ?>, <?php echo $total_users; ?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>

























<!-- < ?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
include '../partial/db_connect.php'; // Update the path if necessary

// Fetch statistics
$lottery_count = $conn->query("SELECT COUNT(*) AS count FROM lotteries")->fetch_assoc()['count'];
$user_count = $conn->query("SELECT COUNT(*) AS count FROM users")->fetch_assoc()['count'];
$active_lotteries = $conn->query("SELECT COUNT(*) AS count FROM lotteries WHERE status = 'active'")->fetch_assoc()['count'];
$inactive_lotteries = $conn->query("SELECT COUNT(*) AS count FROM lotteries WHERE status = 'inactive'")->fetch_assoc()['count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="CSS/dashboard.css"> < !-- Update the path if necessary -- >
</head>
<body>
    < ?php include 'header.php'; ?>
    <div class="dashboard-content">
        <section class="stats-section">
            <div class="stats-card">
                <h2 class="stats-title">Total Lotteries</h2>
                <p class="stats-number">< ?php echo $lottery_count; ?></p>
            </div>
            <div class="stats-card">
                <h2 class="stats-title">Total Users</h2>
                <p class="stats-number">< ?php echo $user_count; ?></p>
            </div>
            <div class="stats-card">
                <h2 class="stats-title">Active Lotteries</h2>
                <p class="stats-number">< ?php echo $active_lotteries; ?></p>
            </div> 
            <div class="stats-card">
                <h2 class="stats-title">Inactive Lotteries</h2>
                <p class="stats-number">< ?php echo $inactive_lotteries; ?></p>
            </div>
        </section>
        <section class="recent-lotteries">
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
                    < ?php
                    $recent_lotteries = $conn->query("SELECT * FROM lotteries ORDER BY launch_date DESC LIMIT 5");
                    while ($lottery = $recent_lotteries->fetch_assoc()):
                    ?>
                    <tr>
                        <td>< ?php echo $lottery['id']; ?></td>
                        <td>< ?php echo htmlspecialchars($lottery['name']); ?></td>
                        <td>< ?php echo htmlspecialchars($lottery['launch_date']); ?></td>
                        <td>< ?php echo htmlspecialchars($lottery['status']); ?></td>
                    </tr>
                    < ?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </div>
    < ?php include 'footer.php'; ?>
</body>
</html> -->