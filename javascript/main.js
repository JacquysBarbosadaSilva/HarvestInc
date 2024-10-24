var menuButton = document.getElementsByClassName("menu-button");
var menu = document.getElementsByClassName("menu-nav-bar");

menuButton.addEventListener("click", function() {
  if (menu.style.display === "block") {
    menu.style.display = "none";
  } else {
    menu.style.display = "block";
  }
});