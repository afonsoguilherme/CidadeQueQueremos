<?php 

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$IdPatrocinio = $_GET['id'];

$query = $conexao->prepare("DELETE FROM patrocinio WHERE IdPatrocinio = :IdPatrocinio");
$query->bindParam(':IdPatrocinio', $IdPatrocinio, PDO::PARAM_INT);
$res = $query->execute();

unset($query);
$bd->fecharConexao();
unset($bd);

echo ("<script>alert('Excluído com sucesso!'); location.href = '../../patrocinadores.php';</script>");

?>