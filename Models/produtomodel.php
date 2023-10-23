<?php
class produtoModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarProduto($produto , $descricao , $preco) {
        $sql = "INSERT INTO produto (produto , descricao , preco) VALUES (?, ?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$produto , $descricao , $preco]);
    }

    public function listarProdutos() {
        $sql = "SELECT * FROM produto";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}