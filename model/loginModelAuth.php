<?php

class AuthModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function login($usuario, $senha) {
        $sql = "SELECT senha FROM usuarios WHERE usuario = :usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            $senhaSalva = $resultado['senha'];

            // Comparação simples (sem hash)
            if ($senha === $senhaSalva) {
                return true;
            }
        }

        return false;
    }
}
