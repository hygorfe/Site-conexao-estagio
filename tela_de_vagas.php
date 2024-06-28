    <?php 
    session_start();
    require_once "config.php";
    
    if((isset($_SESSION['email']) == true) && ((isset($_SESSION['senha']) == true))){

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="src/css/style.css">
    <title>Conexão Estagios - Site de Estagios na área de TI</title>
    <script src="src/JS/main.js" defer></script>
</head>
<body>

    <!-- Acessibilidade -->
   <div class="nav-acessibilidade">

    <div class="links-menu">
    <ul>
    <li><span>C</span><a href="#content">Ir para o conteúdo</a></li>
    <li><span>M</span><a href="#menu">Ir para o menu</a></li>
    <li><span>R</span><a href="#footer">Ir para o rodapé</a></li>
    </ul>
    </div>
    <div class="fontes-contraste">
    <div class="fonts">
    <p>Fontes</p>
    <button class="menos">
    A-
    </button>
    <button class="mais">
    A+
    </button>
    </div>
    <div class="contraste">
    <p>Contraste</p>

    <input type="checkbox" name="change-Theme" id="change-Theme">
    <label for="change-Theme">
    <span class="material-symbols-outlined">
    contrast
    </span>
    </label>
    </div>
    </div>
   </div>
   <header class="cabecalho">
    <button class="btn-menu">
    <span class="material-symbols-outlined">
    menu
    </span>
    </button>
    <a href="tela_de_vagas.php"><img class="logo" src="src/img/Logo_black.svg" alt="logo Conexão Estagios"></a>
    <a href="tela_de_vagas.php"><img class="logoDark" src="src/img/Logo.svg" alt="logo Conexão Estagios"></a>

    <nav class="menu" id="menu">
    <ul>
    <button class="btn-vagas">Vagas Abertas</button>
    <li><a href="#alerta_vagas">Alerta de Vagas</a></li>
    </ul>
    </nav>

    <?php
    if(!isset($_SESSION['email']) && (!isset($_SESSION['senha']))){
        echo "<a class=\"button-entrar\" href=\"tela_de_login.php\">Entrar</a>";
        $imgProfile = "";
    }else{
        if(isset($linha) && $linha['img_profile']){
            $imgProfile = $linha['img_profile'];
        }else{
            $imgProfile = ""; 
        }

        echo"
        <div class=\"logado\">
        <button class=\"logadoBtn\">
        <div class=\"circle\">
        <img src=\"{$imgProfile}\">
        </div>
        <p>$nome $sobrenome</p>
        <span class=\"material-symbols-outlined\">
        keyboard_arrow_down
        </span>
        </button>
    
        <div class=\"dropMenu\">
        <a href=\"dashboard_candidato.php\">Meu Perfil</a>
        <a href=\"Sair.php\">Sair</a>
        </div>
    
        </div>";
    }
?>

    </header>

    <?php 
    if(isset($_SESSION["email"]) && ($_SESSION["senha"])){
        $email = $_SESSION["email"];
    $sql_H = "SELECT * FROM habilidades WHERE FK_candidatoHab = (SELECT ID_candidato FROM candidato WHERE email = '$email')";
    $resultado_H = mysqli_query($conn, $sql_H);
    if($resultado_H && mysqli_num_rows($resultado_H) == 0){
        echo "
        <div class=\"text-perfil\">
        <p class=\"titulo\">Para se candidatar, é necessário completar o seu perfil.</p>
        <a href=\"dashboard_candidato.php\">Complete o seu perfil</a>
        </div>
        ";
    }
    }
    
    
    ?>

    <main class="content" id="content">
    <section class="search-filter">
    <div class="search">
    <input type="text" name="search" id="search" placeholder="Pesquise por empresa, local, vagas...">
    <button onclick="searchData()" type="button" class="btn-search">
    <span class="material-symbols-outlined">
    search
    </span>
    </button>
    </div>
    </section>
    <!-- Sidebar menu -->
    <div class="modal-sidebar"></div>
    <aside class="sidebar-menu">
    <button class="btn-close">
    <span class="material-symbols-outlined">
    close
    </span>
    </button>
    <nav class="nav-menu">
    <?php 
    if(isset($_SESSION['email']) && isset($_SESSION['senha'])){
        echo '<a class="color-blue" href="dashboard_candidato.php">Meu perfil</a>';
        echo '<a href="tela_de_vagas.php">Vagas abertas</a>';
        echo '<a href="#alerta_vagas">Alerta de vagas</a>';
        echo '<a href="Sair.php">Sair</a>';
    }
    else{
        echo '<a class="color-blue" href="tela_de_vagas.php">Vagas Abertas</a>';
        echo '<a href="#alerta_vagas">Alerta de vagas</a>';
        echo '<a href="tela_de_cadastro.php">Fazer Cadastro</a>';
        echo '<a href="tela_de_login.php">Entrar</a>';
    }
    
    ?>
    </nav>
    <div class="redes">
    <span><img src="src/img/instagram 1.svg" alt="logo instagram"></span>
    <span><img src="src/img/linkedin 1.svg" alt="logo linkedin"></span>
    <span><img src="src/img/youtube 1.svg" alt="logo youtube"></span>
    </div>
    </aside>

    <hr>

    <section id="container">
    <div class="tab-buttons">
    <div class="buttons-container">
    
    <button class="tab-btn active" id="btn-vagas" content-id="vagas">
    Vagas Abertas
    </button>
    </div>
    </div>
    </section>
    <div class="qnt_vagas">
        <?php 
        
        $sql = "SELECT COUNT(ID_CadastroVagas) as Quantidade_Vagas FROM cadastro_vagas";
        $result = mysqli_query($conn, $sql);


        if($result && mysqli_num_rows($result) > 0){
        $linha = mysqli_fetch_assoc($result);
        $Quantidade_Vagas = $linha["Quantidade_Vagas"];
        }

        
        echo "<span><strong>$Quantidade_Vagas vagas</strong> encontradas</span>"
        
        ?>
    </div>
    <section class="tab-contents">
    <section class="content" id="vagas">
    <div class="box-container">
    <?php
if(!empty($_GET["search"])) {
    $data = mysqli_real_escape_string($conn, $_GET['search']);
    $sql = "SELECT cadastro_vagas.*, localidade_empresa.cidade 
            FROM cadastro_vagas 
            INNER JOIN localidade_empresa ON cadastro_vagas.FK_empresa_vagas = localidade_empresa.FK_empresa_cad
            WHERE localidade_empresa.cidade LIKE '%$data%' OR cadastro_vagas.titulo_vaga LIKE '%$data%' OR cadastro_vagas.nome_empresa LIKE '%$data%'";
    $result = mysqli_query($conn, $sql);


    if($result){
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

        echo "<a href=\"tela_vaga_cadastrada.php?id=$ID_CadastroVagas\" class=\"box-vagas\">
        <h2 class=\"titulo\">
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
    }
}else{
        $sql = "SELECT cadastro_vagas.*, localidade_empresa.cidade FROM cadastro_vagas INNER JOIN localidade_empresa ON cadastro_vagas.FK_empresa_vagas = localidade_empresa.FK_empresa_cad";
    $result = mysqli_query($conn, $sql);

if($result){
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


        echo "<a href=\"tela_vaga_cadastrada.php?id=$ID_CadastroVagas\" class=\"box-vagas\">
        <h2 class=\"titulo\">
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
  }
}

?>

    </div>
    </section>
    </section>
    <hr>

    <section class="alert-vagas" id="alerta_vagas">
    <div class="texts">
    <h2>Não perca nossas oportunidades!</h2>
    <p>Insira seu e-mail para receber alertas exclusivos.</p>
    </div>
    <div class="email-button">
    <input type="email" name="email" id="" placeholder="Insira se email aqui">
    <input type="submit" name="submit" value="Receber Alerta">
    </div>
    </section>
    </main>
     <!-- Footer -->
   <footer class="footer" id="footer"> 
    <p>&copy; 2024 Grupo10, Todos os direitos reservados</p>
    <div class="redes">
    <span><svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_25_386)">
