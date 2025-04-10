<?php
$server = "localhost";
$monumber = "9309814804";
$username = "root";
$email = "theabhiraj.in@gmail.com";
$password = "";
$database = "users";
$database = "users";

$conn = mysqli_connect( $server,$username,$password, $database );
if (!$conn){
//    echo "Success";
//}
//else{
    die("Error".mysqli_connect_error());
}
?>