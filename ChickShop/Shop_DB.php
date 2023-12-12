<?php
 session_start();
 include("../server/connect.php");

 if(isset($_GET['chickValue'])){
    $chickValue = $_GET['chickValue'];
    $sql = "UPDATE profile SET Chick_count= Chick_count + $chickValue where profileId = {$_SESSION['UserID']}";
    mysqli_query($connect,$sql);
    header("location: chickShop.php");
 }
 ?>