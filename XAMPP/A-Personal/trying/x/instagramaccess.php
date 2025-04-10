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
</head>

<body>

    <h1>Welcome to Your Website</h1>
    <a href="<?php echo $authUrl; ?>">Login with Instagram</a>

</body>

</html>