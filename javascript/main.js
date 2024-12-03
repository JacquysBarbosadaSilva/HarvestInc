// Referências aos elementos
const botaoScroll = document.getElementById("botao-scroll");
const secaoDestino = document.getElementById("proxima-secao"); // Certifique-se de que o ID corresponde ao do HTML

// Controle da posição atual
let scrollParaBaixo = true;

// Função para rolar a página
botaoScroll.addEventListener("click", () => {
    if (scrollParaBaixo) {
        // Rola para a próxima seção
        secaoDestino.scrollIntoView({ behavior: "smooth" });
    } else {
        // Rola para o topo da página
        window.scrollTo({ top: 0, behavior: "smooth" });
    }
    // Alterna o estado do botão
    alternarIcone();
});

// Alterna o ícone do botão
function alternarIcone() {
    scrollParaBaixo = !scrollParaBaixo; // Inverte o estado
    const icone = botaoScroll.querySelector("i");
    if (scrollParaBaixo) {
        icone.className = "fas fa-arrow-down"; // Ícone de seta para baixo
        botaoScroll.setAttribute("aria-label", "Ir para a próxima seção");
    } else {
        icone.className = "fas fa-arrow-up"; // Ícone de seta para cima
        botaoScroll.setAttribute("aria-label", "Voltar ao topo da página");
    }
}

// Monitora a rolagem para ajustar o botão dinamicamente
window.addEventListener("scroll", () => {
    const posicaoAtual = window.scrollY;
    const alturaJanela = window.innerHeight;

    // Verifica se o usuário está na seção inicial ou na seção destino
    if (posicaoAtual + 10 < alturaJanela && !scrollParaBaixo) {
        alternarIcone();
    } else if (posicaoAtual >= alturaJanela - 10 && scrollParaBaixo) {
        alternarIcone();
    }
});


