<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listar das Notas Promissórias</title>
    <link rel="stylesheet" href="../../frontend/src/css_forms/notas/formlistarinativas.css">
</head>
<?php
include('../../verificaLogin.php');
?>
<body class="body">
    <div class="tabela">
        <h1> Notinhas Inativas </h1>
        <table>
            <tr>
                <th> ID Notinha</th>
                <th> Fornecedor </th>
                <th> Preço </th>
                <th> Data da Compra </th>
                <th> Data do Pagamento </th>
                <th> Excluir </th>
            </tr>

            <?php
            require_once '../../dao/DAONotaPromissoria.php';
            require_once '../../dao/DAOFornecedor.php';
            require_once '../../dao/Conexao.php';

            $dao = new DAONotaPromissoria();
            $lista = $dao->listaInativas();

            $daoFornecedor = new DAOFornecedor();
            $listaFornecedor = $daoFornecedor->lista();

            foreach ($lista as $v) {
                echo '<tr>';

                echo '<td>' . $v['idNotaPromissoria'] . '</td>';
                echo '<td>' . $v['nome'] . '</td>';
                echo '<td>' . $v['preco'] . '</td>';
                echo '<td>' . $v['dataCompra'] . '</td>';
                echo '<td>' . $v['dataPagamento'] . '</td>';
                echo '<td> <form action="./verificaExclusao.php" method="POST"> <input name="exclui" type="hidden" value="' . $v['idNotaPromissoria'] . '"/> <button class="botoesTd"> <img src="../css/imagens/apagar.png"/> </button> </form></td>';

                echo '</tr>';
            }
            ?>

        </table>
    </div>

    <div class="botoes">
        <form action="../formPrincipal.php">
            <button> Início </button>
        </form>

        <form action="./listar.php">
            <button> Ativas </button>
        </form>
    </div>
</body>

</html>