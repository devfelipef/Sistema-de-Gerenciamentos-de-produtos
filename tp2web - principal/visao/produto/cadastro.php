<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Cadastro de Produto</title>
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

    $idEstoque = filter_input(INPUT_POST, 'idEstoque');
    $preco = filter_input(INPUT_POST, 'preco');

    if (($idEstoque && $preco)) {
        try {
            $obj->setIdEstoque($idEstoque);
            $obj->setIdFuncionario($_SESSION['idFuncionario']);
            $obj->setPreco($preco);

            if ($dao->inclui($obj)) {
                echo '<script>
                    alert("Produto cadastrado com sucesso!");
                    window.location.href = "./formCadastro.php";
                  </script>';
            } else {
                echo 'Erro!';
            }
        } catch (Exception) {
            echo '<script>
                    alert("Produto já cadastrado!");
                    window.location.href = "./formCadastro.php";
                  </script>';
        }
    } else {
        echo '<script>
                alert("Dados ausentes ou incorretos");
                window.location.href = "./formCadastro.php";
              </script>';
    }
    ?>
</body>

</html>