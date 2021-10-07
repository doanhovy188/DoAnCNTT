function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    //document.getElementById("main").style.marginLeft = "250px";
    document.body.style.opacity = "0.6";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    //document.getElementById("main").style.marginLeft= "0";
    document.body.style.opacity = "1";
}

function hideSlideshow() {
    document.getElementById("slideshow").style.top = "-800px";
    document.getElementById("slideshow").style.zIndex = "0";
}
function showSlideshow() {
    document.getElementById("slideshow").style.top = "60px";
    document.getElementById("slideshow").style.zIndex = "1";
}

function closeLogin() {
    document.getElementById("loginForm").style.top = "-1200px";
    document.getElementById("loginForm").style.zIndex = "1";
    if(document.getElementById("registerForm").style.top == "-700px") {
        showSlideshow();
    }
}

function openLogin() {
    document.getElementById("loginForm").style.top = "-400px";
    document.getElementById("loginForm").style.zIndex = "1";
    document.getElementById("breakline").style.marginTop = "0";
    closeRegister();
    closeNav();
    hideSlideshow();
}

function closeRegister() {
    document.getElementById("registerForm").style.top = "-700px";
    document.getElementById("registerForm").style.zIndex = "0";
    if(document.getElementById("loginForm").style.top == "-1200px") {
        showSlideshow();
    }
}

function openRegister() {
    document.getElementById("registerForm").style.top = "70px";
    document.getElementById("registerForm").style.zIndex = "1";
    document.getElementById("breakline").style.marginTop = "20px";
    closeLogin();
    closeNav();
    hideSlideshow();
}
function muteBtnClick() {
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
