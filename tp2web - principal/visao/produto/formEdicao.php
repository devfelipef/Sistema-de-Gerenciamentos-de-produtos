<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../frontend/src/css_forms/produto/formedicaoproduto.css">
    <title>Formulário de edição do Produto</title>
</head>
<?php
include('../../verificaLogin.php');
?>
<body class="body">
    <?php
    require_once '../../dao/DAOProduto.php';
    require_once '../../dao/Conexao.php';
    require_once '../../modelo/Produto.php';

    $id = filter_input(INPUT_POST, 'idEstoque');

    $dao = new DAOProduto();
    $lista = $dao->localiza($id);

    $produto = $lista[0];
    ?>

    <div class="cadastro">
        <h1> Edição do Produto </h1>
        <form action="edicao.php" method="post">
            <input type="hidden" name="idEstoque" id="idEstoque" value="<?= $produto['idEstoque'] ?>">
            <input class="dados" type="hidden" name="idFuncionario" id="idFuncionario" value="<?= $produto['idFuncionario'] ?>">

            <label for="preco">Preço</label>
            <input class="dados" type="text" name="preco" value="<?= $produto['preco'] ?>">

            <br>

            <button class="btnSalvar"> Salvar </button>
        </form>

        <form action="../formPrincipal.php">
            <button class="btnInicio"> Início </button>
        </form>

        <form action="./listar.php">
            <button> Produtos </button>
        </form>
    </div>
</body>

</html>