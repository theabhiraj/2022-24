<?php
$showAlert = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';

    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    // Validate input fields
    if (empty($email) || empty($password) || empty($cpassword)) {
        $showError = "All fields are required";
    } elseif ($password != $cpassword) {
        $showError = "Passwords do not match";
    } else {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $showError = "Email already exists";
        } else {
            // Insert new user into the database
            $stmt = $conn->prepare("INSERT INTO users (email, password, dt) VALUES (?, ?, current_timestamp())");
            $stmt->bind_param("ss", $email, $password);

            if ($stmt->execute()) {
                // $showAlert = true;
                if ($result) { // Corrected comparison
                    $login = true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email; // Updated session variable
                    header("location: index.php");
                }
                // header("Location: index.php");
                exit;
            } else {
                $showError = "Something went wrong. Please try again later.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="losign.css">
</head>

<body>
    <?php require 'partials/_nav.php'; ?>

    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if ($showAlert) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>SUCCESS!</strong> Your account is created. You can now <a href="login.php" class="alert-link">login</a>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <?php if ($showError) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ERROR!</strong> <?php echo $showError; ?>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-header text-center">SignUp to Tourney!</div>
                    <div class="card-body text-center">
                        <form action="signup.php" method="post">

                            <!-- <div class="form-group">
                                <label for="profile_picture">Profile Picture</label>
                                <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
                            </div> -->

                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your E-Mail" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your Password" required>
                            </div>

                            <div class="form-group">
                                <label for="cpassword">Confirm Password</label>
                                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm your Password" required>
                            </div>

                            <button type="submit" class="btn btn-primary">SignUp</button>
                        </form>
                        <p class="mt-3 mb-0" style="font-size: medium;">Already have an account? <a href="login.php">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


