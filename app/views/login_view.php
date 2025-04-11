<?php session_start(); ?>
<h2>Login</h2>
<?php if (!empty($_SESSION['erro'])): ?>
  <p style="color:red"><?= $_SESSION['erro']; unset($_SESSION['erro']); ?></p>
<?php endif; ?>
<form method="POST" action="login.php">
  <input type="email" name="email" placeholder="E-mail" required><br>
  <input type="password" name="senha" placeholder="Senha" required><br>
  <button type="submit">Entrar</button>
</form>
<p>Não tem conta? <a href="/html/cadastro.php">Cadastre-se</a></p>
