
<?php 

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$categoria_id = $_GET['id'];

$query = $conexao->prepare("DELETE FROM categorias WHERE categoria_id = :categoria_id");
$query->bindParam(':categoria_id', $categoria_id, PDO::PARAM_INT);
$res = $query->execute();

unset($query);
$bd->fecharConexao();
unset($bd);

echo ("<script>alert('Excluído com sucesso!'); location.href = '../../categorias.php';</script>");

?>