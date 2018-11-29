<?php

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$categoria_id = $_POST['categoria_id'];
$descricao = $_POST['descricao'];
	
$query = $conexao->prepare("UPDATE categorias SET descricao = :descricao WHERE categoria_id = :categoria_id");
$query->bindParam(':descricao', $descricao, PDO::PARAM_STR);
$query->bindParam(':categoria_id', $categoria_id, PDO::PARAM_INT);
$res = $query->execute();

unset($query);
$bd->fecharConexao();
unset($bd);	        

echo ("<script>alert('Editado com sucesso!'); location.href = '../../categorias.php';</script>");   
    

?>