
<?php 

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$categoriaProposta_id = $_GET['id'];

$query = $conexao->prepare("DELETE FROM categoriasPropostas WHERE categoriaProposta_id = :categoriaProposta_id");
$query->bindParam(':categoriaProposta_id', $categoriaProposta_id, PDO::PARAM_INT);
$res = $query->execute();

unset($query);
$bd->fecharConexao();
unset($bd);

echo ("<script>alert('Excluído com sucesso!'); location.href = '../../categoriasPropostas.php';</script>");

?>