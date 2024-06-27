<?php 
session_start();
require_once "config.php";

if(!isset($_SESSION["tentativas"])){
    $_SESSION["tentativas"] = 4;
}

if(isset($_POST["submitEntrarAut"])){
    $email = $_SESSION["email"];
    $resposta = $_POST["resposta2FA"];

    


    $sql = "SELECT 2FA_resposta FROM infog_candidato WHERE FK_candidato = (SELECT ID_candidato FROM candidato WHERE email = '$email')";
    $result = mysqli_query($conn, $sql);

    if($result){
        $linha = mysqli_fetch_assoc($result);
        $resposta2FA = $linha["2FA_resposta"];
    } 

    if((isset($_SESSION["email"])) && (isset($_SESSION["senha"]))){
        $email = $_SESSION["email"];
    
        date_default_timezone_set('America/Sao_Paulo');
        $Data_e_Hora = new DateTime();
        $Data_e_Hora_formatada = $Data_e_Hora->format('Y-m-d H:i:s');
        
        $sql = "SELECT * FROM candidato WHERE email = '$email'";
        $resultado = mysqli_query($conn, $sql);
    
        if($resultado){
            $linha = mysqli_fetch_assoc($resultado);
            $ID_candidato = $linha["ID_candidato"];
            $nome = $linha["Nome"];
            $tipo_usuario = $linha["Tipo_usuario"];
        }
    
        $sql_A = "SELECT * FROM acesso_log_candidato WHERE FK_candidato_acesso = '$ID_candidato'";
        $resultado_A = mysqli_query($conn, $sql_A);
        
        if(mysqli_num_rows($resultado_A) > 0){
            $sql = "UPDATE acesso_log_candidato SET Data_e_Hora = '$Data_e_Hora_formatada', 2FA = '$resposta' WHERE FK_candidato_acesso = '$ID_candidato'";
    
            if(mysqli_query($conn, $sql)){
            
            }
    
        }else{
        $sql = "INSERT INTO acesso_log_candidato (FK_candidato_acesso ,nome , Data_e_Hora, Tipo_usuario, 2FA) VALUES('$ID_candidato', '$nome', '$Data_e_Hora_formatada', '$tipo_usuario', '$resposta')";
        }
    
        if(mysqli_query($conn, $sql)){
    
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
    <link rel="stylesheet" href="src/css/tela_2FA.css">
    <title>Seguraça da conta</title>
    <script src="src/JS/tela_2FA.js" defer></script>
</head>
<body>
    <main class="content">
    <div class="container-2FA">
    <div class="header-2FA">
        <h2>Autenticação de 2 fatores</h2>
    </div>
    <div class="body-2FA">
    <p>Por favor, digite a mesma resposta da pergunta de segurança
    </p>
    <span class="material-symbols-outlined">
    lock
    </span>
    <form action="" method="POST">
    <input type="text" name="resposta2FA" id="resposta2FA">
    <?php 

    if(isset($_POST["resposta2FA"])){

        $sql_U = "SELECT * FROM candidato WHERE email = '$email'";
        $result_U = mysqli_query($conn, $sql_U);

        if($result_U){
        $linha = mysqli_fetch_assoc($result_U);
        $_SESSION['Tipo_usuario'] = $linha['Tipo_usuario'];
        
        
        if($linha['Tipo_usuario'] == 'adm'){
        if($resposta === $resposta2FA){
            header("Location: dashboard_adm.php");
            sleep(2);
            exit;
        }
        
    }elseif($linha['Tipo_usuario'] == "candidato"){
        if($resposta === $resposta2FA){
            header("Location: tela_de_vagas.php");
            sleep(2);
            exit;
        }
        }
       
        if($resposta === $resposta2FA){
            header("Location: tela_de_vagas.php");
            exit;

        }elseif(empty($resposta)){
            echo "<p class=\"redColor\">"."Resposta nao pode esta vazia"."</p>";
            unset($_SESSION["tentativas"]);
        }
        
        else{
            $_SESSION["tentativas"]--;

        if($_SESSION["tentativas"] <= 0){
            unset($_SESSION["tentativas"]);
            header("Location: tela_de_login.php");
            exit;
        }else{
            echo "<p class=\"redColor\">"."Você só tem: " . $_SESSION['tentativas']." Tentativas"."<p>";
        }
      }
    }
}
    ?>
    <div class="btns">
    <a href="tela_de_login.php" class="cancelar">
    Cancelar
    </a>
    <button type="submit" name="submitEntrarAut" class="submitEntrarAut">
    Autenticar
    </button>
    </div>
    </form>
    </div>
    </div>
    </main>
</body>
</html>