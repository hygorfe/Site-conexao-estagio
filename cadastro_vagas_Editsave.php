<?php 
require_once "config.php";

if(isset($_POST["submitAtualizar"])){

    $ID_CadastroVagas = $_POST["id"];
    $skillVaga = mysqli_escape_string($conn, $_POST["skill-vaga"]);
    $tituloVaga = mysqli_escape_string($conn, $_POST["titulo-vaga"]);
    $tecnologias = mysqli_escape_string($conn,  implode(",", $_POST["tecnologias"]));
    $dataEncerramento = mysqli_escape_string($conn, $_POST["data-encerramento"]);
    $nomeEmpresa = mysqli_escape_string($conn, $_POST["nome-empresa"]);
    $tamanhoEmpresa = mysqli_escape_string($conn, $_POST["tamanho-empresa"]);
    $modeloTrabalho = mysqli_escape_string($conn, $_POST["modelo-trabalho"]);
    $salario = mysqli_escape_string($conn, $_POST["salario"]);
    $tipoContrato = mysqli_escape_string($conn, $_POST["tipo-contrato"]);
    $descEmpresa = mysqli_escape_string($conn, $_POST["desc-empresa"]);
    $atividadeResponsabilidade = mysqli_escape_string($conn, $_POST["atividade-responsabilidade"]);
    $requisitos = mysqli_escape_string($conn, $_POST["Requisitos"]);

    $sql = "UPDATE cadastro_vagas SET skill_vaga = '$skillVaga', titulo_vaga = '$tituloVaga', tecnologias = '$tecnologias', data_encerramento = '$dataEncerramento', nome_empresa = '$nomeEmpresa', tamanho_empresa = '$tamanhoEmpresa', modelo_trabalho = '$modeloTrabalho', salario = '$salario', tipo_contrato = '$tipoContrato', descricao = '$descEmpresa', atividades = '$atividadeResponsabilidade', requisitos = '$requisitos' WHERE ID_CadastroVagas = '$ID_CadastroVagas'";

    if(mysqli_query($conn, $sql)){
    header("Location: tela_gerenciamento_vagas.php");
    exit;
    }
}




?>
