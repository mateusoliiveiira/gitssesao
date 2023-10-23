<?php
session_start();

if ($_SERVER ["REQUEST_METHOD"]== "POST") {
    $usuario = $_POST["usuario"];
    $senha   = password_hash($_POST["senha"], PASSWORD_BCRYPT);
    $email   = $_POST["email"];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=autenticacao", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) { 
        die("Erro na conexão com o Banco de Dados: " . $e->getMessage(
         ));
    }

    //insira os dados na tabela 'users'
    $stmt = $pdo->prepare("INSERT INTO usuarios (usuario, senha, email) VALUES (?, ?, ?)");
    $stmt->execute([$usuario, $senha, $email]);

    $_SESSION["usuario"] = $usuario;
    header("Location: dashboard.php");
    


}



   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cadastro de login</title>
</head>
<body>
    <h2>Cadastro</h2>
    <form method="post">
        <input type="text" name="usuario" placeholder="Nome de Usuario"
        required><br>
        <input type="password" name="senha" placehoder="senha" required><br>
        <input type="email" name="email" placehoder="email" required>
        <br>
        <input type="submit" value="cadastrar"> 
    </form>

    

</body>
</html>
