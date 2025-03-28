<?php
session_start();
require_once '../model/cadastroModel.php';

if (isset($_POST["Cadastrar"])) {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $confirmarSenha = $_POST["confirmar_senha"];

    // Verifique se as senhas coincidem
    if ($senha !== $confirmarSenha) {
        echo "As senhas não coincidem!";
        exit();
    }

    try {
        $pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=exercicioLogin", "ravi", "senha");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $cadastroModel = new CadastroModel($pdo);
        if ($cadastroModel->cadastrar($usuario, $senha)) {
            header("Location: ../view/loginView.php"); // Redireciona para o menu
            exit();
        } else {
            echo "Usuário já existe!";
        }
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
}
?>
