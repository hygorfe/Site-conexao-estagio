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
    header("Location: tela_de_login.php");
    exit;
    }else{
    $linha = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    $_SESSION['Tipo_usuario'] = $linha['Tipo_usuario'];

    if($linha['Tipo_usuario'] == 'adm'){
        header("Location: dashboard_adm.php");
        exit;
    }else{
        unset($_SESSION['Tipo_usuario']);
        header("Location: tela_de_vagas.php");
        exit;
    }

    
}
  
}



?>

