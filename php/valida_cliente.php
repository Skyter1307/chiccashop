<?php
session_start();
include 'conexao.php';

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if ($email && $senha) {
    $stmt = $conn->prepare("SELECT id, nome, senha FROM clientes WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $nome, $senha_hash);
        $stmt->fetch();

        if (password_verify($senha, $senha_hash)) {
            $_SESSION['cliente_id'] = $id;
            $_SESSION['cliente_nome'] = $nome;

            // Redireciona após login bem-sucedido
            header("Location: index.html");
            exit;
        } else {
            echo "<script>alert('Senha incorreta!'); window.location.href='../login_cliente.php';</script>";
        }
    } else {
        echo "<script>alert('E-mail não encontrado!'); window.location.href='../login_cliente.php';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Preencha todos os campos!'); window.location.href='../login_cliente.php';</script>";
}

$conn->close();
