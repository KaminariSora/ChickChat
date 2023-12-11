<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="Image/IMG_1012.PNG" type="image/x-icon">
    <script src="https://kit.fontawesome.com/26997adfb2.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="message-container">
        <div class="mark"><i class="fa-solid fa-circle-xmark"></i></div>
        <div class="message-box">
            <div class="message">hello</div>
            <div class="message">hello</div>
            <div class="message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo aperiam numquam aspernatur, ex, quas minima ratione soluta voluptates, provident omnis nisi quo. Saepe non porro suscipit voluptate autem voluptatibus ipsa.</div>
            <div class="message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo aperiam numquam aspernatur, ex, quas minima ratione soluta voluptates, provident omnis nisi quo. Saepe non porro suscipit voluptate autem voluptatibus ipsa.</div>
            <div class="message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo aperiam numquam aspernatur, ex, quas minima ratione soluta voluptates, provident omnis nisi quo. Saepe non porro suscipit voluptate autem voluptatibus ipsa.</div>
            <div class="message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo aperiam numquam aspernatur, ex, quas minima ratione soluta voluptates, provident omnis nisi quo. Saepe non porro suscipit voluptate autem voluptatibus ipsa.</div>
            <div class="message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo aperiam numquam aspernatur, ex, quas minima ratione soluta voluptates, provident omnis nisi quo. Saepe non porro suscipit voluptate autem voluptatibus ipsa.</div>
        </div>
    </div>
    <div class="container">
        <div class="grid">
            <header class="header">
                <div class="banner">
                    <img src="image/IMG_1012.PNG" class="inside-banner" alt="">
                </div>
                <div class="chicken">
                    <p>${Number}</p>
                    <img src="image/IMG_0991.PNG" alt="">
                </div>
            </header>
            <div class="card-container">
                <div class="card">
                    <header class="head">
                        <span class="logo">
                            <img src="image/IMG_0991.PNG" alt="" />
                            <h5>บัตรประจำตัวประชากรchick</h5>
                            <h5>Chick National ID Card</h5>
                            <br>
                        </span>
                    </header>
                    <span class="ID">
                        <h5>เลชประจำตัวชิค</h5>
                        <h5>${Number}</h5>
                    </span>
                    <span class="ID">
                        <h5>ชื่อ</h5>
                        <h5>${Name}</h5>
                    </span>
                    <span class="ID">
                        <h5>ประเภท</h5>
                        <h5>${Type}</h5>
                        <h5>ซอส</h5>
                        <h5>${Sources}</h5>
                    </span>
                    <div class="card-details">
                        <div class="name-number">
                            <img src="image/Screenshot 2023-10-28 161027.png" class="toe">
                        </div>
                        <div class="valid-date">
                            <h6>ตลอดชีพ</h6>
                            <h6>วันหมดอายุ</h6>
                            <h5>none</h5>
                        </div>
                        <div class="logo-img">
                            <img src="image/IMG_1012.PNG" class="ChickChat">
                        </div>
                    </div>
                </div>
            </div>
            <div class="character">
                <div class="dressing">
                    <!-- Avatar zone -->
                    <div class="avatar-container">
                        <div id="faceDiv" class="avatar-div">
                            <!-- Face content goes here -->
                        </div>
                        <div id="clothesDiv" class="avatar-div">
                            <!-- Clothes content goes here -->
                        </div>
                        <a href="../ChickChatDressing/Dressing.php"><i class="fa-solid fa-pencil" id="pencil"></i></a>
                    </div>
                    <div class="random">Random</div>
                </div>
            </div>
        </div>
    </div>
    <div class="HowToUse" style="display: none;">
        <div class="container-HowToUse">
            <div class="slider-wrapper"> 
                <button class="slide-button" id="prev-slide"><i class="fa-solid fa-arrow-left"></i></button>
                <div class="image-list">
                    <div>
                        <img src="Image/Login.png" alt="img-1" class="image-item">
                        <h1 class="subtitle">Log in</h1>
                        <p class="description">กด <u>Log in</u> เข้าสู่ระบบ ในการเข้าสู่ระบบครั้งแรก user
                            จะได้รับ<u>น่องไก่</u> 5 น่อง การเข้าสู่ระบบแต่ละวัน user จะได้รับสิทธิ์การส่ง <u>like</u>
                            ให้ 10 ครั้งต่อวัน</p>
                    </div>
                    <div class="Create_avatar">
                        <img src="Image/Create_avatar.png" alt="img-1" class="image-item">
                        <h1 class="subtitle">Create Avatar</h1>
                        <p class="description">เมื่อทำการ <u>Log in</u> เรียบร้อยแล้ว user จะสามารถสร้าง <u>avatar</u>
                            เพื่อใช้ในการพูดคุย นอกจากนี้ยังสามารถติด <u>Tag</u> บอกความรู้สึกหรือสถานะได้</p>
                    </div>
                    <div>
                        <img src="Image/Create_avatar.png" alt="img-1" class="image-item">
                        <h1 class="subtitle">Create Avatar</h1>
                        <p class="description">เมื่อทำการ <u>Log in</u> เรียบร้อยแล้ว user จะสามารถสร้าง <u>avatar</u>
                            เพื่อใช้ในการพูดคุย นอกจากนี้ยังสามารถติด <u>Tag</u> บอกความรู้สึกหรือสถานะได้</p>
                    </div>
                    <div>
                        <img src="Image/Create_avatar.png" alt="img-1" class="image-item">
                        <h1 class="subtitle">Create Avatar</h1>
                        <p class="description">เมื่อทำการ <u>Log in</u> เรียบร้อยแล้ว user จะสามารถสร้าง <u>avatar</u>
                            เพื่อใช้ในการพูดคุย นอกจากนี้ยังสามารถติด <u>Tag</u> บอกความรู้สึกหรือสถานะได้</p>                    </div>
                    <div>
                        <img src="Image/Create_avatar.png" alt="img-1" class="image-item">
                        <h1 class="subtitle">Create Avatar</h1>
                        <p class="description">เมื่อทำการ <u>Log in</u> เรียบร้อยแล้ว user จะสามารถสร้าง <u>avatar</u>
                            เพื่อใช้ในการพูดคุย นอกจากนี้ยังสามารถติด <u>Tag</u> บอกความรู้สึกหรือสถานะได้</p>                    </div>
                    <div>
                        <img src="Image/Create_avatar.png" alt="img-1" class="image-item">
                        <h1 class="subtitle">Create Avatar</h1>
                        <p class="description">เมื่อทำการ <u>Log in</u> เรียบร้อยแล้ว user จะสามารถสร้าง <u>avatar</u>
                            เพื่อใช้ในการพูดคุย นอกจากนี้ยังสามารถติด <u>Tag</u> บอกความรู้สึกหรือสถานะได้</p>                    </div>
                </div>
                <button class="slide-button" id="next-slide"><i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="icon-box">
            <button class="mail"><i class="fa-solid fa-envelope"></i></button>
            <a href="../ChickShop/chickShop.html"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
        <div class="help">
            <button class="help-btn" id="toggleButton"><i class="fa-solid fa-circle-info"></i></button>
        </div>
    </div>
    <script>
        const backButton = document.querySelector(".back");
        const toggleButton = document.getElementById("toggleButton");
        const containerHowToUse = document.querySelector(".HowToUse");

        toggleButton.addEventListener('click', () => {
            if (containerHowToUse.style.display === "none") {
                containerHowToUse.style.display = "block";
            } else {
                containerHowToUse.style.display = "none";
            }
        })

        const initSlider = () => {
            const imageList = document.querySelector(".slider-wrapper .image-list");
            const slideButtons = document.querySelectorAll(".slider-wrapper .slide-button");
            const sliderScrollbar = document.querySelector(".container-HowToUse .slider-scrollbar");
            const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;

            console.log(`${imageList.scrollWidth}`);

            slideButtons.forEach(button => {
                button.addEventListener("click", () => {
                    const direction = button.id === "prev-slide" ? -1 : 1;
                    const scrollAmount = imageList.clientWidth * direction;
                    imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
                });
            });

            const handleSlideButtons = () => {
                slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "block";
                slideButtons[2].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "block";
            };

            imageList.addEventListener("scroll", () => {
                handleSlideButtons();
            });
        };

        window.addEventListener("load", initSlider);
        const Data = <?php echo $_SESSION['UserID'];?>
    </script>
    <script type="module" src="home.js"></script>
</body>

</html>