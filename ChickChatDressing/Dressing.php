<?php
   include("../server/connect.php");

   $EmoSql = 'SELECT * FROM emotiontag ';
   $StatusSql = 'SELECT * FROM Statustag';
   $queryEmo = mysqli_query($connect,$EmoSql);
   $queryStatus = mysqli_query($connect,$StatusSql);

?>
<?php 
session_start();

if(!isset($_SESSION['UserID'])){
    $_SESSION['error'] = "You must login first";
    header('location: ../ChickChatLogIn/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Image/IMG_1012.PNG" type="image/x-icon">
    <title>Dressing Page</title>
    <link rel="stylesheet" href="Dressing.css">
    <script src="https://kit.fontawesome.com/26997adfb2.js" crossorigin="anonymous"></script>
    <style>
        #Status {
            background: var(--box-color);
            min-width: 300px;
            max-width: 320px;
            font-size: 1.2rem;
            padding: 10px;
            border: none;
        }

        #Status:hover {
            background: yellow;
        }

        #Status option {
            background: var(--box-color);
        }
    </style>
</head>

<body>
    <header>
        <img src="image/IMG_1012.PNG" alt="">
    </header>
        <?php if(isset($_SESSION['error'])):?>
                <div class="error">
                    <h3>
                        <?php
                        echo $_SESSION['error'];
                        unset ($_SESSION['error']);
                        ?>
                    </h3>
                </div>
        <?php endif?>
    <div class="container">
        <div class="box box-1">
            <div class="button-left">
                <button class="face">face</button>
                <button class="clothes">clothes</button>
            </div>
        </div>
        <div class="box box-2">
            <div class="avatar-container">
                <div id="faceDiv" class="avatar-div">
                    <!-- Face content goes here -->
                </div>
                <div id="clothesDiv" class="avatar-div">
                    <!-- Clothes content goes here -->
                </div>
            </div>
            <form action="">
                <div class=" input-box Name">
                    <input type="text" required>
                    <label>Enter Your Name <i class="fa-solid fa-pencil"></i></label>
                </div>
            </form>
        </div>
        <div class="box box-3">
            <form action="Dressing_DB.php" method = "POST">
                <div class="input-box">
                    <select name="Status" id="Status">
                        <?php while($Status = mysqli_fetch_assoc($queryStatus)){?>
                            <option value="<?php echo $Status['StatusID']?>"><?php echo $Status['StatusName']?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="input-box">
                    <select name="Emotion" id="Status">
                        <?php while($Emotion = mysqli_fetch_assoc($queryEmo)){?>
                            <option value="<?php echo $Emotion['EmotionID']?>"><?php echo $Emotion['EmoName']?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="input-box description">
                    <textarea id="message" name="message" rows="8" ></textarea>
                    <label for="message">Description</label>
                </div>
                <button class="confirm" type = "submit" name = "confirm">confirm</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Dressing.js"></script>
<script>
    const faceBtn = document.querySelector('.face');
    const clothesBtn = document.querySelector('.clothes');

    const tagText = document.querySelector(".menu-item > p");
    const tagItems = document.querySelectorAll(".tag");

    const tagText2 = document.querySelector(".menu-item2 > p");
    const tagItems2 = document.querySelectorAll(".tag-2");

    const confirm = document.querySelector(".confirm");

    faceBtn.addEventListener('click', () => {
        window.location.href = 'face.html';
    })

    clothesBtn.addEventListener('click', () => {
        window.location.href = 'clothes.html';
    })

    $(document).ready(function () {
        $(".menu-item").click(function () {
            $(this).find(".dropdown").toggle();
        });
    });

    $(document).ready(function () {
        $(".menu-item2").click(function () {
            $(this).find(".dropdown").toggle();
        });
    });

    // confirm.addEventListener("click", () => {
    //     window.location.href = '../ChickChatHome/home.html';
    // })

</script>
</body>



</html>