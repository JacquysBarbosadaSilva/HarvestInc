document.addEventListener('DOMContentLoaded', () => {
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const modal = document.getElementById('feedbackModal');

    // Abrir modal
    openModalBtn?.addEventListener('click', () => {
        modal.style.display = 'flex';
    });

    // Fechar modal
    closeModalBtn?.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Fechar modal ao clicar fora do conteúdo
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });

    // Fechar modal após envio do formulário
    const form = modal.querySelector('form');
    form.addEventListener('submit', () => {
        modal.style.display = 'none';
    });
});
