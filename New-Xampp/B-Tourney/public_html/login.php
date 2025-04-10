<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    $email = $_POST["email"]; // Updated variable name
    $password = $_POST["password"];
    $exists = false;

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";  // Updated query to use email
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) { // Corrected comparison
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email; // Updated session variable
        header("location: index.php");
    } else {
        $showError = "Invalid Credentials";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="losign.css">
    <title>Login</title>
</head>

<body>
    <?php require 'partials/_nav.php' ?>
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                if ($login) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>SUCCESS!</strong> You are logged in!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                }
                if ($showError) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ERROR!</strong> ' . $showError . '!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                }
                ?>
                <div class="card">
                    <div class="card-header text-center">Login to Tourney</div>
                    <div class="card-body text-center">
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label for="email">Email </label> <!-- Updated label -->
                                <input type="email" class="form-control text-center small-text" id="email" name="email" placeholder="Enter your email"> <!-- Updated input type and name -->
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control text-center small-text" id="password" name="password" placeholder="Enter your password">
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                        <p class="mt-3 mb-0" style="font-size:medium;">Don't have an account ? <a href="signup.php"> Create</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
</body>

</html>