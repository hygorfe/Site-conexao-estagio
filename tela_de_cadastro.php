<?php
require_once 'config.php';

if(isset($_POST['submitCadatrar'])){

    $nome = mysqli_escape_string($conn, $_POST['nome']);
    $sobrenome = mysqli_escape_string($conn, $_POST['sobrenome']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $telefone = mysqli_escape_string($conn, $_POST['tel']);
    $cpf = mysqli_escape_string($conn, $_POST['CPF']);
    $senha = mysqli_escape_string($conn, $_POST['senha']);
    $tipo_usuario = mysqli_escape_string($conn, "candidato");
    


    
    $sql = "INSERT INTO candidato (Tipo_usuario, Nome, Sobrenome, Email, Telefone, CPF, Senha) VALUES('$tipo_usuario', '$nome', '$sobrenome', '$email', '$telefone', '$cpf', '$senha')";
    
    if(mysqli_query($conn, $sql)){
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header("Location: tela_de_vagas.php");
        exit;
    }else{
        session_destroy();
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header("Location: tela_de_login.php?");
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
    <link rel="stylesheet" href="src/css/tela_de_cadastro.css">
    <title>Oportunidades - Conexão estágios</title>
    <script src="src/JS/tela_de_cadastro.js" defer></script>
</head>
<body>
    <main class="content">
        <div class="background-img">
        <img src="src/img/image-4.svg">
        </div>
    <section class="login-container">

    <div class="forms">
        <img src="src/img/Logo_black.svg" alt="logo Conexão estágios">

    <form action="tela_de_cadastro.php" method="post">

    <div class="box">
    <input type="text" name="nome" id="nome" placeholder="Nome">
    <span>o campo deve ser preenchido</span>
    </div>

    <div class="box">
    <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome">
    <span>o campo deve ser preenchido</span>
    </div>

    <div class="box">
    <input type="email" name="email" id="email" placeholder="Email" >
    <span>o campo deve ser preenchido</span>
    </div>

    <div class="box">
    <input type="email" name="confirmarEmail" id="confirmarEmail" placeholder="Confirme o Email">
    <span>o campo deve ser preenchido</span>
    </div>

    <div class="box">
    <input type="tel" name="tel" id="tel" placeholder="Telefone">
    <span>o campo deve ser preenchido</span>
    </div>

    <div class="box">
    <input type="text" name="CPF" id="CPF" placeholder="CPF">
    <span>o campo deve ser preenchido</span>
    </div>

    <div class="box">
    <input type="password" name="senha" id="senha" placeholder="Senha">
    <span>o campo deve ser preenchido</span>
    </div>

    <div class="box">
    <input type="password" name="confirmarSenha" id="confirmar_senha" placeholder="Confirme a senha">
    <span>o campo deve ser preenchido</span>
    </div>

    <div class="box">
    <input type="submit" name="submitCadatrar" class="submitBtn" value="Cadastrar">

    <div class="text">
        <p>Já tem uma conta ?</p>
        <a href="tela_de_login.php">Fazer login</a>
    </div>
    </div>
    </form>
    </div>

    <div class="modal-email-enviado">
    <div class="modalEmail">
    <div class="header-modal">
    <p>Cadastro feito com sucesso</p>
    </div>
    <div class="body-modal">
    <span class="material-symbols-outlined">
    check_circle
    </span>
    <p>Cadastro feito com sucesso acesse seu perfil para completar seu cadastro
    </p>
    </div>
    </div>
    </div>
    </section>
    </main>
</body>
</html>