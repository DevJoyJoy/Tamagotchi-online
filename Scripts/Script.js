//===========================================================================
// Function to move the carroussel
//===========================================================================
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

//===========================================================================
// Function to save all the infos
//===========================================================================
function saveTamagotchiData() {
    // Getting the values on the inputs
    const ownerName = document.getElementById('ownerName').value || 'Dono';
    const petName = document.getElementById('petName').value || 'Bichinho';

    // Getting each carroussel in order
    const containers = document.querySelectorAll('.carroussel-container');
    
    const petContainer = containers[0]; // Pets
    const toyContainer = containers[1]; // Toys
    const bedContainer = containers[2]; // Beds

    // Getting each image that the user chose (if he didn't choose anything, we just grab the first one on the carroussel) 
    const petIdx = parseInt(petContainer.dataset.index) || 0;
    const toyIdx = parseInt(toyContainer.dataset.index) || 0;
    const bedIdx = parseInt(bedContainer.dataset.index) || 0;

    // Getting the image on the carroussel by index
    const selectedPet = petContainer.children[petIdx].getAttribute('src');
    const selectedToy = toyContainer.children[toyIdx].getAttribute('src');
    const selectedBed = bedContainer.children[bedIdx].getAttribute('src');

    // Saving the info on the localStorage
    localStorage.setItem('tamagotchiOwner', ownerName);
    localStorage.setItem('tamagotchiPetName', petName);
    localStorage.setItem('tamagotchiPetImg', selectedPet);
    localStorage.setItem('tamagotchiToyImg', selectedToy);
    localStorage.setItem('tamagotchiBedImg', selectedBed);

    // Sending the user to their pets page
    window.location.href = "formsAction.html";
}

//===========================================================================
// Function to load all the infos
//===========================================================================
function loadTamagotchi() {
    // Making sure that we are on the right page
    if (document.getElementById('petDisplay')) {
        
        // Getting all the info from the local storage
        const ownerName = localStorage.getItem('tamagotchiOwner');
        const petName = localStorage.getItem('tamagotchiPetName');
        const petImg = localStorage.getItem('tamagotchiPetImg');
        const bedImg = localStorage.getItem('tamagotchiBedImg');
        const toyImg = localStorage.getItem('tamagotchiToyImg');

        // Fixing the images by the info that we got
        if (ownerName) document.getElementById('ownerNameDisplay').innerText = ownerName;
        if (petName) document.getElementById('petNameDisplay').innerText = petName;
        if (petImg) document.getElementById('petDisplay').src = petImg;
        if (bedImg) document.getElementById('bedDisplay').src = bedImg;
        
        // Fixing the toy to the pets favourite toy
        if (toyImg) {
            const toyButtonImg = document.querySelector('.actionButton img[src*="Toys"]');
            if (toyButtonImg) toyButtonImg.src = toyImg;
        }
    }
}

// Load everything
window.addEventListener('DOMContentLoaded', loadTamagotchi);

//===========================================================================
// Function to play with the pet
//===========================================================================
window.addEventListener("DOMContentLoaded", () => {
    // Getting all the necessary items
    const btnPlay = document.getElementById('btnPlay');
    const pet = document.getElementById('petDisplay');
    const animatedToy = document.getElementById('toyAnimationDisplay');

    // Animate after having all the items
    if (btnPlay && pet && animatedToy) {
        btnPlay.addEventListener('click', () => {
            const favoriteToy = localStorage.getItem('tamagotchiToyImg') || '../Images/Toys/ColorfulRope.png'
            animatedToy.src = favoriteToy;

            pet.classList.add('petPlayEffect');
            animatedToy.classList.add('toyFlyEffect')
        });

        // Removing the animation after it's done so we can play again
        pet.addEventListener('animationend', () => {
            pet.classList.remove('petPlayEffect');
        });

        animatedToy.addEventListener('animationend', () => {
            animatedToy.classList.remove('toyFlyEffect');
        });
    }
})

//===========================================================================
// Function to feed the pet
//===========================================================================
window.addEventListener("DOMContentLoaded", () => {
    // Getting all the necessary items
    const feedPlay = document.getElementById('feedPlay');
    const pet = document.getElementById('petDisplay');
    const animatedTreat = document.getElementById('treatAnimationDisplay');

    // Animate after having all the items
    if (feedPlay && pet && animatedTreat) {
        feedPlay.addEventListener('click', () => {
            const treat = '../Images/Treats/StarTreat.png'
            animatedTreat.src = treat;

            pet.classList.add('petJumpEffect');
            animatedTreat.classList.add('toyFlyEffect')
        });

        // Removing the animation after it's done so we can feed the pet again
        pet.addEventListener('animationend', () => {
            pet.classList.remove('petJumpEffect');
        });

        animatedTreat.addEventListener('animationend', () => {
            animatedTreat.classList.remove('toyFlyEffect');
        });
    }
})
//===========================================================================
// Function to put the pet to sleep
//===========================================================================
window.addEventListener("DOMContentLoaded", () => {
    // Getting all the necessary items
    const sleepPlay = document.getElementById('sleepPlay');
    const pet = document.getElementById('petDisplay');

    // Animate after having all the items
    if (sleepPlay && pet) {
        sleepPlay.addEventListener('click', () => {

            pet.classList.add('petSleepEffect');
        });

        // Removing the animation after it's done so we can feed the pet again
        pet.addEventListener('animationend', () => {
            pet.classList.remove('petSleepEffect');
        });

    }
})