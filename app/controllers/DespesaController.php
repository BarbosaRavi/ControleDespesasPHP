<?php
require_once __DIR__ . '/../models/Despesa.php';

class DespesaController {
    private $despesa;

    public function __construct() {
        $this->despesa = new Despesa();
    }

    public function salvar() {
        session_start();
        $usuarioId = $_SESSION['usuario']['id'];
        $this->despesa->criar(
            $usuarioId,
            $_POST['descricao'],
            $valor = str_replace(['.', ','], ['', '.'], $_POST['valor']),
            $_POST['categoria'],
            $_POST['data']
            
        );
        header("Location: /html/despesas.php");
        exit;
    }

    public function listar() {
        session_start();
        $usuarioId = $_SESSION['usuario']['id'];
        return $this->despesa->listarPorUsuario($usuarioId);
    }
}
