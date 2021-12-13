<?php
if (session_id() === '')
    session_start();
    require_once ('./lib/dbhelper.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VT-Game</title>
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="index.js"></script>
</head>

<body onload="loadPage()">
    <?php
    if(!isset($_SESSION["username"])){
        header('Location: index.php');
    } else {
        $cookie_name = "usernamelogin";
        $cookie_value = $_SESSION["username"];
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    }

?>
    <audio src="./sound/event/click.wav" id="clickSound"></audio>
    <div class="container">
        <div id="mySidenav" class="sidenav">
            <a href="#" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#" class="loginbtn" onclick="homeLogged()"><i class="fas fa-home"></i> Home</a>
            <a href="#" class="logoutbtn" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Log out</a>
        </div>
        <div class="options">
            <span class="ranking"><i class="fas fa-medal" onclick="rankClick()"></i></span>
            <span class="profile"><i class='fas fa-user-circle' onclick="toggleProfile()"></i></span>
            <figure class="img muteBtn" onclick="muteBtnClick()">
                <img src="./images/unMuteIcon.png" alt="" id="muteIcon">
            </figure>
            <span class="option" onclick="openNav()"><i class="fas fa-stream"></i></span>
            <audio id="mainSound" autoplay onended="changeMusic()">
                <source src="./sound/main/song5.mp3">
            </audio>
        </div>
        <h1 class="title" id="class" style="position: relative;">VT-GAME</h1>
        <section class="slideshow" id="slideshow" visibility="hidden">
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
        <section class="profileWindow" id="profileWindow" style="visibility: hidden">
            <div class="profile-header">
                <span class="dot dot-red" onclick="toggleProfile()" id="profileRedDot"></span>
                <span class="dot dot-yellow"></span>
                <span class="dot dot-green"></span>
                <h2>Profile</h2>
            </div>
            <hr id="profileBreakline">
            <div class="profileBody">
                <div class="logo-name">
                    <figure class="img userLogo">
                        <?php 
                            $sql = 'select image from account where userName = "'.$_SESSION["username"].'"';
                            $record = executeSingleResult($sql)['image'];
                            //echo $record['image'];
                            $path = "\"./images/avatar/$record\"";
                            echo '<img src='.$path.'>';
                        ?>
                        <!-- <img src="./images/userlogo.png" alt=""> -->
                        <button class="avtEdit" onclick="onpenEditAvt()"><i class="fas fa-edit"></i></button>
                    </figure>
                    <?php 
                    $sql = 'select name from account where userName = "'.$_SESSION["username"].'"';
                    $record = executeSingleResult($sql)['name'];
                    echo '<h3>'.$record. '<i class="fas fa-pencil-alt" style="font-size:16px" onclick="editName()"></i></h3>'?>
                </div>
                <div class="profileInfo">
                    <h3>My Record</h3>
                    <table class="recordTable">
                        <thead>
                            <tr>
                                <th>Game</th>
                                <th>Score</th>
                                <th>Rank</th>
                            </tr>
                            <span></span>
                        </thead>
                        <tbody>
                            <?php
                            //Lay danh sach danh muc tu database
                            $sql = 'CALL profile("'.$_SESSION["username"].'")';
                            $record = executeResult($sql);

                            $index = 0;
                            try {
                                if($record != null)
                                foreach ($record as $item) {
                                    $index++;
                                    echo '<tr>
                                                <td>'.$item['gameName'].'</td>
                                                <td>'.$item['Score'].'</td>
                                                <td>'.$item['rank'].'</td>
                                            </tr>';
                                }} 
                                catch(Exception $e) {
                                    echo '<tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section class="rankWindow" id="rankWindow" style="visibility: hidden">
            <div class="rank-header">
                <span class="dot dot-red" onclick="rankClick()" id="profileRedDot"></span>
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

        <div class="avt-container" id="avt">

            <form method="post" id= "gridAvt" action="./php/updateAvt.php">
            <input type="hidden" value="<?php echo $_SESSION["username"]?>" name="username">
                <button type="submit" name="avatar1">
                    <figure class= "avt img">
                        <img src="./images/avatar/avatar1.png">
                    </figure>
                </button>
                <button type="submit" name="avatar2">
                    <figure class= "avt img">
                        <img src="./images/avatar/avatar2.png">
                    </figure>
                </button>
                <button type="submit" name="avatar3">
                    <figure class= "avt img">
                        <img src="./images/avatar/avatar3.png">
                    </figure>
                </button>
                <button type="submit" name="avatar4">
                    <figure class= "avt img">
                        <img src="./images/avatar/avatar4.png">
                    </figure>
                </button>
                <button type="submit" name="avatar5">
                    <figure class= "avt img">
                        <img src="./images/avatar/avatar5.png">
                    </figure>
                </button>
                <button type="submit" name="avatar6">
                    <figure class= "avt img">
                        <img src="./images/avatar/avatar6.png">
                    </figure>
                </button>
                <button type="submit" name="avatar7">
                    <figure class= "avt img">
                        <img src="./images/avatar/avatar7.png">
                    </figure>
                </button>
                <button type="submit" name="avatar8">
                    <figure class= "avt img">
                        <img src="./images/avatar/avatar8.png">
                    </figure>
                </button>
                <button type="submit" name="avatar9">
                    <figure class= "avt img">
                        <img src="./images/avatar/avatar9.png">
                    </figure>
                </button>
                <button type="submit" name="avatar10">
                    <figure class= "avt img">
                        <img src="./images/avatar/avatar10.png">
                    </figure>
                </button>
                <button type="submit" name="avatar11">
                    <figure class= "avt img">
                        <img src="./images/avatar/avatar11.png">
                    </figure>
                </button>
                <button type="submit" name="avatar12">
                    <figure class= "avt img">
                        <img src="./images/avatar/avatar12.png">
                    </figure>
                </button>
            </form>
        </div> 
        <div id= "nameBox">
            <div id= "btnCloseEditName" onclick="closeEditName()">X</div>
            <form id= "nameBox-form" action="./php/updateName.php" method="post">
                <p>New nickname:</p>
                <input type="hidden" value="<?php echo $_SESSION["username"]?>" name="username">
                <input type="text" id="newName" name="newName">
                <input type="submit" id="submitBtn">
            </form>
        </div>
    </div>

    <script type="text/javascript">
        let position = document.cookie.search("usernamelogin") + 14;
        let str = document.cookie.toString().slice(position);
        console.log(str);

        let position1 = str.search(";");
        if(position1 != -1) {
            var username = str.slice(0, position1);
        } else username = str;
        
        console.log(username);

        var data = -1;
        var eventMethod = window.addEventListener
            ? "addEventListener"
            : "attachEvent";
        var eventer = window[eventMethod];
        var messageEvent = eventMethod === "attachEvent"
            ? "onmessage"
            : "message";

        eventer(messageEvent, function (e) {

            // if (e.origin !== 'http://the-trusted-iframe-origin.com') return;

            // if (e.data === "myevent" || e.message === "myevent") {
            // 	alert('Message from iframe just came!');

            data = e.data;
            console.log(data);
            var xmlHttp = new XMLHttpRequest();  //not the cross browser way of doing it
            xmlHttp.open("GET", "http://localhost:8080/cntt/php/update.php?username=" + username + "&idgame=" + data[0] + "&score=" + data[1], true);
            xmlHttp.send(null);
        });
    </script>
</body>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="slider.js"></script>

</html>