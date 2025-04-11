<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: html/login.php');
    exit;
}
?>

<title>Menu</title>
<link rel="stylesheet" href="css/index.css">
<div class="form-container">
    <h1>Bem-vindo, <?= htmlspecialchars($_SESSION['usuario']['nome']) ?>!</h1>
    <a href="html/despesas.php" class="button">
        <img src="img/despesa.png" alt="Ícone de Despesas" class="icon"> Cadastrar despesas
    </a><br>
    <a href="html/perfil.php" class="button">
        <img src="img/perfil.png" alt="Ícone de Perfil" class="icon"> Perfil do Usuario
    </a><br>
    <a href="/html/logout.php" class="button">
        <img src="img/sair.png" alt="Ícone de Sair" class="icon"> Sair
    </a>    
</div>
