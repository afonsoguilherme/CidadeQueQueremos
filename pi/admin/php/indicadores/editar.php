<?php

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$Idindicadores = $_POST['Idindicadores'];
$Titulo = $_POST['Titulo'];
	
$query = $conexao->prepare("UPDATE indicadores SET Titulo = :Titulo WHERE Idindicadores = :Idindicadores");
$query->bindParam(':Titulo', $Titulo, PDO::PARAM_STR);
$query->bindParam(':Idindicadores', $Idindicadores, PDO::PARAM_INT);
$res = $query->execute();

unset($query);
$bd->fecharConexao();
unset($bd);	        

echo ("<script>alert('Editado com sucesso!'); location.href = '../../indicadores.php';</script>");   
    

?>