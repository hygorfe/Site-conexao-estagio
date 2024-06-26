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
    <button class="btn-contraste" title="Contraste">
    <span class="material-symbols-outlined">
    contrast
    </span>
    </button>
    </div>
    </div>
   </div>
   <header class="cabecalho">
    <button class="btn-menu">
    <span class="material-symbols-outlined">
    menu
    </span>
    </button>
    <a href="tela_de_vagas.php"><img class="logo" src="src/img/logo.svg" alt="logo Conexão Estagios"></a>

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
    <span><img src="src/img/instagram 1.svg" alt=""></span>
    <span><img src="src/img/linkedin 1.svg" alt=""></span>
    <span><img src="src/img/youtube 1.svg" alt=""></span>
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