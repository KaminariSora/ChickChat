
<?php
session_start();
include("../server/connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['input'])) { 
        header("location: Dressing.php");
        $text = $_POST['input'];
        $sql = "UPDATE profile set Name_avatar = '$text' WHERE ProfileId = {$_SESSION['UserID']}";
        $query = mysqli_query($connect,$sql);
    }

    if (isset($_POST['Status']) OR isset($_POST['Emotion'])) { 
        $Status = $_POST['Status'];
        $Emotion = $_POST['Emotion'];
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
            header("location: ../ChickChatHome/home.php");

        }else{   /// นังไม่เคยลงทะเบียน
        if(empty($Status) OR (empty($Emotion))){
            $_SESSION['error'] = 'Please insert both Username And Password';
            header("location: ../ChickChatHome/home.php");
        }

        $ProfileSql = "INSERT INTO profile (profileID, EmotionID, StatusID) VALUES ({$_SESSION["UserID"]},$Status,$Emotion)";
        mysqli_query($connect,$ProfileSql);

        }
    }else{
        header("location: Dressing.php");
    }
} 
?>

