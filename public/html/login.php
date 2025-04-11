<?php
require_once __DIR__ . '/../../app/controllers/AuthController.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new AuthController($conn);
    $controller->login($_POST['email'], $_POST['senha']);
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../css/cadastro.css">
</head>
<body>
<div class="form-container">
<h1>Login</h1>
    <?php
    session_start();
    if (isset($_SESSION['mensagem'])) {
        echo '<p style="color:green;">' . $_SESSION['mensagem'] . '</p>';
        unset($_SESSION['mensagem']);
    }
    if (isset($_SESSION['erro'])) {
        echo '<p style="color:red;">' . $_SESSION['erro'] . '</p>';
        unset($_SESSION['erro']);
    }
    ?>
    <form method="POST">
        <input type="text" name="email" placeholder="Email" required><br>
        <input type="password" name="senha" placeholder="Senha" required><br>
        <label>Não tem conta? Cadastre-se<a href="cadastro.php"> aqui</a></label>
        <button type="submit">Entrar</button>
    </form>
</div>
</body>
</html>
