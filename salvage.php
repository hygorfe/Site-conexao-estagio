<?php 
session_start();
require_once "config.php";

if(isset($_POST['submit_salva']) && (isset($_SESSION['email']) && (isset($_SESSION['senha'])))){
    $dataNasc = mysqli_escape_string($conn, $_POST['dataNasc']);
    $genero = mysqli_escape_string($conn, $_POST['genero']);
    $pergunta_2FA = mysqli_escape_string($conn, $_POST['ask-usuario']);
    $resposta_2FA = mysqli_escape_string($conn, $_POST['ask-resposta']);
    $estadoCivil = mysqli_escape_string($conn, $_POST['estadoCivil']);
    $linkL = mysqli_escape_string($conn, $_POST['link-L']);
    $linkP = mysqli_escape_string($conn, $_POST['link-P']);

    
    if(($_FILES['img_profile']) && !empty($_FILES["img_profile"])){
        move_uploaded_file($_FILES["img_profile"]["tmp_name"], "./pic_img/". $_FILES["img_profile"]["name"]);
        echo "Foto enviada com sucesso";
    }
    
    
    if(isset($_FILES["img_profile"]) && $_FILES["img_profile"]["error"] == 0){
    
        move_uploaded_file($_FILES["img_profile"]["tmp_name"], "./pic_img/" . $_FILES["img_profile"]["name"]);
    
        $imgProfile = "pic_img/" . $_FILES["img_profile"]["name"];
    }else{
        $imgProfile = "";
    }
    
    $email = $_SESSION['email'];
    
    $sql = "SELECT ID_candidato FROM candidato WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    
    
    if(mysqli_num_rows($result) > 0){
    $linha = mysqli_fetch_assoc($result);
    $IDcandidato = $linha['ID_candidato'];

    $sql_Check = "SELECT * FROM infog_candidato WHERE FK_candidato = '$IDcandidato'";
    $result = mysqli_query($conn, $sql_Check);

    if(mysqli_num_rows($result) > 0){
    $sql = "UPDATE infog_candidato SET data_nasc = '$dataNasc', genero = '$genero', 2FA_pergunta = '$pergunta_2FA', 2FA_resposta = '$resposta_2FA', estado_civil = '$estadoCivil', link_L = '$linkL', link_P = '$linkP', img_profile = '$imgProfile' WHERE FK_candidato = '$IDcandidato'";
    }else{
    $sql = "INSERT INTO infog_candidato(FK_candidato, data_nasc, genero, 2FA_pergunta, 2FA_resposta, estado_civil, link_L, link_P, img_profile) VALUES('$IDcandidato','$dataNasc', '$genero', '$pergunta_2FA', '$resposta_2FA', '$estadoCivil', '$linkL', '$linkP', '$imgProfile')";
    }   


    
    if(mysqli_query($conn, $sql)){
           
    $nome = mysqli_escape_string($conn, $_POST['nome']);
    $sobrenome = mysqli_escape_string($conn, $_POST['sobrenome']);
    $telefone = mysqli_escape_string($conn, $_POST['celular']);
    $cpf = mysqli_escape_string($conn, $_POST['cpf']);

    $sql_C = "UPDATE candidato SET nome = '$nome', sobrenome = '$sobrenome', telefone = '$telefone', cpf = '$cpf' WHERE ID_candidato = '$IDcandidato'";

        if(mysqli_query($conn, $sql_C)){
            header("Location: tela_informação_concluida.php");
            exit;
        }
    }
  }
 }
?>