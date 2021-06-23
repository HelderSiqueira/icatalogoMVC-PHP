<div class="categorias-container">
<div style="display: flex; align-items: center; justify-content: center; gap: 10px;margin-bottom: 20px;">
        <h1 style="margin: 0;">Lista de categorias</h1>
        <button id="addCategoria" style="border-radius: 50%;">+</button>
    </div>
    <?php

    if (count($dados) == 0){
        echo "<center>Nenhuma categoria cadastrada</center>";
    }
    foreach($dados as $categoria){
    ?>
    <div class="card-categorias">
        <?= $categoria->descricao ?>
        <div>
        <img onclick="editarCategoria(<?= $categoria->id ?>)" src="/imgs/edit.svg" />
        <img onclick="deletarCategoria(<?= $categoria->id ?>)" src="/imgs/trash.svg" />
        </div>
    </div>
    <?php
    }
    ?>
    <form id="form-deletar" method="POST" action="./acoes.php">
        <input type="hidden" name="acao" value="deletar" />
        <input id="categoria-id" type="hidden" name="categoriaId" value="" />
    </form>
</div>
<script>
    document.querySelector("#addCategoria").addEventListener("click", () => {
        window.location = "/categorias/create";
    });

    function editarCategoria(id){
        window.location = `/categorias/edit/${id}`;  
    }

    function deletarCategoria(id){
        if(confirm("Deseja realmente excluir esta categoria?"))
            window.location = `/categorias/destroy/${id}`;
    }
</script>
