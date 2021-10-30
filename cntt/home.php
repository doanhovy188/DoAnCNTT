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
<body onload="loadPage()">
<?php
    if(!isset($_SESSION["username"])){
        header('Location: index.php');
    }

?>
<script>
    function logout(){
        let xmlhttp;
        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.open("GET","./php/session_destroyer.php",false);
        xmlhttp.send();
        window.location.pathname = "/DoAnCNTT-Try/cntt/index.php"
    }
</script>
<audio src="./sound/event/click.wav" id="clickSound"></audio>
<div class="container">
    <div id="mySidenav" class="sidenav">
        <a href="#" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#" class="loginbtn" onclick="home()"><i class="fas fa-home"></i> Home</a>
        <a href="#" class="logoutbtn" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Log out</a>
    </div>
    <div class="options">
        <span class="ranking"><i class="fas fa-medal"></i></span>
        <span class="profile"><i class='fas fa-user-circle' onclick="toggleProfile()"></i></span>
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
        <form class="form" id="registerForm" action="./php/process.php" method="post">
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
            <input type="text" placeholder="Enter Username" name="username" id="registerUname" class="input" required>

            <label for="registerPsw" class="label"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" id="registerPsw" class="input" required>

            <label for="psw-repeat" class="label"><b>Confirm Password</b></label>
            <input type="password" placeholder="Confirm Password" name="psw-repeat" id="psw-repeat" class="input" required>

            <button type="submit" class="btn">Register</button>
        </form>
        <form class="form" id="loginForm" action="./php/process.php" method="post">
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

            <button type="submit" class="btn" name="btn_submit">Login</button>
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
    <section class="profileWindow" id="profileWindow" style="visibility: hidden">
        <div class="profile-header">
            <span class="dot dot-red" onclick="closeProfile()" id="profileRedDot"></span>
            <span class="dot dot-yellow"></span>
            <span class="dot dot-green"></span>
            <h2>profile</h2>
        </div>

        <hr id="profileBreakline">
    </section>
</div>
</body>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="slider.js"></script>
<script src="index.js"></script>
</html>