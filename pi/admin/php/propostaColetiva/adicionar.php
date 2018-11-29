<?php

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$categoriaProposta_id = $_POST['categoriaProposta_id'];
$TituloProposta = $_POST['TituloProposta'];
$DescricaoProposta = $_POST['DescricaoProposta'];
$NomeIdealizador = $_POST['NomeIdealizador'];
$EmailIdealizador = $_POST['EmailIdealizador'];
$TelefoneIdealizador = $_POST['TelefoneIdealizador'];


$query = $conexao->prepare("INSERT INTO propostacoletiva (categoriaProposta_id, TituloProposta, DescricaoProposta, NomeIdealizador, EmailIdealizador, TelefoneIdealizador) 
										VALUES
										(:categoriaProposta_id, :TituloProposta, :DescricaoProposta, :NomeIdealizador, :EmailIdealizador, :TelefoneIdealizador)");

$query->bindParam(':categoriaProposta_id', $categoriaProposta_id, PDO::PARAM_STR);
$query->bindParam(':TituloProposta', $TituloProposta, PDO::PARAM_STR);
$query->bindParam(':DescricaoProposta', $DescricaoProposta, PDO::PARAM_STR);
$query->bindParam(':NomeIdealizador', $NomeIdealizador, PDO::PARAM_STR);
$query->bindParam(':EmailIdealizador', $EmailIdealizador, PDO::PARAM_STR);
$query->bindParam(':TelefoneIdealizador', $TelefoneIdealizador, PDO::PARAM_STR);

$res = $query->execute();	        

unset($query);
$bd->fecharConexao();
unset($bd);

echo ("<script>alert('Adicionado com sucesso!'); location.href = '../../../pages/propostacoletiva.php';</script>");

function inverter_Data_Para_AAAAMMDD($data) {

    $dataInvertida = substr($data, 6,4) . '-' . substr($data, 3,2) . '-' . substr($data, 0,2);
    return $dataInvertida;
}

?>