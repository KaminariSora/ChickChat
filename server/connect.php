<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chickchat_db";

//create connection 
$connect = mysqli_connect($servername,$username,$password,$dbname);

//check connection
if(!$connect){
    die("connection falied" . mysqli_connect_error());
}
?>