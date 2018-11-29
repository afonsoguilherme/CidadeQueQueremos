<?php
session_start();
include_once("../data/BD.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
$cor = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING);
$inicio = filter_input(INPUT_POST, 'inicio', FILTER_SANITIZE_STRING);
$fim = filter_input(INPUT_POST, 'fim', FILTER_SANITIZE_STRING);
$local = filter_input(INPUT_POST, 'local', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);

if(!empty($id) && !empty($titulo) && !empty($cor) && !empty($inicio) && !empty($fim) && !empty($local) && !empty($descricao)){

	$data = explode(" ", $inicio);
	list($date, $hora) = $data;
	$data_sem_barra = array_reverse(explode("/", $date));
	$data_sem_barra = implode("-", $data_sem_barra);
	$inicio_sem_barra = $data_sem_barra . " " . $hora;
	
	$data = explode(" ", $fim);
	list($date, $hora) = $data;
	$data_sem_barra = array_reverse(explode("/", $date));
	$data_sem_barra = implode("-", $data_sem_barra);
	$fim_sem_barra = $data_sem_barra . " " . $hora;

	$bd = new BD();
    $conexao = $bd->abrirConexao();

	$query = $conexao->prepare("UPDATE events SET titulo='$titulo' , cor='$cor' , inicio='$inicio_sem_barra' , fim='$fim_sem_barra' , local='$local' , descricao='$descricao' WHERE id='$id'");  
	
	if($query->execute()){
		$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Evento editado com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		$bd->fecharConexao();
		unset($query);
    	unset($bd);
		header("Location: agenda.php");
	} else {
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao editar o evento <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		$bd->fecharConexao();
		unset($query);
    	unset($bd);
		header("Location: agenda.php");
	}

}else{
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao cadastrar o evento <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	
	unset($query);
	unset($bd);
	header("Location: agenda.php");
}

?>