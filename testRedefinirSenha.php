<?php 
session_start();
require_once "config.php";

$emailRedefinir = $_POST["emailRedefinir"];

$sql = "SELECT * FROM candidato WHERE email = '$emailRedefinir'";
$result = mysqli_query($conn, $sql);


if($result && mysqli_num_rows($result) > 0){
    header("Location: tela_de_redefinir_senha.php");
    exit;
}else{
    header("Location: tela_de_login.php");
    exit;
}
print_r($sql);





?>