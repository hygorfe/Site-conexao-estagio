<?php 
require_once "config.php";
// 
print_r($_GET);

if(isset($_POST["btnAtualizar"])){
    
    $ID_formacao = $_POST["id"];
    $tipoEnsino = mysqli_escape_string($conn, $_POST["tipoEnsino"]);
    $periodoCurso = mysqli_escape_string($conn, $_POST["peridoCurso"]);
    $instituicaoEnsino = mysqli_escape_string($conn, $_POST["instituicaoEnsino"]);
    $tipoFormacao = mysqli_escape_string($conn, $_POST["tipoformacao"]);
    $curso = mysqli_escape_string($conn, $_POST["curso"]);
    $dataTermino = mysqli_escape_string($conn, $_POST["dataTermino"]);

    $sql = "UPDATE formacao SET tipo_ensino = '$tipoEnsino', periodo_curso = '$periodoCurso' , instituicao_ensino = '$instituicaoEnsino', tipo_formacao = '$tipoFormacao', curso = '$curso', data_termino = '$dataTermino' WHERE ID_formacao = '$ID_formacao' ";

    if(mysqli_query($conn, $sql)){
        header("Location: formação.php");
       }
  }
?>