<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Cliente - ChiccaShop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
  <h2 class="text-center mb-4">Cadastro de Cliente</h2>
  <form action="php/cadastrar_cliente.php" method="POST">
    <div class="mb-3">
      <label for="nome" class="form-label">Nome Completo</label>
      <input type="text" name="nome" id="nome" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">E-mail</label>
      <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="senha" class="form-label">Senha</label>
      <input type="password" name="senha" id="senha" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>
</div>

</body>
</html>
