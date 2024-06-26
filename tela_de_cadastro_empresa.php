<?php 
require_once "config.php";
if(isset($_POST["submitCadastrar"])){
// 
    $razaoSocial = mysqli_escape_string($conn, $_POST["razaoSocial"]);
    $nomeFantasia = mysqli_escape_string($conn, $_POST["nomeFantasia"]);
    $emailEmpresa = mysqli_escape_string($conn, $_POST["emailEmpresa"]);
    $CNPJ = mysqli_escape_string($conn, $_POST["CNPJ"]);
    $tel = mysqli_escape_string($conn, $_POST["tel"]);
    $senha = mysqli_escape_string($conn, $_POST["senha"]);

    $sql = "INSERT INTO empresa_cad (razao_social, nome_fantasia, email_empresa, cnpj, telefone, senha) VALUES ('$razaoSocial', '$nomeFantasia', '$emailEmpresa', '$CNPJ', '$tel', '$senha')";

    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION["emailEmpresa"] = $emailEmpresa;
        $_SESSION["senha"] = $senha;
        header("Location: dashboard_empresa.php");
        exit;
    }else{
        session_destroy();
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
    <link rel="stylesheet" href="src/css/tela_de_cadastro_empresa.css">
    <title>Cadastre-se - Conexão estágios</title>
    <script src="src/JS/tela_de_cadastro_empresa.js" defer></script>
</head>
<body>
    <main class="content">
    <section class="login-container">

    <div class="forms">
        <img src="src/img/logo.svg" alt="logo Conexão estágios">

    <form action="tela_de_cadastro_empresa.php" method="post">
        
    <div class="box">
    <input type="text" name="razaoSocial" id="razaoSocial" placeholder="Razão Social">
    <span>O campo precisa ser preenchido</span>
    </div>

    <div class="box">
    <input type="text" name="nomeFantasia" id="nomeFantasia" placeholder="Nome Fantasia">
    <span>O campo precisa ser preenchido</span>
    </div>

    <div class="box">
    <input type="email" name="emailEmpresa" id="emailEmpresa" placeholder="Email">
    <span>O campo precisa ser preenchido</span>
    </div>

    <div class="box">
    <input type="text" name="confirmarEmailEmpresa" id="confirmarEmailEmpresa" placeholder="Confirme o Email">
    <span>O campo precisa ser preenchido</span>
    </div>

    <div class="box">
    <input type="text" name="CNPJ" id="CNPJ" placeholder="CNPJ">
    <span>O campo precisa ser preenchido</span>
    </div>

    <div class="box">
    <input type="tel" name="tel" id="tel" placeholder="Telefone">
    <span>O campo precisa ser preenchido</span>
    </div>
    
    <div class="box">
    <input type="password" name="senha" id="senha" placeholder="Senha">
    <span>O campo precisa ser preenchido</span>
    </div>

    <div class="box">
    <input type="password" name="confirmar_senha" id="confirmar_senha" placeholder="Confirme a senha">
    <span>O campo precisa ser preenchido</span>
    </div>

    <div class="box">
    <input class="btnCadastrar" type="submit" name="submitCadastrar" value="Cadastrar">

    <div class="text">
    <p>Já tem uma conta ?</p>
    <a href="tela_de_login_empresa.php">Fazer login</a>
    </div>
    
    </div>
    </form>
    </div>
    </section>
    </main>
</body>
</html>