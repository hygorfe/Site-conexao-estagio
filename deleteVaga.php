<?php 
session_start();
require_once "config.php";

if(isset($_GET["id"])){
    
    $ID_CadastroVagas = $_GET["id"];


        $sql = "DELETE FROM cadastro_vagas WHERE ID_CadastroVagas = '$ID_CadastroVagas'";
    

        if(mysqli_query($conn, $sql)){
            header("Location: tela_gerenciamento_vagas.php");
            exit;
        }
}







?>