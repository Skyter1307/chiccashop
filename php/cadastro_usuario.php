<?php
include 'conexao.php';

$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if ($nome && $email && $senha) {
    // Verifica se o e-mail já está cadastrado
    $verifica = $conn->prepare("SELECT id FROM clientes WHERE email = ?");
    $verifica->bind_param("s", $email);
    $verifica->execute();
    $verifica->store_result();

    if ($verifica->num_rows > 0) {
        echo "<script>alert('E-mail já cadastrado!'); window.location.href='../cadastro_usuario.php';</script>";
        exit;
    }

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO clientes (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $senha_hash);

    if ($stmt->execute()) {
        echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='../login_cliente.php';</script>";
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Todos os campos são obrigatórios.";
}

$conn->close();
