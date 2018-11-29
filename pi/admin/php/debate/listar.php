<?php 

require_once('../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$IdDebate = $_GET['id'];

$query = $conexao->prepare("SELECT IdDebate, linkVideo FROM debatepolitico WHERE IdDebate = :IdDebate");        
$query->bindParam(':IdDebate', $IdDebate, PDO::PARAM_INT);

$res = $query->execute();    
return $query->fetch(PDO::FETCH_ASSOC);

unset($query);
$bd->fecharConexao();
unset($bd);




?>