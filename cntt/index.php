<?php
if (session_id() === '')
    session_start();
    require_once ('./lib/dbhelper.php');
?>
                    <?php 
                    function insertScore() {
                        $idgame= $_COOKIE['idgame'];
                        $score= $_COOKIE['score'];
                        try {
                            $sql = "insert into highscore (userName, idGame, Score)  values ('vippro', $idgame, $score)";
                            execute($sql);
                        } catch (Exception $e) {
                            echo $e;
                        }
                    }
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
            <span class="ranking" onclick="rankClick()"><i class="fas fa-medal"></i></span>
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
                <img class="gallery-item gallery-item-1" src="./images/game/maxresdefault.jpg"
                        data-index="1">
                    <img class="gallery-item gallery-item-2" src="./images/game/paperPlane.jpg" data-index="2" onclick="flappyBirdClick()">
                    <img class="gallery-item gallery-item-3" src="./images/game/2048.jpg" data-index="3" onclick="game2048Click()">
                    <img class="gallery-item gallery-item-4"
                        src="./images/game/snake.jpg"
                        data-index="4" onclick="snakeClick()">
                    <img class="gallery-item gallery-item-5" src="./images/game/tro-choi-pacman.jpg" data-index="5">
                </div>
                <div class="gallery-controls"></div>
                <audio src="./sound/event/arrowClick.wav" id="arrowClick"></audio>
            </div>
        </section>
        <section class="rankWindow" id="rankWindow" style="visibility: hidden">
            <div class="rank-header">
                <span class="dot dot-red" onclick="closeProfile()" id="profileRedDot"></span>
                <span class="dot dot-yellow"></span>
                <span class="dot dot-green"></span>
                <h2>Ranking</h2>
            </div>
            <hr>
            <div class="rankInfo">
                <div class="tab">
                    <button class="tab-link active" onclick="openRecord(event, 'snake')">Snake</button>
                    <button class="tab-link" onclick="openRecord(event, '2048')">2048</button>
                    <button class="tab-link" onclick="openRecord(event, 'flappybird')">Flappy Bird</button>
                </div>
                <div class="rank-header">
                    <h3>Rank</h3>
                    <h3>Avt</h3>
                    <h3>Name</h3>
                    <h3>Score</h3>
                    <h3>Date</h3>
                </div>
                <div id="snake" class="tab-content">
                    <?php
                        //Lay danh sach danh muc tu database
                        $sql = 'select * from top_snake';
                        $record = executeResult($sql);
                        $index = 1;
                        foreach ($record as $item) {
                            $index++;
                            $record = $item['image'];
                            $path = "\"./images/avatar/$record\"";
                            echo '
                                        <p>'.$item['rank'].'</p>
                                        <figure class= "rankAvatar"  >
                                            <img  src='.$path.'>
                                        </figure>
                                        <p>'.$item['name'].'</p>
                                        <p>'.$item['Score'].'</p>
                                        <p>'.$item['date'].'</p>
                                    ';
                        }
                    ?>
                </div>
                <div id="2048" class="tab-content" style="display: none">
                    <?php
                        //Lay danh sach danh muc tu database
                        $sql = 'select * from top_2048';
                        $record = executeResult($sql);
                        $index = 1;
                        foreach ($record as $item) {
                            $index++;
                            $record = $item['image'];
                            $path = "\"./images/avatar/$record\"";
                            echo '
                                        <p>'.$item['rank'].'</p>
                                        <figure class= "rankAvatar" >
                                            <img src='.$path.'>
                                        </figure>
                                        <p>'.$item['name'].'</p>
                                        <p>'.$item['Score'].'</p>
                                        <p>'.$item['date'].'</p>
                                    ';
                        }
                    ?>
                </div>
                <div id="flappybird" class="tab-content" style="display: none">
                    <?php
                        //Lay danh sach danh muc tu database
                        $sql = 'select * from top_snake';
                        $record = executeResult($sql);
                        $index = 1;
                        foreach ($record as $item) {
                            $index++;
                            $record = $item['image'];
                            $path = "\"./images/avatar/$record\"";
                            echo '
                                        <p>'.$item['rank'].'</p>
                                        <figure class= "rankAvatar" >
                                            <img src='.$path.'>
                                        </figure>
                                        <p>'.$item['name'].'</p>
                                        <p>'.$item['Score'].'</p>
                                        <p>'.$item['date'].'</p>
                                    ';
                        }
                    ?>
                </div>
        </section>
        <iframe id= "flappyBird" class= "game flappyBird" src="./games/flappybird" title="Flappy Bird"
            style="width: 1000px; height: 630px; border: none; visibility: hidden"></iframe>
        <iframe id= "g2048" class= "game g2048" src="./games/2048" title="2048"
            style="width: 550px; height: 650px; border: none; visibility: hidden"></iframe>
        <iframe id= "gsnake" class= "game snake" src="./games/snake" title="Snake"
            style="width: 1000px; height: 630px; border: none; visibility: hidden"></iframe>   
    </div>
</body>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="slider.js"></script>
<script src="index.js"></script>
</html>