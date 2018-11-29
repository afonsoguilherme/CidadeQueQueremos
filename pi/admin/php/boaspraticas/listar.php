<?php 

require_once('../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$IdBoasPraticas = $_GET['id'];

$query = $conexao->prepare("SELECT * FROM boaspraticas WHERE IdBoasPraticas = :IdBoasPraticas");        
$query->bindParam(':IdBoasPraticas', $IdBoasPraticas, PDO::PARAM_INT);

$res = $query->execute();    
return $query->fetch(PDO::FETCH_ASSOC);

unset($query);
$bd->fecharConexao();
unset($bd);




?>