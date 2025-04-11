<?php
session_start();
require_once '../app/controllers/DespesaController.php';

$controller = new DespesaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->salvar();
}

$despesas = $controller->listar();
?>

<h2>Minhas Despesas</h2>

<form method="post">
    <input type="text" name="titulo" placeholder="Título" required>
    <input type="text" name="valor" placeholder="Valor" step="0.01" required>
    <input type="text" name="categoria" placeholder="Categoria" required>
    <input type="date" name="data" required>
    <button type="submit">Adicionar</button>
</form>

