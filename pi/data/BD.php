<?php

define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_DB_NAME', 'cidade');
    
class BD {

    private $conexao;    

    public function BD() {
        try {
            $this->conexao = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);
        } catch (PDOException $e) {
            echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
        }
    }

    public function abrirConexao() {
        return $this->conexao;
    }
    
    public function fecharConexao(){
        $conexao = null;
    }
    
}
?>