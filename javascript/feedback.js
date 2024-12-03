document.addEventListener('DOMContentLoaded', () => {
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const modal = document.getElementById('feedbackModal');
    const feedbackContainer = document.getElementById('feedbackContainer');

    if (openModalBtn && closeModalBtn && modal) {
        openModalBtn.addEventListener('click', () => {
            modal.style.display = 'flex';
        });

        closeModalBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    }

    const form = modal.querySelector('form');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();
    
        const formData = new FormData(form);
        const response = await fetch('', { // Envia para a mesma página
            method: 'POST',
            body: formData
        });
    
        const result = await response.text(); // Captura a resposta do servidor
        console.log(result); // Verifique a resposta no console do navegador
    
        if (response.ok) {
            const title = form.title.value.trim();
            const description = form.description.value.trim();
            const rating = form.rating.value;
    
            // Criação do card de feedback
            const feedbackCard = document.createElement('div');
            feedbackCard.className = 'feedback-card';
            feedbackCard.innerHTML = `
                <h3>${title}</h3>
                <p>${description}</p>
                <p><strong>Nota:</strong> ${'★'.repeat(rating)}${'☆'.repeat(5 - rating)}</p>
            `;
    
            feedbackContainer.appendChild(feedbackCard);
            form.reset();
            modal.style.display = 'none';
    
            alert('Feedback enviado com sucesso!');
        } else {
            alert('Erro ao enviar feedback. Verifique o console para mais detalhes.');
        }
    });
    

    // Lógica das estrelas (alteração de cor)
    const stars = document.querySelectorAll('.stars label');
    stars.forEach((star, index) => {
        star.addEventListener('click', () => {
            stars.forEach((s, i) => {
                s.style.color = i <= index ? 'gold' : 'gray';
            });
        });
    });
});
