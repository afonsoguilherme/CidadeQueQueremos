<?php

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$imagem_nome = $_FILES['imagem']['name'];
$imagem_temp = $_FILES['imagem']['tmp_name'];
$imagem_tamanho = $_FILES['imagem']['size'];


if(isset($imagem_nome)) {
	$pasta_upload = '../../uploads/usuarios/'; 

	$imagem_extensao = strtolower(pathinfo($imagem_nome, PATHINFO_EXTENSION));

	$extensoes_validas = array('jpeg', 'jpg', 'png', 'gif');

	$novo_nome_imagem = md5($imagem_nome).'.'.$imagem_extensao;

	if(in_array($imagem_extensao, $extensoes_validas)){   
		if($imagem_tamanho < 5000000){
			move_uploaded_file($imagem_temp, $pasta_upload.$novo_nome_imagem);
		} else {
	 		echo "<script>alert('A imagem possui tamanho maior do que o permitido!'); </script>";
		}
	} else {
		echo "<script>alert('Somente arquivos com extensão: JPG, JPEG, PNG e GIF são permitidos!');</script>";
	}
}

$query = $conexao->prepare("INSERT INTO usuarios (nome, email, senha, imagem)  VALUES (:nome, :email, md5(:senha), :imagem)");
$query->bindParam(':nome', $nome, PDO::PARAM_STR);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->bindParam(':senha', $senha, PDO::PARAM_STR);
$query->bindParam(':imagem', $novo_nome_imagem, PDO::PARAM_STR);
$res = $query->execute();	        

unset($query);
$bd->fecharConexao();
unset($bd);

echo ("<script>alert('Adicionado com sucesso!'); location.href = '../../usuarios.php';</script>");

?>