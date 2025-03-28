<?php
session_start();
require_once '../model/loginModelAuth.php';

if ($_POST["Entrar"]) {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    try {
        $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=exercicioLogin", "ravi", "senha");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $authModel = new AuthModel($pdo);
        if ($authModel->login($usuario, $senha)) {
            $_SESSION["usuario"] = $usuario; // Armazena o usuário na sessão
            header("Location: ../view/menu.php"); // Redireciona para o menu
            exit();
        } else {
            echo "Usuário ou senha inválidos";
        }
    } catch (PDOException $erro) {
        echo "Falha na conexão: " . $erro->getMessage();
    }
}
?>