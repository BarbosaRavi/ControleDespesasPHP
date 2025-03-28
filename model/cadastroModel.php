<?php

class CadastroModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function cadastrar($usuario, $senha) {
        // Verifique se o usuário já existe
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return false; // Usuário já existe
        }

        // Inserir o novo usuário no banco
        $sql = "INSERT INTO usuarios (usuario, senha) VALUES (:usuario, :senha)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt->execute();

        return true; // Cadastro bem-sucedido
    }
}
?>
