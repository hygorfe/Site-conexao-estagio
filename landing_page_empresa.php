<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="src/css/landing_page_empresa.css">
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
    <li class="drop"><button class="links">Para empresas<span class="material-symbols-outlined">keyboard_arrow_down</span></button>
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
    </ul>
    </nav>
    <div class="righ-container">
    <a class="login" href="tela_de_login_empresa.php"><span class="material-symbols-outlined">person</span>
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
    <h2 class="titulo">Processo seletivo focado apenas em uma área universitaria</h2>

    <p>flexibilidade e humanização, tudo isso trazendo diversidade de ponta a ponta em um processo de educação e seleção.</p>
    
    <div class="btn-sobre">
    <a class="button-contratar" href="tela_de_login_empresa.php">Contratar Estágiarios<span class="material-symbols-outlined">arrow_forward</span></a>
    </div>
    </div>
    <div class="img">
    <img class="img-person" src="src/img/Estudante.svg" alt="imagem Estudante">
    </div>

   </section>

   <section class="contratação">
   <h2 class="titulo">Veja como é facil contratar na Conexão Estagios</h2>

   <div class="cards">
    <div class="card">
    <img src="src/img/tela.svg" alt="imagem tela">
    <p>Cadastre sua empresa no nosso site informe quantos estágiarios você precisa.</p>
    </div>
    <div class="card">
    <img src="src/img/group.svg" alt="imagem grupo">
    <p>A Conexão selecionará e encaminhará para a entrevista os melhores talentos para sua empresa.</p>
    </div>
    <div class="card">
    <img src="src/img/search-profile.svg" alt="imagem procura Candidatos">
    <p>Faça a entrevista com os candidatos e selecione os melhores talentos para sua empresa.</p>
    </div>
    <div class="card">
    <img src="src/img/tela-profile.svg" alt="imagem tela contratação">
    <p>Toda a parte da contratação é feita através do nosso painel, com agilidade e sem burocracia..</p>
    </div>
   </div>

   <a class="button-contratar" href="tela_de_login_empresa.php">Contratar Estágiarios <span class="material-symbols-outlined">arrow_forward</span></a>
   </section>

   <section class="vantagens">
    <h2 class="titulo">Mais vantagens em contratar com a Conexão Estagios</h2>

    <div class="icons">
    <p class="color-blue"><span class="material-symbols-outlined">school</span>Estudantes da área de TI</p>
    <p class="color-grey"><span class="material-symbols-outlined">contract</span>Contratação com menos burocracia</p>
    <p class="color-blue"><span class="material-symbols-outlined">groups</span>Talentos proativos para sua empresa</p>
    <p class="color-grey"><span class="material-symbols-outlined">devices</span>O mais moderno sistema de gestão de estagiários</p>
    <p class="color-blue"><span class="material-symbols-outlined">public</span>Atuação em todo o território nacional</p>
    </div>

    <a class="button-contratacao" href="tela_de_login_empresa.php">Contratar Estágiarios <span class="material-symbols-outlined">arrow_forward</span></a>
   </section>

   <section class="nao-perca-tempo">
    <img class="Estudantes" src="src/img/figure-empresa.svg" alt="imagem de empresa">
    <div class="text-button">
    <p>A Conexão Estágios é reconhecida <br> pela excelência na administração de <br>estagiários. Oferecemos para a sua <br> empresa o melhor serviço de <br> recrutamento, seleção e gestão dos <br> programas de estágio, tudo isso para <br> você não ter dor de cabeça.</p>
    
    <a class="button-contratacao" href="tela_de_login_empresa.php">Contratar Estágiarios <span class="material-symbols-outlined">arrow_forward</span></a>
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