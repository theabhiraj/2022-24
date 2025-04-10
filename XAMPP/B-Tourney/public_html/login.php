<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    //    $monumber = $_POST["monumber"];
    $exists = false;

    $sql = "Select * from users where username='$username' AND password='$password'";  //AND monumber='$monumber' 
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($username && $password = $num) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['$username'] = $username;
        header("location: welcome.php");
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
    <style>
        body {
            background-color: #f0f0f0;
        }

        .container {
            margin-top: 80px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 0% 0% 0% 0%;
        }

        .card-header {
            background-color: #333;
            color: white;
            text-align: center;
        }

        .card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #333;
            border: none;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #555;
        }

        .alert {
            border-radius: 10px;
        }

        .small-text {
            font-size: 12px;
        }
    </style>
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
                                <label for="username">Username</label>
                                <input type="text" class="form-control text-center small-text" id="username" name="username" placeholder="Enter your username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control text-center small-text" id="password" name="password" placeholder="Enter your password">
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
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