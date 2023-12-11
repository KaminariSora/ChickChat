<?php 
   session_start();
   include("../server/connect.php");

   $Cardsql = "SELECT * FROM profile WHERE profileId = {$_SESSION['UserID']} ";
   $CardQuery = mysqli_query($connect,$Cardsql);
   $CardData = mysqli_fetch_assoc($CardQuery);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChickShop</title>
    <link rel="stylesheet" href="ChickShop.css">
    <link rel="icon" href="Image/IMG_1012.PNG" type="image/x-icon">
    <script src="https://kit.fontawesome.com/26997adfb2.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="confirm-box">
        <div class="Q">คุณต้องการซื้อสินค้านี้หรือไม่</div>
        <div class="A">
            <button class="yes">YES</button>
            <button class="no">NO</button>
        </div>
    </div>
    <div class="successful">
        <div class="successful-title">การซื้อเสร็จสิ้น</div>
        <div class="successful-button">
            <button class="ok">OK</button>
        </div>
    </div>
    <header>
        <img src="image/IMG_1012.PNG" class="logo">
        <div class="chicken">
            <p><?php echo $CardData['Chick_count']?></p>
            <img src="image/IMG_0991.PNG" alt="none">
        </div>
    </header>
    <div class="container">
        <nav class="navbar">
            <button class="av-shop focus">Avatar Shop</button>
            <br>
            <button class="chick">Chick Shop</button>
        </nav>
        <div class="shop-zone avatar-shop active">
            <div class="wrapper">
                <div class="item" id="1">
                    <img src="../ImageAsset/Clothes/Clothes7.PNG" alt="">
                    <div class="price">${Price}</div>
                </div>
                <div class="item" id="2">
                    <img src="../ImageAsset/Clothes/Clothes12.PNG" alt="">
                    <div class="price">${Price}</div>
                </div>
                <div class="item" id="3">
                    <img src="../ImageAsset/Clothes/Clothes9.PNG" alt="">
                    <div class="price">${Price}</div>
                </div>
                <div class="item" id="4">
                    <img src="../ImageAsset/Face/Face7.PNG" alt="">
                    <div class="price">${Price}</div>
                </div>
                <div class="item" id="5">
                    <img src="../ImageAsset/Face/Face7.PNG" alt="">
                    <div class="price">${Price}</div>
                </div>
                <div class="item" id="6">
                    <img src="../ImageAsset/Face/Face7.PNG" alt="">
                    <div class="price">${Price}</div>
                </div>
            </div>
        </div>
        <div class="shop-zone chick-shop">
            <div class="wrapper">
                <div class="item" id="7">
                    <img src="../ImageAsset/package/Pack1.PNG" alt="">
                    <div class="price">${Price}</div>
                </div>
                <div class="item" id="8">
                    <img src="../ImageAsset/package/Pack2.PNG" alt="">
                    <div class="price">${Price}</div>
                </div>
                <div class="item" id="9">
                    <img src="../ImageAsset/package/Pack3.PNG" alt="">
                    <div class="price">${Price}</div>
                </div>
                <div class="item" id="10">
                    <img src="../ImageAsset/package/Pack4.PNG" alt="">
                    <div class="price">${Price}</div>
                </div>
                <div class="item" id="11">
                    <img src="../ImageAsset/package/Pack5.PNG" alt="">
                    <div class="price">${Price}</div>
                </div>
                <div class="item" id="12">
                    <img src="../ImageAsset/package/Pack6.PNG" alt="">
                    <div class="price">${Price}</div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-container" id="home">
            <i class="fa-solid fa-house"></i>
        </div>
    </footer>
    <script>
        const shopZone = document.querySelectorAll('.shop-zone');
        const avatarShopBtn = document.querySelector('.av-shop');
        const avatarShop = document.querySelector('.avatar-shop');
        const chickShopBtn = document.querySelector('.chick');
        const chickShop = document.querySelector('.chick-shop');
        const home = document.getElementById('home');
        const items = document.querySelectorAll('.item');
        const confirmBox = document.querySelector('.confirm-box');
        const successful = document.querySelector('.successful');
        const yes = document.querySelector('.yes');
        const no = document.querySelector('.no');

        avatarShopBtn.addEventListener('click', () => {
            console.log('click on avatar shop');
            chickShop.classList.remove('active');
            avatarShop.classList.add('active');
            chickShopBtn.classList.remove('focus');
            avatarShopBtn.classList.add('focus');
            console.log('After adding "active":', avatarShop.classList);
        });

        chickShopBtn.addEventListener('click', () => {
            console.log('click on chick shop');
            avatarShop.classList.remove('active');
            chickShop.classList.add('active');
            avatarShopBtn.classList.remove('focus');
            chickShopBtn.classList.add('focus');
            console.log('After adding "active":', chickShop.classList);
        });

        function handleYesClick() {
            console.log(`Confirm.`);

            const yesButton = document.querySelector('.yes');
            let clickCount = parseInt(yesButton.dataset.clickCount) || 0;
            clickCount++;

            if (clickCount >= 100) {
                yesButton.removeEventListener('click', handleYesClick);
            }
            
            confirmBox.classList.remove('active');
            successful.classList.add('active');
            ok.addEventListener('click', handleOK);

            yesButton.dataset.clickCount = clickCount;
        }

        const yesButton = document.querySelector('.yes');
        yesButton.addEventListener('click', handleYesClick);

        function handlePopUp() {
            confirmBox.classList.add('active');

            yes.addEventListener('clcik', handleYesClick);

            no.addEventListener('click', () => {
                confirmBox.classList.remove('active');
            })
        }

        function handleOK() {
            successful.classList.remove('active');
            console.log("successful");
        }

        for (let i = 1; i <= 12; i++) {
            const itemId = `${i}`;
            const item = document.getElementById(itemId);

            if (item) {
                item.addEventListener('click', (event) => {
                    event.stopPropagation();
                    handlePopUp();
                });
            } else {
                console.error(`Element with ID ${itemId} not found.`);
            }
        }

        home.addEventListener('click', () => {
            window.location.href = '../ChickChatHome/home.php';
        })
    </script>
</body>

</html>