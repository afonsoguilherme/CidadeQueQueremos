
<?php 

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$IdDebate = $_GET['id'];

$query = $conexao->prepare("DELETE FROM debatepolitico WHERE IdDebate = :IdDebate");
$query->bindParam(':IdDebate', $IdDebate, PDO::PARAM_INT);
$res = $query->execute();

unset($query);
$bd->fecharConexao();
unset($bd);

echo ("<script>alert('Excluído com sucesso!'); location.href = '../../debate.php';</script>");

?>