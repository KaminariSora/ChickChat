<?php
session_start();
include("../server/connect.php");

if(isset($_POST['login_user'])){
    $username = mysqli_real_escape_string($connect,$_POST['username']);
    $password = mysqli_real_escape_string($connect,$_POST['password']);

    $password = md5($password);
    $sql = "SELECT UserID FROM users WHERE Username = '$username' and Password = '$password'";
    $query = mysqli_query($connect,$sql);
    $result = mysqli_fetch_assoc($query);

    if((mysqli_num_rows($query)) == 1){  //ถ้ามีข้อมูลนี้อยู่จริงๆ
        $_SESSION["UserID"] = $result["UserID"];
        header("location: ../ChickChatHome/home.php");
    }else{
        $_SESSION['error'] = "wrong username/password combination";
        header("location: login.php");
    }
}