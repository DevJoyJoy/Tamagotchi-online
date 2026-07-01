<?php
require "../Config/auth.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon"  type="png" href="../Images/Icons/PurpleStar.png" />
    <link rel="stylesheet" href="../Styles/forms.css">
    <link rel="stylesheet" href="../Styles/general.css">
    <title>Tamagotchi</title>
</head>
<body>
    <!-- Header on top of the page -->
    <div class="header">
        <img src="../Images/Icons/PurpleStar.png" alt="">
        <p><a href="../mainPage.php">Tamagotchi.online</a></p>
        <img src="../Images/Icons/YellowStar.png" alt="">
    </div>

    <!-- Menu with the other pages -->
    <div class="menu">
        <a href="../mainPage.php">Página inicial</a>
        <a href="./about.php">Sobre o site</a>
        <a href="./options.php">Opções</a>
        <a href="./forms.php">Criar pet</a>
    </div>

    <!-- Div for the background -->
    <div class="background">

        <!-- Pink box with all the inputs to create the pet -->
        <form class="boxInputs" method="POST" action="../Config/savePet.php">
            <!-- Align the text inputs and the pets carroussel -->
            <div class="firstRow">   
                <div>
                    <p class="titles">Seu nome*</p>
                    <input type="text" name="ownerName" id="ownerName" value="<?= $_SESSION['nome'] ?>" placeholder="Digite seu nome: " required readonly>
                    <br><br>
                    <p class="titles">Nome do pet*</p>
                    <input type="text" name="petName" id="petName" placeholder="Digite o nome do pet: " required>
                </div>

                <!-- Pets carroussel -->
                <div class="carroussel size-pet">
                    <div class="carroussel-container">
                        <img src="../Images/Pets/CalicoCat.png" alt="Pet 1" class="pet-img">
                        <img src="../Images/Pets/OrangeCat.png" alt="Pet 4" class="pet-img">
                        <img src="../Images/Pets/CaramelDog.png" alt="Pet 2" class="pet-img">
                        <img src="../Images/Pets/HuskyDog.png" alt="Pet 3" class="pet-img">
                        <img src="../Images/Pets/Pigeon.png" alt="Pet 5" class="pet-img">
                        <img src="../Images/Pets/Rabbit.png" alt="Pet 6" class="pet-img">
                    </div>
                    
                    <button type="button" class="btn-carroussel prev" onclick="moveSlide(this, -1)">&#10094;</button>
                    <button type="button" class="btn-carroussel next" onclick="moveSlide(this, 1)">&#10095;</button>
                </div>
            </div>

            <!-- Carroussel for the toys -->
            <p class="titles">Brinquedo favorito:</p>
            <div class="carroussel size-item">
                <div class="carroussel-container">
                    <img src="../Images/Toys/ColorfulRope.png" alt="Toy 1" class="pet-img">
                    <img src="../Images/Toys/RatToy.png" alt="Toy 2" class="pet-img">
                    <img src="../Images/Toys/TennisBall.png" alt="Toy 3" class="pet-img">
                    <img src="../Images/Toys/YarnBall.png" alt="Toy 4" class="pet-img">
                </div>
                
                <button type="button" class="btn-carroussel prev" onclick="moveSlide(this, -1)">&#10094;</button>
                <button type="button" class="btn-carroussel next" onclick="moveSlide(this, 1)">&#10095;</button>
            </div>

            <!-- Carroussel for the beds -->
            <p class="titles">Cor da cama do pet:</p>
            <div class="carroussel size-item">
                <div class="carroussel-container">
                    <img src="../Images/Beds/Blue.png" alt="Bed 2" class="pet-img">
                    <img src="../Images/Beds/Acquamarine.png" alt="Bed 1" class="pet-img">
                    <img src="../Images/Beds/Pink.png" alt="Bed 3" class="pet-img">
                    <img src="../Images/Beds/Yellow.png" alt="Bed 4" class="pet-img">
                    <img src="../Images/Beds/Green.png" alt="Bed 5" class="pet-img">
                </div>
                
                <button type="button" class="btn-carroussel prev" onclick="moveSlide(this, -1)">&#10094;</button>
                <button type="button" class="btn-carroussel next" onclick="moveSlide(this, 1)">&#10095;</button>
            </div>
            
            <input type="hidden" name="petImg" id="hiddenPetImg">
            <input type="hidden" name="toyImg" id="hiddenToyImg">
            <input type="hidden" name="bedImg" id="hiddenBedImg">
            
            <!-- Button to confirm the informations -->
            <button type="submit" class="buttonStart" onclick="return saveTamagotchiData()">
                Começar
            </button>
        </form>
    </div>

    <script src="../Scripts/Script.js"></script>
</body>
</html>