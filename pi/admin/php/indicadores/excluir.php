
<?php 

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$Idindicadores = $_GET['id'];

$query = $conexao->prepare("DELETE FROM indicadores WHERE Idindicadores = :Idindicadores");
$query->bindParam(':Idindicadores', $Idindicadores, PDO::PARAM_INT);
$res = $query->execute();

unset($query);
$bd->fecharConexao();
unset($bd);

echo ("<script>alert('Excluído com sucesso!'); location.href = '../../indicadores.php';</script>");

?>