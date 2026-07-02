<?php
    require "../Config/auth.php";
    require "../Config/config.php";

    $id = $_SESSION["id"];

    $sql = "SELECT
    user.username,
    pets.petName,
    pets.pet_img,
    pets.toy_img,
    pets.bed_img

    FROM user
    INNER JOIN pets
    ON user.id = pets.userID
    WHERE user.id=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $pet = $stmt->get_result()->fetch_assoc();

?> 

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon"  type="png" href="../Images/Icons/PurpleStar.png" />
    <link rel="stylesheet" href="../Styles/formsAction.css">
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

    <!-- Farm background -->
    <div class="background">
        <!-- Title with the name of the player and the pet -->
        <p>Tamagotchi da <span id="ownerNameDisplay"><?= $pet["username"] ?></span> | Pet: <span id="petNameDisplay"><?= $pet["petName"] ?></span></p>

        <!-- Box with all the game elements -->
        <div class="objectsBox">
            <!-- Reserve images in case the player doesn't have a pet yet  -->
            <img id="bedDisplay" src="<?= $pet["bed_img"] ?>" alt="">
            <img id="petDisplay" src="<?= $pet["pet_img"] ?>" alt="">
            <img id="toyAnimationDisplay" src="<?= $pet["toy_img"] ?>" alt="" class="toyAnimation">
            <img id="treatAnimationDisplay" src="" alt="" class="toyAnimation">

            <!-- Pink box with the animation options -->
            <div class="boxInputs">
                <div class="actionButton" id="btnPlay">
                    <img src="../Images/Toys/ColorfulRope.png" alt="">
                    <p>Brincar</p>
                </div>
                <div class="actionButton" id="feedPlay">
                    <img src="../Images/Treats/StarTreat.png" alt="">
                    <p>Comer</p>
                </div>
                <div class="actionButton" id="sleepPlay">
                    <img src="../Images/Beds/Blue.png" alt="">
                    <p>Descansar</p>
                </div>
            </div>
    
        </div>
    </div>
    <script src="../Scripts/Script.js"></script>
</body>
</html>