<?php
require "config.php";

    $nome = $_POST["username"];
    $email = $_POST["email"];

    $senha = password_hash(
        $_POST["userPassword"],
        PASSWORD_DEFAULT
    );

    $sql = "INSERT INTO tamagotchiUsers(username,email,userPassword)
            VALUES(?,?,?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "sss",
        $nome,
        $email,
        $senha
    );

    $stmt->execute();

    header("Location: ../Pages/login.php");

?>