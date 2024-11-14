var menuButton = document.getElementsByClassName("menu-button");
var menu = document.getElementsByClassName("menu-nav-bar");

menuButton.addEventListener("click", function() {
  if (menu.style.display === "block") {
    menu.style.display = "none";
  } else {
    menu.style.display = "block";
  }
});

document.addEventListener('DOMContentLoaded', function() {
  const cards = document.querySelectorAll('.card-principios-conteudo');

  cards.forEach(card => {
      card.addEventListener('click', function() {
          // Alterna a classe 'active' para mostrar ou ocultar a descrição
          this.classList.toggle('active');
      });
  });
});