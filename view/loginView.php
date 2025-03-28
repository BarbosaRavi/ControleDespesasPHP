<!DOCTYPE html>
 <html lang="pt-br">
   <head>
    <title>Título da página</title>
    <meta charset="utf-8">
  </head>
  <body>
      <form method="POST" action="../controller/loginControllerAuth.php">
      <input type="text" name="usuario" placeholder="Usuário">
      <input type="password" name="senha" placeholder="Senha">
      <input type="submit" name="Entrar" value="Entrar">
    </form>
    <br>
    <a href="../view/cadastro.php">
        <button type="button">Cadastrar-se</button>
    </a>
  </body>
</html>
