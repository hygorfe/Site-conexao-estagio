<?php 
session_start();
require_once "config.php";

if(isset($_GET["id"])){
    
    $ID_localidade = $_GET["id"];


        $sql = "DELETE FROM localidade WHERE ID_localidade = '$ID_localidade'";

        if(mysqli_query($conn, $sql)){
            header("Location: localidade.php");
            exit;
        }
}

?>
