const burger = document.querySelector(".burger");
const nav_links = document.querySelector(".nav-links");

//Если ширина эрана пользователя больше 768px иконка бургер меню исчезает 
if (window.screen.width > 768) {
    burger.classList.add("hidden");
} else {
    burger.classList.remove("hidden");
    nav_links.classList.add("hidden");
}

//При нажатии на кнопку добавляется или удаляется класс hidden для кнопки бургер-меню
burger.onclick = function () {
    if (nav_links.classList.contains("hidden")) {
        nav_links.classList.remove("hidden")
    } else {
        nav_links.classList.add("hidden")
    }
}