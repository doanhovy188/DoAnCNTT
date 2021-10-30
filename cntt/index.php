<?php
if (session_id() === '')
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VT-Game</title>
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
<?php

if(isset($_SESSION['register_status'])){

    $status = $_SESSION['register_status'];

    switch ($status) {
        case "emptyInput":
            alert("vui lòng nhập đầy đủ thông tin!");
            break;
        case "failed":
            alert("Đăng ký không thành công.");
            break;
        case "succeeded":
            alert("Đăng ký thành công!");
            break;
        case "existed":
            alert("Tài khoản đã tồn tại!");
            break;
        case "notMatch":
            alert("Mật khẩu không khớp vui lòng nhập lại.");
            break;
        case "connectionFailed":
            alert("Lỗi kết nối hệ thống, vui lòng thử lại sau.");
            break;

        default:
            alert("Welcome to VT Game!!!");
    }
}

function alert($message){
    echo "<script type='text/javascript'>alert('$message');</script>";
}

?>
    <audio src="./sound/event/click.wav" id="clickSound"></audio>
    <div class="container">
        <div id="mySidenav" class="sidenav">
            <a href="#" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#" class="loginbtn" onclick="home()"><i class="fas fa-home"></i> Home</a>
            <a href="#" class="loginbtn" onclick="openLogin()"><i class="fas fa-sign-in-alt"></i> Log in</a>
            <a href="#" class="registerbtn" onclick="openRegister()"><i class="fas fa-user-plus"></i> Register</a>
        </div>
        <div class="options">
            <span class="ranking"><i class="fas fa-medal"></i></span>
            <figure class="img muteBtn" onclick="muteBtnClick()">
                <img src="./images/unMuteIcon.png" alt="" id="muteIcon">
            </figure>
            <span class="option"  onclick="openNav()"><i class="fas fa-stream"></i></span>
            <audio id="mainSound" autoplay>
                <source src="./sound/main/song5.mp3">
            </audio>
        </div>
        <h1 class="title" id="class" style="position: relative;">VT-GAME</h1>
        <div class="login-register" id="login-register">
            <form class="form" id="registerForm" action="./php/register.php" method="post">
                <div class="form-header">
                    <span class="dot dot-red" onclick="closeRegister()"></span>
                    <span class="dot dot-yellow"></span>
                    <span class="dot dot-green"></span>
                    <h2>Create Account</h2>
                </div>

                <hr>
                
                <figure class="img userLogo">
                    <img src="./images/userlogo.png" alt="">
                    <button class="avtEdit"><i class="fas fa-edit"></i></button>
                </figure>

                <label for="registerUname" class="label"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="userNameRegister" id="registerUname" class="input" required>
            
                <label for="registerPsw" class="label"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pswRegister" id="registerPsw" class="input" required>
            
                <label for="psw-repeat" class="label"><b>Confirm Password</b></label>
                <input type="password" placeholder="Confirm Password" name="pswRepeat" id="psw-repeat" class="input" required>

                <button type="submit" class="btn" name="btn_register_submit" form="registerForm">Register</button>
            </form>
            <form class="form" id="loginForm" action="./php/login.php" method="post">
                <div class="form-header">
                    <span class="dot dot-red" onclick="closeLogin()"></span>
                    <span class="dot dot-yellow"></span>
                    <span class="dot dot-green"></span>
                    <h2>Login</h2>
                </div>

                <hr id="breakline">
                
                <figure class="img chillLogo">
                    <img src="./images/chill.png" alt="">
                </figure>

                <label for="loginUname" class="label"><b>Username:</b></label>
                <input type="text" placeholder="Enter Username" name="username" id="loginUname" class="input" required>
            
                <label for="loginPsw" class="label"><b>Password:</b></label>
                <input type="password" placeholder="Enter Password" name="psw" id="loginPsw" class="input" required>

                <button type="submit" class="btn" name="btn_login_submit" form="loginForm">Login</button>
            </form>
        </div>
        <section class="slideshow" id="slideshow">
            <div class="gallery">
                <div class="gallery-container">
                    <img class="gallery-item gallery-item-1" src="./images/game/4566_uhd-4k-wallpaper-06.jpg" data-index="1">
                    <img class="gallery-item gallery-item-2" src="./images/game/Flappy_Bird_ZIVE.jpg" data-index="2">
                    <img class="gallery-item gallery-item-3" src="./images/game/maxresdefault.jpg" data-index="3">
                    <img class="gallery-item gallery-item-4" src="./images/game/space-game-background-neon-night-alien-landscape_107791-1624.jpg" data-index="4">
                    <img class="gallery-item gallery-item-5" src="./images/game/tro-choi-pacman.jpg" data-index="5">
                </div>
                <div class="gallery-controls"></div>
                <audio src="./sound/event/arrowClick.wav" id="arrowClick"></audio>
            </div>
        </section>
    </div>
</body>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="slider.js"></script>
<script src="index.js"></script>
</html>