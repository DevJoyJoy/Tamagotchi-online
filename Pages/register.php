<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon"  type="png" href="../Images/Icons/PurpleStar.png" />
    <link rel="stylesheet" href="../Styles/login.css">
    <link rel="stylesheet" href="../Styles/general.css">
    <title>Tamagotchi</title>
</head>
<body>
    <!-- Header on top of the page -->
    <div class="header">
        <img src="../Images/Icons/PurpleStar.png" alt="">
        <p><a href="./mainPage.php">Tamagotchi.online</a></p>
        <img src="../Images/Icons/YellowStar.png" alt="">
    </div>

    <!-- Div for the background -->
    <div class="background">

        <!-- Pink box with all the inputs to login -->
        <div class="boxInputs">
            <!-- Forms to collect all the info -->
            <form method="POST" action="./Config/register.php">
                <!-- Align the text inputs -->
                <h1>Cadastre-se para começar!</h1>
                <br>
                <p class="titles">Nome do usuário:</p>
                <input type="text" name="username" placeholder="Digite seu nome: " required>
                <br><br>
                <p class="titles">Email do usuário:</p>
                <input type="text" name="email" placeholder="Digite seu email: " required>
                <br><br>
                <p class="titles">Senha:</p>
                <input type="password" name="userPassword" placeholder="Digite sua senha: " required>
                <br><br>
    
                <!-- Buttons to login and create account -->
                <a href="../index.php" class="buttonStart">
                    Já possui conta? Faça login!
                </a>
                <br>
                <a href="../index.php" type="submit" class="buttonStart">
                    Criar
                </a>
            </form>
        </div>
    </div>

    <script src="../Scripts/Script.js"></script>
</body>
</html>