const imagensFundo = [
    "../Images/Backgrounds/House.png",
    "../Images/Backgrounds/Farm", 
    "../Images/Backgrounds/Forest.png" 
];

let indexAtual = 0;

function changeBackground() {
    const bgContainer = document.getElementById("bg-carousel");
    bgContainer.style.backgroundImage = `url('${imagensFundo[indexAtual]}')`;
}

function changeSlide(direcao) {
    indexAtual = indexAtual + direcao;

    if (indexAtual >= imagensFundo.length) {
        indexAtual = 0;
    }
    if (indexAtual < 0) {
        indexAtual = imagensFundo.length - 1;
    }

    changeBackground();
}

window.onload = function() {
    changeBackground();
};