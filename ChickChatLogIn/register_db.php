<?php
session_start();
include("../server/connect.php");


if(isset($_POST["confrim_Regis"])){
    $username = mysqli_real_escape_string($connect,$_POST['Username']);
    $password = mysqli_real_escape_string($connect,$_POST['password_1']);
    $ConfrimPassword = mysqli_real_escape_string($connect,$_POST['password_2']);
}//ดักmethod post

if($password != $ConfrimPassword){
    $_SESSION['error'] = 'The two password do not match';
    header('location: login.php');
}//chech matching password

$Dbpassword = md5($password);
$user_check_query = "SELECT * FROM users where Username = '$username'AND Password = '$Dbpassword'";
$query = mysqli_query($connect,$user_check_query);
$result = mysqli_fetch_assoc($query);
//query old data form DB

if(!(mysqli_num_rows($query)) == 1){
        $_SESSION['error'] = 'Username already exist';
        header('location: login.php');
}
//
$sql = "INSERT INTO users (Username, Password) VALUES ('$username', '$Dbpassword');";
mysqli_query($connect,$sql);
//insert new data to DB
//
$sql = "SELECT UserID FROM users where Username = '$username'AND Password = '$Dbpassword'";
$query = mysqli_query($connect,$sql);
$result = mysqli_fetch_assoc($query);
$_SESSION["UserID"] = $result["UserID"];
//select UserID  and keep in session
$n = 1;
while ($n < 7) {
    $CatSql = "INSERT INTO usercatalog(UserID,Catproduct) VALUES ({$result['UserID']}, $n)";
    mysqli_query($connect, $CatSql);
    $n++;
} 
//insert UserCatalog   
header('location: ../ChickChatDressing/Dressing.php');


?>