<?php 
session_start();
require_once "config.php";

print_r($_SESSION);

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

        print_r($ID_candidato);
        print_r($nome);
        echo "<br>";
        print_r($tipo_usuario);
    }

    $sql_A = "SELECT * FROM acesso_log_candidato WHERE FK_candidato_acesso = '$ID_candidato'";
    $resultado_A = mysqli_query($conn, $sql_A);
    
    if(mysqli_num_rows($resultado_A) > 0){
        $sql = "UPDATE acesso_log_candidato SET Data_e_Hora = '$Data_e_Hora_formatada' WHERE FK_candidato_acesso = '$ID_candidato'";

        if(mysqli_query($conn, $sql)){
        
        }

    }else{
        $sql = "INSERT INTO acesso_log_candidato (FK_candidato_acesso ,nome , Data_e_Hora, Tipo_usuario) VALUES('$ID_candidato', '$nome', '$Data_e_Hora_formatada', '$tipo_usuario')";
    }

    if(mysqli_query($conn, $sql)){

    }

 }


 

 if((isset($_SESSION["Tipo_usuario"]) == 'empresa') && (isset($_SESSION["senha"]))){
    echo "logado";
    $emailEmpresa = $_SESSION["emailEmpresa"];

    $sql = "SELECT * FROM empresa_cad WHERE email_empresa = '$emailEmpresa'";
    $result = mysqli_query($conn, $sql);

    date_default_timezone_set('America/Sao_Paulo');
    $Data_e_Hora = new DateTime();
    $Data_Hora_formatada = $Data_e_Hora->format('Y-m-d H:i:s');

    if($result){
        $linha2 = mysqli_fetch_assoc($result);
        $ID_empresa_cad = $linha2["ID_empresa_cad"];
        $nome = $linha2["nome_fantasia"];
        $tipo_usuario_empresa = $linha2["Tipo_usuario"];
    }

    $slq_E = "SELECT * FROM acesso_log_empresa WHERE FK_empresa_acesso = '$ID_empresa_cad'";
    $result_E = mysqli_query($conn, $slq_E);


    print_r($result_E);

    if(mysqli_num_rows($result_E) > 0){

        $sql = "UPDATE acesso_log_empresa SET Data_Hora = '$Data_Hora_formatada' WHERE FK_empresa_acesso = '$ID_empresa_cad'";


        if(mysqli_query($conn, $sql)){

        }


    }else{
        $sql = "INSERT INTO acesso_log_empresa (FK_empresa_acesso, Nome, Data_Hora, Tipo_usuario) VALUES ('$ID_empresa_cad', '$nome', '$Data_Hora_formatada', '$tipo_usuario_empresa')";

        if(mysqli_query($conn, $sql)){

        }

    }


 }

?>