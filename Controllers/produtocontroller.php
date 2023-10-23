<?php
require_once 'Models/produtomodel.php';



class produtocontroller {

public function __construct($pdo) {
        $this->produtoModel = new ProdutoModel($pdo);
    }

    public function criarProduto($produto , $descricao , $preco) {
        $this->produtoModel->criarProduto($produto , $descricao , $preco);
        header('Location: dashboardproduto.php');
    }
    
}

?>