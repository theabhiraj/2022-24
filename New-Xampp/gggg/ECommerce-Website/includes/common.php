<?php
    // $con = mysqli_connect("localhost", "username", "password", "users")
    $conn = new mysqli("localhost", "username", "password", "users");
    // or die(mysqli_error($con));
    if(!isset($_SESSION)){
      session_start();
    }
?>
