<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="src/css/landing_page.css">
    <link rel="shortcut icon" href="src/img/Favicon.png" type="image/x-icon">
    <title>Conexão Estagios - Site de Estagios na área de TI </title>
    <script src="src/JS/interatividade.js" defer></script>
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

   <!-- Header -->
   <header class="cabecalho">
       <a href="landing_page.php"><img class="logo" src="src/img/logo.svg" alt="logo Conexão Estagios"></a>
    <!--nav-menu  -->
   <nav class="menu" id="menu">
   <ul>
   <li class="drop"><button class="links" >Para empresas<span class="material-symbols-outlined">keyboard_arrow_down</span></button>
    <div class="dropdown">
    <a class="link-drop" href="landing_page_empresa.php">atração e seleção
    </a>
    </div>
    </li>
   <li class="drop"><button class="links" >Para candidatos <span class="material-symbols-outlined">keyboard_arrow_down</span></button>
    <div class="dropdown">
    <a class="link-drop" href="tela_de_vagas.php">vagas abertas</a>
    </div>
    </li>
   <li><a class="oportunidades-border" href="tela_de_vagas.php">Oportunidades</a></li>
   </ul>
   </nav>
   <div class="righ-container">
    <a class="login" href="tela_de_login.php"><span class="material-symbols-outlined">person</span>
    </a>

    <button class="menu-mobile">
    <span class="material-symbols-outlined">
    menu
    </span>
    </button>
    </div>
   
   <!-- Fim nav-menu -->
   </header>
   <!-- Fim Header -->

   <!-- main -->
   <main class="content" id="content">
    <!-- Section -->
   <section class="sobre">
   <div class="text-sobre">
       <h2 class="titulo">Somos o caminho mais rapida para encontrar sua vaga  de estagio no mundo de TI</h2>
       
       <p>Ajudamos a encontrar as melhores oportunidades, criando pontes entre as juventudes e o mercado de trabalho.</p>

       <div class="btn-sobre">
        <a class="button-recrutar" href="tela_de_login_empresa.php">Quero Recrutar<span class="material-symbols-outlined">arrow_forward</span></a>
        
        <a class="button-oportunidade" href="tela_de_login.php">Quero uma Oportunidade <span class="material-symbols-outlined">arrow_forward</span></a>
       </div>
   </div>

   <div class="img">
   <img class="img-person" src="src/img/image 2.svg" alt="">
   </div>
   </section>

   <section class="procurando">
   <h2 class="titulo">O que você esta procurando ?</h2>

   <div class="portal-container">
    
    <div class="portal">
    <span class="material-symbols-outlined">school</span>
    <h3>Portal do Estudante</h3>
    <p>Cadastro de Estudantes</p>
    <span class="traco"></span>
    <p>Vagas de Estágios</p>
    <span class="traco"></span>
    <p>E muito mais</p>
    <span class="traco"></span>
    <a class="button-acessar"  href="landing_page.php">Acessar<span class="material-symbols-outlined">arrow_forward</span></a>
    </div>

    <div class="portal">
    <span class="material-symbols-outlined">apartment</span>
    <h3>Portal da Empresa</h3>
    <p>Cadastro das Empresas</p>
    <span class="traco"></span>
    <p>Contratação de Estágiarios</p>
    <span class="traco"></span>
    <p>E muito mais</p>
    <span class="traco"></span>
    <a class="button-acessar" href="landing_page_empresa.php">Acessar<span class="material-symbols-outlined">arrow_forward</span></a>
    </div>
   </div>
   </section>

   <section class="porque">
    <h2 class="titulo">Por que a Conexão Estagios ?</h2>
    <div class="cards">

    <div class="box">
    <div class="circle">
    <span class="material-symbols-outlined">person_search</span>
    </div>
    <p>
    <strong>de jovem para jovem</strong>, temos conhecimentos e vivências profundas sobre as juventudes.</p>
    </div>

    <div class="box">
    <div class="circle">
    <span class="material-symbols-outlined">emoji_objects</span>
    </div>
    <p>trazemos <strong>inovação e segurança</strong>, as melhores soluções que já deram certo nas maiores empresas.</p>
    </div>

    <div class="box">
    <div class="circle">
    <span class="material-symbols-outlined">diversity_3</span>
    </div>
    <p>trabalhamos por <strong>oportunidades mais inclusivas</strong> e processos humanizados, que geram impacto na vida das juventudes.</p>
    </div>

    <div class="box">
    <div class="circle">
    <span class="material-symbols-outlined">handshake</span>
    </div>
    <p><strong>somos parceiros de verdade</strong> e apontamos os caminhos mais acertados para o seu contexto, unindo nossa experiência ao seu sucesso.
    </p>
    </div>

    <div class="box">
    <div class="circle">
    <span class="material-symbols-outlined">feedback</span>
    </div>
    <p>nossos processos são uma <strong>jornada de aprendizagem</strong>, da seleção que educa até o feedback que traz crescimento.</p>
    </div>

    <div class="box">
    <div class="circle">
    <span class="material-symbols-outlined">airwave</span>
    </div>
    <p>Com um site <strong>rapido e pratico</strong> 
     para conectar você com milhares de estagios</p>
    </div>
    
    </div>
    <a class="button-vagas-abertas" href="tela_de_vagas.php">Veja as vagas abertas <span class="material-symbols-outlined">arrow_forward</span></a>
   </section>

   <section class="nao-perca-tempo">
    <img class="estudantes" src="src/img/figure-estudantes.svg" alt="imagem de estudantes">
    <div class="text-button">
        <p>Estudante, não perca tempo, a <br>sua vaga de estágio já está te <br>esperando! Cadastre-se!</p>
        <a class="button-cadastar" href="tela_de_cadastro.php">Fazer Cadastro <span class="material-symbols-outlined">arrow_forward</span></a>
    </div>

   </section>
   <!-- Fim section -->

   <div class="modal-sidebar"></div>
    <aside class="side-bar-menu">
    <button class="button-close">
    <span class="material-symbols-outlined">
    close
    </span>
    </button>

    <ul class="nav-menu">
    <li><a class="link-menu" href="landing_page_empresa.php">para empresas</a></li>
    <li><a class="link-menu" href="landing_page.php">para candidatos</a></li>
    <li><a class="link-menu" href="tela_de_vagas.php">oportunidades</a></li>
    </ul>

    <div class="redes">
    <span><img src="src/img/instagram 1.svg" alt=""></span>
    <span><img src="src/img/linkedin 1.svg" alt=""></span>
    <span><img src="src/img/youtube 1.svg" alt=""></span>
    </div>
    </aside>


   </main>
   <!-- Fim main -->

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
</html>
<!--  -->