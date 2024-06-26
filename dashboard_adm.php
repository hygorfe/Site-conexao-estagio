<?php 
session_start();
require_once "config.php";

if(isset($_SESSION["email"]) && (isset($_SESSION["senha"]) && (isset($_SESSION["Tipo_usuario"])))){
   $email = $_SESSION["email"];

   $sql = "SELECT nome, email FROM candidato WHERE email = '$email'";
   $result = mysqli_query($conn, $sql);

   if($result){
    $linha = mysqli_fetch_assoc($result);
    $email = $linha["email"];
    $nome = $linha["nome"];

    $primeiroLetra = substr($nome, 0, 1);
    $SegundaLetra = substr($nome, 6, 1);

    if(mysqli_query($conn, $sql)){

    }
   }
}else{
    unset($_SESSION["email"]);
    unset($_SESSION["Tipo_usuario"]);
    unset($_SESSION["senha"]);
    header("Location: tela_de_vagas.php");
}



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="src/css/dashboard_adm.css">
    <title>Dashboard | Administrativo</title>
    <script src="src/JS/dashboards.js"defer></script>
</head>
<body>
    <header class="cabecalho">
    <button class="btn-menu-mobile">
    <span class="material-symbols-outlined">
    menu
    </span> 
    </button>
    <a href="dashboard_adm.php"><img class="logo" src="src/img/logo.svg" alt="logo Conexão Estagios"></a>
    
    </header>


    <main id="content">
    <div class="modal-sidebar"></div>
    <aside class="sidebar">
    <button class="btn-menu">
    <span class="material-symbols-outlined">
    menu
    </span> 
    </button>

    <button class="close-btn">
    <span class="material-symbols-outlined">
    keyboard_double_arrow_left
    </span>
    </button>

    <div class="profile">
    <div class="circle">
    <p><?php echo $primeiroLetra, $SegundaLetra?></p>
    </div>
    <div class="name-email">
    <p><?php echo $nome;?></p>
    <p><?php echo $email;?></p>
    </div>
    </div>


    <div class="nav-menu">
    <div class="button-container">
    <button class="tab-btn active" content-id="gestao">
    <span class="material-symbols-outlined">
    space_dashboard
    </span>
    <p class="icon-title">Gerenciar</p>
    </button>
    </div>
    </div>

    <a href="Sair.php" class="btn-logout">
    <span class="material-symbols-outlined">
    logout
    </span>
    <p class="icon-title">Sair</p>
    </a>
    </aside>

    <section class="tab-contents">
    <section class="content" id="gestao">
    <div class="boxings">
    <div class="titulo">
    <h2>Gestão</h2>
    </div>
    <div class="box-content">
    <a href="tela_painel_controle.php" class="box">
    <div class="circle">
    <span class="material-symbols-outlined">
    team_dashboard
    </span>
    </div>
    <p class="strong">Painel de Controle</p>
    </a>
<!--  -->
    <a href="tela_gestao_vagas.php" class="box">
    <div class="circle">
    <span class="material-symbols-outlined">
    business_center
    </span>
    </div>
    <p class="strong">Gestão de Vagas</p>
    </a>
    
    <a href="tela_gestao_Empresa.php" class="box">
    <div class="circle">
    <span class="material-symbols-outlined">
    Apartment
    </span>
    </div>
    <p class="strong">Gestão de Empresas</p>
    </a>

    <a href="tela_gestao_candidatos.php" class="box">
    <div class="circle">
    <span class="material-symbols-outlined">
    manage_accounts
    </span>
    </div>
    <p class="strong">Gestão de Candidatos</p>
    </a>

    <a href="tela_log.php" class="box">
        <div class="circle">
        <span class="material-symbols-outlined">
        eye_tracking
        </span>
        </div>
        <p class="strong">Logs de Acesso</p>
        </a>
    </div>
    </section>
    </section>
    </main>
</body>
</html>