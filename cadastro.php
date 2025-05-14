<?php
include_once "conexao.php"; // Certifique-se de que a conexão com o banco esteja funcionando

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $confirma_senha = trim($_POST['confirma_senha']);

    // Validação básica
    if (empty($nome) || empty($email) || empty($senha) || empty($confirma_senha)) {
        echo "<script>alert('Por favor, preencha todos os campos!'); history.back();</script>";
        exit;
    }

    // Verifica se as senhas conferem
    if ($senha !== $confirma_senha) {
        echo "<script>alert('As senhas não conferem!'); history.back();</script>";
        exit;
    }

    // Validação de senha forte (mínimo 6 caracteres, letra, número e caractere especial)
    if (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_]).{6,}$/', $senha)) {
        echo "<script>alert('A senha deve ter no mínimo 6 caracteres, incluindo letra, número e caractere especial!'); history.back();</script>";
        exit;
    }

    // Verifica se o email já existe
    $sql = $conn->prepare("SELECT id FROM clientes WHERE email = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $resultado = $sql->get_result();

    if ($resultado->num_rows > 0) {
        echo "<script>alert('Este e-mail já está cadastrado!'); history.back();</script>";
        exit;
    }

    // Criptografa a senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Insere no banco
    $stmt = $conn->prepare("INSERT INTO clientes (nome, email, senha, criado_em) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("sss", $nome, $email, $senha_hash);

    if ($stmt->execute()) {
        echo "<script>alert('Cadastro realizado com sucesso! Faça login para continuar.'); window.location.href = 'login.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar!'); history.back();</script>";
    }
}
?>
