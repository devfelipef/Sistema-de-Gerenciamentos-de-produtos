<?php
class Conexao
{
    private static $dsn = 'mysql:host=localhost;dbname=bancotp2;';
    private static $usuario = 'root';
    private static $senha = '40028922';
    private static $conexao = null;

    public static function getConexao(): PDO
    {
        if (Conexao::$conexao == null) {
            try {
                Conexao::$conexao = new PDO(Conexao::$dsn, Conexao::$usuario, Conexao::$senha);

                echo "Conexão realizada com sucesso!";
            } catch (PDOException $e) {

                echo "Erro ao conectar ao banco de dados!";
            }
        }

        return Conexao::$conexao;
    }

    public static function getPreparedStatement($sql): PDOStatement
    {
        $pst = null;
        if (Conexao::getConexao() != null) {
            try {
                $pst = Conexao::$conexao->prepare($sql);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        return $pst;
    }
}

$con = Conexao::getConexao();
?>
