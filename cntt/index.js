function loadPage(){
    const profileWindow = document.getElementById("profileWindow");
    profileWindow.style.visibility = "visible";
    }
function toggleProfile(){
    const profileWindow = document.getElementById("profileWindow");
    const redDot = document.getElementById("profileRedDot");
    if (profileWindow.style.visibility === "hidden") {
        profileWindow.style.visibility = "visible";
    }
    else {
        profileWindow.style.visibility = "hidden";
    }
}
function closeProfile(){
    const profileWindow = document.getElementById("profileWindow");
    profileWindow.style.opacity = "0";
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
    playClickSound();
    closeLogin();
    closeRegister();
    closeNav();
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
var audio = document.getElementById("mainSound");
var songNumber = 1;
audio.addEventListener('ended',function(){
    switch (songNumber)
    {
        case 1 :
            audio.src = "./sound/main/song4.mp3";
            break;
        case 2 :
            audio.src = "./sound/main/song3.mp3";
            break;
        case 3 :
            audio.src = "./sound/main/song2.mp3";
            break;
        case 4 :
            audio.src = "./sound/main/song1.mp3";
            break;
        case 5 :
            audio.src = "./sound/main/song6.mp3";
            break;
        case 6 :
            audio.src = "./sound/main/song5.mp3";
            songNumber = 0;
            break;
        default: 
            audio.src = "./sound/main/song5.mp3";
            break;        
    }
        songNumber++;
        audio.pause();
        audio.load();
        audio.play();
    });

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
    window.location.pathname = "/DoAnCNTT-Try/cntt/index.php"
}

