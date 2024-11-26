<?php
$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "govapp_db";


$conn =  mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    echo"connection failed";
}
?>
