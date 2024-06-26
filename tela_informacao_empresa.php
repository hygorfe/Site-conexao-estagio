<?php 
session_start();
require_once "config.php";
// 
if(isset($_SESSION["emailEmpresa"]) && (isset($_SESSION["senha"]))){

    $emailEmpresa = $_SESSION["emailEmpresa"];

    $sql = "SELECT * FROM empresa_cad WHERE email_empresa = '$emailEmpresa'";
    $result = mysqli_query($conn, $sql);

    if($result){
    $linha = mysqli_fetch_assoc($result);
    $razaoSocial = $linha["razao_social"];
    $nomeFantasia = $linha["nome_fantasia"];
    $emailEmpresa = $linha["email_empresa"];
    $cnpj = $linha["cnpj"];
    $telefone = $linha["telefone"];
    $senha = $linha["senha"];
    $qlt_estagiarios = $linha["qlt_estagiarios"];
    $tamanho_empresa = $linha["tamanho_empresa"];
    }
}else{
    session_destroy();
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header("Location: tela_de_login_empresa.php");
    exit;
    }
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="src/css/tela_informacao_empresa.css">
    <title>Informações da Empresa</title>
    <script src="src/JS/telas_informacoes_empresa.js" defer></script>
</head>
<body>
    <main class="content">
    <section class="cadastro-vagas">
    <img class="logo" src="src/img/Logo_black.svg" alt="logo">

    <div class="titulo-info">
    <div class="circle">
    <span class="material-symbols-outlined">
    edit_square
    </span>
    </div>
    <div class="informacoes">
    <p class="step">PASSO 01 DE 02</p>
    <p class="strong">Informações da Empresa</p>
    </div>
    </div>

     <form class="forms" action="SalvageEmpresa.php" method="POST">
    <h2 class="titulo">Informações da Empresa</h2>

    <div class="box">
    <input type="text" name="razao-social" id="razao-social" value="<?php echo $razaoSocial;?>" >
    <label for="razao-social">Razão Social</label>
    <span>O campo deve ser Preenchido</span>
    </div>

    <div class="box">
    <input type="text" name="nome-fantasia" id="nome-fantasia" value="<?php echo $nomeFantasia;?>">
    <label for="nome-fantasia">Nome fantasia</label>
    <span>O campo deve ser Preenchido</span>
    </div>

    <div class="box">
    <input type="email" name="email" id="email" value="<?php echo $emailEmpresa;?>" >
    <label for="email">Email</label>
    <span>O campo deve ser Preenchido</span>
    </div>

    <div class="box">
    <input type="password" name="senha" id="senha" value="<?php echo $senha;?>">
    <label for="senha">Senha</label>
    <span>O campo deve ser Preenchido</span>
    </div>
    
    <div class="box">
    <input type="tel" name="telefone" id="telefone" placeholder="(00)0000-0000" value="<?php echo $telefone;?>">
    <label for="telefone">Telefone</label>
    <span>O campo deve ser Preenchido</span>
    </div>
    
    <div class="box">
    <input type="text" name="cnpj" id="cnpj" placeholder="00.000.000/0000-00" value="<?php echo $cnpj;?>">
    <label for="cnpj">CNPJ</label>
    <span>O campo deve ser Preenchido</span>
    </div>

    <div class="box">
    <input type="text" name="qlt-estagiarios" id="qlt-estagiarios" value="<?php echo $qlt_estagiarios;?>">
    <label for="qlt-estagiarios">Quantos estagiarios deseja contratar ?</label>
    <span>O campo deve ser Preenchido</span>
    </div>


    <div class="box-select">
    <label for="tamanho-empresa">Tamanho da Empresa</label>
    <select name="tamanho-empresa" id="tamanho-empresa">
    <option></option>
    <option value="startup" <?php if($tamanho_empresa == 'startup') echo "selected";?>>Startup</option>
    <option value="grande"<?php if($tamanho_empresa == 'grande') echo "selected";?>>Grande empresa</option>
    <option value="pequena-media"<?php if($tamanho_empresa == 'pequena-media') echo "selected";?>>Pequena/Média empresa</option>
    </select>
    </div>

    <div class="btns">
    <a href="dashboard_empresa.php" class="cancelar" type="submit" value="Cancelar">
        Cancelar
    </a>
    <input class="salvar" type="submit" name="submitSalvar" value="Salvar">
    </input>
    </div>
     </form>
    </section>
    </main>
</body>
</html>