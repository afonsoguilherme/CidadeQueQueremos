<?php require_once('../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$Idindicadores = isset($_GET['Idindicadores'])? $_GET['Idindicadores'] : "";


$query4 = $conexao->prepare("SELECT * FROM indicadores WHERE Idindicadores = ?");
$query4->bindParam(1, $Idindicadores);
$query4->execute();   
$row = $query4->fetch();
header('Content-Type'.$row['mine']);

echo "<embed src='data:".$row['mine'].";base64,".base64_encode($row['data'])."' width='100%', height='100%'/>"

?>
