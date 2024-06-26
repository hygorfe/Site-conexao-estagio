<?php 
session_start();
require_once "config.php";

if(isset($_GET["id"])){
    
    $ID_localidadeEmpresa = $_GET["id"];


        $sql = "DELETE FROM localidade_empresa WHERE ID_localidadeEmpresa = '$ID_localidadeEmpresa'";
    

        if(mysqli_query($conn, $sql)){
            header("Location: localidade_empresa.php");
            exit;
        }
}
// 
?>