<path d="M17.5 0C12.7509 0 12.1538 0.021875 10.2878 0.105C8.42188 0.1925 7.15094 0.485625 6.0375 0.91875C4.86903 1.35696 3.81093 2.04618 2.93781 2.93781C2.04618 3.81093 1.35696 4.86903 0.91875 6.0375C0.485625 7.14875 0.190313 8.42188 0.105 10.2812C0.021875 12.1516 0 12.7466 0 17.5022C0 22.2534 0.021875 22.8484 0.105 24.7144C0.1925 26.5781 0.485625 27.8491 0.91875 28.9625C1.36719 30.1131 1.96438 31.0887 2.93781 32.0622C3.90906 33.0356 4.88469 33.635 6.03531 34.0812C7.15094 34.5144 8.41969 34.8097 10.2834 34.895C12.1516 34.9781 12.7466 35 17.5 35C22.2534 35 22.8463 34.9781 24.7144 34.895C26.5759 34.8075 27.8512 34.5144 28.9647 34.0812C30.1324 33.6428 31.1897 32.9535 32.0622 32.0622C33.0356 31.0887 33.6328 30.1131 34.0812 28.9625C34.5122 27.8491 34.8075 26.5781 34.895 24.7144C34.9781 22.8484 35 22.2534 35 17.5C35 12.7466 34.9781 12.1516 34.895 10.2834C34.8075 8.42188 34.5122 7.14875 34.0812 6.0375C33.643 4.86903 32.9538 3.81093 32.0622 2.93781C31.1891 2.04618 30.131 1.35696 28.9625 0.91875C27.8469 0.485625 26.5737 0.190313 24.7122 0.105C22.8441 0.021875 22.2513 0 17.4956 0H17.5ZM15.9316 3.15438H17.5022C22.1747 3.15438 22.7281 3.16969 24.5722 3.255C26.2784 3.33156 27.2059 3.61812 27.8228 3.85656C28.6388 4.17375 29.2228 4.55438 29.8353 5.16687C30.4478 5.77938 30.8263 6.36125 31.1434 7.17938C31.3841 7.79406 31.6684 8.72156 31.745 10.4278C31.8303 12.2719 31.8478 12.8253 31.8478 17.4956C31.8478 22.1659 31.8303 22.7216 31.745 24.5656C31.6684 26.2719 31.3819 27.1972 31.1434 27.8141C30.8609 28.5729 30.4133 29.2595 29.8331 29.8244C29.2206 30.4369 28.6388 30.8153 27.8206 31.1325C27.2081 31.3731 26.2806 31.6575 24.5722 31.7362C22.7281 31.8194 22.1747 31.8391 17.5022 31.8391C12.8297 31.8391 12.2741 31.8194 10.43 31.7362C8.72375 31.6575 7.79844 31.3731 7.18156 31.1325C6.42213 30.8509 5.73475 30.4041 5.16906 29.8244C4.58779 29.2591 4.13947 28.5717 3.85656 27.8119C3.61812 27.1972 3.33156 26.2697 3.255 24.5634C3.17188 22.7194 3.15438 22.1659 3.15438 17.4912C3.15438 12.8166 3.17188 12.2675 3.255 10.4234C3.33375 8.71719 3.61813 7.78969 3.85875 7.17281C4.17594 6.35687 4.55656 5.77281 5.16906 5.16031C5.78156 4.54781 6.36344 4.16937 7.18156 3.85219C7.79844 3.61156 8.72375 3.32719 10.43 3.24844C12.0444 3.17406 12.67 3.15219 15.9316 3.15V3.15438ZM26.8428 6.05937C26.567 6.05937 26.294 6.11369 26.0392 6.21923C25.7844 6.32476 25.5529 6.47945 25.3579 6.67445C25.1629 6.86945 25.0082 7.10096 24.9027 7.35574C24.7971 7.61052 24.7428 7.8836 24.7428 8.15938C24.7428 8.43515 24.7971 8.70823 24.9027 8.96301C25.0082 9.21779 25.1629 9.4493 25.3579 9.6443C25.5529 9.8393 25.7844 9.99399 26.0392 10.0995C26.294 10.2051 26.567 10.2594 26.8428 10.2594C27.3998 10.2594 27.9339 10.0381 28.3277 9.6443C28.7216 9.25047 28.9428 8.71633 28.9428 8.15938C28.9428 7.60242 28.7216 7.06828 28.3277 6.67445C27.9339 6.28062 27.3998 6.05937 26.8428 6.05937ZM17.5022 8.51375C16.3102 8.49515 15.1263 8.71387 14.0196 9.15718C12.9129 9.60049 11.9055 10.2595 11.056 11.0959C10.2064 11.9323 9.53173 12.9294 9.07121 14.029C8.6107 15.1286 8.37353 16.3089 8.37353 17.5011C8.37353 18.6933 8.6107 19.8735 9.07121 20.9732C9.53173 22.0728 10.2064 23.0699 11.056 23.9063C11.9055 24.7427 12.9129 25.4017 14.0196 25.845C15.1263 26.2883 16.3102 26.507 17.5022 26.4884C19.8615 26.4516 22.1117 25.4886 23.7671 23.8071C25.4226 22.1257 26.3504 19.8607 26.3504 17.5011C26.3504 15.1415 25.4226 12.8765 23.7671 11.1951C22.1117 9.51363 19.8615 8.55056 17.5022 8.51375ZM17.5022 11.6659C18.2683 11.6659 19.027 11.8168 19.7348 12.11C20.4426 12.4032 21.0858 12.833 21.6275 13.3747C22.1692 13.9164 22.599 14.5596 22.8922 15.2674C23.1853 15.9752 23.3363 16.7339 23.3363 17.5C23.3363 18.2661 23.1853 19.0248 22.8922 19.7326C22.599 20.4404 22.1692 21.0836 21.6275 21.6253C21.0858 22.167 20.4426 22.5968 19.7348 22.89C19.027 23.1832 18.2683 23.3341 17.5022 23.3341C15.9549 23.3341 14.471 22.7194 13.3769 21.6253C12.2828 20.5312 11.6681 19.0473 11.6681 17.5C11.6681 15.9527 12.2828 14.4688 13.3769 13.3747C14.471 12.2806 15.9549 11.6659 17.5022 11.6659Z" fill="black"/>
</g>
<defs>
<clipPath id="clip0_25_386">
<rect width="35" height="35" fill="white"/>
</clipPath>
</defs>
</svg></span>
    <span><svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_25_388)">
