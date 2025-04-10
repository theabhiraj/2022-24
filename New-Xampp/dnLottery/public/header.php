<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>dnLottery</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="container">
                <a href="index.php" class="navbar-brand">dnLottery</a>
                <div class="navbar-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="navbar-links">
                    <a href="index.php" class="nav-link">Home</a>
                    <a href="lotteries.php" class="nav-link">Lotteries</a>
                    <a href="dashboard.php" class="nav-link">Dashboard</a>
                </div>
                <div class="navbar-user">
                    <?php if (isset($_SESSION['username'])): ?>
                        <span class="username">Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                        <span class="points">Points: <?php echo htmlspecialchars($user_points); ?></span>
                        <a href="logout.php" class="logout-btn">Logout</a>
                    <?php else: ?>
                        <a href="login.php" class="login-btn">Login</a>
                        <a href="register.php" class="login-btn">Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const navbarToggle = document.querySelector('.navbar-toggle');
            const navbarLinks = document.querySelector('.navbar-links');
            const navbarUser = document.querySelector('.navbar-user');

            navbarToggle.addEventListener('click', () => {
                navbarLinks.classList.toggle('active');
                navbarUser.classList.toggle('active');
            });
        });
    </script>
</body>

</html>
