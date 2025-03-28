<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastro de Usuário</h1>
    <form method="POST" action="../controller/cadastroController.php">
        <input type="text" name="usuario" placeholder="Usuário" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <input type="password" name="confirmar_senha" placeholder="Confirmar Senha" required>
        <input type="submit" name="Cadastrar" value="Cadastrar">
    </form>
</body>
</html>
