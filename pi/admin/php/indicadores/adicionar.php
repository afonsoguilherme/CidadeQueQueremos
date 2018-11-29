<?php

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

if(isset($_POST['btn'])){
	$name = $_FILES['myfile']['name'];
	$type = $_FILES['myfile']['type'];
	$data = file_get_contents($_FILES['myfile']['tmp_name']);

	$query = $conexao->prepare("insert into indicadores values ('',?,?,?)");
	$query->bindParam(1, $name);
	$query->bindParam(2, $type);
	$query->bindParam(3, $data);
	$query->execute();
}	        

unset($query);
$bd->fecharConexao();
unset($bd);

echo ("<script>alert('Adicionado com sucesso!'); location.href = '../../indicadores.php';</script>");


?>

