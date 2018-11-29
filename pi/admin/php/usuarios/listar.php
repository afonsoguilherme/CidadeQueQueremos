<?php 

require_once('../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$usuario_id = $_GET['id'];

$query = $conexao->prepare("SELECT usuario_id, nome, email FROM usuarios WHERE usuario_id = :usuario_id");        
$query->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);

$res = $query->execute();    
return $query->fetch(PDO::FETCH_ASSOC);

unset($query);
$bd->fecharConexao();
unset($bd);




?>