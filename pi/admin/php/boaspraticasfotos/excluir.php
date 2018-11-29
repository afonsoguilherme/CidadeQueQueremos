<?php 

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$id = $_GET['id'];
$IdBoasPraticas = $_GET['IdBoasPraticas'];

$query = $conexao->prepare("DELETE FROM boaspraticas_fotos WHERE id = :id");
$query->bindParam(':id', $id, PDO::PARAM_INT);
$res = $query->execute();

unset($query);
$bd->fecharConexao();
unset($bd);

echo ("<script>alert('Excluído com sucesso!'); location.href = '../../boaspraticas-album.php?IdBoasPraticas=".$IdBoasPraticas."';</script>");

?>