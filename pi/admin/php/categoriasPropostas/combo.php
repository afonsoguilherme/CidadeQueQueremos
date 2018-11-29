<?php 

require_once('../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$query = $conexao->prepare("SELECT categoriaProposta_id, descricao FROM categoriasPropostas ORDER BY descricao ASC");        
$res = $query->execute();    

return $query->fetchAll(PDO::FETCH_OBJ);

unset($query);
$bd->fecharConexao();
unset($bd);

?>