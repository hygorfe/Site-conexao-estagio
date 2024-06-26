<?php 
session_start();
require_once "config.php";

if(isset($_GET["id"])){

   $ID_formacao = $_GET["id"];

   $sql = "SELECT ID_formacao, tipo_ensino, periodo_curso, instituicao_ensino, tipo_formacao, tipo_formacao, curso, data_termino FROM formacao WHERE ID_formacao = '$ID_formacao'";
   $result = mysqli_query($conn, $sql);

   if($result){
       $linha = mysqli_fetch_assoc($result);
       $tipoEnsino = $linha["tipo_ensino"];
       $periodoCurso = $linha["periodo_curso"];
       $instituicaoEnsino = $linha["instituicao_ensino"];
       $tipoFormacao = $linha["tipo_formacao"];
       $curso = $linha["curso"];
       $dataTermino = $linha["data_termino"];
    }
// 

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/formacaoEdit.css">
    <script src="src/JS/formacaoEdit.js" defer></script>
    <title>Document</title>
</head>
<body>
<section class="modal-container-edit">
    <div class="modal">
    <div class="titulo">
    <h2>Formação</h2>
    </div>

    <form class="forms" action="editSave.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $ID_formacao;?>">
    <h2 class="subtitulo">Tipo de Ensino</h2>
    <div class="box-radio">
    <input type="radio" name="tipoEnsino" id="distancia" value="distancia" >
    <label for="a distancia">A distancia</label>
    </div>
    <div class="box-radio">
    <input type="radio" name="tipoEnsino" id="semipresencial" value="semipresencial"<?php echo ($tipoEnsino == 'semipresencial') ? 'checked' : '';?>>
    <label for="semipresencial">Semipresencial</label>
    </div>
    <div class="box-radio">
    <input type="radio" name="tipoEnsino" id="presencial" value="presencial" <?php echo ($tipoEnsino == 'presencial') ? 'checked' : '';?>>
    <label for="presencial">Presencial</label>
    </div>

    <h2 class="subtitulo">Periodo do curso</h2>
    <div class="box-radio">
    <input type="radio" name="peridoCurso" id="matutino" value="matutino" <?php echo ($periodoCurso == 'matutino') ? 'checked' : '';?>>
    <label for="matutino">Matutino</label>
    </div>
    <div class="box-radio">
    <input type="radio" name="peridoCurso" id="vespertino" value="vespertino" <?php echo ($periodoCurso == 'vespertino') ? 'checked' : '';?>>
    <label for="vespertino">Vespertino</label>
    </div>
    <div class="box-radio">
    <input type="radio" name="peridoCurso" id="noturno" value="noturno" <?php echo ($periodoCurso == 'noturno') ? 'checked' : '';?>>
    <label for="noturno">Noturno</label>
    </div>
    <div class="box-radio">
    <input type="radio" name="peridoCurso" id="integral" value="integral" <?php echo ($periodoCurso == 'integral') ? 'checked' : '';?>>
    <label for="integral">Integral</label>
    </div>

    <div class="box">
    <input type="text" name="instituicaoEnsino" id="instituicao-ensino" required value="<?php echo $instituicaoEnsino?>">
    <label for="instituicao-ensino">Instituicao de Ensino</label>
    </div>
    <div class="box">
    <h3 class="titulo-data">Tipo de formação</h3>
    <select name="tipoformacao" id="tipo-formacao">
    <option></option>
    <option value="bacharelado" <?php if($tipoFormacao == 'bacharelado') echo 'selected'; ?>>Bacharelado</option>
    <option value="tecnologo" <?php if($tipoFormacao == 'tecnologo') echo 'selected'; ?>>Tecnólogo</option>
    <option value="licenciatura" <?php if($tipoFormacao == 'licenciatura') echo 'selected'; ?>>Licenciatura</option>
    </select>
    </div>

    <div class="box">
    <input type="text" name="curso" id="curso" required value="<?php echo $curso?>">
    <label for="curso">Curso</label>
    </div>

    <div class="box">
    <h3 class="titulo-data">Ano de Termino</h3>
    <input type="text" name="dataTermino" id="data-termino" required value="<?php  echo $dataTermino ?>">
    </div>

    <div class="btn-modal">
    <a href="formação.php" class="cancelar">
    Cancelar
    </a>
    <input type="submit" class="salvar" name="btnAtualizar" value="Atualizar">
    </input>
    </div>
    </form>
    </div>
    </section>
</body>
</html>