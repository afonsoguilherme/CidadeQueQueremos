<?php 

require_once('../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$categoriaProposta_id = $_GET['id'];

$query = $conexao->prepare("SELECT categoriaProposta_id, descricao FROM categoriasPropostas WHERE categoriaProposta_id = :categoriaProposta_id");        
$query->bindParam(':categoriaProposta_id', $categoriaProposta_id, PDO::PARAM_INT);

$res = $query->execute();    
return $query->fetch(PDO::FETCH_ASSOC);

unset($query);
$bd->fecharConexao();
unset($bd);




?>