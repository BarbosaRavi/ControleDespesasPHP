<?php
require_once __DIR__ . '/../../app/controllers/AuthController.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new AuthController($conn);
    $controller->cadastrar($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['confirmarSenha']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/cadastro.css">
</head>
<body>
<div class="form-container">
<h1>Cadastro</h1>
    <?php
    session_start();
    if (isset($_SESSION['erro'])) {
        echo '<p style="color:red;">' . $_SESSION['erro'] . '</p>';
        unset($_SESSION['erro']);
    }
    ?>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome" required><br>
        <input type="text" name="email" placeholder="Email" required><br>
        <input type="password" name="senha" placeholder="Senha" required><br>
        <input type="password" name="confirmarSenha" placeholder="Confirmar Senha" required><br>
        <label>Já possui conta? Clique <a href="login.php">aqui</a></label>
        <button type="submit">Cadastrar</button>
    </form>
    </div>
</body>
</html>
