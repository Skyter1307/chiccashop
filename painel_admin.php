<?php
session_start();

// Verifica se é admin
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo - ChiccaShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand">Painel Admin</span>
        <div class="d-flex">
            <a href="logout.php" class="btn btn-outline-light">Sair</a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2>Bem-vindo ao Painel Administrativo!</h2>
    <p>Aqui você poderá gerenciar os produtos, pedidos e clientes.</p>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Produtos</div>
                <div class="card-body">
                    <h5 class="card-title">Gerenciar Produtos</h5>
                    <p class="card-text">Cadastrar, editar ou excluir produtos.</p>
                    <a href="php/cadastrar_produto.php" class="btn btn-light">Acessar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Pedidos</div>
                <div class="card-body">
                    <h5 class="card-title">Visualizar Pedidos</h5>
                    <p class="card-text">Acompanhar os pedidos feitos pelos clientes.</p>
                    <a href="admin_pedidos.php" class="btn btn-light">Acessar</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Clientes</div>
                <div class="card-body">
                    <h5 class="card-title">Lista de Clientes</h5>
                    <p class="card-text">Consultar todos os clientes cadastrados.</p>
                    <a href="admin_clientes.php" class="btn btn-light">Acessar</a>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>
