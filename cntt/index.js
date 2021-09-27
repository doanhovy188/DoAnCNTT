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
function closeLogin() {
    document.getElementById("loginForm").style.top = "-1200px";
    document.getElementById("loginForm").style.zIndex = "0";
    closeNav();
}

function closeRegister() {
    document.getElementById("registerForm").style.top = "-700px";
    document.getElementById("registerForm").style.zIndex = "0";
    closeNav();
}

function openLogin() {
    document.getElementById("loginForm").style.top = "-470px";
    document.getElementById("loginForm").style.zIndex = "1";
    closeRegister();
    closeNav();
}

function openRegister() {
    document.getElementById("registerForm").style.top = "0";
    document.getElementById("registerForm").style.zIndex = "1";
    closeLogin();
    closeNav();
}