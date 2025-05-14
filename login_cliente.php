<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login do Cliente - ChiccaShop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
  <h2 class="text-center mb-4">Login do Cliente</h2>
  <form action="php/valida_cliente.php" method="POST">
    <div class="mb-3">
      <label for="email" class="form-label">E-mail</label>
      <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="senha" class="form-label">Senha</label>
      <input type="password" name="senha" id="senha" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Entrar</button>
  </form>
</div>

</body>
</html>
