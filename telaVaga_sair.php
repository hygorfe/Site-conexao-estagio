<?php 
session_start();
session_destroy();
unset($_SESSION["email"]);
unset($_SESSION["senha"]);
header("Location: tela_vaga_cadastrada.php");

?>