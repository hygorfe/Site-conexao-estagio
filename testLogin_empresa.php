<?php 
session_start();
require_once "config.php";
// 
if(isset($_POST["submitEntrar"])){
    
    $emailEmpresa = $_POST["emailEmpresa"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM empresa_cad WHERE email_empresa = '$emailEmpresa' AND senha = '$senha'" ;
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $_SESSION["emailEmpresa"] = $emailEmpresa;
        $_SESSION["senha"] = $senha;
        header("Location: tela_2FA_empresa.php");
        exit;
    }else{
        unset($_SESSION["emailEmpresa"]);
        unset($_SESSION["senha"]);
        header("Location: tela_de_login_empresa.php");
        exit;
    }
}



?>