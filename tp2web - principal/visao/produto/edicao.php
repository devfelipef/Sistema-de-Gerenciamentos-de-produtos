<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Edição de Produto</title>
</head>
<?php
include('../../verificaLogin.php');
?>
<body class="body">
    <?php
       require_once '../../dao/DAOProduto.php';
       require_once '../../dao/Conexao.php';
       require_once '../../modelo/Produto.php';

        $obj = new Produto();
        $dao = new DAOProduto();

        $id = filter_input(INPUT_POST, 'idEstoque');
        $idFuncionario = filter_input(INPUT_POST, 'idFuncionario');
        $preco = filter_input(INPUT_POST, 'preco');

        if (($id && $idFuncionario && $preco)) {
            $obj->setIdEstoque($id);
            $obj->setIdFuncionario($idFuncionario);
            $obj->setPreco($preco);

            if ($dao->altera($obj)) {
                echo '<script>
                    alert("Produto editado com sucesso!");
                    window.location.href = "./listar.php";
                  </script>';
            } else {
                echo 'Erro!';
            }
        } else {
            echo '<script>
                    alert("Dados ausentes ou incorretos!");
                    window.location.href = "./listar.php";
                  </script>';
        }
    ?>
</body>
</html>