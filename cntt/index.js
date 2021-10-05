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
    closeLogin();
    closeNav();
    hideSlideshow();
}