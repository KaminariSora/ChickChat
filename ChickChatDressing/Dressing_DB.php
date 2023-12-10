<?php
session_start();
include("../server/connect.php");

if(isset($_POST['confirm'])){
    $Status = $_POST['Status'];
    $Emotion = $_POST['Emotion'];
    if(isset($_POST['name'])){
        $sql = "UPDATE profile set Name_avatar = {$_POST['name']} WHERE ProfileId = {$_SESSION['UserID']}";
        $query = mysqli_query($connect,$sql);
        header("location: Dressing.php");
    }
    $Name = $_POST['name'];
    $sql = "SELECT * FROM profile WHERE ProfileID = {$_SESSION['UserID']}";
    $query = mysqli_query($connect,$sql);
    $result = mysqli_fetch_assoc($query);
    if((mysqli_num_rows($query))==1){    ///]ลงทะเบียนแล้ว
        if(isset($_POST['Status'])){
            $sql = "UPDATE profile set StatusID = $Status WHERE ProfileId = {$_SESSION['UserID']}";
            $query = mysqli_query($connect,$sql);
        }
        if(isset($_POST['Emotion'])){
            $sql = "UPDATE profile set EmotionID = $Emotion WHERE ProfileId = {$_SESSION['UserID']}";
            $query = mysqli_query($connect,$sql);
        }
    }else{   /// นังไม่เคยลงทะเบียน
       if(empty($Status) OR (empty($Emotion))){
        $_SESSION['error'] = 'Please insert both Username And Password';
        header("location: Dressing.php");
       }

      $ProfileSql = "INSERT INTO profile (profileID, EmotionID, StatusID) VALUES ({$_SESSION["UserID"]},$Status,$Emotion)";
      mysqli_query($connect,$ProfileSql);

    }
    header('location: ../ChickChatHome/home.php');
}
?>
