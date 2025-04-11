<?php
require_once __DIR__ . '/../config/conexao.php';

class RelatorioController {
    public function gerarRelatorio($usuarioId) {
        global $conn;

        $stmt = $conn->prepare("
            SELECT MONTH(data) AS mes, SUM(valor) AS total 
            FROM despesas 
            WHERE usuario_id = ? 
            GROUP BY MONTH(data) 
            ORDER BY mes
        ");
        $stmt->execute([$usuarioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function gastosPorCategoria($usuarioId) {
        global $conn;

        $stmt = $conn->prepare("
            SELECT categoria, SUM(valor) AS total
            FROM despesas
            WHERE usuario_id = ?
            GROUP BY categoria
        ");
        $stmt->execute([$usuarioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarTodasDespesas($usuarioId) {
        global $conn;

        $stmt = $conn->prepare("
            SELECT descricao, valor, categoria, data
            FROM despesas
            WHERE usuario_id = ?
            ORDER BY data ASC
        ");
        $stmt->execute([$usuarioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
