<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
include '../partial/db_connect.php'; // Update the path if necessary

// Handle adding a new lottery
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_lottery'])) {
    $name = $_POST['name'];
    $launch_date = $_POST['launch_date'];
    $status = $_POST['status'];
    $image = $_FILES['image']['name'];

    // Handle image upload
    if ($image) {
        $target_dir = "../images/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    }

    $stmt = $conn->prepare("INSERT INTO lotteries (name, launch_date, status, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $launch_date, $status, $image);
    $stmt->execute();
}

// Handle deleting a lottery
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $stmt = $conn->prepare("DELETE FROM lotteries WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// Fetch lotteries
$lotteries = $conn->query("SELECT * FROM lotteries");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Lotteries</title>
    <link rel="stylesheet" href="CSS/manageLottery.css"> <!-- Update the path if necessary -->
</head>
<body>
    <header class="manage-header">
        <h1 class="manage-title">Manage Lotteries</h1>
    </header>
    <div class="manage-content">
        <section class="add-lottery-form">
            <h2 class="form-title">Add New Lottery</h2>
            <form action="" method="post" enctype="multipart/form-data" class="form">
                <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="launch_date" class="form-label">Launch Date</label>
                    <input type="date" id="launch_date" name="launch_date" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="form-input" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" id="image" name="image" class="form-input">
                </div>
                <button type="submit" name="add_lottery" class="form-submit">Add Lottery</button>
            </form>
        </section>
        <section class="lotteries-list">
            <h2 class="list-title">Existing Lotteries</h2>
            <table class="lotteries-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Launch Date</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($lottery = $lotteries->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $lottery['id']; ?></td>
                        <td><?php echo htmlspecialchars($lottery['name']); ?></td>
                        <td><?php echo htmlspecialchars($lottery['launch_date']); ?></td>
                        <td><?php echo htmlspecialchars($lottery['status']); ?></td>
                        <td>
                            <?php if ($lottery['image']): ?>
                                <img src="../images/<?php echo htmlspecialchars($lottery['image']); ?>" alt="Lottery Image" class="lottery-image">
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="?delete_id=<?php echo $lottery['id']; ?>" class="delete-button">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
