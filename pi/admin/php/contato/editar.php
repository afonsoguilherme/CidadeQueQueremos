<?php

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$contato_id = $_POST['contato_id'];
$nomeContato = $_POST['nomeContato'];
$emailContato = $_POST['emailContato'];
$siteContato = $_POST['siteContato'];
$comentarioContato = $_POST['comentarioContato'];

	
$query = $conexao->prepare("UPDATE contato SET contato_id = :contato_id, nomeContato = :nomeContato, emailContato = :emailContato, siteContato = :siteContato, comentarioContato = :comentarioContato");

$query->bindParam(':contato_id', $contato_id, PDO::PARAM_STR);
$query->bindParam(':nomeContato', $nomeContato, PDO::PARAM_STR);
$query->bindParam(':emailContato', $emailContato, PDO::PARAM_STR);
$query->bindParam(':siteContato', $siteContato, PDO::PARAM_STR);
$query->bindParam(':comentarioContato', $comentarioContato, PDO::PARAM_STR);

//$query->debugDumpParams();
$res = $query->execute();

unset($query);
$bd->fecharConexao();
unset($bd);	        

echo ("<script>alert('Editado com sucesso!'); location.href = '../../contato.php';</script>");   

?>