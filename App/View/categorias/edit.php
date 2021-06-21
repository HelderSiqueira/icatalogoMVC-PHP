<div class="categorias-container">
    <form class="form-categorias" method="POST" action="/categorias/update/<?= $dados->id ?>">
        <ul>
            <?php
            //verifica se existe erros na sessão do usuário
            if (isset($_SESSION["erros"])) {
                //se existir percorre os erros exbindo na tela
                foreach ($_SESSION["erros"] as $erro) {
            ?>
                <li><?= $erro ?></li>
            <?php
            }
                //eliminar da sessão os erros já mostrados
                unset($_SESSION["erros"]);
            }
            ?>
        </ul>
        <h1 class="span2">Editar Categorias</h1>
        <div class="input-group span2">
            <label for="descricao">Descricao</label>
            <input type="text" name="descricao" id="descricao" value="<?= $dados->descricao ?>"/>
        </div>
        <button type="button" onclick="javascript: window.location.href = '/categorias'">
            Cancelar
        </button>
        <button>Salvar</button>
    </form>
</div>