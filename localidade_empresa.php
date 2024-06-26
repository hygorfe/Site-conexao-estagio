<?php 
session_start();
require_once "config.php";
// 
if((isset($_POST["submitSalvar"]))){

    
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

    $emailEmpresa = $_SESSION["emailEmpresa"];
    
    $sql = "SELECT ID_empresa_cad FROM empresa_cad WHERE email_empresa = '$emailEmpresa'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $linha = mysqli_fetch_assoc($result);
        $ID_empresa_cad = $linha["ID_empresa_cad"];

        $sql = "INSERT INTO localidade_empresa (FK_empresa_cad, cep, endereco, numero, complemento, bairro, cidade, estado) VALUES ('$ID_empresa_cad','$CEP', '$endereco', '$numero', '$complemento', '$bairro', '$cidade', '$estado')";

        if(mysqli_query($conn, $sql)){
            header("Location: localidade_empresa.php");
        }
    }else{
        unset($_SESSION["emailEmpresa"]);
        unset($_SESSION["senha"]);
        header("Location: tela_de_login_empresa.php");
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
    <p class="strong">Localização</p>
    </div>
    </div>
    <div class="boxing">
    <?php 
    if(isset($_SESSION["emailEmpresa"]) && (isset($_SESSION["senha"]))){
        
        $emailEmpresa = $_SESSION["emailEmpresa"];

        $sql = "SELECT ID_localidadeEmpresa,  cep, endereco, numero, complemento, bairro, cidade, estado FROM localidade_empresa WHERE FK_empresa_cad IN (SELECT ID_empresa_cad FROM empresa_cad WHERE email_empresa = '$emailEmpresa') ";
        $result = mysqli_query($conn, $sql);
        
        
        if($result){
            while($linha = mysqli_fetch_assoc($result)){
            $ID_localidadeEmpresa = $linha["ID_localidadeEmpresa"];
            $CEP = $linha["cep"];
            $endereco = $linha["numero"];
            $numero = $linha["numero"];
            $complemento = $linha["complemento"];
            $bairro = $linha["bairro"];
            $cidade = $linha["cidade"];
            $estado = $linha["estado"];
            
    echo "
        <div class=\"box-localidade\">
        <p>$cidade - $estado</p>
        <div class=\"btns\">
        <a href=\"editLocalEmpresa.php?id=$ID_localidadeEmpresa\" class=\"editBtn\" name=\"editBtn\">
        <span class=\"material-symbols-outlined\">
        edit
        </span>
        </a>
        <a href=\"deleteLocalEmpresa.php?id=$ID_localidadeEmpresa\">
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
    session_destroy();
    unset($_SESSION["email"]);
    unset($_SESSION["senha"]);
    header("Location: tela_de_login_empresa.php");
    exit;
}   
?>
</div>
    <button class="add-modal">
    Adicionar Localização
    </button>
    <a href="dashboard_empresa.php" class="link-voltar-perfil">
        Voltar ao Perfil
    </a>
    </section>

    <section class="modal-container">
    <div class="modal">
    <div class="titulo">
    <h2>Localização Empresa</h2>
    </div>
    <form class="forms" action="localidade_empresa.php" method="POST">
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
    <input type="submit" value="Cancelar" class="cancelar">
    </input>
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