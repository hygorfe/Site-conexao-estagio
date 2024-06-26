<?php 
session_start();
print_r($_SESSION);
require_once "config.php";
// 
if(isset($_POST["submitSalvar"])){
    $emailEmpresa = $_SESSION["emailEmpresa"];

    $razaoSocial = mysqli_escape_string($conn, $_POST["razao-social"]);
    $nomeFantasia = mysqli_escape_string($conn, $_POST["nome-fantasia"]);
    $emailEmpresa = mysqli_escape_string($conn, $_POST["email"]);
    $CNPJ = mysqli_escape_string($conn, $_POST["cnpj"]);
    $tel = mysqli_escape_string($conn, $_POST["telefone"]);
    $senha = mysqli_escape_string($conn, $_POST["senha"]);
    $qlt_estagiarios = mysqli_escape_string($conn, $_POST["qlt-estagiarios"]);
    $tamanhoEmpresa = mysqli_escape_string($conn, $_POST["tamanho-empresa"]);

    $sql = "SELECT * FROM empresa_cad WHERE email_empresa = '$emailEmpresa'";
    $result = mysqli_query($conn, $sql);

    print_r($sql);

    if(mysqli_num_rows($result) > 0){
        $linha = mysqli_fetch_assoc($result);
        $ID_empresa_cad = $linha["ID_empresa_cad"];

        $sql = "UPDATE empresa_cad SET razao_social = '$razaoSocial', nome_fantasia = '$nomeFantasia', email_empresa = '$emailEmpresa', cnpj = '$CNPJ', telefone = '$tel', senha = '$senha', qlt_estagiarios = '$qlt_estagiarios', tamanho_empresa = '$tamanhoEmpresa' WHERE ID_empresa_cad = '$ID_empresa_cad'";

    if(mysqli_query($conn, $sql)){
        header("Location: tela_informação_concluida_empresa.php");
        exit;

    }

    }
}
?>