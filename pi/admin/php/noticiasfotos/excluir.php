<?php 

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$id = $_GET['id'];
$noticia_id = $_GET['noticia_id'];

$query = $conexao->prepare("DELETE FROM noticias_fotos WHERE id = :id");
$query->bindParam(':id', $id, PDO::PARAM_INT);
$res = $query->execute();

unset($query);
$bd->fecharConexao();
unset($bd);

echo ("<script>alert('Excluído com sucesso!'); location.href = '../../noticia-album.php?noticia_id=".$noticia_id."';</script>");

?>