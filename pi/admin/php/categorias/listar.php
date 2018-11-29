<?php 

require_once('../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$categoria_id = $_GET['id'];

$query = $conexao->prepare("SELECT categoria_id, descricao FROM categorias WHERE categoria_id = :categoria_id");        
$query->bindParam(':categoria_id', $categoria_id, PDO::PARAM_INT);

$res = $query->execute();    
return $query->fetch(PDO::FETCH_ASSOC);

unset($query);
$bd->fecharConexao();
unset($bd);




?>