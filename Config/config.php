<!-- Connecting the database and PHP -->
<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "tamagotchi";

    $conn = new mysqli($host,$user,$password,$database);

    if($conn->connect_error){
        die("Erro: ".$conn->connect_error);
    }

    echo "Conectado!"; 
?>