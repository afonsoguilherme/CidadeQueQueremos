<?php 

require_once('../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$IdBoasPraticas = $_GET['IdBoasPraticas'];

$query = $conexao->prepare("SELECT * FROM boaspraticas_fotos WHERE IdBoasPraticas = :IdBoasPraticas");        
$query->bindParam(':IdBoasPraticas', $IdBoasPraticas, PDO::PARAM_INT);

$res = $query->execute();    
return $query->fetchAll(PDO::FETCH_OBJ);

unset($query);
$bd->fecharConexao();
unset($bd);




?>