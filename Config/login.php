<?php
    require "config.php";
    session_start();

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM user
            WHERE email=?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "s",
        $email
    );

    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows == 1){

        $usuario = $result->fetch_assoc();

        if(password_verify($senha,$usuario["userPassword"])){

            $_SESSION["id"] = $usuario["id"];
            $_SESSION["nome"] = $usuario["username"];

            header("Location: ../Pages/forms.php");
            exit();

        }

    }

    echo "Email ou senha incorretos.";

?>