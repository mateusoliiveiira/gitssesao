
<?php
session_start();
require_once 'config.php';
require_once 'controllers/produtoController.php';
if ($_SERVER ["REQUEST_METHOD"]== "POST") {
    $produto = $_POST["produto"];
    $descricao   =  $_POST["descricao"];;
    $preco   = $_POST["preco"];

    $produtoController = new ProdutoController($pdo);

    if (isset($_POST['produto']) && 
        isset($_POST['descricao']) &&
        isset($_POST['preco'])) 
    {
        $produtoController->criarProduto($_POST['produto'], $_POST['descricao'], $_POST['preco']);
        $_SESSION["produto"] = $produto;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Cadastro de Produto</h2>
    <form method="post">
        <input type="text" name="produto" placeholder="Nome do produto"
        required><br>
        <input type="text" name="descricao" placehoder="Descrição" required><br>
        <input type="text" name="preco" placehoder="Preço" required>
        <br>
        <input type="submit" value="Cadastrar Produto"> 
    </form>


    
</body>
</html>