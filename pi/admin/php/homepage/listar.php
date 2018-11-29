<?php 

require_once('../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$homepage_id = $_GET['id'];

$query = $conexao->prepare("SELECT * FROM homepage WHERE homepage_id = :homepage_id");        
$query->bindParam(':homepage_id', $homepage_id, PDO::PARAM_INT);

$res = $query->execute();    
return $query->fetch(PDO::FETCH_ASSOC);

unset($query);
$bd->fecharConexao();
unset($bd);




?>