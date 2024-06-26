<?php 
session_start();
require_once "config.php";
if(isset($_POST["continuarBtn"])){ 
    $ID_CadastroVagas = $_GET["id"];
    $email = $_SESSION["email"];

    $dataAplicacao = date('Y-m-d');
    $dataObjeto = date_create_from_format('Y-m-d', $dataAplicacao);
    $dataFormatada = $dataObjeto->format('d/m/Y');

            

    print_r($dataAplicacao);

    $sql_C = "SELECT ID_candidato FROM candidato WHERE email = '$email'";
    $resultado_C = mysqli_query($conn, $sql_C);

    if($resultado_C){
        $linha = mysqli_fetch_assoc($resultado_C);
        $ID_candidato = $linha["ID_candidato"];
    }

    $sql_E = "SELECT ID_CadastroVagas FROM cadastro_vagas WHERE ID_CadastroVagas = '$ID_CadastroVagas'";
    $resultado_E = mysqli_query($conn, $sql_E);

    if($resultado_E){
        $linha = mysqli_fetch_assoc($resultado_E);
        $ID_CadastroVagas = $linha["ID_CadastroVagas"];
    }

    $sql = "INSERT INTO aplicacao (FK_ID_CadastroVagas, FK_ID_candidato, DataAplicacao) VALUES('$ID_CadastroVagas', '$ID_candidato', '$dataFormatada')";

    print_r($sql);


    if(mysqli_query($conn, $sql)){
        header("Location: tela_vaga_cadastrada.php?id=$ID_CadastroVagas");
        exit;
    }
}



?>