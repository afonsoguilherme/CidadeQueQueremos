<?php 

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$IdBoasPraticas = $_GET['id'];

$query = $conexao->prepare("DELETE FROM boaspraticas WHERE IdBoasPraticas = :IdBoasPraticas");
$query->bindParam(':IdBoasPraticas', $IdBoasPraticas, PDO::PARAM_INT);
$res = $query->execute();

unset($query);
$bd->fecharConexao();
unset($bd);

echo ("<script>alert('Excluído com sucesso!'); location.href = '../../boaspraticas.php';</script>");

?>