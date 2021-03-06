var songNumber = 1;
function changeMusic(){
    var mainSound = document.getElementById("mainSound");
    switch (songNumber)
    {
        case 1 :
            mainSound.src = "./sound/main/song4.mp3";
            break;
        case 2 :
            mainSound.src = "./sound/main/song3.mp3";
            break;
        case 3 :
            mainSound.src = "./sound/main/song2.mp3";
            break;
        case 4 :
            mainSound.src = "./sound/main/song1.mp3";
            break;
        case 5 :
            mainSound.src = "./sound/main/song6.mp3";
            break;
        case 6 :
            mainSound.src = "./sound/main/song5.mp3";
            songNumber = 0;
            break;
        default: 
            mainSound.src = "./sound/main/song5.mp3";
            break;        
    }
    songNumber++;
    mainSound.pause();
    mainSound.load();
    mainSound.play();
}
function loadPage(){
}
function toggleProfile(){
    const profileWindow = document.getElementById("profileWindow");
    const redDot = document.getElementById("profileRedDot");
    if (profileWindow.style.visibility === "hidden") {
        profileWindow.style.visibility = "visible";
        document.getElementById("rankWindow").style.visibility = "hidden";
    }
    else {
        profileWindow.style.visibility = "hidden";
    }
}
function closeProfile(){
    const profileWindow = document.getElementById("profileWindow");
    profileWindow.style.opacity = "0";
    profileWindow.style.visibility = "hidden";
    const redDot = document.getElementById("profileRedDot");
    redDot.style.visibility = "hidden";
}
function openNav() {
    playClickSound();
    const sidenav = document.getElementById("mySidenav");
    //document.body.style.opacity = "0.6";
    try {
        document.getElementById("login-register").style.opacity="0.6";
        document.getElementById("slideshow").style.opacity="0.6";
    } catch {}
    sidenav.style.opacity="1";
    sidenav.style.marginRight="0";
    //document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    playClickSound();
    const sidenav = document.getElementById("mySidenav");
    try {
        document.getElementById("login-register").style.opacity="1";
        document.getElementById("slideshow").style.opacity="1";
    } catch {}
    document.body.style.opacity = "1";
    sidenav.style.opacity="0";
    sidenav.style.marginRight="-320px";
    //document.getElementById("main").style.marginLeft= "0";
}
function home(){
    homeLogged();
    closeLogin();
    closeRegister();
}

function homeLogged(){
    playClickSound();
    closeNav();
    hideGame();
    showSlideshow();
}

function playClickSound(){
    const clicksound = document.getElementById("clickSound");
    clicksound.load();
    clicksound.play();
}
function hideSlideshow() {
    playClickSound();
    document.getElementById("slideshow").style.top = "-800px";
    document.getElementById("slideshow").style.zIndex = "0";
}
function showSlideshow() {
    playClickSound();
    document.getElementById("slideshow").style.top = "60px";
    document.getElementById("slideshow").style.zIndex = "1";
}

function closeLogin() {
    playClickSound();
    document.getElementById("loginForm").style.top = "-1200px";
    document.getElementById("loginForm").style.zIndex = "1";
    if(document.getElementById("registerForm").style.top == "-700px") {
        showSlideshow();
    }
}

function openLogin() {
    playClickSound();
    document.getElementById("loginForm").style.top = "-400px";
    document.getElementById("loginForm").style.zIndex = "1";
    document.getElementById("breakline").style.marginTop = "0";
    closeRegister();
    closeNav();
    hideSlideshow();
    hideGame();
}

function closeRegister() {
    playClickSound();

    document.getElementById("registerForm").style.top = "-700px";
    document.getElementById("registerForm").style.zIndex = "0";
    if(document.getElementById("loginForm").style.top == "-1200px") {
        showSlideshow();
    }
}

function openRegister() {
    playClickSound();

    document.getElementById("registerForm").style.top = "70px";
    document.getElementById("registerForm").style.zIndex = "1";
    closeLogin();
    closeNav();
    hideSlideshow();
    hideGame();
}

function rankClick() {
    const rankBtn = document.getElementById("rankWindow");
    if (rankBtn.style.visibility === "hidden"){
        rankBtn.style.visibility = "visible";
        document.getElementById("profileWindow").style.visibility = "hidden";
    }
    else{
        rankBtn.style.visibility = "hidden";
    }
}

function muteBtnClick() {
    playClickSound();
    const music = document.getElementById("mainSound");
    const muteIcon =  document.getElementById("muteIcon");
    if (music.paused) {
        music.play();
        muteIcon.src = "./images/unMuteIcon.png"
    }
    else{
        music.pause();
        muteIcon.src = "./images/mutedIcon.png"
    }
}


function checkLogin(){
    const userName = document.getElementById("loginUname").value;
    const passWord = document.getElementById("loginPsw").value;

}

function checkRegister(){

}

function logout(){
    let xmlhttp;
    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {// code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.open("GET","./php/session_destroyer.php",false);
    xmlhttp.send();
    window.location.pathname = "/cntt/index.php"
}

function openRecord(evt, gameName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tab-link");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(gameName).style.display = "grid";
    evt.currentTarget.className += " active";
}

function hideGame(){
    document.getElementById("flappyBird").style.visibility = "hidden";
    document.getElementById("g2048").style.visibility = "hidden";
    document.getElementById("gsnake").style.visibility = "hidden";
}

function flappyBirdClick() {
    hideSlideshow();
    hideGame();
    document.getElementById("flappyBird").style.visibility = "visible";
}

function game2048Click(){
    hideSlideshow();
    hideGame();
    document.getElementById("g2048").style.visibility = "visible";
}

function snakeClick(){
    hideSlideshow();
    hideGame();
    document.getElementById("gsnake").style.visibility = "visible";
}

function onpenEditAvt(){
    console.log("avatareditclicked");
    document.getElementById("gridAvt").style.display = "grid";
}

function editName(){
    document.getElementById("nameBox").style.display = "block";
}
