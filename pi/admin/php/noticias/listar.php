<?php 

require_once('../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$noticia_id = $_GET['id'];

$query = $conexao->prepare("SELECT * FROM noticias WHERE noticia_id = :noticia_id");        
$query->bindParam(':noticia_id', $noticia_id, PDO::PARAM_INT);

$res = $query->execute();    
return $query->fetch(PDO::FETCH_ASSOC);

unset($query);
$bd->fecharConexao();
unset($bd);




?>