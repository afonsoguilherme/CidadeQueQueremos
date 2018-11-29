<?php 

require_once('../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$IdPatrocinio = $_GET['id'];

$query = $conexao->prepare("SELECT * FROM patrocinio WHERE IdPatrocinio = :IdPatrocinio");        
$query->bindParam(':IdPatrocinio', $IdPatrocinio, PDO::PARAM_INT);

$res = $query->execute();    
return $query->fetch(PDO::FETCH_ASSOC);

unset($query);
$bd->fecharConexao();
unset($bd);

?>