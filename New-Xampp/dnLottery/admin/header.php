<!-- <header class="admin-header">
    <div class="header-content">
        <h1 class="header-title">dnLottery Admin</h1>
        <a href="logout.php" class="header-logout">Logout</a>
    </div>
</header> -->

<!-- < ?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/header.css"> <!-- Update the path if necessary -->
</head>
<body>
    <header class="main-header">
        <div class="logo">
            <a href="index.php" class="logo-text">dnLottery Admin</a>
        </div>
        <nav class="main-nav">
            <ul class="nav-list">
                <li><a href="index.php" class="nav-link">Dashboard</a></li>
                <li><a href="manageLottery.php" class="nav-link">Manage Lotteries</a></li>
                <li><a href="users.php" class="nav-link">Manage Users</a></li>
                <li><a href="manageUsers.php" class="nav-link">Manage Users</a></li>
                <li><a href="logout.php" class="nav-link logout-link">Logout</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>
