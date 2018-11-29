<?php

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$linkVideo = $_POST['linkVideo'];

$query = $conexao->prepare("INSERT INTO debatepolitico (linkVideo)  VALUES (:linkVideo)");
$query->bindParam(':linkVideo', $linkVideo, PDO::PARAM_STR);
$res = $query->execute();	        

unset($query);
$bd->fecharConexao();
unset($bd);

echo ("<script>alert('Adicionado com sucesso!'); location.href = '../../debate.php';</script>");

?>