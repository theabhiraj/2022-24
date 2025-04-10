<?php
session_start();

$instagramClientId = 'your_instagram_client_id';
$instagramClientSecret = 'your_instagram_client_secret';
$redirectUri = 'your_redirect_uri';

$authUrl = "https://api.instagram.com/oauth/authorize/?client_id={$instagramClientId}&redirect_uri={$redirectUri}&response_type=code&scope=basic";

if (isset($_GET['code'])) {
    $tokenUrl = "https://api.instagram.com/oauth/access_token";
    $postData = [
        'client_id' => $instagramClientId,
        'client_secret' => $instagramClientSecret,
        'grant_type' => 'authorization_code',
        'redirect_uri' => $redirectUri,
        'code' => $_GET['code']
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $tokenUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = json_decode(curl_exec($ch), true);
    curl_close($ch);

    // Access token is in $response['access_token']
    // Use it to make API requests or store in session for further use
    $_SESSION['access_token'] = $response['access_token'];

    // Redirect to a page after successful login
    header('Location: /welcome.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        a {
            display: block;
            text-align: center;
            background-color: #3897f0;
            color: #fff;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
        }

        a:hover {
            background-color: #2684f8;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <h1>Welcome to Your Website</h1>

        <?php
        // Check if the user is already logged in
        if (isset($_SESSION['access_token'])) {
            echo '<p>You are already logged in.</p>';
        } else {
            echo '<form>';
            echo '<input type="text" name="username" placeholder="Username"><br>';
            echo '<input type="password" name="password" placeholder="Password"><br>';
            echo '<a href="' . $authUrl . '">Login with Instagram</a>';
            echo '</form>';
        }
        ?>

    </div>

</body>
</html>
