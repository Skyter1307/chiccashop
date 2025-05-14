<?php
include 'conexao.php';

$sql = "SELECT * FROM produtos ORDER BY criado_em DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($produto = $result->fetch_assoc()) {
        echo '
        <div class="col-md-4 mb-4">
          <div class="card h-100 shadow">
            <img src="img/produtos/' . htmlspecialchars($produto['imagem']) . '" class="card-img-top" alt="' . htmlspecialchars($produto['nome']) . '">
            <div class="card-body">
              <h5 class="card-title">' . htmlspecialchars($produto['nome']) . '</h5>
              <p class="card-text">' . nl2br(htmlspecialchars($produto['descricao'])) . '</p>
              <h6 class="text-danger">R$ ' . number_format($produto['preco'], 2, ',', '.') . '</h6>
              <a href="#" class="btn btn-success w-100">Adicionar ao Carrinho</a>
            </div>
          </div>
        </div>
        ';
    }
} else {
    echo "<p class='text-muted'>Nenhum produto cadastrado ainda.</p>";
}

$conn->close();
?>
