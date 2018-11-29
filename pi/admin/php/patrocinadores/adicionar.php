<?php

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$NomePatrocinador = $_POST['NomePatrocinador'];
$Descricao = $_POST['Descricao'];
$imagem_nome = $_FILES['Imagem']['name'];
$imagem_temp = $_FILES['Imagem']['tmp_name'];
$imagem_tamanho = $_FILES['Imagem']['size'];

if(isset($imagem_nome)) {
	$pasta_upload = '../../uploads/patrocinadores/'; 

	$imagem_extensao = strtolower(pathinfo($imagem_nome, PATHINFO_EXTENSION));

	$extensoes_validas = array('jpeg', 'jpg', 'png');

	$novo_nome_imagem = md5($imagem_nome).'.'.$imagem_extensao;

	if(in_array($imagem_extensao, $extensoes_validas)){   
		if($imagem_tamanho < 5000000){
			move_uploaded_file($imagem_temp, $pasta_upload.$novo_nome_imagem);
		} else {
	 		echo "<script>alert('A imagem possui tamanho maior do que o permitido!'); </script>";
		}
	} else {
		echo "<script>alert('Somente arquivos com extensão: JPG, JPEG e PNG são permitidos!');</script>";
	}
}


$query = $conexao->prepare("INSERT INTO patrocinio (NomePatrocinador,Imagem,Descricao) VALUES (:NomePatrocinador,:Imagem,:Descricao)");

$query->bindParam(':NomePatrocinador', $NomePatrocinador, PDO::PARAM_STR);
$query->bindParam(':Imagem', $novo_nome_imagem, PDO::PARAM_STR);
$query->bindParam(':Descricao', $Descricao, PDO::PARAM_STR);


$res = $query->execute();	        

unset($query);
$bd->fecharConexao();
unset($bd);

echo ("<script>alert('Adicionado com sucesso!'); location.href = '../../patrocinadores.php';</script>");

?>