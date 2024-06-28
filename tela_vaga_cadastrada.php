<?php 
session_start();
require_once "config.php";
if(isset($_GET["id"])){



    $ID_CadastroVagas = $_GET["id"];
    $sql = "SELECT * FROM cadastro_vagas WHERE ID_CadastroVagas = $ID_CadastroVagas";
    $result = mysqli_query($conn, $sql);




    if($result){
        while($linha = mysqli_fetch_assoc($result)){
        $ID_CadastroVagas = $linha["ID_CadastroVagas"];
        $FK_empresa_vagas = $linha["FK_empresa_vagas"];
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

    }
  }
}


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
    <link rel="stylesheet" href="src/css/tela_vaga_cadastrada.css">
    <title>Conexão Estagios - Site de Estagios na área de TI</title>
    <script language='javascript'>
         var min=8;
        
        var max=20;
        
        function changeFontSize(opcao) {
        
    
        
           var div = document.getElementsByTagName('div');
        
           // percorre-os
        
           for(i = 0; i < div.length; i++) {
        
        
              if(div[i].style.fontSize) {
        
                 var s = parseInt(div[i].style.fontSize.replace("px",""));
        
              } else {
        
                 var s = 12;
        
              }
        
        
              if (opcao=='+') {
        
                if(s!=max) { s += 1; }
        
             } else {
        
                if(s!=min) { s -= 1; }
        
             }
        
              div[i].style.fontSize = s+"px"
        
           }
        
           var h2 = document.getElementsByTagName('h2');

           for(i = 0; i < h2.length; i++) {
        
        
        if(h2[i].style.fontSize) {
  
           var s = parseInt(h2[i].style.fontSize.replace("px",""));
  
        } else {
  
           var s = 12;
  
        }
  
        if (opcao=='+') {
  
          if(s!=max) { s += 1; }
  
       } else {
  
          if(s!=min) { s -= 1; }
  
       }
  
        h2[i].style.fontSize = s+"px"
  
     }

     var h3 = document.getElementsByTagName('h3');

        for(i = 0; i < h3.length; i++) {


        if(h3[i].style.fontSize) {

        var s = parseInt(h3[i].style.fontSize.replace("px",""));

        } else {

        var s = 12;

        }

        if (opcao=='+') {

        if(s!=max) { s += 1; }

        }else {

        if(s!=min) { s -= 1; }

        }

        h3[i].style.fontSize = s+"px"

        }

     var span = document.getElementsByTagName('span');

        for(i = 0; i < span.length; i++) {


        if(span[i].style.fontSize) {

        var s = parseInt(span[i].style.fontSize.replace("px",""));

        } else {

        var s = 12;

        }

        if (opcao=='+') {

        if(s!=max) { s += 1; }

        } else {

        if(s!=min) { s -= 1; }

        }

        span[i].style.fontSize = s+"px"

        }

    var p = document.getElementsByTagName('p');

        for(i = 0; i < p.length; i++) {


        if(p[i].style.fontSize) {

        var s = parseInt(p[i].style.fontSize.replace("px",""));

        } else {

        var s = 12;

        }

        if (opcao=='+') {

        if(s!=max) { s += 1; }

        } else {

        if(s!=min) { s -= 1; }

        }

        p[i].style.fontSize = s+"px"

        }


        }
    </script>
    <script src="src/JS/tela-vagas-cadastradas.js" defer></script>
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
    <a href="javascript:void(changeFontSize('-'))">A-</a>
</button>

