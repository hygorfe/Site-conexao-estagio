<?php 
session_start();
unset($_SESSION['emailEmpresa']);
unset($_SESSION['senha']);
header("Location: tela_de_login_empresa.php");
exit;
?>