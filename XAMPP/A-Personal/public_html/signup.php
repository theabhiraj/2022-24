<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $monumber = $_POST["monumber"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    //$exists=false;

    // Check whether this username Exists
    $existsSqlU = "SELECT * FROM `users` WHERE username = '$username'";
    $existsSqlM = "SELECT * FROM `users` WHERE monumber = '$monumber'";
    $existsSqlE = "SELECT * FROM `users` WHERE email = '$email'";
    $resultU = mysqli_query($conn, $existsSqlU);
    $resultM = mysqli_query($conn, $existsSqlM);
    $resultE = mysqli_query($conn, $existsSqlE);
        $numExistsRowsU = mysqli_num_rows($resultU);
        $numExistsRowsM = mysqli_num_rows($resultM);
        $numExistsRowsE = mysqli_num_rows($resultE);
    if($numExistsRowsU > 0 ){
        //$exists = true;
        $showError = "Username Already exists";
    }
    elseif($numExistsRowsM > 0 ){
        //$exists = true;
        $showError = "Mobile Number Already exists";
    }
    elseif($numExistsRowsE > 0 ){
        //$exists = true;
        $showError = "E-Mail Already exists";
    }
    else{
        //$exists = false;
        if(($password == $cpassword)){
            //$hash = password_hash($password);
              $sql = "INSERT INTO `users` (`monumber`, `username`, `email`,`password`,`dt`) VALUES ('$monumber','$username','$email','$password',current_timestamp())";
              $result = mysqli_query($conn, $sql);
             if($result){
                  $showAlert = true;
                  header("Location: login.php");
                  exit;
             }
         }   
         else{
           $showError = "Password do not match";
        }
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

     <title>SignUp</title>
  </head>
     <body>
     <?php require 'partials/_nav.php' ?>
     <?php
     if($showAlert){
     echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>SUCCESS!</strong> Your account is created you can login!
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
        </div> ';
        
        header("location: login.php");
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

<div class="container">
    <div class="text-center" class="a">
    <br><h1>SignUp to BGMI Tourney !</h1><br>
    <form action="signup.php" method="post">
        <div class="form-group">
             <label for="monumber"><strong>Mobile Number</strong></label>
           <input type="number" class="form-control" id="monumber" name="monumber" aria-describedby="emailHelp" required>
          <small id="error-message" class="text-danger"></small>
        </div>
        <div class="form-group">
            <label for="username"><strong>Username</strong></label>
            <input type="text" maxlength="11" class="form-control" id="username" name="username" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="email"><strong> E-Mail </strong></label>
            <input type="email" maxlength="255" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="password"><strong>Password</strong></label>
            <input type="password" maxlength="25" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="cpassword"><strong>Confirm Password</strong></label>
            <input type="password" class="form-control" id="cpassword" name="cpassword">
            <small id="emailHelp" class="form-text text-muted"><strong> Make sure to type the same password </strong></small>
        </div>
        <button type="submit" class="a">SignUp</button>
    </form>
    </div>
</div>
<script>
    
document.getElementById('monumber').addEventListener('input', function() {
    var mobileNumber = this.value.trim();
    var errorMessage = document.getElementById('error-message');
    
    if (mobileNumber.length !== 10) {
        errorMessage.textContent = 'Mobile Number must be exactly 10 digits';
    } else {
        errorMessage.textContent = '';
    }
});
</script>
     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
     </body>
</html>