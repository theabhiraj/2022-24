<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $monumber = $_POST["monumber"];
    $exists=false;
   
        $sql = "Select * from users where username='$username' AND monumber='$monumber' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $num= mysqli_num_rows($result);
        if($username && $monumber && $password = $num ){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['$username'] = $username;
            header("location: welcome.php");
        }
     
    else{
        $showError = "Invalid Credentials";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
       <style>

.container {
            margin-top: 5%;
            
            text-align: center;
    margin: 100px auto;
    padding: 20px;
    
    border: 1px solid #000;
    border-radius: 10px;
    width: 600px;
    background-color: #000;
    color: aliceblue;
        }
        .text-center{
            font-weight: lighter;
        }

        .a {
    text-decoration: none;
    color: #000; /* Black links */
    background-color: #fff; /* White background for links */
    font-weight: bold;
    padding: 10px 20px;
    border: 1px solid #000;
    border-radius: 5px;
    display: inline-block;
    transition: background-color 0.3s, color 0.3s;
}

.a:hover {
    background-color: #000; /* Black background on hover */
    color: #fff; /* White text on hover */
}

       </style> 
     <title>Login</title>
  </head>
     <body>
     <?php require 'partials/_nav.php' ?>
     <?php
     if($login){
     echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>SUCCESS!</strong> You are logged in !
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
     </div> ';
    }
    if($showError){
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>ERROR!</strong> '.$showError.'!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div> ';
       }
    ?>
        <br>
        <div class="container text-center">
            
    <div class="text-center" class="a">

    <h1>Login to BGMI Tourney !</h1><br>
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="monumber"><strong> Mobile Number </strong></label>
            <input type="number" class="form-control" id="monumber" name="monumber" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="username" ><strong>Username</strong></label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="password" ><strong>Password</strong></label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="a">L o g i n</button>
    </form>
    </div>
</div>


     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
     </body>
</html>