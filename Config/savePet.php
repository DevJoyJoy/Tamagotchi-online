<?php
    session_start();
    require "config.php";

    if (!isset($_SESSION["id"])) {
        header("Location: ../index.php");
        exit();
    }

    $usuario_id = $_SESSION["id"];

    $petNome = $_POST["petName"];
    $petImg = $_POST["petImg"];
    $toyImg = $_POST["toyImg"];
    $bedImg = $_POST["bedImg"];

    $sql = "SELECT id FROM pets WHERE userID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $sql = "UPDATE pets
                SET petName = ?, pet_img = ?, toy_img = ?, bed_img = ?
                WHERE userID = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "ssssi",
            $petNome,
            $petImg,
            $toyImg,
            $bedImg,
            $usuario_id
        );

    } else {
        $sql = "INSERT INTO pets
                (userID, petName, pet_img, toy_img, bed_img)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "issss",
            $usuario_id,
            $petNome,
            $petImg,
            $toyImg,
            $bedImg
        );
    }

    if ($stmt->execute()) {
        header("Location: ../Pages/formsAction.php");
        exit();
    } else {
        echo "Erro ao salvar o pet.";
    }
?>