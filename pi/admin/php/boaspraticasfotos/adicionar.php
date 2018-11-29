<?php

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$totalimagens = count($_FILES['imagens']['name']);
$IdBoasPraticas = $_POST['IdBoasPraticas'];


for($i = 0; $i < $totalimagens; $i++) {
    $imagem_nome = $_FILES['imagens']['name'][$i];
    $imagem_temp = $_FILES['imagens']['tmp_name'][$i];
    $imagem_tamanho = $_FILES['imagens']['size'][$i];

    if(isset($imagem_nome)) {
        $pasta_upload = '../../uploads/boaspraticasfotos/'.$IdBoasPraticas.'/'; 

        if(!is_dir($pasta_upload)){
            $pasta = '../../uploads/boaspraticasfotos/'.$IdBoasPraticas.'/';
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

    $query = $conexao->prepare("INSERT INTO boaspraticas_fotos (IdBoasPraticas, imagem)  VALUES (:IdBoasPraticas, :imagem)");

    $query->bindParam(':IdBoasPraticas', $IdBoasPraticas, PDO::PARAM_INT);
    $query->bindParam(':imagem', $novo_nome_imagem, PDO::PARAM_STR);

    $res = $query->execute();	   
}     

unset($query);
$bd->fecharConexao();
unset($bd);

echo ("<script>alert('Adicionado com sucesso!'); location.href = '../../boaspraticas-album.php?IdBoasPraticas=$IdBoasPraticas';</script>");

?>