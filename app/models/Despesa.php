<?php
require_once __DIR__ . '/../config/conexao.php';

class Despesa {
    public function criar($usuarioId, $descricao, $valor, $categoria, $data) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO despesas (descricao, valor, categoria, data, usuario_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$descricao, $valor, $categoria, $data, $usuarioId]);
    }

    public function listarPorUsuario($usuarioId) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM despesas WHERE usuario_id = ?");
        $stmt->execute([$usuarioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletar($id) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM despesas WHERE id = ?");
        $stmt->execute([$id]);
    }
}
