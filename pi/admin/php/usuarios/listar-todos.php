<?php 

require_once('../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$query = $conexao->prepare("SELECT usuario_id, nome, email FROM usuarios ORDER BY nome ASC");        
$res = $query->execute();    

return $query->fetchAll(PDO::FETCH_OBJ);

unset($query);
$bd->fecharConexao();
unset($bd);

?>