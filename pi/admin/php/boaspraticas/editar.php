<?php

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$IdBoasPraticas = $_POST['IdBoasPraticas'];
$Titulo = $_POST['Titulo'];
$Descricao = $_POST['Descricao'];
$Texto = $_POST['Texto'];


if(!empty($_FILES['imagem']['name'])) {
	$imagem_nome = $_FILES['imagem']['name'];
	$imagem_temp = $_FILES['imagem']['tmp_name'];
	$imagem_tamanho = $_FILES['imagem']['size'];
	$imagem_atual = $_POST['imagem_atual'];
}
else if(!empty($_POST['imagem_atual'])) {
	$novo_nome_imagem = $_POST['imagem_atual'];
}

if(!empty($imagem_nome)) {
	//exit('entrou');
	$pasta_upload = '../../uploads/boaspraticas/'; 

	$imagem_extensao = strtolower(pathinfo($imagem_nome, PATHINFO_EXTENSION));

	$extensoes_validas = array('jpeg', 'jpg', 'png', 'gif');

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
		echo "<script>alert('Somente arquivos com extensão: JPG, JPEG, PNG e GIF são permitidos!');</script>";
	}
}

	
$query = $conexao->prepare("UPDATE boaspraticas SET Titulo = :Titulo, Descricao = :Descricao, Texto = :Texto, imagem = :imagem WHERE IdBoasPraticas = :IdBoasPraticas");

$query->bindParam(':IdBoasPraticas', $IdBoasPraticas, PDO::PARAM_INT);
$query->bindParam(':Titulo', $Titulo, PDO::PARAM_STR);
$query->bindParam(':Descricao', $Descricao, PDO::PARAM_STR);
$query->bindParam(':Texto', $Texto, PDO::PARAM_STR);
$query->bindParam(':imagem', $novo_nome_imagem, PDO::PARAM_STR);

//$query->debugDumpParams();
$res = $query->execute();



unset($query);
$bd->fecharConexao();
unset($bd);	        

echo ("<script>alert('Editado com sucesso!'); location.href = '../../boaspraticas.php';</script>");   


    

?>