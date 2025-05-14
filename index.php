<?php
include 'php/conexao.php';

$sql = "SELECT id, nome, preco, imagem FROM produtos WHERE status = 'ativo' ORDER BY id DESC LIMIT 6";
$result = $conn->query($sql);
?>

<?php include 'php/header.php'?>

  <!-- Banner -->
  <div class="container my-4">
    <div class="p-5 text-center bg-light rounded-3 shadow">
      <h1 class="display-4 fw-bold">Bem-vinda à ChiccaShop</h1>
      <p class="lead">Seu universo de sensualidade, perfumes, lingerie e prazer.</p>
      <a href="produtos.php" class="btn btn-danger btn-lg mt-3">Ver Produtos</a>
    </div>
  </div>

  <!-- Produtos em destaque -->
  <div class="container my-5">
    <h2 class="mb-4">Destaques</h2>
    <div class="row">
      <?php if ($result->num_rows > 0): ?>
        <?php while ($produto = $result->fetch_assoc()): ?>
          <div class="col-md-4 mb-4">
            <div class="card h-100">
              <img src="imagens/<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>">
              <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($produto['nome']) ?></h5>
                <p class="card-text">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
                <a href="produto.html?id=<?= $produto['id'] ?>" class="btn btn-dark w-100">Ver Produto</a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>Nenhum produto encontrado.</p>
      <?php endif; ?>
    </div>
  </div>

  <!-- Rodapé -->

  <?php include 'php/footer.php'?>