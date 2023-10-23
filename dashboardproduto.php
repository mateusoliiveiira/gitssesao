<?php
    session_start();
    
    if (!isset($_SESSION["produto"])) {
    header("location:login.php");
    exit;
    }

    echo "o Produto " . $_SESSION ["produto"] . "!foi registrado.";

    ?>

    
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

<a href="registrarproduto.php">Sair</a>
    
</body>
</html>