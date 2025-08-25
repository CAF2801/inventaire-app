const hamburger = document.getElementById("hamburger");
const menu = document.getElementById("menu");

hamburger.addEventListener("click", () => {
    menu.classList.toggle("open");

    if (menu.classList.contains("open")) {
        hamburger.setAttribute("src", "../assets/img/x-thin-svgrepo-com.png");
    } else {
        hamburger.setAttribute("src", "../assets/img/hamburger-md-svgrepo-com.png");
    }
});