<button class="mais">
    <a href="javascript:void(changeFontSize('+'))">A+</a>
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
    <main class="content" id="content">
    <section class="cabecalho-container">
    <p class="habilidade-skill"><?php echo $skillVagas;?></p>
    <h2 class="titulo"><?php echo $tituloVagas; ?></h2>
    <div class="skillsContainer">
    <?php
    $tecnologiasArray = explode(',', $tecnologias);
    foreach ($tecnologiasArray as $tecnologias){
        echo "  <div class=\"skills\">$tecnologias
    </div>";
    }
    ?>
    </div>
    </section>


    <?php 
    
    
    $sql_cad = "SELECT * FROM empresa_cad WHERE ID_empresa_cad = $FK_empresa_vagas";
    $resultado = mysqli_query($conn, $sql_cad);


    if($resultado){
    while($linha = mysqli_fetch_assoc($resultado))
    $razaoSocial = $linha["razao_social"];
    }
    ?>

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

    <section class="detalhes-vaga">
    <div class="empresa">
        <h2 class="titulo-empresa"><?php echo $razaoSocial;?></h2>
        <div class="box">
        <div class="circle-img">
        <?php echo $nomeEmpresa;?>
        </div>
        
        <div class="lado">
            <p><span class="material-symbols-outlined">apartment</span><?php echo $tamanhoEmpresa;?></p>
            <p><span class="material-symbols-outlined">location_On</span><?php echo $modeloEmpresa;?></p>
        </div>
        
        <div class="lado">
            <p><span class="material-symbols-outlined">contract</span><?php echo $tipoContrato;?></p>
            <p><span class="material-symbols-outlined">payments</span>R&#36; <?php echo $salario;?></p>
        </div>
    </div>
        
    </div>

    <div class="sobre_vagas">
    <div class="descricao">
    <h2 class="titulo">Descrição da Empresa</h2>
    <p><?php echo $descricao;?></p>
    </div>
    
    <div class="descricao">
    <h2 class="titulo">Atividades e Resposabilidade</h2>
    <p><?php echo $atividades;?></p>
    </div>
    
    <div class="descricao">
    <h2 class="titulo">Requisitos</h2>
    <p><?php echo $requisitos?></p>
    </div>
    </div>
   <?php 

   if(isset($_SESSION["email"]) && (isset($_SESSION["senha"]))){
    $email = $_SESSION["email"];
    $ID_CadastroVagas = $_GET["id"];

    $sql_E = "SELECT * FROM cadastro_vagas WHERE ID_CadastroVagas = '$ID_CadastroVagas'";
    $resultado_E = mysqli_query($conn, $sql_E);
    
    if($resultado_E && mysqli_num_rows($resultado_E) == 0){
        $linha = mysqli_fetch_assoc($resultado_E);
        $ID_CadastroVagas = $linha["ID_CadastroVagas"];
    }

    $sql_C = "SELECT * FROM candidato WHERE email = '$email'";
    $resultado_C = mysqli_query($conn, $sql_C);

    if($resultado_C && mysqli_num_rows($resultado_C) > 0){
        $linha = mysqli_fetch_assoc($resultado_C);
        $ID_candidato = $linha["ID_candidato"];
    }

    $sql_H = "SELECT * FROM habilidades WHERE FK_candidatoHab = (SELECT ID_candidato FROM candidato WHERE email = '$email')";
    $resultado_H = mysqli_query($conn, $sql_H); 

    if(mysqli_num_rows($resultado_H) == 0){
        echo "<input type=\"button\" value=\"Complete seu perfil\" name=\"submitCandidatar\" class=\"button-candidatar-block\">";
    }else{
        $sql_R = "SELECT * FROM aplicacao WHERE FK_ID_CadastroVagas = '$ID_CadastroVagas' AND FK_ID_candidato = '$ID_candidato'";
        $resultado_R = mysqli_query($conn, $sql_R);
        
        if($resultado_R && mysqli_num_rows($resultado_R) > 0){
        echo "<input type=\"button\" value=\"Você já se candidatou a esta vaga\" name=\"submitCandidatar\" class=\"button-candidatar-block\">";
        }else{
        echo "<input type=\"button\" value=\"Candidatar\" name=\"submitCandidatar\" class=\"button-candidatar\">";
    } 
  }
}else{
    echo "<a class=\"button-entrar-cadastro\" href=\"tela_de_login.php\">Candidatar</a>";
   }



   if(isset($_GET["id"])){

    $ID_CadastroVagas = $_GET["id"];
   }


    echo "<div class=\"modal-container\"></div>
    <div class=\"modal-aplicao\">
    <span class=\"material-symbols-outlined\">
    Task_alt
    </span>
    <p>vaga aplicada com sucesso </p>
    <form action=\"aplicacao.php?id=$ID_CadastroVagas\" method=\"POST\">
    <button \"type=\"submit\" name=\"continuarBtn\" class=\"continue\">
    <input type=\"hidden\" name=\"dataAplicacao\" value=\"<?php echo date('Y-m-d'); ?>\">
    Continue
    </button>
    </form>
    </div>"

   ?>
   




    </section>

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
    <span><img class="footer-img" src="src/img/instagram 1.svg" alt="logo instagram"></span>
    <span><img class="footer-img" src="src/img/linkedin 1.svg" alt="logo linkedin"></span>
    <span><img class="footer-img" src="src/img/youtube 1.svg" alt="logo youtube"></span>
    </div>
    </footer>
</body>
<script>
    const buttonCandidatar = document.querySelector('.button-candidatar');
    const modalContainer = document.querySelector('.modal-container');
    const modalAplicao = document.querySelector('.modal-aplicao');
    const continueBtn = document.querySelector('.continue')
    document.addEventListener('click', (e) =>{
        const el = e.target;
        if(el.classList.contains("button-candidatar")){
        modalContainer.classList.add("show");
        modalAplicao.classList.add('open');
        // e.preventDefault();
        }else if((el.classList.contains('continue'))){
            modalContainer.classList.remove('show')
            modalAplicao.classList.remove('open')
        }
    })


        

</script>
</html>
