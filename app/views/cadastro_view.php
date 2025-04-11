<?php session_start(); ?>
<h2>Cadastro</h2>
<?php if (!empty($_SESSION['erro'])): ?>
  <p style="color:red"><?= $_SESSION['erro']; unset($_SESSION['erro']); ?></p>
<?php endif; ?>
<form method="POST" action="cadastro.php">
  <input type="text" name="nome" placeholder="Nome" required><br>
  <input type="email" name="email" placeholder="E-mail" required><br>
  <input type="password" name="senha" placeholder="Senha" required><br>
  <button type="submit">Cadastrar</button>
</form>
<p>Já tem conta? <a href="/html/login.php">Faça login</a></p>
