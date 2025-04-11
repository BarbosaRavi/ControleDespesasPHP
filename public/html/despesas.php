<?php
require_once '../../app/controllers/DespesaController.php';

$controller = new DespesaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->salvar();
}

$despesas = $controller->listar();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Despesas</title>
    <link rel="stylesheet" href="../css/despesas.css">
</head>
<body>
    <div class="form-container">
    <a href="../index.php">Voltar</a>
    <h1>Cadastro de Despesas</h1>
    <?php session_start(); ?>


<form method="post" action="despesas.php">
        <input type="text" name="descricao" placeholder="Descrição" required>
        <div class="input-container">
        <span class="currency-symbol">R$</span>
        <input type="text" name="valor" placeholder="0,00" required style="padding-left: 35px;">
        </div>
        <label for="categoria">Categoria:</label>
<select name="categoria" required>
    <option value="Luz">Luz</option>
    <option value="Água">Água</option>
    <option value="Gás">Gás</option>
    <option value="Mercado">Mercado</option>
    <option value="Aluguel">Aluguel</option>
    <option value="Lazer">Lazer</option>
</select>

        <input type="date" name="data" required>
        <button type="submit">Cadastrar</button>
    </form>

</div>
<script src="../js/formatarValor.js"></script>
</body>
</html>