<path d="M0 2.50688C0 1.12219 1.15062 0 2.57031 0H32.4297C33.8494 0 35 1.12219 35 2.50688V32.4931C35 33.8778 33.8494 35 32.4297 35H2.57031C1.15062 35 0 33.8778 0 32.4931V2.50688ZM10.8128 29.2994V13.4947H5.56063V29.2994H10.8128ZM8.18781 11.3356C10.0188 11.3356 11.1584 10.1237 11.1584 8.60563C11.1256 7.05469 10.0209 5.87563 8.22281 5.87563C6.42469 5.87563 5.25 7.05688 5.25 8.60563C5.25 10.1237 6.38969 11.3356 8.15281 11.3356H8.18781ZM18.9241 29.2994V20.4728C18.9241 20.0003 18.9591 19.5278 19.0991 19.1909C19.4775 18.2481 20.3416 17.2703 21.7941 17.2703C23.695 17.2703 24.4541 18.7184 24.4541 20.8447V29.2994H29.7062V20.2344C29.7062 15.3781 27.1163 13.1206 23.66 13.1206C20.8731 13.1206 19.6241 14.6519 18.9241 15.7303V15.785H18.8891L18.9241 15.7303V13.4947H13.6741C13.7397 14.9778 13.6741 29.2994 13.6741 29.2994H18.9241Z" fill="black"/>
</g>
<defs>
<clipPath id="clip0_25_388">
<rect width="35" height="35" fill="none"/>
</clipPath>
</defs>
</svg></span>
    <span><svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M17.6116 4.3728H17.8063C19.6044 4.37937 28.7153 4.44499 31.1719 5.10562C31.9145 5.30723 32.5912 5.70023 33.1344 6.24532C33.6776 6.79041 34.0682 7.46852 34.2672 8.21187C34.4881 9.04312 34.6434 10.1434 34.7484 11.2787L34.7703 11.5062L34.8184 12.075L34.8359 12.3025C34.9781 14.3019 34.9956 16.1744 34.9978 16.5834V16.7475C34.9956 17.1719 34.9759 19.1712 34.8184 21.2537L34.8009 21.4834L34.7812 21.7109C34.6719 22.9622 34.51 24.2047 34.2672 25.1191C34.0682 25.8624 33.6776 26.5405 33.1344 27.0856C32.5912 27.6307 31.9145 28.0237 31.1719 28.2253C28.6344 28.9078 18.9897 28.9559 17.6531 28.9581H17.3425C16.6666 28.9581 13.8709 28.945 10.9397 28.8444L10.5678 28.8312L10.3775 28.8225L10.0034 28.8072L9.62937 28.7919C7.20125 28.6847 4.88906 28.5119 3.82375 28.2231C3.08137 28.0217 2.40483 27.629 1.86167 27.0843C1.31852 26.5396 0.92777 25.862 0.728437 25.1191C0.485625 24.2069 0.32375 22.9622 0.214375 21.7109L0.196875 21.4812L0.179375 21.2537C0.070795 19.7715 0.010971 18.2861 0 16.8L0 16.5309C0.004375 16.0606 0.021875 14.4353 0.14 12.6416L0.155313 12.4162L0.161875 12.3025L0.179375 12.075L0.2275 11.5062L0.249375 11.2787C0.354375 10.1434 0.509687 9.04093 0.730625 8.21187C0.929623 7.46852 1.32023 6.79041 1.8634 6.24532C2.40657 5.70023 3.0833 5.30723 3.82594 5.10562C4.89125 4.82124 7.20344 4.64624 9.63156 4.53687L10.0034 4.52155L10.3797 4.50843L10.5678 4.50187L10.9419 4.48655C13.0237 4.41962 15.1064 4.38243 17.1894 4.37499L17.6116 4.3728ZM14 11.3947V21.9341L23.0934 16.6666L14 11.3947Z" fill="black"/>
</svg></span>
    </div>
   </footer>

</body>
   <script>
    var search = document.getElementById('search');
    search.addEventListener('keypress', function(event){
        if(event.key === "Enter"){
            console.log('apertou')
            searchData();
        }

        });

    function searchData(){
        window.location = "tela_de_vagas.php?search="+search.value;
    }
   </script>
</html>