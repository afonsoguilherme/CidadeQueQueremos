
<?php 

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$contato_id = $_GET['id'];

$query = $conexao->prepare("DELETE FROM contatos WHERE contato_id = :contato_id");
$query->bindParam(':contato_id', $contato_id, PDO::PARAM_INT);
$res = $query->execute();

unset($query);
$bd->fecharConexao();
unset($bd);

echo ("<script>alert('Excluído com sucesso!'); location.href = '../../contato.php';</script>");

?>