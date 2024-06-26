<?php 
session_start();
require_once "config.php";

// 
if(isset($_SESSION["email"]) && (isset($_SESSION["senha"]) && (isset($_POST["Salvarbtn"])))){


    $tipoEnsino = mysqli_escape_string($conn, $_POST["tipoEnsino"]);
    $peridoCurso = mysqli_escape_string($conn, $_POST["peridoCurso"]);
    $instituicaoEnsino = mysqli_escape_string($conn, $_POST["instituicaoEnsino"]);
    $tipoformacao = mysqli_escape_string($conn, $_POST["tipoformacao"]);
    $curso = mysqli_escape_string($conn, $_POST["curso"]);
    $dataTermino = mysqli_escape_string($conn, $_POST["dataTermino"]);

    $email = $_SESSION["email"];


    $sql = "SELECT ID_candidato FROM candidato WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);


    if(mysqli_num_rows($result) > 0){
        $linha = mysqli_fetch_assoc($result);
        $IDcandidato = $linha["ID_candidato"];

        $sql = "INSERT INTO formacao (FK_candidato_form, tipo_ensino, periodo_curso, instituicao_ensino, tipo_formacao, curso, data_termino) VALUES('$IDcandidato', '$tipoEnsino', '$peridoCurso', '$instituicaoEnsino', '$tipoformacao', '$curso', '$dataTermino')";

        if(mysqli_query($conn, $sql)){
            header("Location: formação.php");
            exit;
        }    

    }else{
        unset($_SESSION["email"]);
        unset($_SESSION["senha"]);
        header("Location: tela_de_vagas.php");
        exit;
    }   

}




?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="src/css/formacao.css">
    <title>Meu Perfil | Formação</title>
    <script src="src/JS/Modal.js" defer></script>
</head>
<body>
    <main class="content">
    <section class="formacao">
    <img class="logo" src="src/img/Logo_black.svg" alt="logo">

    <div class="titulo">
    <div class="circle">
    <span class="material-symbols-outlined">
    book_2
    </span>
    </div>
    <div class="informacoes">
    <p class="step">Passo 02 de 04</p>
    <p class="strong">Formação</p>
    </div>
    </div>
    <div class="boxing">
    <?php 
    if(isset($_SESSION["email"]) && (isset($_SESSION["senha"]))){
        
        $email = $_SESSION["email"];

        $sql = "SELECT ID_formacao,  tipo_ensino, periodo_curso, instituicao_ensino, tipo_formacao, curso, data_termino FROM formacao WHERE FK_candidato_form = (SELECT ID_candidato FROM candidato WHERE email = '$email')";
        $result = mysqli_query($conn, $sql);
        
        
        if($result){
            while($linha = mysqli_fetch_assoc($result)){
            $ID_formacao = $linha["ID_formacao"];
            $curso = $linha["curso"];
            $tipoEnsino = $linha["tipo_ensino"];
            $periodoCurso = $linha["periodo_curso"];
            $instituicaoEnsino = $linha["instituicao_ensino"];
            $tipoFormacao = $linha["tipo_formacao"];
            $dataTermino = $linha["data_termino"];
            
    echo "
        <div class=\"box-formacao\">
        <p>$curso</p>
        <div class=\"btns\">
        <a href=\"edit.php?id=$ID_formacao\" class=\"editBtn\" name=\"editBtn\">
        <span class=\"material-symbols-outlined\">
        edit
        </span>
        </a>
        <a href=\"delete.php?id=$ID_formacao\">
        <span class=\"material-symbols-outlined\">
        Delete
        </span>
        </a>
        </div>
        </div>
        ";
    }
  }
}else{
    unset($_SESSION["email"]);
    unset($_SESSION["senha"]);
    header("Location: tela_de_vagas.php");
    exit;
}   
?>
</div>
    <button class="add-modal">
    Adicionar Formação
    </button>
    <a href="dashboard_candidato.php" class="link-voltar-perfil">
        Voltar ao Perfil
    </a>
    </section>

    <section class="modal-container">
    <div class="modal">
    <div class="titulo">
    <h2>Formação</h2>
    </div>

    <form class="forms" action="formação.php" method="POST">
    <h2 class="subtitulo">Tipo de Ensino</h2>
    <div class="box-radio">
    <input type="radio" name="tipoEnsino" id="distancia" value="distancia" >
    <label for="a distancia">A distancia</label>
    </div>
    <div class="box-radio">
    <input type="radio" name="tipoEnsino" id="semipresencial" value="semipresencial">
    <label for="semipresencial">Semipresencial</label>
    </div>
    <div class="box-radio">
    <input type="radio" name="tipoEnsino" id="presencial" value="presencial">
    <label for="presencial">Presencial</label>
    </div>

    <h2 class="subtitulo">Periodo do curso</h2>
    <div class="box-radio">
    <input type="radio" name="peridoCurso" id="matutino" value="matutino" >
    <label for="matutino">Matutino</label>
    </div>
    <div class="box-radio">
    <input type="radio" name="peridoCurso" id="vespertino" value="vespertino" >
    <label for="vespertino">Vespertino</label>
    </div>
    <div class="box-radio">
    <input type="radio" name="peridoCurso" id="noturno" value="noturno" >
    <label for="noturno">Noturno</label>
    </div>
    <div class="box-radio">
    <input type="radio" name="peridoCurso" id="integral" value="integral" >
    <label for="integral">Integral</label>
    </div>

    <div class="box">
    <input type="text" name="instituicaoEnsino" id="instituicao-ensino" required>
    <label for="instituicao-ensino">Instituicao de Ensino</label>
    </div>
    <div class="box">
    <h3 class="titulo-data">Tipo de formação</h3>
    <select name="tipoformacao" id="tipo-formacao">
    <option></option>
    <option value="bacharelado">Bacharelado</option>
    <option value="tecnologo">Tecnólogo</option>
    <option value="licenciatura">Licenciatura</option>
    </select>
    </div>

    <div class="box">
    <input type="text" name="curso" id="curso" required>
    <label for="curso">Curso</label>
    </div>

    <div class="box">
    <!-- <h3 class="titulo-data">Ano de Termino</h3> -->
    <input type="text" name="dataTermino" id="data-termino" required>
    <label for="dataTermino">Ano de Termino</label>
    </div>

    <div class="btn-modal">
    <button class="cancelar">
    Cancelar
    </button>
    <input type="submit" class="salvar" name="Salvarbtn" value="Salvar">
    </input>
    </div>
    </form>
    </div>
    </section>
    </main>
</body>
</html>