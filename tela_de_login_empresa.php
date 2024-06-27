<?php 
session_start();
require_once "config.php";
// 
if(isset($_POST["submitEntrar"])){
    
    $emailEmpresa = $_POST["emailEmpresa"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM empresa_cad WHERE email_empresa = '$emailEmpresa' AND senha = '$senha'" ;
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $_SESSION["emailEmpresa"] = $emailEmpresa;
        $_SESSION["senha"] = $senha;
        header("Location: tela_2FA_empresa.php");
        exit;
    }else{
        unset($_SESSION["emailEmpresa"]);
        unset($_SESSION["senha"]);
        
        $erro = array(); 


        $erro[] = "Email e/ou senha incorretos";


    }
}



?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!--  -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="src/css/tela_de_login_empresa.css">
    <title>Oportunidades - Conexão estágios</title>
    <script src="src/JS/tela_de_login_empresa.js" defer></script>
</head>
<body>
    <main class="content">
    <section class="login-container">

    <div class="forms">
        <img src="src/img/logo.svg" alt="logo Conexão estágios">

    <form action="tela_de_login_empresa.php" method="POST">

    <div class="box">
    <input type="email" name="emailEmpresa" id="emailEmpresa" placeholder="Email">
    <span>O email é Obrigatório</span>
    </div>

    <div class="box">
    <input type="password" name="senha" id="senha" placeholder="Senha">
    <span>A senha é obrigatória</span>
    <?php 
    if(isset($erro) && count($erro) > 0){
    foreach($erro as $msg){
    echo "<p class=\"erro_array\">$msg</p>";
    }
    }
    ?>
</div>

    <div class="box">
    <button class="minha-senha">Esqueci minha senha</button>
    <input class="btnEntrar" type="submit" name="submitEntrar" value="Entrar">

    <div class="text">
        <p>Ainda não tem conta ?</p>
        <a href="tela_de_cadastro_empresa.php">cadastre-se</a>
    </div>
    </div>
    </form>
    </div>

    <div class="modal-redefinir-senha">
    <div class="modal">
    <div class="header-modal">
    <p>Redefinir Senha</p>
    <button class="btnCloseModal">
    <span class="material-symbols-outlined">
    close
    </span>
    </button>
    </div>
    <div class="body-modal">
    <h4>Redefinir Senha</h4>
    <p>Insira seu e-mail cadastrado para redefinir sua senha
    </p>
    <form class="form-redefinir" action="testRedefinirSenha_empresa.php" method="POST">
    <div class="box">
    <input type="email" name="emailRedefinir" id="emailRedefinir" placeholder="Email">
    <span></span>
    </div>
    </form>
    <div class="btn-loading">
    <input class="btnRedefinir" type="submit" name="emailRedefinir" value="Redefinir Senha">
    <span class="loading"></span>
    </div>
    </div>
    </div>
    </div>

    </section>
    </main>
</body>
</html>