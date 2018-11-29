<?php 

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$IdPropostaColetiva = $_GET['id'];

$query = $conexao->prepare("DELETE FROM propostacoletiva WHERE IdPropostaColetiva = :IdPropostaColetiva");
$query->bindParam(':IdPropostaColetiva', $IdPropostaColetiva, PDO::PARAM_INT);
$res = $query->execute();

unset($query);
$bd->fecharConexao();
unset($bd);

echo ("<script>alert('Excluído com sucesso!'); location.href = '../../propostacoletiva.php';</script>");

?>