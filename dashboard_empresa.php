<?php 
session_start();
require_once "config.php";

if(isset($_SESSION["emailEmpresa"]) && (isset($_SESSION["senha"]))){
    $emailEmpresa = $_SESSION["emailEmpresa"];

    $sql = "SELECT * FROM empresa_cad WHERE email_empresa = '$emailEmpresa'";
    $result = mysqli_query($conn, $sql);

    if($result){
        $linha = mysqli_fetch_assoc($result);
        $nomeFantasia = $linha["nome_fantasia"];

        $primeiraLetra = substr($nomeFantasia, 0, 1);
        $segundaLetra = substr($nomeFantasia, 4, 1);

        if(mysqli_query($conn, $sql)){

        }else{
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header("Location: tela_de_login_empresa.php");
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
    <link rel="stylesheet" href="src/css/dashboard_empresa.css">
    <title>Dashboard | Empresa</title>
    <script src="src/JS/dashboards.js"defer></script>
</head>
<body>
    <header class="cabecalho">
    <button class="btn-menu-mobile">
    <span class="material-symbols-outlined">
    menu
    </span> 
    </button>
    <a href="dashboard_empresa.php"><img class="logo" src="src/img/logo.svg" alt="logo Conexão Estagios"></a>
    
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
    <p><?php echo $primeiraLetra, $segundaLetra?></p>
    </div>
    <div class="name-email">
    <?php 
    if(isset($_SESSION['emailEmpresa']) && isset($_SESSION['senha'])){
        echo "<p>".$nomeFantasia."</p>";
        echo "<p>".$_SESSION['emailEmpresa']."</p>";
    }else{
        unset($_SESSION['emailEmpresa']);
        unset($_SESSION['senha']);
        header("Location: tela_de_login_empresa.php");
        exit;
    }
    ?>
    </div>
    </div>


    <div class="nav-menu">
    <div class="button-container">
    <a href="landing_page_empresa.php" class="tab-btn">
    <span class="material-symbols-outlined">
    home
    </span>
    <p class="icon-title">Home</p>
    </a>

    <button class="tab-btn active" content-id="perfil">
    <span class="material-symbols-outlined">
    person
    </span>
    <p class="icon-title">Perfil</p>
    </button>

    <button class="tab-btn" content-id="gerenciar">
    <span class="material-symbols-outlined">
    space_dashboard
    </span>
    <p class="icon-title">Gerenciar</p>
    </button>
    </div>
    </div>

    <a href="SairEmpresa.php" class="btn-logout">
    <span class="material-symbols-outlined">
    logout
    </span>
    <p class="icon-title">Sair</p>
    </a>
    </aside>

    <section class="tab-contents">
    <section class="content" id="perfil">
    <div class="boxings">
    <div class="titulo">
    <h2>Perfil Empresa</h2>
    <p>Complete o Perfil</p>
    </div>
    <div class="box-content">

    <a href="tela_informacao_empresa.php" class="box">
    <div class="circle">
    <span class="material-symbols-outlined">
    edit_square
    </span>
    </div>
    <div class="info">
    <p class="step">Passo 01</p>
    <p class="strong">Informações Gerais</p>
    </div>
    </a>

    <a href="localidade_empresa.php" class="box">
    <div class="circle">
    <span class="material-symbols-outlined">
    public
    </span>
    </div>
    <div class="info">
        <p class="step">Passo 02</p>
        <p class="strong">Localidade</p>
    </div>
    </div>
    </a>

    </section>

    <section class="content " id="gerenciar">
    <div class="boxings">
    <div class="titulo">
    <h2>Gerenciamento</h2>
    </div>
    <div class="box-content">

    <a href="cadastro_vagas.php" class="box">
    <div class="circle">
    <span class="material-symbols-outlined">
    work
    </span>
    </div>
    <p class="strong">Cadastrar Vagas</p>
    </a>
    
    <a href="tela_gerenciamento_vagas.php" class="box">
    <div class="circle">
    <span class="material-symbols-outlined">
    business_center
    </span>
    </div>
    <p class="strong">Gerenciar Vagas</p>
    </a>
    
    <a href="tela_gerenciamento_candidato.php" class="box">
    <div class="circle">
    <span class="material-symbols-outlined">
    manage_accounts
    </span>
    </div>
    <p class="strong">Gerenciar Candidatos</p>
    </a>
    </section>
    </section>
    </main>
</body>
</html>