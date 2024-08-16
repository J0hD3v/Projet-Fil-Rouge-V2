const btn_open_navbar = document.getElementById("btn_open_navbar");
const header = document.getElementsByTagName("header")[0];
const navbar  =document.getElementsByClassName("header_nav")[0];
const footer = document.getElementsByTagName("footer")[0];

btn_open_navbar.addEventListener("click", function open_navbar() {
    navbar.classList.toggle("mobile_nav_display");
    btn_open_navbar.classList.toggle("close_navbar");
})