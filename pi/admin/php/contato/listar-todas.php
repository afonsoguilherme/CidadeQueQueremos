<?php 

require_once('../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$query = $conexao->prepare("SELECT *
							FROM contatos");

$res = $query->execute();    

return $query->fetchAll(PDO::FETCH_OBJ);

unset($query);
$bd->fecharConexao();
unset($bd);

?>