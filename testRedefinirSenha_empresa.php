<?php 
session_start();
require_once "config.php";

$emailRedefinir = $_POST["emailRedefinir"];


$sql = "SELECT * FROM empresa_cad WHERE email_empresa = '$emailRedefinir'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    $_SESSION["emailRedefinir"] = $emailRedefinir;
    header("Location: tela_de_redefinir_senha_empresa.php");
    exit;
    
}else{
    session_destroy();
    unset($_SESSION["emailRedefinir"]);
    header("Location: tela_de_login_empresa.php");
    exit;
}

?>