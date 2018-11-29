<?php 

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$usuario_id = $_GET['id'];

$query = $conexao->prepare("DELETE FROM usuarios WHERE usuario_id = :usuario_id");
$query->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
$res = $query->execute();

unset($query);
$bd->fecharConexao();
unset($bd);

echo ("<script>alert('Excluído com sucesso!'); location.href = '../../usuarios.php';</script>");

?>