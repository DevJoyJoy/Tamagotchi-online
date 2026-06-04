function moveSlide(button, direction) {
    // Finds the clicked element (the carroussel that's gonna change)
    const wrapper = button.closest('.carroussel');
    
    // Finds the actual container with the images
    const container = wrapper.querySelector('.carroussel-container');
    
    // Takes the lenght of images in the carroussel
    const totalSlides = container.children.length;

    // Garantees that there's always a image showing
    let currentIdx = parseInt(container.dataset.index) || 0;

    // Calculates the next index image
    currentIdx += direction;

    if (currentIdx >= totalSlides) {
        currentIdx = 0;
    } else if (currentIdx < 0) {
        currentIdx = totalSlides - 1;
    }

    // Applicates the movement
    container.dataset.index = currentIdx;
    container.style.transform = `translateX(${-currentIdx * 100}%)`;
}