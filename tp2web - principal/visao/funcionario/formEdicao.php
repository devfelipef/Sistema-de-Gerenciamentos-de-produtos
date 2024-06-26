<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Nota Promissória</title>
    <link rel="stylesheet" href="../../frontend/src/css_forms/funcionario/formedicaofuncionario.css">
</head>

<?php
include('../../verificaLogin.php');

require_once '../../dao/DAOFuncionario.php';
require_once '../../dao/Conexao.php';
require_once '../../modelo/Funcionario.php';

$id = filter_input(INPUT_GET, 'idFuncionario');

$dao = new DAOFuncionario();
$lista = $dao->localiza($id);

$funcionario = $lista[0];
?>

<body class="body">
    <form action="edicao.php" method="post">
        <input type="hidden" name="idFuncionario" id="idFuncionario" value="<?= $funcionario['idFuncionario'] ?>">

        <label for="nome">Nome</label>
        <input type="text" name="nome" value="<?= $funcionario['nome'] ?>">

        <br>

        <label for="usuario">Usuário</label>
        <input type="text" name="usuario" value="<?= $funcionario['usuario'] ?>">

        <br>

        <label for="senha">Senha</label>
        <input type="password" name="senha" value="<?= $funcionario['senha'] ?>">

        <br>
        <button type="submit">Salvar</button>
    </form>

    <form action="../formPrincipal.php">
        <button type="submit">Início</button>
    </form>
</body>

</html>
