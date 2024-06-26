<?php 
session_start();
require_once "config.php";
// 
if(isset($_GET["id"])){
    
    $emailEmpresa = $_SESSION["emailEmpresa"];
    $ID_localidadeEmpresa = $_GET["id"];

   $sql = "SELECT ID_localidadeEmpresa, cep, endereco, numero, complemento, bairro, cidade, estado FROM localidade_empresa WHERE ID_localidadeEmpresa = '$ID_localidadeEmpresa'";
   
   $result = mysqli_query($conn, $sql);
    
   if($result){
    $linha = mysqli_fetch_assoc($result);
    $ID_localidadeEmpresa = $linha["ID_localidadeEmpresa"];
    $CEP = $linha["cep"];
    $endereco = $linha["endereco"];
    $numero = $linha["numero"];
    $complemento = $linha["complemento"];
    $bairro = $linha["bairro"];
    $cidade = $linha["cidade"];
    $estado = $linha["estado"];
    }


}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/editLocal.css">
    <script src="src/JS/localidade.js" defer></script>
    <title>Meu Perfil | Localidade</title>
</head>
<body>
<section class="modal-container">
    <div class="modal">
    <div class="titulo">
    <h2>Localização</h2>
    </div>
    <form class="forms" action="editLocalSaveEmpresa.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $ID_localidadeEmpresa;?>">
    <div class="box">
    <input type="text" name="cep" id="cep" value="<?php echo $CEP;?>">
    <label for="cep">CEP</label>
    <span class="erros"></span>
    </div>
    <div class="box">
    <input type="text" name="endereco" id="endereco" value="<?php echo $endereco;?>">
    <label for="endereco">Endereço</label>
    <span class="erros"></span>
    </div>

    <div class="box">
    <input type="text" name="numero" id="numero" value="<?php echo $numero;?>">
    <label for="numero">Número</label>
    <span class="erros"></span>
    </div>
    <div class="box">
    <input type="text" name="complemento" id="complemento" value="<?php echo $complemento;?>">
    <label for="complemento">Complemento</label>
    <span class="erros"></span>
    </div>
    <div class="box">
    <input type="text" name="bairro" id="bairro" value="<?php echo $bairro;?>">
    <label for="bairro">Bairro</label>
    <span class="erros"></span>
    </div>
    
    <div class="box">
    <input type="text" name="cidade" id="cidade" value="<?php echo $cidade;?>">
    <label for="cidade">Cidade</label>
    <span class="erros"></span>
    </div>

    <div class="box">
    <input type="text" name="estado" id="estado" value="<?php echo $estado;?>">
    <label for="estado">Estado</label>
    <span class="erros"></span>
    </div>

    <div class="btn-modal">
    <a href="localidade_empresa.php" class="cancelar">Cancelar</a>
    <input class="salvar" type="submit" name="submitAtualizar" value="Atualizar">
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