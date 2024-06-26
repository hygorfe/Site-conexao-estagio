<?php 
session_start();
require_once "config.php";

if(isset($_GET["id"])){
    
    $ID_formacao = $_GET["id"];


        $sql = "DELETE FROM formacao WHERE ID_formacao = '$ID_formacao'";
    

        if(mysqli_query($conn, $sql)){
            header("Location: formação.php");
            exit;
        }
}






?>