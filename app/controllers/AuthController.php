<?php
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../config/conexao.php';
session_start();

class AuthController {
    private $usuario;

    public function __construct($conn) {
        $this->usuario = new Usuario($conn);
    }

    public function login($email, $senha) {
        $usuario = $this->usuario->autenticar($email, $senha);
        if ($usuario) {
            $_SESSION['usuario'] = $usuario;
            header('Location:../index.php');
            exit;
        } else {
            $_SESSION['erro'] = 'Email ou senha inválidos.';
            header('Location: ../html/login.php');
            exit;
        }
    }

    public function cadastrar($nome, $email, $senha, $confirmarSenha) {
        if ($senha !== $confirmarSenha) {
            $_SESSION['erro'] = 'As senhas não coincidem.';
            header('Location: ../html/cadastro.php');
            exit;
        }

        if ($this->usuario->cadastrar($nome, $email, $senha)) {
            $_SESSION['mensagem'] = 'Cadastro realizado com sucesso!';
            header('Location: ../html/login.php');
        } else {
            $_SESSION['erro'] = 'Erro ao cadastrar usuário.';
            header('Location: ../html/cadastro.php');
        }
    }

    public function logout() {
        session_destroy();
        header('Location: ../html/login.php');
        exit;
    }
}
