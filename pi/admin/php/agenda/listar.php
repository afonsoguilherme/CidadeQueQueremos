<?php 

require_once('../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$id = $_GET['id'];

$query = $conexao->prepare("SELECT * FROM events WHERE id = :id");        
$query->bindParam(':id', $id, PDO::PARAM_INT);

$res = $query->execute();    
return $query->fetch(PDO::FETCH_ASSOC);

unset($query);
$bd->fecharConexao();
unset($bd);

?>