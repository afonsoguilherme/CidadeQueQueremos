<?php 

require_once('../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$query = $conexao->prepare("SELECT P.*, CP.descricao
							FROM propostacoletiva AS P
							INNER JOIN categoriasPropostas AS CP ON CP.categoriaProposta_id = P.categoriaProposta_id
							ORDER BY IdPropostaColetiva DESC");        
$res = $query->execute();    

return $query->fetchAll(PDO::FETCH_OBJ);

unset($query);
$bd->fecharConexao();
unset($bd);

?>