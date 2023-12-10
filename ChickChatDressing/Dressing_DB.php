<?php
session_start();
include("../server/connect.php");

// if(isset($_POST['comfirm'])){
//     $Status = array();
//     $Emotion = array();
//     $Status = $_POST['Status'];
//     $Emotion = $_POST['Emotion'];
//     $sql = 'SELECT * FROM profile WHERE ProfileID = $_SESSION["UserID"]';
//     $query = mysqli_query($connect,$sql);
    
//     if((mysqli_num_rows($query))==1){    ///check Did it have data ?
      
//     }else{   /// Not have data 
//        if(empty($Status) OR (empty($Emotion))){
//         $_SESSION['error'] = 'Please insert both Username And Password';
//         header("location: Dressing.php");
//        }
//        $StatusTagSql ="SELECT StatusID FROM statustag WHERE StatusName = 'โสด'";
//        $StaQuery = mysqli_query($connect,$StatusTagSql);
//        $StaTag = mysqli_fetch_assoc($connect,$StaQuery);

//        $EmoTagSql ="SELECT EmotionID FROM emotiontag WHERE emoName = '$Emotion'";
//        $EmoQuery = mysqli_query($connect,$EmoTagSql);
//        $EmoTag = mysqli_fetch_assoc($connect,$EmoQuery);

//        $ProfileSql = "INSERT INTO profile VALUES({$_SESSION['UserID']}, {$Emotag['EmotionID']}, {$StaTag['StatusID']})";
//        mysqli_query($connect,$ProfileSql);

//     //    header('location: Dressing.php');
//     }
    
// }

if(isset($_POST['Status'])){
    echo 'dfghjkl';
}
