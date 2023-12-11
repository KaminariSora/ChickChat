<?php
 session_start();
 include("../server/connect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="Image/IMG_1012.PNG" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ChickChat</title>
    <link rel="stylesheet" href="loginStyle.css">
    <script src="https://kit.fontawesome.com/26997adfb2.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- notification massage -->
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
    <header>
        <img src="Image/IMG_1012.PNG" class="img">
    </header>
    <div class="wrapper">
        <div class="form-box login">
            <h2>Welcome</h2>
            <h5>We are glad to see you back with us</h5>
            <nav class="navigation">
                <button class="btn btn-1 active">Sign In</button>
                <button class="btn btn-2">Sign Up</button>
            </nav>
            <form action="login_db.php" method = 'POST'>
                <div class="input-box">
                    <input type="name" name = 'username' required>
                    <label><i class="fa-solid fa-user"></i> Username</label>
                </div>
                <div class="input-box">
                    <input type="password" name = 'password' required>
                    <label><i class="fa-solid fa-lock"></i> Password</label>
                </div>
                <div class="submit-btn">
                    <button type="submit" name = 'login_user' class="btn">Login</button>
                </div>
            </form>
        </div>
        <div class="form-box registration">
            <h2>Welcome</h2>
            <h5>We are glad to see you back with us</h5>
            <nav class="navigation">
                <button class="btn btn-3">Sign In</button>
                <button class="btn btn-4 active">Sign Up</button>
            </nav>
            <form action="register_db.php" method = 'POST'>
                <div class="input-box">
                    <input type="name" name = 'Username' required>
                    <label><i class="fa-solid fa-user"></i> Username</label>
                </div>
                <div class="input-box">
                    <input type="password" name = 'password_1' required>
                    <label><i class="fa-solid fa-lock"></i> Password</label>
                </div>
                <div class="input-box">
                    <input type="password" name = 'password_2' required>
                    <label class="confirm-pass"><i class="fa-solid fa-lock"></i> Confirm Password</label>
                </div>
                <div class="submit-btn">
                    <button type="submit" class="btn" name = 'confrim_Regis'>Login</button>
                </div>
            </form>
        </div>
    </div>
    <div class="how">
        <a href="HowToUse.html">How to use</a>
    </div>
    <script src="login.js"></script>
</body>
</html>