<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles-global.css" />
    <link rel="stylesheet" href="/css/produtos.css" />
    <link rel="stylesheet" href="/css/categorias.css" />
    <link rel="stylesheet" href="/css/header.css" />
    <title>Administrar Produtos</title>
</head>

<body>
    <?php
    include("../App/View/header.php");
    ?>
    <div class="content">
        <section class="produtos-container">
            <?php
            //mostrar os botões somente caso o usuário esteja logado
            //verificar o $_SESSION
            if(isset($_SESSION["usuarioId"])){
            ?>
            <header>
                <button onclick="javascript:window.location.href ='./novo/'">Novo Produto</button>
                <button onclick="javascript:window.location.href ='../categorias'">Adicionar Categoria</button>
            </header>
            <?php
            }
            ?>
            <main>

<?php require_once"../App/View/" . $view . ".php"; ?>

</main>
        </section>
    </div>
    <footer>
        SENAI 2021 - Todos os direitos reservados
    </footer>
    <script lang="javascript">
        function deletar(produtoId){
            if(confirm("Confirmar ação de exclusão?")){
                document.querySelector("#produtoId").value = produtoId;
                document.querySelector("#formDeletar").submit();    
            }
        }
    </script>
</body>
</html>