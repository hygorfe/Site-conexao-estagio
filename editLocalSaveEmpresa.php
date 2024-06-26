<?php 
require_once "config.php";
// 
if(isset($_POST["submitAtualizar"])){
    
  $CEP = mysqli_escape_string($conn, $_POST["cep"]);
  $url = "https://viacep.com.br/ws/{$CEP}/json/";
  
  $response = file_get_contents($url);
  $data= json_decode($response);
  
  $ID_localidadeEmpresa = $_POST["id"];
  $endereco = mysqli_escape_string($conn, $data->logradouro);
  $bairro = mysqli_escape_string($conn, $data->bairro);
  $cidade = mysqli_escape_string($conn, $data->localidade);
  $estado = mysqli_escape_string($conn, $data->uf);
  $numero = mysqli_escape_string($conn, $_POST["numero"]);
  $complemento = mysqli_escape_string($conn, $_POST["complemento"]);

  $sql = "UPDATE localidade_empresa SET cep = '$CEP', endereco = '$endereco', numero = '$numero', complemento ='$complemento', bairro = '$bairro', cidade = '$cidade', estado = '$estado' WHERE ID_localidadeEmpresa = '$ID_localidadeEmpresa'";

  if(mysqli_query($conn, $sql)){
    header("Location: localidade_empresa.php");
    exit;
    exit;
  }

  
  }
?>