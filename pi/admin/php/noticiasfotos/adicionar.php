<?php

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$totalimagens = count($_FILES['imagens']['name']);
$noticia_id = $_POST['noticia_id'];


for($i = 0; $i < $totalimagens; $i++) {
    $imagem_nome = $_FILES['imagens']['name'][$i];
    $imagem_temp = $_FILES['imagens']['tmp_name'][$i];
    $imagem_tamanho = $_FILES['imagens']['size'][$i];

    if(isset($imagem_nome)) {
        $pasta_upload = '../../uploads/noticiasfotos/'.$noticia_id.'/'; 

        if(!is_dir($pasta_upload)){
            $pasta = '../../uploads/noticiasfotos/'.$noticia_id.'/';
            mkdir($pasta, 0777,true);
        }

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

    $query = $conexao->prepare("INSERT INTO noticias_fotos (noticia_id, imagem)  VALUES (:noticia_id, :imagem)");

    $query->bindParam(':noticia_id', $noticia_id, PDO::PARAM_INT);
    $query->bindParam(':imagem', $novo_nome_imagem, PDO::PARAM_STR);

    $res = $query->execute();	   
}     

unset($query);
$bd->fecharConexao();
unset($bd);

echo ("<script>alert('Adicionado com sucesso!'); location.href = '../../noticia-album.php?noticia_id=$noticia_id';</script>");

?>