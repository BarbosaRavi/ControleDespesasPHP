<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: ../view/login.html"); // Redireciona se não estiver logado
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Menu</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>Bem-vindo, <?php echo $_SESSION["usuario"]; ?>!</h1>
    <nav>
        <ul>
            <li><a href="#">Página 1</a></li>
            <li><a href="#">Página 2</a></li>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </nav>
</body>
</html>