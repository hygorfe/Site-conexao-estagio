<?php 
require_once "config.php";
session_start();
if(isset($_POST["salvar_senha"])){
    // 
    $senhaAtual = mysqli_escape_string($conn, $_POST["senha_atual"]);
    $nova_senha = mysqli_escape_string($conn, $_POST["nova_senha"]);

    $email = $_SESSION["email"];

    $sql = "SELECT senha, email FROM candidato WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $linha = mysqli_fetch_assoc($result);  
        $senha = $linha["senha"];

        $sql = "UPDATE candidato SET senha = '$nova_senha' WHERE email = '$email'";

        if(mysqli_query($conn, $sql)){
            header("Location: formulario_informaçoes_gerais.php");
            exit;
        }

    }
}

if(isset($_POST["salvar_email"])){
    $novo_email = mysqli_escape_string($conn, $_POST["novo_email"]);
    
    $email = $_SESSION["email"];
    $sql = "SELECT email FROM candidato WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $linha = mysqli_fetch_assoc($result);
        $email = $linha["email"];
    
    $sql = "UPDATE candidato SET email = '$novo_email' WHERE email = '$email'";

    if(mysqli_query($conn, $sql)){
        header("Location: tela_de_login.php");
        exit;
    }
  }
}


?>