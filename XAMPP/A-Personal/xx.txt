<?php
$server = "localhost";
$monumber = "9309814804";
$username = "id21431408_donttrytohack";
$email = "theabhiraj.in@gmail.com";
$password = "Y-c-a-nt-hack-to-@site&93";
$database = "users";
$database = "id21431408_tourney";

$conn = mysqli_connect( $server,$username,$password, $database );
if (!$conn){
//    echo "Success";
//}
//else{
    die("Error".mysqli_connect_error());
}
?>