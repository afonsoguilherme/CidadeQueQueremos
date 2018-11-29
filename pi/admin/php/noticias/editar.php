<?php

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$noticia_id = $_POST['noticia_id'];
$ctaegoria_id = $_POST['categoria_id'];
$titulo = $_POST['titulo'];
$data = inverter_Data_Para_AAAAMMDD($_POST['data']);
$texto = $_POST['texto'];


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
	$pasta_upload = '../../uploads/noticias/'; 

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

	
$query = $conexao->prepare("UPDATE noticias SET categoria_id = :categoria_id, titulo = :titulo, data = :data, texto = :texto, imagem = :imagem WHERE noticia_id = :noticia_id");

$query->bindParam(':noticia_id', $noticia_id, PDO::PARAM_INT);
$query->bindParam(':categoria_id', $categoria_id, PDO::PARAM_INT);
$query->bindParam(':titulo', $titulo, PDO::PARAM_STR);
$query->bindParam(':data', $data, PDO::PARAM_STR);
$query->bindParam(':texto', $texto, PDO::PARAM_STR);
$query->bindParam(':imagem', $novo_nome_imagem, PDO::PARAM_STR);

//$query->debugDumpParams();
$res = $query->execute();



unset($query);
$bd->fecharConexao();
unset($bd);	        

echo ("<script>alert('Editado com sucesso!'); location.href = '../../noticias.php';</script>");   



function inverter_Data_Para_AAAAMMDD($data) {

    $dataInvertida = substr($data, 6,4) . '-' . substr($data, 3,2) . '-' . substr($data, 0,2);
    return $dataInvertida;
}
    

?>