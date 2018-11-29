<?php session_start();

unset($_SESSION['nome'], $_SESSION['email'], $_SESSION['foto']);
header('Location: ../../../admin.php');
?>