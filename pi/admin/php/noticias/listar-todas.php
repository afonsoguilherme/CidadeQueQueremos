<?php 

require_once('../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$query = $conexao->prepare("SELECT N.*, C.descricao
							FROM noticias AS N
							INNER JOIN categorias C ON C.categoria_id = N.categoria_id
							ORDER BY N.data DESC");        
$res = $query->execute();    

return $query->fetchAll(PDO::FETCH_OBJ);

unset($query);
$bd->fecharConexao();
unset($bd);

?>