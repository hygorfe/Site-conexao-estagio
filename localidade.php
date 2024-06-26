<?php 
session_start();
require_once "config.php";

if((isset($_SESSION["email"]))&& (isset($_SESSION["senha"])) && (isset($_POST["submitSalvar"]))){

    
    $CEP = mysqli_escape_string($conn, $_POST["cep"]);
    $url = "https://viacep.com.br/ws/{$CEP}/json/";
    
    $response = file_get_contents($url);
    $data= json_decode($response);
    
    $endereco = mysqli_escape_string($conn, $data->logradouro);
    $bairro = mysqli_escape_string($conn, $data->bairro);
    $cidade = mysqli_escape_string($conn, $data->localidade);
    $estado = mysqli_escape_string($conn, $data->uf);
    $numero = mysqli_escape_string($conn, $_POST["numero"]);
    $complemento = mysqli_escape_string($conn, $_POST["complemento"]);

    $email = $_SESSION["email"];
    
    $sql = "SELECT ID_candidato FROM candidato WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $linha = mysqli_fetch_assoc($result);
        $ID_candidato = $linha["ID_candidato"];

        $sql = "INSERT INTO localidade (FK_candidato_local, cep, endereco, numero, complemento, bairro, cidade, estado) VALUES ('$ID_candidato','$CEP', '$endereco', '$numero', '$complemento', '$bairro', '$cidade', '$estado')";

        if(mysqli_query($conn, $sql)){
            header("Location: localidade.php");
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
    <link rel="stylesheet" href="src/css/localidade.css">
    <title>Meu Perfil | Localidade</title>
    <script src="src/JS/localidade.js" defer></script>
</head>
<body>
    <main class="content">
    <section class="localidade">
    <img class="logo" src="src/img/Logo_black.svg" alt="logo">

    <div class="titulo">
    <div class="circle">
    <span class="material-symbols-outlined">
    public
    </span>
    </div>

    <div class="informacoes">
    <p class="step">Passo 03 de 04</p>
    <p class="strong">Localização</p>
    </div>
    </div>
    <div class="boxing">
    <?php 
    if(isset($_SESSION["email"]) && (isset($_SESSION["senha"]))){
        
        $email = $_SESSION["email"];

        $sql = "SELECT ID_localidade,  cep, endereco, numero, complemento, bairro, cidade, estado FROM localidade WHERE FK_candidato_local = (SELECT ID_candidato FROM candidato WHERE email = '$email') ";
        $result = mysqli_query($conn, $sql);
        
        
        if($result){
            while($linha = mysqli_fetch_assoc($result)){
            $ID_localidade = $linha["ID_localidade"];
            $CEP = $linha["cep"];
            $endereco = $linha["numero"];
            $numero = $linha["numero"];
            $complemento = $linha["complemento"];
            $bairro = $linha["bairro"];
            $cidade = $linha["cidade"];
            $estado = $linha["estado"];
            
    echo "
        <div class=\"box-localidade\">
        <p>$cidade</p>
        <div class=\"btns\">
        <a href=\"editLocal.php?id=$ID_localidade\" class=\"editBtn\" name=\"editBtn\">
        <span class=\"material-symbols-outlined\">
        edit
        </span>
        </a>
        <a href=\"deleteLocal.php?id=$ID_localidade\">
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
<?php
if (isset($_SESSION["email"]) && isset($_SESSION["senha"])) {
    $sql = "SELECT * FROM localidade WHERE FK_candidato_local = (SELECT ID_candidato FROM candidato WHERE email = '$email')";

    $resultado = mysqli_query($conn, $sql);
    if ($resultado) {
        $linha = mysqli_fetch_assoc($resultado);

        if (!isset($linha["cep"])) {
            echo "<button class=\"add-modal\">
            Adicionar Localização
            </button>";
        } 
    }
}
?>
    <a href="dashboard_candidato.php" class="linkVoltar">Voltar ao Perfil</a>
    </section>

    <section class="modal-container">
    <div class="modal">
    <div class="titulo">
    <h2>Localização</h2>
    </div>
    <form class="forms" action="localidade.php" method="POST">
    <div class="box">
    <input type="text" name="cep" id="cep">
    <label for="cep">CEP</label>
    <span class="erros"></span>
    </div>
    <div class="box">
    <input type="text" name="endereco" id="endereco">
    <label for="endereco">Endereço</label>
    <span class="erros"></span>
    </div>

    <div class="box">
    <input type="text" name="numero" id="numero">
    <label for="numero">Número</label>
    <span class="erros"></span>
    </div>
    <div class="box">
    <input type="text" name="complemento" id="complemento">
    <label for="complemento">Complemento</label>
    <span class="erros"></span>
    </div>
    <div class="box">
    <input type="text" name="bairro" id="bairro">
    <label for="bairro">Bairro</label>
    <span class="erros"></span>
    </div>
    
    <div class="box">
    <input type="text" name="cidade" id="cidade">
    <label for="cidade">Cidade</label>
    <span class="erros"></span>
    </div>

    <div class="box">
    <input type="text" name="estado" id="estado">
    <label for="estado">Estado</label>
    <span class="erros"></span>
    </div>

    <div class="btn-modal">
    <input class="cancelar" type="button" value="Cancelar">
    <input class="salvar" type="submit" name="submitSalvar" value="Salvar">
    </input>
    </div>
    
    </form>
    </div>
    </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
    $("#cep").keyup(function() {
        var cep = $(this).val();
        if (cep.length == 8) {
            var url = "https://viacep.com.br/ws/" + cep + "/json/";
            $.getJSON(url, function(dados) {
                if (!("erro" in dados)) {
                    $("#endereco").val(dados.logradouro);
                    $("#bairro").val(dados.bairro);
                    $("#cidade").val(dados.localidade);
                    $("#estado").val(dados.uf);
                }
            });
        }
    });
});
</script>
    </script>
</body>
</html>