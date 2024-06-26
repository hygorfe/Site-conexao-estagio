<?php 
session_start();
require_once "config.php";

if(isset($_SESSION['email']) && isset($_SESSION['senha'])){
    
    $email = $_SESSION['email'];

    $sql = "SELECT nome, sobrenome FROM candidato WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    

    if($result){
        $linha = mysqli_fetch_array($result);
        $nome = $linha['nome'];
        $sobrenome = $linha['sobrenome'];
    }else{
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header("Location: tela_de_vagas.php");
        exit;
    }

    if((isset($_SESSION['email']) == true) && ((isset($_SESSION['senha']) == true))){

        $email = $_SESSION['email'];
    
        $sql = "SELECT data_nasc, genero, 2FA_pergunta, 2FA_resposta, estado_civil, link_L, link_P, img_profile FROM infog_candidato WHERE FK_candidato = (SELECT ID_candidato FROM candidato WHERE email = '$email')";
        $result = mysqli_query($conn, $sql);
    
        if($result){
            $linha = mysqli_fetch_array($result);
            if($linha){
                $imgProfile = $linha['img_profile']; 
            }else{
                $imgProfile = "";
            }
        }else{
            $imgProfile = "";
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
    <link rel="stylesheet" href="src/css/dashboard_candidato.css">
    <title>Dashboard | Candidato</title>
    <script src="src/JS/dashboards.js"defer></script>
</head>
<body>
    <header class="cabecalho">
    <button class="btn-menu-mobile">
    <span class="material-symbols-outlined">
    menu
    </span> 
    </button>
    <a href="tela_de_vagas.php"><img class="logo" src="src/img/logo.svg" alt="logo Conexão Estagios"></a>
    
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
    <?php 
    if(isset($linha) && isset($linha['img_profile'])){
        echo '<img src="'.$linha['img_profile'].'" alt="">';
    }
    ?>
    </div>
    <div class="name-email">
    <?php 
    if(isset($_SESSION['email']) && isset($_SESSION['senha'])){
        echo "<p>".$nome."</p>";
        echo "<p>".$_SESSION['email']."</p>";
    }else{
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header("Location: tela_de_vagas.php");
        exit;
    }
    ?>
    </div>
    </div>


    <div class="nav-menu">
    <div class="button-container">
    <a href="tela_de_vagas.php" class="tab-btn">
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

    <button class="tab-btn" content-id="oportunidades">
    <span class="material-symbols-outlined">
    space_dashboard
    </span>
    <p class="icon-title">Oportunidade</p>
    </button>

    <button class="tab-btn" content-id="baixar-curriculo">
    <span class="material-symbols-outlined">
    download
    </span>
    <p class="icon-title">Baixar Curriculo</p>
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
    <section class="content" id="perfil">
    <div class="boxings">
    <div class="titulo">
    <h2>Meu Perfil</h2>
    <p>Complete o seu Perfil</p>
    </div>
    <div class="box-content">
    <a href="formulario_informaçoes_gerais.php" class="box">
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
    <a href="formação.php" class="box">
    <div class="circle">
    <span class="material-symbols-outlined">
    book_2
    </span>
    </div>
    <div class="info">
    <p class="step">Passo 02</p>
    <p class="strong">Formação</p>
    </div>
    </a>
    
    <a href="localidade.php" class="box">
    <div class="circle">
    <span class="material-symbols-outlined">
    public
    </span>
    </div>
    <div class="info">
    <p class="step">Passo 03</p>
    <p class="strong">Localidade</p>
    </div>
    </a>

    <a href="habilidades.php" class="box">
    <div class="circle">
    <span class="material-symbols-outlined">
    star
    </span>
    </div>
    <div class="info">
    <p class="step">Passo 04</p>
    <p class="strong">Habilidades</p>
    </div>
    </a>

    </section>
    <section class="content " id="oportunidades">
    <div class="titulo">
    <h2>Oportunidades</h2>
    </div>
    <!-- oportunidades -->
    <div class="box-container">
    <?php 
    if(isset($_SESSION["email"]) && (isset($_SESSION["senha"]))){
        $email = $_SESSION["email"];
        $sql_C = "SELECT * FROM candidato WHERE email = '$email'";
        $resultado_C = mysqli_query($conn, $sql_C);
        
        if($resultado_C){
            $linha = mysqli_fetch_assoc($resultado_C);
            $ID_candidato = $linha["ID_candidato"];

        $sql = "SELECT cadastro_vagas.*, localidade_empresa.cidade 
        FROM cadastro_vagas 
        INNER JOIN localidade_empresa ON cadastro_vagas.FK_empresa_vagas = localidade_empresa.FK_empresa_cad
        WHERE cadastro_vagas.ID_CadastroVagas IN (
        SELECT FK_ID_CadastroVagas FROM aplicacao WHERE FK_ID_candidato = '$ID_candidato'
        )";
        $result = mysqli_query($conn, $sql);

        if($result && mysqli_num_rows($result) > 0){
                while($linha = mysqli_fetch_assoc($result)){
                $ID_CadastroVagas = $linha["ID_CadastroVagas"];
                $skillVagas = $linha["skill_vaga"];
                $tituloVagas = $linha["titulo_vaga"];
                $tecnologias = $linha["tecnologias"];
                $dataEncerramento = $linha["data_encerramento"];
                $nomeEmpresa = $linha["nome_empresa"];
                $tamanhoEmpresa = $linha["tamanho_empresa"];
                $modeloEmpresa = $linha["modelo_trabalho"];
                $salario = $linha["salario"];
                $tipoContrato = $linha["tipo_contrato"];
                $descricao = $linha["descricao"];
                $atividades = $linha["atividades"];
                $requisitos = $linha["requisitos"];

                $cidade = $linha["cidade"];


                $dataObjeto = date_create_from_format('Y-m-d', $dataEncerramento);
                $dataFormatada = $dataObjeto->format('d/m/Y');

                echo "
                <a href=\"tela_vaga_cadastrada.php?id=$ID_CadastroVagas\" class=\"box-vagas\">
                <h2 class=\"titulo-vagas\">
                Estágio • $nomeEmpresa
                </h2>
                <div class=\"descricao-vaga\">
                <p>
                $tituloVagas
                </p>
                </div>
                <div class=\"localizacao-estado\">
                <span class=\"material-symbols-outlined\">
                Location_on
                </span>
                <p class=\"estado\">
                $cidade
                </p>
                </div>
                <div class=\"data\">
                <span class=\"material-symbols-outlined\">
                calendar_today
                </span>
                Encerra em 
                <data value=\"data-vaga\">$dataFormatada</data>
                </div>
                </a>";
                }
                }else{
                    echo "<p style=\"font-family: Arial, Helvetica, sans-serif;\">"."Você ainda não tem vagas aplicadas"."</p>";
                }
            } 
        }


    
    
    ?>
    </div>
    </section>
    <section class="content" id="baixar-curriculo">
        
    <div class="titulo">
    <h2>Baixar Curriculo</h2>
    </div>

    <div class="box">
    <?php 
    if(isset($_SESSION["email"]) && (isset($_SESSION["senha"]))){
    $email = $_SESSION["email"];
    $sql = "SELECT * FROM candidato WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if($result){
        $linha = mysqli_fetch_assoc($result);
        $ID_candidato = $linha["ID_candidato"];
    }
    echo "
    <a href=\"Curriculo.php?id=$ID_candidato\" name=\"baixarBtn\" class=\"button-baixar\">
    Baixar Curriculo
    </a>";
    }
    
    
    
    ?>
    </div>
    </section>
    </section>
    </main>
</body>
</html>