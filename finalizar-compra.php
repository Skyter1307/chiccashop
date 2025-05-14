<?php
// Simulando um produto selecionado (em produção virá do carrinho ou produto.php)
$produto_nome = $_GET['nome'] ?? 'Produto Exemplo';
$produto_preco = $_GET['preco'] ?? '49.90';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Finalizar Compra - ChiccaShop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container my-5">
  <h2 class="text-center mb-4">Finalizar Compra</h2>
  <div class="card p-4 shadow-sm">
    <h4><?php echo htmlspecialchars($produto_nome); ?></h4>
    <p>Preço: <strong>R$ <?php echo number_format($produto_preco, 2, ',', '.'); ?></strong></p>
    
    <form method="POST" action="https://pagseguro.uol.com.br/v2/checkout/payment.html" target="_blank">
      <input type="hidden" name="receiverEmail" value="jrodrigues1307@gmail.com">
      <input type="hidden" name="currency" value="BRL">
      <input type="hidden" name="itemId1" value="0001">
      <input type="hidden" name="itemDescription1" value="<?php echo htmlspecialchars($produto_nome); ?>">
      <input type="hidden" name="itemAmount1" value="<?php echo number_format($produto_preco, 2, '.', ''); ?>">
      <input type="hidden" name="itemQuantity1" value="1">
      <button type="submit" class="btn btn-success">Pagar com PagSeguro</button>
    </form>
  </div>
</div>

</body>
</html>
