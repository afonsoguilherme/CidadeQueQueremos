<?php 

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$id = $_GET['id'];

$query = $conexao->prepare("DELETE FROM events WHERE id = :id");
$query->bindParam(':id', $id, PDO::PARAM_INT);
$res = $query->execute();

unset($query);
$bd->fecharConexao();
unset($bd);

echo ("<script>alert('Excluído com sucesso!'); location.href = '../../agenda.php';</script>");

?>