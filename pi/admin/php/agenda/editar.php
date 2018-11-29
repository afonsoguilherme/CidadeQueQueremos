<?php

require_once('../../../data/BD.php');

$bd = new BD();
$conexao = $bd->abrirConexao();

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$cor = $_POST['cor'];
$inicio = inverter_Data_Para_AAAAMMDD($_POST['inicio']);
$fim = inverter_Data_Para_AAAAMMDD($_POST['fim']);
$local = $_POST['local'];
$descricao = $_POST['descricao'];
$aprovar = $_POST['aprovar'];

$query = $conexao->prepare("UPDATE events SET titulo = :titulo, cor = :cor, inicio = :inicio, fim = :fim, local = :local, descricao = :descricao, aprovar = :aprovar WHERE id = :id");

$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->bindParam(':titulo', $titulo, PDO::PARAM_STR);
$query->bindParam(':cor', $cor, PDO::PARAM_STR);
$query->bindParam(':inicio', $inicio, PDO::PARAM_STR);
$query->bindParam(':fim', $fim, PDO::PARAM_STR);
$query->bindParam(':local', $local, PDO::PARAM_STR);
$query->bindParam(':descricao', $descricao, PDO::PARAM_STR);
$query->bindParam(':aprovar', $aprovar, PDO::PARAM_BOOL);

$res = $query->execute();

unset($query);
$bd->fecharConexao();
unset($bd);	        

echo ("<script>alert('Editado com sucesso!'); location.href = '../../agenda.php';</script>");    

function inverter_Data_Para_AAAAMMDD($data) {

    $dataInvertida = substr($data, 6,4) . '-' . substr($data, 3,2) . '-' . substr($data, 0,2);
    return $dataInvertida;
}

?>