<?php 
session_start();
require_once "config.php";


if(!isset($_SESSION["tentativas"])){
    $_SESSION["tentativas"] = 4;
}

if(isset($_POST["submitEntrarAut"])){
    $email = $_SESSION["emailEmpresa"];
    $resposta = $_POST["resposta2FA"];


    if((isset($_SESSION["emailEmpresa"])) && (isset($_SESSION["senha"]))){
        $emailEmpresa = $_SESSION["emailEmpresa"];
    
        date_default_timezone_set('America/Sao_Paulo');
        $Data_Hora = new DateTime();
        $Data_Hora_formatada = $Data_Hora->format('Y-m-d H:i:s');
        

        $sql_E = "SELECT * FROM empresa_cad WHERE email_empresa = '$emailEmpresa'";
        $resultado_E = mysqli_query($conn, $sql_E);
        
        if($resultado_E){
            $linha = mysqli_fetch_assoc($resultado_E);
            $nome_fantasia = $linha["nome_fantasia"];
            $email_empresa = $linha["email_empresa"];
            $cnpj = $linha["cnpj"];
            $telefone = $linha["telefone"];
            $ID_empresa_cad = $linha["ID_empresa_cad"];
            $Tipo_usuario = $linha["Tipo_usuario"];
        }

        $sql_AC = "SELECT * FROM acesso_log_empresa WHERE FK_empresa_acesso = '$ID_empresa_cad'";
        $resultado_AC = mysqli_query($conn, $sql_AC);
        

        if($resultado_AC && mysqli_num_rows($resultado_AC) > 0){

            $sql = "UPDATE acesso_log_empresa SET Data_Hora = '$Data_Hora_formatada', 2FA = '$resposta' WHERE  FK_empresa_acesso = '$ID_empresa_cad'";
            
            if(mysqli_query($conn, $sql)){

            }
        }else{
            $sql_I = "INSERT INTO acesso_log_empresa (Tipo_usuario, Nome_empresa, Data_Hora, 2FA, FK_empresa_acesso) VALUES ('$Tipo_usuario', '$nome_fantasia', '$Data_Hora_formatada', '$resposta', '$ID_empresa_cad')";

            if(mysqli_query($conn, $sql_I)){

            }
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
    <p>Por favor, entre com nome da empresa, cnpj, email ou telefone existentes
    </p>
    <span class="material-symbols-outlined">
    lock
    </span>
    <form action="" method="POST">
    <input type="text" name="resposta2FA" id="resposta2FA">
    <?php 

    if(isset($_POST["resposta2FA"])){
        if($resposta === $nome_fantasia || $resposta === $email_empresa || $resposta === $cnpj || $resposta === $telefone){
            header("Location: dashboard_empresa.php");
            sleep(4);
            exit;
        
    }elseif(empty($resposta)){
       echo "<p class=\"redColor\">"."Resposta nao pode esta vazia"."</p>";
            unset($_SESSION["tentativas"]);
        }
        else{
            $_SESSION["tentativas"]--;

        if($_SESSION["tentativas"] <= 0){
            unset($_SESSION["tentativas"]);
            header("Location: tela_de_login_empresa.php");
            exit;
        }else{
            echo "<p class=\"redColor\">"."Você só tem: " . $_SESSION['tentativas']." Tentativas"."<p>";
        }
      }
    }

    ?>
    <div class="btns">
    <a href="tela_de_login_empresa.php" class="cancelar">
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