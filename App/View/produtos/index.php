<?php
foreach($dados as $produto){
  //recuperou as variáveis do produto
  $valor = $produto->valor;
  $desconto = $produto->desconto;

  $valorDesconto = 0;

  //se houver desconto, tranforma a porcentagem em valor
  if ($desconto > 0) {
    $valorDesconto = ($desconto / 100) * $valor;
  }

  //verificou quantidade de parcelas referente ao valor
  $qtdeParcelas = $valor > 1000 ? 12 : 6;
  $valorComDesconto = $valor - $valorDesconto;
  $valorParcela = $valorComDesconto / $qtdeParcelas;

?>
  <article class="card-produto">
    <?php
    if (isset($_SESSION["usuarioId"])) {
    ?>
      <div class="acoes-produtos">
        <img onclick="javascript: window.location = './editar/?id=<?= $produto['id'] ?>'" src="../imgs/edit.svg" />
        <img onclick="deletar(<?= $produto->id ?>)" src="../imgs/trash.svg" />
      </div>
    <?php
    }
    ?>
    <figure>
      <img src="/fotos/<?= $produto->imagem ?>" />
    </figure>
    <section>
      <span class="preco">
        R$ <?= number_format($valorComDesconto, 2, ",", ".") ?>
        <em><?= $desconto ?>% off</em>
      </span>
      <span class="parcelamento">ou em
        <em>
          <?= $qtdeParcelas ?>x R$<?= number_format($valorParcela, 2, ",", ".") ?> sem juros
        </em>
      </span>

      <span class="descricao"><?= $produto->descricao ?></span>
      <span class="categoria">
        <em><?= $produto->categoria ?></em>
      </span>
    </section>
    <footer>

    </footer>
  </article>
<?php
}
?>
<form id="formDeletar" method="POST" action="./acoes.php">
  <input type="hidden" name="acao" value="deletar" />
  <input type="hidden" name="produtoId" id="produtoId" />
</form>