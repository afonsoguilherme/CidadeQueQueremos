<?php

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$categoriaProposta_id = $_POST['categoriaProposta_id'];
$descricao = $_POST['descricao'];
	
$query = $conexao->prepare("UPDATE categoriasPropostas SET descricao = :descricao WHERE categoriaProposta_id = :categoriaProposta_id");
$query->bindParam(':descricao', $descricao, PDO::PARAM_STR);
$query->bindParam(':categoriaProposta_id', $categoriaProposta_id, PDO::PARAM_INT);
$res = $query->execute();

unset($query);
$bd->fecharConexao();
unset($bd);	        

echo ("<script>alert('Editado com sucesso!'); location.href = '../../categoriasPropostas.php';</script>");   
    

?>