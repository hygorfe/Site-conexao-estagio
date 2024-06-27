<?php 
session_start();

if(isset($_POST['submitEntrar'])){
    require_once "config.php";

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM candidato WHERE email = '$email' AND senha = '$senha'";
    $result = $conn->query($sql);

    if(mysqli_num_rows($result) < 1){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset($_SESSION['Tipo_usuario']);
    }else{
    $linha = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    $_SESSION['Tipo_usuario'] = $linha['Tipo_usuario'];

    if($linha['Tipo_usuario'] == 'adm'){
        header("Location: tela_2FA.php");
        exit;
    }else{
        header("Location: tela_2FA.php");
        exit;
    }

    
}
  
}



?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="src/css/tela_de_login.css">
    <title>Oportunidades - Conexão estágios</title>
    <script src="src/JS/tela_de_login.js" defer></script>
</head>
<body>
    <main class="content">
    <section class="login-container">

    <div class="background-img">
    <img src="src/img/image-4.svg">
    </div>

    <div class="forms">
        <img src="src/img/Logo_black.svg" alt="logo Conexão estágios">

    <form action="tela_de_login.php" method="post">
    <div class="box">
    <input type="text" name="email" id="email" class=" text" placeholder="Email">
    <span>O email é Obrigatório</span>
    </div>

    <div class="box">
    <input type="password" name="senha" id="senha"
    class="senha required" placeholder="Senha">
    <span>A senha é Obrigatório</span>
    <?php 
    if(isset($_POST["submitEntrar"])){
    $erro = array("Email e/ou senha incorreta");

    if(!$result || mysqli_num_rows($result)  == 0){
    foreach($erro as $erros){
    echo "<p class=\"erro_array\">$erros</p>";
    }
    }else{
    echo "";
    }
    }
    
    ?>
    </div>
    <div class="box">
    <button class="minha-senha">Esqueci minha senha</button>
    <input class="btnEntrar" name="submitEntrar" type="submit" value="Entrar">
    
    <div class="text">
        <p>Ainda não tem conta ?</p>
        <a href="tela_de_cadastro.php">cadastre-se</a>
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
    <form class="form-redefinir" action="testRedefinirSenha.php" method="POST">
    <div class="box">
    <input type="email" name="emailRedefinirCandidato" id="emailRedefinir" placeholder="Email">
    <?php 

    
    ?>
    <span></span>
    </div>
    </form>
    <div class="btn-loading">
    <input class="btnRedefinir" name="submitRedefinir" type="submit" value="Redefinir senha">
    <span class="loading"></span>
    </div>
    </div>
    </div>
    </div>
    </section>
    </main>
</body>
</html>

