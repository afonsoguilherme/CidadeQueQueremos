<?php 

require_once('../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$contato_id = $_GET['id'];

$query = $conexao->prepare("SELECT * FROM contatos WHERE contato_id = :contato_id");        
$query->bindParam(':contato_id', $contato_id, PDO::PARAM_STR);

$res = $query->execute();    
return $query->fetch(PDO::FETCH_ASSOC);

unset($query);
$bd->fecharConexao();
unset($bd);




?>