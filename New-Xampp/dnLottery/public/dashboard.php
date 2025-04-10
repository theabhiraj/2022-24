<?php
session_start();
include '../partial/db_connect.php'; // Adjust the path if needed

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];

// Fetch user points
$query = $conn->prepare("SELECT points FROM users WHERE username = ?");
$query->bind_param("s", $username);
$query->execute();
$result = $query->get_result();
$user = $result->fetch_assoc();
$user_points = $user['points'] ?? 0; // Default to 0 if no result

// Fetch active lotteries
$lotteries_query = $conn->prepare("SELECT id, name, image FROM lotteries WHERE status = 'active'");
$lotteries_query->execute();
$lotteries_result = $lotteries_query->get_result();
$lotteries = $lotteries_result->fetch_all(MYSQLI_ASSOC);

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['selected_number']) && isset($_POST['lottery_id']) && isset($_POST['bet_points'])) {
    $selected_number = intval($_POST['selected_number']);
    $lottery_id = intval($_POST['lottery_id']);
    $bet_points = intval($_POST['bet_points']);

    if ($bet_points > $user_points) {
        $error = 'You do not have enough points to place this bet.';
    } else {
        // Insert bet into database
        $stmt = $conn->prepare("INSERT INTO bets (user_id, lottery_id, bet_number, points, created_at) VALUES ((SELECT id FROM users WHERE username = ?), ?, ?, ?, NOW())");
        $stmt->bind_param("siii", $username, $lottery_id, $selected_number, $bet_points);

        if ($stmt->execute()) {
            $success = 'Bet placed successfully!';
            // Update user points
            $new_points = $user_points - $bet_points;
            $update_points_stmt = $conn->prepare("UPDATE users SET points = ? WHERE username = ?");
            $update_points_stmt->bind_param("is", $new_points, $username);
            $update_points_stmt->execute();
            $user_points = $new_points;
        } else {
            $error = 'Error placing bet. Please try again.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dnLottery - Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css"> <!-- Update the path if necessary -->
</head>

<body>
    <main>
        <?php include 'header.php'; ?>
        <div class="dashboard-container">
            <h2>Welcome, <?php echo htmlspecialchars($username); ?></h2>
            <p>Your Points: <?php echo htmlspecialchars($user_points); ?></p>

            <div class="bet-form">
                <h3>Place a Bet</h3>

                <?php if ($error): ?>
                    <div class="message error"><?php echo htmlspecialchars($error); ?></div>
                <?php endif; ?>
                <?php if ($success): ?>
                    <div class="message success"><?php echo htmlspecialchars($success); ?></div>
                <?php endif; ?>

                <form action="dashboard.php" method="post" id="bet-form">
                    <div class="number-selection">
                        <label>Select Number (1-20):</label>
                        <div class="number-buttons">
                            <?php for ($i = 1; $i <= 20; $i++): ?>
                                <button type="button" class="number-button" data-number="<?php echo $i; ?>"><?php echo $i; ?></button>
                            <?php endfor; ?>
                        </div>
                        <input type="hidden" name="selected_number" id="selected-number" required>
                    </div>

                    <div class="form-group">
                        <label for="lottery_id">Select Lottery:</label>
                        <div class="lottery-selection">
                            <?php foreach ($lotteries as $lottery): ?>
                                <div class="lottery-item" data-lottery-id="<?php echo $lottery['id']; ?>">
                                    <img src="../images/<?php echo htmlspecialchars($lottery['image']); ?>" alt="<?php echo htmlspecialchars($lottery['name']); ?>">
                                    <p><?php echo htmlspecialchars($lottery['name']); ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <input type="hidden" name="lottery_id" id="lottery_id" required>
                    </div>

                    <div class="form-group">
                        <label for="bet_points">Points to Bet:</label>
                        <div class="custom-select">
                            <select id="bet_points" name="bet_points" required>
                                <option value="">Select points</option>
                                <?php for ($i = 50; $i <= $user_points; $i += 50): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="submit-button" id="place-bet-button" disabled>Place Bet</button>
                </form>
            </div>

            <div class="user-bets">
                <h3>Your Bets</h3>
                <div class="bets-grid">
                    <?php
                    // Fetch user bets
                    $bets_query = $conn->prepare("SELECT b.bet_number, l.name, b.points FROM bets b JOIN lotteries l ON b.lottery_id = l.id WHERE b.user_id = (SELECT id FROM users WHERE username = ?)");
                    $bets_query->bind_param("s", $username);
                    $bets_query->execute();
                    $bets_result = $bets_query->get_result();

                    if ($bets_result->num_rows > 0) {
                        while ($bet = $bets_result->fetch_assoc()) {
                            echo '<div class="bet-item">';
                            echo '<div class="bet-number"><strong>Number:</strong> ' . htmlspecialchars($bet['bet_number']) . '</div>';
                            echo '<div class="bet-lottery"><strong>Lottery:</strong> ' . htmlspecialchars($bet['name']) . '</div>';
                            echo '<div class="bet-points"><strong>Points:</strong> ' . htmlspecialchars($bet['points']) . '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p class="no-bets">No bets placed yet.</p>';
                    }
                    ?>
                </div>
            </div>

        </div>
    </main>

    <script>
        const numberButtons = document.querySelectorAll('.number-button');
        const selectedNumberInput = document.getElementById('selected-number');
        let selectedNumber = null;

        numberButtons.forEach(button => {
            button.addEventListener('click', function() {
                if (selectedNumber === this.dataset.number) {
                    selectedNumber = null;
                    this.classList.remove('selected');
                } else {
                    if (selectedNumber !== null) {
                        document.querySelector(`[data-number="${selectedNumber}"]`).classList.remove('selected');
                    }
                    selectedNumber = this.dataset.number;
                    this.classList.add('selected');
                }
                selectedNumberInput.value = selectedNumber || '';
                checkFormValidity();
            });
        });

        document.querySelectorAll('.lottery-item').forEach(item => {
            item.addEventListener('click', function() {
                // Remove selection from any previously selected item
                document.querySelectorAll('.lottery-item').forEach(i => i.classList.remove('selected'));

                // Add selection to the clicked item
                this.classList.add('selected');

                // Set the hidden input value to the selected lottery's ID
                document.getElementById('lottery_id').value = this.dataset.lotteryId;

                // Check form validity
                checkFormValidity();
            });
        });

        document.getElementById('bet_points').addEventListener('change', checkFormValidity);

        function checkFormValidity() {
            const selectedNumber = document.getElementById('selected-number').value;
            const lotteryId = document.getElementById('lottery_id').value;
            const betPoints = document.getElementById('bet_points').value;
            const submitButton = document.getElementById('place-bet-button');
            if (selectedNumber && lotteryId && betPoints) {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }
    </script>
</body>

</html>