<?php 

require_once('../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$noticia_id = $_GET['noticia_id'];

$query = $conexao->prepare("SELECT * FROM noticias_fotos WHERE noticia_id = :noticia_id");        
$query->bindParam(':noticia_id', $noticia_id, PDO::PARAM_INT);

$res = $query->execute();    
return $query->fetchAll(PDO::FETCH_OBJ);

unset($query);
$bd->fecharConexao();
unset($bd);




?>