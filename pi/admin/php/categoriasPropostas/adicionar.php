<?php

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$descricao = $_POST['descricao'];

$query = $conexao->prepare("INSERT INTO categoriasPropostas (descricao)  VALUES (:descricao)");
$query->bindParam(':descricao', $descricao, PDO::PARAM_STR);
$res = $query->execute();	        

unset($query);
$bd->fecharConexao();
unset($bd);

echo ("<script>alert('Adicionado com sucesso!'); location.href = '../../categoriasPropostas.php';</script>");

?>