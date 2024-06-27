<?php 
session_start();
require_once "config.php";

$emailRedefinirCandidato = $_POST["emailRedefinirCandidato"];

print_r($emailRedefinirCandidato);

$sql = "SELECT * FROM candidato WHERE email = '$emailRedefinirCandidato'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
$_SESSION["emailRedefinirCandidato"] = $emailRedefinirCandidato;
header("Location: tela_de_redefinir_senha.php");
exit;
}else{
session_destroy();
unset($_SESSION["emailRedefinirCandidato"]);
header("Location: tela_de_login.php");
exit;
}












?>