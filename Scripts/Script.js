function moveSlide(button, direction) {
    // 1. Encontra o elemento pai (.carroussel) do botão clicado
    const wrapper = button.closest('.carroussel');
    
    // 2. Dentro desse pai, encontra o container das imagens
    const container = wrapper.querySelector('.carroussel-container');
    
    // 3. Pega a quantidade de imagens que tem nesse carrossel específico
    const totalSlides = container.children.length;

    // 4. Vamos guardar o índice atual no próprio elemento HTML (usando dataset)
    // Se não existir, começa no 0
    let currentIdx = parseInt(container.dataset.index) || 0;

    // 5. Calcula o novo índice
    currentIdx += direction;

    if (currentIdx >= totalSlides) {
        currentIdx = 0;
    } else if (currentIdx < 0) {
        currentIdx = totalSlides - 1;
    }

    // 6. Salva o novo índice e aplica o movimento
    container.dataset.index = currentIdx;
    container.style.transform = `translateX(${-currentIdx * 100}%)`;
}