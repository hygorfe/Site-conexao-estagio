<?php 
session_start();
require_once "config.php";


if(isset($_POST["SubAtualizarSenha"])){
    $emailRedefinirCandidato = $_SESSION["emailRedefinirCandidato"];

    $sql = "SELECT * FROM candidato WHERE email = '$emailRedefinirCandidato'";
    $result = mysqli_query($conn, $sql);

    $redefinir_senha = mysqli_escape_string($conn, $_POST["redefinir_senha"]);


    if($result && mysqli_num_rows($result) > 0){
        $linha = mysqli_fetch_assoc($result);
        $senha = $linha["Senha"];


        $sql_U = "UPDATE candidato SET Senha = '$redefinir_senha' WHERE email = '$emailRedefinirCandidato'";

        if(mysqli_query($conn, $sql_U)){
        
        }
    }


}


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!--  -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/tela_de_redefinir_senha.css">
    <title>Oportunidades - Conexão estágios</title>
    <script src="src/JS/tela_de_redefinir_senha.js" defer></script>
</head>
<body>
    <main class="content">
    <section class="login-container">

    <div class="background-img">
    <img src="src/img/image-4.svg">
    </div>

    <div class="forms">
        <img src="src/img/Logo_black.svg" alt="logo Conexão estágios">

    <form action="" method="post">

    <div class="box">
    <input type="password" name="redefinir_senha" id="redefinir_senha" placeholder="Senha">
    <span>O email é Obrigatório</span>
    </div>

    <div class="box">
    <input type="password" name="confirmar_senha" id="confirmar_senha"
     placeholder="Confirmar Senha">
    <span>A senha é Obrigatório</span>
    <?php 
    if(isset($_POST["SubAtualizarSenha"]))
    if ($redefinir_senha === $senha) {
    $erro = array();
    $erro[] = "Senha nova não pode ser igual à antiga.";
    foreach ($erro as $msg) {
        echo "<p class=\"erro_array\">$msg</p>";
    }
    }else{
    echo "";
    header("Location: tela_de_login.php");
    exit;
    } 

        ?>
    
    </div>

    <div class="box">
    <input class="submit-btn" type="submit" name="SubAtualizarSenha" value="Redefinir senha">

    </div>
    </form>
    </div>

    </section>
    </main>
</body>
</html>