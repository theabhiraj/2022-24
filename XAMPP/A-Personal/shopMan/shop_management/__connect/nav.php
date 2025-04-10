<?php
//session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin=true;
}
else{
  $loggedin = false;
}

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  
  <a class="navbar-brand" href="index.php">
    <img src="img/LOGO.jpeg" alt=""style="max-height: 30px; max-width: 130px;">
    shopMan
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">';
    if($loggedin){
      echo'<li class="nav-item active">
        <a class="nav-link" href="welcome.php">Home <span class="sr-only">(current)</span></a>
      </li>';
    }
      if(!$loggedin){
      echo'<li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>';
      }
     /* if(!$loggedin){
      echo'<li class="nav-item">
        <a class="nav-link" href="signup.php">Signup</a>
      </li>';
      } */
      if($loggedin){
      echo '<li class="nav-item">
        <a class="nav-link" href="logout.php">logout</a>
      </li>';
      }
      echo '<li class="nav-item">
        <a class="nav-link" href="Required/support.php">Support</a>
      </li>';
      echo '<li class="nav-item">
        <a class="nav-link" href="Required/policies">Policies</a>
      </li>';
      
    echo '</ul>
    
  </div>
</nav>';
?>