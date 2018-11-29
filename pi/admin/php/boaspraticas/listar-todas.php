<?php 

require_once('../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$query = $conexao->prepare("SELECT * FROM boaspraticas ORDER BY IdBoasPraticas DESC");        
$res = $query->execute();    

return $query->fetchAll(PDO::FETCH_OBJ);

unset($query);
$bd->fecharConexao();
unset($bd);

?>