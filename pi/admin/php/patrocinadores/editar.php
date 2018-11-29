<?php

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$IdPatrocinio = $_POST['IdPatrocinio'];
$NomePatrocinador = $_POST['NomePatrocinador'];
$Descricao = $_POST['Descricao'];


if(!empty($_FILES['Imagem']['name'])) {
	$imagem_nome = $_FILES['Imagem']['name'];
	$imagem_temp = $_FILES['Imagem']['tmp_name'];
	$imagem_tamanho = $_FILES['Imagem']['size'];
	$imagem_atual = $_POST['imagem_atual'];
}
else if(!empty($_POST['imagem_atual'])) {
	$novo_nome_imagem = $_POST['imagem_atual'];
}

if(!empty($imagem_nome)) {
	//exit('entrou');
	$pasta_upload = '../../uploads/patrocinadores/'; 

	$imagem_extensao = strtolower(pathinfo($imagem_nome, PATHINFO_EXTENSION));

	$extensoes_validas = array('jpeg', 'jpg', 'png');

	$novo_nome_imagem = md5($imagem_nome).'.'.$imagem_extensao;

	if(in_array($imagem_extensao, $extensoes_validas)){   
		if($imagem_tamanho < 5000000){
			if(!empty($imagem_atual)) {
				unlink($pasta_upload.$imagem_atual);	
			}			
			move_uploaded_file($imagem_temp, $pasta_upload.$novo_nome_imagem);
		} else {
	 		echo "<script>alert('A imagem possui tamanho maior do que o permitido!'); </script>";
		}
	} else {
		echo "<script>alert('Somente arquivos com extensão: JPG, JPEG e PNG são permitidos!');</script>";
	}
}

	
$query = $conexao->prepare("UPDATE patrocinio SET IdPatrocinio = :IdPatrocinio, NomePatrocinador = :NomePatrocinador, Imagem = :Imagem, Descricao = :Descricao WHERE IdPatrocinio = :IdPatrocinio");

$query->bindParam(':IdPatrocinio', $IdPatrocinio, PDO::PARAM_INT);
$query->bindParam(':NomePatrocinador', $NomePatrocinador, PDO::PARAM_STR);
$query->bindParam(':Imagem', $novo_nome_imagem, PDO::PARAM_STR);
$query->bindParam(':Descricao', $Descricao, PDO::PARAM_STR);

//$query->debugDumpParams();
$res = $query->execute();

unset($query);
$bd->fecharConexao();
unset($bd);	        

echo ("<script>alert('Editado com sucesso!'); location.href = '../../patrocinadores.php';</script>");    

?>