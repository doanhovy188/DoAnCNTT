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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
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
    <section class="slideshow" id="slideshow" visibility="hidden">
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
            <h2>Profile</h2>
        </div>
        <hr id="profileBreakline">
        <div class="profileBody">
            <div class="logo-name">
                <figure class="img userLogo">
                    <img src="./images/userlogo.png" alt="">
                    <button class="avtEdit"><i class="fas fa-edit"></i></button>
                </figure>
                <h3>vippro <i class="fas fa-pencil-alt" style="font-size:16px"></i></h3>
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
                        <!-- <tr>
                            <td>Game</td>
                            <td>Score</td>
                            <td>Rank</td>
                        </tr> -->
<?php
//Lay danh sach danh muc tu database
$sql = 'CALL profile("'.$_SESSION["username"].'")';
$record = executeResult($sql);

$index = 0;
foreach ($record as $item) {
    $index++;
	echo '<tr>
				<td>'.$item['gameName'].'</td>
                <td>'.$item['Score'].'</td>
                <td>'.$item['rank'].'</td>
			</tr>';
}
?>
					</tbody>
				</table>
            </div>
        </div>
    </section>
    <section class="rankWindow" id="rankWindow">
        <div class="rank-header">
            <span class="dot dot-red" onclick="closeProfile()" id="profileRedDot"></span>
            <span class="dot dot-yellow"></span>
            <span class="dot dot-green"></span>
            <h2>Ranking</h2>
        </div>
        <hr>
        <div class="rankInfo">
                <h3>Snake</h3>
                <table class="rankTable">
					<thead>
						<tr>
							<th>Rank</th>
                            <th>Avt</th>
							<th>Name</th>
							<th>Score</th>
                            <th>Date</th>
						</tr>
                        <span></span>
					</thead>
					<tbody>
                        <!-- <tr>
                            <td>Game</td>
                            <td>Score</td>
                            <td>Rank</td>
                            <td>Rank</td>
                            <td>Rank</td>
                        </tr> -->
                    <?php
                        //Lay danh sach danh muc tu database
                        $sql = 'select * from top_2048';
                        $record = executeResult($sql);

                        $index = 1;
                        foreach ($record as $item) {
                            $index++;
                            echo '<tr>
                                        <td>'.$item['rank'].'</td>
                                        <td>'.$item['image'].'</td>
                                        <td>'.$item['name'].'</td>
                                        <td>'.$item['Score'].'</td>
                                        <td>'.$item['date'].'</td>
                                    </tr>';
                        }
                    ?>
                    </tbody>
                </table>
    </section>
    <iframe src="./games/flappybird" title="Flappy Bird" style="width: 1000px; height: 630px; border: none"></iframe>
</div>
            <script type="text/javascript">
                let position = document.cookie.search("usernamelogin")+14;
                console.log(document.cookie.toString().slice(position));

                const username= document.cookie.toString().slice(position);

                var data=-1;
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
                    xmlHttp.open("GET", "http://localhost:8080/cntt/php/update.php?username="+"vippro"+"&idgame="+data[0]+"&score="+data[1], true); 
                    xmlHttp.send(null);
                });
            </script>
</body>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="slider.js"></script>
</html>