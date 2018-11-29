<?php 

require_once('../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$Idindicadores = $_GET['id'];

$query = $conexao->prepare("SELECT Idindicadores, name FROM indicadores WHERE Idindicadores = :Idindicadores");        
$query->bindParam(':Idindicadores', $Idindicadores, PDO::PARAM_INT);

$res = $query->execute();    
return $query->fetch(PDO::FETCH_ASSOC);

unset($query);
$bd->fecharConexao();
unset($bd);




?>